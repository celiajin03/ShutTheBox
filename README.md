# Shut The Box Game

## Description

This is a digital implementation of the popular dice game called "__*Shut the Box*__", where players roll dice and try to close all the numbered tiles on a board. The player with the lowest score at the end of the game wins. 

<img src="https://user-images.githubusercontent.com/114009025/230255802-7ddc5b95-c304-420c-8055-65154be8bee1.jpg" width=280 height="250">   The game was built using HTML, JavaScript, CSS, and PHP.


## Files Included
The following files are included in the submission:

- `index.html`: The main page of the application.
- `login.php`, `welcome.php`, `shut_the_box.php`, `scores.php`, `score.php`: PHP files used to implement the game and score tracking.
- `h_password.txt`, `scores.txt`: Text files used to store passwords and scores.
- `username.js`, `welcome.js`, `shut_the_box.js`, `scores.js`: JavaScript files used to implement various features of the application.
- `style.css`: The CSS file used to style the application.



## Getting Started
To play the game, you’ll need to create a folder called *“sessions”* with 755 permissions.

## Rules
The rules of the game are simple:

- At the beginning of each turn, the player rolls two dice.
- The player must then select one or more tiles whose numbers add up to the value of the dice.
- The selected tiles are flipped to the "closed" position.
- If the player can close all tiles, the game ends and their score is displayed.
- If there are no more valid moves, the player's turn ends and their score is displayed.


## User’s Experience

1. :lock_with_ink_pen: <br>
  Before the user has ever visited the website, the user is not loggedin. In this situation, every one of the five links above takes the user to `login.php` where they are prompted for a password. <br>
    - If they submit an incorrect password, the webpage displays *“Invalid password!”* just below the password entry box.
    - If they enter the correct password, they become loggedin and are redirected to `welcome.php`.

2. :bust_in_silhouette: <br>
  When a user is loggedin, `welcome.php` asks the user to choose a username longer than 5 characters with no spaces.

3. :game_die: <br>
  Upon choosing a username, `welcome.php` redirects to `shut_the_box.php`, allowing user to play a game called ["Shut The Box"](https://en.wikipedia.org/wiki/Shut_the_Box). <br> <br>
  The page starts off by explaining the rules of the game. There is a dice roll section and a box selection section. These two sections allow you to play the game. The *“Roll dice”* and *“Submit box selection”* buttons become clickable and unclickable in a sensible manner. Alert boxes stop you if you try to make an illegal move. Clicking works anywhere on a box. After a successful box selection, boxes become highlighted in a pretty fashion. Once you click on a button to end the game, you are redirected to `scores.php`.

4. :bar_chart: <br>
  `scores.php` shows the scores of people who have already played the game. If you are on the page and your friend completes a game on another computer, you will see their score appear without having to refresh the page. There may be a short delay, but there is also a button you can press if you want to see the scores updated immediately. Finally, there is a button to stop updating the scores and a button to play the game again which redirects to `welcome.php`.

5. :cookie: <br>
  The website remembers a user’s username choice using a cookie which expires when they close their browser.

6. :copyright: <br>
  Each page has a footer whose position syle attribute has the value sticky.
