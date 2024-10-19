<?php

namespace App\Http\Controllers;
use App\Models\teacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = teacher::all();
        return response()->json($teachers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'teacher_name' => 'required|string',
        ]);

        Teacher::create($validated);
        return response()->json(['message' => 'Teacher created successfully'], 201);
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
            'id' => 'required|exists:teachers,id',
            'teacher_name' => 'required|string',
        ]);

        $teacher = teacher::find($validated['id']);
        $teacher->update($validated);
        return response()->json(['message' => 'Teacher updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $validated = $request->validate([
            'id' => 'required|exists:teachers,id',
        ]);

        $teacher = teacher::find($validated['id']);
        $teacher->delete();
        return response()->json(['message' => 'Teacher deleted successfully']);
    }
}
