@extends('layouts.app', ['title' => 'Пользователь?'])
@section('content')
    <div class="h-screen bg-gray-50 flex items-center justify-center">
        <div class="w-full max-w-lg bg-white shadow-lg rounded-md p-8 space-y-4">
            <h1 class="text-xl font-semibold">Login</h1>
            <form action="{{ route('updated_user') }}" method="post" class="space-y-4">
                @csrf
                <div class="space-y-1">
                    <label  class="block">Id - {{$user->id}}</label>
                </div>
                <div class="space-y-1">
                    <label for="name" class="block">Name</label>
                    <input type="text" name="name" id="name" value="{{$user->name}}" class="block w-full border-gray-400 rounded-md px-4 py-2" />
                    @error('name')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="space-y-1">
                    <label for="username" class="block">Username</label>
                    <input type="text" name="username" id="username" value="{{$user->username}}" class="block w-full border-gray-400 rounded-md px-4 py-2" />
                    @error('username')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="space-y-1">
                    <label for="email" class="block">Email</label>
                    <input type="email" name="email" id="email" value="{{$user->email}}" class="block w-full border-gray-400 rounded-md px-4 py-2" />
                    @error('email')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <button class="rounded-md px-4 py-2 bg-indigo-600 text-white">Change</button>
                </form>
                <div><a href="{{route('delete')}}" class="btn mt-4 rounded-md px-4 py-2 bg-indigo-600 text-white">Delete</a></div>
        </div>
    </div>
@endsection
