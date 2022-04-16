<?php

require_once("connectdb.php");

if(isset($_POST['register'])){

    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    
    // enkripsi password
    $password = md5($_POST["password"]);
    $confirm_password = md5($_POST["confirm_password"]);

    // menyiapkan query
    $query = mysqli_query($koneksi, "INSERT INTO user (email, nama, pass) VALUES ('$email','$name','$password')");
    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email'");
    $num = mysqli_num_rows($result);
    if($password == $confirm_password){
        if($num>0){
        echo "<script> 
        alert('Registrasi Berhasil'); 
        window.location.href = 'login.php';
        </script>";
        }
    }else{
        echo "<script> alert('Password Salah'); 
        window.location.href = 'register.php';
        </script>";
    }
}

?>