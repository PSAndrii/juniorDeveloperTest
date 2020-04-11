<?php 

abstract class Product 
{
    protected $id;
    protected $sku;
    protected $name; 
    protected $price;

    public function __construct($db, $i)
    {     
        $this->id=$db->get()[$i]['id'];
        $this->sku=$db->get()[$i]['SKU'];
        $this->name=$db->get()[$i]['name'];
        $this->price=$db->get()[$i]['price'];
    }

    public function getProduct()
    {
        $result= "<a href='#' id='{$this->id}' class='product-card'>";
        $result.= "<input class='checks' name='checkbox[]' value='{$this->id}' type='checkbox'>";
        $result.= "<span>{$this->sku}</span>";
        $result.= "<span>{$this->name}</span>";
        $result.= "<span>{$this->price}</span>";
        return $result;
    }

}

?>