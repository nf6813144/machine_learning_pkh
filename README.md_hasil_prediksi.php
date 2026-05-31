<?php

session_start();

if(!isset($_SESSION['login'])){

    header("Location: ../auth/login.php");

}

include '../config/koneksi.php';

$query = mysqli_query($conn,

"SELECT hasil_prediksi.*,
users.nama_user

FROM hasil_prediksi

LEFT JOIN users
ON hasil_prediksi.id_user = users.id_user

ORDER BY id_prediksi DESC

");

?>

<!DOCTYPE html>
<html>
<head>

<title>Data Hasil Prediksi</title>

<style>

body{

    font-family: Arial;
    background: #f5f5f5;
    padding: 30px;

}

.container{

    background: white;
    padding: 30px;
    border-radius: 10px;

}

table{

    width: 100%;
    border-collapse: collapse;

}

table, th, td{

    border: 1px solid black;
    padding: 10px;
    text-align: center;

}

.btn{

    display: inline-block;
    padding: 10px 20px;
    background: royalblue;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 20px;

}

</style>

</head>

<body>

<div class="container">

<h1>DATA HASIL PREDIKSI</h1>

<table>

<tr>

<th>No</th>
<th>Nama</th>
<th>Prediksi</th>
<th>Nilai K</th>
<th>Akurasi</th>
<th>User</th>

</tr>

<?php

$no = 1;

while($d = mysqli_fetch_array($query)){

?>

<tr>

<td><?= $no++; ?></td>

<td><?= $d['nama_input']; ?></td>

<td><?= $d['hasil_prediksi']; ?></td>

<td><?= $d['nilai_k']; ?></td>

<td><?= $d['nilai_akurasi']; ?>%</td>

<td><?= $d['nama_user']; ?></td>

</tr>

<?php } ?>

</table>

<br>

<a href="../index.php" class="btn">

Kembali Dashboard

</a>

</div>

</body>
</html>
