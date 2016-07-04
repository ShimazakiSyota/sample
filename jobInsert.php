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

			//職業を追加する
			$jobID = jobInsert($_POST['jobInfo'],$_FILES['upfile']);
				if(isset($_POST['Renkei'])){
					foreach( $_POST['Renkei'] as $value ){
					tjrRelation($value,$jobID);
					}
				}

				if(isset($_POST['RenkeiSchool'])){
					foreach( $_POST['RenkeiSchool'] as $value ){
					jobSchoolRelationInsert($jobID,$value);
					}
				}

			echo "「".$_POST['jobInfo'][0]."」を追加しました";
			
			dconnect($con); //データベース切断
			?>
	</body>
</html>
