<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class userController extends Controller
{
    // show signup form 
    public function create(){
        return view('signup');
    }


    // add new user to the database 
    public function store(Request $request)
    {
        $fields = $request->validate([
            "name" => "required",
            "email" => ['required','email',Rule::unique('users','email')],
            "password" => ["required", "confirmed", "min:6"]
        ]);


        // hashing the password
        $fields['password'] = bcrypt($fields['password']);

        // create user
        $currentUser = User::create($fields);

        // auth
        auth()->login($currentUser);



        return redirect('/');
    }
}
