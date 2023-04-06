#!/usr/local/bin/php
<?php 
  session_save_path(__DIR__ . '/sessions/');
  session_name('shutTheBox');
  session_start();

  // If not loggedin, redirect back to login.php
  $welcome = isset($_SESSION['loggedin']) && $_SESSION['loggedin'];
  if (!$welcome) {   
      header('Location: login.php');
      exit;
  } 
  $setUsername = isset($_COOKIE['username']);
  if (!$setUsername) {
    header('Location: welcome.php');
    exit;
  }
?>


<!DOCTYPE html>
<html lang='en'>

  <head>
    <meta charset='utf-8'>
    <title>Shut The Box</title>
    <script src="scores.js" defer></script>
    <link rel="stylesheet" href="style.css">
  </head>

  <body>
    <header>
      <h1>
        Shut The Box
      </h1>
    </header>

    <main>
      <section>
        <h2>
          Scores
        </h2>

        <p>
          Well done! Here are the scores so far...
        </p>
        <p id="leaderboard"></p>

        <fieldset>
          <input type="button" value="PLAY AGAIN!!!" onclick="play_again();">
        </fieldset>

        <fieldset>
          <input type="button" value="Force update / start updating" onclick="force_update();">
          <input type="button" value="Stop updating" onclick="stop_updating();">
        </fieldset>
      </section>
    </main>

    <footer>
      <hr>
      <small>
        &copy; Chen Jin, 2020
      </small>
    </footer>
  </body>

</html>
