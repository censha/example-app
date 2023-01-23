<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function show(){
        return view('user.user',['user' => auth()->user()]);
    }

    public function updated(Request $request){
        $user = auth()->user();
        if($user->username != $request->username)
            $request->validate([
                'username' => ['required', 'unique:users,username'],

            ]);
        if($user->email != $request->email)
            $request->validate([
                'email' => ['required', 'unique:users,email'],
            ]);
        User::where('id', auth()->user()->id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email
        ]);
        return redirect()->route('show');
    }

    public function delete(){
        User::find(auth()->user()->id)->delete();
        return redirect()->route('home');
    }

    public function posts(){
        if(Film::all()->count() % 20 > 0)
        $factor = intdiv(Film::all()->count(), 20) + 1;
        else
            $factor = intdiv(Film::all()->count(), 20);
        //dd(Film::all());
        $page = [1,2,3,4,5];
        $responce[0] = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/discover/movie?api_key=5fef3682ae720cb845975a34c92ac34b&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page='.$page[0] + $factor);
        $responce[1] = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/discover/movie?api_key=5fef3682ae720cb845975a34c92ac34b&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page='.$page[1] + $factor);
        $responce[2] = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/discover/movie?api_key=5fef3682ae720cb845975a34c92ac34b&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page='.$page[2] + $factor);
        $responce[3] = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/discover/movie?api_key=5fef3682ae720cb845975a34c92ac34b&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page='.$page[3] + $factor);
        $responce[4] = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/discover/movie?api_key=5fef3682ae720cb845975a34c92ac34b&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page='.$page[4] + $factor);

            //dd($responce[0]->object()->results);
        foreach ( $responce as $elem){
            foreach ($elem->object()->results as $item){
                //dd($item);
                Film::firstOrCreate([
                    'title' => $item->title,
                ],[
                    'title' => $item->title,
                    'poster_path' => $item->poster_path,
                ]);
            }
        }
        //dd(Film::all()) ;
    }
}
