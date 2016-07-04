<html>
	<head>
		<div class="head">
		<title>タグ追加確認</title>
			<link href="kanristyle.css" rel="stylesheet" type="text/css">
	</head>
<body>
		<h1>タグ追加確認</h1>
	<div align="right">
		<h3><a href='./kanri.php'>管理TOPページへ戻る</a><br></h3>
		<h3><a href='./tagTop.php'>タグTOPページへ戻る</a><br></h3>
		</div></div>

			<?php

			session_start(); //session開始

			require_once 'DBmanager.php'; //DBマネージャーの読み込み
			$con = connect(); //データベース接続

			sessionCheck($_SESSION['id'],$_SESSION['pass']);//セッションの確認
			
			echo "<center><H2>タグ名：".$_POST['tagName']."</H2>";//タグ名表示
			echo "<H2>タグ区分：";
				if($_POST['tagKubun']==0){echo "大分類タグ";}
		   else if($_POST['tagKubun']==1){echo "中分類タグ";}
				else					 {echo "感覚タグ";}
				echo "</H2></center>";//タグ区分表示
			echo "<form action='./tagInsert.php' method = 'POST'>";
			//選択されたタグの表示
			if ($_POST['tagKubun'] != 2) {
				if(isset($_POST['RenkeiTag'])){
				echo "<div class='left'><H3>連携タグ</H3>" ;
					foreach( $_POST['RenkeiTag'] as $value ){
					echo "<input type='hidden' name='RenkeiTag[]' value='".$value."'>";
					echo tagCheck($value)[1]."<br>" ;
					}
				}else{
				echo "<H3>連携タグはありません</H3></div>" ;
				}
			}
			//選択された職業の表示
			if ($_POST['tagKubun'] != 0) {
				if(isset($_POST['RenkeiJob'])){
				echo "<H3>連携職業</H3>" ;
					foreach( $_POST['RenkeiJob'] as $value ){
					echo "<input type='hidden' name='RenkeiJob[]' value='".$value."'>";
					echo joblist($value)[1]."<br>" ;
					}
				}else{
				echo "<H3>連携職業はありません</H3>" ;
				}
			}
				echo "<input type='hidden' name='tagZyoho[]' value='".$_POST['tagName']."'>";
				echo "<input type='hidden' name='tagZyoho[]' value='".$_POST['tagKubun']."'>";
				echo "<br /><input type='submit' value='追加'/>";
				echo "</form>";
			
			dconnect($con); //データベース切断

			?>
		
	</body>
</html>
