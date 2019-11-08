#!/usr/bin/php
<?php

if ($argc == 4)
{
    foreach ($argv as $i=>$value)
        $argv[$i] = trim($value, " ");
    if (is_numeric($argv[1]) == FALSE || is_numeric($argv[3]) == FALSE)
        return;
    if ($argv[2] == "+")
        echo $argv[1]+$argv[3]."\n";
    else if ($argv[2] == "-")
        echo $argv[1]-$argv[3]."\n";
    else if ($argv[2] == "*")
        echo $argv[1]*$argv[3]."\n";
    else if ($argv[2] == "/" && $argv[3] != "0")
        echo $argv[1]/$argv[3]."\n";
    else if ($argv[2] == "%" && $argv[3] != "0")
        echo $argv[1]%$argv[3]."\n";
    else
        return;
}
else
    echo "Incorrect Parameters\n";
?>