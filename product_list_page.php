<?php require_once 'php/db.php' /* connected to database*/?>
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
<?php require_once 'php/addProductForTest.php' /* connected to file add some items for test*/?> 
    <?php 
	if (isset($_POST['add_items'])) {
		Add_Items();
		unset($_POST['add_items']); 
		};
		?>
      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <label>for add some prods press =></label><button name="add_items">Add items</button>
        </form>
        <hr />
    <?php require_once 'php/delete_items.php' /* connected to file for delete items*/?>
    <?php require_once 'php/dont_show.php' /* connected to a file to change the status of items*/?>
    <?php 
        if(isset($_POST['checkbox'])) {
            dell(); // for delete
            //dont_get_from_db();  //change marker to delete. the file php/Add_items_to_product_list.php has a filter on this marker for introduction.
            unset($_POST['checkbox']); 
        };
    ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" >
            <div class="headerInForm">
                <span class="size_header_text">Product_list</span>
                <div class="headerInForm">
    <?php
// creates a drop down menu

    $options=array('defoult','Mass_Delete_Action'); // value for drop down items
    $optionsName=array('defoult','Mass Delete Action'); // an array of names for the drop down menu items
    echo "<select name='select' onchange='select_selected()'>";
        for($i=0;$i<count($options);$i++){ 
            echo "<option value='".$options[$i]."'>".$optionsName[$i]."</option>";
        };
    echo "</select>";
    ?>
        <button id="apply" class="btn btn_apply_pdding"  type="submit">Apply</button>  
        </div>
    </div>
    <hr />
    <section>
<?php require_once 'php/Add_items_to_product_list.php' ?>
<?php view_product($data_product);// call the function output from database to page  ?>

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
    </section>
    </form>
    <footer>
        <span>&copyProduct_list</span>
    </footer>
</body>
</html>