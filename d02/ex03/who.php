#!/usr/bin/env php
<?php
date_default_timezone_set('Europe/paris');
$file = fopen("/var/run/utmpx", "r");
while (!feof($file))
{
    $res = fread($file, 628);
    if (strlen($res) == 628)
    {
        $res = unpack("a256user/a4id/a32line/ipid/itype/itime", $res);
        if ($res['type'] == 7)
        {
            echo trim($res['user'])." ";
            echo trim($res['line'])."  " ;
            echo (date("M d H:i", $res['time']))." \n";
        }
    }
}
?>