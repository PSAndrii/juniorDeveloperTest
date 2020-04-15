<?php
require_once 'product.php';

class HWLProduct extends Product
{
    //declares type variable 
    private $hwl;
    // extends construct of needed type
    public function __construct($db, $i)
    {
        parent::__construct($db, $i);
        $this->hwl=$db->get()[$i]['HxWxL'];
    }

    public function getProduct()
    {   
        //expands the basic logic and displays on the screen
        $result='';
        if($this->hwl){
            $result.= parent::openBlock();  // calls the parent method to open the block
            $result.= parent::getProduct(); // general product's logic
            $result.= "<span>{$this->hwl}</span>"; // adds own type
            $result.= parent::closeBlock(); // calls the parent method to close the block
        }
        return $result;
    }
}

?>