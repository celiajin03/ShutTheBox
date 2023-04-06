let timeoutID = null;
update();

function update() {
  const request = new XMLHttpRequest();

  request.onload = function() {
    if (this.status === 200) {
      const leaderboard = document.getElementById('leaderboard');
      leaderboard.innerHTML = this.responseText.split('\n').join('<br>');
    }
  };

  request.open('GET', 'scores.txt' + '?v=' + Math.random());
  request.send();

  timeoutID = setTimeout(update, 10000);
}

function stop_updating() {
  clearTimeout(timeoutID);
}

function force_update() {
  stop_updating();
  update();
}

function play_again() {
  // Redirect to welcome.php
  const path = window.location.pathname;
  window.location = ("https://www.pic.ucla.edu" + path).replace('scores', 'welcome');
}
