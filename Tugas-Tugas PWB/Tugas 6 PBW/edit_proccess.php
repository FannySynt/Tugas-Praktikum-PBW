<?php
include 'koneksi.php';
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nama = $_POST['namamk'];
    $query = mysqli_query($koneksi, "UPDATE krs SET mahasiswa_npm='$nama', matakuliah_kodemk='$nama' WHERE id='$id'");
    if ($query) {
        $message = "Data berhasil diubah";
        $message = urlencode($message);
        header("Location:index.php?message={$message}");
    } else {
        $message = "Data gagal diubah";
        $message = urlencode($message);
        header("Location:edit.php?message={$message}");
    }
}
