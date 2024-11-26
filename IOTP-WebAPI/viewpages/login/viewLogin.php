<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<img class="wave" src="../../assets/images/waves.png">
<div class="container2">

    <div class="loginimg">
        <img src="../../assets/svg/pic2.svg">
    </div>

    <div class="login-content">

        <form action="index.php" method="POST">
            <img src="../../assets/pp/avatar2.png">
            <h2 class="title">Welcome</h2>
            <h3 class="desc">Administrator</h3>
            <div class="input-div one">
                <div class="user-log">
                    <i class="fas fa-user"></i>
                </div>
                <div class="div">
                    <h5>Username</h5>
                    <!-- Username Input -->
                    <input type="text" class="input" name="username" required>
                </div>
            </div>
            <div class="input-div pass">
                <div class="user-log">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5>Password</h5>
                    <!-- Password Input -->
                    <input type="password" class="input" name="password" required>
                </div>
            </div>
            <a class="forgot" href="index.php?action=exitDemo">Exit Demo</a>
            <input type="submit" class="submit-log" value="Login">

            <!-- Hidden Values -->
            <input type="hidden" name="action" value="attemptLogin">
        </form>
    </div>
</div>
<script type="text/javascript" src="../../js/script.js"></script>
</body>
</html>
