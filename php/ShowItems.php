<?php 

abstract class Base 
{
    private $id;
    private $sku;
    private $name; 
    private $price;

    // id
	public function getId()
	{
        return $this->id;
    }
    
	public function setId($id)
	{
        $this->id = $id;
    }

    // sku   
    public function getSku()   
    {
        return $this->sku;
	}

	public function setSku($sku)
	{
        $this->sku = $sku;
    }

    //name
    public function getName()
	{
        return $this->name;
	}

	public function setName($name)
	{
        $this->name = $name;
    }

    //price
    public function getPrice()
	{
        return $this->price;
	}

	public function setPrice($price)
	{
        $this->price = $price;
    }

    abstract function set($var);
    abstract function get();

    public function expandToSomeType($db, $var, $indexName){
        $result='';
        for($i=0;$i<count($db->get());$i++){
            if($db->get()[$i][$indexName]){
                // set
                $var->setId($db->get()[$i]['id']);
                $var->setSku($db->get()[$i]['SKU']);
                $var->setName($db->get()[$i]['name']);
                $var->setPrice($db->get()[$i]['price']);
                $var->set($db->get()[$i][$indexName]);
                // saved in variable for print on the page
                $result.= "<div class='product-card'>";
                $result.= "<input class='checks' name='checkbox[]' value='{$var->getId()}' type='checkbox'>";
                $result.= "<span>{$var->getSku()}</span>";
                $result.= "<span>{$var->getName()}</span>";
                $result.= "<span>{$var->getPrice()}</span>";
                $result.= "<span>{$var->get()}</span>";
                $result.= "</div>";
            }
        }
        return $result;
    }
}


class HxWxL extends Base
{
    private $hwl;

    public function get() {
        return $this->hwl;
    }

    public function set($hwl) {
        $this->hwl = $hwl;
    }
}


class Size extends Base
{
    private $size;

    public function get() {
        return $this->size;
    }

    public function set($size) {
        $this->size = $size;
    }

}

class Weight extends Base
{
    private $weight;

    public function get() {
        return $this->weight;
    }

    public function set($weight) {
        $this->weight = $weight;
    }

}


$hwl = new HxWxL();
$size = new Size();
$weight = new Weight();
?>