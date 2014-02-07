<!DOCTYPE HTML>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9">
<html>
<head>
    <title>SKDB</title>
    <script type="text/javascript" src="js/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="css/h_table.css">
<script>
$(document).ready(function()
{
	$.ajaxSetup({cache: false});
	var table = "user";
	var table_col = "name,address,department_id,company_id";
	var table_header = "Name, Address, Department, Company";
	var getlink =new Array();
		getlink[0] = "user.department_id>department.head_id>user.name";
		getlink[1] = "user.company_id>company.name";
	var condition = "company=1";
	$('#content').load('test_array.php',{table:table, table_col:table_col, table_header:table_header, 'getlink[]':getlink, condition:condition});
});
</script>
</head>
<body>
<div id="content" class='CSSTableGenerator'></div>	
</body>
</html>