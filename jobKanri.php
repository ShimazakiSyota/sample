<html>
	<head>
		<title>管理者</title>
	</head>
	<body>
		<h1>職業情報変更</h1>
<?php

//session開始
session_start();

//DB読込
require_once 'DBmanager.php';

//DB接続
$con = connect();

//セッション確認
sessionCheck($_SESSION['id'],$_SESSION['pass']);



//変更
echo "<form action=jobChange.php method=post><br />";

	if ($_POST['jobChe'] == 0){

		while($data = mysql_fetch_array($queryset)){

		echo "<input type=hidden name=id value=" . $data["JOBID"] . ">";
		echo "<input type=radio name=job value=job>" . $data['JOBNAME'] ."<br />";
		}
			echo "<br /><input type=submit value=変更・削除>";

	}
echo "</form>";

echo "<form action=interview.php method=post>";

	if ($_POST['jobChe'] == 1){
		while($data = mysql_fetch_array($queryset)){

		echo "<input type=hidden name=id value=" . $data["JOBID"] . ">";
		echo "<input type=radio name=job value=inter>" . $data['JOBNAME'] ."<br />";
		}
			echo "<br /><input type=submit value=変更・削除>";
	}
echo"</form>";

echo "<form action=comment.php method=post>";

	if ($_POST['jobChe'] == 2){
		while($data = mysql_fetch_array($queryset)){

		echo "<input type=hidden name=id value=" . $data["JOBID"] . ">";
		echo "<input type=radio name=job value=senmon>" . $data['JOBNAME'] ."<br />";
		}
			echo "<br /><input type=submit value=変更・削除>";
	}
echo"</form>";

echo "<form action=report.php method=post>";

	if ($_POST['jobChe'] == 3){
		while($data = mysql_fetch_array($quryset)){

		echo "<input type=hidden name=id value=" . $data["JOBID"] . ">";
		echo "<input type=radio name=job value=repo>" . $data['JOBNAME'] ."<br />";
		}
			echo "<br /><input type=submit value=変更・削除>";
	}
echo"</form>";

 //データベース切断
dconnect($con);
?>


	</body>
</html>