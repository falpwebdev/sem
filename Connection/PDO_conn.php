<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
   try{
    $conn = new PDO("mysql:host=$servername;dbname=sem_db",$username,$password);
   }catch(PDOException $e){
       echo 'NO CONNECTION'.$e->getMessage();
   }

?>