<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function register(Request $request){
   
        //Määrätyt säännöt inputeille
        $this->validate($request,[
            'first' => 'required|string|max:255',
            'last' => 'required|string|max:255',
            'email' => 'required |string| email| max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
        //Uuden käyttäjän tiedot tallennetaan
        $user = User::create([
            'first' => $request->first,
            'last' => $request->last,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
         
        //tokenin teko käyttäjälle ja palautettaan käyttäjä tokenin kanssa.
        //userCurrent.js nappaa tämän tokenin ja antaa pääsyn sivulle
        $token = $user->createToken('authToken')->accessToken;
        return response([ 'user' => $user, 'access_token' => $token]);

    }
}
