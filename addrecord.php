<?php

require_once 'functions.php';

$db = getDB();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Add a record | My Record Collection</title>
    <link href="normalize.css" type="text/css" rel="stylesheet" />
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<nav>
    <h1>Add a new record - My Record Collection</h1>
</nav>

<section class="addRecordsForm">
    <form action="submit.php" method="post" class="sm-col-6">
        <div class="form-group">
            <label for="albumName" class="requiredField" title="Required">Album Name</label>
            <input type="text" name="albumName" id="albumName" required class="input-control" />
        </div>
        <div class="form-group">
            <label for="artistName" class="requiredField" title="Required">Artist Name</label>
            <input type="text" name="artistName" id="artistName" required class="input-control" />
        </div>
        <div class="form-group">
            <label for="purchaseDate">Purchase Date</label>
            <input type="date" name="purchaseDate" id="purchaseDate" class="input-control" />
        </div>
        <div class="form-group">
            <label for="genre" class="requiredField" title="Required">Genre</label>
            <select name="genre" id="genre" class="input-control" >
                <option value="alternative">Alternative</option>
                <option value="blues">Blues</option>
                <option value="classical">Classical</option>
                <option value="comedy">Comedy</option>
                <option value="country">Country</option>
                <option value="disco">Disco</option>
                <option value="electronic">Electronic</option>
                <option value="folk">Folk</option>
                <option value="funk">Funk</option>
                <option value="hip-hop">HipHop</option>
                <option value="house">House</option>
                <option value="indie">Indie</option>
                <option value="jazz">Jazz</option>
                <option value="metal">Metal</option>
                <option value="new-wave">New-Wave</option>
                <option value="nu-soul">Nu-Soul</option>
                <option value="pop">Pop</option>
                <option value="psychedelic">Psychedelic</option>
                <option value="punk">Punk</option>
                <option value="rock">Rock</option>
                <option value="r&b">R&B</option>
                <option value="reggae">Reggae</option>
                <option value="soul">Soul</option>
                <option value="spoken-word">Spoken Word</option>
                <option value="techno">Techno</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="albumImage">Cover Image (Image URL)</label>
            <input type="url" name="albumImage" id="albumImage" class="input-control" />
        </div>
        <div class="form-group">
            <input  type="submit" value="Add to collection" class="submitBtn" />
        </div>
    </form>
    <a href="index.php" class="backBtn"><div>&#11013; Cancel</div></a>
</section>
</body>
</html>