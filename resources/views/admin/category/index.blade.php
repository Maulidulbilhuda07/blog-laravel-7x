@extends('layoutBackend.app');
@section('sub-judul','Catagory')
@section('content')
<a href="{{ url('category/create') }}" class="btn btn-info mb-3">Tambah Category</a>
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
            <th>Name</th>
            <th>Slug</th>
            <th>Action</th>
    </thead>
    <tbody>
        @foreach ($category as $result=>$value)
            <tr>
                <td>{{$result+$category->firstitem()  }}</td>
                <td> <?= $value->name ?> </td>
                <td> <?= $value->slug  ?> </td>
                <td>
                 <form method="POST" action="{{ route('category.destroy',$value->id) }}">
                    <a href="{{ route('category.edit',$value->id) }}" class="btn btn-sm btn-warning">Update</a>
                    @csrf
                    @method('delete')
                     <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                 </form>
                </td>
            </tr>
        @endforeach
    </tbody>
        </table>
        {{ $category->links() }}
    </div>
@endsection
