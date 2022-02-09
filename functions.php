<?php

/**
 * Opens a connection to the collection database
 *
 * @return object
 */
function getDB(): PDO {
    $db = new PDO('mysql:host=db; dbname=jordan-collection', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}

/**
 * Queries the database and returns selected data as an array
 *
 * @param PDO $db - The database that you wish to query
 *
 * @return array - All matching data will be placed in an array
 */
function getAllAlbums(PDO $db): array {
    $query = $db->prepare('SELECT `albumName`, `artistName`, `genre`, `purchaseDate`, `albumImage` FROM `records`;');
    $query->execute();
    return $query->fetchAll();
}

/**
 * Takes an array of collection data and outputs each item to its own <div> container, with formatting
 *
 * @param array $records - Collection of data fetched from database
 *
 * @return string
 */
function outputRecords(array $records): string {
    $result = '';
    // Check that array has required fields
    if (!count($records)) {
        return 'Oops, there\'s nothing to display right now. If you weren\'t expecting this error, please contact an admin.';
    }
    foreach ($records as $record) {
        // If album cover is missing, insert placeholder image
        $checkedImage = $record['albumImage'] ?? './images/missingCover.png';
        // Output each data field
        $result .= '<div class="record">';
        $result .= '<div><img class="albumImg" src="' . $checkedImage . '" alt="Album cover for ' . $record['albumName'] . ' by ' . $record['artistName'] . '" /></div>';
        $result .= '<h1 class="albumName">' . $record['albumName'] . '</h1>';
        $result .= '<h2 class="artistName">' . $record['artistName'] . '</h2>';
        $result .= '<div><span class="genre ' . $record['genre'] . '">' . $record['genre'] . '</span></div>';
        //If purchaseDate is NULL do not include it in output string
        if ($record['purchaseDate'] != NULL) {
            $sqlDate = strtotime($record['purchaseDate']);
            $formattedDate = date( 'd-m-Y', $sqlDate );
            $result .= '<div><p class="purchaseDate">Purchased on: ' . $formattedDate . '</p></div>';
        }
        $result .= '</div>';
    }
    return $result;
}



