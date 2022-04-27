<?php

include("connectdb.php");

$kode = isset( $_POST["kode"]) ? $_POST["kode"] : "";
$judul = isset( $_POST["judul"])  ? $_POST["judul"] : "";
$penulis = isset( $_POST["penulis"])  ? $_POST["penulis"] : "";
$stok = isset($_POST["stok"]) ? $_POST["stok"] : "";

$sql = "INSERT INTO buku (kode,judul,penulis,stok) VALUES ('".$kode."','".$judul."','".$penulis."','".$stok."');";

$query = mysqli_query($connection,$sql);

if($query){
    $msg = "Tambah Buku Berhasil";
}else{
    $msg = "Tambah Buku gagal";
}

$respone = array(
    'status' => "OK",
    'msg' => $msg
);

echo json_encode($respone,JSON_PRETTY_PRINT);
?>