#!/usr/bin/php
<?php
function    ft_is_sort($tab)
{
    $cmp = $tab;
    sort($cmp);
    $i = 0;
    $j = 0;
    $res;
    if (($cmp[$i] == $tab[$i])){
        while($i < count($cmp))
        {
            if ($cmp[$i] != $tab[$i]){
                $res = 0;
                break;
            }
            else 
                $res = 1;
            $i++;
        }
    }
    else{
        while($cmp[$i + 1])
            $i++;
        while($i != 0)
        {
            if ($cmp[$i] != $tab[$j]){
                $res = 0;
                break;
            }
            else 
                $res = 1;
            $i--;
            $j++;
        } 
    }
    if ($res == 1)
        return (true);
    else
        return (false);
}
?>