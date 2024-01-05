<?php
// すべてのエラーを報告する
// error_reporting(E_ALL);
// エラーを画面に表示する
// ini_set('display_errors', 1);


// 共通関数を含むファイルを読み込む
require_once('common.php');

// URLから社員のIDを取得する
$id = $_GET['id'];

// データベースから該当する社員の情報を取得する
$member = $db->getsyain($id);

// ページの上部を表示する（見出しとして"社員情報の更新"を設定）
show_top("社員情報の更新");

// 社員情報を表示する
show_create($member["id"], $member["name"], $member["age"], $member["work"], "update", "更新");

// ページの下部を表示する（戻るボタンを表示）
show_down(true);
?>

