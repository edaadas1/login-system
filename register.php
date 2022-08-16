<?php
    include("connection.php");

    // insert informations to database

    if(isset($_POST["isim"]) && isset($_POST["soyisim"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm_password"])){

        $isim = $_POST["isim"];
        $soyisim = $_POST["soyisim"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];

        if($password == $confirm_password){  // hiçbir değer boş değil ve parolalar aynıysa database e ekleme işlemi yapılsın
            $sql_command_insert = "INSERT INTO user (isim,soyisim,email,password) VALUES('$isim','$soyisim','$email','$password')";

            $eklendi = mysqli_query($baglan,$sql_command_insert);
    
            if($eklendi == 0 ){
                echo "eklenemedi";
            }
            else{
                Header("Location:index.php"); // başarılı bir şekilde register olduğumuzda bizi login sayfasına göndersin
            }
        }
        else{
            echo "Parolalar aynı değil. Lütfen kontrol ediniz ";
        }

    };


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"> <!-- bootstrap css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery-3.6.0.min.js"></script> <!-- jquery -->
    <script src="assets/js/bootstrap.min.js"></script> <!-- bootstrap javascript -->
    <style>
        .container .row .col-md-5{
            border:1px solid black;
        }
        .form-group{
            margin-bottom:10px;
        }

    </style>
</head>
<body>
    
    <div class="container mt-3">
        <h1 class="text-center">REGISTER</h1>
        <div class="row">
            <div class="col-md-5 mx-auto">
                <form action="register.php" method="post" style="padding:15px">
                    <div class="form-group">
                        <label for="">İsim:</label>
                        <input type="text" name="isim" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Soyisim:</label>
                        <input type="text" name="soyisim" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Password:</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password:</label>
                        <input type="password" name="confirm_password" class="form-control" required>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-success" type="submit" name="register">REGISTER</button>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-success" type="submit" name="login"><a href="index.php" style="text-decoration:none;color:white">LOGIN</a></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>