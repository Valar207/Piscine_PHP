<?php
    session_start();
    $login = $_POST['login'];
    $oldpw = $_POST['oldpw'];
    $newpw = $_POST['newpw'];
    $submit = $_POST['submit'];

    if ($login && ($oldpw || $oldpw == '0') && ($newpw || $newpw == '0') && $submit && $submit === 'OK' && $newpw !== $oldpw)
    {
        $exist = 0;
        if (!file_exists('../private/passwd'))
            echo "ERROR\n";
        $account = unserialize(file_get_contents('../private/passwd'));
        foreach($account as $elem=>$i)
        {
            if ($i['login'] === $login && $i['passwd'] === hash('whirlpool', $oldpw))
            {
                $account[$elem]['passwd'] = hash('whirlpool', $newpw);
                $exist = 1;
            }
        }
        if ($exist == 1)
        {
            file_put_contents('../private/passwd', serialize($account));
            echo "OK\n";
        }
        else
            echo "ERROR\n";
    }
    else
        echo "ERROR\n";
?>