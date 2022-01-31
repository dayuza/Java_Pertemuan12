<?php 

include "../config/koneksi.php";
$nama_barang = @$_POST['nama_barang'];
$jumlah_barang = @$_POST['jumlah_barang'];
$kode_barang = @$_POST['kode_barang'];
$harga_barang = @$_POST['harga_barang'];

$data = [];

$query = mysqli_query($conn, "INSERT INTO `barang` (`nama_barang`,`jumlah_barang`,`kode_barang`,`harga_barang`) VALUES ('".$nama_barang."', '".$jumlah_barang."', '".$kode_barang."', '".$harga_barang."')" );

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