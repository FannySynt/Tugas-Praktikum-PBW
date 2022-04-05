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
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" aria-current="page" href="mahasiswa.php">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="matakuliah.php">Mata Kuliah</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
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
                            <th>NPM</th>
                            <th>Nama Lengkap</th>
                            <th>Jurusan</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "koneksi.php";
                        $no = 1;
                        $query =
                            mysqli_query($koneksi, "SELECT * FROM mahasiswa");
                        foreach ($query as $data) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['npm'] ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['jurusan'] ?></td>
                                <td><?= $data['alamat'] ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="edit_mhs.php?npm=<?= $data['npm'] ?>" class="btn btn-warning rounded m-1">Edit</a>
                                        <a href="delete_mhs.php?npm=<?= $data['npm'] ?>" class="btn btn-danger rounded m-1">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a href="add_mhs.php" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>