<?php
/**
 * Created by PhpStorm.
 * User: xulu
 * Date: 2016/6/11
 * Time: 2:00
 */
require_once 'header.php';

if (!$loggedin) die("请登录再操作");

echo "<div class='main'><h1>我的借阅记录</h1>";
echo "<hr size = '3px' align='left' />";

$result = queryMySQL("select * from borrow where user_id = $user_id;");

if ($result->num_rows == 0)
{
    echo "您没有借阅图书的记录哟！";
}
else
{
    $rows = $result->num_rows;
    echo "共找到"."$rows"."条记录：";
    echo"<table class='table table-bordered table-striped'>";
    echo"<thead></thead><tbody>";
    for ($i = 0; $i<$rows ; ++$i)
    {
        echo"<tr><td>";
        $result->data_seek($i);
        $borrowtime = $result->fetch_assoc()['borrowtime'];//**
        $result->data_seek($i);
        $duetime = $result->fetch_assoc()['duetime'];//**
        $result->data_seek($i);
        $returntime = $result->fetch_assoc()['returntime'];//**
        $result->data_seek($i);
        $repoid = $result->fetch_assoc()['repo_id'];

        $represult = queryMySQL("select * from repo where repo_id = $repoid;");
        $result->data_seek(0);
        $bookid = $represult->fetch_assoc()['book_id'];

        $bookresult = queryMySQL("select * from book where book_id = $bookid;");
        $result->data_seek(0);
        $booktitle = $bookresult->fetch_assoc()['title'];//**

        $j = $i+1;
        echo '借阅记录 '."$j".':<br>';
        echo '借阅时间: '."$borrowtime".'<br>';
        echo '借阅书目：'."$booktitle".'<br>';
        if ($returntime == '')
        {
            echo '借阅状态：<font color="#FF0000">未归还</font><br>';
            echo "逾期时间：$duetime<br>";
        }
        else
        {
            echo '借阅状态：<font color="#00EC00">已归还</font><br>';
            echo "归还时间：$returntime<br>";
        }
        echo"</td></tr>";
    }
    echo"</tbody>";
    echo"</table>";

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