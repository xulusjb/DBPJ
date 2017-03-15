<?php
/**
 * Created by PhpStorm.
 * User: xulu
 * Date: 2016/6/11
 * Time: 12:56
 */

require_once 'header.php';
if (!$loggedin) die("请登录再操作");

$result = queryMySQL("SELECT count(book_id) as book_num,book_id FROM borrow  group by book_id order by book_num desc");

$title = array();
$num = array();

for ($n=0;$n<5; $n++)
{
    $result->data_seek($n);
    $book_id = $result->fetch_assoc()['book_id'];
    $result->data_seek($n);
    $num[] = intval($result->fetch_assoc()['book_num']);
    $result2 = queryMySQL("SELECT * FROM book  where book_id = '$book_id'");
    $result2->data_seek($n);
    $title[] = $result2->fetch_assoc()['title'];
}



echo <<<_END
<div id= "graphwraper"><div id="graph">Loading graph...</div></div>

<script type="text/javascript">
	var myData = new Array(['$title[0]', $num[0]], ['$title[1]', $num[1]], ['$title[2]', $num[2]], ['$title[3]', $num[3]], ['$title[4]', $num[4]]);
	var colors = ['#2D6B96', '#327AAD', '#3E90C9', '#55A7E3', '#60B6F0'];
	var myChart = new JSChart('graph', 'bar');
	myChart.setDataArray(myData);
	myChart.colorizeBars(colors);
	myChart.setTitle('最受喜爱的图书');
	myChart.setTitleColor('#8E8E8E');
	myChart.setAxisNameX('');
	myChart.setAxisNameY('借书次数');
	myChart.setAxisColor('#C4C4C4');
    myChart.setAxisNameFontSize(20);
	myChart.setAxisNameColor('#999');
	myChart.setAxisValuesColor('#777');
	myChart.setAxisColor('#B5B5B5');
	myChart.setAxisWidth(1);
	myChart.setBarOpacity(1);
	myChart.setAxisPaddingTop(60);
	myChart.setAxisPaddingBottom(40);
	myChart.setAxisPaddingLeft(45);
	myChart.setTitleFontSize(11);
	myChart.setBarBorderWidth(0);
	myChart.setBarSpacingRatio(50);
	myChart.setBarOpacity(1);
	myChart.setSize(616, 321);
	myChart.setBackgroundImage('chart_bg.jpg');
	myChart.draw();
</script>
_END;
echo "<center><h3>注：根据历史记录显示借阅次数最多的五本图书</h3></center><br>";


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