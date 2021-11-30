<?php 

include "../config/koneksi.php";
$nama_barang = @$_POST['nama_barang'];
$jumlah_barang = @$_POST['jumlah_barang'];

$data = [];

$query = mysqli_query($conn, "INSERT INTO `barang` (`nama_barang`,`jumlah_barang`) VALUES ('".$nama_barang."', '".$jumlah_barang."')" );

if($query){
    $status = true;
    $pesan = "request success";
    $data[] = $query;
} else {
    $status = false;
    $pesan = "request failed";
}

$json = [
    "status" => $status,
    "pesan" => $pesan,
    "data" => $data
];

header("Content-Type: application/json");
echo json_encode($json);

?>