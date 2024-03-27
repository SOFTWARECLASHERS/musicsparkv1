<?php
class DBcon
{
	// database connection properties
	protected $host = 'sql307.epizy.com';
	protected $user = 'epiz_28503743';
	protected $password = 'V8mQQAuC';
	protected $dbname = "epiz_28503743_musicshop";
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