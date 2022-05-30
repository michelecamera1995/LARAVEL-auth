<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PostsModel;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = PostsModel::all();
        return view('return.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required | max:250',
            'content' =>    'required'
        ]);
        $data = $request->all();
        $newPost = new PostsModel();
        $newPost->fill($data);
        $slug = Str::slug($newPost->title);
        $alternateslug = $slug;
        $postexist = PostsModel::where('slug', $slug)->first();
        $counter = 1;
        while ($postexist) {
            $alternateslug = $slug . '_' . $counter;
            $counter++;
            $postexist = PostsModel::where('slug', $alternateslug)->first();
        }
        $newPost->slug = $alternateslug;
        $newPost->save();
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
        $data = PostsModel::find($id);
        if ($data) {
            return view('admin.posts.show', compact('data'));
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = PostsModel::findOrFail($id);
        return view('admin.posts.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $posts = PostsModel::findOrFail($id);
        $data = $request->all();
        $posts->fill($data);
        $posts->update();
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $posts = PostsModel::find($id);
        $posts->delete();
        return redirect()->route('admin.posts.index');
    }
}
