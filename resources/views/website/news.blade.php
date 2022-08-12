@extends('layouts.app')
@section('content')
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-wrap">
        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>

        <div class="space"></div>

        <div class="py-0 mt-md-5">
            <div class="container">
                <div class="half-post-entry d-block d-lg-flex bg-light">
                    <div class="img-bg"
                        style="background-image: url(https://mdbootstrap.com/img/Photos/Vertical/mountain2.jpg);"></div>
                    <div class="contents">
                        <span class="caption">Editor's Pick</span>
                        <h2>
                            <a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a>
                        </h2>
                        <p class="mb-3">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate
                            vero obcaecati natus adipisci necessitatibus eius, enim vel sit ad
                            reiciendis. Enim praesentium magni delectus cum, tempore deserunt
                            aliquid quaerat culpa nemo veritatis, iste adipisci excepturi
                            consectetur doloribus aliquam accusantium beatae?
                        </p>

                        <div class="post-meta">
                            <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">Food</a></span>
                            <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read
                                <span class="icon-star2"></span></span>
                        </div>
                        <div class="row d-flex  justify-content-around">
                            <button class="btn btn-post">LIKE</button>
                            <button class="btn btn-post">SHARE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      

       


       
</body>


@endsection
