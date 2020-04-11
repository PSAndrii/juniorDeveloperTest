<?php 

class SwichToAddItemsHint
{
    private $swichs=array('non swiched','Switcher size','Switcher hwl','Switcher weight');
    private $arrayName=array(array(), array('size'), array('height','width','lendth'), array('weight'));
    private $arrayHint=array(
        array(), 
        array('SIZE - Lorem ipsum dolor, sit amet consectetur adipisicing elit.'),
        array('', '', 'HxWxL - Lorem ipsum dolor, sit amet consectetur adipisicing elit.'),
        array('WEIGHT - Lorem ipsum dolor, sit amet consectetur adipisicing elit.'));
  
    function addBlockWhithHint($swich){
        $result='';
        for($i=0; $i<count($this->swichs);$i++){
            //Check what was selected. verification exclude option with 'non_swiched'
            if($swich!=$this->swichs[0]&&$this->swichs[$i] == $swich){
                echo "<div class='swich_item'>";
                // output setting according to selection
                    for($y=0;$y<count($this->arrayName[$i]);$y++){
                        echo "<label>".$this->arrayName[$i][$y].":</label><input type='text' name='".$this->arrayName[$i][$y]."'>";
                        echo "<p>".$this->arrayHint[$i][$y]."</p>";
                    } 
                echo "</div>";  
            }
        }
    
    }
}
$swichToAddItemsHint = new SwichToAddItemsHint();
$swich=isset($_GET['swich'])?$_GET['swich']:'';
echo $swichToAddItemsHint->addBlockWhithHint($swich);