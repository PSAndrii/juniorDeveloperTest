<?php
abstract class BaseToSwich
{
    abstract function addSelect();
}

class SwichToDellete extends BaseToSwich
{
    private $nameOptions=array('defoult','Mass_Delete_Action'); // value for drop down items
    private $nameOptionsInnerHTML=array('defoult','Mass Delete Action'); // an array of names for the drop down menu items
 
    public function addSelect(){
        $result='';
        $result.= "<select name='select' onchange='select_selected()'>";
            for($i=0;$i<count($this->nameOptions);$i++){ 
                $result.= "<option value='{$this->nameOptions[$i]}'>{$this->nameOptionsInnerHTML[$i]}</option>";
            };
        $result.= "</select>";
        return $result;
    }
}
$swichToDell= new SwichToDellete;


class SwichToAdd extends BaseToSwich
{

    private $swichs=array('non_swiched','switcher_size','switcher_hwl','switcher_weight'); 
    
    public function addSelect(){
        $result='';
        $result.= "<p>Type Swicher: <select id='swich' onchange='AJAX_Swiched(".'"Swich_container"'.", this.value, true)'>";
            for($i=0;$i<count($this->swichs);$i++){ 
                $result.= "<option id='{$this->swichs[$i]}'>{$this->swichs[$i]}</option>";
            };
        $result.= "</select></p>";
        $result.= "<div id='Swich_container'></div>"; 
        return $result;
    }
}
$swichToAdd = new SwichToAdd;
?>