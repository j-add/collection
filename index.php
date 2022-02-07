<?php

require_once 'functions.php';

$db = getDB();
$data = getData($db);

echo '<pre>';
var_dump($data);
echo '</pre>';