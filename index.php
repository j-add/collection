<?php

require_once 'functions.php';

$db = getDB();
$records = getAllAlbums($db);
$formattedRecords = outputRecords($records);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>My Record Collection</title>
    <link href="normalize.css" type="text/css" rel="stylesheet" />
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<nav>
<h1>My Record Collection</h1>
</nav>

<section class="collectionContainer">
    <?php echo $formattedRecords;?>
    <div class="record">
        <a href="#" class="addDataButton">
            <div class="addBox">
                <svg class="icon--plus" viewBox="-2.5 -2.5 10 10" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 1 h1 v1 h1 v1 h-1 v1 h-1 v-1 h-1 v-1 h1 z" />
                </svg>
            </div>
        </a>
    </div>
</section>

</body>
</html>

