<?php

namespace App\Http\Controllers;

use App\Models\Favourites;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function films(){
         //dd(Film::paginate(15)->links());
        return view('film.films',[ 'films' => Film::paginate(15)]);
    }

    public function addFilm($id){
        //dd( auth()->user());
        Favourites::firstOrCreate([
        'user_id' => auth()->user()->id,
            'film_id' => $id,
        ],[
            'user_id' => auth()->user()->id,
            'film_id' => $id,
        ]);
        return redirect()->back();
    }

    public function favourites(){
        $favourites = Favourites::where('user_id', auth()->user()->id)
            ->join('films', 'films.id', '=', 'favourites.film_id')
            ->get();

        return view('film.favourites',['favourites' => $favourites]);
    }

    public function delete_favourites($id){
        $favourites = Favourites::where('film_id', $id)->delete();
        return redirect()->back();
    }

    public function loaderType($metod){
        $favourites = Favourites::where('user_id', auth()->user()->id)
            ->select('film_id')
            ->get();
        if($metod == 'sql') {
            $notfavourites = Film::whereNotIn('id', $favourites)->get();
        }
        if($metod == 'inMemory'){
            $notfavourites = [];
            $films = Film::all();

            foreach ($films as $key => $film ){
                $chek = true;
                foreach ($favourites as $item){
                    if($film->id == $item->film_id)
                        $chek = false;
                }
                if($chek)
                $notfavourites[$key] = $film;
            }
        }
        return view('film.loaderType',[ 'films' => $notfavourites]);
    }



}
