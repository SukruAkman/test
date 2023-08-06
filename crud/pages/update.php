<?php    require_once('../services/database.php') ;
    
    $gelenID=$_GET["select"];
    
    $sql="SELECT * FROM `kisiler` INNER JOIN meslek ON meslek_id=meslek.meslekID INNER JOIN iletisim ON id=iletisim.kisi_id WHERE id=$gelenID";
    $sorgu = $veritabaniBaglantisi->query($sql,PDO::FETCH_ASSOC); 
    ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> UPDATE PAGE </title>
    <?php require_once('../services/ui/links.php');   ?>
  </head>
  <body>
    <div class="container">
        <div class="col-md-6 ms-auto me-auto mt-5">
        <h3 class="text-center">Personel Management</h3>
            <form action="edit.php?select=<?php echo $gelenID;?>" method="post" class="row g-3 needs-validation" novalidate>
            <?php foreach($sorgu as $kayit){?> 
            <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Name</label>
                    <input name="name" type="text" class="form-control" id="validationCustom01" value="<?php echo $kayit["adi"];?>" required>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom02" class="form-label">Surname</label>
                    <input name="surname" type="text" class="form-control" id="validationCustom02" value="<?php echo $kayit["soyadi"];?>" required>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom02" class="form-label">Age</label>
                    <input name="age" type="text" class="form-control" id="validationCustom02" value="<?php echo $kayit["yas"];?>" required>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom02" class="form-label">Job</label>
                    <select name="job" class="form-select" id="validationCustom04" required>
                    <option selected  value="<?php echo $kayit["meslekID"];?>"><?php echo $kayit["meslekAdi"];?></option>
                    <?php $sorgu2 = $veritabaniBaglantisi->query("SELECT * FROM meslek", PDO::FETCH_ASSOC);
                    foreach($sorgu2 as $item)
                    { ?>
                        <option value="<?php echo $item["meslekID"];?>"><?php echo $item["meslekAdi"];?></option>
                  <?php  } ?>
                   
                    </select>
                </div>
                <div class="col-md-6 m-auto text-center border border-bottom-0 border-top-0 mb-2">
                <label for="validationCustom02" class="form-label px-2 mx-3">Gender : </label>
                <?php if($kayit["cinsiyet"]=='ERKEK'){?>
                            <div class="form-check form-check-inline px-2">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="ERKEK" checked>
                            <label class="form-check-label" for="inlineRadio1">Erkek</label>
                         </div>
                         <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="KADIN">
                            <label class="form-check-label" for="inlineRadio2">Kadın</label>
                        </div>
                        <?php } else {?>
                            <div class="form-check form-check-inline px-2">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="ERKEK" >
                            <label class="form-check-label" for="inlineRadio1">Erkek</label>
                         </div>
                         <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="KADIN" checked>
                            <label class="form-check-label" for="inlineRadio2">Kadın</label>
                        </div>
                        <?php } ?>
                </div>
            
                <div class="col-md-6 mt-5">
                    <label for="validationCustomUsername" class="form-label">Email</label>
                    <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input name="email" type="email" class="form-control" value="<?php echo $kayit["email"];?>" required>
                    </div>
                </div>
                <div class="col-md-3 mt-5">
                    <label for="validationCustom03" class="form-label">City</label>
                    <input name="city"type="text" class="form-control" id="validationCustom03" value="<?php echo $kayit["sehir"];?>"required>
                </div>
                <div class="col-md-3 mt-5">
                    <label for="validationCustom04" class="form-label">State</label>
                    <input name="state" type="text" class="form-control" id="validationCustom04" value="<?php echo $kayit["ulke"];?>"required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Full Address</label>
                    <textarea name="fullAddress" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $kayit["tamAdres"];?></textarea>
                    </div>
              <?php }?>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">UPDATE</button>
                    <a href="main.php" type="button" class="btn btn-secondary">LIST</a>
                </div>
            </form>
        </div>
    </div>
 <?php require_once('../services/ui/scripts.php') ?>
</body>
</html>