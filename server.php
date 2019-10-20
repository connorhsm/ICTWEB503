<?php
session_start();

$username = "";
$errors = array();

$db = mysqli_connect('localhost', 'username', 'password', 'ICTWEB501');

if (isset($_POST['reg_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password_1)) {
    array_push($errors, "Password is required");
  }
  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
  }

  $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) {
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
  }

  if (count($errors) == 0) {
    $password = md5($password_1); //encrypt the password before saving in the database

    $query = "INSERT INTO users (username, password) 
  			  VALUES('$username', '$password')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: index.php');
  }
}

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    } else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

if (isset($_POST['addContact'])) {
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $business = mysqli_real_escape_string($db, $_POST['business']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $postcode = mysqli_real_escape_string($db, $_POST['postcode']);

  if (empty($name)) {
    array_push($errors, "Name is required");
  }
  if (empty($business)) {
    array_push($errors, "Business is required");
  }
  if (empty($phone)) {
    array_push($errors, "Phone is required");
  }
  if (empty($email)) {
    array_push($errors, "Email is required");
  }
  if (empty($postcode)) {
    array_push($errors, "Postcode is required");
  }

  if (count($errors) == 0) {
    $query = "INSERT INTO contacts (name, business, phone, email, postcode)
    VALUES ('{$name}','{$business}','{$phone}','{$email}','{$postcode}')";
    $insert = mysqli_query($db, $query);
    $_SESSION['success'] = "Contact added";
    header('location: index.php');
  }
}
