<?php

require_once 'functions.php';

$db = getDB();
$data = getData($db);

echo outputRecords($data);