<?php
include 'skdb.php';

update();
//delete();
//insertsql();
display();

function update()
{
	$rs = new sksql($_GET['table']);
	$rs->whereadd("id=1");
	$rs->updateadd("department_id=1");
	$rs->updateadd("company_id=1");
	$rs->update();
}

function delete()
{
	$rs = new sksql($_GET['table']);
	$rs->id=4;
	$rs->delete();
}

function insertsql()
{
	$table = $_GET['table'];
$param = $_GET['param'];

$param_array = explode(",", $param);

$rs = new sksql($_GET['table']);
for ($i=0; $i < count($param_array) ; $i++)
{
	echo $param_array[$i];
	$rs->insertadd($param_array[$i]);	
}
$rs->insert();
}

function display()
{
	$display = new sksql("user");
	$display->find();

	while($row = $display->fetch())
	{
		//echo $row->id;
		$display->id=$row->id;
		$department = $display->getlink("department_id","department","id");
		echo $department->name;
		echo "<br>";
	}
}
?>