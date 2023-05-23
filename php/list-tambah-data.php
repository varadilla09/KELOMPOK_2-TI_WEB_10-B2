<?php
session_start();

// Memeriksa apakah pengguna sudah login sebagai admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    // Jika belum login sebagai admin, arahkan pengguna ke halaman login
    echo "<script>alert('Anda harus login sebagai admin.'); window.location.href = '../login.html';</script>";
    exit(); // Menghentikan eksekusi skrip selanjutnya
}

// Jika pengguna sudah login sebagai admin, lanjutkan dengan menampilkan halaman tambah data
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style-tambah-data.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body>
    <?php
    include "nav.php"
    ?>

    <div class="containerr d-flex flex-column justify-content-center align-items-center">

        <h1 class="text-white">Tambah Wisata</h1>
        <form action="kirimdata.php" method="POST" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <label for="photo">Foto:</label>
                <input type="file" class="form-control" name="photo" required>
            </div>

            <div class="form-group mb-3">
                <label for="name">Nama:</label>
                <input type="text" class="form-control" name="name" required>
            </div>

            <div class="form-group mb-3">
                <label for="address">Alamat:</label>
                <input type="text" class="form-control" name="address" required>
            </div>

            <div class="form-group mb-3">
                <label for="google_maps_link">Link Google Maps:</label>
                <input type="text" class="form-control" name="google_maps_link" required>
            </div>

            <input type="submit" name="submit" value="Tambah" class="btn btn-success">
        </form>

    </div>
</body>

</html>