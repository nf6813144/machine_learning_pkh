<?php

session_start();

if(!isset($_SESSION['login'])){

    header("Location: ../auth/login.php");

}

include '../config/koneksi.php';

$query = mysqli_query($conn,

"SELECT * FROM dataset_pkh
ORDER BY id_data DESC

");

?>

<!DOCTYPE html>
<html>
<head>

<title>Dataset PKH</title>

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
    margin-top: 20px;

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

<h1>DATASET PKH</h1>

<table>

<tr>

<th>No</th>
<th>Nama</th>
<th>Penghasilan</th>
<th>Tanggungan</th>
<th>Pekerjaan</th>
<th>Rumah</th>
<th>Kendaraan</th>
<th>Bantuan</th>
<th>Label</th>

</tr>

<?php

$no = 1;

while($d = mysqli_fetch_array($query)){

?>

<tr>

<td><?= $no++; ?></td>

<td><?= $d['nama_masyarakat']; ?></td>

<td>Rp <?= number_format($d['penghasilan']); ?></td>

<td><?= $d['tanggungan']; ?></td>

<td><?= $d['pekerjaan']; ?></td>

<td><?= $d['kondisi_rumah']; ?></td>

<td><?= $d['kendaraan']; ?></td>

<td><?= $d['bantuan_lain']; ?></td>

<td><?= $d['label_kelayakan']; ?></td>

</tr>

<?php } ?>

</table>

<br>

<a href="../index.php"
class="btn">

Kembali Dashboard

</a>

</div>

</body>
</html>
