<?php
require_once 'functions.php';
$newRecord = $_POST;

if (checkKeys($newRecord)) {
    $albumName = filter_var($newRecord['albumName'], FILTER_SANITIZE_STRING);
    $artistName = filter_var($newRecord['artistName'], FILTER_SANITIZE_STRING);
    $genre = filter_var($newRecord['genre'], FILTER_SANITIZE_STRING);
    $purchaseDate = filter_var($newRecord['purchaseDate'], FILTER_SANITIZE_STRING);
    $albumImage = sanitizeImageURL($newRecord['albumImage']);
    if (validateTextInput($albumName) &&
        validateTextInput($artistName) &&
        (($purchaseDate == NULL || validatePurchaseDate($purchaseDate))) &&
        validateGenre($genre) &&
        ($albumImage == '' || filter_var($albumImage, FILTER_VALIDATE_URL))) {
            $db = getDB();
            addRecordEntry($db, $albumName, $artistName, $genre, $purchaseDate, $albumImage);
        }
}

header('Location: index.php');