<?php

namespace App\Http\Controllers;


use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use App\Models\Group;

class StudentController extends Controller
{
    public function index(Request $request)
{
    $query = Student::with('group');

    if ($request->filled('search')) {
        $query->where(function($q) use ($request) {
            $q->where('first_name', 'like', '%'.$request->search.'%')
              ->orWhere('last_name', 'like', '%'.$request->search.'%');
        });
    }

    if ($request->filled('group')) {
        $query->where('group_id', $request->group);
    }

    $students = $query->get();
    $groups = Group::all();

    return view('students.index', compact('students','groups'));
}

    public function create()
    {
        $groups = Group::all();
        return view('students.create', compact('groups'));
    }

    public function store(StoreStudentRequest $request)
    {
        Student::create($request->validated());
        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }

    public function edit(Student $student)
{
    $groups = Group::all();
    return view('students.edit', compact('student','groups'));
}

    public function update(StoreStudentRequest $request, Student $student)
    {
        $student->update($request->validated());
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }

    public function exportPdf()
    {
        $students = Student::all();
        $pdf = Pdf::loadView('students.pdf', compact('students'));
        return $pdf->download('student_list.pdf');
    }


public function show(Student $student)
{
    $student->load('payments');

    $currentMonth = Carbon::now()->month;
    $currentYear = Carbon::now()->year;

    $currentPayment = $student->payments()
        ->where('month', $currentMonth)
        ->where('year', $currentYear)
        ->first();

    $currentStatus = $currentPayment ? 'Paid' : 'Unpaid';

    $isLate = 'No';

    if (!$currentPayment) {
        $dueDate = Carbon::create($currentYear, $currentMonth, 5);
        if (Carbon::now()->gt($dueDate)) {
            $isLate = 'Yes';
        }
    }

    $totalPaid = $student->payments->sum('amount');

    return view('students.show', compact(
        'student',
        'currentStatus',
        'isLate',
        'totalPaid'
    ));
}
}
