<?php
function valideteForm() {
  if (strlen($_POST['name']) < 3) {
    return false;
  }

  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    return false;
  }

  if (floatval($_POST['bid']) < 0) {
    return false;
  }

  return;
}