@extends('layouts.master')
@section('content')
<form action="{{route('create#movie')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-8 col-sm-7 col-lg-6 mt-4 mx-auto">
        <h1 class="col-sm text-center">Create movie</h1>
        <a href="{{route('movie#listPage')}}"><i class="fa-solid fa-arrow-left text-dark fs-4 mb-3 ms-4"></i></a>
        <div class="card p-3">
            <div class="card-body">
                <div class=" mb-3">
                    <label for="">Name</label>
                    <input class=" form-control @error('name') is-invalid
                    @enderror" type="text" name="name" autofocus>
                    @error('name')
                        <small class=" text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class=" mb-3">
                    <label for="">Image</label>
                    <input class=" form-control @error('image')
                    @enderror" type="file" name="image">
                    @error('image')
                        <small class=" text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class=" mb-3">
                    <label for="">Category</label>
                    <select class=" form-control @error('categoryId')
                    @enderror" name="categoryId">
                    <option value="">Choose your category</option>
                        @foreach ($category as $c)
                            <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select>
                    @error('categoryId')
                        <small class=" text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class=" mb-3">
                    <label for="">Released Date</label>
                    <input class=" form-control @error('releasedDate')
                    @enderror" type="number" name="releasedDate">
                    @error('releasedDate')
                        <small class=" text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class=" mb-3">
                    <label for="">Length</label>
                    <input class=" form-control @error('length')
                    @enderror" type="number" name="time">
                    @error('time')
                        <small class=" text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class=" mb-3">
                    <label for="">Description</label>
                    <textarea class=" form-control @error('description')
                    @enderror" name="description" rows="10"></textarea>
                    @error('description')
                        <small class=" text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class=" btn btn-danger float-end my-3">Create</button>
    </div>
</form>
@endsection
