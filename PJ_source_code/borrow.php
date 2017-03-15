<?php
/**
 * Created by PhpStorm.
 * User: xulu
 * Date: 2016/6/11
 * Time: 1:40
 */
require_once 'header.php';

if (isset($_POST['repoid']))
{
    $uid = $_POST['uid'];
    $repoid = $_POST['repoid'];
    $bid = $_POST['bid'];
    //echo "$uid"."aaa"."$repoid";
    queryMySQL("call borrow($repoid, $uid, $bid);");
    echo "<script>".
        "swal({   title: \"成功!\",   text: \"图书已借阅!\",   type: \"success\",   confirmButtonText: \"Cool\" });".
        "</script>";
    echo "<a class='main' href='searchbook.php'>返回</a><br><br>";

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
