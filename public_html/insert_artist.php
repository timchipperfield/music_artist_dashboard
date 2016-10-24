<?php


$db = mysqli_connect('127.0.0.1', 'root', 'enter', 'music')
or die('Error connecting to MySQL server.');

$artist_name = mysqli_real_escape_string($db, $_POST['name']);
$age = mysqli_real_escape_string($db, $_POST['age']);

$query = "INSERT INTO singers (name, age) VALUES ('$artist_name', '$age')";

mysqli_query($db, $query);

mysqli_close($db);

header("Location: index.php");
die();

?>
