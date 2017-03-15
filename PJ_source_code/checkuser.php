<?php
/**
 * Created by PhpStorm.
 * User: xulu
 * Date: 2016/5/12
 * Time: 0:42
 */

require_once 'functions.php';
if (isset($_POST['user']))
{
    $user = sanitizeString($_POST['user']);
    $result = queryMysql("SELECT * FROM user WHERE uname='$user'");
    if ($result->num_rows)
        echo "<span class='taken'>&nbsp;&#x2718; " .
            "该用户已被注册</span>";
    else
        echo "<span class='available'>&nbsp;&#x2714; " .
            "恭喜您！该用户名可用！</span>";
}
?>