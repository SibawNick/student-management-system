<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //Register Users
    public function register(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'password' => 'required',
            'email' => 'required|unique:users,email',
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'status' => 403, 'data' => $validator->errors()], 403);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->company_id = $request->company_id;
        $user->save();

        return response()->json(["success" => true, 'status' => 201, "message" => "User created successfully"], 201);
    }

    public function login(Request $request)
    {
        $rules = array(
            'email' => 'required|email',
            'password' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'status' => 403, 'data' => $validator->errors()], 403);
        }


        $user = User::where('email', $request->email)->first();



        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['success' => false, 'message' => 'Invalid username or password'], 403);
        }

        $token = $user->createToken($request->email)->plainTextToken;

        return response()->json(['success' => true, 'status' => 200, 'token' => $token, 'user' => $user], 200);
    }
}
