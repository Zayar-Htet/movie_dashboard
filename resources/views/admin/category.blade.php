@extends('layouts.master')
@section('title','Category Page')
@section('content')
    <div class="header d-flex justify-content-between bg-white">

        <div class=" ms-3">
            <h1 class="mt-3 text-danger">MOVIES4U</h1>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{route('list#page')}}" method="get">
                    <div class=" mt-3 me-5 d-flex">
                        <input type="text" name="searchKey" value="{{request('searchKey')}}" class=" form-control px-4" placeholder="Search...">
                        <button type="submit" class=" btn btn-danger ms-1"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <div class=" d-flex">
        <div class="text-center rounded bg-dark px-1" style="height: 100vh; width: 250px;">
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
                <div class="alert alert-danger alert-dismissible fade show me-3 fs-4" role="alert">
                    <h4 class=" text-danger">{{session('deleteSuccess')}}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif

                <a href="{{route('create#categoryPage')}}" class="">
                    <button class="btn btn-danger">Add category</button>
                </a>
            </div>

            @if ($category->total()!=0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class=" col-2">Id</th>
                        <th class=" col-2">Category name</th>
                        <th class=" col-2">Date</th>
                        <th class=" col-2">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item)
                    <tr class=" fs-5">
                        <td class=" py-3">{{$item->id}}</td>
                        <td class=" py-3">{{$item->name}}</td>
                        <td class=" py-3">{{$item->updated_at->format('d F Y')}}</td>
                        <td class=" py-3">
                                <div class=" d-flex">
                                    <div class="" title="Edit">
                                        <a href="{{route('update#page',$item->id)}}" class=" me-3">
                                            <i class="fa-solid fa-pen-to-square fs-4"></i>
                                        </a>
                                    </div>

                                    <div class="" title="Delete">
                                        <a href="{{route('delete#category',$item->id)}}">
                                            <i class="fa-solid fa-trash fs-4 text-danger"></i>
                                        </a>
                                    </div>
                                </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <h4 class=" text-center mt-5">There is no category</h4>
                @endif

           <h4>{{$category->appends(request()->query())->links()}}</h4>
        </div>
    </div>
@endsection
