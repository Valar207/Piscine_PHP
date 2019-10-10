#!/usr/bin/php
<?php
function ft_split($input)
{
    $tmp = trim(preg_replace('/\s+/', ' ', $input));
    $res = explode(' ', $tmp);
    sort($res);
    return($res);
}
?>