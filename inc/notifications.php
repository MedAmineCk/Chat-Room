<?php
include 'db.php';
session_start();

$invited_id = $_SESSION['user_id'];
$sql_count = "SELECT count(*) as total FROM `message_notifications` where invited_user = ".$invited_id.";";
$count_result = mysqli_query($db, $sql_count);
$count_row = mysqli_fetch_assoc($count_result);
echo '<div class="icon"><i class="far fa-bell"></i></div>
<div class="notify-counter">'.$count_row["total"].'</div>
<div class="notify-container"><div class="items-container">';

$sql = "SELECT * FROM `message_notifications` where invited_user = ".$invited_id.";";
$notification_result = mysqli_query($db, $sql);
if (mysqli_num_rows($notification_result) > 0) {
  while($notification_row = mysqli_fetch_assoc($notification_result)) {
      $notify_id = $notification_row["notification_id"];
      $hosted_id = $notification_row["hosted_user_id"];
      $chat_id = $notification_row["private_chat_id"];
      $sql = "SELECT user_name from users where user_id = ".$hosted_id.";";
      $user_result = mysqli_query($db, $sql);
      $user_row = mysqli_fetch_assoc($user_result);
      
      $user_name = $user_row['user_name'];
      $message_snipet = substr($notification_row['message_snipet'], 0, 14);
      $date = substr($notification_row['message_date'],0,5);

      $is_connected = "no";
      $connected_sql= "SELECT * from connected_users where user_id = ".$hosted_id.";";
      $is_connected_result = mysqli_query($db, $connected_sql);
      if(mysqli_num_rows($is_connected_result)>0){
        $is_connected="yes";
      }

      echo '
      <div class="item" onclick="window.open(\'privat_messages.php?chat_id='.$chat_id.'&client_id='.$invited_id.'&another_id='.$hosted_id.'\');">
      <div class="is_connected">
        <div class="circle" data-is_connected="'.$is_connected.'"></div>
      </div>
      <div class="notify-info">
        <div class="user_name">'.$user_name.'</div>
        <div class="msj-snipet">'.$message_snipet.'</div>
        <div class="date">'.$date.'</div>
      </div>
      <div class="delete-notify">
        <div class="icon" onclick="notify_delete('.$notify_id.');"><i class="far fa-trash-alt"></i></div>
      </div>
    </div>';
      }
} else {
  echo "0 results";
}
echo '</div></div>';

?> 