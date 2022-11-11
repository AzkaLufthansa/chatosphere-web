<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('dashboard.friend.friend', [
            'title' => 'Friend Relation',
            'relations' => Friend::latest()->filter(request(['search']))->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.friend.create', [
            'title' => 'Add Relation',
            'users' => User::all()
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
            'user_id' => 'required',
            'friend_id' => 'required',
        ]);

        if($request->user_id == $request->friend_id) {
            return back()->with('error', 'User and friend cannot be the same.');
        }

        Friend::create($validatedData);
        Alert::success('Success', 'You\'ve successfully created data!');
        return redirect('friend');
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
    public function edit(Friend $friend)
    {
        return view('dashboard.friend.edit', [
            'title' => 'Edit Relation',
            'friend' => $friend,
            'users' => User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Friend $friend)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'friend_id' => 'required',
        ]);

        if($request->user_id == $request->friend_id) {
            return back()->with('error', 'User and friend cannot be the same.');
        }

        Friend::find($friend->id)->update($validatedData);
        Alert::success('Success', 'You\'ve successfully updated data!');
        return redirect('friend');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Friend $friend)
    {
        //
    }
}
