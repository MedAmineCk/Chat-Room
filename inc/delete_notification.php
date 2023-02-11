<?php
include 'db.php';
$notification_id = $_POST['notify_id'];
$sql = "DELETE FROM `message_notifications` WHERE `notification_id` = $notification_id";
$result = mysqli_query($db, $sql);
if ($result) {
    echo 'notification deleted successfuly';
}