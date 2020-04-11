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

$swichForMassActions = new SwichForMassActions(array('defoult','Mass_Delete_Action'), array('defoult','Mass Delete Action'));

?>