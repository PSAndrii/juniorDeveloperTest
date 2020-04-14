<?php
require_once 'product.php';

class HWLProduct extends Product
{
    //declares type variable 
    private $hwl;
    // extends construct on needed type
    public function __construct($db, $i){
        parent::__construct($db, $i);
        $this->hwl=$db->get()[$i]['HxWxL'];
    }

    public function getProduct()
    {   
        //expands the basic logic and displays on the screen
        $result='';
        if($this->hwl){
            $result= "<div id='{$this->id}' class='product-card'>"; // // create needed to this type product block 
            $result.= parent::getProduct(); // general products logic
            $result.= "<span>{$this->hwl}</span>"; // add own type
            $result.= "</div>";  // close block this
        }
        return $result;
    }
}

?>