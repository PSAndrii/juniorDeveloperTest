<?php 
// switch for dynamically changing block with prompts for entering data of different types
class SwichToAddItemsHint

{
    private $swichNames=array('non swiched','Switcher size','Switcher hwl','Switcher weight');
    private $arrayNamesToFildTypes=array(array(), array('size'), array('height','width','lendth'), array('weight'));
    private $arrayHint=array(
        array(), 
        array('SIZE - Lorem ipsum dolor, sit amet consectetur adipisicing elit.'),
        array('', '', 'HxWxL - Lorem ipsum dolor, sit amet consectetur adipisicing elit.'),
        array('WEIGHT - Lorem ipsum dolor, sit amet consectetur adipisicing elit.'));
  
    function addBlockWhithHint($swich){
        $result='';
        for($i=0; $i<count($this->swichNames);$i++){
            //Checked selection. excluded option 'non_swiched'
            if($swich!=$this->swichNames[0]&&$this->swichNames[$i] == $swich){
                echo "<div class='swich_item'>";
                // to display corresponding to the selection
                    for($y=0;$y<count($this->arrayNamesToFildTypes[$i]);$y++){
                        echo "<label>".$this->arrayNamesToFildTypes[$i][$y].":</label><input type='text' name='".$this->arrayNamesToFildTypes[$i][$y]."' required>";
                        echo "<p>".$this->arrayHint[$i][$y]."</p>";
                    } 
                echo "</div>";  
            }
        }
    
    }
}
$swichToAddItemsHint = new SwichToAddItemsHint();
// check if there were selection event
$swich=isset($_GET['swich'])?$_GET['swich']:'';
echo $swichToAddItemsHint->addBlockWhithHint($swich);