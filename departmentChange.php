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
$school = getDepartment($_POST['selected']);

//学科名表示
echo "<center><H2>学科名：".$school[2]."</H2>";
	echo "<form action='./departmentDelete.php' method='POST' onsubmit='return disp()'>";
	echo "<button class='del' type='submit' name='departmentID' value='".$school[0]."'>この学科タグを削除する</button></center>";
	echo "</form><br>";

		echo "<form action=departmentUpdate.php method =POST onsubmit='return disp2()'>";
		echo "<input type='hidden' NAME=schoolInfo[] value='".$_POST['selected']."'>";
		echo "<div class='left'>学科名 : <INPUT TYPE=TEXT NAME=schoolInfo[] value = '".$school['2']."'><br /><br />";
		echo "URL : <INPUT TYPE=TEXT NAME=schoolInfo[] value = '".$school['3']."'><br /><br />";
					echo "<H4>この学科の属する学校を選択してください</H4>";
					$SchoolAll = getSchoolAll();
					//１ループでタグ1つがチェックボックス形式で表示され、データが無くなるとループを抜けます。

					foreach($SchoolAll as $data){
if($data[0] == $school[1]){ echo "<input type='radio' name='schoolInfo[]' value='".$data[0]."' checked='checked'>". $data[1]."<br>"; }
					else  { echo "<input type='radio' name='schoolInfo[]' value='".$data[0]."'>". $data[1]."<br>";}
					}
					
					echo "<H4>関連する職業を選択してください</H4>";
					$jobAll = jobAll();	//全ての職業を取得
					$getDepartmentJobID = getDepartmentJobID($_POST['selected']);
					//１ループでタグ1つがチェックボックス形式で表示され、データが無くなるとループを抜けます。
					foreach($jobAll as $data){
						$renkeiFlag=0;//連携しているか確認するフラグ
							foreach($getDepartmentJobID as $renkei){
							if ($data[0]==$renkei[0]){$renkeiFlag=1;}
							}
				if ($renkeiFlag==1){//既に連携している場合
					echo "<input name='Renkei[]' type='checkbox' value='".$data[0]."'checked='checked'>". $data[1];
				}else{//連携をしていない場合
					echo "<input name='Renkei[]' type='checkbox' value='".$data[0]."'>". $data[1];
					}
				echo "<br>";
				}
		echo "<br /></div><center><input type =submit value=追加></center>";
		echo "</form>";

 //データベース切断
dconnect($con);

?>

	</body>
</html>