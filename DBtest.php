<?php
//function main($a,$b){
function setDB(){

    try {
//データベースに接続 //
$con = mysql_connect("localhost", "root","");

//データベースを選択//
mysql_select_db("test2", $con);

//文字コードをセット//
mysql_set_charset('utf8');
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}


function closeDB(){

    try {
//データベースに接続 //
$con = mysql_connect("localhost", "root","");

//切断//

$close_flag = mysql_close($con);

if ($close_flag) {
    print('切断に成功しました。');
}
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}


function main(){

    try {
	//SQL文をセット//
	$quryset = mysql_query("SELECT * FROM user;");
	return $quryset;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

?>
