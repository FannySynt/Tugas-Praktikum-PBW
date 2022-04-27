<?php
require_once ('connectdb.php');

if (empty($_GET)) {
    $query = mysqli_query($connection, 'SELECT * FROM buku');
    $result = array();

    while ($row = mysqli_fetch_array($query)) {
        array_push($result, array(
            'kode' => $row['kode'],
            'judul' => $row['judul'],
            'penulis' => $row['penulis'],
            'stok' => $row['stok']
        ));
    }

    echo json_encode(
        array(
    
            'message' => 'Get List Book.',
            'result' => $result
        )
    );
}
?>