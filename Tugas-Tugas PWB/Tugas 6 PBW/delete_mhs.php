<?php
if (isset($_GET['npm'])) {
    include "koneksi.php";
    $npm = $_GET['npm'];
    $query = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE npm='$npm'");
    if ($query) {
        $message = "Data berhasil dihapus";
        $message = urlencode($message);
        header("Location:mahasiswa.php?message={$message}");
    } else {
        $message = "Data gagal dihapus";
        $message = urlencode($message);
        header("Location:mahasiswa.php?message={$message}");
    }
}
