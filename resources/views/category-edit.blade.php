@extends('layouts/main')

@section('title')

<div class="section-header d-flex justify-content-between">
    <h1>Edit Category</h1>
</div>

@endsection

@section('content')
    <div class="mt-3 w-50">
         @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/category-edit/{{ $categories->name }}" method="post">
            @csrf
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $categories->name) }}">
            <div class="mt-3">
                <button class="btn btn-primary" type="submit">save</button>
            </div>
        </form>
        
    </div>
    
@endsection