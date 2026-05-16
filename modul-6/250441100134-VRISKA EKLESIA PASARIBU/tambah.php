<?php

include 'cek_login.php';
include 'koneksi.php';

if($_SESSION['role'] != 'admin'){
    die("Akses ditolak");
}

if(isset($_POST['simpan'])){

    $nama = $_POST['nama'];
    $penyelenggara = $_POST['penyelenggara'];
    $tanggal = $_POST['tanggal'];
    $lokasi = $_POST['lokasi'];
    $kuota = $_POST['kuota'];
    $deskripsi = $_POST['deskripsi'];

    $stmt = $conn->prepare(
    "INSERT INTO event
    (nama_event,penyelenggara,tanggal_event,lokasi,kuota,deskripsi)
    VALUES(?,?,?,?,?,?)"
    );

    $stmt->bind_param(
    "ssssis",
    $nama,
    $penyelenggara,
    $tanggal,
    $lokasi,
    $kuota,
    $deskripsi
    );

    $stmt->execute();

    header("Location: index.php");

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Tambah Event</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container mt-5">

<h2>Tambah Event</h2>

<form method="POST">

<input type="text"
name="nama"
class="form-control mb-3"
placeholder="Nama Event"
required>

<input type="text"
name="penyelenggara"
class="form-control mb-3"
placeholder="Penyelenggara"
required>

<input type="date"
name="tanggal"
class="form-control mb-3"
required>

<input type="text"
name="lokasi"
class="form-control mb-3"
placeholder="Lokasi"
required>

<input type="number"
name="kuota"
class="form-control mb-3"
placeholder="Kuota"
required>

<textarea
name="deskripsi"
class="form-control mb-3"
placeholder="Deskripsi"
required></textarea>

<button type="submit"
name="simpan"
class="btn btn-success">

Simpan

</button>

</form>

</body>
</html>