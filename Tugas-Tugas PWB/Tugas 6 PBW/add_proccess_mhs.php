<?php
include 'koneksi.php';
if (isset($_POST['btnsubmit'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    $query = mysqli_query($koneksi, "INSERT INTO mahasiswa VALUES('$npm','$nama','$jurusan','$alamat')");
    if ($query) {
        $message = "Data berhasil ditambahkan";
        $message = urlencode($message);
        header("Location:mahasiswa.php?message={$message}");
    } else {
        $message = "Data gagal ditambahkan";
        $message = urlencode($message);
        header("Location:add_mhs.php?message={$message}");
    }
}
