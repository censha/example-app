<?php

namespace App\Console\Commands;

use App\Components\ImportDataClient;
use App\Models\Film;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ImportJsonCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data json TMDB';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //dd('Что то поучилось');
        //$import = new ImportDataClient();
        //$responce = $import->client->request('GET', '');
        //dd(Film::all()->count());

        //return true;
    }
}
