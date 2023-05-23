<?php
include 'dbconnect.php';

// query
$query = "SELECT * FROM wisata";
$result = mysqli_query($conn, $query);

session_start();

// Memeriksa apakah pengguna sudah login sebagai admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    // Jika belum login sebagai admin, arahkan pengguna ke halaman login
    echo "<script>alert('Anda harus login sebagai admin.'); window.location.href = '../login.html';</script>";
    exit(); // Menghentikan eksekusi skrip selanjutnya
}
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
    <style>
        .container {
            margin-top: 50px;
            background-color: white;
        }
    </style>

</head>

<body>
    <?php
    include "nav.php"
    ?>
    <div class="container ">
        <div class="centerr d-flex justify-content-center">
            <h1>Dashboard Admin</h1>
        </div>
        <div class="tambah">
            <?php

            if (isset($_GET['status']) && $_GET['status'] == 'success') { ?>
                <div class="alert alert-info mt-3 d-flex justify-content-center" role="alert">
                    Data berhasil ditambahkan.
                </div>
            <?php } ?>
            <?php
            if (isset($_SESSION['status']) && $_SESSION['status'] === 'success di hapus') : ?>
                <div class="alert alert-info mt-3 d-flex justify-content-centers" role="alert">
                    Data berhasil dihapus.
                </div>
                <?php unset($_SESSION['status']); ?>
            <?php endif;
            ?>
            <div class="buttonn d-flex justify-content-between">
                <a href="list-tambah-data.php" class="btn btn-success">Tambah Data</a>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Link Map</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($wisata = mysqli_fetch_assoc($result)) :
                ?>
                    <tr>
                        <th scope="row"><?php echo $no++; ?></th>
                        <td><img src="../uploads/<?php echo $wisata['photo']; ?>" width="100px" height="100px"></td>
                        <td><?php echo $wisata['name']; ?></td>
                        <td><?php echo $wisata['address']; ?></td>
                        <td><a href="<?php echo $wisata['google_maps_link']; ?>" target="_blank"><?php echo $wisata['google_maps_link']; ?></a></td>
                        <td>
                            <a href="edit.php?id=<?php echo $wisata['id']; ?> " class="btn btn-success">Edit</a>
                            <a href="delete.php?id=<?php echo $wisata['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                <?php mysqli_close($conn); ?>

            </tbody>
        </table>
    </div>


    <div class="containerr d-flex flex-column justify-content-center align-items-center">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>