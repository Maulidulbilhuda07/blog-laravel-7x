@extends('layoutBackend.app');
@section('sub-judul','Tambah User')
@section('content')
<form method="POST" action="{{ route('user.store') }}">
    @csrf
    <div class="form-group">
        <label for="name">Name User</label>
        <input type="text" name="name" class="form-control" id="name">
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div><div class="form-group">
        <label for="email">Email User</label>
        <input type="email" name="email" class="form-control" id="email">
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="tipe">Tipe User</label>
        <select id="tipe" class="form-control" name="tipe">
    <option value="">--Pilih Tipe user--</option>
    <option value="1">Administrator</option>
    <option value="0">Penulis</option>
    </select>
      </div>
      <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" id="password">
        </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
