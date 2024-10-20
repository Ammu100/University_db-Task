<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class StudentController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('students.index', compact('teachers'));
    }

    public function store(Request $request)
    {
        Log::info('Storing new student:', $request->all());
        $validatedData = $request->validate([
            'student_name' => 'required',
            'class_teacher_id' => 'required|exists:teachers,id',
            'class' => 'required',
            'admission_date' => 'required|date',
            'yearly_fees' => 'required|numeric|min:0',
        ]);

        Student::create($validatedData);

        return response()->json(['success' => 'Student added successfully']);
    }

    public function edit($id)
    {
        $student = Student::find($id);
        $teachers = Teacher::all();

        return response()->json([
            'student' => $student,
            'teachers' => $teachers
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'student_name' => 'required',
            'class_teacher_id' => 'required|exists:teachers,id',
            'class' => 'required',
            'admission_date' => 'required|date',
            'yearly_fees' => 'required|numeric|min:0',
        ]);

        $student = Student::find($id);
        $student->update($request->all());

        return response()->json(['success' => 'Student updated successfully']);
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        return response()->json(['success' => 'Student deleted successfully']);
    }

    public function fetchStudents()
    {
        $students = Student::with('teacher')->get();
        return DataTables::of($students)->make(true);
    }
}
