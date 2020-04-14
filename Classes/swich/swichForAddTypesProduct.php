<?php
require_once 'swich.php';


class SwichForAddTypesProduct extends BaseToSwich
{
    // inherits the parent method and extend it with
    public function addSelect(){
        $result= "<p>Type Swicher: <select id='swich' onchange='AJAX_Swiched(".'"Swich_container"'.", this.value, true)'>";
        $result.= parent::addSelect(); 
        $result.= "</select><span class='error'> *</span></p>";
        $result.= "<div id='Swich_container'></div>"; 
        return $result;
    }
}

?>