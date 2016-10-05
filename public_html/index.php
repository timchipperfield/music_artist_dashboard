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
    <div class=main_divider>
    <div class ="table">
        <?php
          $SongQuery = "SELECT * FROM songs";
          mysqli_query($db, $SongQuery) or die('Error connecting to db');
          $SongResult = mysqli_query($db, $SongQuery);

          $SongRow = mysqli_fetch_array($SongResult);

          while ($SongRow = mysqli_fetch_array($SongResult)) {
            echo '<div class="table_row">'
            . '<div class="cell">' . $SongRow['song_name'] . '</div>'
            . '<div class="cell">' . $SongRow['song_artist'] . '</div>'
            . '<div class="cell">' . $SongRow['year'] . '</div>'
            . '</div>';

          }


        ?>
      </div>

      <div class="table">
        <?php
          $SingerQuery = "SELECT * FROM singers";
          mysqli_query($db, $SingerQuery) or die('Error connecting to db');
          $SingerResult = mysqli_query($db, $SingerQuery);

          $SingerRow = mysqli_fetch_array($SingerResult);

          while ($SingerRow = mysqli_fetch_array($SingerResult)) {
            echo '<div class="table_row">'
            . '<div class="cell">' . $SingerRow['name'] . '</div>'
            . '<div class="cell">' . $SingerRow['age'] . '</div>'
            . '</div>';
          }
        ?>
      </div>

      <div class="table">
        <?php
          $JoinQuery = "SELECT * FROM songs INNER JOIN singers ON singers.name = songs.song_artist";
          mysqli_query($db, $JoinQuery) or die('Error connecting to db');
          $JoinResult = mysqli_query($db, $JoinQuery);

          $JoinRow = mysqli_fetch_array($JoinResult);

          while ($JoinRow = mysqli_fetch_array($JoinResult)) {
            echo '<div class="table_row">'
            . '<div class="cell">' . $JoinRow['name'] . '</div>'
            . '<div class="cell">' . $JoinRow['age'] . '</div>'
            . '<div class="cell">' . $JoinRow['year'] . '</div>'
            . '</div>';
          }
          mysqli_close($db);
        ?>
      </div>
    </div>
  </body>
</html>
