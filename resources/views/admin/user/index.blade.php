@extends('layoutBackend.app');
@section('sub-judul','User')
@section('content')
<a href="{{ route('user.create') }}" class="btn btn-info mb-3">Tambah User</a>
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
                <th>Email</th>
                <th>Type User</th>
                <th>Action</th>
        </thead>
        <tbody>
            @foreach ($user as $result=>$value)
            <tr>
                <td>{{$result+$user->firstitem()  }}</td>
                <td> <?= $value->name ?> </td>
                <td> <?= $value->email  ?> </td>
                <td>@if ($value->tipe)
                   <span class="badge badge-primary">Administrator</span>
                    @else
                <span class="badge badge-Info">Penulis</span>
                @endif</td>
                <td>
                    <form method="POST" action="{{ route('user.destroy',$value->id) }}">
                        <a href="{{ route('user.edit',$value->id) }}" class="btn btn-sm btn-warning">Update</a>
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $user->links() }}
</div>
@endsection
