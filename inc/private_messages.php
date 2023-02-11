<?php
include 'db.php';
session_start();

$chat_id =  $_GET['chat_id'];
$sql = "SELECT private_chat_messages.user_id, private_chat_messages.message, TIME_FORMAT(message_date, '%H:%i') AS message_date
         from private_chat_messages
         INNER JOIN users ON (private_chat_messages.user_id = users.user_id and private_chat_id = $chat_id);";
$message_result = mysqli_query($db, $sql);
if (mysqli_num_rows($message_result) > 0) {
  while($message_row = mysqli_fetch_assoc($message_result)) {
      $sql = "SELECT * from users where user_id = ".$message_row["user_id"].";";
      $user_result = mysqli_query($db, $sql);
      $user_row = mysqli_fetch_assoc($user_result);
      echo '
      <div class="item ';
      if ($_SESSION['user_id'] == $message_row["user_id"]) {
        echo 'client-msj';
      }
      echo '">
        <div class="msj-info">
          <div class="user-info" data-sex="'.$user_row["sex"].'">
            <div class="sex"></div>
            <span class="user-name">'.$user_row["user_name"].'</span>
          </div>
          <div class="date">'.$message_row["message_date"].'</div>
        </div>
        <div class="msj">
        '.$message_row["message"].'
        </div>
      </div>';
  }
} else {
  echo "0 results";
}

?>