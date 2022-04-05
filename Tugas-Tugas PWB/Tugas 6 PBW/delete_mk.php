<?php
if (isset($_GET['kodemk'])) {
    include "koneksi.php";
    $kodemk = $_GET['kodemk'];
    $query = mysqli_query($koneksi, "DELETE FROM matakuliah WHERE kodemk='$kodemk'");
    if ($query) {
        $message = "Data berhasil dihapus";
        $message = urlencode($message);
        header("Location:matakuliah.php?message={$message}");
    } else {
        $message = "Data gagal dihapus";
        $message = urlencode($message);
        header("Location:matakuliah.php?message={$message}");
    }
}
