@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top:100px">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Posts

                            <a href="{{ url('admin/posts/create') }}" class="btn btn-default pull-right">Create New</a>
                        </h2>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Body</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Tags</th>
                                    <th>Published</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                    <tr>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ Str::limit($post->body, 60) }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>{{ $post->tags->implode('name', ', ') }}</td>
                                        <td>{{ $post->published }}</td>
                                        <td>
                                            @if (Auth::user()->is_admin)
                                                @php
                                                    if($post->published == 'Yes') {
                                                        $label = 'Draft';
                                                    } else {
                                                        $label = 'Publish';
                                                    }
                                                @endphp
                                                <!--
                                                <a href="{{ url('/admin/posts/'.$post->id.'/publish') }}"
                                                 data-method="PUT"
                                                 data-token="{{ csrf_token() }}" data-confirm="Are you sure?" 
                                                 class="btn btn-xs btn-warning">{{ $label }}</a>

                                 <a href="{{route('posts.publish2',$post->id)}}" class="btn btn-xs btn-success">{{ $label }} route</a>
                                                 <form method="PUT" class="publish_form" action="{{route('posts.publish2',$post->id)}}"
                                                        >
                                                    {{csrf_field()}}
                                                    <input type="hidden"  value="publish" />
                                                    <button type="submit" class="btn">form publish</button>
                                                </form>
                                                  <a href="{{ url('/admin/posts/{$post->id}/publish2') }}"
                                                 data-method="PUT"
                                                 data-token="{{ csrf_token() }}" data-confirm="Are you sure?" 
                                                 class="btn btn-xs btn-warning">{{ $label }}</a>
                                                -->
               
                                                 <a href="{{route('posts.publish2',$post->id)}}"
                                                 data-method="PUT"
                                                 data-token="{{ csrf_token() }}" data-confirm="Are you sure?" 
                                                 class="btn btn-xs btn-warning">{{ $label }}</a>
                                            @endif

                                            <a href="{{route('posts.show',$post->id)}}" class="btn btn-xs btn-success">Show</a>
                                          
                                            <a href="{{route('posts.edit',$post->id)}}" class="btn btn-xs btn-info">Edit</a>

                                            <a href="{{route('posts.destroy',$post->id)}}" data-method="DELETE" data-token="{{ csrf_token() }}" data-confirm="Are you sure?" class="btn btn-xs btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No post available.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {!! $posts->links() !!}

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
