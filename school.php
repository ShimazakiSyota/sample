
	<head>
		<title>管理者</title>
	</head>
	<body>
		<h1>職業追加</h1>

<?php
	
	session_start(); //session開始

	require_once 'DBmanager.php'; //DB読込
	$con = connect(); //DB接続

	sessionCheck($_SESSION['id'],$_SESSION['pass']);//セッションの確認

	$jobName = joblist($_POST['selectedJob']);

	echo "<form action='./commentInsert.php' method='post'><br />";

	if($_POST['school'] == 1) {
		echo "<H2>職業名 :".$jobName[1]."</H2>";
		echo "<H3>学生インタビュー :<br />".$_POST['report']."</H3>";
		echo "<input type='hidden' name='report' value='".$_POST['report']."'>";
	}

	if($_POST['school'] == 2) {
		echo "<H2>職業名 :".$jobName[1]."</H2>";
		echo "<H3>専門家のコメント :<br />".$_POST['report']."</H3>";
		echo "<input type='hidden' name='report' value='".$_POST['report']."'>";
	}

	if($_POST['school'] == 3) {
		echo "<H2>職業名 :".$jobName[1]."</H2>";
		echo "<H3>レポート :<br />".$_POST['report']."</H3>";
		echo "<input type='hidden' name='report' value='".$_POST['report']."'>";
	}

		echo "<input type='hidden' name='school' value='".$_POST['school']."'>";
		echo "<input type='hidden' name='jobid' value='".$jobName[0]."'>";


		echo "<br /><input type =submit value=追加>";
		echo "</form>";

	//データベース切断
	dconnect($con);

?>
	</body>
</html>