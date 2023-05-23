<?php
include 'php/dbconnect.php'; // Menghubungkan ke file koneksi database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];


    // Query untuk memasukkan data ke tabel pengguna
    $query = "INSERT INTO user (username, password) VALUES ('$username', '$password')";

    // Jalankan query
    if (mysqli_query($conn, $query)) {
        // Pendaftaran berhasil, arahkan pengguna ke halaman login
        header("Location: login.php");
        exit();
    } else {
        // Jika terjadi kesalahan saat menjalankan query
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style-login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body {
            background-image: url("img/register.jpg");
            background-size: cover;
            background-position: fixed;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body>
    <div id="register" class="d-flex align-items-center justify-content-center vh-100">
        <div class="login-form">
            <h2>Register</h2>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
            <p class="mt-3">Sudah punya akun? <a href="login.php">Login</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>