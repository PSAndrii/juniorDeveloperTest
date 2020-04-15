<?php 
require_once 'swich.php';

class SwichForMassActions extends BaseToSwich
{
    // inherits the parent method and extends it
    public function addSelect(){
        // js function "onchange='select_selected()" for monitoring selection event 
        $result= "<select name='select' onchange='select_selected()'>";
        $result.= parent::addSelect();       
        $result.= "</select>";
        return $result;
    }
}

?>