<?php
	require 'json_code.php';

	$servers_file = 'servers.json';
	$servers_open = file_get_contents($servers_file);
	$servers = json_decode($servers_open, true);
	foreach ($servers as $row) {
		$online_src = 'online_hash/'.$row['name'].'.json';
		$res = json_decode(file_get_contents($online_src),true);
			$id = $row['id'];
			$onl[$id] = $res['online'];
			$mx[$id] = $res['max'];
			$stat[$id] = $res['status'];
	}
	$sum = array_sum($onl);
	$max = array_sum($mx);
	require 'template.php';
?>