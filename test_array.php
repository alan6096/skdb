<html>
	

<?php
include 'skdb.php';

$table = $_POST['table'];
$table_col = $_POST['table_col'];
$table_header = $_POST['table_header'];
$getlink = $_POST['getlink'];
$condition = $_POST['condition'];



echo implode("<br>", $getlink);

//function display()
{
	$display = new sksql($table);
	$display->find();

	echo "<table>";
	echo extract_th($table_header);
	
	$i=0;
	while($row = $display->fetch())
	{
		echo "<tr>";
		//echo $table_col_array_content;
		//echo "<td>" .$row->$table_col_array[$i]. "</td>";
		echo extract_td($row,$table_col);
		//$display->id=$row->id;
		//$department = $display->getlink("department_id","department","id");
		//if($department->id)
		//$link2 = getlink2($department->id);
		
		//echo $display->id .",". $department->name .",". $link2;
		echo "</tr>";
		$i++;
	}
	echo "</table>";
}

function extract_th($table_header)
{
	$table_header_array = explode(",", $table_header);
	
	$table_header_array_content .="<tr>";
	foreach ($table_header_array as $value) 
	{
		$table_header_array_content .= "<th>$value</th>";
	}
	$table_header_array_content .="</tr>";
	
	return $table_header_array_content;
}

function extract_td($row,$table_col)
{
	$table_col_array = explode(",", $table_col);
	foreach ($table_col_array as $value) 
	{
		$table_col_array_content .= "<td>".$row->$value."</td>";
	}
	return $table_col_array_content;
}

function getlink2($param)
{
	$headname= new sksql("department");
	$headname->whereadd("id=$param");
	$headname->find();
	
	$row = $headname->fetch();
	$headname->id=$row->id;
	$headname_link = $headname->getlink("head_id","user","id");
	return $headname_link->name;
	//echo "<br>";
}
?>