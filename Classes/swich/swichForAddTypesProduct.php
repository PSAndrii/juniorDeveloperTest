<?php
require_once 'swich.php';


class SwichForAddTypesProduct extends BaseToSwich
{
    // inherits the parent method and extends it
    public function addSelect(){
        // AJAX ls function "onchange='AJAX_Swiched" for monitoring selection event and displaying corect dynamical form
        $result= "<p>Type Swicher: <select id='swich' onchange='AJAX_Swiched(".'"Swich_container"'.", this.value, true)'>";
        $result.= parent::addSelect(); 
        $result.= "</select><span class='error'> *</span></p>";
        $result.= "<div id='Swich_container'></div>"; 
        return $result;
    }
}

?>