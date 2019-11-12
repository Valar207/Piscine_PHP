#!/usr/bin/php
<?php
if ($argc == 2)
{
    date_default_timezone_set('Europe/Paris');
    if (!preg_match("/^([Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche) ([1-9]|0[1-9]|[12][0-9]|3[0-1]) ([Jj]anvier|[Ff][e|é]vrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]o[uû]t|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd][ée]cembre) ([0-9]{4}) ([0-1][0-9]|0[0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/", "$argv[1]", $date))
        {
            echo "Wrong Format\n";
            exit();
        }    
    $date = explode(' ', $argv[1]);
    $h = explode(':', $date[4]);
    $day = array('/[Ll]undi/', '/[Mm]ardi/', '/[Mm]ercredi/', '/[Jj]eudi/', '/[Vv]endredi/', '/[Ss]amedi/', '/[Dd]imanche/');
    $replaced = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    $date[0] = preg_replace($day, $replaced, $date[0]);
    $m = array('/[Jj]anvier/', '/[Ff][eé]vrier/', '/[Mm]ars/', '/[Aa]vril/', '/[Mm]ai/', '/[Jj]uin/', '/[Jj]uillet/', '/[Aa]o[uû]t/', '/[Ss]eptembre/', '/[Oo]ctobre/', '/[Nn]ovembre/', '/[Dd][ée]cembre/');
    $replacem = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
    $date[2] = preg_replace($m, $replacem, $date[2]);
    $res = mktime($h[0], $h[1], $h[2], $date[2], $date[1], $date[3]);
    $name_day = date('l', $res);
    if ($date[0] != $name_day)
    {
        echo "Wrong Format\n";
        exit();
    }
    echo "$res\n";
}
?>