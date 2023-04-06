#!/usr/local/bin/php
<?php
  session_save_path(__DIR__ . '/sessions/');
  session_name('shutTheBox');
  session_start();


  $welcome = isset($_SESSION['loggedin']) && $_SESSION['loggedin'];
  $setUsername = isset($_COOKIE['username']);

  if (!$welcome) {   // Not loggedin.
      header('Location: login.php');
      exit;

  } elseif (!$setUsername) {   // No specified username.
      header('Location: welcome.php');
      exit;
  }
?>


<!DOCTYPE html>
<html lang='en'>

  <head>
    <meta charset='utf-8'>
    <title>Shut The Box</title>
    <script src="shut_the_box.js" defer></script>
    <script src="username.js" defer></script>
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
          The Rules
        </h2>
        <ol type='i'>
          <li>Each turn, you roll the dice (or die) and select 1 or more boxes which sum to the value of your roll.</li>
          <li>You will not be allowed to pick the boxes which you choose on subsequent turns.</li>
          <li>When the sum of the boxes which are left is less than or equal to 6, you will only roll a single die.</li>
          <li>When you cannot make a move or you give up, the sum of the boxes which are left gives your score.</li>
          <li>Lower scored are better and a score of 0 is callled "shutting the box".</li>
        </ol>
      </section>


      <section>
        <h2 class="h2_after_sth">
          Dice roll
        </h2>

        <fieldset>
          <input type="button" value="Roll dice" onclick="roll_dice();" id="Roll_dice">
          <span>Result:</span>
          <span id="result"></span>
        </fieldset>
      </section>


      <section>
        <h2 class="h2_after_sth">
          Box selection
        </h2>

        <table>
          <tr>
            <td class="num">1</td>
            <td class="num">2</td>
            <td class="num">3</td>
            <td class="num">4</td>
            <td class="num">5</td>
            <td class="num">6</td>
            <td class="num">7</td>
            <td class="num">8</td>
            <td class="num">9</td>
          </tr>

          <tr>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
          </tr>
        </table>

        <fieldset>
          <input type="button" value="Submit box selection" id="Submit" onclick="check_submission();">
          <input type="button" value="I give up / I can’t make a valid move" id="Give_up" onclick="finish();">
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
