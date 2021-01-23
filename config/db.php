
<?php


$servername = "localhost";
 $username = "root";
$password = "";
$databasename="xblog";

try {
   $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
   // set the PDO error mode to exception
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo 'bağlantı kuruldu';
   
   }
catch(PDOException $e)
   {
   echo "Connection failed: " . $e->getMessage();
   }

   #tarih fonksiyonu
function formatDate($date){
return date('g:i a',strtotime($date));
}

#kutucuk temizle 
function clean($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}



?>
