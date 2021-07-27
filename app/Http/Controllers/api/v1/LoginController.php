<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login( Request $request) {
        //määrätyt säännot inputeille
        $login = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        //Jos ei onnistunut login
        if( !Auth::attempt( $login )) {
            return response(['message' => 'Invalid login credentials.']);
        }
        //tokenin teko käyttäjälle ja palautettaan käyttäjä tokenin kanssa.
        //userCurrent.js nappaa tämän tokenin ja antaa pääsyn sivulle
        $accessToken = Auth::user()->createToken('authToken')->accessToken;
        return response(['user' => Auth::user(), 'access_token' => $accessToken]);
    }
   
}
