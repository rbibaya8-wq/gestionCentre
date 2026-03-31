<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Http\Requests\StoreTeacherRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        $query = Teacher::query();

    if ($request->filled('search')) {
    $search = $request->search;
    $query->where(function ($q) use ($search) {
        $q->where('first_name', 'like', "%$search%")
          ->orWhere('last_name', 'like', "%$search%")
          ->orWhere('phone', 'like', "%$search%");
    });
}

        if ($request->filled('subject')) {
            $query->where('subject_specialization', $request->subject);
        }

        $teachers = $query
            ->withCount('groups')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $subjects = Teacher::select('subject_specialization')
            ->distinct()
            ->pluck('subject_specialization');

        return view('teachers.index', compact('teachers', 'subjects'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(StoreTeacherRequest $request)
    {
        Teacher::create($request->validated());
        return redirect()->route('teachers.index')->with('success', 'Teacher added successfully.');
    }

    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    public function update(StoreTeacherRequest $request, Teacher $teacher)
    {
        $teacher->update($request->validated());
        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Teacher removed successfully.');
    }

    public function exportPdf()
    {
        $teachers = Teacher::withCount('groups')->get();
        $pdf = Pdf::loadView('teachers.pdf', compact('teachers'));
        return $pdf->download('teachers_list.pdf');
    }
}