<?php
//$list = array();
$count = 1;
require("includes/mysql_connect.php");
$query = mysql_query("SELECT * FROM re");
$numrows = mysql_num_rows($query);
		while ($row = mysql_fetch_assoc($query))
		{
			$list[] = $row;
			$count++;	
		}
if($numrows)
	/*while($count!=1)
	{
		$count--;
		echo $list['$count'];
	}
	*/
	$list[]=$row;
	echo json_encode($list);
mysql_free_result($query);

?>