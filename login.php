#!/usr/local/bin/php
<?php
  // SETTING UP OR RESUMING A SESSION.
  session_save_path(__DIR__ . '/sessions/');
  session_name('shutTheBox');
  session_start();

  // At the beginning,
  // there has not been an incorrect submission.
  $incorr_submiss = false;

  // If a password has been submitted,
  // check it and update
  // $incorr_submiss and $_SESSION['loggedin']
  // accordingly.
  if (isset($_POST['passwordSubmitted'])) {
    validate($_POST['passwordSubmitted'], $incorr_submiss);
  }


  function validate($submiss, &$incorr_submiss) {
    $file = fopen('h_password.txt', 'r') or die('Unable to find the hashed password');

    // Obtain the hashed password from h_password.txt,
    // and remove any surrounding whitespace.
    $hashed_password = fgets($file);
    $hashed_password = trim($hashed_password);

    fclose($file);


    // Hash the submission.
    $hashed_submiss = hash('md2', $submiss);

    if ($hashed_submiss !== $hashed_password) {
      $_SESSION['loggedin'] = false;
      $incorr_submiss = true;
    }
    else {
      $_SESSION['loggedin'] = true;
      header('Location: welcome.php');
      exit;
    }
  }
?>



<!DOCTYPE html>
<html lang='en'>

  <head>
    <meta charset='utf-8'>
    <title>Shut The Box</title>
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
          Login
        </h2>

        <p>
          In order to play you need a password.
        </p>
        <p>If you know it, please enter it below and login.</p>

        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <fieldset>
            <label for="passwordEntry">Password: </label>
            <input id="passwordEntry" type="password" name="passwordSubmitted">
            <input type="submit" value="Login">
          </fieldset>
        </form>

        <?php
          if ($incorr_submiss) {
            echo '<p>Invalid password!</p>';
          }
        ?>
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
