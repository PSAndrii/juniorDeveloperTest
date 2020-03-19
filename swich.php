<?php 
// names array for options
$swichs=array('non_swiched','switcher_size','switcher_hwl','switcher_weight');
// names array for input names
$arrayName=array(array(), array('size'), array('height','width','lendth'), array('weight'));
// hints array for input field
$arrayHint=array(
    array(), 
    array('SIZE - Lorem ipsum dolor, sit amet consectetur adipisicing elit.'),
    array('', '', 'HxWxL - Lorem ipsum dolor, sit amet consectetur adipisicing elit.'),
    array('WEIGHT - Lorem ipsum dolor, sit amet consectetur adipisicing elit.'));

$o=$_GET['q'];
for($i=0; $i<count($swichs);$i++){
    //Check what was selected. verification exclude option with 'non_swiched'
    if($o!=$swichs[0]&&$swichs[$i] == $o){
        echo "<div class='swich_item'>";
        // output setting according to selection
            for($y=0;$y<count($arrayName[$i]);$y++){
                echo "<label>".$arrayName[$i][$y].":</label><input type='text' name='".$arrayName[$i][$y]."'>";
                echo "<p>".$arrayHint[$i][$y]."</p>";
            } 
        echo "</div>";  
    }
}

?>