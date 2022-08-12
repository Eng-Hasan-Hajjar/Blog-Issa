
@extends('layouts.app')



@section('content')



<div class="container about-it">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"">
                <ol class=" carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active"
                        style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(100).jpg');">
                    </div>
                    <div class="carousel-item"
                        style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(20).jpg');">
                    </div>
                    <div class="carousel-item"
                        style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(70).jpg');">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
</div>


@endsection