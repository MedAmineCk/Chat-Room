<?php
include 'db.php';

$user_id      = $_POST['user_id'];
$message    = $_POST['message'];
$message_date = $_POST['message_date'];

$query = "INSERT INTO `group_messages`(`message`, `user_id`, `message_date`)
 VALUES ('$message', '$user_id', '$message_date')";
mysqli_query($db, $query);
echo 'message sent';