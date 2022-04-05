<?php
include 'koneksi.php';
if (isset($_POST['btnsubmit'])) {
    $nama = $_POST['nama'];
    $nama = $_POST['namamk'];
    $query = mysqli_query($koneksi, "INSERT INTO krs VALUES(NULL,'$nama','$nama')");
    if ($query) {
        $message = "Data berhasil ditambahkan";
        $message = urlencode($message);
        header("Location:index.php?message={$message}");
    } else {
        $message = "Data gagal ditambahkan";
        $message = urlencode($message);
        header("Location:add.php?message={$message}");
    }
}
