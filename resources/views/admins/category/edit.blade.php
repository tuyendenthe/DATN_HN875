@extends('admins.master')

@section('content')
    <h2>Create New Category</h2>

    <form action="{{ route('category.update',$category->id) }}" method="POST"> 
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('category.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection
