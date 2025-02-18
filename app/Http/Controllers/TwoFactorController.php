<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorController extends Controller  
{
    public function index()
    {
        if(Auth::check()){
            return view('auth.two-factor'); // Create this view
        }else{
            return redirect()->route('login');
        }
    }

    public function verify(Request $request)
    {
        $request->validate(['two_factor_code' => 'required|numeric']);

        $user = Auth::user();

        if(now()->greaterThan($user->two_factor_expires_at)){
            return back()->withErrors(['two_factor_code' => 'Your two-factor authentication code has expired.']);
        }

        if ($request->two_factor_code == $user->two_factor_code) {
            User::find($user->id)->clearTwoFactorCode();
            return redirect()->route('dashboard'); // Redirect to your dashboard
        }

        return back()->withErrors(['two_factor_code' => 'The provided two-factor code is incorrect.']);
    }
}
