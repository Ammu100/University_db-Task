<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\student;

use Exception;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $students = student::with('teacher')->paginate(10);
        return response()->json($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'student_name' => 'required',
            'class_teacher_id' => 'required',
            'class' => 'required',
            'admission_date' => 'required|date',
            'yearly_fees' => 'required|numeric',
        ]);
    
        student::create($validated);
        return response()->json(['message' => 'Student added successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'student_name' => 'required',
            'class_teacher_id' => 'required',
            'class' => 'required',
            'admission_date' => 'required|date',
            'yearly_fees' => 'required|numeric',
        ]);
    
        $student = student::findOrFail($id);
        $student->update($validated);
        return response()->json(['message' => 'Student updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = student::findOrFail($id);
        $student->delete();
        return response()->json(['message' => 'Student deleted successfully!']);
    }
}
