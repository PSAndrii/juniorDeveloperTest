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
                <?php require_once 'php/Swich.php';
                    echo $swichToDell->addSelect();
                ?>
                <?php require_once 'php/deleteItemsDB.php';
                    $checkbox = !empty($_POST['checkbox'])?$_POST['checkbox']:''; 
                    $connectionToDelete->setToDelete($checkbox);
                ?>
                
                <button id="apply" class="btn btn_apply_pdding" type="submit">Apply</button>  
            </div>
        </div>
        <hr />
        <section>
        <?php 
        require_once 'php/getItemsDB.php';
        require_once 'php/ShowItems.php'; 
        
            
            echo $hwl->expandToSomeType($connectionToShow, $hwl, 'HxWxL');
            echo $size->expandToSomeType($connectionToShow, $size, 'size');
            echo $weight->expandToSomeType($connectionToShow, $weight, 'weight');

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
                        if(selected=='Mass_Delete_Action'){
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