<?php 
session_start(); 

if (isset($_SESSION['username'])) {
  header('location: index.php');
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="log-in-container">
        <header>
            <div class="logo">
                <img src="" alt="">
            </div>
            <nav>
                <ul>
                    <li>example</li>
                    <li>example</li>
                    <li>example</li>
                </ul>
            </nav>
        </header>
        <section class="banner">
            <div class="ad">
                <img src="img/banner.jpg" alt="">
            </div>
        </section>
        <section class="custom_ad_box">
            <div class="ad">
                <img src="img/box.jpg" alt="">
            </div>
        </section>
        <section class="login-form">
            <p>fill those inputs to connected to your account
                if you don't have an account <a onclick="$('.login-form').load('_sign-up.html')">register Here</a>
            </p>
            <div class="input user-name">
                <label for="user_name">User Name</label>
                <input type="text" name="user_name" id="user_name" value="">
                <div class="err">
                    <div class="msg arrow_box">this field is empty</div>
                </div>
            </div>
            <div class="input password">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" value="">
                <div class="err">
                    <div class="msg arrow_box">this field is empty</div>
                </div>
            </div>
            <div class="rem">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">remember me</label>
            </div>
            <a href="#">connected as a Guest</a> <br>
            <button type="submit" id="log_in">log in</button>
            <script>
                $('#log_in').on('click', function () {
                    var user_name = $('#user_name').val();
                    var password = $('#password').val();
                    $.ajax({
                        type: 'POST',
                        url: 'inc/log_in.php',
                        data: {
                            user_name: user_name,
                            password: password
                        },
                        success: function (data) {
                            console.log(data);
                            if (data == 0) {
                                window.location.replace("index");
                            }
                        }
                    });
                })
            </script>
        </section>
        <footer>
            <span>all copyright reserved &copy; 2019</span>
        </footer>
    </div>
    <script src="js/main.js"></script>
</body>

</html>