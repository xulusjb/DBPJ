<?php
/**
 * Created by PhpStorm.
 * User: xulu
 * Date: 2016/5/11
 * Time: 21:52
 */

require_once 'header.php';
echo"<div id=\"headerphoto\">";
echo "<br><span class='main'><center><h1>欢迎使用$appname</h1></center>";
if ($loggedin) echo "<span class='main'><center><h2> $user, 欢迎你！</h2></center>";
else echo "<span class='main'><h1><center>请登录后进行操作</h1></center>";



?>

</span>
</div>
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
