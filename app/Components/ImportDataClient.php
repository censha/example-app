<?php

namespace App\Components;

use GuzzleHttp\Client;

class ImportDataClient
{
    public $client;

    public function __construct(){
        $this->client = new Client([
           'base_url' => 'https://api.themoviedb.org/3/movie/popular?api_key=5fef3682ae720cb845975a34c92ac34b&language=en-US&page=1',
            //'base_url' => 'https://jsonplaceholder.typicode.com/',
            'timeout' => 10.0,
            'verify' => false,
        ]);
    }


}
