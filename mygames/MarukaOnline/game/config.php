<?php
$dbname = "mysql:host=localhost;dbname=testdb;charset=utf8";
$username = "root";
$password = "";
try{
$db = new PDO ($dbname, $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOEXCEPTION $error)
{
    $error->getMessage();
}
?>