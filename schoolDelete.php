<html>
	<head>
		<meta http-equiv="REFRESH" content="1;URL=./kanri.php">
		<title>タグ情報削除</title>
	</head>
	<body>
		<h1>タグ情報更新</h1>

			<?php

			session_start(); //session開始

			require_once 'DBmanager.php'; //DBマネージャーの読み込み
			$con = connect(); //データベース接続

			sessionCheck($_SESSION['id'],$_SESSION['pass']);//セッションの確認

			//選択されたタグを追加する
			//echo $_POST['tagID'];
			schoolDelete( $_POST['schoolID']);	

			echo "タグを削除しました";
			
			dconnect($con); //データベース切断

			?>
	</body>
</html>
