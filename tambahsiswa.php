<?php
include 'koneksi.php'; // include koneksi Code By : Code By : https://www.trywebdev.my.id/
error_reporting(0);
$query = mysqli_query($con, "SELECT * FROM tb_kelas"); // Mengambil data dari table kelas database Code By : Code By : https://www.trywebdev.my.id/

// Perintah Tambah Siswa Code By : Code By : https://www.trywebdev.my.id/
if (isset($_POST['tambah'])) {
    $nisn = htmlspecialchars($_POST['nisn']);
    $nama = htmlspecialchars($_POST['nama']);
    $gender = htmlspecialchars($_POST['gender']);
    $tempat = htmlspecialchars($_POST['tempat']);
    $tanggal = $_POST['tanggal'];
    $id_kelas = htmlspecialchars($_POST['id_kelas']);
    $alamat = htmlspecialchars($_POST['alamat']);

    $insert = mysqli_query($con, "INSERT INTO tb_siswa (nisn,nama,gender,tempat,tgl_lahir,id_kelas,alamat) VALUES ('$nisn','$nama','$gender','$tempat','$tanggal','$id_kelas','$alamat')");

    if ($insert) {
        echo "<script>alert('Siswa $nama Berhasil di Tambahkan')</script>";
    } else {
        echo "<script>alert('Siswa $nama Gagal di Tambahkan')</script>";
    }
}

// Edit Code By : Code By : https://www.trywebdev.my.id/
$nisn = $_GET['nisn'];

if ($nisn) {
    $q = mysqli_query($con, "SELECT * FROM tb_siswa WHERE nisn='$nisn'")->fetch_array();

    if (isset($_POST['edit'])) {
        $nama = htmlspecialchars($_POST['nama']);
        $gender = htmlspecialchars($_POST['gender']);
        $tempat = htmlspecialchars($_POST['tempat']);
        $tanggal = $_POST['tanggal'];
        $id_kelas = htmlspecialchars($_POST['id_kelas']);
        $alamat = htmlspecialchars($_POST['alamat']);

        $edit = mysqli_query($con, "UPDATE tb_siswa SET nama='$nama', gender='$gender',tempat='$tempat',tgl_lahir='$tanggal',id_kelas='$id_kelas',alamat='$alamat' WHERE nisn='$nisn'");

        if ($edit) {
            echo "<script>alert('Berhasil edit siswa $nama')</script>";
            echo '<meta http-equiv="refresh" content="0; url=index.php">';
        } else {
            echo "<script>alert('Gagal edit siswa $nama')</script>";
        }
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
    <title>Tambah Siswa</title>
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
        <!-- Form Tambah Siswa -->
        <div class="card" style="width: 450px !important;">
            <div class="card-header">
                <div class="card-title"><?php if ($nisn) {
                                            echo "Edit";
                                        } else {
                                            echo "Tambah";
                                        } ?> Siswa</div>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">NISN</label>
                        <input type="text" name="nisn" <?php if ($nisn) {
                                                            echo "value='$q[nisn]' disabled";
                                                        } ?> required class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" <?php if ($nisn) {
                                                            echo "value='$q[nama]'";
                                                        } ?> required class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Gender</label>
                        <select name="gender" id="" class="form-control" required>
                            <?php
                            if ($q['gender'] == 'Laki-Laki') {
                                $l = 'selected';
                            } elseif ($q['gender'] == 'Perempuan') {
                                $p = 'selected';
                            }
                            ?>
                            <option <?= $l ?> value="Laki-Laki">Laki-Laki</option>
                            <option <?= $p ?> value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tempat Tanggal Lahir</label>
                        <div class="row">
                            <div class="col-6">
                                <input type="text" <?php if ($nisn) {
                                                        echo "value='$q[tempat]'";
                                                    } ?> required name="tempat" class="form-control" id="">
                            </div>
                            <div class="col-6">
                                <input type="date" <?php if ($nisn) {
                                                        echo "value='$q[tgl_lahir]'";
                                                    } ?> required name="tanggal" class="form-control" id="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Kelas</label>
                        <select name="id_kelas" id="" class="form-control" required>
                            <?php
                            foreach ($query as $row) {
                                if ($row['id_kelas'] == $q['id_kelas']) {
                                    echo '<option selected value="' . $row['id_kelas'] . '">' . $row['kelas'] . '</option>';
                                } else {
                                    echo '<option value="' . $row['id_kelas'] . '">' . $row['kelas'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" class="form-control" required id="" cols="30" rows="5"><?php if ($nisn) {
                                                                                                            echo $q['alamat'];
                                                                                                        } ?></textarea>
                    </div>
                    <div class="mt-3">
                        <button type="submit" <?php if ($nisn) {
                                                    echo "name='edit'";
                                                } else {
                                                    echo 'name="tambah"';
                                                } ?> class="btn btn-primary btn-sm"><?php if ($nisn) {
                                                                                        echo "Edit";
                                                                                    } else {
                                                                                        echo 'Tambah"';
                                                                                    } ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Js Bootstrap -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>