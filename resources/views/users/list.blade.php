@extends('layouts/main')

@section('title')

<div class="section-header d-flex justify-content-between">
    <h1>Books I Want to Read</h1>
</div>

@endsection

@section('content')

{{-- {{ $booklist }} --}}
    @if ($booklist->count())
                        
        <div class="row mt-2">
            @foreach ($booklist as $list)

                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card card-library" style="cursor: pointer">
                        <a href="bookdetail/{{ $list->book->code }}">
                        <img src="{{ $list->book->image != null ? asset('storage/' . $list->book->image) : asset('img/cover.png') }}" class="card-img-top" draggable="false" alt="{{ $list->book->image }}">
                        <div class="card-body">
                                @if ($list->book->stock > 0)
                                    <p class="btn btn-success btn-sm">In Stock</p>
                                @else
                                    <p class="btn btn-danger btn-sm">Out of Stock</p>
                                @endif

                                @if (Auth::user()->role === "user")
                                    <button class="btn btn-sm add-book-to-read" data-list="{{ $list->book->id }}">
                                        @if ($list->book_id == $list->book->id)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                                                <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"/>
                                            </svg>
                                    </button>
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
