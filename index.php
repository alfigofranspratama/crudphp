<?php
include 'koneksi.php'; // include koneksi Code By : https://www.trywebdev.my.id/
$query = mysqli_query($con, "SELECT * FROM tb_siswa JOIN tb_kelas ON tb_kelas.id_kelas = tb_siswa.id_kelas"); // Menjoinkan Table Kelas Ke Siswa Code By : https://www.trywebdev.my.id/

// Perintah Hapus Siswa Code By : https://www.trywebdev.my.id/
error_reporting(0);
$nisn = $_GET['nisn'];

if ($nisn) {
    $delete = mysqli_query($con, "DELETE FROM tb_siswa WHERE nisn='$nisn'");

    if ($delete) {
        echo "<script>alert('Siswa berhasil di hapus')</script>";
        echo '<meta http-equiv="refresh" content="0; url=index.php">';
    } else {
        echo "<script>alert('Gagal Menghapus Siswa')</script>";
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
    <title>Data Siswa</title>
    <!-- Css Bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body style="background-color: #f4ffff;">

    <!-- Container bawaan Bootstrap -->
    <div class="container mt-3">
        <!-- Tombol Tambah Data Siswa -->
        <h2 class="mb-3">
            <a href="tambahsiswa.php" class="btn btn-primary btn-sm">+ Data Siswa</a>
            <a href="kelas.php" class="ml-3 btn btn-secondary btn-sm">Data Kelas</a>
        </h2>
        <!-- Table Data Siswa -->
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>L/P</th>
                    <th>TTL</th>
                    <th>Kelas</th>
                    <th>Alamat</th>
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
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . $row['nisn'] . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['gender'] . "</td>";
                        echo "<td>" . $row['tempat'] . ", " . $row['tgl_lahir'] . "</td>";
                        echo "<td>" . $row['kelas'] . "</td>";
                        echo "<td>" . $row['alamat'] . "</td>";
                        echo "<td><a href='tambahsiswa.php?nisn=" . $row['nisn'] . "' class='btn btn-primary btn-sm'>Edit</a>";
                        echo "<button type='button' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#exampleModal$row[nisn]'>Hapus</button></td>";
                        echo "</tr>";
                    endforeach;
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Perulangan MODAL Hapus -->
    <?php
    foreach ($query as $row) :
    ?>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal<?= $row['nisn'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-danger">
                        Hapus Siswa <?= $row['nama']; ?> Secara Permanen!!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <a href="index.php?nisn=<?= $row['nisn']; ?>" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    endforeach;
    ?>

    <!-- Js Bootstrap -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> Code By : https://www.trywebdev.my.id/
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script> Code By : https://www.trywebdev.my.id/
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script> Code By : https://www.trywebdev.my.id/
</body>

</html>