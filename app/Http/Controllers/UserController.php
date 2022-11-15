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
            'users' => User::latest()->filter(request(['search']))->simplePaginate(10)
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
        $rules = [
            'name' => 'required',
            'username' => 'required|unique:users|alpha_dash',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
        ];

        if($request->phone) {
            $rules['phone'] = 'required';
        }

        if($request->birthday) {
            $rules['birthday'] = 'required';
        }

        if($request->file('image')) {
            $rules['image'] = 'required|image';
        }

        $validatedData = $request->validate($rules);
        $validatedData['password'] = Hash::make($validatedData['password']);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('user_image');
        }

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
    public function show(User $user)
    {
        return view('dashboard.users.detail', [
            'title' => 'Detail User',
            'user' => $user
        ]);
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
        ];

        if($request->phone) {
            $rules['phone'] = 'required';
        }

        if($request->birthday) {
            $rules['birthday'] = 'required';
        }

        if($request->file('image')) {
            $rules['image'] = 'required|image';
        }

        if($request->username !== $user->username) {
            $rules['username'] = 'required|unique:users|alpha_dash';
        }
        
        if($request->email !== $user->email) {
            $rules['email'] = 'required|unique:users';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($user->image) {
                Storage::delete($user->image);
            }
            $validatedData['image'] = $request->file('image')->store('user_image');
        }
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
        if($user->image) {
            Storage::delete($user->image);
        }
        User::destroy($user->id);
        Alert::success('Success', 'You\'ve Successfully deleted data!');
        return redirect('/user');
    }
}
