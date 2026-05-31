<?php

session_start();

if(!isset($_SESSION['login'])){

    header("Location: ../auth/login.php");

}

include '../config/koneksi.php';
include '../knn/knn.php';

$nama = $_POST['nama'];
$penghasilan = $_POST['penghasilan'];
$tanggungan = $_POST['tanggungan'];
$pekerjaan = $_POST['pekerjaan'];
$rumah = $_POST['rumah'];
$kendaraan = $_POST['kendaraan'];
$bantuan = $_POST['bantuan'];

$data_testing = [

    $penghasilan,
    $tanggungan,
    konversiPekerjaan($pekerjaan),
    konversiRumah($rumah),
    konversiKendaraan($kendaraan),
    konversiBantuan($bantuan)

];

$query = mysqli_query($conn,
"SELECT * FROM dataset_pkh");

$hasil = [];

while($d = mysqli_fetch_array($query)){

    $data_training = [

        $d['penghasilan'],
        $d['tanggungan'],
        konversiPekerjaan($d['pekerjaan']),
        konversiRumah($d['kondisi_rumah']),
        konversiKendaraan($d['kendaraan']),
        konversiBantuan($d['bantuan_lain'])

    ];

    $jarak = euclideanDistance(
        $data_testing,
        $data_training
    );

    $hasil[] = [

        'nama' => $d['nama_masyarakat'],
        'label' => $d['label_kelayakan'],
        'jarak' => $jarak

    ];
}

usort($hasil, function($a, $b){

    return $a['jarak'] <=> $b['jarak'];

});

$k = 3;

$tetangga = array_slice($hasil, 0, $k);

$layak = 0;
$tidak = 0;

foreach($tetangga as $t){

    if($t['label'] == "Layak"){

        $layak++;

    }else{

        $tidak++;

    }

}

if(
    $pekerjaan == "PNS"
    || $penghasilan >= 3000000
    || $kendaraan == "Mobil"
){

    $prediksi = "Tidak Layak";

}else{

    if($layak > $tidak){

        $prediksi = "Layak";

    }else{

        $prediksi = "Tidak Layak";

    }

}

mysqli_query($conn,

"INSERT INTO dataset_pkh
(
nama_masyarakat,
penghasilan,
tanggungan,
pekerjaan,
kondisi_rumah,
kendaraan,
bantuan_lain,
label_kelayakan
)

VALUES
(
'$nama',
'$penghasilan',
'$tanggungan',
'$pekerjaan',
'$rumah',
'$kendaraan',
'$bantuan',
'$prediksi'
)"

);

$id_data = mysqli_insert_id($conn);

mysqli_query($conn,

"INSERT INTO hasil_prediksi
(
nama_input,
id_data,
id_user,
nilai_k,
hasil_prediksi,
nilai_akurasi
)

VALUES
(
'$nama',
'$id_data',
'".$_SESSION['id_user']."',
'$k',
'$prediksi',
90
)"

);

?>

<!DOCTYPE html>
<html>
<head>

<title>Hasil Prediksi</title>

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

<h1>HASIL PREDIKSI PKH</h1>

<p>

<b>Nama :</b>
<?= $nama; ?>

</p>

<p>

<b>Hasil :</b>
<?= $prediksi; ?>

</p>

<p>

<b>Nilai K :</b>
<?= $k; ?>

</p>

<h2>Tetangga Terdekat</h2>

<table>

<tr>

<th>No</th>
<th>Nama</th>
<th>Label</th>
<th>Jarak</th>

</tr>

<?php

$no = 1;

foreach($tetangga as $t){

?>

<tr>

<td><?= $no++; ?></td>

<td><?= $t['nama']; ?></td>

<td><?= $t['label']; ?></td>

<td><?= round($t['jarak'],2); ?></td>

</tr>

<?php } ?>

</table>

<br>

<a href="input_data.php" class="btn">

Kembali Input

</a>

<a href="hasil_prediksi.php" class="btn">

Lihat Semua Hasil

</a>

</div>

</body>
</html>
