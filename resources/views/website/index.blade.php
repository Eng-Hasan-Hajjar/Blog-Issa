@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top:100px" >

        @include('website._search')

        <div class="row" style="margin-top:50px" >

<div class="container"  >

 <div class="col-md-12" >
                @forelse ($posts as $post)
                <br/><hr>
                    <div class="panel panel-default"style="background:#15385e; padding:10px" >
                        <div class="panel-heading">
                            {{ $post->title }} - <small>by {{ $post->user->name }}</small>

                            <span class="pull-right">
                                {{ $post->created_at->toDayDateTimeString() }}
                            </span>
                        </div>

                        <div class="img-bg">
                            <img src="{{ URL::to('/') }}/images/{{ $post->post_image }}" class="img-thumbnail" width="900" />
                        </div>

                        <div class="panel-body">
                            <p>{{ Str::limit($post->body, 200) }}</p>
                            <p>
                                Tags:
                                @forelse ($post->tags as $tag)
                                    <span class="label label-default">{{ $tag->name }}</span>
                                @empty
                                    <span class="label label-danger">No tag found.</span>
                                @endforelse
                            </p>
                            <p>
                                <span class="btn btn-sm btn-success blue-hover">{{ $post->category->name }}</span>
 
                                <a href="{{ url("/posts/{$post->id}") }}" class="btn btn-sm btn-primary blue-hover">See more</a>
                            </p>
                        </div>
                     
                        
                    </div>
                @empty
                    <div class="panel panel-default">
                        <div class="panel-heading">Not Found!!</div>

                        <div class="panel-body">
                            <p>Sorry! No post found.</p>
                        </div>
                    </div>
                @endforelse
<!--
                <div align="center">
                    {!! $posts->appends(['search' => request()->get('search')])->links() !!}
                </div>
-->
            </div>

</div>


        </div>
    </div>
@endsection
