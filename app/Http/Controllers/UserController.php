<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

 class UserController extends Controller
{
     Public function authenticate(Request $request)

     {

         try {
             $this->validate($request, [

                 'email' => 'required',

                 'pass' => 'required'

             ]);
         } catch (ValidationException $e) {
         }

         $user = User::where('email', $request->input('email'))->first();

         if (Hash::check($request->input('pass'), $user->password)) {

             $key_hash = base64_encode(str_random(40));

             User::where('email', $request->input('email'))->update(['key' => "$key_hash"]);;

             return response()->json(['status' => 'successfully logged in', 'key' => $key_hash]);

         } else {

             return response()->json(['status' => 'failed to login'], Response::HTTP_UNAUTHORIZED);

         }
     }
}
