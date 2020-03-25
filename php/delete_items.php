<?php require_once "db.php";
function dell(){
    global $db, $MyTable;
    $checkbox = $_POST['checkbox'];
    if(!empty($checkbox)){
//print_r($checkbox);
        foreach($checkbox as $itemToDel) {
            $dell[] = ("`id`=". $itemToDel);
        }
        for($i=0;$i<count($dell);$i++){
            echo $delete = "DELETE FROM `".$MyTable."` WHERE ".$dell[$i].";";
            $res_delete = mysqli_query($db, $delete) or die(mysqli_error($db));
        }
    }
    header("location: product_list_page.php");
    die;
}
?>