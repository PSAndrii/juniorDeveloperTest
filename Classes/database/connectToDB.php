<?php
abstract class ConnectToDB
{
    protected $link;
	private $host = "localhost";
	private $user = "testBase";
	private $password = "AiYrbaUrdDme6V6l";
	protected $database = "mybd";
	protected $table = "product19";
		
	public function __construct()// Connects to the base
	{
		$this->link = new mysqli($this->host, $this->user, $this->password, $this->database) or die('Connection to DB failed');
	}
}