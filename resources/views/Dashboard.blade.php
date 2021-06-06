@extends('layoutFrontend.app')
@section('isi')
                    <div class="post post-thumb">
                        <a class="post-img" href="blog-post.html"><img src="{{ asset('frontend/img/hot-post-1.jpg') }}"
                                alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">Lifestyle</a>
                            </div>
                            <h3 class="post-title title-lg"><a href="blog-post.html">Postea senserit id eos, vivendo
                                    periculis ei qui</a></h3>
                            <ul class="post-meta">
                                <li><a href="author.html">John Doe</a></li>
                                <li>20 April 2018</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /post -->
                </div>
                <div class="col-md-4 hot-post-right">
                    <!-- post -->
                    <div class="post post-thumb">
                        <a class="post-img" href="blog-post.html"><img src="{{ asset('frontend/img/hot-post-2.jpg') }}"
                                alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">Lifestyle</a>
                            </div>
                            <h3 class="post-title"><a href="blog-post.html">Sed ut perspiciatis, unde omnis iste natus
                                    error sit</a></h3>
                            <ul class="post-meta">
                                <li><a href="author.html">John Doe</a></li>
                                <li>20 April 2018</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /post -->

                    <!-- post -->
                    <div class="post post-thumb">
                        <a class="post-img" href="blog-post.html"><img src="{{ asset('frontend/img/hot-post-2.jpg') }}"
                                alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">Fashion</a>
                                <a href="category.html">Lifestyle</a>
                            </div>
                            <h3 class="post-title"><a href="blog-post.html">Mel ut impetus suscipit tincidunt. Cum id
                                    ullum laboramus persequeris.</a></h3>
                            <ul class="post-meta">
                                <li><a href="author.html">John Doe</a></li>
                                <li>20 April 2018</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /post -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8">
                    <!-- row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title">
                                <h2 class="title">Recent posts</h2>
                            </div>
                        </div>
                        @foreach ($data as $item)
                        <!-- post -->
                        <div class="col-md-6">
                            <div class="post">
                                <a class="post-img" href="{{url('isi',$item->slug)}}"><img src="{{ asset('uploads/posts/'.$item->gambar) }}"
                                        alt=""></a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="category.html">{{ $item->category->name }}</a>
                                    </div>
                                    <h3 class="post-title"><a href="{{url('isi',$item->slug)}}">{{ $item->judul }}</a></h3>
                                    <ul class="post-meta">
                                        <li><a href="#">{{ $item->users->name }}</a></li><br>
                                        <li>{{ $item->created_at->diffForhumans() }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /post -->
                        @endforeach
                    </div>
@endsection
