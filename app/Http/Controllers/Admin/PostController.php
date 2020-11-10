<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $posts = Post::where('user_id', $user_id)->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $data = $request->all();
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'slug' => 'required'
            // 'image' => 'image'
        ]);
        
        // $id = Auth::id();
        // $og_file_img = $data['image']->getClientOriginalName();
        // $path = Storage::disk('public')->putFileAs("image/$id", $data['image'], $og_file_img);

        $newPost = new Post;
        $newPost->user_id = Auth::id();
        $newPost->title = $data['title'];
        $newPost->content = $data['content'];
        $newPost->slug = $data['slug'];
        // $newPost->image = $path;
        $newPost->save();

        return redirect()->route('admin.posts.show', $newPost->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, $slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post, $slug)
    {
        $data = $request->all();
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'slug' => 'required'
            // 'image' => 'image'
        ]);

        $post = Post::where('slug', $slug)->first();
        $post->update($data);
        return redirect()->route('admin.posts', compact('posts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
