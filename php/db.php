<?php
// need to register or add existing data
$Domain = "localhost";
$User = "testBase";
$Password = "AiYrbaUrdDme6V6l";
$MyDataBase = "mybd";
$MyTable = "product18";// table name
// connected to database
$db = mysqli_connect($Domain, $User, $Password, $MyDataBase) or die('Connection to DB failed');
if(!$db) die(mysqli_connect_error());
mysqli_set_charset($db, "utf8");
// example of our table
$QueryC = "CREATE TABLE `".$MyTable."` (`id` INT AUTO_INCREMENT,`SKU` TEXT, `name` VARCHAR(20) NOT NULL, `price` TEXT, `size` TEXT, `HxWxL` TEXT, `weight` TEXT, `status` TEXT, PRIMARY KEY (id));";
// create the table
if (!Our_Check($MyTable)) Our_Query($QueryC);
//if the table is already showing

function Our_Check($Table) { 
    $var=mysqli_fetch_all(Our_Query("SHOW TABLES LIKE '".$Table."'"));
    return $var;
}
//if no table is created
function Our_Query($Query) {
global $Domain,$User,$Password,$MyDataBase;
$result = "";
// connect to the database
	$mysqli = new mysqli($Domain, $User, $Password, $MyDataBase);
	if ($mysqli->connect_error) 
        die("Connection to DB failed: ".$mysqli->connect_error);
    $result = $mysqli->query($Query); // create the table in connected database
    $mysqli->close();
unset($Domain,$User,$Password,$MyDataBase);
return $result;
}

?>
