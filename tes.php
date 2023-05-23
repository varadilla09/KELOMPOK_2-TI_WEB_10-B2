<?php
// Data dummy untuk contoh
$users = [
    [
        'id' => 1,
        'name' => 'John Doe',
        'address' => '123 Main Street',
        'photo' => 'user1.jpg',
        'google_maps_link' => 'https://maps.google.com/...',
    ],
    [
        'id' => 2,
        'name' => 'Jane Smith',
        'address' => '456 Elm Street',
        'photo' => 'user2.jpg',
        'google_maps_link' => 'https://maps.google.com/...',
    ],
    // Tambahkan data lainnya di sini
];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <h1>Dashboard</h1>

    <?php if (isset($_SESSION['status']) && $_SESSION['status'] === 'success') : ?>
        <div class="alert alert-success" role="alert">
            Data berhasil dihapus.
        </div>
        <?php unset($_SESSION['status']); ?>
    <?php endif; ?>

    <div class="container">
        <div class="row">
            <?php foreach ($users as $user) : ?>
                <div class="col-sm-6 mb-4">
                    <div class="card">
                        <img src="uploads/<?php echo $user['photo']; ?>" class="card-img-top" alt="User Photo">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $user['name']; ?></h5>
                            <p class="card-text"><?php echo $user['address']; ?></p>
                            <a href="<?php echo $user['google_maps_link']; ?>" target="_blank" class="btn btn-primary">View on Google Maps</a>
                            <a href="edit.php?id=<?php echo $user['id']; ?>" class="btn btn-secondary">Edit</a>
                            <a href="delete.php?id=<?php echo $user['id']; ?>" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>