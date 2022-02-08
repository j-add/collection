<?php

/**
 * Description: Opens a connection to the collection database
 * @return object
 */
function getDB(): object {
    return new PDO('mysql:host=db; dbname=jordan-collection', 'root', 'password');
}

/**
 * Description: Queries the database and returns selected data, as an array
 * @param object $db - The database that you wish to query
 * @return array - All matching data will be placed in an array
 */
function getData(object $db): array {
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $query = $db->prepare('SELECT `albumName`, `artistName`, `genre`, `purchaseDate`, `albumImage` FROM `records`;');
    $query->execute();
    return $query->fetchAll();
}

/**
 * Description: Takes an array of collection data and outputs each item to its own <div> container, with formatting
 * @param array $data - Collection of data fetched from database
 * @return string
 */
function outputRecords(array $data): string {
    $result = '';
    // Check that array has required fields
    if (!count($data)) {
        return 'You haven\'t added to the collection yet';
    }
    foreach ($data as $record) {
        // If album cover is missing, insert placeholder image
        $record['albumImage'] = $record['albumImage'] ?? './images/missingCover.png';
        // Output each data field
        $albumImage = '<div><img class="albumImg" src="' . $record['albumImage'] . '" alt="Album cover for ' . $record['albumName'] . ' by ' . $record['artistName'] . '" /></div>';
        $albumName = '<h1 class="albumName">' . $record['albumName'] . '</h1>';
        $artistName = '<h2 class="artistName">' . $record['artistName'] . '</h2>';
        $genre = '<div><p class="genre ' . $record['genre'] . '">' . $record['genre'] . '</p></div>';
        //If purchaseDate is NULL do not include it in output string
        if ($record['purchaseDate'] != NULL) {
            $sqlDate = strtotime($record['purchaseDate']);
            $formattedDate = date( 'd-m-Y', $sqlDate );
            $purchaseDate = '<div><p class="purchaseDate">Purchased on: ' . $formattedDate . '</p></div>';
            $result .= '<div class="record">' . $albumImage . $albumName . $artistName . $purchaseDate . $genre . '</div>';
        } else {
            //Output each record as a string, concatenated onto the previous record's output
            $result .= '<div class="record">' . $albumImage . $albumName . $artistName . $genre . '</div>';
        }
    }
    return $result;
}



