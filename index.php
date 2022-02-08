<?php

require_once 'functions.php';

$db = getDB();
$data = getData($db);

echo count($data);
echo outputRecords($data);