<?php 

require_once("connectdb.php");

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND pass='$password'");
    $num = mysqli_num_rows($result);

    if($num == 1){

        $user = mysqli_fetch_array($result);
        session_start();
        $_SESSION["nama"] = $user;
        header("Location: dasbord.php");

    }
    else{
        echo "<script> 
        alert('Maaf Username atau Password yang Anda Masukkan Salah!'); window.location.href = 'login.php';</script>";
    }
    }
?>