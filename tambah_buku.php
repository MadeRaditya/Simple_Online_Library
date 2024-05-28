<?php
session_start();
require "functions.php";

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

if(isset($_COOKIE["e"]) && isset($_COOKIE['i'])){
    $id = $_COOKIE['e'];
    $key = $_COOKIE['i'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = UNHEX('$id')");
    $row = mysqli_fetch_assoc($result);

    if($row) { 
        if($key === $row['password']){
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['login'] = true;
        }
    }
}

if (isset($_POST['add-book'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $cover = $_FILES['cover']['name'];
    $book = $_FILES['book']['name'];

    echo $title;
    echo $author;
    echo $cover;
    echo $book;
    // Upload cover image
    if (!empty($cover)) {
        $target_dir = "uploads/cover/";
        $cover_file = $title . '.' . pathinfo($cover, PATHINFO_EXTENSION); 
        $target_file = $target_dir . $cover_file;
        move_uploaded_file($_FILES["cover"]["tmp_name"], $target_file);
    }
    

    // Upload book file
    if (!empty($book)) {
        $target_dir = "uploads/book/";
        $book_file = $title . '.' . pathinfo($book, PATHINFO_EXTENSION);
        $target_file = $target_dir . $book_file;
        move_uploaded_file($_FILES["book"]["tmp_name"], $target_file);
    }
    
    $postedby = $_SESSION['user_id']; 
    echo $postedby;
    $query = "INSERT INTO books (title, author, posted_by, cover, file_name, create_time) VALUES ('$title', '$author', '$postedby', '$cover_file', '$book_file', NOW())";

    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>alert('Buku berhasil ditambahkan!'); window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan buku.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'components/navbar.php'?>
    
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data" class="add-book-form">
            <ul class="add-book-list">
                <li class="add-book-item">
                    <label for="title" class="add-book-label">Judul</label>
                    <input type="text" name="title" id="title" class="add-book-input" required>
                </li>
                <li class="add-book-item" >
                    <label for="author" class="add-book-label">Penulis</label>
                    <input type="text" name="author" id="author" class="add-book-input" required>
                </li>
                <li class="add-book-item">
                    <label for="cover" class="add-book-label">Cover</label>
                    <input type="file" name="cover" id="cover" class="add-book-input" required>
                </li>
                <li class="add-book-item">
                    <label for="book" class="add-book-label">Book</label>
                    <input type="file" name="book" id="book" class="add-book-input" required>
                </li>
                <li class="add-book-item">
                    <button type="submit" name="add-book">Submit</button>
                </li>
            </ul>
        </form>
    </div>
    <?php include 'components/footer.php'?>
</body>
</html>