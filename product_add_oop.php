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
    <form method="post" action="">
        <div class="header">
            <span class="size_header_text">Product_Add</span>
            <button type="submit" class="btn btn_save_padding" value="Save">Save</button> 
        </div>
        <hr> 
        <p><label>SKU:</label><input type="text" name="sku"></p>
        <p><label>Name:</label><input type="text" name="name"></p>
        <p><label>Price:</label><input type="text" name="price"></p>
        <?php require_once 'php/Swich.php';
            echo $swichToAdd->addSelect();
        ?>
        <?php require_once 'php/swichToAddItems.php';
           
        ?>
    </form>
</body>
</html>