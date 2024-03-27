<?php
class DBcon
{
	// database connection properties
	protected $host = 'your databse host;
	protected $user = 'your databse username';
	protected $password = 'your database password';
	protected $dbname = "your database name"; 
    public $con = null;

	public function __construct()
	{
		$this->con = mysqli_connect($this->host,$this->user,$this->password,$this->dbname);
		if ($this->con->connect_error) {
			echo "FAIL TO CONNECT DB".$this->con->connect_error;
		}
	}
}

require 'oopdb.php';
//db object
$db = new  DBcon();
//apps object 
$music = new music($db);

$music->getData();
// print_r($music->getData());
