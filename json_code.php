<?php
	$servers_json = 'servers.json';
	$servers_file = file_get_contents($servers_json);
	$servers = json_decode($servers_file, true);
	foreach ($servers as $row) {
		$socket = @fsockopen($row['ip'], $row['port']);
		if ($socket !== false) {
			@fwrite($socket, "\xFE");
			$data = "";
			$data = @fread($socket, 256);
			@fclose($socket);
			if ($data == false or substr($data, 0, 1) != "\xFF") return;{
				$info= substr( $data, 3 );
				$info = iconv( 'UTF-16BE', 'UTF-8', $info );
				if( $info[ 1 ] === "\xA7" && $info[ 2 ] === "\x31" ) {
					$info = explode( "\x00", $info );
					$playersOnline=IntVal( $info[4] );
					$playersMax = IntVal( $info[5] );
				} else {
					$info = Explode( "\xA7", $info );
					$playersOnline=IntVal( $info[1] );
					$playersMax = IntVal( $info[2] );}
					$online = $playersOnline;
					$online_json = '{"online":"'.$online.'","max":"'.$playersMax.'", "status":"online"}';
					$online_file = file_put_contents('online_hash/'.$row['name'].'.json', $online_json);
				}
			} else {
				$online_json = '{"online":"", "status":"offline"}';
				$online_file = file_put_contents('online_hash/'.$row['name'].'.json', $online_json);
			}
		}
	
?>