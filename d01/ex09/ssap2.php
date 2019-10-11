#!/usr/bin/php
<?php
function ft_split($input)
{
    $tmp = trim(preg_replace('/\s+/', ' ', $input));
    $res = explode(' ', $tmp);
    return($res);
}

function c_sort($s1, $s2)
{
    $a = strtolower($s1);
    $b = strtolower($s2);
    $comp= "abcdefghijklmnopqrstuvwxyz0123456789!\"#$%&'()*+,./:;<=>?@[\]^_`{|}~";
    $i = 0;
    while ($a[$i] && $b[$i] && $a[$i] == $b[$i])
        $i++;

    $cmp1 = stripos($comp, $a[$i]);
    $cmp2 = stripos($comp, $b[$i]);
    if ($cmp1 >= $cmp2)
        return true;
    else
        return false;
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
    usort($str, "c_sort");
    foreach ($str as $i)
        echo "$i\n";
}
?>