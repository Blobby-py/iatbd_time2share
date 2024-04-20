<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserController extends Controller
{
    // Show Register Form
    public function create() {
        return view("users.register");
    }

    // Store newly created user
    public function store(Request $request) {
        $formFields = $request->validate([
            "name" => ["required", "min:5"],
            "email" => ["required", "email", Rule::unique('users', 'email')],
            "password" => ["required", "confirmed", "min:6"],
        ]);

        // Hash Password
        $formFields["password"] = bcrypt($formFields["password"]);

        // Create user
        $user = User::create($formFields);

        //Login
        auth()->login($user);

        return redirect("/")->with("message", "User created and logged in");

    }

    // Logout User
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect("/")->with("message", "You are now logged out");
    }

    // Login User
    public function login() {
        return view("users.login");
    }


    // Authenticate user
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);
    
        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect("/")->with("message", "Successfully Logged In");
        }
    
        return back()->withErrors(["email" => "Invalid credentials"])->onlyInput("email");
    }

}
