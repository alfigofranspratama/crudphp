<?php
include 'koneksi.php'; // include koneksi Code By : https://www.trywebdev.my.id/
$query = mysqli_query($con, "SELECT * FROM tb_kelas"); // Mengambil data dari table kelas database Code By : https://www.trywebdev.my.id/

// Perintah Tambah Kelas Code By : https://www.trywebdev.my.id/
if (isset($_POST['tambah'])) {
    $kelas = htmlspecialchars($_POST['kelas']);

    $insert = mysqli_query($con, "INSERT INTO tb_kelas (kelas) VALUES ('$kelas')");

    if ($insert) {
        echo "<script>alert('Kelas $kelas Berhasil di Tambahkan')</script>";
    } else {
        echo "<script>alert('Kelas $kelas Gagal di Tambahkan')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='php native trywebdev, source code php trywebdev, belajar php dari trywebdev, referensi belajar website trywebdev' name='description' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Judul -->
    <title>Tambah Kelas</title>
    <!-- Css Bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body style="background-color: #f4ffff;">

    <!-- Container bawaan Bootstrap -->
    <div class="container mt-3">
        <!-- Tombol Navigasi -->
        <h2 class="mb-3">
            <a href="index.php" class="btn btn-primary btn-sm">Data Siswa</a>
            <a href="kelas.php" class="ml-3 btn btn-secondary btn-sm">Data Kelas</a>
        </h2>
        <!-- Form Tambah Kelas -->
        <div class="card" style="width: 450px !important;">
            <div class="card-header">
                <div class="card-title">Tambah Kelas</div>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Kelas</label>
                        <input type="text" name="kelas" required class="form-control" id="">
                    </div>
                    <div class="mt-3">
                        <button type="submit" name="tambah" class="btn btn-primary btn-sm">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Js Bootstrap -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>