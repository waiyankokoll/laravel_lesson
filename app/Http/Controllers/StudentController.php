<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::orderBy('id', 'desc')->get();
        return view("backend.student-list.student_list", compact("students"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.student-list.student_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = $request->only(['name', 'age', 'gender', 'birthday', 'address']);
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'age' => 'required|integer|min:1',
            'gender' => 'required|string|in:male,female',
            'birthday' => 'required|date',
            'address' => 'required|string|max:255',
        ]);
        Student::create([
            'name'=> $request->name,
            'age'=> $request->age,
            'gender'=> $request->gender,
            'birthday'=> $request->birthday,
            'address'=> $request->address,
        ]);


        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return redirect()->route('students.index')->with('error', 'Student not found');
        }
        return view("backend.student-list.student_edit", compact("student"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return redirect()->route('students.index')->with('error', 'Student not found');
        }

        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'age' => 'required|integer|min:1',
            'gender' => 'required|string|in:male,female',
            'birthday' => 'required|date',
            'address' => 'required|string|max:255',
        ]);

        $student->update($request->only(['name', 'age', 'gender', 'birthday', 'address']));

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Student::find($id)->delete();
        return redirect()->route('students.index');
    }
}
