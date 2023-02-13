<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all posts from database
        $posts = Post::latest()->get();

        //render with data "posts"
        return Inertia::render('Post/Index', compact('posts'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return Inertia::render('Post/Create');
    }

    public function store(Request $request)
    {
        //set validation
        $request->validate([
            'title'   => 'required',
            'content' => 'required',
        ]);

        //create post
        $post = Post::create([
            'title'     => $request->title,
            'content'   => $request->content
        ]);

        if ($post) {
            return Redirect::route('posts');
        }
    }


    public function edit(Request $request)
    {
        $post = Post::where('id', $request->id)->first();
        return Inertia::render('Post/Edit', [
            'post' => $post
        ]);
    }


    public function update(Request $request)
    {
        $post = Post::where('id', $request->id)->first();
        $request->validate([
            'title'   => 'required',
            'content' => 'required',
        ]);

        //update post
        $post->update([
            'title'     => $request->title,
            'content'   => $request->content
        ]);

        if ($post) {
            return Redirect::route('posts');
        }
    }

    public function destroy($id)
    {
        //find post by ID
        $post = Post::findOrfail($id);

        //delete post
        $post->delete();

        if ($post) {
            return Redirect::route('posts');
        }
    }
}
