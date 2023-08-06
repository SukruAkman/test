<?php
//BAGLANTI
require_once ("../services/database.php");
//VERILER
 $name = @$_POST["name"];
 $surname = @$_POST["surname"];
 $age = @$_POST["age"];
 $job = @$_POST["job"];
 $gender = @$_POST["gender"];
 $email = @$_POST["email"];
 $city = @$_POST["city"];
 $state = @$_POST["state"];
 $fullAddress = @$_POST["fullAddress"];
//UPDATE
$gelenId = @$_GET["select"];
if(!empty($gelenId))
{
    try{
        if((!empty($name)) and (!empty($surname)) and (!empty($age))and (!empty($job))and (!empty($gender))and (!empty($email))and (!empty($city)) and (!empty($state)))
       { 
            if(is_numeric($age))
            {
                $sorgu = $veritabaniBaglantisi->query("UPDATE kisiler Set adi = '$name',soyadi = '$surname',yas='$age',cinsiyet='$gender',meslek_id='$job' WHERE id='$gelenId'");
                $sorgu2 = $veritabaniBaglantisi->query("UPDATE iletisim Set email='$email',ulke='$state',sehir='$city',tamAdres='$fullAddress' WHERE kisi_id='$gelenId'");
            }else{
                header("Location:main.php");
                exit();
            } 
        }
        else{
            header("Location:main.php");
            exit();
        } 
    }
    catch(PDOException $hata)
    {
        echo "HATA".$hata->getMessage();
        exit();
    }
    header("Location:main.php");
    exit();
}
   
//DELETE
$silId = @$_GET["del"];
if(!empty($silId))
{   try{
    
    $sorgu = $veritabaniBaglantisi->query("DELETE FROM kisiler WHERE id='$silId'");
    $sorgu2 = $veritabaniBaglantisi->query("DELETE FROM iletisim WHERE kisi_id='$silId'");
    }
    catch(PDOException $hata)
    {
        echo "HATA".$hata->getMessage();
        exit();
    }
    header("Location:main.php");
    exit();
}
//INSERT
try{
    //VERI KONTROL
        if((!empty($name)) and (!empty($surname)) and (!empty($age))and (!empty($job))and (!empty($gender))and (!empty($email))and (!empty($city)) and (!empty($state)))
       { 
            if(is_numeric($age))
            {
            $sorgu = $veritabaniBaglantisi->query("INSERT INTO kisiler (adi,soyadi,yas,cinsiyet,meslek_id) values ('$name','$surname','$age','$gender','$job')");
            $kisi_id = $veritabaniBaglantisi->lastInsertId();
            $sorgu2 = $veritabaniBaglantisi->query("INSERT INTO iletisim (kisi_id,email,ulke,sehir,tamAdres) values ('$kisi_id','$email','$state','$city','$fullAddress')");
            }
        }
        else{
            header("Location:add.php");
            exit();
        } 
}catch(PDOException $hata)
{   
    echo "HATA : ".$hata->getMessage();
    exit();
}
 header("Location:main.php");
 exit();

?>