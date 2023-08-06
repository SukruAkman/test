<?php 
try{
    $veritabaniBaglantisi = new PDO("mysql:host=localhost;dbname=management;charset=UTF8","root","");
   
}catch(PDOException $hata)
{
    echo "Bağlantı Hatası";
    echo "Hata Açıklaması : " . $hata->getMessage();
    die();
}

?>
