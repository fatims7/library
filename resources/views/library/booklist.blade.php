@extends('layouts/main')

@section('title')

<div class="section-header d-flex justify-content-between">
    <h1>Library</h1>
</div>

@endsection

@if (Auth::check())

    @section('content')

    <div class="row justify-content-end">

        <form class="col-md-4 mb-3">
            @if (request('category'))
                <input class="form-control" type="hidden" name="category" value="{{ request('category') }}">
            @endif

            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search" name="search">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </div>
        </form>
        </div>
        
        @if ($books->count())
        
            <div class="row mt-2">
                @foreach ($books as $book)

                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card card-library" style="cursor: pointer">
                            <a href="/library/bookdetail/{{ $book->code }}">
                            <img src="{{ $book->image != null ? asset('storage/' . $book->image) : asset('img/cover.png') }}" class="card-img-top" draggable="false" alt="{{ $book->image }}">
                            <div class="card-body">
                                    @if ($book->stock > 0)
                                        <p class="btn btn-success btn-sm">In Stock</p>
                                    @else
                                        <p class="btn btn-danger btn-sm">Out of Stock</p>
                                    @endif

                                    @if (Auth::user()->role === "user")
                                        @foreach ($non as $item)
                                            @if ($item->id == $book->id)
                                                <button class="btn btn-sm add-book-to-read" data-list="{{ $book->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-heart add" viewBox="0 0 16 16">
                                                        <path d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z"/>
                                                    </svg>
                                                </button>
                                            @endif
                                        @endforeach
                                        
                                        @foreach ($book->lists as $item)
                                            @if ($item->book_id == $book->id)
                                                <button class="btn btn-sm add-book-to-read" data-list="{{ $book->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-heart-fill del" viewBox="0 0 16 16">
                                                        <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"/>
                                                    </svg>
                                                </button>
                                            @endif
                                        @endforeach
                                    @endif
                            </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

        @else
            <p class="text-center fs-3">No books found</p>
        @endif          

        <div class="d-flex justify-content-end">
            {{ $books->links() }}
    </div>

    @push('scripts')
        <script>

            $(document).ready(function() {
                // alert('test javascript'); 
                var user_id = '{{ Auth::id() }}';
                
                $('.add-book-to-read').click(function (e) {
                    e.preventDefault();

                    // alert(user_id);

                    var book_id = $(this).data('list');
                    // alert(book_id);
                    
                    $.ajax ({
                        type: "GET",
                        url: "/add-book-to-list",
                        data: {
                            user_id : user_id,
                            book_id : book_id
                        },
                        success:function (response) {
                            // console.log(response);
                            alertify.set('notifier','position', 'top-center');
                            alertify.success(response.status);
                        }

                    });

                });

            });

        </script>
    @endpush



    @endsection


@else

    @section ('content-library')
            
        <div class="row justify-content-end">
        <form class="col-md-4">
            @if (request('category'))
                <input class="form-control" type="hidden" name="category" value="{{ request('category') }}">
            @endif

            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search" name="search">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </div>
        </form>
        </div>

        @if ($books->count())
            
        {{-- data --}}
            <div class="row mt-4">
                @foreach ($books as $book)

                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card card-library" style="cursor: pointer">
                            <a href="bookdetail/{{ $book->code }}">
                            <img src="{{ $book->image != null ? asset('storage/' . $book->image) : asset('img/cover.png') }}" class="card-img-top" draggable="false" alt="{{ $book->image }}">
                            <div class="card-body">
                                @if ($book->stock > 0)
                                    <p class="btn btn-success btn-sm">In Stock</p>
                                @else
                                    <p class="btn btn-danger btn-sm">Out of Stock</p>
                                @endif
                            </a>
                            </div>
                        </div>
                    </div>                  

                @endforeach
            </div>

        @else
            <p class="text-center fs-3">No books found</p>
        @endif

        <div class="d-flex justify-content-end">
        {{ $books->links() }}
        </div>

    @endsection

@endif    