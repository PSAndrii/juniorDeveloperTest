<?php 
require_once 'swich.php';

class SwichForMassActions extends BaseToSwich
{
    public function addSelect(){
        $result= "<select name='select' onchange='select_selected()'>";
        $result .= parent::addSelect();       
        $result .= "</select>";
        return $result;
    }
}

?>