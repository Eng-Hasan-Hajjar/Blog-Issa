@extends('layouts.app')




@section('content')

<div class="container">
 <div class="row justify-content-center">
 <div class="col-md-8">
    <div class="card">
            <div class="card-header">
             Gallery Upload
            </div>
            <div class="card-body">
                <form action="/image2" method="post" enctype="multipart/form-data">
                @csrf   
                    <div class="form-group">
                         <input  type="file" name="image[]"class="form-control-image" multiple accept="image/*">
                    </div>
                    <input  type="submit" value="Upload"class="btn btn-primary">

                </form>
            
            </div>        
    </div>
 </div>
 </div>
</div>
  


@endsection
