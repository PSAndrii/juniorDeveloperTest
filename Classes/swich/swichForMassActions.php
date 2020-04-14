<?php 
require_once 'swich.php';

class SwichForMassActions extends BaseToSwich
{
    // inherits the parent method and extend it with
    public function addSelect(){
        $result= "<select name='select' onchange='select_selected()'>";
        $result .= parent::addSelect();       
        $result .= "</select>";
        return $result;
    }
}

?>