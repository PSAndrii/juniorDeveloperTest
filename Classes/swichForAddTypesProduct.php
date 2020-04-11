<?php
require_once 'swich.php';


class SwichForAddTypesProduct extends BaseToSwich
{
    public function addSelect(){
        $result= "<p>Type Swicher: <select id='swich' onchange='AJAX_Swiched(".'"Swich_container"'.", this.value, true)'>";
        $result .= parent::addSelect();
        $result.= "</select></p>";
        $result.= "<div id='Swich_container'></div>"; 
        return $result;
    }
}
$swichForAddTypesProduct = new SwichForAddTypesProduct(array('non_swiched','switcher_size','switcher_hwl','switcher_weight'),array('Non swiched','Switcher size','Switcher hwl','Switcher weight'));

?>