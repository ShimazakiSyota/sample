<html>
	<head>
		<meta http-equiv="REFRESH" content="100;URL=./jobTop.php">
		<title>職業追加</title>
	</head>
	<body>
			<?php

			session_start(); //session開始

			require_once 'DBmanager.php'; //DBマネージャーの読み込み
			$con = connect(); //データベース接続

			sessionCheck($_SESSION['id'],$_SESSION['pass']);//セッションの確認

			//インタビュー・コメント・レポートの追加
			$interview = comentInsert($_POST['school'],$_POST['report'],$_POST['selectedJob'],$_FILES['upfile']);

		echo "コメントを追加しました";

		dconnect($con); //データベース切断
			?>
	</body>
</html>