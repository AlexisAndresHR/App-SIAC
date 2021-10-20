<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


/**
 * -> Authentication functions (Sign in & Sign up) Controller
 */
class AuthController extends Controller
{
    /**
     * Main method, executed when controller is called through class
     */
    public function __invoke() {
        return view('auth.signin');// Calls the specified view
    }

    public function showSignUp() {
        return view('auth.signup');
    }
}
