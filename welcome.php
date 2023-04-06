#!/usr/local/bin/php
<?php
  session_save_path(__DIR__ . '/sessions/');
  session_name('shutTheBox');
  session_start();

  $welcome = isset($_SESSION['loggedin']) && $_SESSION['loggedin'];
  if (!$welcome) {
    header('Location: login.php');
    exit;
  }
?>


<!DOCTYPE html>
<html lang='en'>

  <head>
    <meta charset='utf-8'>
    <title>Shut The Box</title>
    <script src="welcome.js" defer></script>
    <script src="username.js" defer></script>
    <link rel="stylesheet" href="style.css">
  </head>

  <body>
    <header>
      <h1>
        Welcome! Ready to play “Shut The Box”?
      </h1>
    </header>

    <main>
      <section>
        <h2>
          Choose a username
        </h2>

        <p>
          So that we can post your score(s), please choose a username.
        </p>

        <fieldset>
          <label for="username">Username: </label>
          <input id="username" type="text">
          <input type="button" value="Submit" onclick="check_username();">
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
