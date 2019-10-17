#!/usr/bin/php
<?PHP
function upper2($p)
{
    return ($p[1].strtoupper($p[2]).$p[3]);
}
function upper1($p)
{
        $p[0] = preg_replace_callback("/( title=\")(.*?)(\")/", 'upper2', $p[0]);
        $p[0] = preg_replace_callback('/(>)(.*?)(<)/s', 'upper2', $p[0]);
    return($p[0]);
}
if ($argc < 2)
		exit();
$page = file_get_contents($argv[1]);
$page = preg_replace_callback("/(<a)(.*?)(>)(.*)(<\/a>)/s", 'upper1', $page);
echo $page;
?>