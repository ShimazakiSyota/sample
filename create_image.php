<?php
//データベースに接続 //
$con = mysql_connect("sddb0040191940.cgidb", "sddbODQ3MzQz","2OcR#n7m");

//データベースを選択//
mysql_select_db("sddb0040191940", $con);

//文字コードをセット//
mysql_query('SET NAMES utf8', $con);

//画像のtgazouid(ID)を取得
$id = $_GET['id'];

//受け取った画像のIDを元に画像をデータベースから取得
$sql = "SELECT * FROM image WHERE IMAID = '".$id."'";
$result = mysql_query( $sql, $con );
$rows = mysql_num_rows( $result );

//データベース切断
mysql_close( $con );

//取得した画像のバイナリデータとMIMEタイプから画像に変換し表示
if( $rows ){
    while($row = mysql_fetch_array($result)) {
        header( "Content-Type: ".$row['MIME'] );
        echo $row['IMAGE'];
    }
}
?>