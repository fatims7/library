@extends('layouts/main')

@section('title')

<div class="section-header d-flex justify-content-between">
    <h1>Categories</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="category">category</a></div>
    </div>
</div>

@endsection

@section('content')

    <div class= "d-flex justify-content-end">
        <a href="category-add" class="btn btn-primary" >add new category</a>
    </div>

    <div class="my-4">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="category-destroy/{{ $category->name }}" onclick="return confirm('anda yakin ingin menghapus kategori {{ $category->name }}')">delete</a>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
@endsection