<?php
/**
 * Created by PhpStorm.
 * User: xulu
 * Date: 2016/6/11
 * Time: 10:13
 */
require_once 'header.php';


if (isset($_POST['branch']))
{
    $book_id = $_POST['bookid'];
    $branch = $_POST['branch'];
    $num = $_POST['num'];
    $n = intval($num);

    for  ($i =0;$i<$n;$i++)
    {
        queryMySQL("INsert into repo values (null, '$book_id', '$branch',1);");
    }
    echo "<script>".
        "swal({   title: \"书籍入库成功!\",   text: \"书籍已入库\",   type: \"success\",   confirmButtonText: \"OK\" });".
        "</script>";
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

