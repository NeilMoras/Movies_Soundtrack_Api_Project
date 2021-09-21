<?php

require_once 'Models/tmdb.php';

$response = new Tmdb();
$posterList = $response->displayMovieShowPosters();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="referrer" content="origin">
    <meta name="description" content="Movies/Shows Poster Page">
    <meta name="author" content="Neil Moras">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <title>Main Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
</head>
<body>

<main>
    <div class="wrapper">
        <div class="heading-div">
        <h1>Welcome to Trending Movies, Shows + Soundtrack API app</h1>
            <p>An API project integrating TRAKT + Deezer API and a hint of Tmdb API</p>
            <p>Below Poster images are top 20 Trending combination of Movies and Shows of the week.</p>
        </div>
        <div class="movie-show-img-flex-container">
        <?php foreach ($posterList->results as $movies) {
            if(empty($movies->title) || empty($movies->original_title) ){?>
            <a href="movie-show-options.php"><img src="https://image.tmdb.org/t/p/w500<?= $movies->poster_path?>"  alt= "Cover image of movie/show name <?=$movies->name ?>"></a>
        <?php } elseif(empty($movies->name)) { ?>
                <a href="movie-show-options.php"><img src="https://image.tmdb.org/t/p/w500<?= $movies->poster_path?>"  alt= "Cover image of movie/show name <?=$movies->title?>"></a>
            <?php }else{  ?>
                <a href="movie-show-options.php"><img src="https://image.tmdb.org/t/p/w500<?= $movies->poster_path?>"  alt= "Cover image of movie/show name <?=$movies->original_title?>"></a>
            <?php } } ?>
        </div>
    </div>
</main>

</body>

</html>
