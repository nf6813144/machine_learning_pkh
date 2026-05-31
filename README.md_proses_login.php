<?php

session_start();

include '../config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn,

"SELECT * FROM users
WHERE username='$username'
AND password='$password'

");

$cek = mysqli_num_rows($query);

if($cek > 0){

    $data = mysqli_fetch_assoc($query);

    $_SESSION['login'] = true;

    $_SESSION['id_user'] = $data['id_user'];

    $_SESSION['nama_user'] = $data['nama_user'];

    $_SESSION['role'] = $data['role'];

    header("Location: ../index.php");

}else{

    echo "

    <script>

        alert('Username atau Password Salah');

        window.location='login.php';

    </script>

    ";

}

?>
