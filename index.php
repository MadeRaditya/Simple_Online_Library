<?php
    session_start();
    
    include "functions.php";

    if(!isset($_SESSION["login"])){
        header("Location:login.php");
        exit;
    }

    $books = getBook();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reader</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
<?php
        include "components/navbar.php"
    ?>
</header>
    
<div class="container">
        <h1>Selamat datang di Perpustakaan Ebook</h1>
        <h2>Fell free for reading book</h2>
        <div class="search-container">
            <input type="text" id="search-input" placeholder="Cari judul buku..." style="height: 1rem; width: 30rem;">
            <button id="search-button" onclick="searchBooks()">search</button>
        </div>
            <a href="tambah_buku.php"><button id="add-book">Tambah Buku</button></a>
        <div class="book-list">
            <?php
            foreach($books as $book) :?>
                <div class="book">
                    <div class="book-cover">
                        <img src="uploads/cover/<?=$book['cover']?>" alt="Sampul Buku  " >
                    </div>
                    <h2><?= $book['title'] ?> </h2>
                    <p class="book-description"><?= $book['author']?></p>
                    <a href="Book.php?title=<?= urlencode($book['title']) ?>">read</a>
                </div>
            <?php endforeach?>
    </div>

    <?php
        include "components/footer.php"
    ?>

<script>
        function searchBooks() {
            let input = document.getElementById('search-input');
            let filter = input.value.toUpperCase();
            let bookList = document.getElementsByClassName('book-list')[0];
            let books = bookList.getElementsByClassName('book');
            for (let i = 0; i < books.length; i++) {
                let book = books[i];
                let title = book.getElementsByTagName("h2")[0];
                let txtValue = title.textContent || title.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    book.style.display = "";
                } else {
                    book.style.display = "none";
                }
            }
        }

        document.getElementById("search-input").addEventListener('keyup', function (event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    searchBooks();
                }
            });
    </script>
</body>
</html>