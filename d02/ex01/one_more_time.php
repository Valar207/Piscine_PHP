#!/usr/bin/php
<?php
if ($argc > 1)
{
    date_default_timezone_set('Europe/Paris');
    if (!preg_match("/([Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche) ([0-9]{2}) ([Jj]anvier|[Ff][eé]vrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]o[uû]t|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd][eé]cembre) ([0-9]{4}) ([0-2][0-9]):([0-5][0-9]):([0-5][0-9])/", "$argv[1]"))
        {
            echo "Wrong Format\n";
            exit();
        }
    $matches = explode(' ', $argv[1]);
    $h = explode(':', $matches[4]);
    $m = array('/[Jj]anvier/', '/[Ff][eé]vrier/', '/[Mm]ars/', '/[Aa]vril/', '/[Mm]ai/', '/[Jj]uin/', '/[Jj]uillet/', '/[Aa]o[uû]t/', '/[Ss]eptembre/', '/[Oo]ctobre/', '/[Nn]ovembre/', '/[Dd][ée]cembre/');
    $replacem = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
    $matches[2] = preg_replace($m, $replacem, $matches[2]);
    $res = mktime($h[0], $h[1], $h[2], $matches[2], $matches[1], $matches[3]);
    echo "$res\n";
}
?>