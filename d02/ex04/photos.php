#!/usr/bin/php
<?PHP
$file = file_get_contents($argv[1]);
preg_match("/^.*\/(.*)$/", $argv[1], $name_dir);
preg_match_all('/(<img .*?src=")(.*?)(" )/', $file, $matches);
if (!file_exists($name_dir[1]))
    mkdir($name_dir[1]);
else
    exit;
foreach($matches[2] as $img)
{
    if (!preg_match('/'.$name_dir[1].'/', $img))
    {
        $img = $argv[1].'/'.$img;
    }
    $dir =  getcwd()."/".$name_dir[1]. "/". basename($img);
    $content = file_get_contents($img);
    file_put_contents($dir, $content);
}
?>