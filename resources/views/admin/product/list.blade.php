@extends('layouts.master')
@section('title','Category Page')
@section('content')
    <div class="header d-flex justify-content-between bg-white">

        <div class=" ms-3">
            <h1 class="mt-3 text-danger">MOVIES4U</h1>
        </div>
        <div class=" my-auto me-5">
            <form action="{{route('movie#listPage')}}" method="get">
                <div class=" me-5 d-flex">
                    <input type="text" name="searchKey" value="{{request('searchKey')}}" class=" form-control px-4" placeholder="Search...">
                    <button type="submit" class=" btn btn-danger ms-1"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
        </div>
    </div>

    <div class=" d-flex">
        <div class="text-center rounded bg-dark px-1" style="height: auto; width: 250px;">
            <a href="{{route('list#page')}}" class="text-decoration-none">
                <div class="btn btn-outline-danger mt-5 d-block text-white ">Category</div>
            </a>
            <a href="{{route('movie#listPage')}}" class="text-decoration-none">
                <div class="btn btn-outline-danger mt-5 d-block text-white ">Movies</div>
            </a>
        </div>
        <div class="col p-4">
            <div class="d-flex float-end me-5 mb-3">
                @if (session('deleteSuccess'))
                <div class="alert alert-danger alert-dismissible fade show me-3" role="alert">
                    <strong class=" text-danger">{{session('deleteSuccess')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif

                <a href="{{route('movie#createPage')}}" class="">
                    <button class="btn btn-danger">Add movie</button>
                </a>
            </div>
            <h3 class="">Movies list</h3>

            <div class="container mt-5">
                <div class="row text-center">
                    @foreach ($movie as $m)
                    <div class=" col-md-6 col-lg-4 mb-4">
                        <a href="{{route('view#page',$m->id)}}">
                            <div class="cardImg">
                                <img class=" shadow-sm rounded-3" style="height: 40vh;" src="{{asset('storage/'.$m->image)}}">
                            </div>
                        </a>
                        <span>{{$m->name}}</span> |
                        <span>120 mins</span>
                    </div>
                    @endforeach
                </div>
                <h5>{{$movie->appends(request()->query())->links()}}</h5>
            </div>

        </div>
    </div>
@endsection
