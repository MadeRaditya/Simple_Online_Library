<?php
    $isLogin="";
    $Link = "";
    if(isset($_SESSION["login"])){
        $isLogin = "Logout";
        $Link ="logout.php";
    }else{
        $isLogin = "Login";
        $Link ="login.php";
    }
?>


<nav class="nav_container">
        <a class="logo" href="index.php">Reader</a>
        <ul class="Nav_links">
            <li class="Nav_item"><a href="index.php" class="item_nav">Home</a></li>
            <li class="Nav_item"><a href="about.php" class="item_nav">About</a></li>
            <li class="Nav_item"><a href="contact.php" class="item_nav">Contact</a></li>
        </ul>
        <ul>
            <li class="Nav_item"><a href="<?= $Link ?>" class="item_nav"><?= $isLogin ?></a></li>
        </ul>
</nav>