<?php
// 全てのエラーを報告する
// error_reporting(E_ALL);
// エラーを画面に表示する
// ini_set('display_errors', 1);
// POSTデータをダンプする
// var_dump($_POST);

// 共通関数を含むファイルを読み込む
require_once('common.php');

// データベースから全社員のリストを取得する
$members = $db->getallsyain();
// ページの上部を表示する
show_top();
// 社員リストを表示する
show_syainlist($members);
// ページの下部を表示する
show_down();
?>