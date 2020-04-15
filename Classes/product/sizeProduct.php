<?php
require_once 'product.php';

class SizeProduct extends Product
{
    // declares type variable 
    private $size;
    // extends construct on needed type
    public function __construct($db, $i)
    {
        parent::__construct($db, $i);
        $this->size=$db->get()[$i]['size'];
    }

    public function getProduct()
    {   
        //expands the basic logic and displays on the screen
        $result='';
        if($this->size){
            $result.= parent::openBlock(); // calls the parent method to open the block
            $result.= parent::getProduct(); // general products logic
            $result.= "<span>{$this->size}</span>"; // add own type
            $result.= parent::closeBlock(); // calls the parent method to close the block
        }
        return $result;
    }
}
    ?>