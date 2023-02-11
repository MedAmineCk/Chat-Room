<?php
session_start();
include 'db.php';

// initializing variables
$username = $_POST['user_name'];
$password = $_POST['password'];
$city = $_POST['city'];
$age = $_POST['age'];
$sex = $_POST['sex'];
$errors = array();


$query = "insert into users(user_name, password, city, age, sex)
 VALUE ('$username','$password','$city',$age, '$sex')";
mysqli_query($db, $query);
$last_id = mysqli_insert_id($db);
$query = "insert into connected_users(user_id) VALUE ('$last_id')";
mysqli_query($db, $query);
$_SESSION['user_id'] = $last_id;
$_SESSION['username'] = $username;
print(count($errors));

