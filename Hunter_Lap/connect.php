<?php
define("db_host","localhost");
define("db_user","root");
define("db_password","");
define("db_name","hunterlap_db");
try {
    function connect(): PDO {
        $dns='mysql:dbname=hunterlap_db;host=localhost;port=3306;';
        $con =new PDO($dns,db_user,db_password);
        return $con;
    }
   // echo 'true';
}catch (Exception $e){
   //echo 'false';
    header("location:404.php");
}