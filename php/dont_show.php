<?php require_once "db.php";

function dont_get_from_db(){
    global $db, $MyTable;
    $checkbox = $_POST['checkbox'];
    if(!empty($checkbox)){
//print_r($checkbox);
        foreach($checkbox as $itemToUpd) {
            $upd[] = ("`id`=". $itemToUpd);
        }
        for($i=0;$i<count($upd);$i++){
            echo $update = "UPDATE `".$MyTable."` SET `status`='delete' WHERE ".$upd[$i].";";
            $res_update = mysqli_query($db, $update) or die(mysqli_error($db));
        }
    }
    header("location: product_list_page.php");
    die;
}
?>