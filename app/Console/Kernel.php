<?php

namespace App\Console;

use App\Models\Film;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function (){
            if(Film::all()->count() % 20 > 0)
                $factor = intdiv(Film::all()->count(), 20) + 1;
            else
                $factor = intdiv(Film::all()->count(), 20);
            $page = [1,2,3,4,5];
            $responce[0] = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/discover/movie?api_key=5fef3682ae720cb845975a34c92ac34b&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page='.$page[0] + $factor);
            $responce[1] = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/discover/movie?api_key=5fef3682ae720cb845975a34c92ac34b&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page='.$page[1] + $factor);
            $responce[2] = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/discover/movie?api_key=5fef3682ae720cb845975a34c92ac34b&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page='.$page[2] + $factor);
            $responce[3] = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/discover/movie?api_key=5fef3682ae720cb845975a34c92ac34b&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page='.$page[3] + $factor);
            $responce[4] = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/discover/movie?api_key=5fef3682ae720cb845975a34c92ac34b&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page='.$page[4] + $factor);
            //dd($responce[0]->object()->results);
            foreach ( $responce as $elem){
                foreach ($elem->object()->results as $item){
                    Film::firstOrCreate([
                        'title' => $item->title,
                    ],[
                        'title' => $item->title,
                        'poster_path' => $item->poster_path,
                    ]);
                }
            }
        })->everyThreeHours();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
