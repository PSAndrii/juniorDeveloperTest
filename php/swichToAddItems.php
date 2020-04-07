<?php 

class SwichToAddPage
{
    private $swichs=array('non_swiched','switcher_size','switcher_hwl','switcher_weight');
    private $arrayName=array(array(), array('size'), array('height','width','lendth'), array('weight'));
    private $arrayHint=array(
        array(), 
        array('SIZE - Lorem ipsum dolor, sit amet consectetur adipisicing elit.'),
        array('', '', 'HxWxL - Lorem ipsum dolor, sit amet consectetur adipisicing elit.'),
        array('WEIGHT - Lorem ipsum dolor, sit amet consectetur adipisicing elit.'));
  
    function addTypes($swich){
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
$swichToAddPage = new SwichToAddPage;
$swich=isset($_GET['swich'])?$_GET['swich']:'';
echo $swichToAddPage->addTypes($swich);