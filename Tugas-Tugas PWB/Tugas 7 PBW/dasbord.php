<?php require_once("auth.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dasboard </title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">

            <div class="card">
                <div class="card-body text-center">
                    <img class="img img-responsive rounded-circle mb-3" width="160" src="img/default.svg?php echo $_SESSION['user']['photo'] ?>" />
                    <h3>Nama  &nbsp;: <?php echo $_SESSION["nama"]["nama"] ?></h3>
                    <h3>Email &nbsp;&nbsp;&nbsp;: </span><?php echo $_SESSION["nama"]["email"] ?></h3>
                </div>
                <a href='logout.php'><input type="submit" name='login' value='Logout'></a>
            </div>
        </div>
    </div>
</div>

</body>
</html>