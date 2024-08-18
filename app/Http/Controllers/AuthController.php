<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Traits\ApiResponse;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ApiResponse;
    public function signup(RegisterRequest $request){
        $user=User::create($request->all());
        $accessToken = $user->createToken('Personal Access Token', ['issue-access-token']);
        $acToken = $accessToken->plainTextToken;
        return ApiResponse::sendResponse(201, 'Successfully created user', ['accessToken' => $acToken]);
    }
    public function login(LoginRequest $request)
    {
        if(Auth::attempt($request->only('email','password'))){
        $user=Auth::user();
            $tokenResult = $user->createToken('Personal Access Token',['issue-access-token']);
            $token = $tokenResult->plainTextToken;
            return  ApiResponse::sendResponse(200,'you logged in',['accessToken' =>$token]);
        }       
    }
}

