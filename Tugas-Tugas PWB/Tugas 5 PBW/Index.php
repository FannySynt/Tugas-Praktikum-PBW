<?php
//variabel bandara keberangkatan
$bandara_keberangkatan = array(
    // nama bandara asal => pajak
    "Soekarno-Hatta (CGK)" => 60000,
    // nama bandara asal => pajak
    "Juanda (SUB)" => 40000,
    // nama bandara asal => pajak
    "Bandara Internasional Minangkabau (BIM)" => 50000,
    // nama bandara asal => pajak
    "Ngurah Rai (DPS)" => 40000

);
// membuat array asosiatif bandara tujuan
$bandara_tujuan = array(
    // nama bandara tujuan => pajak
    "Bandara Internasional Minangkabau (BIM)" => 100000,
    // nama bandara tujuan => pajak
    "Soekarno-Hatta (CGK)" => 100000,
    // nama bandara tujuan => pajak
    "Halim Perdana Kusuma (HLP)" => 100000,
    // nama bandara tujuan => pajak
    "Juanda (SUB)" => 100000,
);

//fungsi untuk mengambil value dari key bandara
// atau mengambil pajak sesuai bandara
function getPajakAsal($bandara_asal, $tujuan)
{
    $pajak = $bandara_asal[$tujuan];
    return $pajak;
}
function getPajakTujuan($bandara_tujuan, $tujuan)
{
    $pajak = $bandara_tujuan[$tujuan];
    return $pajak;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Fanny</title>

    <!-- font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

</head>
<body>
    
<!-- header section starts  -->

<header class="header">
    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#jadwal">jadwal</a>
        <a href="#daftar">daftar</a>
    </nav>
</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3>BOOKING TIKET PESAWAT</h3>
        <p> Sekarang untuk booking tiket pesawat sudah tidak susah lagi loh!! 
            Silakan booking disini
        </p>
    </div>
</section>
<!-- home section ends -->

<!-- jadwal section starts  -->

<section class="jadwal" id="jadwal">
        <div class="container">
          <div class="col-md-12 text-center">
            <h1>JADWAL PENERBANGAN</h1>

        <?php
        $file = 'Data/Data.json';
        $data_maskapai = array();

        $file_json = file_get_contents($file);

        $data_maskapai = json_decode($file_json, true);

        if (isset($_POST['submit'])) {
            $pajak = getPajakAsal($bandara_asal, $_POST['asal']) + getPajakTujuan($bandara_tujuan, $_POST['tujuan']);
            $total = $pajak + $_POST['harga'];

            $inputUser = array(
                "Maskapai" => $_POST['maskapai'],
                "Asal_penerbangan" => $_POST['asal'],
                "tujuan_penerbangan" => $_POST['tujuan'],
                "Harga_tiket" => $_POST['harga'],
                "Pajak" => $pajak,
                "Total_harga" => $total
            );

            array_push($data_maskapai, $inputUser);

            $data_json = json_encode($data_maskapai, JSON_PRETTY_PRINT);
            file_put_contents($file, $data_json);
        }

        ?>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Maskapai</th>
                        <th scope="col">Bandara Keberangkatan</th>
                        <th scope="col">Bandara Tujuan</th>
                        <th scope="col">Harga Tiket</th>
                        <th scope="col">Pajak</th>
                        <th scope="col">Total Harga Tiket</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_maskapai as $data => $value) : ?>
                        <tr>
                            <td><?= $data_maskapai[$data]['Maskapai']; ?></td>
                            <td><?= $data_maskapai[$data]['bandara_keberangkatan']; ?></td>
                            <td><?= $data_maskapai[$data]['bandara_tujuan']; ?></td>
                            <td><?= $data_maskapai[$data]['Harga_tiket']; ?></td>
                            <td><?= $data_maskapai[$data]['Pajak']; ?></td>
                            <td><?= $data_maskapai[$data]['Total_harga']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
          </div>
          </div>  
        </div>         
      </section>


<!-- jadwal section ends -->
    
<!-- daftar -->
<section class="daftar" id="daftar">
        <div class="container">
          <div class="col-md-12 text-center">
              <h1>PENDAFTARAN</h1>

                <form action="" method="POST">
                    <div class="mb-3">
                      <label for="maskapai" class="form-label">Maskapai</label>
                      <input type="text" class="form-control" id="maskapai" name="maskapai">
                    </div>

                    <label for="asal" class="form-label">Asal Keberangkatan</label>
                    <select class="form-select mb-3" name="asal" id="asal">
                      <option selected>Pilih Bandara</option>
                      <?php foreach ($bandara_keberangkatan as $bandara => $pajak) : ?>
                      <option value="<?= $bandara ?>"><?= $bandara; ?></option>
                      <?php endforeach; ?>
                    </select>

                    <label for="tujuan" class="form-label">Tujuan Bandara</label>
                    <select class="form-select mb-3" name="tujuan" id="tujuan">
                      <option selected>Pilih Bandara</option>
                      <?php foreach ($bandara_tujuan as $bandara => $pajak) : ?>
                      <option value="<?= $bandara ?>"><?= $bandara; ?></option>
                      <?php endforeach; ?>
                    </select>

                    <div class="mb-3">
                    <label for="harga" class="form-label">Harga Tiket</label>
                    <input type="text" class="form-control" name="harga" id="harga">
                    </div>

                    <button class="btn btn-success" name="submit">Simpan</button>
                </form>
              </div>
            </div>
          </div>
      </section>
<!-- Akhir daftar -->
<!-- footer section starts  -->
<section class="footer">

<div class="share">
    <a href="https://www.instagram.com/fanny.synt/" class="fab fa-instagram"></a>
</div>

<div class="links">
    <a href="http://localhost/Tugas-Tugas%20PWB/Tugas%205%20PBW/Index.php#home">home</a>
    <a href="http://localhost/Tugas-Tugas%20PWB/Tugas%205%20PBW/Index.php#jadwal">jadwal</a>
    <a href="http://localhost/Tugas-Tugas%20PWB/Tugas%205%20PBW/Index.php#daftar">daftar</a>
</div>

<div class="credit">created by <span>Fanny</div>

</section>

<!-- footer section ends -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>