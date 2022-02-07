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