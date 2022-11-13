<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    public function index()
    {
        return view('dashboard.settings.settings', [
            'title' => 'Settings'
        ]);
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|required_with:confirmation_password|same:confirmation_password',
        ]);

        if(!Hash::check($request->current_password, auth()->user()->password)) {
            return back();
        }
        
        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();
        Alert::success('Success', 'You\'ve successfully updated your password!');
        return back();
    }
}
