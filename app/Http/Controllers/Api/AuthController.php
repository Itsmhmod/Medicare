<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiRespose;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(Request $request)

    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [], [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        ]);

        if ($validator->fails()) {
            return ApiRespose::sendResponse(422, 'Register Validation Errors', $validator->messages()->all());
        }

        $user = User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
        $data['token'] = $user->createToken('APIcourse')->plainTextToken;
        $data['name'] = $user->name;
        $data['email'] = $user->email;

        return ApiRespose::sendResponse(201, 'User Account Created Successfully', $data);
    }
    public function login(Request $request)

    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required'],

        ], [], [

            'email' => __('lang.email'),
            'password' => __('lang.password'),
        ]);

        if ($validator->fails()) {
            return ApiRespose::sendResponse(422, 'login Validation Errors', $validator->errors());
        }


        if ($validator->fails()) {
            return ApiRespose::sendResponse(422, 'Login Validation Errors', $validator->errors());
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $data['token'] =  $user->createToken('MyAuthApp')->plainTextToken;
            $data['name'] =  $user->name;
            $data['email'] =  $user->email;
            return ApiRespose::sendResponse(200, 'Login Successfully', $data);
        } else {
            return ApiRespose::sendResponse(401, 'These credentials doesn\'t exist', null);
        }
    }
    public function logout(Request $request)
    {

        $request->user()->currentAccessToken()->delete();
        return ApiRespose::sendResponse(204, 'Logged Out Successfully', []);
    }
}
