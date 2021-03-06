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
        if ($record['albumImage'] == NULL || $record['albumImage'] == '') {
            $checkedImage = './images/missingCover.png';
        } else {
            $checkedImage = $record['albumImage'];
        }
        // Output each data field
        $result .= '<div class="record">';
        $result .= '<div class="cardImage"><img class="albumImg" src="' . $checkedImage . '" alt="Album cover for ' . $record['albumName'] . ' by ' . $record['artistName'] . '" /></div>';
        $result .= '<div class="cardText"><h1 class="albumName">' . $record['albumName'] . '</h1>';
        $result .= '<h2 class="artistName">' . $record['artistName'] . '</h2></div>';
        $result .= '<div class="cardTags">';
        $result .= '<div><span class="genre ' . $record['genre'] . '">' . $record['genre'] . '</span></div>';
        //If purchaseDate is NULL do not include it in output string
        if ($record['purchaseDate'] != NULL) {
            $sqlDate = strtotime($record['purchaseDate']);
            $formattedDate = date( 'd-m-Y', $sqlDate );
            $result .= '<div><span class="purchaseDate">Purchased on: ' . $formattedDate . '</span></div>';
        }
        $result .= '</div></div>';
    }
    return $result;
}


/**
 * Checks data taken from user input against expected keys (required by database)
 *
 * @param array $submittedData $_POST data from form submission
 *
 * @return bool Returns true if data is valid, else returns false
 */
function checkKeys(array $submittedData): bool {
    if (isset($submittedData['albumName']) && isset($submittedData['artistName']) && isset($submittedData['genre']) && isset($submittedData['purchaseDate']) && isset($submittedData['albumImage'])) {
        return true;
    } else {
        return false;
    }
}

/**
 * Sanitises URL and checks that it directs to an image file
 *
 * @param string $url Image URL
 *
 * @return string Returns the sanitised URL, if it directs to a valid image, else returns an empty string
 */
function sanitizeImageURL(string $url): string {
    $url = filter_var($url, FILTER_SANITIZE_URL);
    if (getimagesize($url)) {
        return $url;
    } else {
        return '';
    }
}

/**
 * Validates text input by checking that input string is within VAR_CHAR's 255 character limit
 *
 * @param string $inputString The input string
 *
 * @return bool Returns true if valid, else false
 */
function validateTextInput(string $inputString): bool {
    if (strlen($inputString) > 0 && strlen($inputString) <= 255) {
        return true;
    } else {
        return false;
    }
}

/**
 * Validates input against pre-defined list of accepted 'genre' values
 *
 * @param string $genre User input value for genre
 *
 * @return bool Returns true if input is valid (matches value from list), else false
 */
function validateGenre(string $genre): bool {
    strtolower($genre);
    $validGenre = ['alternative','blues','classical','comedy','country','disco','electronic','folk','funk','hip-hop','house','indie','jazz','metal','new-wave','nu-soul','pop','psychedelic','punk','rock','r&b','reggae','soul','spoken-word','techno','other'];
    if (in_array($genre, $validGenre)) {
        return true;
    } else {
        return false;
    }
}

/**
 * Takes an input and checks that it is a valid date
 *
 * @param string $date Input date
 *
 * @param string $format The date string format
 *
 * @return bool Returns true if date is valid, else false
 */
function validatePurchaseDate(string $date, string $format = 'Y-m-d'): bool {
    $d = DateTime::createFromFormat($format, $date);
    // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
    return $d && $d->format($format) === $date;
}


/**
 * Adds a new record to the database, using user input values
 *
 * @param PDO $db The database to add to
 *
 * @param string $albumName The album name
 *
 * @param string $artistName The artist name
 *
 * @param string $genre The genre
 *
 * @param mixed $purchaseDate The purchase date (can be NULL or String)
 *
 * @param string $albumImage The album image URL
 *
 * @return void Does not return an output
 */
function addRecordEntry(PDO $db, string $albumName, string $artistName, string $genre, string $purchaseDate, string $albumImage): void {
    if ($purchaseDate == '') {
        $purchaseDate = NULL;
    }
    if ($albumImage == '') {
        $albumImage = NULL;
    }
    //create the sql query to run
    $addRecord = $db->prepare("INSERT INTO `records` (`albumName`, `artistName`, `genre`, `purchaseDate`, `albumImage`) VALUES (:albumName, :artistName, :genre, :purchaseDate, :albumImage);");
//bind parameters
    $addRecord->bindParam(':albumName', $albumName);
    $addRecord->bindParam(':artistName', $artistName);
    $addRecord->bindParam(':genre', $genre);
    $addRecord->bindParam(':purchaseDate', $purchaseDate);
    $addRecord->bindParam(':albumImage', $albumImage);
//run the query against the db
    $addRecord->execute();
}

