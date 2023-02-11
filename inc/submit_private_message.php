<?php
include 'db.php';

$private_chat_id = $_POST['private_chat_id'];
$user_id = $_POST['user_id'];
$message = $_POST['message'];
$message_date = $_POST['message_date'];

$query = "INSERT INTO `private_chat_messages`(`private_chat_id`, `user_id`, `message`, `message_date`)
 VALUES ('$private_chat_id','$user_id','$message','$message_date')";
mysqli_query($db, $query);
echo $message;