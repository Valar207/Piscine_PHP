#!/usr/bin/php
<?PHP
function moyenne($tab)
{
	$nb = 0;
	foreach($tab as $elem)
	{
		$notes = explode(';', $elem);
		if (strlen($notes[1]) && $notes[2] != 'moulinette')
		{
			$moyenne += $notes[1];
			$nb++;
		}
	}
	echo $moyenne / $nb."\n";
}

function moyenne_user($tab)
{
	sort($tab);
	foreach ($tab as $key => $item)
	{
		$temp = explode (";", $item);
		$arr[$temp[0]][$key] = $item;
	}
	foreach ($arr as $user)
	{
		$nb = 0;
		$somme_user = 0;
		$moyenne = 0;
		foreach ($user as $line)
		{
			$note = explode (";", $line);
			if (strlen($note[1]) && $note[2] != "moulinette")
			{
				$somme_user += $note[1];
				$nb++;
			}
		}
		if ($nb != 0)
		{
		$moyenne = $somme_user / $nb;
		echo $note[0].":".$moyenne."\n";
		}
	}
}

function ecart_moulinette($tab)
{
	sort($tab);
	foreach ($tab as $key => $item)
	{
		$temp = explode (";", $item);
		$arr[$temp[0]][$key] = $item;
	}
	foreach ($arr as $user)
	{
		$nb_user = 0;
		$somme_user = 0;
		$note_moulinette = 0;
		foreach ($user as $line)
		{
			$note = explode (";", $line);
			if (strlen($note[1]) && $note[2] != "moulinette")
			{
				$somme_user += $note[1];
				$nb_user++;
			}
			if ($note[2] == "moulinette")
				$note_moulinette = $note[1];
		}
		if ($nb_user != 0)
		{
			$moyenne_user = $somme_user / $nb_user;
			echo $note[0].":".($moyenne_user - $note_moulinette)."\n";
		}
	}
}

if ($argc == 2)
{
	$tab = file('php://stdin');
	unset($tab[0]);
	if ($argv[1] == 'moyenne')
		moyenne($tab);
	if ($argv[1] == 'moyenne_user')
		moyenne_user($tab);
	if ($argv[1] == 'ecart_moulinette')
		ecart_moulinette($tab);
}
?>