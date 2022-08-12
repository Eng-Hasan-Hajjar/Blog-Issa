
@extends('layouts.app')



@section('content')

            <div class="container">
            <div class="about-it d-flex justify-content-center align-items-stretch row">
                <div class="col-md-6 col-12">
                    <a href="{{ url('/website/exhibition') }}">
                        <div class="exhibitions"
                            style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(35).jpg');">
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-12">
                    <a href="{{ url('/website/exhibition') }}">
                        <div class="exhibitions"
                            style="background-image: url('https://mdbootstrap.com/img/Photos/Vertical/mountain3.jpg');">
                        </div>
                    </a>
                </div>
            </div>
        </div>

@endsection