<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/general_style.css">
    <link rel="stylesheet" href="styles/product_list_page.css">
    <script src="js/jquery.js"></script>
    <script src="js/select.js"></script>
    <title>Product list</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" >
        <div class="headerInForm">
            <span class="size_header_text">Product_list</span>
            <div class="headerInForm">
                <?php require_once 'Classes/swich/swichForMassActions.php';  // to connect the necessary switch
                //pass in arguments (1-id, 2-value which is displayed on the page)
                    $swichForMassActions = new SwichForMassActions(array('defoult','Mass_Delete_Action'), array('defoult','Mass Delete Action'));
                // call function to create this switch 
                    echo $swichForMassActions->addSelect();
                ?>
                <?php require_once 'Classes/database/deleteItemsFromDB.php';
                //checks availability of selected items for deletion
                    $checkbox = !empty($_POST['checkbox'])?$_POST['checkbox']:''; 
                // call function to delete selected items
                    $deleteItemsFromDB->setToDelete($checkbox);
                ?>
                <button id="apply" class="btn btn_apply_padding" type="submit">Apply</button>  
            </div>
        </div>
        <hr />
        <section>
        <?php 
        //to connect the necessary extends
        require_once 'Classes/database/getItemsFromDB.php';
        require_once 'Classes/product/sizeProduct.php';
        require_once 'Classes/product/weightProduct.php'; 
        require_once 'Classes/product/hwlProduct.php'; 
        //to display the products with the necessary extends
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
</body>
</html>