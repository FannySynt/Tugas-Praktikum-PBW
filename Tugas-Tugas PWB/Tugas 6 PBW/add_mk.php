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
            <a class="navbar-brand fw-bold" href="#">Form Data Mata Kuliah</a>
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
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($_GET['message'])) {
                    $message = $_GET['message'];
                ?>
                    <div class="alert alert-success my-5"><?= $message ?></div>
                <?php
                }
                ?>
                <div class="card border-0 my-5">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h2>Tambah Data Mata Kuliah</h2>
                            <a href="matakuliah.php" class="btn btn-primary">Data Mata Kuliah</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="add_proccess_mk.php" method="post" class="row g-4">
                            <div>
                                <label for="kodemk" class="form-label">Kode Mata Kuliah</label>
                                <input type="text" name="kodemk" id="kodemk" class="form-control">
                            </div>
                            <div>
                                <label for="nama" class="form-label">Nama Mata Kuliah</label>
                                <input type="text" name="nama" id="nama" class="form-control">
                            </div>
                            <div>
                                <label for="jumlah_sks" class="form-label">Jumlah SKS</label>
                                <input type="number" name="jumlah_sks" id="jumlah_sks" class="form-control">
                            </div>
                            <div>
                                <button type="submit" name="btnsubmit" class="btn btn-primary">Tambah Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>