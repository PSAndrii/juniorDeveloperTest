<?php
require_once 'product.php';

class SizeProduct extends Product
{

    private $size;
    public function __construct($db, $i){
        
        parent::__construct($db, $i);
        $this->size=$db->get()[$i]['size'];
    }

    public function getProduct()
    {   
        $result='';
        if($this->size){
            $result.= parent::getProduct();
            $result.= "<span>{$this->size}</span>";
            $result.= "</div>"; 
        }
        return $result;
    }
}
    ?>