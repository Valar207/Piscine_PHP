#!/usr/bin/php
<?PHP
$file = file_get_contents($argv[1]);
if (feof(STDIN) == TRUE)
{
    echo "\n";
    exit();     
}
function upper1($file)
{
    return ($file[1].strtoupper($file[2]).$file[3].strtoupper($file[4]));
} 
function upper2($file)
{
    return ($file[1].strtoupper($file[2]).$file[3]);
}
$r = preg_replace_callback('/(<a.*?title=")(.*?)(">)(.*?<\/)/s', 'upper1', $file);
$res = preg_replace_callback('/(<a .*>)(.*)(<img)/', 'upper2', $r);
echo "$res\n";
?>