<?php
// ①共通関数を含むcommon.phpファイルを読み込む
require_once('common.php');

// ②URLから社員のIDを取得する
$id = $_GET['id'];

// ③データベースから該当する社員の情報を取得する
$member = $db->getsyain($id);

// ④ページの上部を表示する（見出しとして"社員情報"を設定）
show_top("社員情報");

// ⑤社員情報を表示する
show_syain($member);

// ⑥社員情報の更新と削除のリンクを表示する
echo '<a href="syain_update.php?id=' . $id . '">社員情報の更新</a><br>';
echo '<a href="syain_delete.php?id=' . $id . '">社員情報の削除</a><br>';

// ⑦ページの下部を表示する（戻るボタンを表示）
show_down(true);
?>
