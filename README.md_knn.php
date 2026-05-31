<?php

function konversiPekerjaan($value){

    switch($value){

        case "PNS":
            return 5;

        case "Wiraswasta":
            return 4;

        case "Petani":
            return 3;

        case "Buruh Harian":
            return 2;

        case "Pengangguran":
            return 1;
    }
}

function konversiRumah($value){

    switch($value){

        case "Permanen":
            return 3;

        case "Semi Permanen":
            return 2;

        case "Tidak Layak":
            return 1;
    }
}

function konversiKendaraan($value){

    switch($value){

        case "Mobil":
            return 3;

        case "Motor":
            return 2;

        case "Tidak Ada":
            return 1;
    }
}

function konversiBantuan($value){

    if($value == "Ya"){
        return 1;
    }

    return 0;
}

function euclideanDistance($d1, $d2){

    $sum = 0;

    for($i = 0; $i < count($d1); $i++){

        $sum += pow(($d1[$i] - $d2[$i]), 2);

    }

    return sqrt($sum);
}

?>
