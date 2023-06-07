<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enquiries = Enquiry::all();
        return response()->json($enquiries);
    }

    /**
     * Store a newly created resource in storage. Ok
     */
    public function store(Request $request)
    {
        $enquiries = new Enquiry();
        $enquiries->student_name = $request->student_name;
        $enquiries->mobile = $request->mobile;
        $enquiries->email = $request->email;
        $enquiries->course_id = $request->course_id;
        $enquiries->lead = $request->lead;
        $enquiries->status = $request->status;
        $enquiries->company_id = $request->company_id;

        $enquiries->save();
        return response()->json([
            'success' => true,
            'status' => 201,
            'message' => 'Enquiry saved successfully',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $enquiries = Enquiry::find($id);
        return response()->json([
            'success' => true,
            'enquiries' => $enquiries
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $enquiries = Enquiry::find($id);
        $enquiries->student_name = $request->student_name;
        $enquiries->mobile = $request->mobile;
        $enquiries->email = $request->email;
        $enquiries->course_id = $request->course_id;
        $enquiries->lead = $request->lead;
        $enquiries->status = $request->status;
        $enquiries->company_id = $request->company_id;

        $enquiries->update();
        return response()->json([
            'success' => true,
            'status' => 201,
            'message' => 'Enquiry updated successfully',
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $enquiries = Enquiry::find($id);
        $enquiries->delete();
        return response()->json([
            'success' => true,
            'enquiries' => 'Enquiry deleted successfully'
        ]);
    }
}
