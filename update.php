<?php
//Baglantı
 require_once "connection.php";
 
 //Veriler
 $name=$_POST["name"];
 $surname=$_POST["surname"];
 $email=$_POST["email"];
 $age=$_POST["age"];
 $gender=$_POST["gender"];
 $userId=$_POST["user_id"];

 //Ekleme
 $sql="UPDATE uyeler SET name='$name',surname='$surname',email='$email',gender='$gender',age='$age' WHERE id='$userId'";
 $sorgu = mysqli_query($dataconnect,$sql);

 if($sorgu)
 {
    header("Location:http://localhost/homework/odev2/list.php");
    exit();
 }
 else
 {
    header("Location:http://localhost/homework/odev2/form.php");
    exit();
 }
?>