<html>
	<head>
		<title>管理者</title>
	</head>
	<body>
		<h1>職業情報変更</h1>

			<?php

			session_start(); //session開始

			require_once 'DBmanager.php'; //DBマネージャーの読み込み
			$con = connect(); //データベース接続

			sessionCheck($_SESSION['id'],$_SESSION['pass']);//セッションの確認

			echo "<H2>職業名: ".$_POST['jobName']."</H2>";//職業名表示
			echo "<H2>職業名【ふりがな】: ".$_POST['jobJpn']."</H2>";//職業名【ふりがな】表示
			echo "<H2>職業名【英語】: ".$_POST['jobEng']."</H2>";//職業名【英語】表示
			echo "<H2>一行キャッチコピー: ".$_POST['jobCc']."</H2>";//一行キャッチコピー表示
			echo "<H2>紹介文: ".$_POST['jobIntro']."</H2>";//紹介文表示

	echo "<form action='./jobUpdate.php' method = 'POST'>";

		//選択されたタグの表示
			if(isset($_POST['kanrenTag'])){
			echo "<H3>連携タグ</H3>" ;
				foreach( $_POST['kanrenTag'] as $value ){
				echo "<input type='hidden' name='kanrenTag[]' value='".$value."'>";
				echo "・".tagCheck($value)[1]."<br>" ;
				}
			}else{
			echo "<H3>連携タグはありません</H3>" ;
			}

		echo "<input type='hidden' name='jobInfo[]' value='".$_POST['jobID']."'>";
		echo "<input type='hidden' name='jobInfo[]' value='".$_POST['jobName']."'>";
		echo "<input type='hidden' name='jobInfo[]' value='".$_POST['jobJpn']."'>";
		echo "<input type='hidden' name='jobInfo[]' value='".$_POST['jobEng']."'>";
		echo "<input type='hidden' name='jobInfo[]' value='".$_POST['jobCc']."'>";
		echo "<input type='hidden' name='jobInfo[]' value='".$_POST['jobIntro']."'>";
		
		echo "<br><input type='submit' value='変更'/>";
		echo "</form>";
			
			 dconnect($con); //データベース切断

		?>
	</body>
</html>
