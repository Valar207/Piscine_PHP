#!/usr/bin/php
<?php
function ft_split($input)
{
    $tmp = trim(preg_replace('/\s+/', ' ', $input));
    return($tmp);
}
if ($argc > 1)
{
    $r = ft_split($argv[1]);
    $tmp = explode(' ', $r);
    $i = 1;
    while ($tmp[$i])
    {
        echo "$tmp[$i] ";
        $i++;
    }
    echo "$tmp[0]\n";
}
?>