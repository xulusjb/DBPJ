<?php
/**
 * Created by PhpStorm.
 * User: xulu
 * Date: 2016/6/11
 * Time: 12:45
 */
require_once 'header.php';
if (!$loggedin) die("请登录再操作");

if (isset($_POST['bid']))
{
    $bid = $_POST['bid'];
    $rid = $_POST['rid'];
    $uname = $_POST['uname'];
    //Echo "$bid"."$rid";
    queryMySQL("call back($rid, $bid);");
    echo "<script>".
    	 "swal({   title: \"成功!\",   text: \"图书已归还!\",   type: \"success\",   confirmButtonText: \"Cool\" });".
    	 "</script>";

    echo "<a class='main' href='returnbook.php'>返回</a><br><br>";
}
?>
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