@extends('layouts/main')

@section('title')

<div class="section-header d-flex justify-content-between">
    <h1>Add Book</h1>
</div>

@endsection

@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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

        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="code" class="form-label">Code</label>
                <input type="text" name="code" id="code" class="form-control">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image Cover</label>
                <input class="form-control" type="file" id="image" name="image">
              </div>
            
            <div>
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            
            <div>
                <label for="author" class="form-label">Author</label>
                <input type="text" name="author" id="author" class="form-control">
            </div>
            
            <div>
                <label for="publisher" class="form-label">Publisher</label>
                <input type="text" name="publisher" id="publisher" class="form-control">
            </div>

            <div>
                <label for="category" class="form-label">Category</label>
                <select class="form-control select-multiple" aria-label="Default select example" name="categories[]" multiple>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-3">
                <label for="synopsis" class="form-label">Synopsis</label>
                <textarea name="synopsis" id="synopsis" cols="30" rows="10" class="form-control" id="synopsis" style="height: 100px"></textarea>
            </div>
            
            <div>
                <label for="stock" class="form-label">Stock</label>
                <input type="text" name="stock" id="stock" class="form-control">
            </div>

            <div class="mt-3">
                <button class="btn btn-primary" type="submit">save</button>
            </div>
        </form>
        
    </div>
    
    @push('scripts')

        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.select-multiple').select2();
            });
        </script>
        
    @endpush

@endsection