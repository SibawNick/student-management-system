<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getCompanies()
    {
        $companies = Company::all();
        return  CompanyResource::collection($companies);
    }
}
