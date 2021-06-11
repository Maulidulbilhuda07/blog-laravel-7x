@extends('layoutFrontend.app')
@section('isi')
                    <div class="post post-thumb">
                        <a class="post-img" href="blog-post.html"><img height="510" src="{{ asset('uploads/posts/'.$trending->gambar) }}"
                                alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">{{ $trending->category->name }}</a>
                            </div>
                            <h3 class="post-title"><a href="{{url('isi',$trending->slug)}}">{{ $trending->judul }}</a></h3>
                            <ul class="post-meta">
                                <li><a href="#">{{ $trending->users->name }}</a></li><br>
                                <li>{{ $trending->created_at->diffForhumans() }}</li><br>
                            </ul>
                            <div class="text-danger">
                                Trending {{ $trending->read}}X Dibaca
                            </div>
                        </div>
                    </div>
                    <!-- /post -->
                </div>
                <div class="col-md-4 hot-post-right">
                    <div class="row">
                        <div class="col-md-12">
                           @foreach ($random_posts as $random)
<div class="post post-thumb">
        <a class="post-img" href="blog-post.html"><img height="510" src="{{ asset('uploads/posts/'.$random->gambar) }}"
                alt=""></a>
        <div class="post-body">
            <div class="post-category">
                <a href="category.html">{{ $random->category->name }}</a>
            </div>
            <h3 class="post-title"><a href="{{url('isi',$random->slug)}}">{{ $random->judul }}</a></h3>
            <ul class="post-meta">
                <li><a href="#">{{ $random->users->name }}</a></li><br>
                <li>{{ $random->created_at->diffForhumans() }}</li><br>
            </ul>
        </div>
    </div>
                           @endforeach
                        </div>
                    </div>
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
