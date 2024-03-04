@extends('layouts.master')
@section('content')
<div class="container">
    <div class="card p-5 mt-3">
        <form action="{{route('update#movie')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class=" mt-5 mb-3">

                        <div class="" style="cursor: pointer;" onclick="history.back()">
                                <i class="fa-solid fa-arrow-left mb-3 fs-4 text-dark"></i>
                        </div>
                        <div class="" style="width: 250px; height: 400px;">
                            <img class="rounded w-100" src="{{asset('storage/' .$data->image)}}">
                            <input type="file" class=" form-control mt-2" name="image">
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-5">
                    <input type="hidden" name="movieId" value="{{$data->id}}">
                    <div class=" mb-3">
                        <label for="">Movie name</label>
                        <input name="name" type="text" value="{{$data->name}}" class=" form-control" autofocus placeholder="Enter movie name">
                    </div>
                    <div class=" mb-3">
                        <label for="">Category</label>
                        <select class=" form-control" name="categoryId">
                            @foreach ($category as $c)
                                <option value="{{$c->id}}" @if ($c->id==$data->category_id) selected
                                @endif>{{$c->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class=" mb-3">
                        <label for="">Movie length</label>
                        <input name="time" type="number" value="{{$data->time}}" class=" form-control" placeholder="Enter movie length">
                    </div>
                    <div class=" mb-3">
                        <label for="">Released date</label>
                        <input name="releasedDate" type="number" value="{{$data->released_date}}" class=" form-control" placeholder="Enter movie released date">
                    </div>
                    <div class=" mb-3">
                        <label for="">Movie review</label>
                        <textarea class=" form-control" rows="10" name="description" placeholder="Enter movie review">{{$data->description}}</textarea>
                    </div>
                    <div class=" float-end">
                            <button type="submit" class=" btn btn-secondary">Update movie</button>
                    </div>
                </div>

            </div>
        </form>

    </div>



</div>
@endsection
