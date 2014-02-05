<?php
class sksql
{
	private $table;
	private $sql_param;
	private $result;
	private $row;
	private $query;
	private $whereadd;
    public $id;
	private $temp_array = array();
	private $orderby;
	private $select_sql;
	private $fullquery;
	
	/*
	public function __construct($table,$sql_param)
	{
		$this->table = $table;
		$this->sql_param = $sql_param;
		$this->whereadd = $sql_param;

		include 'conf.php';
		
		if($sql_param<>"")
			$this->sql_param = "where $this->sql_param";
		
		$this->query = "SELECT * FROM $this->table $this->sql_param";
		echo $this->query;
		$this->result  = mysql_query($this->query) or die(mysql_error());
	}
	 */
	 
	public function __construct($table)
	{
		$this->table = $table;
		$this->select_sql = "SELECT * FROM $this->table";
		include 'conf.php';
	}	 
	
	public function fullquery($sql_param)
	{
		$this->fullquery = $sql_param;//$this->aa.= "$sql_param";
		//echo $this->aa;echo implode("&", $this->temp_array);
		
	}
	
	public function whereadd($sql_param)
	{
		$this->whereadd_array[] = $sql_param;//$this->aa.= "$sql_param";
		//echo $this->aa;echo implode("&", $this->temp_array);
		
	}
	
	public function orderby($sql_param)
	{
		$this->orderby= "order by $sql_param";
		//$this->query = "SELECT * FROM $this->table $this->sql_param order by $orderby";
		//$this->result  = mysql_query($this->query) or die(mysql_error());
	}
	
	public function getlink($coltarget,$join_table,$join_col)//getLink('status_id', 'hd_status', 'id');	
	{
		$join_query = "SELECT * FROM $this->table,$join_table WHERE $this->table.$coltarget = $join_table.id AND $this->table.$join_col=$this->id";
		//echo $join_query ." ~ ";
		$join_result  = mysql_query($join_query) or die(mysql_error());
		
		$row = mysql_fetch_object($join_result);
        {
            //return $row['resultname'];
			//unset($row['resultname']);
			return $row;
        }
	}
	
	public function find()
	{
		for ($i=0; $i < count($this->whereadd_array); $i++) 
		{
			$content = $this->whereadd_array[$i];
			if($i==0)
				$where_add_sql = "where $content";
			else
				$where_add_sql .= " and $content";
		}
		$this->query = "$this->select_sql $where_add_sql $this->orderby"; //echo $this->query ."<br>";
		
		if(strlen($this->fullquery)>0)
			$this->query = $this->fullquery;
			
		$this->result  = mysql_query($this->query) or die(mysql_error());
	}
	
	public function fetch()
	{		
		return (mysql_fetch_object($this->result));
	}
}
?>