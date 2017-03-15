<?php
/**
 * Created by PhpStorm.
 * User: xulu
 * Date: 2016/5/13
 * Time: 15:20
 */
require_once 'header.php';

if (!$loggedin) die("请登录再操作");

echo "<div class='main'><h1>注册书籍</h1>";
echo "<hr size = '3px' align='left' />";

$error = $title = $isbn = $writer = $publisher = $writer = $booklevel = $publisherid= "";

if (isset($_POST['title']))
{
    $title = sanitizeString($_POST['title']);
    $isbn = sanitizeString($_POST['isbn']);
    $writer = sanitizeString($_POST['writer']);
    $publisher = sanitizeString($_POST['publisher']);
    $price = sanitizeString($_POST['price']);

    if ($title == "" || $isbn == "" || $writer=="" || $publisher =="" || $price == "")
        $error = "未完全填写信息<br>";
    else
    {
        $result = queryMySQL("SELECT isbn FROM book WHERE isbn='$isbn' ");
        if ($result->num_rows)
        {
            $error = "<span class='error'>本书目已存在</span><br><br>";
        }
        else
        {
            $result = queryMysql("SELECT * FROM publisher WHERE name = '$publisher'");
            if($result->num_rows)
            {
                $result->data_seek(0);
                $publisherid = $result->fetch_assoc()['publisher_id'];
            }
            else
            {
                queryMysql("INSERT INTO publisher VALUES(null,'$publisher')");
                $result = queryMysql("SELECT * FROM publisher WHERE name = '$publisher'");
                $publisherid = $result->fetch_assoc()['publisher_id'];
            }


            queryMysql("INSERT INTO book VALUES(null,'$title', '$isbn','$writer','$publisherid','$price','1')");
            echo "<script>".
                "swal({   title: \"添加成功!\",   text: \"新书目添加成功\",   type: \"success\",   confirmButtonText: \"OK\" });".
                "</script>";
            die("<h4>书目添加成功！</h4>点击<a href='addbook.php'>继续添加</a><br><br>");
        }
    }
}


echo <<<_END
<form method='post' action='addbook.php'>$error
<div class="form-group">
<label>书名</label>
<input type="text" class="form-control" name='title'  placeholder="书名">
</div>
<div class="form-group">
<label>isbn号</label>
<input type="text" class="form-control" name='isbn'  placeholder="ISBN号">
</div>
<div class="form-group">
<label>作者</label>
<input type="text" class="form-control" name='writer'  placeholder="作者">
</div>
<div class="form-group">
<label>出版社</label>
<input type="text" class="form-control" name='publisher'  placeholder="出版社">
</div>
<div class="form-group">
<label>价格</label>
<input type="text" class="form-control" name='price'  placeholder="价格">
</div>


_END;
?>

<input type='submit' class="btn btn-default"  value='注册书目'>
</form>


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