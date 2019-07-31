<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


use Illuminate\Foundation\Auth\AuthenticatesUsers;



class PassportAuthController extends Controller
{
    public function register (Request $request) {

//        $validator = Validator::make($request->all(), [
//            'name' => 'required|string|max:255',
//            'email' => 'required|string|email|max:255|unique:users',
//            'password' => 'required|string|min:6|confirmed',
//        ]);
//
//        if ($validator->fails())
//        {
//            return response(['errors'=>$validator->errors()->all()], 422);
//        }

//        $request['password']=Hash::make($request['password']);
//        $user = User::create($request->toArray());

//        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
//       User::createToken('Laravel Password Grant Client')->accessToken;




        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'bio' => '1',
        ]);
        $token = $user->createToken('authToken')->accessToken;;

        return response( $token );

    }

    public function login (Request $request) {

//        $credentials = [
//            'name' => 'kunda',
//            'password' => 'kunda'
//        ];

        if (Auth::attempt(['email' => 'lop@lop.lop', 'password' => 'loploplop'])) {

        }
        else
        {
            return response('NO');
        }

          $user = Auth::user();

//        }
       $token = $user->createToken('authToken')->accessToken;
        //return response('YES');
         // return response()->json(['token' => $user], 200);

      return response([ 'access_token' => $token]);

    }

    public function logout (Request $request) {

        $user = User::where('email', 'kunda@tut.by')->first();

        if ($user) {
            $token = auth()->user()->createToken('authToken')->accessToken;
            $response = ['token' => $token];
            return response($response, 200);

        } else {
            $response = 'User does not exist';
            return response($response, 422);
        }






        $token = $request->user()->token();
        $token->revoke();

        $response = 'You have been succesfully logged out!';
        return response($response, 200);

    }
}
