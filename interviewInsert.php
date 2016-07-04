<html>
	<head>
		<meta http-equiv="REFRESH" content="2;URL=./jobTop.php">
		<title>職業追加</title>
	</head>
	<body>
			<?php

			session_start(); //session開始

			require_once 'DBmanager.php'; //DBマネージャーの読み込み
			$con = connect(); //データベース接続

			sessionCheck($_SESSION['id'],$_SESSION['pass']);//セッションの確認
			date_default_timezone_set('Asia/Tokyo');

		$jobid = $_POST['interview'];
		$time = date("Y-m-d H:i:s");
		$KanriName = sessionName($_SESSION['id'],$_SESSION['pass']);
			//学生インタビュー詳細
			$interview = interviewInsert($_POST['interview'],$_FILES['upfile'],$time,$KanriName[0]);

			//インタビュートの追加
			$xyz = studentviewInsert($_POST['interview2'],$_POST['interview3'],$_FILES['upfile1'],$interview);
		echo "コメントを追加しました";

		dconnect($con); //データベース切断
			?>
	</body>
</html>