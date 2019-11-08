#!/usr/bin/php
<?PHP
if ($argc == 2)
{
	if (strpos($argv[1], "+") == true)
		$tab = explode("+", $argv[1]);
	else if (strpos($argv[1], "-") == true)
		$tab = explode("-", $argv[1]);
	else if (strpos($argv[1], "*") == true)
		$tab = explode("*", $argv[1]);
	else if (strpos($argv[1], "/") == true)
		$tab = explode("/", $argv[1]);
	else if (strpos($argv[1], "%") == true)
		$tab = explode("%", $argv[1]);
	else
	{
		echo "Syntax Error\n";
		exit();
	}
	if (count($tab) != 2)
	{
		echo "Syntax Error\n";
		exit();
	}
	else
	{
        foreach ($tab as $i)
            $res[] = trim($i);
		if (ctype_digit($res[0]) && ctype_digit($res[1]))
		{
			if (strpos($argv[1], "+") == true)
				echo $res[0] + $res[1]."\n";
			else if (strpos($argv[1], "-") == true)
				echo $res[0] - $res[1]."\n";
			else if (strpos($argv[1], "*") == true)
				echo $res[0] * $res[1]."\n";
			else if (strpos($argv[1], "/") == true && $res[1] != 0)
				echo $res[0] / $res[1]."\n";
			else if (strpos($argv[1], "%") == true && $res[1] != 0)
				echo $res[0] % $res[1]."\n";
			else
				return;
		}
		else
			echo "Syntax Error\n";
	}
}
else
    echo "Incorrect Parameters\n";
?>