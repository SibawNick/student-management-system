<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FiscalYear;
use Illuminate\Http\Request;

class FiscalYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fiscal_year = FiscalYear::all();
        return response()->json($fiscal_year);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fiscal_year = new FiscalYear();
        $fiscal_year->year = $request->year;
        $fiscal_year->save();
        return response()->json([
            'success' => true,
            'status' => 201,
            'message' => 'Fiscal year saved successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fiscal_year = FiscalYear::find($id);
        return response()->json([
            'success' => true,
            'fiscal_year' => $fiscal_year
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fiscal_year = FiscalYear::find($id);
        $fiscal_year->year = $request->year;
        $fiscal_year->update();
        return response()->json([
            'success' => true,
            'status' => 201,
            'message' => 'Fiscal year updated successfully'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fiscal_year = FiscalYear::find($id);
        $fiscal_year->delete();
        return response()->json([
            'success' => true,
            'message' => 'Fiscal year deleted successfully'
        ]);
    }
}
