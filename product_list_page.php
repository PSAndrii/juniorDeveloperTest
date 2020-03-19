<?php require 'connect_db.php' /* connected to database*/?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/myLibrary.js"></script>
    <link rel="stylesheet" href="styles/general_style.css">
    <link rel="stylesheet" href="styles/product_list_page.css">
    <script src="js/jquery.js"></script>
    <title>Product_list</title>
</head>
<body>
    <header>
        <span class="size_header_text">Product_list</span>
        <form method="post" action="" >
            <label>Mass Delete Action<input id="allcheck" type="checkbox"></label>
            <button id="apply" class="btn btn_apply_pdding" type="submit">Apply</button>
<?php
    echo '<script>
// mark all check points
    $("#allcheck").click(function(e) {
        var check = $(".checks");
        var changeCheck = $("#allcheck");
            for(var i=0; i<check.length; i++){
//assign the property “checked”  to the check that we have for mass validation
                check[i].checked = changeCheck[0].checked;
            }
    });
// create a query to the database to hide / delete specific products
    $("#apply").click(function(e) {
        var check = $(".checks"); //an object containing all elements with a class .checks
        var stringRequest =""; // the line contains information about the marked check items (WHERE `product`.`id`=elementId;)
        var update = "UPDATE `product` SET `show_prod`=0 WHERE ";
            for(var i=0; i<check.length; i++){
                if(check[i].checked){
                    stringRequest=("`product`.`id`="+check[i].id+" OR ");
                    update += stringRequest;
                }
            }
            if(stringRequest != ""){
                // after a set of elements of the last row ";"
                update = update.substr(0, update.length - 4)+";";
                alert(update);
            }   
    });</script>';
?>
            <!--<input tupe='text' name='del' value=''>-->
        </form>
    </header>
    <hr />
    <section>
<?php
    global $db;
    $res = mysqli_query($db, "SELECT name, id, SKU, price, size, HxWxL, weight, show_prod FROM product");
    $data_product = mysqli_fetch_all($res, MYSQLI_ASSOC);
    //function output from database to page
    function view_product($data_product){
        foreach($data_product as $item){
            // check whether it is possible to display. let's say the value of 'show_prod' is responsible for this
            if($item['show_prod']){ 
                echo "<a class='product-card'>";
                echo"<input class='checks' id='".$item['id']."' type='checkbox'>";
                    echo "<div class='scale'>";
                    // print all the fields we need
                        echo "<span>{$item['SKU']}</span>";
                        echo "<span>{$item['name']}</span>";
                        echo "<span>{$item['price']} $</span>";
                        echo "<span>";
                            if($item['size']) echo $item['size'];
                            elseif($item['HxWxL']) echo $item['HxWxL'];
                            elseif($item['weight']) echo $item['weight'];
                            else echo 'not found';
                        echo "</span>"; 
                    echo "</div>"; 
                echo "</a>";
            }else{
                echo '';
            } 
        }
    } 
    // call the function output from database to page
    view_product($data_product);?>

    </section>
    <footer>
        <span>&copyProduct_list</span>
    </footer>
</body>
</html>