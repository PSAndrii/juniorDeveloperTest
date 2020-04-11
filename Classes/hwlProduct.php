<?php
require_once 'Classes/product.php';

class HWLProduct extends Product
{
    private $hwl;

    public function __construct($db, $i){
        parent::__construct($db, $i);
        $this->hwl=$db->get()[$i]['HxWxL'];
    }

    public function getProduct()
    {   
        $result='';
        if($this->hwl){
            $result.= parent::getProduct();
            $result.= "<span>{$this->hwl}</span>";
            $result.= "</a>"; 
        }
        return $result;
    }
}

?>