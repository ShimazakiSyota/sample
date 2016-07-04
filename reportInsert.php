<html>
	<head>
		<meta http-equiv="REFRESH" content="10000000000;URL=./jobTop.php">
		<title>職業追加</title>
	</head>
	<body>
			<?php

			session_start(); //session開始

			require_once 'DBmanager.php'; //DBマネージャーの読み込み
			$con = connect(); //データベース接続

			sessionCheck($_SESSION['id'],$_SESSION['pass']);//セッションの確認
			date_default_timezone_set('Asia/Tokyo');

		$jobid = $_POST['report'];
		$time = date("Y-m-d H:i:s");
		$KanriName = sessionName($_SESSION['id'],$_SESSION['pass']);
			//専門家詳細
			$work = reportInsert($_POST['report'],$_FILES['upfile4'],$time,$KanriName[0]);

			//専門家コメントの追加
			$xyz = workrpdateInsert($_POST['report2'],$_POST['report3'],$_FILES['upfile5'],$work);

		echo "コメントを追加しました";

		dconnect($con); //データベース切断
			?>
	</body>
</html>