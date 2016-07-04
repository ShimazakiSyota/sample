

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<title>PHPテスト</title>
		<h2>PHPのテストです</h2>
	</head>

<body>
今日の日付は

	<?php
			echo date('y年m月d日');
	?>

ですよ。


<br><br><br><br>

<?php

//	数字の変数
$x = 12345;

//	文字の変数
$y = "グミ";


//	変数 x を出力
echo $x;

//	改行を2つ出力
echo "<br><br>";

//	変数 y を出力
echo $y;			echo "<br><br>";

//	文字を出力
echo "ケーキ";		echo "<br><br>";

//	数字を出力
echo 67890;

?>

</body>
</html>
