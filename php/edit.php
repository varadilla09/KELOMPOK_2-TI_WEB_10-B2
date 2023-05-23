<?php
include 'dbconnect.php';

session_start();

// Memeriksa apakah pengguna sudah login sebagai admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    // Jika belum login sebagai admin, arahkan pengguna ke halaman login
    echo "<script>alert('Anda harus login sebagai admin.'); window.location.href = '../login.html';</script>";
    exit(); // Menghentikan eksekusi skrip selanjutnya
}
// Mengambil data pengguna berdasarkan ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM wisata WHERE id = ?";
    $statement = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($statement, "i", $id);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    $user = mysqli_fetch_assoc($result);
}

// Menyimpan perubahan data pengguna
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $googleMapsLink = $_POST['google_maps_link'];

    $query = "UPDATE wisata SET name = ?, address = ?, google_maps_link = ? WHERE id = ?";
    $statement = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($statement, "sssi", $name, $address, $googleMapsLink, $id);
    mysqli_stmt_execute($statement);

    header('Location: dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Wisata</title>
    <link rel="stylesheet" href="../css/style-tambah-data.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <?php
    include 'nav.php';
    ?>
    <div class="containerr d-flex flex-column justify-content-center align-items-center">

        <h1 class="text-white">Edit data Wisata</h1>
        <form action="edit.php" method="POST" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            </div>

            <div class="form-group mb-3">
                <label for="name">Nama:</label>
                <input type="text" name="name" value="<?php echo $user['name']; ?>" required><br><br>
            </div>

            <div class="form-group mb-3">
                <label for="address">Alamat:</label>
                <input type="text" name="address" value="<?php echo $user['address']; ?>" required><br><br>
            </div>

            <div class="form-group mb-3">
                <label for="google_maps_link">Link Google Maps:</label>
                <input type="text" name="google_maps_link" value="<?php echo $user['google_maps_link']; ?>" required><br><br>
            </div>

            <input type="submit" name="submit" value="Simpan" class="btn btn-success">
        </form>

    </div>
</body>

</html>