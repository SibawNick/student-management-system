<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $student = Student::all();
        return response()->json($student);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->address = $request->address;
        $student->school = $request->school;
        $student->course = $request->course;
        $student->batch = $request->batch;
        $student->company_id = $request->company_id;

        $student->save();
        return response()->json([
            'success' => true,
            'status' => 201,
            'message' => 'Student saved successfully'
        ], 201);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $student = Student::find($id);
        return response()->json([
            'success' => true,
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $student =  Student::find($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->address = $request->address;
        $student->school = $request->school;
        $student->course = $request->course;
        $student->batch = $request->batch;
        $student->company_id = $request->company_id;

        $student->update();
        return response()->json([
            'success' => true,
            'status' => 201,
            'message' => 'student\'s pic updated successfully'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $student = Student::find($id);
        $student->delete();
        return response()->json([
            'success' => true,
            'message' => 'Company deleted successfully'
        ]);
    }
}
