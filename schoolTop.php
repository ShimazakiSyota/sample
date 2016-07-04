<HTML>
<HEAD>
<div class="head">
<TITLE>学校・学科情報管理TOP画面</TITLE>
<link href="kanristyle.css" rel="stylesheet" type="text/css">
</HEAD>

<BODY>

<h1>学校・学科情報管理TOP画面</h1>
<div align="right">
<h3><a href='./kanri.php'>管理TOPページへ戻る</a><br></h3>	
</div></div>



			<?php
			session_start(); //session開始

			require_once 'DBmanager.php'; //DBマネージャーの読み込み
			$con = connect(); //データベース接続

			sessionCheck($_SESSION['id'],$_SESSION['pass']);//セッションの確認
			dconnect($con); //データベース切断

			?>

<br><br><br><center>
<h1>変更</h1>
<form action="./schoolChangeSelect.php" method="POST">
	<button type='submit'><H1>学校・情報変更ページ</H1></button><br /><br /></form>

<form action="./departmentChangeSelect.php" method="POST">
	<button type='submit'><H1>学科・情報変更ページ</H1></button><br /><br /></form>

<h1>登録</h1>
<form action="./schoolMake.php" method="POST">
	<button type='submit'><H1>学校・情報登録ページ</H1></button><br /><br /></form>

<form action="./departmentMake.php" method="POST">
	<button type='submit'><H1>学科・情報登録ページ</H1></button><br /><br /></form>

</h1></center>

</BODY>
</HTML>