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
?>