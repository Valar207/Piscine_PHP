#!/usr/bin/php
<?php
function ft_split($input)
{
    if (trim($input) == NULL)
        return;
    else{
        $tmp = trim(preg_replace('/\s+/', ' ', $input));
        $res = explode(' ', $tmp);
        sort($res);
        return($res);    
    }
}

if ($argc > 1)
{
    $i = 1;
    while ($i < $argc)
    {
        $str .= " ".$argv[$i]." ";
        $i++;
    }
    $str = ft_split($str);
    $i = 0;
    while ($str[$i])
    {
        echo "$str[$i]\n";
        $i++;
    }
}
?>