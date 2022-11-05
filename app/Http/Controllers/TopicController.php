<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.topic.topic', [
            'title' => 'Topic',
            'topics' => Topic::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.topic.create', [
            'title' => 'Add Topic',
            'categories' => Category::all()
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
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required',
        ]);

        $slug = strtolower($validatedData['title']);
        $validatedData['slug'] = str_replace(' ', '-', $slug);
        $validatedData['user_id'] = Auth::user()->id;

        Topic::create($validatedData);
        Alert::success('Success', 'You\'ve Successfully added data!');
        return redirect('/topic');
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
    public function edit(Topic $topic)
    {
        return view('dashboard.topic.edit', [
            'title' => 'Edit Topic',
            'topic' => $topic,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required',
        ]);

        $slug = strtolower($validatedData['title']);
        $validatedData['slug'] = str_replace(' ', '-', $slug);

        Topic::where('slug', $topic->slug)->update($validatedData);
        Alert::success('Success', 'You\'ve Successfully updated data!');
        return redirect('/topic');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        Topic::destroy($topic->id);
        Alert::success('Success', 'You\'ve Successfully deleted data!');
        return redirect('/topic');
    }
}
