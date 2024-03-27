<?php 
/*
 fetch apps from database 
 */
class apps
{
	public $db = null;
	
	public function __construct(DBcon $db)
	{
		if (!isset($db->con)) return null;
		$this->db = $db;
	}

	//fetch apps data  using getdata method
	public function getData($table = 'musictable') {
		$result = $this->db->con->query("SELECT * FROM {$table} ");

		$resultArray = array();

		while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$resultArray[] = $item;
		}
		return $resultArray;
		print($resultArray)
	}
}
// order by RAND() 