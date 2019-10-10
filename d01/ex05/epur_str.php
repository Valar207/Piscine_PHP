#!/usr/bin/php
<?php
$res;
if ($argc == 2)
{
    $res = trim(preg_replace('/\s+/',' ', $argv[1]));
    echo "$res\n";
}
?>