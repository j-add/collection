<?php

require_once 'functions.php';

$db = getDB();
$data = getData($db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>My Record Collection</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
    <link href="normalize.css" type="text/css" rel="stylesheet" />
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
</head>
<body>
<nav>
<h1>My Record Collection</h1>
</nav>

<div class="collectionContainer">
<?php echo outputRecords($data);?>
</div>

</body>
</html>

