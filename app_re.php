<?php
$list = array();
$count = 1;
require("includes/mysql_connect.php");
$query = mysql_query("SELECT * FROM re");
$numrows = mysql_num_rows($query);
		while ($row = mysql_fetch_assoc($query))
		{
			$list['$count'] = $row['ID'];
			$count++;	
		}
if($numrows)
	/*while($count!=1)
	{
		$count--;
		echo $list['$count'];
	}
	*/
	echo json_encode($count);
mysql_free_result($query);

?>