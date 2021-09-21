<?php
require_once 'Models/list.php';

$limitNum ="";

if(isset($_POST['submitLimitNum'])){
    (string)$limitNum = $_POST['listlimit'];
   var_dump(($limitNum));
}else{
    (string)$limitNum = '500';
}
$response = new Trakt();

$MovieListResult = $response->display_trending_movies($TRAKT,$limitNum);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Movies List</title>
    <meta name="referrer" content="origin">
    <meta name="description" content="List Movies Page">
    <meta name="author" content="Neil Moras">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
</head>
<body>
<main>
    <div class="movie-banner"></div>
    <div class="wrapper">
        <div class="heading-div ">
            <h1>Trending Movie List</h1>
            <p>This List Contains 500+ movies and their Official Soundtracks of each of those movies is just a click away</p>
        </div>
        <div class="link-flex">
            <a href="movie-show-options.php">Back to Options Page</a>
            <form method="post" action="">
                <label for="listlimit">Limit Movie List By:</label>
                <input type="number" name="listlimit" id="listlimit"/>
                <input type="submit" value="Limit" name="submitLimitNum">
            </form>
        </div>
        <div class="list-div-container">
            <table>
                <thead>
                <th>No.</th>
                <th>Movies</th>
                <th>Year</th>
                <th>Tmdb</th>
                <th>Soundtracks</th>
                </thead>
                <tbody>
                <?php foreach($MovieListResult as $num => $movies) {?>
                    <tr>
                        <td><?= $num + 1 ?></td>
                        <td><a class="title" target="_blank" href="https://www.imdb.com/title/<?= (string)$movies->movie->ids->imdb ?>"><?= (string)$movies->movie->title ?></a></td>
                        <td><?= (string)$movies->movie->year ?></td>
                        <td><a referrerpolicy="no-referrer" target="_blank" href=" https://www.themoviedb.org/movie/<?= (string)$movies->movie->ids->tmdb ?>">TMDB </a></td>
                        <td>
                            <form action="list-movie-soundtrack.php" method="post">
                                <input type="hidden" name="movieName" value="<?= strtolower((string)$movies->movie->title) ?>" />
                                <input type="submit" class="button btn btn-primary" name="musicListBtn" value="Soundtrack List" />
                            </form>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</main>
</body>
</html>