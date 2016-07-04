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

			//職業を追加する
			$jobID = jobInsert($_POST['jobInfo']);
			
				if(isset($_POST['RenkeiTag'])){
					foreach( $_POST['RenkeiTag'] as $value ){
					tjrRelation($value,$jobID);
					}
				}
			
			
			echo $_POST['jobInfo'][0]."職業を追加しました";
			
			dconnect($con); //データベース切断
			?>
	</body>
</html>
