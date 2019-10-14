#!/usr/bin/php
<?php
if ($argv < 3)
{
    exit();
}
else{
	foreach ($argv as $elem) {
			$val = explode(':', $elem);
			if ($val[0] == $argv[1])
				$result = $val[1];
		}
	echo $result;
	if (is_null($result) == FALSE)
		echo "\n";
}
?>