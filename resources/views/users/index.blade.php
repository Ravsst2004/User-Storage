@extends('layouts.main')

@section('container')

<a href="/user/create" class="btn btn-primary text-decoration-none">ADD</a>


@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<table class="table mt-1">
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
        @if ($users->count())
        @foreach ($users as $user)
        <tr>
            <th scope="row">{{ $users->firstItem() + $loop->index }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td class="d-flex">
                <a href="user/{{ $user->id }}/edit" class="btn btn-warning text-decoration-none">Edit</a>
                <form action="user/{{ $user->id }}" method="POST" id="delete-form">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger mx-1">DELETE</button>
                </form>
            </td>
        </tr>
        @endforeach
        @else
            <h1>User Not Found!</h1>
        @endif
    </tbody>


</table>

{{ $users->links() }}
@endsection
