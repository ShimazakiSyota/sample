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

	echo "<form action='./commentUpdate.php' method = 'POST'>";



		echo "<H2>職業名: ".$_POST['jobName']."</H2>";//職業名表示
		echo "<H3>学生インタビュー<br />".$_POST['report']."</H3>";

		echo "<input type='hidden' name='comment' value='".$_POST['report']."'>";
		echo "<input type='hidden' name='KanriJobType' value='".$_POST['KanriJobType']."'>";
		echo "<input type='hidden' name='commentID' value='".$_POST['commentID']."'>";




		echo "<br><input type='submit' value='変更'/>";
		echo "</form>";
			
			 dconnect($con); //データベース切断

		?>
	</body>
</html>
