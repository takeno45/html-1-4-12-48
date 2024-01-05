<?php
// ページの上部を表示する関数
function show_top($heading = '社員一覧')
{
    // HTMLの開始部分を出力する
    echo <<<TOP
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>社員管理</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>{$heading}</h1>
TOP;
}

// ページの下部を表示する関数
function show_down($return = false)
{
    // 戻るボタンを表示する場合
    if ($return) {
        echo '<button><a href="index.php">社員一覧に戻る</a></button>';
    }
    // HTMLの終了部分を出力する
    echo <<<BOTTOM
</body>
</html>
BOTTOM;
}

// 社員リストを表示する関数
function show_syainlist($members)
{
    // テーブルの開始部分を出力する
    echo '<table>';
    echo '<tr><th>社員番号</th><th>名前</th></tr>';
    // 各社員の情報をテーブルの行として出力する
    foreach ($members as $member) {
        echo "<tr><th>{$member['id']}</th><td><a href='syain_edit.php?id={$member['id']}'>{$member['name']}</a></td></tr>";
    }
    // テーブルの終了部分と社員情報追加ボタンを出力する
    echo '</table>';
    echo '<button><a href="syain_create.php">社員情報の追加</a></button>';
}

// 新規社員情報作成フォームを表示する関数
function show_create($id = '', $name = '', $age = '', $work = '', $status = 'create', $button = '登録')
{
    // エラーメッセージを取得する
    $error = get_error();

    // 社員情報の入力フォームを出力する
    echo <<<FORM
<form action="post_data.php" method="post">
    <p>社員番号</p>
    <input type="text" name="id" placeholder="例）10001" value="{$id}">
    <p>名前</p>
    <input type="text" name="name" placeholder="例）中野 孝" value="{$name}">
    <p>年齢</p>
    <input type="text" name="age" placeholder="例）35" value="{$age}">
    <p>勤務形態</p>
    <input type="text" name="work" placeholder="例）社員" value="{$work}">
    <p class="red">{$error}</p>
    <input type="hidden" name="old_id" value="{$id}">
    <input type="hidden" name="status" value="{$status}">
    <input type="submit" name="button" value="{$button}">
</form>
FORM;
}

// 社員情報を表示する関数
function show_syain($member)
{
    // テーブルの開始部分を出力する
    echo '<table>';
    echo '<tr><th>社員番号</th><th>名前</th><th>年齢</th><th>労働形態</th></tr>';
    // 取得した社員の情報をテーブルの行として出力する
    echo "<tr><td>{$member['id']}</td><td>{$member['name']}</td><td>{$member['age']}</td><td>{$member['work']}</td></tr>";
    // テーブルの終了部分を出力する
    echo '</table>';
}
?>
