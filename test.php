<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">

<html>
	<head>
		<title>（管理者用）</title>
	</head>
	<body>
		<h1>表示</h1>
<?php

//----------------------------------------------------------------------------------------------------
require_once 'DBmanager.php'; //関数呼び出しより手前に記述する

//DB接続
$con = connect();
$jobid = 0;
$arry = array("し");
$btagid = 1;
$itagid = 5;
$zero = 0;
$fkie = ('システム');
$re = ('aiu');
//SQL文をセット//
$arr = order($arry);
//---------------------------------------------------------------------------------------------------

echo "<br />";

echo "<br />";
echo "<br />";

//１ループで１行データが取り出され、データが無くなるとループを抜けます。
foreach($arr as $data1){

		echo " ". $data1[0] ."<br />";
		echo " ". $data1[1] ."<br />";
		echo " ". $data1[2] ."<br />";
		echo " ". $data1[3] ."<br />";


}

dconnect($con);

?>
	</body>
</html>

//////////////////学生インタビュー判断
//foreach($arr as $data1){
//
//		echo " ". $data1[0] ."<br />";
//		if($data1[0] == 0){
//		echo ('null');
//		echo " ". $data1[0] ."<br />";
//		}else if($data1[0] != 0){
//		echo " ". $data1[1] ."<br />";
//		echo " ". $data1[2] ."<br />";
//		echo " ". $data1[3] ."<br />";
//		}
//
//}

