<?php require_once "connect_db.php";

$skus = array(array('QQ555WW','QQ556WW','QQ557WW','QQ559WW'), array('AA560SS','AA561SS','AA562SS','AA563SS'), array('ZZ564XX','ZZ565XX','ZZ566XX','ZZ567XX'));
$names = array(array('SD','SDr','DVD','DVD+'), array('Chair','Chair','Table','shelf'), array('War and Peace','treasure Island','Harry Potter','Red and Black'));
$price = array(array('15.00$','17.00$','20.00$','25.50$'), array('40.00$','45.00$','30.00$','15.00$'), array('20.00$','7.00$','15.00$','25.00$'));
$optionValue = array(array('700mb','700mb','4gb','8gb'), array('25x45x20','40x70x45','80x120x100','100x40x30'), array('2KG','1KG','3KG','2.5KG'));

$optionNames = array('size','HxWxL','weight');

function Add_Prods() {
global $MyTable, $skus, $names, $price, $optionValue, $optionNames; 
for($y=0;$y<3;$y++){
       for($i=0;$i<4;$i++){
           // add prod for test to database
    $QueryI= "INSERT INTO `".$MyTable."` (`SKU`, `name`, `price`, `".$optionNames[$y]."`)
    VALUES ('".$skus[$y][$i]."','".$names[$y][$i]."','".$price[$y][$i]."','".$optionValue[$y][$i]."')";
    if (!Our_Query($QueryI)) die('ERROR in prodss!');
    }
}
header("location: product_list_page.php");
        die;
}; 
?>