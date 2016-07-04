<html>
	<head>
		<div class="head">
		<title>職業追加</title>
		<link href="kanristyle.css" rel="stylesheet" type="text/css">
	</head>
<body>
		<h1>追加したい項目を選択してください。</h1>
	<div align="right">
		<h3><a href='./kanri.php'>管理TOPページへ戻る</a><br></h3>
		<h3><a href='./jobTop.php'>職業TOPページへ戻る</a><br></h3>
		</div></div>

<?php
	
	session_start(); //session開始

	require_once 'DBmanager.php'; //DB読込
	$con = connect(); //DB接続
	dconnect($con); //データベース切断

	
?>
	<center>
		<form action="./jobMake2.php" method="post">
			<button type='submit' name='jobUpd' value="0"><h1>職業詳細追加<h1></button><br /><br /></form>
		<form action="./jobSelect2.php" method="post">			
			<button type='submit' name='jobUpd' value="1"><h1>学生インタビュー追加</h1></button><br /><br />
			<button type='submit' name='jobUpd' value="2"><h1>専門家のコメント追加</h1></button><br /><br />
			<button type='submit' name='jobUpd' value="3"><h1>レポート追加</h1></button><br /><br />
		</form>

	</center>

	</body>
</html>
