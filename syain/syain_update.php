<?php
// すべてのエラーを報告する
// error_reporting(E_ALL);
// エラーを画面に表示する
// ini_set('display_errors', 1);

//社員情報の更新ページ
// ①共通関数を含むファイルを読み込む common.phpの読み込み
require_once('common.php');

// ②URLから社員のIDを取得する
$id = $_GET['id'];

// ③データベースから該当する社員の情報を取得する
$member = $db->getsyain($id);

// ④ページの上部を表示する（見出しとして"社員情報の更新"を設定）
show_top("社員情報の更新");

// ⑤社員情報を表示するフォームを生成
show_create($member["id"], $member["name"], $member["age"], $member["work"], "update", "更新");

// ⑥ページの下部を表示する（戻るボタンを表示）
show_down(true);
?>

