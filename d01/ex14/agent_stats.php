#!/usr/bin/php
<?php

if ($argc < 2)
    exit(0);
if (!in_array($argv[1], ['moyenne', 'moyenne_user', 'ecart_moulinette']))
    exit(0);
// Read
$file = file_get_contents("php://input");
if (!$file)
    exit(0);
/*while($line = fgetcsv($file, 0, ';'))
{
    print_r($line);

}*/

echo "$file\n";

?>