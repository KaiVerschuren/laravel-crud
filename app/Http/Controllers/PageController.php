<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class PageController extends Controller
{
    public function index()
    {
        return view('index'); // pass them to the view
    }

    public function about()
    {
        return view('about');
    }  

    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6|confirmed',
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }

        return view('/register'); // show the form
    }


    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
            ]);

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate(); // prevent session fixation

                return redirect('/product'); // logged in
            }

            return back()->withErrors([
                'email' => 'Invalid credentials',
            ]);
        }

        return view('login');
    }

    public function logout()
    {
        Auth::logout(); // log out the user
        return redirect('/'); // redirect to home
    }

}
