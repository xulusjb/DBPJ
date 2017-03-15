<?php
/**
 * Created by PhpStorm.
 * User: xulu
 * Date: 2016/6/5
 * Time: 12:26
 */
require_once 'header.php';
if (!$loggedin) die("请登录再操作");

echo "<div class='main'><h1>XML导入</h1>";

echo "<hr size = '3px' align='left' />";
$error = $file = "";

if (isset($_POST['file']))
{
    $file = $_POST['file'];

    $xml = simplexml_load_file($file);

    foreach ( ($xml->RECORD) as $record)
    {
        queryMysql("INSERT INTO book VALUES(null,'$record->title','$record->isbn','$record->author','$record->publisher_id','$record->price','$record->booklevel')");

    }
    echo "<script>".
        "swal({   title: \"导入成功!\",   text: \"XML导入成功！\",   type: \"success\",   confirmButtonText: \"NICE!\" });".
        "</script>";
    die("<h4>书目添加成功！</h4>");
}

echo <<<_END
<form method='post' action='XMLimport.php'>$error

<div class="form-group">
<label>请选择需要导入的xml文件:</label>
<input type="file" name='file'  >
</div>
_END;
?>


<input type='submit' class="btn btn-default" value='导入'>
</form></div>
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