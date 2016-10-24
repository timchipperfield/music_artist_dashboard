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

    <h1>Musical Database Dashboard</h1>

    <h2>Song Information</h2>
    <table>
        <?php
          $SongQuery = "SELECT * FROM songs";
          mysqli_query($db, $SongQuery) or die('Error connecting to db');
          $SongResult = mysqli_query($db, $SongQuery);

          $SongRow = mysqli_fetch_array($SongResult);

          echo  '<tr>
                  <th>Song Name</th>
                  <th>Artist</th>
                  <th>Year</th>
                  </tr>';

          while ($SongRow = mysqli_fetch_array($SongResult)) {
            echo '<tr>'
            . '<td class="cell">' . $SongRow['song_name'] . '</td>'
            . '<td class="cell">' . $SongRow['song_artist'] . '</td>'
            . '<td class="cell">' . $SongRow['year'] . '</td>'
            . '</tr>';
          }
        ?>
      </table>


      <h2>Singer Information</h2>
      <table>

        <?php
          $SingerQuery = "SELECT * FROM singers";
          mysqli_query($db, $SingerQuery) or die('Error connecting to db');
          $SingerResult = mysqli_query($db, $SingerQuery);

          $SingerRow = mysqli_fetch_array($SingerResult);

          echo  '<tr>
                  <th>Name</th>
                  <th>Age</th>
                  </tr>';

          while ($SingerRow = mysqli_fetch_array($SingerResult)) {
            echo '<tr>'
            . '<td class="cell">' . $SingerRow['name'] . '</td>'
            . '<td class="cell">' . $SingerRow['age'] . '</td>'
            . '</tr>';
          }
        ?>
      </table>

      <h2>Years that singers released their songs</h2>
      <table>
        <?php
          $JoinQuery = "SELECT * FROM songs INNER JOIN singers ON singers.name = songs.song_artist";
          mysqli_query($db, $JoinQuery) or die('Error connecting to db');
          $JoinResult = mysqli_query($db, $JoinQuery);

          $JoinRow = mysqli_fetch_array($JoinResult);
          echo  '<tr>
                  <th>Name</th>
                  <th>Age</th>
                  <th>Year</th>
                  </tr>';

          while ($JoinRow = mysqli_fetch_array($JoinResult)) {
            echo '<tr>'
            . '<td class="cell">' . $JoinRow['name'] . '</td>'
            . '<td class="cell">' . $JoinRow['age'] . '</td>'
            . '<td class="cell">' . $JoinRow['year'] . '</td>'
            . '</tr>';
          }
          mysqli_close($db);
        ?>
      </table>

      <div class="forms">
        <form action="insert_song.php" method="post" >
          <h2>Add a Song</h2>
          <p>
            <label for"song_name">Song Name: </label>
            <input type="text" name="song_name" id="song_name">
          </p>
          <p>
            <label for"song_artist">Artist's Name: </label>
            <input type="text" name="song_artist" id="song_artist">
          </p>
          <p>
            <label for"year">Year: </label>
            <input type="text" name="year" id="year">
          </p>
          <input type="submit" value"Submit">
        </form>


        <form action="insert_artist.php" method="post" >
          <h2>Add a Singer</h2>
          <p>
            <label for"name">Artist Name: </label>
            <input type="text" name="name" id="name">
          </p>
          <p>
            <label for"age">Artist Age: </label>
            <input type="text" name="age" id="age">
          </p>
          <input type="submit" value"Submit">
        </form>
      </div>

    </div>


  </body>
</html>
