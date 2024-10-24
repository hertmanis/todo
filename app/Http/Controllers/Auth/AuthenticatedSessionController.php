<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login'); // Return your login view
    }

    public function store(Request $request)
    {
        // Validate the login data
        $validatedData = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ])->validate();
    
        // Attempt to authenticate the user
        if (Auth::attempt($validatedData)) {
            return redirect()->intended('/todos');
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    

    

public function destroy(Request $request)
{
    // Optionally, validate the request if necessary
    // $this->validate($request, [
    //     // Add any validation you need here
    // ]);

    Auth::logout();

    return redirect()->route('login')->with('success', 'You have been logged out successfully.');
}


}
