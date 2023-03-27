@extends('layouts/main')

@section('title')

<div class="section-header d-flex justify-content-between">
    <h1>Books</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="book">book</a></div>
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
    <a href="book-deleted" class="btn btn-success me-3" style="color:white;" id="test-js">view deleted data</a>
    <a href="book-add" class="btn btn-primary">add new book</a>
</div>


<div class="my-4">
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Book's Code</th>
                <th>Cover</th>
                <th>Title</th>
                <th>Author</th>
                <th>Publisher</th>
                <th>Categories</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($books as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book->code }}</td>

                    <td>
                        <img src="{{ asset('storage/'. $book->image) }}" alt="" width="150px">
                    </td>
                    
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->publisher }}</td>
                    <td>
                        @foreach ($book->categories as $category )
                            {{ $category->name }}
                        @endforeach
                    </td>

                    <td>{{ $book->stock }}</td>

                    <td>
                        <a href="/book-edit/{{ $book->code }}">edit</a>
                        <a href="/book-delete/{{ $book->code }}" onclick="return confirm('anda yakin ingin menghapus buku {{ $book->title }}')">delete</a>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
</div>

{{-- <script>
    alert('test javascript');
    document.getElementById("test-js").innerHTML = "New text!";
    document.getElementById("test-js").style.color = "blue";
</script> --}}
@endsection

