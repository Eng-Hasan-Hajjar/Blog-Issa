<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
class VideoController extends Controller
{
    public function index(){
        return view('admin.videos.createVideos');
    }
    
    public function create()
    {
        $videos = Video::pluck('video_name', 'id')->all();

        return view('admin.videos.createVideos', compact('videos'));
    }
    public function store(PostRequest $request)
    {   
        $video = $request->file('video_name');
     //  $image = $request->post_image;
       // dd($image);
       $new_name = rand() . '.' . $video->getClientOriginalExtension();
       $video->move(public_path('videos'), $new_name);
    //  $image->move(public_path('images'), $image);

        $post = Video::create([
            
            'video_name'     =>  $new_name,
        ]);

    

     
        flash()->overlay('Post created successfully.');

        return redirect('/admin/videos');
    }
    public function create2(Request $request){
        
        $videos=$request->video;
        foreach($videos as $video){
            $video_new_name = time().$video->getClientOriginalName();
            $video->move('videos',$video_new_name);
            $post=new Video;
            $post->user_id=Auth::user()->id;
            $post->video='videos/'.$video_new_name;
            $post->save();
        }
            Session::flash('success','Video uploaded');
            return redirect('/video');
    }
    public function destroy($id){
        $video=Video::find($id);
        $video->delete();
        Session::flash('success','Video delete');
        return redirect('/video');

    }
}
