<html>
	<head>
		<meta http-equiv="REFRESH" content="2;URL=./kanri.php">
		<title>学校情報追加</title>
	</head>
	<body>
			<?php

			session_start(); //session開始

			require_once 'DBmanager.php'; //DBマネージャーの読み込み
			$con = connect(); //データベース接続

			sessionCheck($_SESSION['id'],$_SESSION['pass']);//セッションの確認

			//職業を追加する
			$schoolID = departmentInsert($_POST['name'],$_POST['school'],$_POST['url']);
			
				if(isset($_POST['RenkeiJob'])){
					foreach( $_POST['RenkeiJob'] as $value ){
					jobSchoolRelationInsert($value,$schoolID);
					}
				}

			echo "「".$_POST['name']."」を追加しました";
			
			dconnect($con); //データベース切断
			?>
	</body>
</html>
