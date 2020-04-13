<?php
require_once 'connectToDB.php';

//-------------------------------------------------------
// Show items on page 
class GetItemsFromDB extends ConnectToDB
{
    	
    //Makes a request to the database
	public function get()
	{
		$query = $this->getCreateSelect();
		$result = $this->getMakeQuery($query); 
		return $result;	
        
    }
    
		//Creates a query string
	private function getCreateSelect()
	{
		$table = $this->table;
		return "SELECT * FROM $table";
    }
        
		//Makes a request to the database
	private function getMakeQuery($query)
	{
		$result = mysqli_query($this->link, $query);
		if(!empty($result)){
			return mysqli_fetch_all($result, MYSQLI_ASSOC);	
		}die;
		
	}
}
$getItemsFromDB = new GetItemsFromDB();