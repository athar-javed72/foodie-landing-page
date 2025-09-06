<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Show register form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Show forgot password form
    public function showForgotForm()
    {
        return view('auth.forgot-password');
    }

    // Show reset password form
    public function showResetForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    // Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }

    // Register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
    }

    // Home page with house listings
    public function home()
    {
        $houses = [
            [
                'title' => 'Modern Family House',
                'location' => 'DHA Phase 6, Karachi',
                'price' => 'PKR 5.2 Crore',
                'image' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'title' => 'Luxury Villa',
                'location' => 'Bahria Town, Lahore',
                'price' => 'PKR 8.5 Crore',
                'image' => 'https://images.unsplash.com/photo-1460518451285-97b6aa326961?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'title' => 'Cozy Apartment',
                'location' => 'Gulberg, Islamabad',
                'price' => 'PKR 2.1 Crore',
                'image' => 'https://images.unsplash.com/photo-1512918728675-ed5a9ecdebfd?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'title' => 'Classic Bungalow',
                'location' => 'Clifton, Karachi',
                'price' => 'PKR 6.3 Crore',
                'image' => 'https://images.unsplash.com/photo-1507089947368-19c1da9775ae?auto=format&fit=crop&w=600&q=80',
            ],
        ];
        return view('home', compact('houses'));
    }

    // Properties page
    public function properties()
    {
        $properties = [
            [
                'title' => 'Modern Family House',
                'location' => 'DHA Phase 6, Karachi',
                'price' => 'PKR 5.2 Crore',
                'image' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'title' => 'Luxury Villa',
                'location' => 'Bahria Town, Lahore',
                'price' => 'PKR 8.5 Crore',
                'image' => 'https://images.unsplash.com/photo-1460518451285-97b6aa326961?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'title' => 'Cozy Apartment',
                'location' => 'Gulberg, Islamabad',
                'price' => 'PKR 2.1 Crore',
                'image' => 'https://images.unsplash.com/photo-1512918728675-ed5a9ecdebfd?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'title' => 'Classic Bungalow',
                'location' => 'Clifton, Karachi',
                'price' => 'PKR 6.3 Crore',
                'image' => 'https://images.unsplash.com/photo-1507089947368-19c1da9775ae?auto=format&fit=crop&w=600&q=80',
            ],
        ];
        return view('properties', compact('properties'));
    }

    // Contact page
    public function contact()
    {
        return view('contact');
    }
}
