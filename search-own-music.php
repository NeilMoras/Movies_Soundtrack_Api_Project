<?php
require_once 'Models/deezer.php';
//INITIALIZE THE VARIABLES
$searchName="";
$musicSearchResult ="";
//IF THE SUBMIT BUTTON IS PRESSES RUN THE CODE INSIDE THE BLOCK
if(isset($_POST['musicSearchBtn'])) {
    //GRAB THE NAME FROM THE FORM INPUT AND STORE IT IN A VARIABLE
    $searchName = $_POST['searchName'];
//    var_dump($searchName);
    //REPLACE THE SPACES WITH "%" INORDER TO SERVED THE URL COMMAND
    $searchName =  str_replace(' ','%', $searchName);
//    DISPLAY SOUNDTRACK  FUNCTION STORED IN A VARIABLE
    $response = new Deezer();
    $musicSearchResult = $response->displaySoundTrack($searchName);
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
            <h1>Want to explore beyond from just Movie and Show Soundtracks?</h1>
            <p>Here you can search for any music based album, artists, tracks ,you name it and you have it</p>
            <p>All the Searches are powered using Deezer API. Not All Queries might give out results</p>
            <h2>Search Results for  <span><?=str_replace('%',' ', strtoupper($searchName))  ?></span> </h2>
        </div>
        <div class="search-page-content-div">
            <div class="back-btn">
        <a href="movie-show-options.php">Back to list</a>
            </div>
        <form method="post" action="">
            <div class="search-label">
                <label for="searchName">Look up whatever music you want to:</label>
            </div>
            <div class="search-input-field">
            <input type="text" name="searchName" id="searchName"/>
            <input type="submit" value="search" name="musicSearchBtn">
            </div>
        </form>
<!--            LOOP THROUGH THE SEARCH RESULTS QUERY RESULTS-->
        <div class="music-div-flex">
            <?php foreach($musicSearchResult->data as $music) {
                if(empty($music)){
//                    echo "sorry playlist not found";
                }else{?>
                    <div class="song-div">
                        <a target="popup" href="<?= (string)$music->link ?>" onclick="window.open('<?= (string)$music->link ?>','popup','width=600,height=600,scrollbars=no,resizable=no'); return false; "><img src="<?= (string)$music->album->cover ?>" alt="music cover image  of <?= (string)$music->title ?> ">
                            <h3><?= (string)$music->title ?> </h3></a>
                    </div>
                <?php }}?>
        </div>
        </div>
    </div>
</main>
</body>

</html>
