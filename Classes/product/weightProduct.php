<?php
require_once 'product.php';

class WeightProduct extends Product
{
    // declares type variable 
    private $weight;
    // extends construct on needed type
    public function __construct($db, $i){
        parent::__construct($db, $i);
        $this->weight=$db->get()[$i]['weight'];
    }

    public function getProduct()
    {   
        //expands the basic logic and displays on the screen
        $result='';
        if($this->weight){
            $result.= parent::openBlock(); // calls the parent method to open the block
            $result.= parent::getProduct(); // general products logic
            $result.= "<span>{$this->weight}</span>"; // add own type
            $result.= parent::closeBlock(); // calls the parent method to close the block
        }
        return $result;
    }
}

?>