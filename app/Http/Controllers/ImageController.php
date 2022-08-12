<?php

namespace App\Http\Controllers;
use App\Image;
use Session;
use Auth;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(){
        $images=Image::paginate(9);
        return view('galleryView')->with('images',$images);
    }
    public function post(Request $request){
        $this->validate($request,
        [
            'image'=>'required'
        ]);
        $images=$request->image;
        foreach($images as $image){
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('imageGallery',$image_new_name);
            $post=new Image;
            $post->user_id=Auth::user()->id;
            $post->image='imageGallery/'.$image_new_name;
            $post->save();
        }
            Session::flash('success','Image uploaded');
            return redirect('/viewGallery');
    }
    public function destroy($id){
        $image=Image::find($id);
        $image->delete();
        Session::flash('success','Image delete');
        return redirect('/viewGallery');

    }
}

  