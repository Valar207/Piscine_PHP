#!/usr/bin/php
<?PHP
$file = file_get_contents($argv[1]);
$put = preg_match_all('/(<img src=")(.*)(" )/', $file, $matches);
mkdir('www.42.fr');
foreach($matches[2] as $img)
{
    if (!preg_match('/www.42.fr/', $img))
    {
        $img = $argv[1].$img;
    }
    $dir =  getcwd()."/"."www.42.fr". "/". basename($img);
    $content = file_get_contents($img);
    file_put_contents($dir, $content);
}
?>