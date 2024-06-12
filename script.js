$(document).ready(function() {

    $('#search-input').on('keyup', function(e) {
        var keyword = $(this).val().trim();

        if (keyword.length > 0) {
            if (e.which === 13) {
                searchBooks(keyword);
            } else {
                $.get('ajax/books.php?keyword=' + keyword, function(data) {
                    $('.book-list').html(data);
                });
            }
        } else {
            $('.book-list').load('index.php .book-list > *');
        }
    });

    $('#search-button').on('click', function() {
        var keyword = $('#search-input').val().trim();
        searchBooks(keyword);
    });

    function searchBooks(keyword) {
        $.get('ajax/books.php?keyword=' + keyword, function(data) {
            $('.book-list').html(data);
        });
    }
});