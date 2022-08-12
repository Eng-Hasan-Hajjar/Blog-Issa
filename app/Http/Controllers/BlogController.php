<?php

namespace App\Http\Controllers;

use App\Post;
use App\Video;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::when($request->search, function($query) use($request) {
                        $search = $request->search;
                        
                        return $query->where('title', 'like', "%$search%")
                            ->orWhere('body', 'like', "%$search%");
                    })->with('tags', 'category', 'user')
                    ->withCount('comments')
                    ->published()
                    ->simplePaginate(5);

        return view('website.index', compact('posts'));
    }

    public function post(Post $post)
    {
        $post = $post->load(['comments.user', 'tags', 'user', 'category']);

        return view('website.post', compact('post'));
    }


    public function video(Request $request)
    {
                 return view('website.video');
    }



    public function comment(Request $request, Post $post)
    {
        $this->validate($request, ['body' => 'required']);

        $post->comments()->create([
            'body' => $request->body
        ]);
        flash()->overlay('Comment successfully created');

        return redirect("/posts/{$post->id}");
    }
    public function news()
    {
        return view('website.news');

    }
    public function about()
    {
        return view('website.about');

    }
    public function contact()
    {
        return view('website.contact');

    }
    public function  syrianArt()
    {
        return view('website.syrianArt');

    }
    
    public function  exhibitions()
    {
        return view('website.exhibitions');

    }
    public function  exhibition()
    {
        return view('website.exhibition');

    }
    public function  status()
    {
        return view('website.status');

    }
    public function  blogSingle()
    {
        return view('website.blogSingle');

    }
    
}
