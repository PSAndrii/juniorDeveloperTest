<?php
abstract class ConnectToDB
{
	// creating and declaring variables for connecting to the database
    protected $link;
	private $host = "localhost";
	private $user = "testBase";
	private $password = "AiYrbaUrdDme6V6l";
	protected $database = "mybd";
	protected $table = "product19";
		
	public function __construct()// Connects to the database
	{
		$this->link = new mysqli($this->host, $this->user, $this->password, $this->database) or die('Connection to DB failed');
	}
}