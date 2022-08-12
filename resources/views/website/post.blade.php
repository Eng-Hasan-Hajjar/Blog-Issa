@extends('layouts.app')

@section('content')
<br/>
<br/>
    <div class="container" style="margin-top:100px"  >
        

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $post->title }} - <small>by {{ $post->user->name }}</small>

                        <span class="pull-right">
                            {{ $post->created_at->toDayDateTimeString() }}
                        </span>
                    </div>

                    <div class="panel-body">
                        <p>{{ $post->body }}</p>
                        {{ $post->post_image }}

                        <p>
                            Category: <span class="label label-success">{{ $post->category->name }}</span> <br>
                            Tags:
                            @forelse ($post->tags as $tag)
                                <span class="label label-default">{{ $tag->name }}</span>
                            @empty
                                <span class="label label-danger">No tag found.</span>
                            @endforelse
                            <br/>
                            <img src="{{ URL::to('/') }}/images/{{ $post->post_image }}" class="img-thumbnail" high="300" width="300" />

                        </p>
                    </div>
                </div>


<!--
                @includeWhen(Auth::user(), 'website._form')

                @include('website._comments')
-->
            </div>

        
    </div>
@endsection
