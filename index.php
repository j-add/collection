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
</head>
<body>

<div class="collectionContainer">
<?php echo outputRecords($data);?>
</div>

</body>
</html>

