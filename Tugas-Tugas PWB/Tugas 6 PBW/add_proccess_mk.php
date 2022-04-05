<?php
include 'koneksi.php';
if (isset($_POST['btnsubmit'])) {
    $kodemk = $_POST['kodemk'];
    $nama = $_POST['namamk'];
    $jumlah_sks = $_POST['jumlah_sks'];
    $query = mysqli_query($koneksi, "INSERT INTO matakuliah VALUES('$kodemk','$nama','$jumlah_sks')");
    if ($query) {
        $message = "Data berhasil ditambahkan";
        $message = urlencode($message);
        header("Location:matakuliah.php?message={$message}");
    } else {
        $message = "Data gagal ditambahkan";
        $message = urlencode($message);
        header("Location:add_mk.php?message={$message}");
    }
}
