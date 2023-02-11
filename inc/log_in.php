<?php
include 'db.php';
session_start();

$username = $_POST['user_name'];
$password = $_POST['password'];
$errors = array();

$query = "SELECT * FROM users WHERE user_name='$username' AND password='$password'";
$results = mysqli_query($db, $query);

if (mysqli_num_rows($results) == 1) {
  while($row = mysqli_fetch_assoc($results)){
    $user_id = $row['user_id'];
  }
  $query = "insert into connected_users(user_id) VALUE ('$user_id')";
  mysqli_query($db, $query);
  $_SESSION['user_id'] = $user_id;
  $_SESSION['username'] = $username;
}else {
    array_push($errors, "Wrong username/password combination");
}
print(count($errors));
?>