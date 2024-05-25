<?php
require"functions.php";

    if(isset($_POST["register"])){
        if(register($_POST) > 0){
            echo"<script>
                alert('berhasil mendaftar !');
                </script>";
                
        }else{
            echo mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
    <div class="register-body">
        <div class="register-container">
            <h1 class="register-title">Register</h1>
            <form action="" method="POST" class="register-form">
                <ul class="register-list">
                    <li class="register-item">
                        <label for="username" class="register-label">Username</label>
                        <input type="text" name="username" id="username" class="register-input" required>
                    </li>
                    <li class="register-item"> 
                        <label for="email" class="register-label">Email</label>
                        <input type="email" name="email" id="email" class="register-input" required>
                    </li>
                    <li class="register-item">
                        <label for="password" class="register-label">Password</label>
                        <input type="password" name="password" id="password" class="register-input" required>
                    </li>
                    <li class="register-item">
                        <label for="password2" class="register-label">Confirm Password</label>
                        <input type="password" name="password2" id="password2" class="register-input" required>
                    </li>
                    <li class="register-item">
                        <button type="submit" name="register" class="register-button">Sign in</button>
                    </li>
                </ul>
            </form>
            <p>already have an account? <a href="login.php" class="item-register">Login</a></p>
        </div>
    </div>

    <?php
        include "components/footer.php"
    ?>
</body>
</html>