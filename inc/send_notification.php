<?php
include 'db.php';
$hosted_user_id = $_POST['hosted_user_id'];
$invited_user = $_POST['invited_user'];
$message_snipet = $_POST['message_snipet'];
$message_date = $_POST['message_date'];
$private_chat_id = $_POST['private_chat_id'];

$query = "INSERT INTO `message_notifications`(`hosted_user_id`, `message_snipet`, `message_date`, `private_chat_id`, `invited_user`) 
VALUES ('$hosted_user_id','$message_snipet','$message_date','$private_chat_id','$invited_user')";
mysqli_query($db, $query);
echo 'notification sent';