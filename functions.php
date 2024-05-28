<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    };

    function getBook(){
        global $conn;
        $query = 'SELECT * FROM books';
        $result = mysqli_query($conn, $query);
        
        if (!$result) {
            die("Error: " . mysqli_error($conn));
        }
        
        $books = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $books[] = $row;
        }
        
        return $books;
    }
    
    function getPdfPath($title){
    $pdfDir = 'uploads/book/';
    $pdfFiles = scandir($pdfDir);

    foreach ($pdfFiles as $file) {
        if (strpos($file, $title) !== false && pathinfo($file, PATHINFO_EXTENSION) === 'pdf') {
            return $pdfDir . $file;
        }
    }

        return '';
    }


    function register($data){
        global $conn;
        $username = strtolower(stripslashes( $data['username']));
        $email = $data['email'];
        $password = mysqli_real_escape_string($conn,$data['password']);
        $password2 = mysqli_real_escape_string($conn,$data['password2']);

        //cek apakah username sudah ada 
        $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>
            alert('Username sudah digunakan!');
            </script>";
            return false;
        }

        // Periksa apakah email sudah digunakan
        $result = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                alert('Email sudah digunakan!');
                </script>";
            return false;
        }

         // Validasi format email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>
                alert('Format email tidak valid!');
                </script>";
            return false;
        }

        // Validasi kekuatan password (contoh: minimal 6 karakter)
        if (strlen($password) < 8) {
            echo "<script>
                alert('Password minimal harus 8 karakter!');
                </script>";
            return false;
        }

        // cek confirm password
        if($password !== $password2){
            echo "<script>
            alert('wrong confirm password !');
            </script>";
            return false;
        };

        // enkripsi password
        $password = password_hash($password,PASSWORD_DEFAULT);

        $query = "INSERT INTO users VALUES ('','$username','$email','$password')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }


    function tambah(){
        
    }
?>


