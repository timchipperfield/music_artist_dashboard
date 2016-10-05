<!DOCTYPE html>

<?php
  $db = mysqli_connect('127.0.0.1', 'root', 'enter', 'music')
  or die('Error connecting to MySQL server.');
?>


<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <title></title>
  </head>
  <body>

  <div class ="table_row">
      <?php

        $query = "SELECT * FROM songs";
        mysqli_query($db, $query) or die('Error connecting to db');
        $result = mysqli_query($db, $query);

        $row = mysqli_fetch_array($result);

        while ($row = mysqli_fetch_array($result)) {
          echo '<div class="cell">' . $row['song_name'] . '</div>'
          . '<div class="cell">' . $row['song_artist'] . '</div>'
          . '<div class="cell">' . $row['year'] . '</div>';

        }

        mysqli_close($db);
      ?>
    </div>
  </body>
</html>
