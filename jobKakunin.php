<html>
	<head>
		<div class="head">
		<title>職業詳細変更</title>
		<link href="kanristyle.css" rel="stylesheet" type="text/css">
	</head>
<body>
		<h1>職業詳細変更</h1>
	<div align="right">
		<h3><a href='./kanri.php'>管理TOPページへ戻る</a><br></h3>
		<h3><a href='./jobTop.php'>職業TOPページへ戻る</a><br></h3>
		</div></div>

<script type="text/javascript">
//ポップアップのソース
function disp(){
	// 「OK」時の処理開始 ＋ 確認ダイアログの表示
        var flag = confirm ( "本当に削除してもよろしいですか？");
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

//選択された職業を送り、そのタグ情報と関連情報を取得
$jobKanri = joblist ($_POST['selectedJob']);
$jobKanri2 = jobKanri($_POST['selectedJob']);
$jobKanri3 = getDepartmentID($_POST['selectedJob']);
$jobKanri4 = getDepartmentAll();


//職業名表示
echo "<center><H2>職業名：".$jobKanri[1]."</H2>";
	echo "<form action='./jobDelete.php' method='POST' onsubmit='return disp()'>";
	echo "<button class='del' type='submit' name='jobID' value='".$jobKanri[0]."'>この職業を削除する</button>";
	echo "</form>";

//職業詳細取得
echo "<form action='./jobChange.php' method='post'><br /><br />";
	echo "職業名". $jobKanri['JOBNAME']."<br /><br />";
	echo "職業名【ふりがな】". $jobKanri['JOBJPN'] ."<br /><br />";
	echo "職業名【英語】". $jobKanri['JOBENG'] ."<br /><br />";
	echo "一行キャッチコピー<br />". $jobKanri['JOBCC'] ."<br /><br />";
	echo "紹介文<br />". $jobKanri['JOBINTRO'] ."<br /><br />";

	//画像がある場合のみ
   		if($jobKanri['JIMAGE'] != 0) {
       		echo "画像1：<img height='100' img src='./create_image.php?id=".$jobKanri['JIMAGE']."' />";
		}
		echo "</center>";
		
		echo "<div class='left'>";
		echo "<H3>連携している中分類タグ</H3>";

					$nullflag = 0;
					echo "<h3>";
					foreach($jobKanri2[1] as $data){
						$nullflag = 1;
						$tag = tagCheck($data[0]);
						echo "・".$tag[1]."<br>";
					}
					if ($nullflag == 0){echo "連携している中分類タグはありません";}
					echo "</h3>";
		echo "<H3>連携している感覚タグ</H3>";

					$nullflag = 0;
					echo "<h3>";
					foreach($jobKanri2[3] as $data){
						$nullflag = 1;
						$tag = tagCheck($data[0]);
						echo "・".$tag[1]."<br>";
					}
					if ($nullflag == 0){echo "連携している感覚タグはありません";}
					echo "</h3>";

		echo "<H3>関連している学科</H3>";

					$nullflag = 0;
					echo "<h3>";
					foreach($jobKanri3 as $data){
						$nullflag = 1;
						$gakka = getDepartment($data[0]);
						echo "・".$gakka['DNAME']."<br>";
					}
					if ($nullflag == 0){echo "連携している学科はありません";}
					echo "</h3>";
	echo "<input type='hidden' name='selectedJob' value ='".$jobKanri[0]."'>";

echo "<br /></div><center><input type=submit value=変更><br /><br />";
echo"</form>";


 //データベース切断
dconnect($con);

?>
</center>
	</body>
</html>