<?php
/**
 * Created by PhpStorm.
 * User: xulu
 * Date: 2016/5/12
 * Time: 0:43
 */
require_once 'header.php';
echo "<div class='main'><h1>用户登录</h1>";
echo "<hr size = '3px' align='left' />";
$error = $user = $pass = "";
if (isset($_POST['user']))
{
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    if ($user == "" || $pass == "")
        $error = "用户名/密码填写不完整<br>";
    else
    {
        $result = queryMySQL("SELECT uname,password FROM user WHERE uname='$user' AND password='$pass'");
        if ($result->num_rows == 0)
        {
            $error = "<span class='error'>用户名/密码错误</span><br><br>";
        }
        else
        {
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $pass;
            echo "swal({   title: \"成功!\",   text: \"登陆成功!\",   type: \"success\",   confirmButtonText: \"Cool\" });".

            die("登陆成功！请点击<a href='index.php?view=$user'>首页</a>继续<br><br>");
        }
    }
}
echo <<<_END
<form method='post' action='login.php'>$error
<div class="form-group">
    <label for="uname">用户名</label>
    <input type="text" class="form-control" name='user'  placeholder="用户名">
</div>
<div class="form-group">
<label for="pwd">密码</label>
<input type="password" class="form-control" name='pass'  placeholder="密码">
</div>
_END;
?>
<input type='submit' class="btn btn-default" value='登陆'>
</form><br></div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p class="copyright text-muted small">版权所有 &copy; 复旦大学图书馆 保留一切权利</p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>