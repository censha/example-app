@extends('layouts.app', ['title' => 'Главная'])
@section('content')

    <div class="h-screen bg-gray-50 flex items-center justify-center">
        <div class="w-full max-w-lg bg-white shadow-lg rounded-md p-8 space-y-4">
            <h1 class="text-xl font-semibold">Main</h1>
            <div><a href="{{route('registration')}}" class="btn mt-4 rounded-md px-4 py-2 bg-indigo-600 text-white">Registration</a></div>
            <form action="{{ route('userpost') }}" method="post" class="space-y-4">
                @csrf
                <div class="space-y-1">
                    <label for="name" class="block">User-Id</label>
                    <input type="number" name="name" id="name" class="block w-full border-gray-400 rounded-md px-4 py-2" />

                    @if(session()->has('success'))
                        <p class="text-sm text-red-600">{{ session()->get('success')}} </p>
                    @endif
                </div>
                <button class="rounded-md px-4 py-2 bg-indigo-600 text-white">Login</button>
            </form>
        </div>
    </div>
@endsection
