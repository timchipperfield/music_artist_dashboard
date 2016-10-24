<?php


$db = mysqli_connect('127.0.0.1', 'root', 'enter', 'music')
or die('Error connecting to MySQL server.');

$song_name = mysqli_real_escape_string($db, $_POST['song_name']);
$song_artist = mysqli_real_escape_string($db, $_POST['song_artist']);
$year = mysqli_real_escape_string($db, $_POST['year']);


$query = "INSERT INTO songs (song_name, song_artist, year) VALUES ('$song_name', '$song_artist', '$year')";

mysqli_query($db, $query);

mysqli_close($db);

header("Location: index.php");
die();

?>
