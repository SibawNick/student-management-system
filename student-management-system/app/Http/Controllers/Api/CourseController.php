<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return response()->json($courses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $courses = new Course();
        $courses->name = $request->name;
        $courses->duration = $request->duration;
        $courses->fee = $request->fee;
        $courses->status = $request->status;
        $courses->company_id = $request->company_id;

        $courses->save();
        return response()->json([
            'success' => true,
            'status' => 201,
            'message' => 'Course created successfully',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $courses = Course::find($id);
        return response()->json([
            'success' => true,
            'courses' => $courses,
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $courses = Course::find($id);
        $courses->name = $request->name;
        $courses->duration = $request->duration;
        $courses->fee = $request->fee;
        $courses->status = $request->status;
        $courses->company_id = $request->company_id;

        $courses->update();
        return response()->json([
            'success' => true,
            'status' => 201,
            'message' => 'Course updated successfully',
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $courses = Course::find($id);
        $courses->delete();
        return response()->json([
            'success' => true,
            'courses' => 'Course deleted successfully',
        ]);
    }
}
