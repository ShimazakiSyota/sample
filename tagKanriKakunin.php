<html>
	<head>
		<div class="head">
		<title>タグ情報変更</title>
			<link href="kanristyle.css" rel="stylesheet" type="text/css">
	</head>
<body>
		<h1>タグ情報変更</h1>
	<div align="right">
		<h3><a href='./kanri.php'>管理TOPページへ戻る</a><br></h3>
		<h3><a href='./tagTop.php'>タグTOPページへ戻る</a><br></h3>
		</div></div>

<center>
			<?php

			session_start(); //session開始

			require_once 'DBmanager.php'; //DBマネージャーの読み込み
			$con = connect(); //データベース接続

			sessionCheck($_SESSION['id'],$_SESSION['pass']);//セッションの確認
			echo "<H2>タグ名：".$_POST['tagName']."</H2>";//タグ名表示
			echo "<H2>タグ区分：";
				if($_POST['tagKubun']==0){echo "大分類タグ";}
		   else if($_POST['tagKubun']==1){echo "中分類タグ";}
				else					 {echo "感覚タグ";}
				echo "</H2>";//タグ区分表示

			echo "<form action='./tagUpdate.php' method = 'POST'>";
			
			//選択されたタグの表示
			if ($_POST['tagKubun'] != 2) {
				if(isset($_POST['kanrenTag'])){
				echo "<H3>連携タグ</H3>" ;
					foreach( $_POST['kanrenTag'] as $value ){
					echo "<input type='hidden' name='kanrenTag[]' value='".$value."'>";
					echo "・".tagCheck($value)[1]."<br>" ;
					}
				}else{
				echo "<H3>連携タグはありません</H3>" ;
				}
			}
			//選択された職業の表示
			if ($_POST['tagKubun'] != 0) {
				if(isset($_POST['kanrenJob'])){
				echo "<H3>連携職業</H3>" ;
					foreach( $_POST['kanrenJob'] as $value ){
					echo "<input type='hidden' name='kanrenJob[]' value='".$value."'>";
					echo "・".joblist($value)[1]."<br>" ;
					}
				}else{
				echo "<H3>連携職業はありません</H3>" ;
				}
			}

				echo "<input type='hidden' name='tagZyoho[]' value='".$_POST['tagID']."'>";
				echo "<input type='hidden' name='tagZyoho[]' value='".$_POST['tagName']."'>";
				echo "<input type='hidden' name='tagZyoho[]' value='".$_POST['tagKubun']."'>";
				
				echo "<br><input type='submit' value='変更'/>";
				echo "</form>";
			
			dconnect($con); //データベース切断

			?>
		</center>
	</body>
</html>
