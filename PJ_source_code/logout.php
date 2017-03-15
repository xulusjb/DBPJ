<?php
/**
 * Created by PhpStorm.
 * User: xulu
 * Date: 2016/5/12
 * Time: 20:28
 */

require_once 'header.php';
if (isset($_SESSION['user']))
{
    destroySession();
    echo "<div class='main'>您已登出，请点击<a href='index.php'>此处</a>返回首页";
}
else echo "<div class='main'><br>" .
    "您没有登陆因此无法登出";
?>
<br><br></div>
</body>
</html>
