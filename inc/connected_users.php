<?php
include 'db.php';
session_start();
$user_id = $_SESSION['user_id'];

$sql = "SELECT *
FROM users
INNER JOIN connected_users ON users.user_id=connected_users.user_id
where connected_users.user_id != $user_id";
$result = mysqli_query($db, $sql);
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
      echo '<div class="item" onclick="open_private_chat('.$_SESSION["user_id"].','.$row["user_id"].')">
              <div class="user-info" data-sex="'.$row["sex"].'">
                <div class="sex"></div>
                <span class="user-name">'.$row["user_name"].'</span>
              </div>
              <span class="age">'.$row["age"].' year</span>
              <span class="city">'.$row["city"].'</span>
            </div>';
  }
} else {
  echo "0 results";
}

?>