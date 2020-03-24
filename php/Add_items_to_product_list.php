<?php
    $res = mysqli_query($db, "SELECT name, id, SKU, price, size, HxWxL, weight FROM $MyTable");
    $data_product = mysqli_fetch_all($res, MYSQLI_ASSOC);
    //function output from database to page
    function view_product($data_product){
        foreach($data_product as $item){
            $id[] = $item['id'];
            // check whether it is possible to display. let's say the value of 'show_prod' is responsible for this 
                echo "<a class='product-card'>";
                //echo"<input class='checks' name='checkbox[]' value='".$item['id']."' type='checkbox'>";    
                echo "<div class='scale'>";
                    // print all the fields we need
                        echo "<span>{$item['SKU']}</span>";
                        echo "<span>{$item['name']}</span>";
                        echo "<span>{$item['price']} $</span>";
                        echo "<span>";
                            if($item['size']) echo $item['size'];
                            elseif($item['HxWxL']) echo $item['HxWxL'];
                            elseif($item['weight']) echo $item['weight'];
                            else echo 'not found';
                        echo "</span>"; 
                    echo "</div>"; 
                echo "</a>";
        }
        //print_r($id);
    $sel="";
	$t= 0;
	for($i=0; $i<count($id); $i++){
        $subPagesru=$id[$i];
        $v="'$subPagesru'";
        $sel=$sel===""?$v:$sel.", $v";
		};
		echo "<script>
			var sel =[$sel];</script>";
    }
    ?>