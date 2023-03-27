@extends('layouts/main')


@section('title')

<div class="section-header d-flex justify-content-between">
    <h1>Home</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="home">home</a></div>
    </div>
</div>

@endsection


@section('content')

<div class="md-8 mt-4">
  
    <div class="card text-center mt-5 w-100">
        <div class="card-header">
            <h5>
                Home
                <button class="btn btn-primary btn-sm float-end" type="button" data-bs-toggle="collapse"  data-bs-target="#rentLog" aria-expanded="false" aria-controls="rentLog"> -
                </button>
                {{-- <button onclick="test()">test</button> --}}
            </h5>
        </div>

        <div class="collapse-show" id="rentLog">
            <div class="card card-body">
                @if(session('notice'))
                    <div class="alert {{ session('alert-class') }}">
                        {{session('notice')}}
                    </div>
                @endif

                <div class="my-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Books</th>
                                <th>Waktu Peminjaman</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            // alert('test javascript'); 
            showRentLog();
            
        })
        
        function showRentLog () {
            $.ajax ({
                type: "GET",
                url: "rentlogs-show",
                dataType: "json",
                success: function (response) {
                    // console.log(response.rentlog);
                    $('tbody').html("");
                    $.each(response.rentlog, function (key, item) {
                        $('tbody').append('<tr>\
                            <td>'+parseInt(key+1)+'</td>\
                            <td><img src="storage/'+item.book.image+'" alt="" width="150px"></td>\
                            <td>'+item.rent_date+'</td>\
                            <td>\
                                @if ('+item.return_date+' !== null)\
                                    <span class="badge rounded-pill text-bg-success">Selesai Dipinjam</span> \
                                @endif\
                            </td>\
                        </tr>')
                    });
                }
            })
        }
        

    </script>
    
@endpush

@endsection
