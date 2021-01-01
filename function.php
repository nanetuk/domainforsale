<?php
function valideteForm() {
  if (strlen($_POST['name']) < 2) {
    return 'You name should have at least 2 characters!';
  }

  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    return 'Invalid email address!';
  }

  if (floatval($_POST['bid']) < 0) {
    return 'Bid not valid!';
  }

  return true;
}