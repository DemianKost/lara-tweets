<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Http\Requests\User\StoreUserRequest;
use App\Models\User;

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
            return redirect('/profile');
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
     * @param App\Http\Requests\User\StoreUserRequest $request
     * 
     * @return void
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt( $data['password'] )
        ]);

        return redirect()->route('login');
    }
}
