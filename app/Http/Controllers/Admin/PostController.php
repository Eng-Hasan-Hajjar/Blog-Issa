<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['user', 'category', 'tags', 'comments'])->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();
        $tags = Tag::pluck('name', 'name')->all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {   
        $image = $request->file('post_image');
     //  $image = $request->post_image;
       // dd($image);
       $new_name = rand() . '.' . $image->getClientOriginalExtension();
       $image->move(public_path('images'), $new_name);
    //  $image->move(public_path('images'), $image);

        $post = Post::create([
            'title'       => $request->title,
            'body'        => $request->body,
            'post_image'     =>  $new_name,
            'category_id' => $request->category_id
        ]);

        $tagsId = collect($request->tags)->map(function($tag) {
            return Tag::firstOrCreate(['name' => $tag])->id;
        });

        $post->tags()->attach($tagsId);
        flash()->overlay('Post created successfully.');

        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post = $post->load(['user', 'category', 'tags', 'comments']);

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if($post->user_id != auth()->user()->id && auth()->user()->is_admin == false) {
            flash()->overlay("You can't edit other peoples post.");
            return redirect('/admin/posts');
        }

        $categories = Category::pluck('name', 'id')->all();
        $tags = Tag::pluck('name', 'name')->all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        // disbust cache
        Cache::forget($post->etag);


        $image_name = $request->hidden_image;
        $image = $request->file('post_image');
        if($image != '')
        {
            $post->update([
                'title'       => $request->title,
                'body'        => $request->body,
                'post_image'     =>  $image_name,

                'category_id' => $request->category_id
            ]);
            
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);

        }
        else{
            $post->update([
                'title'       => $request->title,
                'body'        => $request->body,

                'category_id' => $request->category_id
            ]);

        }

 

        $tagsId = collect($request->tags)->map(function($tag) {
            return Tag::firstOrCreate(['name' => $tag])->id;
        });

        $post->tags()->sync($tagsId);
        flash()->overlay('Post updated successfully.');

        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $post = Post::findOrFail($id);
      
        if($post->user_id != auth()->user()->id && auth()->user()->is_admin == false) {
            flash()->overlay("You can't delete other peoples post.");
            return redirect('/admin/posts');
        }
       
        $post->delete();
        flash()->overlay('Post deleted successfully.');

        return redirect('/admin/posts');
    }

    public function publish(Post $post)
    {
        $post->is_published = !$post->is_published;
        $post->save();
        flash()->overlay('Post changed successfully.');

        return redirect('/admin/posts');
    }
    public function publish2($id)
    {
        $post = Post::findOrFail($id);

        $post->is_published = !$post->is_published;
        $post->save();
        flash()->overlay('Post changed successfully.');

        return redirect('/admin/posts');
    }
}
