<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['postData', 'destroy']);
    }

    public function index()
    {
        //1 query to pull all data rather than one by one<-($posts = Post::paginate(10);)
        $posts = Post::Latest()->with(['user', 'likes'])->paginate(20);
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function postData(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $request->user()->posts()->create([
            'body' => $request->body
        ]);

        return back();
    }

    public function destroy(Post $post)
    {
        //check to PostPolicy
        $this->authorize('delete', $post);
        $post->delete();

        return back();
    }
}
