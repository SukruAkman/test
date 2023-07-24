<?php
if(isset($_POST['Kayit']))
{   //Veriler
    $name=$_POST["name"];
    $surname=$_POST["surname"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    //Baglantı
    require_once "connection.php";
    //Kontrol ve ekleme
    try{
     $sql = "INSERT INTO yetkili (name,surname,email,password) VALUES ('$name','$surname','$email','$password')"; 
    $sorgu = mysqli_query($dataconnect,$sql);
    }catch(exception $e)
    {
        header("Location:http://localhost/homework/odev2/sign.php?state=wrong");
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>LOGIN PAGE</title>
</head>
<body>
<div class="flex d-flex " style="width:600px; margin:2rem auto;">
    <div class="col-6">
            <img src="https://img.freepik.com/free-vector/login-concept-illustration_114360-739.jpg?w=2000"  alt="Resim" class="img-fluid">
    </div>
    <div class="col-6">
        <div class="border mb-3">
            <form action="list.php" method="post">
                <div class="mb-3 mt-4 d-flex justify-content-center">
                    <h3><i>UYGULAMA</i></h3>
                </div>
                <?php  $durum=@$_GET["state"];
                if($durum=="bos")
                {
                    ?> <div class="alert alert-danger text-center">TÜM ALANLARI DOLDURUNUZ</div> <?php
                }
                if($durum=="yok")
                {
                    ?> <div class="alert alert-danger text-center">GECERSIZ YETKI</div> <?php
                }
                if($durum=='false')
                {
                    ?> <div class="alert alert-danger text-center">Geçerli E-mail Giriniz</div> <?php
                }
                ?>
                <div class="mb-3 d-flex justify-content-between mx-3">
                    <label for="email">E-Mail</label>
                    <input type="email" name="email" id="email" class="bg-light shadow-sm" required>
                </div>
                <div class="mb-3 d-flex justify-content-between mx-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="bg-light shadow-sm" required>
                </div>
                <div class="d-flex mb-3 mx-5 flex-column">
                    <button name="giris" type="submit" class="btn btn-outline-success">GIRIS</button>
                </div>
            </form>
        </div>
        <div class="border">
            <div class="p-2 text-center">
                Hesabın yok mu? <a href="sign.php">KAYDOL</a>
            </div>
        </div>
    </div>    
</div>




























<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>