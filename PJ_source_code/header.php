<?php
/**
 * Created by PhpStorm.
 * User: xulu
 * Date: 2016/5/11
 * Time: 21:24
 */
   session_start();

    echo "<!DOCTYPE html>\n<html lang='zh-CN'><head>";

    require_once 'functions.php';

    $userstr = ' (Guest)';

    if (isset($_SESSION['user']))
    {
        $user     = $_SESSION['user'];
        $loggedin = TRUE;
        $result = queryMysql("SELECT * FROM user WHERE uname = '$user'");
        $result->data_seek(0);
        $userlevel = $result->fetch_assoc()['level'];
        $result->data_seek(0);
        $user_id = $result->fetch_assoc()['user_id'];
        if ($userlevel == 1)
            $userstr  = " (当前用户：$user)";
        else
            $userstr  = " (当前管理员: $user)";
    }
    else $loggedin = FALSE;

echo <<<_END
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>$appname</title>

    <link rel='stylesheet' href='styles.css' type='text/css'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type="text/javascript" src="jscharts.js"></script>
    <script src="dist/sweetalert.min.js"></script>
    <script type="text/javascript" src = "jquery-3.0.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div id= 'upperhead'>
    $userstr
    </div>
    <div class='appname'>
    <img id=fudan src="FDU_logo.png" height = 60px width = 137px />
    <div>$appname<br>Fudan University Library System</div>
    </div>
    <div id= 'cutup'>
    </div>
    <script src='javascript.js'></script>
_END;


if ($loggedin && ($userlevel  == 1||$userlevel == 2))
{
    //not implemented
    //应该echo两层用户的功能按钮，见26-2.php

    echo "<nav class=\"navbar navbar-default\">" ."<div class=\"container-fluid\">".
        "<ul class=\"nav navbar-nav\">".
        "<li><a href='index.php?view=$user'>首页</a></li>" .
        "<li><a href='searchbook.php'>查询书目</a></li>".
        "<li><a href='searchborrowuser.php'>我的借阅记录</a></li>".
        "<li><a href='analyse.php'>猜你喜欢</a></li>".
        "<li><a href='logout.php'>注销</a></li>".
        "</ul></div></nav><br>";
}
else if ($loggedin && $userlevel >= 10)
{
    echo "<nav class=\"navbar navbar-default\">" ."<div class=\"container-fluid\">".
        "<ul class=\"nav navbar-nav\">".
        "<li><a href='index.php?view=$user'>首页</a></li>" .
        "<li><a href='XMLimport.php'>XML导入</a></li>".
        "<li><a href='addbook.php'>注册书籍</a></li>".
        "<li><a href='registerbook.php'>书籍入库</a></li>".
        "<li><a href='returnbook.php'>归还图书</a></li>".
        "<li><a href='analyse.php'>借阅情况分析</a></li>".
        "<li><a href='urge.php'>催还图书</a></li>".
        //"<li><a href='addpress.php'>添加出版社</a></li>".
        "<li><a href='logout.php'>注销</a></li>".
        "</ul></div></nav>";
        ;

}
else
{
    echo "<nav class=\"navbar navbar-default\">" ."<div class=\"container-fluid\">".
        "<ul class=\"nav navbar-nav\">".
        "<li><a href='index.php'>首页</a></li>"                .
        "<li><a href='signup.php'>注册</a></li>"            .
        "<li><a href='login.php'>登录</a></li>".
        "</ul></div></nav><br>";
}


?>