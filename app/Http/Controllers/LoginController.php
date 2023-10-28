<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function submit(Request $request){
        //validate phone num
        $request->validate([
            'phone' => 'required|numeric|min:10'
        ]);

        //find or create user model
        $user = User::firstOrCreate([
            'phone' => $request->phone
        ]);

        if(!$user){
            return response()->json(['message' => 'Could not process a user with that phone number. '], 401);
        };

        //send the user an otp
        $user->notify(new LoginNeedsVerification());

        //return back a response
        return response()->json(['message' => 'Text message notificaation sent. ']);
    }
}
