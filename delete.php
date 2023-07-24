<?php 
//Baglantı
require_once "connection.php";

//Veri
$userId = $_GET["id"];

//Sorgu
$sql= "DELETE FROM uyeler WHERE id='$userId'";
$sorgu = mysqli_query($dataconnect,$sql);

if($sorgu)
{
    header("Location:http://localhost/homework/odev2/list.php");
    exit();
}
else
{ 
    ?>
    <div class="alert alert-danger text-danger text-center">
                    KAYIT SİLİNEMEDi
                </div> 
<?php 

}

?>