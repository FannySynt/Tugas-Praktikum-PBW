<?php
if (isset($_GET['npm'])) {
    include "koneksi.php";
    $npm = $_GET['npm'];
    $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE npm='$npm'");
    $data = mysqli_fetch_array($query);
?>
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
                <a class="navbar-brand fw-bold" href="#">Form Data Mahasiswa</a>
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
                                <h2>Edit Data Mahasiswa</h2>
                                <a href="mahasiswa.php" class="btn btn-primary">Data Mahasiswa</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="edit_proccess_mhs.php" method="post" enctype="multipart/form-data" class="row g-4">
                                <div>
                                    <label for="npm" class="form-label">NPM Mahasiswa</label>
                                    <input type="text" name="npm" id="npm" class="form-control" value="<?= $data['npm'] ?>" disabled>
                                </div>
                                <div>
                                    <label for="nama" class="form-label">Nama Mahasiswa</label>
                                    <input type="text" name="nama" id="nama" class="form-control" value="<?= $data['nama'] ?>">
                                </div>
                                <div>
                                    <label for="jurusan" class="form-label">Jurusan</label>
                                    <select name="jurusan" id="jurusan" class="form-select">
                                        <option value="Teknik Informatika" <?= $data['jurusan'] == "Teknik Informatika" ?
                                                                                "Selected" : "" ?>>Teknik Informatika</option>
                                        <option value="Sistem Informasi" <?= $data['jurusan'] == "Sistem Informasi" ?
                                                                                "Selected" : "" ?>>Sistem Informasi</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control"><?= $data['alamat'] ?></textarea>
                                </div>
                                <div>
                                    <button type="submit" name="edit" class="btn btn-primary">Edit Data</button>
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
<?php
}
?>