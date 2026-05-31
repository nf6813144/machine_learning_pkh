<?php

session_start();

if(!isset($_SESSION['login'])){

    header("Location: ../auth/login.php");

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Input Data PKH</title>

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

input, select{

    width: 100%;
    padding: 10px;
    margin-top: 10px;

}

button{

    padding: 12px;
    background: royalblue;
    color: white;
    border: none;
    margin-top: 20px;
    width: 100%;

}

a{

    text-decoration: none;

}

</style>

</head>

<body>

<div class="container">

<h1>INPUT DATA PREDIKSI PKH</h1>

<form action="proses_prediksi.php" method="POST">

Nama Masyarakat

<input
type="text"
name="nama"
required>

Penghasilan

<input
type="number"
name="penghasilan"
required>

Jumlah Tanggungan

<input
type="number"
name="tanggungan"
required>

Pekerjaan

<select name="pekerjaan">

    <option>Pengangguran</option>
    <option>Buruh</option>
    <option>Petani</option>
    <option>Wiraswasta</option>
    <option>PNS</option>

</select>

Kondisi Rumah

<select name="rumah">

    <option>Tidak Layak</option>
    <option>Sederhana</option>
    <option>Mewah</option>

</select>

Kendaraan

<select name="kendaraan">

    <option>Tidak Ada</option>
    <option>Motor</option>
    <option>Mobil</option>

</select>

Bantuan Lain

<select name="bantuan">

    <option>Tidak Ada</option>
    <option>Ada</option>

</select>

<button type="submit">

PROSES PREDIKSI

</button>

</form>

<br>

<a href="../index.php">

Kembali Dashboard

</a>

</div>

</body>
</html>
