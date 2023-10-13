@extends('layouts.main')

@section('container')

<div class="btn btn-">
    <a href="/user/create">ADD</a>
</div>


@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td class="d-flex">
                <a href="user/{{ $user->id }}/edit" class="btn btn-warning text-decoration-none">Edit</a>
                <form action="user/{{ $user->id }}" method="POST">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger mx-1">DELETE</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
