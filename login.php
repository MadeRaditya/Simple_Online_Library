<?php
    require "functions.php";

    if(isset($_POST["login"])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $result= mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

        if(mysqli_num_rows($result) === 1){

            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row["password"])){
                header("Location:index.php");

                exit;
            }
        }
        $error = true;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <?php
        include "components/navbar.php"
    ?>
    <div class="login-body">
        <div class="login-container">
            <h1 class="login-title">Login</h1>
            <?php if(isset($error)):?>
                <p style="color: red; font-style:italic;">wrong email or password</p>
            <?php endif; ?>
            <form action="" method="POST" class="login-form">
                <ul class="login-list">
                    <li class="login-item"> 
                        <label for="email" class="login-label">Email</label>
                        <input type="email" name="email" id="email" class="login-input" required>
                    </li>
                    <li class="login-item">
                        <label for="password" class="login-label">Password</label>
                        <input type="password" name="password" id="password" class="login-input" required>
                    </li>
                    <li class="login-item">
                        <button type="submit" name="login" class="login-button">Login</button>
                    </li>
                </ul>
            </form>
            <p>don't have an account ? <a href="register.php" class="item-login">Register</a></p>
        </div>
    </div>
    <?php
        include "components/footer.php"
    ?>
</body>
</html>