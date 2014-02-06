<?php
include 'skdb.php';

$rs = new sksql("user");
$rs->insertadd("name=azlan");
$rs->insertadd("address=1234");
$rs->insert();

display();

function display()
{
	$display = new sksql("user");
	$display->find();

	while($row = $display->fetch())
	{
		echo $row->id;
		echo "<br>";
	}
}
?>