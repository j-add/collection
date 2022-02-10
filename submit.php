<?php
require_once 'functions.php';
$newRecord = $_POST;

if (checkKeys($newRecord)) {
    $albumName = filter_var($newRecord['albumName'], FILTER_SANITIZE_STRING);
    $artistName = filter_var($newRecord['artistName'], FILTER_SANITIZE_STRING);
    $genre = filter_var($newRecord['genre'], FILTER_SANITIZE_STRING);
    $purchaseDate = filter_var($newRecord['purchaseDate'], FILTER_SANITIZE_STRING);
    $albumImage = filter_var($newRecord['albumImage'], FILTER_SANITIZE_URL);
    if (validateTextInput($albumName) &&
        validateTextInput($artistName) &&
        (validatePurchaseDate($purchaseDate) || $purchaseDate == '') &&
        validateGenre($genre) &&
        (filter_var($albumImage, FILTER_VALIDATE_URL) || $albumImage == '')) {
        echo 'Success!';
        }
}

