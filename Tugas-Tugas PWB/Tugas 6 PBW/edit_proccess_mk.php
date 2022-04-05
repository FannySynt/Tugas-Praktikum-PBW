<?php
include 'koneksi.php';
if (isset($_POST['edit'])) {
    $kodemk = $_POST['kodemk'];
    $nama = $_POST['namamk'];
    $jumlah_sks = $_POST['jumlah_sks'];
    $query = mysqli_query($koneksi, "UPDATE matakuliah SET kodemk='$kodemk', namamk='$nama', jumlah_sks='$jumlah_sks' WHERE kodemk='$kodemk'");
    if ($query) {
        $message = "Data berhasil diubah";
        $message = urlencode($message);
        header("Location:matakuliah.php?message={$message}");
    } else {
        $message = "Data gagal diubah";
        $message = urlencode($message);
        header("Location:edit_mk.php?message={$message}");
    }
}
