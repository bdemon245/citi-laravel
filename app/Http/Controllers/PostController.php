<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function viewPost()
    {
        $posts = Post::latest()->paginate(5);
        return view('viewPost', compact('posts'));
    }

    public function addPost()
    {
        return view('addPost');
    }

    public function storePost(Request $request)
    {
        $request->validate(
            //array for validation rules
            [
                'title' => "required|max:25",
                'detail' => "required|min:10"
            ],
            //array for customizing messages
            [
                'title.required' => "📝❓",
                'detail.required' => "📝❓",
            ]
        );

        $post = new Post();
        $post->title = $request->title;
        $post->detail = $request->detail;
        $post->save();
        return back()->with('success', 'Post Submitted Successfully');
    }

    public function editPost($id)
    {
        $post = Post::find($id);
        return view('editPost', compact('post'));
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        //checks if the post has already been deleted
        if ($post !== null) {
            $post->delete();
            return redirect()->route('post.view')->with('success', 'Post Deleted');
        } else {
            return redirect()->route('post.view')->with('info', 'Post has already been deleted');
        }
    }
    public function updatePost(Request $request, $id)
    {
        $request->validate(
            //array for validation rules
            [
                'title' => "required|max:25",
                'detail' => "required|min:10"
            ],
            //array for customizing messages
            [
                'title.required' => "📝❓",
                'detail.required' => "📝❓",
            ]
        );

        $post = Post::find($id);
        $post->title = $request->title;
        $post->detail = $request->detail;
        $post->save();

        return redirect()->route('post.view')->with('success', "Post Updated Successfully");
    }
}
