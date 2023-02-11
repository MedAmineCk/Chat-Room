<?php
session_start();
include 'db.php';

// initializing variables
$hosted_user_id = $_POST['hosted_user_id'];
$invited_user_id = $_POST['invited_user_id'];


//is chat priver alaeardy exist between those two users open chat priver else create new one
$sql = "SELECT * FROM `private_chat` 
where `hosted_user_id` = $hosted_user_id and `invited_user_id` = $invited_user_id
or (`hosted_user_id` = $invited_user_id and `invited_user_id` = $hosted_user_id)";
$result = mysqli_query($db, $sql);
if (mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $chat_id = $row["private_chat_id"];
    echo $chat_id;
}else{
    $query = "INSERT INTO `private_chat`(`hosted_user_id`, `invited_user_id`) 
    VALUES ('$hosted_user_id','$invited_user_id')";
    $createPrivateChat = mysqli_query($db, $query);
    if($createPrivateChat){
        $chat_id = mysqli_insert_id($db);
        echo $chat_id;
    }else{
        echo 'err';
    }
}
