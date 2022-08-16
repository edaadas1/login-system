<?php
    require_once("connection.php");

    if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["login"])){
        
        $email = $_POST["email"] ;
        $password = $_POST["password"] ;

        $sql_command = "SELECT * FROM user WHERE email = '$email'";  // database üzerinde tablo oluştururken email sütununu unique seç mutlaka !!!
        $sql_command_ekle = mysqli_query($baglan,$sql_command);
        $kayit_sayisi = mysqli_num_rows($sql_command_ekle); // elimize kaç veri geldiğini gösterir.(Bize 1 ya da 0 göstericek.Çünkü email unique seçili. Ya 1 tane vardır ya hiç yoktur.)

       
        if($kayit_sayisi>0){
            $ilgili_kayit = mysqli_fetch_array($sql_command_ekle); // bu email artık var ve biz artık bu kayıt üzerinden id sine,mail adresine ve şifresine ulaşabiliriz. Bu işlem bize mevcut elemanın tüm bağlı olduğu verilerini getiriyor.
            $parola = $ilgili_kayit["password"];
            if($parola == $password){
                session_start(); // oturumu açtık
                $_SESSION["isim"] = $ilgili_kayit["isim"];
                $_SESSION["email"] = $ilgili_kayit["email"];
                Header("Location:home_page.php");

            }
            else{
                echo "Parola Yanlış";
            }
        }
        else{
            echo "Email Yanlış";
        }
    
    }

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
    
    <div class="container mt-5">
        <h1 class="text-center">LOGIN SYSTEM</h1>
        <div class="row">
            <div class="col-md-5 mx-auto">
                <form action="index.php" method="post" style="padding:15px">
                    <div class="form-group">
                        <label for="">Email:</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password:</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-success" type="submit" name="login">LOGIN</button>
                    </div>
                    <div class="form-group text-center">
                        <p>Do you have no account?</p><a href="register.php" style="text-decoration:none">Register now</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>
</html>