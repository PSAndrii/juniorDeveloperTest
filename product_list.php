<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/general_style.css">
    <link rel="stylesheet" href="styles/product_list_page.css">
    <script src="js/jquery.js"></script>
    <title>Product list</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" >
        <div class="headerInForm">
            <span class="size_header_text">Product_list</span>
            <div class="headerInForm">
                <?php require_once 'Classes/swichForMassActions.php';
                    echo $swichForMassActions->addSelect();
                ?>
                <?php require_once 'Classes/deleteItemsFromDB.php';
                    $checkbox = !empty($_POST['checkbox'])?$_POST['checkbox']:''; 
                    $deleteItemsFromDB->setToDelete($checkbox);
                ?>
                <button id="apply" class="btn btn_apply_pdding" type="submit">Apply</button>  
            </div>
        </div>
        <hr />
        <?php //echo $base->addSelect(1); ?>
        <section>
        <?php 
        require_once 'Classes/connectToDB.php';
        require_once 'Classes/getItemsFromDB.php';
        require_once 'Classes/sizeProduct.php';
        require_once 'Classes/weightProduct.php'; 
        require_once 'Classes/hwlProduct.php'; 

        for($i=0; $i<count($getItemsFromDB->get());$i++){
            $sizeProduct = new SizeProduct($getItemsFromDB, $i);
                echo $sizeProduct->getProduct(); 
            $weightProduct = new WeightProduct($getItemsFromDB, $i);
                echo $weightProduct->getProduct(); 
            $hwlProduct = new HWLProduct($getItemsFromDB, $i);
                echo $hwlProduct->getProduct(); 
        }
        ?>
        </section>
    </form>
<script>
    function select_selected(){
                var selected = $('select[name="select"]').val();
                $.ajax({
                    type: "POST",
                    url: "",
                    data: {choosed: selected},
                    success: function(data){
                        if(selected=='Mass Delete Action'){
                            $('.checks').show();
                        }else {
                            $('.checks').hide();
                        }
                    }
                });
            };
</script>
</body>
</html>