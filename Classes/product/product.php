<?php 

// base class
abstract class Product 
{
    // fields that has each products
    protected $id;
    protected $sku;
    protected $name; 
    protected $price;

    public function __construct($db, $i)
    {     
    // assigns the value of variables
        $this->id=$db->get()[$i]['id'];
        $this->sku=$db->get()[$i]['SKU'];
        $this->name=$db->get()[$i]['name'];
        $this->price=$db->get()[$i]['price'].'$';
    }

    
    public function getProduct()
    {
    // general products logic to display 
        $result= "<input class='checks' name='checkbox[]' value='{$this->id}' type='checkbox'>";
        $result.= "<span>{$this->sku}</span>";
        $result.= "<span>{$this->name}</span>";
        $result.= "<span>{$this->price}</span>";
        return $result;
    }

}

?>