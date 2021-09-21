<?php
require_once 'Models/deezer.php';
//var_dump($_POST);
$musicList = "";
$movieName = "";
if (isset($_POST['musicListBtn'])) {
    $movieName = $_POST['movieName'];
    $movieName = str_replace(' ', '%', $movieName);
    $response= new Deezer();
    $musicList = $response->displaySoundTrack($movieName);
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="referrer" content="origin">
    <meta name="description" content="Selected Movie Soundtrack List">
    <meta name="author" content="Neil Moras">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <title>Movie Soundtracks</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
</head>
<body>
<main>
    <div class=" music-banner "></div>
    <div class="wrapper">
        <div class="heading-div">
            <h1>Movie Soundtrack List</h1>
            <p>This Music List willl give you all music list based on the movie name. Some playlist might not be
                accurate</p>
            <h2>Search Results for the <span><?= str_replace('%', ' ', strtoupper($movieName)) ?></span></h2>
        </div>
        <div class="back-btn">
            <a href="list-movies.php">Back to list</a>
        </div>

        <div class="music-div-flex">
            <?php foreach ($musicList->data as $music) {
                if (empty($music)) {
                    echo "sorry playlist not found";
                } else {
                    ?>
                    <div class="song-div">
                        <a target="popup" href="<?= (string)$music->link ?>"
                           onclick="window.open('<?= (string)$music->link ?>','popup','width=600,height=600,scrollbars=no,resizable=no'); return false; "><img src="<?= (string)$music->album->cover ?>" alt="music cover image  of <?= (string)$music->title ?> ">
                            <h3><?= (string)$music->title ?> </h3></a>
                    </div>
                <?php }
            } ?>
        </div>

    </div>
</main>
</body>

</html>