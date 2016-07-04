<html>
	<head>
		<div class="head">
		<title>管理者</title>
		<link href="kanristyle.css" rel="stylesheet" type="text/css">
	</head>
<body>
		<h1>学科情報変更</h1>
	<div align="right">
		<h3><a href='./kanri.php'>管理TOPページへ戻る</a><br></h3>
		<h3><a href='./schoolTop.php'>学校・学科TOPページへ戻る</a><br></h3>
		</div></div>

<?php

//session開始
session_start();

//DB読込
require_once 'DBmanager.php';

//DB接続
$con = connect();

//セッション確認
sessionCheck($_SESSION['id'],$_SESSION['pass']);
echo "<center>";
	echo "<h3>どの学科情報を変更するのか選択して下さい</h3>";
echo "</center>";
	$schoolAll = getDepartmentAll();
			echo "<form action='./departmentChange.php' method = 'POST'>";
				$selectedTagFrag = '0'; //最初のラジオボタン用のフラグ
				foreach($schoolAll as $data){
				if($selectedTagFrag =='0'){ 
				echo "<div class='left'><input type='radio' name='selected' value='".$data[0]."' checked='checked'>". $data[2] ."<br />";$selectedTagFrag ='1';}
				else  { echo "<input type='radio' name='selected' value='".$data[0]."'>". $data[2]."<br>";}
				}
echo "</div><br /><center><input type =submit value=選択></center>";
				echo "</form>";
 //データベース切断
dconnect($con);

?>
		
	</body>
</html>