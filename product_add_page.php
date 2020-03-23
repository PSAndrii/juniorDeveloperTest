<?php require 'php/connect_db.php' /* connected to database*/?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/myLibrary.js"></script>
    <link rel="stylesheet" href="styles/general_style.css">
    <link rel="stylesheet" href="styles/product_add_page.css">
    <title>Product_add</title>
</head>
<body>

    <form method="post" action="">
        <div class="header">
            <span class="size_header_text">Product Add</span>
            <button type="submit" class="btn btn_save_padding" value="Save">Save</button> 
        </div>
        <hr> 
        <p><label>SKU:</label><input type="text" name="sku"></p>
        <p><label>Name:</label><input type="text" name="name"></p>
        <p><label>Price:</label><input type="text" name="price"></p>
   
<?php
// creates a popup menu
// an array of names for the popup menu items
    $swichs=array('non_swiched','switcher_size','switcher_hwl','switcher_weight'); 
    // added event onchange with ajax to dynamically change content
    echo "<p>Type Swicher: <select id='swich' onchange='AJAX_Swiched(".'"Swich_container"'.", this.value, true)'>";
        for($i=0;$i<count($swichs);$i++){
            // each option element is given a name and the same id
            echo "<option id='".$swichs[$i]."'>".$swichs[$i]."</option>";
        };
    echo "</select></p>";
    // created container for dynamically changing content
    echo "<div id='Swich_container'></div>";
?>
    </form>
</body>
</html>
<?php 
Add_product($db, $MyTable);
// function for writing to the database of values ​​received from form
function Add_product($e, $MyTable){
    //write received data to variables
    $form_data_sku = isset($_POST['sku'])?$_POST['sku']:'';
    $form_data_name = isset($_POST['name'])?$_POST['name']:'';
    $form_data_price = isset($_POST['price'])?$_POST['price']:'';
    //create variables to save the data that is selected from the optional list
    $addName=$addValue='';
    //select which item was selected and filled for recording in DB
    if(!empty($_POST['size'])) {
        //$addName assign the name of the cell in the database table
        //$addValue assign the value that we save
            $addName='size'; $addValue=$_POST['size'];
        }elseif(!empty($_POST['height'])&&!empty($_POST['width'])&&!empty($_POST['lendth'])) {
            $addName='HxWxL'; $addValue=$_POST['height'].'x'.$_POST['width'].'x'.$_POST['lendth'];
        }elseif(!empty($_POST['weight'])) {
            $addName='weight'; $addValue=$_POST['weight'];
        }
    //create a query in the database using our variables as values
    $insert ="INSERT INTO $MyTable(SKU, name, price, $addName) 
        VALUES ('$form_data_sku', '$form_data_name', '$form_data_price', '$addValue')"; 
    //send request to database
    $res_insert = mysqli_query($e, $insert);
    if($res_insert){
        header("location: product_add_page.php");
        die;
    }   
};
?>