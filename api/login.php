<?php 

include "../config/koneksi.php";

$user = @$_POST['username'];
$pass = md5(@$_POST['password']);

$data = [];

$query = mysqli_query($conn, "SELECT * FROM `admin` WHERE 
`username` = '".$user."'
 && 
`password` = '".$pass."'");

if($query){
    $status = true;
    $pesan = "request success";
    $data[] = mysqli_fetch_assoc($query);
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