<?php

namespace App\Http\Controllers\api;

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
        $course = Course::all();
        return response()->json($course);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $course = new Course();
        $course->name = $request->name;
        $course->duration = $request->duration;
        $course->fee = $request->fee;
        $course->status = $request->status;
        $course->company_id = $request->company_id;
        $course->save();
        return response()->json([
            'success' => true,
            'status' => 201,
            'message' => 'course saved successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::find($id);
        return response()->json([
            'success' => true,
            'course' => $course
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = Course::find($id);
        $course->name = $request->name;
        $course->duration = $request->duration;
        $course->fee = $request->fee;
        $course->status = $request->status;
        $course->update();
        return response()->json([
            'success' => true,
            'status' => 201,
            'message' => 'course updated successfully'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::find($id);
        $course->delete();
        return response()->json([
            'success' => true,
            'message' => 'course deleted successfully'
        ]);
    }
}
