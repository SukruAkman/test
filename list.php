<?php
if(isset($_POST['giris']))
{
    $email=$_POST["email"];
    $password=$_POST["password"];

    if(empty($email) || empty($password))
    {
        header("Location:http://localhost/homework/odev2/main.php?state=bos");
        exit();
    }

    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        header("Location:http://localhost/homework/odev2/main.php?state=false");
        exit();
    }

    require_once "connection.php";
    $sql = "SELECT email,password FROM yetkili";
    $sorgu = mysqli_query($dataconnect,$sql);

    while($allUsers = mysqli_fetch_array($sorgu, MYSQLI_ASSOC))
    {
        if(($allUsers["email"]==$email) and  ($allUsers["password"]==$password))
        {
            header("Location:http://localhost/homework/odev2/list.php");
            exit();
        }
    }
        header("Location:http://localhost/homework/odev2/main.php?state=yok");
        exit();
  
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>LIST PAGE</title>
</head>
<body>
    
<div class="container mt-4" >
    <div class="row">
        <div class="col-md-8">
            <h3>UYELER LIST</h3>
        </div>
        <div class="col-md-4 text-end">
            <a href="form.php" class="btn btn-success">+</a>
        </div>
    </div>
    <hr>
    <table class="table">
       
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">E-Mail</th>
                <th scope="col">Gender</th>
                <th scope="col">Age</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        require_once "connection.php";
        $sql = "SELECT * FROM uyeler";
        $sorgu = mysqli_query($dataconnect,$sql);
        while($user = mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ) {?>
            <tr>
                <td><?php echo $user["id"]; ?></td>
                <td><?php echo $user["name"]; ?></td>
                <td><?php echo $user["surname"]; ?></td>
                <td><?php echo $user["email"]; ?></td>
                <td><?php echo $user["gender"]; ?></td>
                <td><?php echo $user["age"]; ?></td>
                <td><a href="form.php?id=<?php echo $user['id'];?>" class="btn btn-primary btn-sm">Güncelle</a>
                    <a href="delete.php?id=<?php echo $user["id"];?>" class="btn btn-danger btn-sm">Sil</a></td>
            </tr>
        </tbody>
        <?php }?>
    </table>
</div>









<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>