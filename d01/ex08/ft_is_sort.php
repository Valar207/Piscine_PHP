#!/usr/bin/php
<?php
function    ft_is_sort($tab)
{
    $cmp = $tab;
    sort($cmp);
    $i = 0;
    $res;
    while($cmp[$i])
    {
        if ($cmp[$i] != $tab[$i])
            $res = 0;
        else 
            $res = 1;
        $i++;
    }
    if ($res == 1)
        return (true);
    else
        return (false);
}
?>