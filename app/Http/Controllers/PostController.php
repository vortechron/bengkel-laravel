<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $post = new Post;
        $posts = $post->all();

        return view('post.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $post = new Post;

        $post->title = $request->title;
        $post->content = $request->content;

        if ($request->hasFile('image')) {
            $post->image = $request->image->store('images', 'public');
        } else {
            $post->image = '';
        }


        $post->save();

        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        return view('post.edit', [
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $post->title = $request->title;
        $post->content = $request->content;

        if ($request->hasFile('image')) {
            $post->image = $request->image->store('images', 'public');
        }

        $post->save();

        return redirect()->route('posts.index');
    }

    public function delete(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
