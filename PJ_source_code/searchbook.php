<?php
/**
 * Created by PhpStorm.
 * User: xulu
 * Date: 2016/6/11
 * Time: 0:20
 */
require_once 'header.php';

if (!$loggedin) die("请登录再操作");

echo "<div class='main'><h1>搜索书目</h1>";
echo "<hr size = '3px' align='left' />";
$error = $book = '';
echo <<<_END
<form method='post' action='searchbook.php'>$error
<div class="form-group">
<input type="text" class="form-control" name='book'  placeholder="请输入书名或作者">
</div>
<input type='submit' class="btn btn-default" value='搜索'>
</form><br>
_END;



if (isset($_POST['book']))
{
    $book = sanitizeString($_POST['book']);

    $result = queryMySQL("select * from book where title like '%$book%' or author like '%$book%';");
    if (!$result->num_rows)
    {
        echo "<script>".
            "swal({   title: \"搜索失败!\",   text: \"哎呀~没有找到相关书目呢~\",   type: \"error\",   confirmButtonText: \"OK\" });".
            "</script>";
    }
    else
    {
        $rows = $result->num_rows;
        echo"<table class='table table-bordered table-striped'>";
        echo"<thead></thead><tbody>";
        for ($j = 0 ; $j < $rows; ++$j)
        {

            $result->data_seek($j);
            $book_id = $result->fetch_assoc()['book_id'] ;
            $result->data_seek($j);
            $book_name = $result->fetch_assoc()['title'];
            $result->data_seek($j);
            $book_author = $result->fetch_assoc()['author'];

            $repores = queryMySQL("select * from repo where book_id = $book_id;");
            if ($repores->num_rows != 0)
            {
                $reporows = $repores->num_rows;

                for ($i = 0; $i<$reporows ; ++$i)
                {
                    $repores->data_seek($i);
                    $book_state = $repores->fetch_assoc()['state'];
                    $repores->data_seek($i);
                    $book_branch = $repores->fetch_assoc()['current_branch'];
                    $repores->data_seek($i);
                    $book_repoid = $repores->fetch_assoc()['repo_id'];
                    echo"<tr><td>";
                    echo '书名：'.$book_name.'<br>';
                    echo '作者：'.$book_author.'<br>';
                    if ($book_state == 1) {
                        echo '状态：在馆<br>';
                        if ($book_branch == 1)
                        {
                            echo '所在分馆：张江分馆<br>';
                        }
                        else if ($book_branch == 2)
                        {
                            echo '所在分馆：枫林分馆<br>';
                        }
                        else if ($book_branch == 3)
                        {
                            echo '所在分馆：邯郸分馆<br>';
                        }
                        else if ($book_branch == 4)
                        {
                            echo '所在分馆：江湾分馆<br>';
                        }

                        echo "<form method='post' action='borrow.php'><span class='fieldname'></span><input type='hidden'  name='repoid' value='$book_repoid'><input type='hidden'  name='bid' value='$book_id'><input type='hidden'  name='uid' value='$user_id'><input type='submit' value='借阅'></form>";
                    }
                    else
                    {
                        echo '状态：出借<br>';
                    }
                    echo"</td></tr>";
                }
            }

        }
        echo"</tbody>";
        echo"</table>";
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