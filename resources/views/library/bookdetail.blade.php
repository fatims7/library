@extends('layouts/main')

@section('title')

<div class="section-header d-flex justify-content-between">
    <h1>Book's Detail</h1>
</div>

@endsection

@if (Auth::check())

    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-4 mt-4">
                    <img src="{{ $books->image != null ? asset('storage/' . $books->image) : asset('img/cover.png') }}" draggable="false" alt="{{ $books->image }}" height="400">
                </div>
                <div class="col-8 mt-4">
                    <div class="row">
                        <h4>{{ $books->title }}</h4>
                        <p>
                            @foreach ($books->categories as $category )
                                <a href="/books?category={{ $category->name }}">{{ $category->name }}</a>

                                @if( !$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </p>

                    </div>
                    <div class="row">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Author</th>
                                    <td>:</td>
                                    <td>{{ $books->author }}</td>
                                </tr>
                                <tr>
                                    <th>Penerbit</th>
                                    <td>:</td>
                                    <td>{{ $books->publisher }}</td>
                                </tr>
                                <tr>
                                    <th>Sinopsis</th>
                                    <td>:</td>
                                    <td>{{ $books->synopsis }}</td>
                                </tr>
                                <tr>
                                    <th>Stok</th>
                                    <td>:</td>
                                    <td>{{ $books->stock }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <a href="/" class="btn btn-primary">Back</a>
                </div>    
            </div>
        </div>
    @endsection

@else

    @section ('content-library')
    <div class="container">
        <div class="row">
            <div class="col-4 mt-4">
                <img src="{{ $books->image != null ? asset('storage/' . $books->image) : asset('img/cover.png') }}" draggable="false" alt="{{ $books->image }}" height="400">
            </div>
            <div class="col-8 mt-4">
                <div class="row">
                    <h4>{{ $books->title }}</h4>
                    <p class="details">
                        @foreach ($books->categories as $category )
                            <a href="/books?category={{ $category->name }}">{{ $category->name }}</a>

                            @if( !$loop->last)
                                ,
                            @endif
                        @endforeach
                    </p>
                </div>
                <div class="row">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Author</th>
                                <td>:</td>
                                <td>{{ $books->author }}</td>
                            </tr>
                            <tr>
                                <th>Penerbit</th>
                                <td>:</td>
                                <td>{{ $books->publisher }}</td>
                            </tr>
                            <tr>
                                <th>Sinopsis</th>
                                <td>:</td>
                                <td>{{ $books->synopsis }}</td>
                            </tr>
                            <tr>
                                <th>Stok</th>
                                <td>:</td>
                                <td>{{ $books->stock }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <a href="/" class="btn btn-primary btn-details">Back</a>
            </div>    
        </div>
    </div>
    @endsection

@endif    
