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
                        <a class="nav-link" href="mahasiswa.php">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" aria-current="page" href="matakuliah.php">Mata Kuliah</a>
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
                            <th>Kode Mata Kuliah</th>
                            <th>Nama Mata Kuliah</th>
                            <th>Jumlah SKS</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "koneksi.php";
                        $no = 1;
                        $query =
                            mysqli_query($koneksi, "SELECT * FROM matakuliah");
                        foreach ($query as $data) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['kodemk'] ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['jumlah_sks'] ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="edit_mk.php?kodemk=<?= $data['kodemk'] ?>" class="btn btn-warning m-1">Edit</a>
                                        <a href="delete_mk.php?kodemk=<?= $data['kodemk'] ?>" class="btn btn-danger m-1">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a href="add_mk.php" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>