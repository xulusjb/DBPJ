<?php
/**
 * Created by PhpStorm.
 * User: xulu
 * Date: 2016/5/11
 * Time: 21:57
 */

require_once 'header.php';
echo <<<_END
<script>
    function checkUser(user)
    {
        if (user.value == '')
        {
            O('info').innerHTML = ''
            return
        }
        params = "user=" + user.value
        request = new ajaxRequest()
        request.open("POST", "checkuser.php", true)
        request.setRequestHeader("Content-type","application/x-www-form-urlencoded")
        request.setRequestHeader("Content-length", params.length)
        request.setRequestHeader("Connection", "close")
        request.onreadystatechange = function()
        {
            if (this.readyState == 4)
            if (this.status == 200)
            if (this.responseText != null)
            O('info').innerHTML = this.responseText
        }
        request.send(params)
    }

    function ajaxRequest()
    {
        try { var request = new XMLHttpRequest() }
        catch(e1) {
            try { request = new ActiveXObject("Msxml2.XMLHTTP") }
        catch(e2) {
            try { request = new ActiveXObject("Microsoft.XMLHTTP") }
        catch(e3) {
            request = false
            } } }
        return request
    }
</script>

_END;
echo "<div class='main'><h1>注册用户</h1>";
echo "<hr size = '3px' align='left' />";
$error = $user = $pass = $email = $department = "";
if (isset($_SESSION['user'])) destroySession();
if (isset($_POST['user']))
{
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    $email = sanitizeString($_POST['email']);
    $department = sanitizeString($_POST['department']);

    if ($user == "" || $pass == "" || $email == "" )
        $error = "未完全填写信息<br><br>";
    else
    {
        $result = queryMysql("SELECT * FROM user WHERE uname='$user'");
        if ($result->num_rows)
            echo "<script>".
                "swal({   title: \"注册失败!\",   text: \"用户名已存在\",   type: \"error\",   confirmButtonText: \"OK\" });".
                "</script>";
        else
        {
            queryMysql("INSERT INTO user VALUES(null,'$user', '$pass','1','$email','comp','2018-6-30 23:59:59',CURRENT_TIMESTAMP)");
            echo "<script>".
                "swal({   title: \"注册成功!\",   text: \"恭喜您！注册成功！\",   type: \"success\",   confirmButtonText: \"OK\" });".
                "</script>";
            die("请点击此处<a href='login.php'>登录</a><br><br>");
        }
    }
}

echo <<<_END
<form method='post' action='signup.php' >$error
<div class="form-group">
<label>用户名</label>
<input type="text" class="form-control" name='user'  placeholder="用户名"  onBlur='checkUser(this)'>
</div>

<div class="form-group">
<label>密码</label>
<input type='password' class="form-control" name='pass'  placeholder="密码" >
</div>

<div class="form-group">
<label>电子邮箱</label>
<input type='text' class="form-control" name='email'  placeholder="电子邮箱" >
</div>
_END;
?>

<input type='submit' class="btn btn-default" value='注册'>
</form></div>
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