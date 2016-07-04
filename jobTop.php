<html>	
	<head>
		<div class="head">
		<title>職業管理TOP画面</title>
		<link href="kanristyle.css" rel="stylesheet" type="text/css">
	</head>
<body>
		<h1>職業管理TOP画面</h1>
	<div align="right">
		<h3><a href='./kanri.php'>管理TOPページへ戻る</a><br></h3>
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

//DB切断
dconnect($con);

?>

<center>
<h2>管理(変更・削除)を行う職業を選択してください。</h2>

	<form action="./jobSelect.php" method="POST">
			<button type='submit' name='KanriJobType' value="0"><H1>職業詳細</H1></button><br /><br />
			<button type='submit' name='KanriJobType' value="1"><H1>学生インタビュー</H1></button><br /><br />
			<button type='submit' name='KanriJobType' value="2"><H1>専門家のコメント</H1></button><br /><br />
			<button type='submit' name='KanriJobType' value="3"><H1>レポート</H1></button><br /><br />
		</form><br>

		<form action="./jobMake.php" method="POST">
		<button type='submit'><H1>職業追加</H1></button>
		</form>
</center>
	</body>
</html>
