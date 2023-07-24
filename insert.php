<?php
//Baglantı
 require_once "connection.php";
 
 //Veriler
 $name=$_POST["name"];
 $surname=$_POST["surname"];
 $email=$_POST["email"];
 $age=$_POST["age"];
 $gender=$_POST["gender"];

 //Ekleme
 $sql = "INSERT INTO uyeler (name,surname,age,gender,email) Values ('$name','$surname','$age','$gender','$email')";
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