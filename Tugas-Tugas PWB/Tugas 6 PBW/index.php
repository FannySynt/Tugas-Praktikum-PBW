<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">Data Mahasiswa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mahasiswa.php">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="matakuliah.php">Mata Kuliah</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container my-5">
        <?php
        if (isset($_GET['message'])) {
            $message = $_GET['message'];
        ?>
            <div class="alert alert-success my-5"><?= $message ?></div>
        <?php
        }
        ?>
        <div class="card border-0 my-5">
            <div class="card-body">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Mata Kuliah</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "koneksi.php";
                        $no = 1;
                        $query = mysqli_query($koneksi, "SELECT krs.id, mahasiswa.nama, matakuliah.nama, matakuliah.jumlah_sks
                                                    FROM mahasiswa, matakuliah, krs
                                                    WHERE mahasiswa.npm = krs.mahasiswa_npm
                                                    AND matakuliah.kodemk = krs.matakuliah_kodemk
                                                    GROUP BY krs.id");
                        foreach ((array)$query as $data) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= isset($data['nama']) ?></td>
                                <td><?= isset($data['namamk']) ?></td>
                                <td>
                                    <span class="text-primary"><?= isset($data['nama']) ?></span> Mengambil Mata Kuliah <span class="text-primary"><?= isset($data['namamk']) ?></span> (<?= isset($data['jumlah_sks']) ?> SKS)
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="edit.php?id=<?= $data['id'] ?>" class="btn btn-warning rounded m-1">Edit</a>
                                        <a href="delete.php?id=<?= $data['id'] ?>" class="btn btn-danger rounded m-1">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a href="add.php" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>