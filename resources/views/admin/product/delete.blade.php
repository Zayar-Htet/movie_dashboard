@extends('layouts.master')
@section('content')
<div class="container">
    <div class="card p-5 mt-3">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class=" mt-5 mb-3">
                    <a href="{{route('movie#listPage')}}" title="Back"><i class="fa-solid fa-arrow-left mb-3 fs-4 text-dark"></i></a>
                    <div class="" style="width: 250px; height: 400px;">
                        <img class="rounded w-100" src="{{asset('storage/'.$data->image)}}" alt="">
                        {{-- <input type="file" class=" form-control mt-2"> --}}
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-5">
                <div class=" mb-3">
                    <label for="">Movie name</label>
                    <input type="text" value="{{$data->name}}" class=" form-control" autofocus placeholder="Enter movie name" disabled>
                </div>
                <div class=" mb-3">
                    <label for="">Movie length</label>
                    <input type="number" value="{{$data->time}}" class=" form-control" placeholder="Enter movie length" disabled>
                </div>
                <div class=" mb-3">
                    <label for="">Released date</label>
                    <input type="number" value="{{$data->released_date}}" class=" form-control" placeholder="Enter movie released date" disabled>
                </div>
                <div class=" mb-3">
                    <label for="">Movie review</label>
                    <textarea class=" form-control" rows="10" name="" placeholder="Enter movie review" disabled>{{$data->description}}</textarea>
                </div>
                <button class=" btn btn-danger">Create movie</button>
            </div>

        </div>
    </div>



</div>
@endsection
