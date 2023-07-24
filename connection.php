<?php
    $dataconnect = mysqli_connect("localhost","root","","bilgiler");
    mysqli_set_charset($dataconnect,"UTF8");
    if(mysqli_connect_errno())
    {
        echo "BAGLANTI HATASI";
    }
    

?>