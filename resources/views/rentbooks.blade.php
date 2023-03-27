@extends('layouts/main')

@section('title')

<div class="section-header d-flex justify-content-between">
    <h1>Rent Books</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="book">book</a></div>
    </div>
</div>

@endsection

@section('content')

<div class="mt-3">
    @if(session('message'))
        <div class="alert {{ session('alert-class') }}">
            {{session('message')}}
        </div>
    @endif
</div>

<div class="md-8 mt-2">
    <div class="card text-center w-100">
        <div class="card-header">
            <h5>
                Peminjaman Buku Hardcopy
                <button class="btn btn-primary btn-sm float-end" type="button" data-bs-toggle="collapse"  data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> -
                </button>
            </h5>
        </div>

        <div class="collapse show" id="collapseExample">
            <div class="card card-body">
                    
                <form action="" method="post">
                    @csrf
                    <div class="mt-3">
                        <label for="user">Peminjam</label>
                        <select name="user_id" id="user" class="form-control">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->username }}</option>
                            @endforeach
                        </select>
                    </div>
    
                    <div class="mt-3">
                        <label for="books">Buku yang Dipinjam</label>
                        <select name="book_id" id="books" class="form-control">
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}">{{ $book->title }}</option>
                            @endforeach
                        </select>
                    </div>
    
                    <div>
                        <button type="submit" class="btn btn-primary mt-3">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
   
    <div class="card text-center mt-5 w-100">
        <div class="card-header">
            <h5>
                Rent Logs
                <button class="btn btn-primary btn-sm float-end" type="button" data-bs-toggle="collapse"  data-bs-target="#rentLog" aria-expanded="false" aria-controls="rentLog"> -
                </button>
            </h5>
        </div>

        <div class="collapse show" id="rentLog">
            <div class="card card-body">

                <div class="my-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>User</th>
                                <th>Book's Title</th>
                                <th>Waktu Peminjaman</th>
                                <th>Batas Peminjaman</th>
                                <th>Waktu Pengembalian</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($rentlogs as $rentlog)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $rentlog->user->username }}</td>
                                    <td>{{ $rentlog->book->title }}</td>
                                    <td>{{ $rentlog->rent_date }}</td>
                                    <td>{{ $rentlog->deadline }}</td>
                                    <td>{{ $rentlog->return_date }}</td>
                                    <td>
                                        @if ($rentlog->return_date !== null)
                                            <span class="badge rounded-pill text-bg-success">Selesai Dipinjam</span> 
                                        @else
                                            <span class="badge rounded-pill text-bg-primary">Sedang Dipinjam</span> 
                                        @endif
                                    </td>

                                    <td>
                                        @if ($rentlog->return_date === null)
                                            <form action="/returnbook/{{ $rentlog->id }}" method="post">
                                                @csrf
                                                <button class="btn btn-sm return" type="submit">return</button>
                                            </form>

                                            <a href="/rentbooks-cancel/{{  $rentlog->id  }}" class="btn btn-sm cancel" onclick="return confirm('anda yakin ingin membatalkan peminjaman {{ $rentlog->title }}')">cancel</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection