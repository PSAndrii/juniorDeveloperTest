<?php require_once 'php/connect_db.php' /* connected to database*/?>
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
    <?php 
	if (isset($_POST['checkbox'])) {
		dell();
		unset($_POST['checkbox']); 
		};
		?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" >
    <div class="headerInForm">
        <span class="size_header_text">Product_list</span>
        <div>
            <select name="option" id="">
                    <option value="">Mass Delete Action</option>
                    <option value="">--</option>
                    <option value="">--</option>
            </select>
            <button id="apply" class="btn btn_apply_pdding"  type="submit">Apply</button>  
        </div>
    </div>
    <hr />
    <section>
<?php
    $res = mysqli_query($db, "SELECT name, id, SKU, price, size, HxWxL, weight FROM $MyTable");
    $data_product = mysqli_fetch_all($res, MYSQLI_ASSOC);
    //function output from database to page
    function view_product($data_product){
        foreach($data_product as $item){
            // check whether it is possible to display. let's say the value of 'show_prod' is responsible for this 
                echo "<a class='product-card'>";
                echo"<input class='checks' name='checkbox[]' id='".$item['id']."' value='".$item['id']."' type='checkbox'>";
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
        }
    } 
    // call the function output from database to page
    view_product($data_product);?>

    </section>
    </form>
    <footer>
        <span>&copyProduct_list</span>
    </footer>
</body>
</html>