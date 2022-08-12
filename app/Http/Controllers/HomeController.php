<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Comment;
use App\Category;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
     /*   $posts      = Post::count();
        $comments   = Comment::count();
        $tags       = Tag::count();
        $categories = Category::count();
*/
        return view('home', get_defined_vars());
    }
}
