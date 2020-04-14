<?php
require_once 'product.php';

class SizeProduct extends Product
{
    // declares type variable 
    private $size;
    // extends construct on needed type
    public function __construct($db, $i){
        parent::__construct($db, $i);
        $this->size=$db->get()[$i]['size'];
    }

    public function getProduct()
    {   
        //expands the basic logic and displays on the screen
        $result='';
        if($this->size){
            $result= "<div id='{$this->id}' class='product-card'>"; // create needed to this type product block 
            $result.= parent::getProduct(); // general products logic
            $result.= "<span>{$this->size}</span>"; // add own type
            $result.= "</div>"; // close this block 
        }
        return $result;
    }
}
    ?>