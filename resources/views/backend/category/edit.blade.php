@extends('backend.layout')
@section('content')
    <h1>Edit Category</h1>
    <form action="{{ route('categories.update', $id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="categoryName">Category Name</label>
            <input type="text" name="categoryName" id="categoryName" class="form-control" value="{{ old('categoryName', $category->name) }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
@endsection