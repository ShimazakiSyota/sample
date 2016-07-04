<html>
	<head>
		
		<title>職業追加確認</title>
	</head>
	<body>
		<h1>職業追加確認</h1>

		<?php
		//session開始
		session_start();

		//DBマネージャーの読み込み
		require_once 'DBmanager.php';

		//データベース接続
		$con = connect();

		//セッションの確認
		sessionCheck($_SESSION['id'],$_SESSION['pass']);

		//追加する職業詳細の表示
		echo "<H2>職業名：".$_POST['jobName']."</H2>";//職業名表示
		echo "<H2>職業名【ふりがな】：".$_POST['jobJpn']."</H2>";//職業名【ふりがな】表示
		echo "<H2>職業名【英語】：".$_POST['jobEng']."</H2>";//職業名【英語】表示
		echo "<H2>一行キャッチコピー：".$_POST['jobCc']."</H2>";//>一行キャッチコピー表示
		echo "<H2>紹介文：".$_POST['jobIntro']."</H2>";//紹介文表示
		echo "<H2>写真のパス：".$_POST['']."</H2>";//写真のパス表示
		echo "<H2>写真のパス2：".$_POST['']."</H2>";//写真のパス2表示

		//タグ区分表示
		echo "<form action='./jobInsert.php' method = 'POST'>";

		if($_POST['RenkeiTag'] == '0'){
			echo "<H3>連携させたい中分類タグを選択してください</H3>";
					$tagAll = tagSelectAllKubun("1");	//指定された区分のタグ全てを取得
					//１ループでタグ1つがチェックボックス形式で表示され、データが無くなるとループを抜けます。
					foreach($tagAll as $data){
					echo "<input name='Renkei[]' type='checkbox' value='".$data[0]."'>". $data[1]."<br>";
					}
				}

		if($_POST['RenkeiTag'] == '1'){
			echo "<H3>連携させたい感覚タグを選択してください</H3>";
					$tagAll = tagSelectAllKubun("2");	//指定された区分のタグ全てを取得
					//１ループでタグ1つがチェックボックス形式で表示され、データが無くなるとループを抜けます。
					foreach($tagAll as $data){
					echo "<input name='Renkei[]' type='checkbox' value='".$data[0]."'>". $data[1]."<br>";
					}
				}


		echo "<input type='hidden' name='JOBNAME' value='".$_POST['jobName']."'>";
		echo "<input type='hidden' name='JOBJPN' value='".$_POST['jobJpn']."'>";
		echo "<input type='hidden' name='JOBENG' value='".$_POST['jobEng']."'>";
		echo "<input type='hidden' name='JOBCC' value='".$_POST['jobCc']."'>";
		echo "<input type='hidden' name='JOBINTRO' value='".$_POST['jobIntro']."'>";
		echo "<input type='hidden' name='tagKubun' value='".$_POST['RenkeiTag']."'>";
		


		echo "<input type='submit' value='追加'/>";
		echo "</form>";


		dconnect($con); //データベース切断

			?>
	</body>
</html>
