<?php
require_once 'connectToDB.php';

// ---------------------------------------------------------------
// delete items 

Class DeleteItemsFromDB extends ConnectToDB
{
    // Makes a delete request with the database
    public function setToDelete($checkbox)
	{
        $query = $this->setCreateToDelete($checkbox);  
		$result = $this->setMakeQueryToDelete($query);  
    }

    private function setMakeQueryToDelete($query)
	{
        if(!empty($query))$result = mysqli_query($this->link, $query);
    }
        
    //Creates query string to delete items from the database  
    private function setCreateToDelete($checkbox)
	{
		$table = $this->table;
		if(!empty($checkbox)){
			  	foreach($checkbox as $itemToDel) {
					$dell[] = ("`id`=". $itemToDel);
				}
			$delete = "DELETE FROM `".$table."` WHERE ";
			$str='';
			for($i=0;$i<count($dell);$i++){
	    		$str .= !empty($str)?'OR '.$dell[$i].' ':$dell[$i].' ';
			}
			$str = substr($str, 0, -1).";";
            $delete .= $str;
            //print_r($delete);
			return $delete;
		}
    }
}
$deleteItemsFromDB = new DeleteItemsFromDB;

?>