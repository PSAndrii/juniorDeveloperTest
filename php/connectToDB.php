<?php
abstract class Connection
{
    public $link;
	private $host = "localhost";
	private $user = "testBase";
	private $password = "AiYrbaUrdDme6V6l";
	private $database = "mybd";
	public $table = "product19";
		
	public function __construct()//Подключается к базе (Connects to the base)
	{
		$this->link = mysqli_connect($this->host, $this->user, $this->password, $this->database) or die('Connection to DB failed');
	}
}