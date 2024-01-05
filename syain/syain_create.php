<?php
// セッションを開始する
session_start();

// 全てのエラーを報告する
error_reporting(E_ALL);
// エラーを画面に表示する
ini_set('display_errors', 1);

// 共通関数を含むファイルを読み込む
require_once('common.php');

// セッションから入力データを取得する
$input_data = $_SESSION['input_data'] ?? [];

// ページの上部を表示する（見出しとして"社員情報の追加"を設定）
show_top("社員情報の追加");

// エラーメッセージによってIDの表示を切り替えるための変数
$displayedId = isset($_GET["error"]) && $_GET["error"] === "既に使用されているIDです" ? '' : $input_data["id"] ?? '';

// 新規社員作成フォームを表示する
show_create(
  $displayedId,
  $input_data["name"] ?? '',
  $input_data["age"] ?? '',
  $input_data["work"] ?? ''
);

// ページの下部を表示する（戻るボタンを表示）
show_down(true);

// エラーメッセージが表示された後でも入力データを保持するために、セッションデータをクリアする
unset($_SESSION['input_data']);
?>
