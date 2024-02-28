<?php
//① データベース操作を行うクラスを含むファイルを読み込む
require_once('app/Database.php'); //Database.phpの内容を取り込むためのPHPの機能
//②HTML生成関数を含むファイルを読み込む
require_once('app/html_func.php');//html_func.phpの内容を取り込むためのPHPの機能
//③入力チェック関数を含むファイルを読み込む
require_once('app/check.php');//check.phpの内容を取り込むためのPHPの機能
//④エラーメッセージを取得する関数 だが、エラーが出るまでは実行されない
function get_error()
{
  // エラーメッセージを初期化
  // GETパラメータにエラーメッセージが存在する場合、エラーを返す
  $error = "";
  
  if (isset($_GET["error"])){
    $error = $_GET["error"];
  }
 
  return $error;
}
// ⑤データベース接続を確立する このページではこの部分が実行される
$db = new Database();// Databaseクラスのインスタンスを作成して$dbに代入
?>
