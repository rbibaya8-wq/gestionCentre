<?php

namespace App\Http\Controllers;

use App\Models\{Student, Teacher, Group, Payment};

class DashboardController extends Controller
{
    public function index()
{
    $currentMonth = now()->month;
    $currentYear = now()->year;

    $monthlyRevenue = Payment::where('month', $currentMonth)
        ->where('year', $currentYear)
        ->sum('amount');

    $totalStudents = Student::count();
    $totalTeachers = Teacher::count();
    $totalGroups = Group::count();

    $students = Student::all();
    $unpaidStudents = 0;

    foreach ($students as $student) {
        $hasPayment = Payment::where('student_id', $student->id)
            ->where('month', $currentMonth)
            ->where('year', $currentYear)
            ->exists();

        if (!$hasPayment) {
            $unpaidStudents++;
        }
    }

    $paidStudents = $totalStudents - $unpaidStudents;
    $paymentRate = $totalStudents > 0 
        ? round(($paidStudents / $totalStudents) * 100)
        : 0;

    $latestPayments = Payment::with('student')
        ->latest()
        ->take(5)
        ->get();
    $groups = Group::withCount('students')->get();
$totalStudents = Student::count();            
$totalGroups = Group::count();               
$studentsWithGroup = Student::whereNotNull('group_id')->count();

    return view('dashboard', compact(
        'monthlyRevenue',
        'unpaidStudents',
        'totalStudents',
        'totalTeachers',
        'totalGroups',
        'paymentRate',
        'latestPayments'
    ));
}
}