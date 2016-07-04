<html>
	<head>
		<div class="head">
		<title>管理者</title>
			<link href="kanristyle.css" rel="stylesheet" type="text/css">
	</head>
<body>
		<h1>職業情報変更</h1>
	<div align="right">
		<h3><a href='./kanri.php'>管理TOPページへ戻る</a><br></h3>
		<h3><a href='./schoolTop.php'>学校・学科TOPページへ戻る</a><br></h3>
		</div></div>

<script type="text/javascript">
//ポップアップのソース
function disp(){
	// 「OK」時の処理開始 ＋ 確認ダイアログの表示
        var flag = confirm ( "本当に削除してもよろしいですか？");
        /* send_flg が TRUEなら送信、FALSEなら送信しない */
        return flag;
}
function disp2(){
	// 「OK」時の処理開始 ＋ 確認ダイアログの表示
        var flag = confirm ( "この内容で更新してよろしいですか？");
        /* send_flg が TRUEなら送信、FALSEなら送信しない */
        return flag;
}
</script>

<?php

//session開始
session_start();

//DB読込
require_once 'DBmanager.php';

//DB接続
$con = connect();

//セッション確認
sessionCheck($_SESSION['id'],$_SESSION['pass']);
$school = getSchool($_POST['selected']);

//学校名表示
echo "<center><H2>学校名：".$school['1']."</H2>";
	echo "<form action='./schoolDelete.php' method='POST' onsubmit='return disp()'>";
	echo "<button class='del' type='submit' name='schoolID' value='".$school[0]."'>この学校タグを削除する</button></center>";
	echo "</form>";

		echo "<form action=schoolUpdate.php method =POST onsubmit='return disp2()'>";
		echo "<input type='hidden' NAME=schoolInfo[] value='".$_POST['selected']."'>";
		echo "<div class='left'>学校名 : <INPUT TYPE=TEXT NAME=schoolInfo[] value = '".$school['1']."'><br /><br />";

				$selectedTagFrag = '0'; //最初のラジオボタン用のフラグ
		for($i=0;$i<2;$i++){
			if(0 == $school[2]){
				if($selectedTagFrag == 0){ 
				echo "<input type='radio' name='schoolInfo[]' value='0' checked='checked'>麻生<br />";
				$selectedTagFrag ='1';
				}else{
				echo "<input type='radio' name='schoolInfo[]' value='1'>その他<br/>";
				break;
				}
			}else if(1 == $school[2]){
				if($selectedTagFrag == 0){ 
				echo "<input type='radio' name='schoolInfo[]' value='0' >麻生<br />";
				$selectedTagFrag ='1';
				}else{
				echo "<input type='radio' name='schoolInfo[]' value='1' checked='checked'>その他<br/>";
				break;
				}
			}
		}
		echo"</div>";



					echo "<div class='left'><H4>関連する学科を選択してください</H4>";
					$SchoolAll = getDepartmentAll();
					//１ループでタグ1つがチェックボックス形式で表示され、データが無くなるとループを抜けます。
					foreach($SchoolAll as $data){
						if($data[1]==$_POST['selected']){
						echo "<input name='Renkei[]' type='checkbox' value='".$data[0]."' checked='checked'>". $data[2]."<br>";
						}else{
						echo "<input name='Renkei[]' type='checkbox' value='".$data[0]."'>". $data[2]."<br>";
						}
					}
		echo "<br /></div><center><input type =submit value=追加>";
		echo "</form>";

 //データベース切断
dconnect($con);

?>
		</center>
	</body>
</html>