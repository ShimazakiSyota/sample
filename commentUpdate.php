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

			//コメント変更用情報の更新
			$comment = comentUpdate($_POST['KanriJobType'],$_POST['report'],$_POST['commentID']);

	//画像ファイルの更新
	if (is_uploaded_file($_FILES["upfile"]["tmp_name"])) {
			picUpd($_FILES['upfile'],$_POST['picID']);
	}
		echo "コメントを更新しました";

		dconnect($con); //データベース切断
			?>
	</body>
</html>