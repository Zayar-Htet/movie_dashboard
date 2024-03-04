@extends('layouts.master')
@section('title','Update Category')
@section('content')

<div class=" w-100 d-flex justify-content-center align-items-center bg-white" style="height: 50vh">
    <form action="{{route('update#category')}}" method="POST" class=" text-center " style="width: 300px;">
        @csrf
        <a href="{{route('list#page')}}" title="Back">
            <i class="fa-solid fa-arrow-left fs-5 float-start text-danger"></i>
        </a>

        <input type="hidden" value="{{$category->id}}" name="categoryId">

        <h4 class=" mt-5">Category update Form</h4>
        <input type="text" value="{{old('category',$category->name)}}" class=" form-control mt-3 @error('category') is-invalid
        @enderror" autofocus placeholder="Create your category" name="category">
        @error('category')
            <small class=" text-danger">{{$message}}</small>
        @enderror
            <button type="submit" class=" btn btn-danger float-end mt-3">Update</button>
    </form>
</div>

@endsection()
