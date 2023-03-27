@extends('layouts/main')

@section('title')

<div class="section-header d-flex justify-content-between">
    <h1>Users</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="user">user</a></div>
    </div>
</div>

@endsection

@section('content')

<div class="mt-3">
    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
</div>

<div class= "d-flex justify-content-end">
    <a href="user-deleted" class="btn btn-success me-3" style="color:white;" id="test-js">view deleted data</a>
</div>

<div class="my-4">
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Username</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>
                        <a href="/user-delete/{{ $user->username }}" onclick="return confirm('anda yakin ingin menghapus user {{ $user->username }}')">delete</a>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>

@endsection