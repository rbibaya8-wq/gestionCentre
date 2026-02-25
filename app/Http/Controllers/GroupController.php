<?php

namespace App\Http\Controllers;


use App\Models\{Group, Subject, Teacher, Student};
use App\Http\Requests\StoreGroupRequest;
use Illuminate\Http\Request;

class GroupController extends Controller
{
  public function index(Request $request)
{
    $query = Group::with(['subject', 'teacher'])->withCount('students');

    if ($request->filled('name')) {
        $query->where('name', 'like', '%' . $request->name . '%');
    }

    if ($request->filled('level')) {
        $query->where('level', $request->level);
    }

    $groups = $query->latest()->paginate(10)->withQueryString();

    $levels = Group::select('level')->distinct()->pluck('level');

    return view('groups.index', compact('groups', 'levels'));
}

    public function create()
    {
        $subjects = Subject::all();
        $teachers = Teacher::all();
        return view('groups.create', compact('subjects', 'teachers'));
    }

    public function store(StoreGroupRequest $request)
    {
        Group::create($request->validated());
        return redirect()->route('groups.index')->with('success', 'Group created successfully.');
    }

    public function show(Group $group)
    {
        $group->load(['students' => function($query) {
            $query->orderBy('first_name');
        }]);

        $availableStudents = Student::where('level', $group->level)
            ->whereNotIn('id', $group->students->pluck('id'))
            ->get();

        return view('groups.show', compact('group', 'availableStudents'));
    }


  public function enrollStudent(Request $request, Group $group)
{
    $student = Student::findOrFail($request->student_id);

    $student->update([
        'group_id' => $group->id,
        'enrollment_date' => now()->toDateString()
    ]);

    return redirect()->back()->with('success', 'Student enrolled successfully');
}

    public function removeStudent(Group $group, Student $student)
{
        if ($student->group_id === $group->id) {
        $student->update([
            'group_id' => null,
            'enrollment_date' => null
        ]);
    }

    return back()->with('success', 'Student removed from the group.');
}

    public function edit(Group $group)
{
    $subjects = Subject::all();
    $teachers = Teacher::all();
    return view('groups.edit', compact('group', 'subjects', 'teachers'));
}

public function update(Request $request, Group $group)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'subject_id' => 'required|exists:subjects,id',
        'teacher_id' => 'required|exists:teachers,id',
        'level' => 'required|string|max:255',
        'schedule' => 'required|string|max:255',
    ]);

    $group->update($validated);

    return redirect()->route('groups.index')->with('success', 'Group updated successfully.');
}

public function destroy(Group $group)
{
    $group->delete();
    return redirect()->route('groups.index')->with('success', 'Group deleted successfully.');
}
}
