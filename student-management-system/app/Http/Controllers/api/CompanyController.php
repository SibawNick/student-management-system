<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Company::all();
        return response()->json($company);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $company = new Company();
        $company->name = $request->name;
        $company->city = $request->city;
        $company->street = $request->street;
        $company->phone = $request->phone;
        $company->email = $request->email;
        $company->reg_no = $request->reg_no;

        // For Logo Upload
        uploadImage($request, $company, 'logo');
        $company->save();
        return response()->json([
            'success' => true,
            'status' => 201,
            'message' => 'Company saved successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::find($id);
        return response()->json([
            'success' => true,
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $company =  Company::find($id);
        $company->name = $request->name;
        $company->city = $request->city;
        $company->street = $request->street;
        $company->phone = $request->phone;
        $company->email = $request->email;
        $company->reg_no = $request->reg_no;

        // For Logo Upload
        uploadImage($request, $company, 'logo');
        $company->update();
        return response()->json([
            'success' => true,
            'status' => 201,
            'message' => 'Company updated successfully'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::find($id);
        $company->delete();
        return response()->json([
            'success' => true,
            'message' => 'Company deleted successfully'
        ]);
    }
}
