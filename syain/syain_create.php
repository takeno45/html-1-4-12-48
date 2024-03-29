<?php
// ①セッションを開始する　ユーザーのブラウザ間でデータを保持できるようになる
session_start();

// 全てのエラーを報告する
// error_reporting(E_ALL);
// エラーを画面に表示する
// ini_set('display_errors', 1);

// ②共通関数を含むcommon.phpファイルを読み込む
require_once('common.php');

// ③セッションから入力データを取得する。これにより、前回入力したデータが保持される。
$input_data = $_SESSION['input_data'] ?? [];

// ④ページの上部を表示する（見出しとして"社員情報の追加"を設定）
show_top("社員情報の追加");

// ⑤エラーメッセージによってIDの表示を切り替えるための変数　GETパラメータにエラーが含まれていて、その内容が「既に使用されているIDです」ならば空の値を、そうでなければセッションから取得したIDを代入します。
$displayedId = isset($_GET["error"]) && $_GET["error"] === "既に使用されているIDです" ? '' : $input_data["id"] ?? '';

// ⑥新規社員作成フォームを表示する
show_create(
  $displayedId,
  $input_data["name"] ?? '',
  $input_data["age"] ?? '',
  $input_data["work"] ?? ''
);

// ⑦ページの下部を表示する（戻るボタンを表示）
show_down(true);

// ⑧エラーメッセージが表示された後でも新しい入力データを保持するために、古いセッションデータをクリアする
unset($_SESSION['input_data']);
?>
