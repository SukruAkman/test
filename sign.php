<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>SIGN UP PAGE</title>
</head>
<body>
<div class="flex d-flex justify-content-center " style="width:600px; margin:2rem auto;">
    
    
        <div class="border mb-3">
            <form action="main.php" method="post">
                <div class="mb-3 mt-4 d-flex justify-content-center">
                    <h3><i>UYGULAMA</i></h3>
                </div>
                <?php
               
                $durum=@$_GET["state"];
                if($durum=='wrong')
                {
                    ?> <div class="alert alert-danger text-center">Kayıtlı Kullanıcı</div> <?php
                }
                ?>
                <div class="mb-3 d-flex justify-content-between mx-3">
                    <label for="name" class="form-control">Name</label>
                    <input type="text" name="name" id="name" class="bg-light">
                </div>
                <div class="mb-3 d-flex justify-content-between mx-3">
                    <label for="surname" class="form-control">Surname</label>
                    <input type="text" name="surname" id="surname" class="bg-light">
                </div>
                <div class="mb-3 d-flex justify-content-between mx-3">
                    <label for="email" class="form-control">E-Mail</label>
                    <input type="email" name="email" id="email" class="bg-light">
                </div>
                <div class="mb-3 d-flex justify-content-between mx-3">
                    <label for="password" class="form-control">Password</label>
                    <input type="password" name="password" id="password" class="bg-light">
                </div>
                <div class="d-flex mb-3 mx-5 flex-column">
                    <input  name="Kayit" class="bg-success-subtle" type="submit" value="KAYDOL">
                </div>
            </form>
        </div>

</div>




























<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>