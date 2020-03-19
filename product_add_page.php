<?php require 'connect_db.php' ?>
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
    $swichs=array('non_swiched','switcher_size','switcher_hwl','switcher_weight');
    $arrAdd =array(array(), array('Size'), array('HxWxL'), array('Weight'));
    echo "<p>Type Swicher: <select id='swich' onchange='AJAX_Swiched(".'"Swich_container"'.", this.value, true)'>";
        for($i=0;$i<count($swichs);$i++){
            echo "<option id='".$swichs[$i]."'>".$swichs[$i]."</option>";
        };
    echo "</select></p>";
    echo "<div id='Swich_container'></div>";
?>
    </form>
</body>
</html>
<?php
global $db;
Add_product($db);
function Add_product($e){
    $form_data_sku = isset($_POST['sku'])?$_POST['sku']:'';
    $form_data_name = isset($_POST['name'])?$_POST['name']:'';
    $form_data_price = isset($_POST['price'])?$_POST['price']:'';
    $addName=$addValue='';
    if(!empty($_POST['size'])) {
            $addName='size'; $addValue=$_POST['size'];
        }elseif(!empty($_POST['height'])&&!empty($_POST['width'])&&!empty($_POST['lendth'])) {
            $addName='HxWxL'; $addValue=$_POST['height'].'x'.$_POST['width'].'x'.$_POST['lendth'];
        }elseif(!empty($_POST['weight'])) {
            $addName='weight'; $addValue=$_POST['weight'];
        }
    $insert ="INSERT INTO `product`(SKU, name, price, $addName) 
        VALUES ('$form_data_sku', '$form_data_name', '$form_data_price', '$addValue')"; 
    $res_insert = mysqli_query($e, $insert);
    if($res_insert){
        header("location: admin_product_add.php");
        die;
    }   
};
?>