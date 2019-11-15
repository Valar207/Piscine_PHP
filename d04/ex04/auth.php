<?php
function auth($login, $passwd)
{
    if (!file_exists('../private/passwd'))
        return (FALSE);
    $accounts = unserialize(file_get_contents('../private/passwd'));
    $passwd = hash('whirlpool', $passwd);
    foreach ($accounts as $k=>$v)
    {
        if ($login === $accounts[$k]['login'] && $passwd === $accounts[$k]['passwd'])
            return(TRUE);
    }
    return(FALSE);
}
?>