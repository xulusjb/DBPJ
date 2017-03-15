<?php
/**
 * Created by PhpStorm.
 * User: xulu
 * Date: 2016/6/11
 * Time: 2:39
 */
require_once 'header.php';

if (!$loggedin) die("请登录再操作");

echo "<div class='main'><h1>书籍入库</h1>";
echo "<hr size = '3px' align='left' />";
$error = $book =$branch=$num= '';
echo <<<_END
<form method='post' action='registerbook.php'>$error
    <div class="form-group">
    <label>搜索要入库的书籍</label>
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
        $error = "<span class='error'>无搜索结果，请换一个搜索词试试</span><br><br>";
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
            $result->data_seek($j);
            $book_isbn = $result->fetch_assoc()['isbn'];
            echo"<tr><td>";
            echo '书名：'.$book_name.'<br>';
            echo '作者：'.$book_author.'<br>';
            echo 'ISBN：'.$book_isbn.'<br>';

            $one = 1;
            $two = 2;
            $three = 3;
            $four = 4;


            echo "<form method='post' action='register.php'><span class='fieldname'></span><input type='hidden'  name='bookid' value='$book_id'>";

            echo "<label for='ZJ'>张江分馆</label><input type='radio' name='branch' value =1>"."<br>";
            echo "<label for='FL'>枫林分馆</label><input type='radio' name='branch' value =2>"."<br>";
            echo "<label for='HD'>邯郸分馆</label><input type='radio' name='branch' value =3>"."<br>";
            echo "<label for='JW'>江湾分馆</label><input type='radio' name='branch' value =4>"."<br>";
            echo "<span class='fieldname' align=“left”>数量</span><input type='text' maxlength='5' width='30px' name='num' value='$num'><input type='submit' class=\"btn btn-danger\" value='登记'></form>"."<br>";

            echo"</td></tr>";
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
