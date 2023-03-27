@extends('layouts/main')

@section('title')

<div class="section-header d-flex justify-content-between">
    <h1>Add Category</h1>
</div>

@endsection

@section('content')
    <div class="mt-2 w-50">
         @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="" method="post">
            @csrf
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control">
            <div class="mt-3">
                <button class="btn btn-primary" type="submit">save</button>
            </div>
        </form>
        
    </div>
    
@endsection