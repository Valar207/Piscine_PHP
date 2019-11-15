<?php
    session_start();
    $login = $_POST['login'];
    $passwd = $_POST['passwd'];
    $submit = $_POST['submit'];

    if ($login && ($passwd || $passwd == '0') && $submit && $submit === 'OK')
    {
        if (!file_exists('../private'))
            mkdir('../private');
        if (!file_exists('../private/passwd'))
            file_put_contents('../private/passwd','');
        $account = unserialize(file_get_contents('../private/passwd'));

        if ($account)
        {
            foreach ($account as $i)
            {
                if ($i['login'] === $login)
                    {
                        echo "ERROR\n";
                        exit;
                    }
            }
        }
        $tmp['login'] = $login;
        $tmp['passwd'] = hash('whirlpool',$passwd);
        $account[] = $tmp;
        file_put_contents('../private/passwd', serialize($account));
        echo "OK\n";
    }
    else
        echo "ERROR\n";
?>