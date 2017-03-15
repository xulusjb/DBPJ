<?php
/**
 * Created by PhpStorm.
 * User: xulu
 * Date: 2016/6/11
 * Time: 15:10
 */

require_once 'header.php';
if (!$loggedin) die("请登录再操作");
echo "<div class='main'><h1>催交图书</h1>";
//echo "<div bgcolor = #CCCCCC height =1px>&nbsp;</div>";
echo "<hr size = '3px' align='left' />";
$result = queryMySQL("select * from borrow where duetime < current_timestamp and returntime is null");
echo "<h3 id=\"tables-striped\">逾期记录：</h3>"."<br>";
if ($result->num_rows == 0)
{
    echo "<div class='error'>本图书馆没有逾期不还记录</div>";
}
else
{
    echo"<table class='table table-bordered table-striped'>";
    echo"<thead></thead><tbody>";
    for ($i = 0; $i< $result->num_rows ; $i++)
    {
        echo"<tr><td>";

        $result->data_seek($i);
        $uid = $result->fetch_assoc()['user_id'];
        $result->data_seek($i);
        $bid = $result->fetch_assoc()['book_id'];
        $result->data_seek($i);
        $rid = $result->fetch_assoc()['repo_id'];
        $result->data_seek($i);
        $btime = $result->fetch_assoc()['borrowtime'];
        $result->data_seek($i);
        $dtime = $result->fetch_assoc()['duetime'];

        $resultu = queryMySQL("select * from user where user_id = '$uid'");
        $resultu->data_seek(0);
        $uname = $resultu->fetch_assoc()['uname'];
        $resultu->data_seek(0);
        $uemail = $resultu->fetch_assoc()['umail'];

        $resultb = queryMySQL("select * from book where book_id = '$bid'");
        $resultb->data_seek(0);
        $title = $resultb->fetch_assoc()['title'];
        $author = $resultb->fetch_assoc()['author'];

        echo "借书人： '$uname'"."<br>";
        echo "图书名字: '$title'"."<br>";
        echo "图书内部ID： '$rid'"."<br>";
        echo "借书时间： '$btime'"."<br>";
        echo "应还时间： '$dtime'"."<br>";
        echo "借阅状态：<font color=\"#FF0000\">未归还</font><br>";
        echo "用户邮箱： '$uemail'"."<br>";

        $email_title = "亲爱的用户您好！您有一本在本图书馆借的图书逾期了";
        $emeil_content = "您好：您在"."$btime"."在本图书馆借阅了"."$title"."。该书应于"."$dtime"."之前归还图书馆。现已逾期，请尽快归还。谢谢！";

        echo "<form method='post' action='sendmail.php'>".
             "<input type='hidden'  name='toemail' value='$uemail'>".
             "<input type='hidden'  name='title' value='$email_title'>".
             "<input type='hidden'  name='content' value='$emeil_content'>".
             "<input class='btn btn-danger' type='submit' value='发送催还邮件'></form>";


        echo"</td></tr>";
    }
    echo"</tbody>";
    echo"</table>";

}
$title = array();

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