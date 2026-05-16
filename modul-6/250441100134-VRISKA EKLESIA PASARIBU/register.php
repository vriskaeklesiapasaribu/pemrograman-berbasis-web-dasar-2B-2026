<?php

include 'koneksi.php';

if(isset($_POST['register'])){

    $nama = $_POST['nama'];
    $email = $_POST['email'];

    $password = password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    );

    $stmt = $conn->prepare(
    "INSERT INTO users(nama,email,password)
    VALUES(?,?,?)"
    );

    $stmt->bind_param(
    "sss",
    $nama,
    $email,
    $password
    );

    if($stmt->execute()){

        header("Location: login.php");
        exit;

    } else {

        echo "Registrasi gagal";

    }

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container mt-5">

<h2>Register</h2>

<form method="POST">

<input type="text"
name="nama"
class="form-control mb-3"
placeholder="Nama"
required>

<input type="email"
name="email"
class="form-control mb-3"
placeholder="Email"
required>

<input type="password"
name="password"
class="form-control mb-3"
placeholder="Password"
required minlength="6">

<button type="submit"
name="register"
class="btn btn-primary">

Register

</button>

</form>

</body>
</html>