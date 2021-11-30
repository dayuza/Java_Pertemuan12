<?php

include "../config/koneksi.php";

$data = [];

$query = mysqli_query($conn, "SELECT * FROM `barang` ORDER BY id DESC");
if($query){
    $status = true;
    $pesan = "reaquest success";
    while($row = mysqli_fetch_assoc($query)){
        array_push($data, $row);
    }
}else{
    $status = false;
    $pesan = "reaquest failed";
}

$json = [
    "status" => $status,
    "pesan" => $pesan,
    "data" => $data
];

header("Content-Type: application/json");
echo json_encode($json);
?>