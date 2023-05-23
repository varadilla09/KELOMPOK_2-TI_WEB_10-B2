<?php
include 'dbconnect.php';

// Menyimpan data pengguna
if (isset($_POST['submit'])) {
    $photo = $_FILES['photo']['name'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $googleMapsLink = $_POST['google_maps_link'];

    // Upload foto ke folder tertentu
    $targetDir = '../uploads/';
    $targetFile = $targetDir . basename($photo);
    move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile);

    // Menyimpan data pengguna ke dalam tabel
    $query = "INSERT INTO wisata (photo, name, address, google_maps_link) VALUES (?, ?, ?, ?)";
    $statement = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($statement, "ssss", $photo, $name, $address, $googleMapsLink);
    mysqli_stmt_execute($statement);

    $_SESSION['status'] = 'success'; // Menyimpan status pemberitahuan
    header('Location: dashboard.php?status=success');

    exit();
}
