@extends('layoutBackend.app');
@section('sub-judul','Update User')
@section('content')
<form method="POST" action="{{ route('user.update',$user->id) }}">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="name">Name User</label>
        <input type="text" value="{{ $user->name }}" name="name" class="form-control" id="name">
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">Email User</label>
        <input type="email" value="{{ $user->email }}" name="email" class="form-control" id="email" readonly>
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="tipe">Tipe User</label>
        <select id="tipe" class="form-control" name="tipe">
            <option value="1"
            @if ($user->tipe==1)
                selected
            @endif>Administrator</option>
            <option value="0"
            @if ($user->tipe==0)
                selected
            @endif>Penulis</option>
        </select>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
