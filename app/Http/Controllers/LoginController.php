<?php

namespace App\Http\Controllers;

use App\Models\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            LogActivity::create([
                'user_id' => Auth::user()->id,
                'message' => 'Just logged in.'
            ]);
            Alert::success('Success', 'You\'ve successfully logged in!');
            return redirect('/');
        }

        Alert::error('Failed', 'Wrong username / password!');
        return back();

    }

    public function logout(Request $request)
    {
        LogActivity::create([
            'user_id' => Auth::user()->id,
            'message' => 'Just logged out.'
        ]);
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Alert::success('Success', 'You\'ve successfully logged out!');
        return redirect('/login');
    }
}
