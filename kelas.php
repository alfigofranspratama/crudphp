<?php
include 'koneksi.php'; // include koneksi Code By : https://www.trywebdev.my.id/
$query = mysqli_query($con, "SELECT * FROM tb_kelas"); // Mengambil data dari table kelas database Code By : https://www.trywebdev.my.id/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='php native trywebdev, source code php trywebdev, belajar php dari trywebdev, referensi belajar website trywebdev' name='description' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Judul -->
    <title>Data Kelas</title>
    <!-- Css Bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body style="background-color: #f4ffff;">

    <!-- Container bawaan Bootstrap -->
    <div class="container mt-3">
        <!-- Tombol Tambah Data Kleas -->
        <h2 class="mb-3">
            <a href="index.php" class="ml-3 btn btn-primary btn-sm">Data Siswa</a>
            <a href="tambahkelas.php" class="btn btn-secondary btn-sm">+ Data Kelas</a>
        </h2>
        <!-- Table Data Siswa -->
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kelas</th>
                    <th style="width: 20%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Melakukan Pengecekan Apakah ada Data Code By : https://www.trywebdev.my.id/
                if ($query->num_rows == 0) { // Jika Tidak ada Data Code By : https://www.trywebdev.my.id/
                    echo "<tr><td colspan='8' class='text-center'>Tidak ada data</td></tr>";
                } else { // Jika data ada Code By : https://www.trywebdev.my.id/
                    $no = 1;
                    // Melakukan Perulang Data dari Database Code By : https://www.trywebdev.my.id/
                    foreach ($query as $row) :
                        echo "<tr>";
                        echo "<td>" . $no . "</td>";
                        echo "<td>" . $row['kelas'] . "</td>";
                        echo "<td><button class='btn btn-primary btn-sm'>Edit</button>";
                        echo "<button class='btn btn-danger btn-sm'>Hapus</button></td>";
                        echo "</tr>";
                    endforeach;
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Js Bootstrap -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>