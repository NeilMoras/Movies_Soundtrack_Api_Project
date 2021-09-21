<?php
//TMDB Class TO LIST THE TOP 20 MOVIES AND SHOWS ON INDEX PAGE

class Tmdb{
    public function displayMovieShowPosters(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.themoviedb.org/3/trending/all/day?api_key=89fab4412ff1e4d00222c4c10a7872e0',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = json_decode(curl_exec($curl));
// print_r($response);
        return $response;
        curl_close($curl);
    }
    }



