<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Check the logged-in user's role
        if (auth()->user()->role === 'admin') {
            // Redirect admin to about-me page
            return redirect()->route('about');
        } elseif (auth()->user()->role === 'student') {
            // Redirect student to about-me page or home (if needed)
            return redirect()->route('about');
        }
        
        // Default fallback, if for some reason no role is set
        return view('home');
    }
}

