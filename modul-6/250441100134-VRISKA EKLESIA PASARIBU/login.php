<?php

session_start();

include 'koneksi.php';

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare(
    "SELECT * FROM users WHERE email=?"
    );

    $stmt->bind_param("s",$email);

    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows > 0){

        $user = $result->fetch_assoc();

        if(password_verify(
            $password,
            $user['password']
        )){

            $_SESSION['login'] = true;
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['role'] = $user['role'];

            header("Location: ../event/index.php");
            exit;
        }

    }

    echo "Email atau password salah";

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container mt-5">

<h2>Login</h2>

<form method="POST">

<input type="email"
name="email"
class="form-control mb-3"
placeholder="Email"
required>

<input type="password"
name="password"
class="form-control mb-3"
placeholder="Password"
required>

<button type="submit"
name="login"
class="btn btn-success">

Login

</button>

</form>

<p class="mt-3">
Belum punya akun?
<a href="register.php">Register</a>
</p>

</body>
</html>