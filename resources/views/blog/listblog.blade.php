@extends('layoutFrontend.app')
@section('isi')
      @foreach ($data as $item)
          <div class="col-md-12 post post-row">
              <a class="post-img" href="{{url('isi',$item->slug)}}"><img src="{{ asset('uploads/posts/'.$item->gambar) }}" alt=""></a>
            <div class="post-body">
                <div class="post-category">
                    <a href="category.html">{{$item->category->name}}</a>
                </div>
                <h3 class="post-title"><a href="{{url('isi',$item->slug)}}">{{$item->judul}}</a></h3>
                <ul class="post-meta">
                    <li><a href="author.html">{{ $item->users->name }}</a></li><br>
                    <li>{{ $item->created_at->diffForhumans() }}</li>
                </ul>
                <p>{!! substr($item->content,0,80) !!}...</p>
            </div>
            <!-- /post -->
          </div>
      @endforeach
      <div class="text-center">{{ $data->links() }}</div>
@endsection
