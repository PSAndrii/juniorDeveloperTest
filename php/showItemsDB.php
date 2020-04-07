<?php
require_once 'connectToDB.php';

//-------------------------------------------------------
// Show items on page 
class ConnectionToShow extends Connection
{
    	
    //Делает запрос к базе (Makes a request to the database)
	public function get()
	{
		$query = $this->getCreateSelect();
        $result = $this->getMakeQuery($query); 
		return $result;
    }
    
		//Создает строку с запросом (Creates a query string)
	private function getCreateSelect()
	{
		$table = $this->table;
		return "SELECT * FROM $table";
    }
        
		//Совершает запрос к базе (Makes a request to the database)
	private function getMakeQuery($query)
	{
		$result = mysqli_query($this->link, $query);
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
	}
}
$connectionToShow = new ConnectionToShow;