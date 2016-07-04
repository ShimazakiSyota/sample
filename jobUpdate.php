<html>
	<head>
		<meta http-equiv="REFRESH" content="2;URL=./kanri.php">
		<title>職業詳細更新</title>
	</head>
	<body>
		<h1>職業詳細更新情報更新</h1>

			<?php

			//session開始
			session_start(); 

			//DBマネージャーの読み込み
			require_once 'DBmanager.php'; 

			//データベース接続
			$con = connect(); 

			//セッションの確認
			sessionCheck($_SESSION['id'],$_SESSION['pass']);

			//職業詳細更新
			jobUpdate($_POST['jobID'],$_POST['jobInfo']);

				//タグの連携
				if(isset($_POST['kanrenTag'])){
					foreach( $_POST['kanrenTag'] as $value){
					tjrRelation($value,$_POST['jobID']);
					}
				}
				if(isset($_POST['RenkeiSchool'])){
					foreach( $_POST['RenkeiSchool'] as $value){
					jobSchoolRelationInsert($_POST['jobID'],$value);
					}
				}


	//画像の更新
	if (is_uploaded_file($_FILES["upfile"]["tmp_name"])) {
		if(($_POST['jobInfo']['5']) == 0){
		$fileID = picSet($_FILES['upfile']);
			jobFileIDUpdate($_POST['jobID'],$fileID);
		}else{
			picUpd($_FILES['upfile'],$_POST['jobInfo']['5']);
		}
	}
	
			echo "職業情報を更新しました";
			
			dconnect($con); //データベース切断

		?>
	</body>
</html>
