<html>
	<head>
		<meta http-equiv="REFRESH" content="1;URL=./kanri.php">
		<title>タグ追加</title>
	</head>
	<body>
			<?php

			session_start(); //session開始

			require_once 'DBmanager.php'; //DBマネージャーの読み込み
			$con = connect(); //データベース接続

			sessionCheck($_SESSION['id'],$_SESSION['pass']);//セッションの確認

			//タグを追加する
			$tagID = tagInsert($_POST['tagZyoho']);
			if ($_POST['tagZyoho'][1] != 2) {
				if(isset($_POST['RenkeiTag'])){
					foreach( $_POST['RenkeiTag'] as $value ){
					trRelation($tagID,$value);
					}
				}
			}
			if ($_POST['tagZyoho'][1] != 0) {
				if(isset($_POST['RenkeiJob'])){
					foreach( $_POST['RenkeiJob'] as $value ){
					tjrRelation($tagID,$value);
					}
				}
			}
	//画像の更新
	if(isset($_FILES["upfile"])){
		if (is_uploaded_file($_FILES["upfile"]["tmp_name"])) {
		$fileID = picSet($_FILES['upfile']);
			tagFileIDUpdate($tagID,$fileID);
		}
	}
			echo $_POST['tagZyoho'][0]."タグを追加しました";
			
			dconnect($con); //データベース切断
			?>
	</body>
</html>
