<?php
date_default_timezone_set('Europe/Paris');
	if (file_exists("../private/chat") == TRUE)
	{
		$content = unserialize(file_get_contents("../private/chat"));
		foreach ($content as $v) 
		{
			echo "<div style ='font:13px/26px verdana,tahoma,sans-serif;color:black'>[".date("H:i", $v['time'])."] <b>".$v['login']."</b>: ".$v['msg']."<br />";
		}
	}
?>