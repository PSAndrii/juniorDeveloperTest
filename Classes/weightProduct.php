<?php
require_once 'Classes/product.php';

class WeightProduct extends Product
{
    private $weight;

    public function __construct($db, $i){
        parent::__construct($db, $i);
        $this->weight=$db->get()[$i]['weight'];
    }

    public function getProduct()
    {   
        $result='';
        if($this->weight){
            $result.= parent::getProduct();
            $result.= "<span>{$this->weight}</span>";
            $result.= "</a>"; 
        }
        return $result;
    }
}

?>