<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function authenticated($request, $user)
    {
        // Check the user role and redirect accordingly
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // Redirect other users to their respective pages
        return redirect()->route('about');
    }

    // Other methods...
}
