#!/usr/bin/php
<?php
if ($argc > 1)
{
    $spaces = trim($argv[1]);
    if (strlen($spaces)>0){
        $res = preg_replace('/\s+/', ' ', $argv[1]);
        $res = preg_replace('/\t+/', ' ', $res);
        $res = trim($res);
        echo "$res\n";
    }
}
?>