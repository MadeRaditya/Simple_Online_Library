<?php
session_start();
    
include "functions.php";

if(!isset($_SESSION["login"])){
    header("Location:login.php");
    exit;
}

$title = isset($_GET['title']) ? urldecode($_GET['title']) : '';

$pdfPath = getPdfPath($title);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "components/navbar.php" ?>

    <h1><?= $title ?></h1>

    <?php if (!empty($pdfPath)): ?>
        <embed type="application/pdf" src="<?= $pdfPath ?>" width="1400px" height="800px">
    <?php else: ?>
        <p>Buku tidak ditemukan.</p>
    <?php endif; ?>

    <?php include "components/footer.php" ?>
</body>
</html>