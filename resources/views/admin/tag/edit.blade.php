@extends('layoutBackend.app');
@section('sub-judul','Update Tag')
@section('content')
<form method="POST" action="{{ route('tag.update',$tag->id) }}">
    @csrf
    @method('patch')
    <div class="form-group">
        <label for="name">Name Tag</label>
        <input type="text" name="name" value="{{ $tag->name }}" class="form-control" id="name">
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
