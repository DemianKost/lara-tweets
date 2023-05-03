<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthController extends Controller
{
    /**
     * Login page
     * 
     * @return Illuminate\Http\Response
     */
    public function login()
    {
        return Inertia::render('Auth/Login');
    }

    /**
     * Authenticate user
     * @param Illuminate\Http\Request $request
     * 
     * @return void
     */
    public function authenticate(Request $request)
    {
        if ( Auth::attempt($request->only('email', 'password')) ) {
            return redirect('/');
        }
    }

    /**
     * Register page
     * 
     * @return Illuminate\Http\Response
     */
    public function register()
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Create user
     * @param Illuminate\Http\Request $request
     * 
     * @return void
     */
    public function store(Request $request)
    {
        
    }
}
