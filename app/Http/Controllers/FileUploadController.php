<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
//
//use Illuminate\Support\Facades\File;

class FileUploadController extends Controller
{
    public function createForm(){
        return view('image-upload');
      }
      
  public function fileUpload(Request $req){
     // dd($req);

    $req->validate([
    'file' => 'max:2048'
    ]);

    $fileModel = new File;
 //dd($fileModel);

    if($req->file()) {
  
        $fileName = time().'_'.$req->file->getClientOriginalName();
        $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

        $fileModel->name = time().'_'.$req->file->getClientOriginalName();
        $fileModel->file_path = '/storage/' . $filePath;
        $fileModel->save();

        return back()
        ->with('success','File has been uploaded.')
        ->with('file', $fileName);
    }
}
}
