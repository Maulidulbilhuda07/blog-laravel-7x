@extends('layoutBackend.app');
@section('sub-judul','Update Category')
@section('content')
<form method="POST" action="{{ route('category.update',$category->id) }}">
    @csrf
    @method('patch')
    <div class="form-group">
        <label for="name">Name Category</label>
        <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="name">
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
