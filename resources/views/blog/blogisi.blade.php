@extends('layoutFrontend.app')
@section('isi')
@foreach ($data as $item)
<div class="post post-thumb">
                    <a class="post-img" href="blog-post.html"><img src="{{ asset('uploads/posts/'.$item->gambar) }}" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="#">{{ $item->category->name }}</a>
                        </div>
                        <h3 class="post-title title-lg"><a href="blog-post.html">{{ $item->judul }}</a></h3>
                        <ul class="post-meta">
                            <li><a href="#">{{ $item->users->name }}</a></li><br>
                            <li>{{ $item->created_at->diffForhumans() }}</li>
                        </ul>
                    </div>
                </div>
                {!! $item->content !!}
@endforeach
@endsection
