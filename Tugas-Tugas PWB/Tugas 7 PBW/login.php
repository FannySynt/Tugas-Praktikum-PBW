<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img class="img img-responsive" src="img/gambar.jpg" />
        </div>
        <div class="col-md-6">
                <p>&larr; <a href="index.php">Home</a>
                <h4>Login</h4>
                <form action="do_login.php" method="POST">
                
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" placeholder="Masukkan Email" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Masukkan Password" />
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="login" value="Masuk" />
                    <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
                </form>
            
            </div>
        </div>
    </div>
    
</div>
</body>
</html>