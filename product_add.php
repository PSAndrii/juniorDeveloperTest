<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/myLibrary.js"></script>
    <link rel="stylesheet" href="styles/general_style.css">
    <link rel="stylesheet" href="styles/product_add_page.css">
    <title>Product add</title>
</head>
<body>
    <form method="post" action="<?php 'insertItemToDB.php' ?>">
        <div class="header">
            <span class="size_header_text">Product_Add</span>
            <button type="submit" class="btn btn_save_padding" value="Save">Save</button> 
            <?php
                require_once 'Classes/database/insertItemToDB.php';
                $insertItemToDB = new InsertItemToDB();
                // call function to validate input field and to create new items in database.
                $insertItemToDB->setToInsert();
            ?>
        </div>
        <hr>
        <p><span class="error"> * - required field</span></p> 
        <p><label>SKU:</label><input type="text" name="sku" required><span class="error"> *</span></p>
        <p><label>Name:</label><input type="text" name="name" required><span class="error"> *</span></p>
        <p><label>Price:</label><input type="text" name="price" pattern="[0-9\.]{0,}" required><span class="error"> *</span></p>
        <?php require_once 'Classes/swich/swichForAddTypesProduct.php'; // to connect the necessary switch
        //pass in arguments (1-id, 2-value which is displayed on the page)
            $swichForAddTypesProduct = new SwichForAddTypesProduct(array('non_swiched','switcher_size','switcher_hwl','switcher_weight'),array('Non swiched','Switcher size','Switcher hwl','Switcher weight'));
            // call function to create switch 
            echo $swichForAddTypesProduct->addSelect();
        ?>
        <?php 
        // switch for dynamically changing block wich prompts for entering different types of data 
        require_once 'Classes/swich/dynamicalCreationBlock.php';
        ?>
    </form>
</body>
</html>