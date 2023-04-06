window.onload = function() {
  // Fill the textbox with username if it's stored in document.cookie.
  const prev_uname = get_username();
  if (prev_uname) {
    document.getElementById('username').value = prev_uname;
  }
}


function check_username() {
  const username = document.getElementById('username').value;
  let msg = "";

  // ——————Check the username is of the desired form:——————
  // Between 5 and 40 characters (inclusive). 
  if (username.length < 5) {
    msg += "Username must be 5 characters or longer.\n";
  } else if (username.length > 40) {
    msg += "Username cannot be longer than 40 characters.\n";
  }

  // No spaces, commas, or semicolons.
  if (RegExp(' ').test(username)) {
    msg += "Username cannot contain spaces.\n";
  }
  if (RegExp(',').test(username)) {
    msg += "Username cannot contain commas.\n";
  }
  if (RegExp(';').test(username)) {
    msg += "Username cannot contain semicolons.\n";
  }

  // If non-conformity to any of the above criteria, alert msg.
  if (msg) {
    alert(msg);
  }

  // If the above criteria are satisfied, but contain other illegal chars, alert.
  // Consist entirely of alphanumerics and characters in !@#$%^&*()-_=+[]{}:'|`~<.>/?
  if ((!RegExp(/^([a-zA-Z0-9!@#\$%\^&\*\(\)-_=\+\[\]\{\}:'\|`~<\.>/\?]+)$/).test(username)) && (!msg)) {

    alert("Username can only use characters from the following string: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+[]{}:'|`~<.>/?");

  } else if (!msg) {

    // If there's no error detected,
    // Create a new cookie that expires in an hour,
    // and redirect to shut_the_box game.
    document.cookie = `username=${username}; expires=${hour_in_future()}`;

    redirect();
  }
}


function hour_in_future() {
  let hour_in_future = new Date();
  hour_in_future.setHours(hour_in_future.getHours() + 1);
  return hour_in_future.toUTCString();
}

function redirect() {
  // Switch to "https://www.pic.ucla.edu/~celiajin/.../shut_the_box.php"
  const path = window.location.pathname;
  window.location = ("https://www.pic.ucla.edu" + path).replace('welcome', 'shut_the_box');
}
