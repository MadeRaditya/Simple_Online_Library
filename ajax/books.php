<?php
require '../functions.php';

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$books = search($keyword);
?>


        <?php
        if (empty($books)) {
            echo "<h1 style= text-align: center;
            color: #333;>buku tidak ditemukan </h1>";
        } else {
            foreach ($books as $book) {
                ?>
                <div class="book">
                    <div class="book-cover">
                        <img src="uploads/cover/<?= $book['cover'] ?>" alt="Sampul Buku">
                    </div>
                    <h2><?= $book['title'] ?></h2>
                    <p class="book-description">Author: <?= $book['author'] ?></p>
                    <p class="book-description">Posted by: <?= $book['username'] ?></p>
                    <a href="Book.php?title=<?= urlencode($book['title']) ?>">read</a>
                </div>
                <?php
            }
        }
        ?>
