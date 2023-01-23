@extends('layouts.app', ['title' => 'Фильмы'])
@section('content')
    <h2 class="text-2xl m-2 flex justify-center">Films loaderType</h2>
    <div class=" bg-gray-50 grid grid-cols-3 items-center justify-center">
        @foreach($films as $film)
            <div class="m-4 rounded-md bg-indigo-200 ">
                {{--                <p>Id: {{$film->id}}</p>--}}
                <div class="m-2">
                    <p>Title: {{$film->title}}</p>
                    <img src="https://image.tmdb.org/t/p/w500/{{$film->poster_path}}">
                </div>
                <div class="m-4 ">
                    <a class="btn rounded-md px-4 py-2 bg-indigo-600 text-white" href="{{route('add',$film->id)}}">Add to favourites</a>
                </div>
            </div>
        @endforeach
    </div>

    {{--   <div>{{ $films->links() }}</div>--}}




@endsection
