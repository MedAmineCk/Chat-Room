<?php 
include('inc/db.php');
session_start(); 

if (!isset($_SESSION['username'])) {
  header('location: login.php');
}

if (isset($_GET['logout'])) {
  $user_id = $_SESSION['user_id'];
  $query = "DELETE FROM `connected_users` WHERE user_id=$user_id";
  mysqli_query($db, $query);
  session_destroy();
  unset($_SESSION['user_id']);
  unset($_SESSION['username']);
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title></title>
  <link rel="stylesheet" href="css/main.css" />
  <script src="https://kit.fontawesome.com/b4fd4fabf4.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
  <div class="container">
    <header>
      <div class="logo">
        <img src="" alt="">
      </div>
      <div class="user-info">
        <div class="user-name"><?php echo $_SESSION['username']; ?></div>
        <button class="btn" name="logout" type="submit" onclick="window.location.href = 'index.php?logout=\'1\'';">Log
          Out</button>
      </div>
    </header>
    <section class="banner">
      <div class="ad">
        <img src="img/banner.jpg" alt="">
      </div>
    </section>
    <section class="chat-room" id="private_chat">
      <div class="group-messages scroll-items"></div>
      <script>
        function updateShouts() {
          $('#private_chat .group-messages').load('inc/private_messages.php?chat_id='+getUrlParameter('chat_id')+'');
          $('#connected_users').load('inc/connected_users.php');
        }
        setInterval("updateShouts()", 1000);
      </script>
      <div class="banner">
        <div class="ad">
          <img src="img/banner.jpg" alt="">
        </div>
      </div>
      <div class="msj-box">
        <textarea id="msj_box" placeholder="Type Here.."></textarea>
        <button id="msj_submit" type="submit">
          <div class="icon">
            <i class="fas fa-paper-plane"></i>
          </div>
        </button>
        <script>
          $('#msj_submit').on('click', function () {
            var private_chat_id = getUrlParameter('chat_id') ;
            var user_id = <?php echo $_SESSION['user_id'] ?> ;
            var invited_user = getUrlParameter('another_id');
            var message = $('#msj_box').val();
            var today = new Date();
            var message_date = today.getHours() + ":" + today.getMinutes();
            console.log('user_id: ' + user_id + ' | message: ' + message + ' | message_date:' + message_date);
            $('#msj_box').val('');
            $.ajax({
              type: 'POST',
              url: 'inc/submit_private_message.php',
              data: {
                private_chat_id: private_chat_id,
                user_id: user_id,
                message: message,
                message_date: message_date
              },
              success: function (data) {
                console.log(data);
                var message_snipet = data;
                $.ajax({
                  type: 'POST',
                  url: 'inc/send_notification.php',
                  data: {
                    hosted_user_id: user_id,
                    invited_user: invited_user,
                    message_snipet: message_snipet,
                    message_date: message_date,
                    private_chat_id: private_chat_id,
                  },
                  success: function (data) {
                    console.log(data);
                  }
                });
              }
            });
          })
        </script>
      </div>
    </section>
    <section class="user-connecting">
      <div class="up">
        <span>User Connecting</span>
        <span>206</span>
      </div>
      <div id="connected_users" class="users scroll-items"></div>
    </section>
    <section class="custom_ad-box">
      <div class="ad">
        <img src="img/box.jpg" alt="">
      </div>
    </section>
    <footer>
      <span>all copyright reserved &copy; 2019</span>
    </footer>
  </div>

  <script src="js/main.js"></script>
</body>

</html>