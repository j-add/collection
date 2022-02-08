<?php

require_once 'functions.php';

$db = getDB();
$data = getData($db);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Record Collection</title>
    <link href="./style.css" type="css/text" rel="stylesheet">
</head>
<body>

<div style="collectionContainer">
<?php echo outputRecords($data);?>
</div>

</body>
</html>

