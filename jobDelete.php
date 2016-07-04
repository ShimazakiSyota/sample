<html>
	<head>
		<meta http-equiv="REFRESH" content="2;URL=./jobTop.php">
		<title>管理者</title>
	</head>
	<body>
		<h1>管理情報更新</h1>

			<?php

			session_start(); //session開始

			require_once 'DBmanager.php'; //DBマネージャーの読み込み
			$con = connect(); //データベース接続

			sessionCheck($_SESSION['id'],$_SESSION['pass']);//セッションの確認

			//選択されたタグを追加する
			//echo $_POST['jobID'];
			jDelete( $_POST['jobID']);	

			echo "職業を削除しました";
			
			dconnect($con); //データベース切断

			?>
	</body>
</html>
