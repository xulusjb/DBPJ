<?php
require_once 'header.php';
	require_once "emailclass.php";
	$smtpserver = "smtp.126.com";
	$smtpserverport =25;
	$smtpusermail = "fdulib@126.com";
	$smtpemailto = $_POST['toemail'];
	$smtpuser = "fdulib";
	$smtppass = "xulu960805";
	$mailtitle = $_POST['title'];
	$mailcontent = "<h1>".$_POST['content']."</h1>";
	$mailtype = "HTML";
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);
	$smtp->debug = false;
	$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);


	if($state==""){
		echo "发送失败";
		echo "<a href='index.php'>点此返回</a>";
		exit();
	}

	echo "<script>".
		"swal({   title: \"成功!\",   text: \"催还邮件已发送!\",   type: \"success\",   confirmButtonText: \"Cool\" });".
		"</script>";


	echo "<a class='main'  href='index.php'>点此返回首页</a>";


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

