#!/usr/bin/php
<?php





function    ft_is_sort($tab)
{
    $i = 0;
    while ($tab[$i])
    {
        if ($tab[$i] > $tab[$i + 1])
            return (false);
        else
            return (true);
        $i++;
    }
}





$tab = array("!/@#;^", "42", "Hello World", "salut", "zZzZzZz");
$tab[] = "Et qu’est-ce qu’on fait maintenant ?";

$i = 0;
while ($tab[$i])
{   
    echo "$tab[$i] ";
    $i++;
}

echo "\n";
$t = ft_is_sort($tab);

echo "$t\n";

if (ft_is_sort($tab))
echo "Le tableau est trie\n";
else
echo "Le tableau n’est pas trie\n";

?>