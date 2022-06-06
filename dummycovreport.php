<?php
session_start();
include_once('assets\php\config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Enter Report:</h1>
    <form method="POST" action="dummyprocesscov.php">
        Desc: <input type="text" name="description" /><br />
        <input type="hidden" name="status" value="New" />
        <input type="hidden" name="lastactivity" value="Report Submitted" />
        <input type="hidden" name="note" value="" />
        <input type="submit">
    </form>
</body>

</html>