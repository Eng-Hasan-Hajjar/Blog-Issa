@extends('layouts.app')




@section('content')
<div class="comtainer mt-2">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger"> {{$error}}</div>
        @endforeach
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success"> {{Session::get('success')}}</div>

    @endif
 </div>

 
@if (!Auth::guest())
<div class="comtainer" style="margin-top:100px;margin-left:60px">
     <a href="/gallery" class="btn btn-primary">Upload</a>
</div>
@endif

@if (Auth::guest())
<div class="comtainer" style="margin-top:100px">
 </div>

@endif
<div class="container mt-2">
    <div class="row">
     @forelse($images as $image)
        <div class="col-xl-4 col-lg-4 col-md-6 col-xs-12">
            <div class="card mb-3">
            <a href="{{ url('/website/blogSingle') }}">

             <img src="{{asset($image->image)}}" class="card-img-top img-thumbnail" style="margin:0px"alert="Broken" height="220">
             </a>

             @if(Auth::check())
             @if($image->user_id==Auth::user()->id)
             <div class="card-body">
                <form action="/image2/{{$image->id}}" method="POST" >
                @method('DELETE') 
                @csrf
                    <input type="submit" value="Delete"class="btn btn-danger"style="margin-left:50px">
                </form>
            </div>
            @endif
            @endif
            </div>
          
        </div>
     @empty
     <h1 class="text-danger"> There is no Upload   </h1>
     @endforelse
    </div>
    <div class="row justify-content-center">  
            {{$images->links()}}
    </div>
</div>
@endsection
