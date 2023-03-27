@extends('layouts/main')

@section('title')
    <div class="section-header d-flex justify-content-between">
        <h1>Deleted Items</h1>

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

    @if (request()->route()->uri == 'book-deleted')

        <div class="my-4">
            <table class="table table-books">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Book's Code</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($deleted as $book)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $book->code }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->publisher }}</td>
        
                            <td>
                                <a href="book-restore/{{ $book->code }}">restore</a>
                                <a href="book-destroy/{{ $book->code }}" onclick="return confirm('anda yakin ingin menghapus buku {{ $book->title }}')">delete</a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>

    @elseif (request()->route()->uri == 'user-deleted')
        
    <div class="my-4">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Deleted At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($deleted as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->deleted_at }}</td>
    
                        <td>
                            <a href="user-restore/{{ $user->username }}">restore</a>
                            <a href="user-destroy/{{ $user->username }}" onclick="return confirm('anda yakin ingin menghapus user {{ $user->username }} selamanya?')">delete</a>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
        
    @endif


@endsection