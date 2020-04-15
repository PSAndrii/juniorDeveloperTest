<?php
require_once 'connectToDB.php';

// ---------------------------------------------------------------
// inserts products(items) 

Class InsertItemToDB extends ConnectToDB
{
    // sends a request to add products(items) to the database
    public function setToInsert()
	{
        $query = $this->setCreateToInsert();
        $result = $this->setMakeQueryToInsert($query); 
    }
    //Creates a request to add products(items) to the database
    private function setMakeQueryToInsert($query)
	{
        if(!empty($query))$result = mysqli_query($this->link, $query);
        if($result){ 
            header("location: product_add.php");
             die;
        }
    }
        
    // Creates a query string
    private function setCreateToInsert()
	{
        $table = $this->table;
        $sku=$name=$price=$addName=$addValue=''; //created variables to save the data
        // created pattern to validate input data
        $pattern_sku = '/^[a-zA-Zа-яА-ЯЁё0-9]{1,50}$/u';
        $pattern_other = '/^[a-zA-Zа-яА-ЯЁё0-9\s\.\-\+\_\!\@\#\$\%\^\&\*\(\)\`\~\"\'\?\/]{1,50}$/u';
        $pattern_price = '/^[0-9\.]{1,}$/u';
        //validates the data
        if (!empty($_POST['sku'])){
            if(preg_match($pattern_sku, $_POST['sku']))
                $sku = htmlspecialchars(strip_tags($_POST['sku']));
            }

        if (!empty($_POST['name'])){
            if(preg_match($pattern_other, $_POST['name']))
                $name = htmlspecialchars(strip_tags($_POST['name']));
            }

        if (!empty($_POST['price'])){
            if(preg_match($pattern_price, $_POST['price']))
                $price = htmlspecialchars(strip_tags($_POST['price']));
            }
        //selects switch type according to filled data for saving in the DB
          //$addName assigns the name of the cell in the database
            //$addValue assigns the value that we save in this cell
        if(!empty($_POST['size'])) {
            if(preg_match($pattern_other, $_POST['size'])){
                $addName='size'; 
                $addValue=htmlspecialchars(strip_tags($_POST['size']));
            }  
        }elseif(!empty($_POST['height'])&&!empty($_POST['width'])&&!empty($_POST['lendth'])) {
            if(preg_match($pattern_other, $_POST['height'])&&preg_match($pattern_other, $_POST['width'])&&preg_match($pattern_other, $_POST['lendth'])){
                $addName='HxWxL'; 
                $addValue=htmlspecialchars(strip_tags($_POST['height'].'x'.$_POST['width'].'x'.$_POST['lendth']));
            }
        }elseif(!empty($_POST['weight'])) {
            if(preg_match($pattern_other, $_POST['weight'])){
                $addName='weight'; 
                $addValue=htmlspecialchars(strip_tags($_POST['weight']));
            }
        }
		$insert = "INSERT INTO `".$table."`(SKU, name, price, $addName) 
            VALUES ('$sku', '$name', '$price', '$addValue')";
		return $insert;
		
    }
}

?>