<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admissions = Admission::all();
        return response()->json($admissions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $admissions = new Admission();
        $admissions->student_name = $request->student_name;
        $admissions->city = $request->city;
        $admissions->street = $request->street;
        $admissions->mobile = $request->mobile;
        $admissions->email = $request->email;
        $admissions->course_id = $request->course_id;
        $admissions->course_fee = $request->course_fee;
        $admissions->discount_percent = $request->discount_percent;
        $admissions->discount_amount = $request->discount_amount;
        $admissions->total_fee = $request->total_fee;
        $admissions->no_of_installment = $request->no_of_installment;

        $admissions->save();

        return response()->json([
            'success' => true,
            'status' => 201,
            'message' => 'Admissions saved successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admissions = Admission::find($id);
        return response()->json([
            'success' => true,
            'admissions' => $admissions
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $admissions = Admission::find($id);
        $admissions->student_name = $request->student_name;
        $admissions->city = $request->city;
        $admissions->street = $request->street;
        $admissions->mobile = $request->mobile;
        $admissions->email = $request->email;
        $admissions->course_id = $request->course_id;
        $admissions->course_fee = $admissions->course_fee;
        $admissions->discount_percent = $admissions->discount_percent;
        $admissions->discount_amount = $admissions->discount_amount;
        $admissions->total_fee = $admissions->total_fee;
        $admissions->no_of_installment = $admissions->no_of_installment;

        $admissions->update();

        return response()->json([
            'success' => true,
            'status' => 201,
            'message' => 'Admissions updated successfully'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admissions = Admission::find($id);
        $admissions->delete();

        return response()->json([
            'success' => true,
            'admissions' => 'Admission deleted successfully'
        ]);
    }
}
