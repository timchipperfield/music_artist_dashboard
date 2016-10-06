<?php

if(isset($_POST["submit"])){
$db = mysqli_connect('127.0.0.1', 'root', 'enter', 'music')
or die('Error connecting to MySQL server.');
//
// $song_name=$_POST['Name'];
// $song_artist=$_POST['Artist'];
// $year=$_POST['Year'];

$query = "INSERT INTO songs (song_name, song_artist, year) VALUES('".$_POST["song_name"]."', '".$_POST["song_artist"]."', '".$_POST["year"]."')";

mysqli_query($db, $query);

mysqli_close($db);

header('Location: index.php');
}
 ?>
