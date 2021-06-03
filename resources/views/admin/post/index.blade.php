@extends('layoutBackend.app');
@section('sub-judul','Post')
@section('content')
<a href="{{ url('post/create') }}" class="btn btn-info mb-3">Tambah Post</a>
@if (session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif
@if (session()->has('update'))
<div class="alert alert-primary">
    {{ session()->get('update') }}
</div>
@endif
@if (session()->has('delete'))
<div class="alert alert-danger">
    {{ session()->get('delete') }}
</div>
@endif
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Category</th>
                <th>Tags</th>
                <th>Creator</th>
                <th>Gambar</th>
                <th>Action</th>
        </thead>
        <tbody>
            @foreach ($post as $result=>$value)
            <tr>
                <td>{{$result+$post->firstitem()  }}</td>
                <td>{{  $value->judul }} </td>
                <td>{{ $value->category->name }} </td>
                <td>
                    @foreach ($value->tags as $tag)
                    <span class="badge badge-info">{{ $tag->name }}</span>
                    @endforeach
                </td>
                <td>{{ $value->users->name }}</td>
                <td><img src="{{ asset('uploads/posts/'.$value->gambar) }}" class="img-fluid" width="200"></td>
                <td>
                    <form method="POST" action="{{ route('post.destroy',$value->id) }}">
                        <a href="{{ route('post.edit',$value->id) }}" class="btn btn-sm btn-warning">Update</a>
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $post->links() }}
</div>
@endsection
