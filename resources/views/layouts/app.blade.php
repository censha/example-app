<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>
<body>
<div class="mt-4 flex justify-center ">
    <a href="{{route('favourites')}}" class="mx-3 rounded-md p-1 bg-blue-400 hover:bg-yellow-200">Favourites</a>
    <a href="{{route('films')}}" class="mx-3 rounded-md p-1 bg-blue-400 hover:bg-yellow-200">Films</a>
    <a href="{{route('show')}}" class="mx-3 rounded-md p-1 bg-blue-400 hover:bg-yellow-200">User</a>
    <a href="{{route('loaderType', 'inMemory')}}" class="mx-3 rounded-md p-1 bg-blue-400 hover:bg-yellow-200">loaderType=inMemory</a>
    <a href="{{route('loaderType', 'sql')}}" class="mx-3 rounded-md p-1 bg-blue-400 hover:bg-yellow-200">loaderType=sql</a>
    <form method="post" action="{{route('logout')}}">
        @csrf
        <button class="mx-3 rounded-md p-1 bg-blue-400 hover:bg-yellow-200">logout</button>
    </form>

</div>



@yield('content')
<script src="https://unpkg.com/tailwindcss-jit-cdn"></script>
</body>
</html>
