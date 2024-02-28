<?php
// 全てのエラーを報告する
// error_reporting(E_ALL);
// エラーを画面に表示する
// ini_set('display_errors', 1);
// POSTデータをダンプする
// var_dump($_POST);

// ①common.phpを読み込む
require_once('common.php');

// ②データベースから全社員のリストを取得する　 DBからgetallsyainを呼び出し、$membersに代入 Databass.php
$members = $db->getallsyain();

// ③ページの上部を表示する html_func.php  show_top関数
show_top();

// ④社員リストを表示する html_func.php
show_syainlist($members);
// ⑤ページの下部を表示する 社員情報の追加 html_funk.php
show_down();
?>

<!-- 名前をクリックするとsyain_edit.php　社員情報に移動 -->
<!-- 社員情報追加ボタンを押すと syain_create.php　社員情報追加ページに移動-->