<?php
// データベース操作を行うクラスを含むファイルを読み込む
require_once('app/Database.php'); //Database.phpの内容を取り込むためのPHPの機能
// HTML生成関数を含むファイルを読み込む
require_once('app/html_func.php');//html_func.phpの内容を取り込むためのPHPの機能
// 入力チェック関数を含むファイルを読み込む
require_once('app/check.php');//check.phpの内容を取り込むためのPHPの機能
// エラーメッセージを取得する関数
function get_error()
{
  // エラーメッセージを初期化する
  $error = "";
  // GETパラメータにエラーメッセージが存在する場合、それを取得する
  if (isset($_GET["error"])){
    $error = $_GET["error"];
  }
  // エラーメッセージを返す
  return $error;
}
// データベース接続を確立する
$db = new Database();// Databaseクラスのインスタンスを作成
?>
