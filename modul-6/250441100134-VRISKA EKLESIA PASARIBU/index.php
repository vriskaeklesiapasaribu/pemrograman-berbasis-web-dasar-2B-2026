<?php

include 'cek_login.php';
include 'koneksi.php';

$data = $conn->query("SELECT * FROM event");

?>

<!DOCTYPE html>
<html>
<head>

<title>Data Event</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container mt-5">

<h2>Data Event Kampus</h2>

<p>
Login sebagai :
<b><?= htmlspecialchars($_SESSION['nama']) ?></b>
(<?= htmlspecialchars($_SESSION['role']) ?>)
</p>

<a href="logout.php"
class="btn btn-danger mb-3">

Logout

</a>

<?php if($_SESSION['role'] == 'admin'): ?>

<a href="tambah.php"
class="btn btn-primary mb-3">

Tambah Event

</a>

<?php endif; ?>

<table class="table table-bordered">

<tr>

<th>No</th>
<th>Nama Event</th>
<th>Penyelenggara</th>
<th>Tanggal event</th>
<th>Lokasi</th>
<th>Kuota</th>
<th>deskripsi</th>
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

<?php if($_SESSION['role'] == 'admin'): ?>
<th>Aksi</th>
<?php endif; ?>

</tr>

<?php

$no = 1;

while($row = $data->fetch_assoc()):

?>

<tr>

<td><?= $no++ ?></td>

<td>
<?= htmlspecialchars($row['nama_event']) ?>
</td>

<td>
<?= htmlspecialchars($row['penyelenggara']) ?>
</td>

<td>
<?= htmlspecialchars($row['tanggal_event']) ?>
</td>

<td>
<?= htmlspecialchars($row['lokasi']) ?>
</td>

<td>
<?= htmlspecialchars($row['kuota']) ?>
</td>

<?php if($_SESSION['role'] == 'admin'): ?>

<td>

<a href="edit.php?id=<?= $row['id'] ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a href="hapus.php?id=<?= $row['id'] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin hapus?')">

Hapus

</a>

</td>

<?php endif; ?>

</tr>

<?php endwhile; ?>

</table>

</body>
</html>