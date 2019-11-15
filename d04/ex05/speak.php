<?php
session_start();

if ($_SESSION['loggued_on_user'] != '')
{
    $empty = trim($_GET['msg']);
    if ($empty != "" && isset($_GET['submit']))
    {
        if ($_GET['submit'] == 'Envoyer')
        {
            if (file_exists("../private/chat") == FALSE)
					{
						$content = array(array('time'=>time(), 'login'=>$_SESSION['loggued_on_user'], 'msg'=>$_GET['msg']));
						$content = serialize($content);
						file_put_contents("../private/chat", $content);
					}
			else
				{
					$chat = fopen("../private/chat", "c+");
					flock($chat, LOCK_EX | LOCK_SH);
					$content = file_get_contents("../private/chat");
					$content = unserialize($content);
					$content[] = array('time'=>time(), 'login'=>$_SESSION['loggued_on_user'], 'msg'=>$_GET['msg']);
					$content = serialize($content);
					file_put_contents("../private/chat", $content);
                    fclose($chat);
				}
        }
    }
}
?>
<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
<form action="speak.php" method="GET">
    <input type="text" name="msg" placeholder="Votre message">
    <input type="submit" name="submit" value="Envoyer">
</form>