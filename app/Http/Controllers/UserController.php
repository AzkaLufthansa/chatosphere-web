<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.users.users', [
            'title' => 'Users',
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create', [
            'title' => 'Add User'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'phone' => 'required',
            'birthday' => 'required',
            'image' => 'required|image',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['image'] = $request->file('image')->store('user_image');
        User::create($validatedData);
        Alert::success('Success', 'You\'ve Successfully added data!');
        return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'title' => 'Edit User',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required',
            'phone' => 'required',
            'birthday' => 'required',
            'image' => 'required|image',
        ];

        if($request->username !== $user->username) {
            $rules['username'] = 'required|unique:users';
        }
        
        if($request->email !== $user->email) {
            $rules['email'] = 'required|unique:users';
        }

        $validatedData = $request->validate($rules);

        Storage::delete($user->images);
        $validatedData['image'] = $request->file('image')->store('user_image');
        User::find($user->id)->update($validatedData);
        Alert::success('Success', 'You\'ve Successfully updated data!');
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Storage::delete($user->image);
        User::destroy($user->id);
        Alert::success('Success', 'You\'ve Successfully deleted data!');
        return redirect('/user');
    }
}
