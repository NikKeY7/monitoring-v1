<?php
foreach ($servers as $row) {
	$players = $onl[$row['id']];
	$max_players = $mx[$row['id']];
	$persent = $max_players/100*$players;
	if ($stat[$row['id']]=='offline')
	{
		$file_s = fopen("template/offline.tpl", "r"); while (!feof($file_s)) {
			$line = fgets($file_s);
			$server = str_replace('{name}',$row['name'],$line);
			echo($server); 
		}
		fclose($file_s);
	}
	else 
	{
		$file_s = fopen("template/server.tpl", "r"); while (!feof($file_s)) {
			$line = fgets($file_s);
			$server = str_replace('{players}',$players,$line);
			$server = str_replace('{online}',$players.'/'.$max_players,$server);
			$server = str_replace('{max}',$max_players,$server);
			$server = str_replace('{name}',$row['name'],$server);
			$server = str_replace('{persent}',$persent,$server);
			echo($server); 
		}
		fclose($file_s);
	}
	
}
$persent_max = $max/100*$sum;
$file = fopen("template/max.tpl", "r"); while (!feof($file)) {
	$line = fgets($file);
	$max_o = str_replace('{players}',$sum,$line);
	$max_o = str_replace('{max}',$max,$max_o);
	$max_o = str_replace('{persent}',$persent_max,$max_o);
	echo($max_o); 
}
fclose($file);
?>