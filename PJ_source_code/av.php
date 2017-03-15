<?php
/**
 * Created by PhpStorm.
 * User: xulu
 * Date: 2016/9/14
 * Time: 1:52
 */
echo <<<_HEAD
<!DOCTYPE html>
<html lang='zh-CN'>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>下载中</title>
</head>
<body>
_HEAD;


if (isset($_POST['link']))
{
    echo("<center><p>下载中......</p></center>");
    $link = $_POST['link'];
    $exec = 'youtube-dl -o av.mp4 ';
    $cmd = "$exec"."$link";
    //$output = shell_exec('rm -rf av.mp4');
    $output1 = shell_exec('ls');
    //$output = shell_exec('whoami');
    $output2 =shell_exec('$cmd');
    $output3 = shell_exec('ls');
    //header("location:http://www.xulucjt.com/av.mp4");
echo <<<SUCCESS_END
    <a href='av.mp4'>点此直接看视频</a>
    "$cmd"
    <br>
    "$output1"
    <br>
    "$output2"
    <br>
    "$output3"
    </body>
    </html>
SUCCESS_END;

}
else {
echo <<<_END
    <form method='post' action='av.php'>
    <input type="text" name='link'  placeholder="请输入视频网址">
    <input type='submit'>
    </form>
    <p>请等待下载完成，每1分钟的视频需要2秒时间下载</p>
    </body>
_END;
}
?>
