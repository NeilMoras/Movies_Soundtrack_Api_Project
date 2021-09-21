<?php

define('TRAKT_URL', 'https://api.trakt.tv');

$TRAKT = array(
  'client_id' => 'd6bd42c638c8b6e04f4078f84cc2f2717ae43f813de38e34293be8c99044d18e',
  'client_secret' => '9b7355f665c7505193199b1b124d6a9248b850a367f064deb9f15f2e232c9a47',
  'redirect_uri' => 'http://localhost:8000/index.php',
  'state' => 'nmnmjkjkpmp92m'
);

class Trakt{
public function display_trending_movies($config,string $limitNum) {
  $url = TRAKT_URL . '/movies/trending?limit='. $limitNum ;
  $headers = array(
    "Content-Type:application/json",
    "trakt-api-version:2",
    "trakt-api-key:$config[client_id]",
  );
  $opts = array(
    'http' => array(
      'header' => $headers,
      'method' => 'GET'
    )
  );
  $context = stream_context_create($opts);
  $movieListResult = json_decode(file_get_contents($url, false, $context));
  return $movieListResult ;

}

public function display_trending_shows($config,$limitNum) {
  $url = TRAKT_URL . '/shows/trending?limit=' .$limitNum;
  $headers = array(
      "Content-Type:application/json",
      "trakt-api-version:2",
      "trakt-api-key:$config[client_id]",
  );
  $opts = array(
      'http' => array(
          'header' => $headers,
          'method' => 'GET'
      )
  );
  $context = stream_context_create($opts);
  $showListResult = json_decode(file_get_contents($url, false, $context));
  return $showListResult ;

}
}
//SEARCH MOVIE FOR FUTURE PROJECT ENHANCEMENT AND REFINEMENT

//function display_searched_movie_show($config,$searchName) {
//  $url = TRAKT_URL . '/search/type?query='. $searchName;
//  $headers = array(
//      "Content-Type:application/json",
//      "trakt-api-version:2",
//      "trakt-api-key:$config[client_id]",
//  );
//  $opts = array(
//      'http' => array(
//          'header' => $headers,
//          'method' => 'GET'
//      )
//  );
//  $context = stream_context_create($opts);
//  $searchResult = json_decode(file_get_contents($url, false, $context));
//  return $searchResult;
//
//}
?>
