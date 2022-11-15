<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Category;
use App\Models\LogActivity;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

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
            'topics' => Topic::with(['user', 'category'])->latest()->filter(request(['search', 'category', 'user']))->simplePaginate(10),
            'categories' => Category::all()
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
        $rules = [
            'title' => 'required',
            'slug' => 'required|unique:topics',
            'category_id' => 'required',
            'content' => 'required',
        ];

        if($request->file('image')) {
            $rules['image'] = 'image|file';
        }

        $validatedData = $request->validate($rules);
        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('topic_image');
        }
        $validatedData['user_id'] = Auth::user()->id;

        Topic::create($validatedData);
        LogActivity::create([
            'user_id' => Auth::user()->id,
            'message' => 'Just added new topic.'
        ]);
        Alert::success('Success', 'You\'ve Successfully added data!');
        return redirect('/topic');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        return view('dashboard.topic.detail', [
            'title' => 'Detail Topic',
            'topic' => $topic
        ]);
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
        $rules = [
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required',
        ];

        if($request->slug !== $topic->slug) {
            $rules['slug'] = 'required|unique:topics';
        }

        if($request->file('image')) {
            $rules['image'] = 'image|file';
        }

        $validatedData = $request->validate($rules);
        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('topic_image');
            if($topic->image) {
                Storage::delete($topic->image);
            }
        }
        
        Topic::where('slug', $topic->slug)->update($validatedData);
        LogActivity::create([
            'user_id' => Auth::user()->id,
            'message' => 'Just edited the topic.'
        ]);
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
        if($topic->image) {
            Storage::delete($topic->image);
        }
        Topic::destroy($topic->id);
        LogActivity::create([
            'user_id' => Auth::user()->id,
            'message' => 'Just deleted the topic.'
        ]);
        Alert::success('Success', 'You\'ve Successfully deleted data!');
        return redirect('/topic');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Topic::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
