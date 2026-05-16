<?php

include 'cek_login.php';
include 'koneksi.php';

if($_SESSION['role'] != 'admin'){
    die("Akses ditolak");
}

$id = $_GET['id'];

$stmt = $conn->prepare(
"SELECT * FROM event WHERE id=?"
);

$stmt->bind_param("i",$id);

$stmt->execute();

$data = $stmt->get_result()->fetch_assoc();

if(isset($_POST['update'])){

    $nama = $_POST['nama'];
    $penyelenggara = $_POST['penyelenggara'];
    $tanggal = $_POST['tanggal'];
    $lokasi = $_POST['lokasi'];
    $kuota = $_POST['kuota'];
    $deskripsi = $_POST['deskripsi'];

    $update = $conn->prepare(
    "UPDATE event SET
    nama_event=?,
    penyelenggara=?,
    tanggal_event=?,
    lokasi=?,
    kuota=?,
    deskripsi=?
    WHERE id=?"
    );

    $update->bind_param(
    "ssssisi",
    $nama,
    $penyelenggara,
    $tanggal,
    $lokasi,
    $kuota,
    $deskripsi,
    $id
    );

    $update->execute();

    header("Location: index.php");

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Event</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container mt-5">

<h2>Edit Event</h2>

<form method="POST">

<input type="text"
name="nama"
value="<?= htmlspecialchars($data['nama_event']) ?>"
class="form-control mb-3"
required>

<input type="text"
name="penyelenggara"
value="<?= htmlspecialchars($data['penyelenggara']) ?>"
class="form-control mb-3"
required>

<input type="date"
name="tanggal"
value="<?= htmlspecialchars($data['tanggal_event']) ?>"
class="form-control mb-3"
required>

<input type="text"
name="lokasi"
value="<?= htmlspecialchars($data['lokasi']) ?>"
class="form-control mb-3"
required>

<input type="number"
name="kuota"
value="<?= htmlspecialchars($data['kuota']) ?>"
class="form-control mb-3"
required>

<textarea
name="deskripsi"
class="form-control mb-3"
required><?= htmlspecialchars($data['deskripsi']) ?></textarea>

<button type="submit"
name="update"
class="btn btn-primary">

Update

</button>

</form>

</body>
</html>