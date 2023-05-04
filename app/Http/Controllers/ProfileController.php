<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ProfileController extends Controller
{
    /**
     * Current user profile page
     * 
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Profile/Index', [
            'profile' => auth()->user()->profile
        ]);
    }
}
