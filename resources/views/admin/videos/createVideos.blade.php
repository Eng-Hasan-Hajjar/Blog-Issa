@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:100px" >
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

   {!! Form::open(['url' => '/admin/videos', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form','files'=> true]) !!}

        
            <div class="form-group{{ $errors->has('video_name') ? ' has-error' : '' }}">
                {!! Form::label('video_name', 'Video:',['class'=> 'col-md-2 control-label'] ) !!}
            
                <div class="col-md-8">
                {!! Form::file('video_name', null, ['class'=>'form-control'])!!}

                        <span class="help-block">
                            <strong>{{ $errors->first('video_name') }}</strong>
                        </span>
                </div>
            </div>
            <br />


                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary">
                                        Create Video
                                    </button>
                                </div>
                            </div>

      {!! Form::close() !!}













                    </div>

                    
                </div>
            </div>

        </div>
    </div>


@endsection