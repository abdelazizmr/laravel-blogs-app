<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    // show signup form 
    public function create(){
        return view('auth.signup');
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

    // show login form 
    public function login(){
        return view('auth.login');
    }

    // login the user 
    public function authencticate(Request $request){
        $fields = $request->validate([
            "email" => ['required', 'email'],
            "password" => "required"
        ]);

        if (auth()->attempt($fields)){
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors(["email"=>"Invalid email or password"])->onlyInput('email');
    }


    // logout the user auth
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // Show profile
    public function profile(){
        return view('profile.index',
            ['profile' => Profile::find(auth()->id())  ]
        );
    }

    // Show edit profile form
    public function editProfile(){
        // dd(Profile::find(auth()->id()));
        return view(
            'profile.edit',
            ['profile' => Profile::find(auth()->id())]
        );
    }

    // upadate the info 
    public function updateProfile(Request $request, User $user)
    {


        $data = $request->validate([
            'name' => 'max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'profile_picture' => ['nullable', 'image'],
            'bio' => ['nullable', 'string'],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:255'],
        ]);

        $profile = $user->profile;

        // dd($data);

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data['profile_image'] = $filename;
        }

        $user->update([
            'email' => $data['email']
        ]);

        $arr = [
            'full_name' => $data['name'],
            'bio' => $data['bio'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'profile_image' => $data['profile_image'] ?? $profile->profile_image,
        ];
        // dd($arr);
        $profile->update($arr);
       

        return redirect('/profile');
    }

    // confirm delete user
    public function confirmDelete(){
        return view('profile.confirmDelete');
    }


    // delete user 
    public function delete(Request $request,User $user){
        $fields = $request->validate([
            "password" => "required"
        ]);
        if (Hash::check($request->password, $user->password)) {
            // password is valid
            $user->delete();
            auth()->logout();
            return redirect('/login');
        }

        return back()->withErrors(["password" => "Invalid email or password"])->onlyInput('password');

    }


}
