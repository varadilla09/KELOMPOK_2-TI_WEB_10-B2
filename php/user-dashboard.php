<?php
session_start();

// Memeriksa apakah pengguna sudah login sebagai user
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    // Jika belum login sebagai user, arahkan pengguna ke halaman login
    echo "<script>alert('Anda harus login.'); window.location.href = 'login.php';</script>";
    exit(); // Menghentikan eksekusi skrip selanjutnya
}
//koneksi databsae
include 'dbconnect.php';

// query
$query = "SELECT * FROM wisata";
$result = mysqli_query($conn, $query);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Ease</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        h1 {
            display: flex;
            justify-content: center;
        }

        .image-card img {
            width: 400px;
            height: 400px;
            object-fit: cover;
        }

        .logout {
            margin-top: 50px;
            display: flex;
            justify-content: end;
        }
    </style>
</head>

<body>
    <?php include 'nav.php'; ?>
    <div class="container">
        <div class="tulisan">
            <h1>Rekomendasi Wisata Untuk Anda</h1>
        </div>
        <div class="bungkus">
            <div class="row">
                <?php while ($wisata = mysqli_fetch_assoc($result)) : ?>
                    <div class="col-sm-6 mb-4">
                        <div class="card">
                            <img style="width: 100%; height: 100%;" src="../uploads/<?php echo $wisata['photo']; ?>" class="card-img-top img-fluid image-card" alt="User Photo">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $wisata['name']; ?></h5>
                                <p class="card-text"><?php echo $wisata['address']; ?></p>
                                <a href="<?php echo $wisata['google_maps_link']; ?>" target="_blank" class="btn btn-primary">View on Google Maps</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <div class="logout">
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>

</html>