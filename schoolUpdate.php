<html>
	<head>
		<meta http-equiv="REFRESH" content="2;URL=./kanri.php">
		<title>職業情報更新</title>
	</head>
	<body>
		<h1>タグ情報更新</h1>

			<?php

			//session開始
			session_start(); 

			//DBマネージャーの読み込み
			require_once 'DBmanager.php'; 

			//データベース接続
			$con = connect(); 

			//セッションの確認
			sessionCheck($_SESSION['id'],$_SESSION['pass']);

			schoolUpdate($_POST['schoolInfo']);

				if(isset($_POST['Renkei'])){
					foreach( $_POST['Renkei'] as $value){
					SchoolRelationUpdate($value,$_POST['schoolInfo'][0]);
					}
				}
			echo "職業情報を更新しました";
			
			dconnect($con); //データベース切断

		?>
	</body>
</html>
