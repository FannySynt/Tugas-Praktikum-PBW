<?php
if (isset($_GET['id'])) {
    include "koneksi.php";
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM krs WHERE id='$id'");
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
                <a class="navbar-brand fw-bold" href="#">Form Data KRS</a>
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
            <div class="row">
                <div class="col-md-12">
                    <?php
                    if (isset($_GET['message'])) {
                        $message = $_GET['message'];
                    ?>
                        <div class="alert alert-danger my-5"><?= $message ?></div>
                    <?php
                    }
                    ?>
                    <div class="card border-0 my-5">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h2>Edit Data KRS</h2>
                                <a href="index.php" class="btn btn-primary">Data KRS</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="edit_proccess.php" method="post" enctype="multipart/form-data" class="row g-4">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <div>
                                    <label for="nama" class="form-label">Nama Mahasiswa</label>
                                    <select name="nama" id="nama" class="form-select">
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT npm, nama, mahasiswa_npm FROM mahasiswa, krs WHERE id='$id' GROUP BY nama");
                                        foreach ($query as $data) {
                                        ?>
                                            <option value="<?= $data['npm'] ?>" <?= $data['mahasiswa_npm'] == $data['npm'] ? "Selected" : "" ?>><?= $data['nama'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div>
                                    <label for="nama" class="form-label">Nama Mata Kuliah</label>
                                    <select name="nama" id="nama" class="form-select">
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT kodemk, nama, matakuliah_kodemk FROM matakuliah, krs WHERE id='$id' GROUP BY nama");
                                        foreach ($query as $data) {
                                        ?>
                                            <option value="<?= $data['kodemk'] ?>" <?= $data['matakuliah_kodemk'] == $data['kodemk'] ? "Selected" : "" ?>><?= $data['nama'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
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