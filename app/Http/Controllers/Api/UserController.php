<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if (!$token = auth()->attempt($validator->validated())) {
            return response()->json(['succeed' => false, 'message' => 'email or password incorrect',], 401);
            
        } else {
            return response()->json(['succeed' => true, 'token' => $token], 201);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {

            auth()->logout();
            return response()->json(['success' => true, 'message' => 'Logged out successfully']);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        try {

            $user = auth()->user();
            return response()->json(['success' => true, 'data' => $user]);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function profile_update(Request $request)
    {
        if (auth()->user()) {

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }

            $id = auth()->user()->id;
            $update_user = User::find($id);
            $update_user->name  = $request->name;
            $update_user->email = $request->email;
            $update_user->save();

            return response()->json(['success' => true, 'message' => 'profile updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'internal server error'], 500);
        }
    }
}
