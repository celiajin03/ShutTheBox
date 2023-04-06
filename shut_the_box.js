let box_score = 45; // 1 + 2 + 3 + 4 + 5 + 6 + 7 + 8 + 9
let dice_roll = null;
const roll = document.getElementById("Roll_dice");
const result = document.getElementById("result");
const td = document.getElementsByTagName("td");
const submit = document.getElementById("Submit");


window.onload = function() {
  // Click numbers can also check boxes. (call check_box_i() function)
  for (let i = 0; i < 9; ++i) {
    check_box_i(i);
  }
  // Disable Sumbit at the start. (no Hover effect)
  submit.disabled = true;
};

// Click on the number and the corresponding box will be checked.
function check_box_i(i) {
  const num_i = td[i];
  const box_i = td[i + 9].childNodes[0];
  num_i.addEventListener('click', function() {
    box_i.checked = !box_i.checked;
  });
}


function roll_dice() {
  let x1 = 1 + Math.floor(6 * Math.random());
  let x2 = 1 + Math.floor(6 * Math.random());
  dice_roll = x1 + x2;
  let result_display = ` ${x1} + ${x2} = ${x1+x2}`;
  result.innerHTML += result_display;

  // After rolling, enable Submit, disable Roll dice.
  roll.disabled = true;
  submit.disabled = false;
}


function sum_checked_values() {
  let sum = 0;
  for (let i = 0; i < 9; ++i) {
    const box_i = td[i + 9].childNodes[0];
    if (!box_i.disabled && box_i.checked) {
      sum += (i + 1);
    }
  }
  return sum;
}


function check_submission() {
  let checked_sum = sum_checked_values();

  if (checked_sum !== dice_roll) {
    alert("The total of the boxes you selected does not match the dice roll. Please make another selection and try again.");
  } else {

    // Reduce box_score by checked_sum.
    box_score -= checked_sum;

    // Disable checked boxes (clear the check first).
    for (let i = 0; i < 9; ++i) {
      const num_i = td[i];
      const box_i = td[i + 9].childNodes[0];
      if (box_i.checked) {

        box_i.checked = false; // Clear check.
        box_i.disabled = true; // Disable box.

        // Clone number to remove EventListener.
        let new_num = num_i.cloneNode(true);
        num_i.parentNode.replaceChild(new_num, num_i);

        // Fill background color for checked box.
        new_num.style.backgroundColor = "rgb(113,116,157)";
      }
    }

    // If sum of remaining boxes < 6, use only one die.
    if (box_score <= 6) {
      roll.onclick = roll_die;
    }

    // Enable Roll dice, disable submit, clear last dice roll result.
    roll.disabled = false;
    submit.disabled = true;
    result.innerHTML = "";

    if (box_score < 40) {
      alert("Congrats! You have reached a score of 0!!");
    }
  }
}


function roll_die() {
  let x1 = 1 + Math.floor(6 * Math.random());
  dice_roll = x1;
  result.innerHTML += ` ${x1}`;

  // After rolling, enable Submit, disable Roll dice.
  roll.disabled = true;
  submit.disabled = false;
}


function finish() {
  const username = get_username();
  const msg = `Your final score is ${box_score}`;
  alert(msg);

  // AJAX Request.
  const request = new XMLHttpRequest();

  request.onload = function() {
    if (this.status === 200) {
      const path = window.location.pathname;
      window.location = ("https://www.pic.ucla.edu" + path).replace('shut_the_box', 'scores');
    }
  }

  request.open('POST', 'score.php');
  request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  request.send(`val1=${username}&val2=${box_score}`);

}
