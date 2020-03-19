<?php require 'connect_db.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    $("#allcheck").click(function(e) {
        var Q = $(".checks");
        var changeCheck = $("#allcheck");
            for(var i=0; i<Q.length; i++){
                Q[i].checked = changeCheck[0].checked;
            }
    });
    $("#apply").click(function(e) {
        var Q = $(".checks");
        var Qid ="";
        var update = "UPDATE `product` SET `show_prod`=0 WHERE ";
            for(var i=0; i<Q.length; i++){
                if(Q[i].checked){
                    Qid=("`product`.`id`="+Q[i].id+" OR ");
                    update += Qid;
                }
            }
            if(Qid != ""){
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
    function view_product($data_product){
        foreach($data_product as $item){
            if($item['show_prod']){
                echo "<a class='product-card'>";
                echo"<input class='checks' id='".$item['id']."' type='checkbox'>";
                    echo "<div class='scale'>";
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
    view_product($data_product);?>

    </section>
    <footer>
        <span>&copyProduct_list</span>
    </footer>
</body>
</html>