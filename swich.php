<?php 
$swichs=array('non_swiched','switcher_size','switcher_hwl','switcher_weight');
$arrayName=array(array(), array('size'), array('height','width','lendth'), array('weight'));
$arrayHint=array(
    array(), 
    array('SIZE - Lorem ipsum dolor, sit amet consectetur adipisicing elit.'),
    array('', '', 'HxWxL - Lorem ipsum dolor, sit amet consectetur adipisicing elit.'),
    array('WEIGHT - Lorem ipsum dolor, sit amet consectetur adipisicing elit.'));

$o=$_GET['q'];
for($i=0; $i<count($swichs);$i++){
    if($o!=$swichs[0]&&$swichs[$i] == $o){
        echo "<div class='swich_item'>"; 
            for($y=0;$y<count($arrayName[$i]);$y++){
                echo "<label>".$arrayName[$i][$y].":</label><input type='text' name='".$arrayName[$i][$y]."'>";
                echo "<p>".$arrayHint[$i][$y]."</p>";
            } 
        echo "</div>";  
    }
}

?>