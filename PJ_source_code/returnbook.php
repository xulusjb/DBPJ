<?php
/**
 * Created by PhpStorm.
 * User: xulu
 * Date: 2016/6/11
 * Time: 10:43
 */
require_once 'header.php';

if (!$loggedin) die("请登录再操作");

echo "<div class='main'><h1>归还图书</h1>";
echo "<hr size = '3px' align='left' />";


$error = $book =$uname = '';
echo <<<_END
<form method='post' action='returnbook.php'>$error
<div class="form-group">
<label>查找归还人用户名</label>
<input type="text" class="form-control" name='uname'  placeholder="归还人用户名">
</div>
<input type='submit' class='btn btn-default' value='查找'>
</form><br>
_END;


$n = 1;

if (isset($_POST['uname']))
{
    $uname = sanitizeString($_POST['uname']);

        $result1 = queryMySQL("SELECT * FROM user WHERE uname='$uname' ");
        if ($result1->num_rows == 0)
        {

            $error = "<span class='error'>查无此人</span><br><br>";
        }
        else
        {
            $result1->data_seek(0);
            $user_id = $result1->fetch_assoc()['user_id'];

            $result2 = queryMySQL("SELECT * FROM borrow WHERE user_id='$user_id' ");
            if ($result2->num_rows == 0)
            {
                $error = "<span class='error'>此人无借书记录</span><br><br>";
            }
            else
            {
                echo"<table class='table table-bordered table-striped'>";
                echo"<thead></thead><tbody>";
                $num = $result2->num_rows;

                for ($j= 0;$j < $num ; $j++)
                {
                    $result2->data_seek($j);
                    $borrow_id = $result2->fetch_assoc()['borrow_id'];

                    $result2->data_seek($j);
                    $repo_id = $result2->fetch_assoc()['repo_id'];
                    $result2->data_seek($j);
                    $borrowtime = $result2->fetch_assoc()['borrowtime'];//**
                    $result2->data_seek($j);
                    $duetime = $result2->fetch_assoc()['duetime'];//**
                    $result2->data_seek($j);
                    $returntime = $result2->fetch_assoc()['returntime'];//**

                    if ($returntime != '')
                        continue;

                    $result3 = queryMySQL("SELECT * FROM repo WHERE repo_id='$repo_id' ");
                    $result3->data_seek(0);
                    $book_id = $result3->fetch_assoc()['book_id'];

                    $result4 = queryMySQL("SELECT * FROM book WHERE book_id='$book_id' ");
                    $result4->data_seek(0);
                    $title = $result4->fetch_assoc()['title'];//**

                    echo"<tr><td>";
                    echo "第"."$n"."条未归还记录："."<br>";
                    echo "图书名字："."$title"."<br>";
                    echo "借阅时间："."$borrowtime"."<br>";
                    echo "逾期时间："."$duetime"."<br>";
                    echo "<form method='post' action='return.php'>".
                         "<input type='hidden'  name='bid' value='$borrow_id'>".
                         "<input type='hidden'  name='rid' value='$repo_id'>".
                         "<input type='hidden'  name='uname' value='$uname'>".
                         "<input type='submit' class='btn btn-danger' value='归还'></form>";
                     echo"</td></tr>";
                    $n++;
                }
                echo"</tbody>";
                echo"</table>";

                if ($n == 1)
                {
                    $error = "<span class='error'>此人无未归还图书</span><br><br>";
                }
            }
        }

}

echo "$error";

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
