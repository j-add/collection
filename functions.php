<?php

function getDB(): object {
    return new PDO('mysql:host=db; dbname=jordan-collection', 'root', 'password');
}

function getData(object $db): array {
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $query = $db->prepare('SELECT `albumName`, `artistName`, `genre`, `purchaseDate`, `albumImage` FROM `records`;');
    $query->execute();
    return $query->fetchAll();
}