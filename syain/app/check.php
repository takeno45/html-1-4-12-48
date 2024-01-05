<?php

// 入力値のチェックを行う関数
function check_input($id, $name, $age, $work, &$error)
{
  // エラーメッセージを初期化する
  $error = "";
  // id、name、age、workが空の場合
  if ($id === "" or $name === "" or $age === "" or $work === "") {
    // エラーメッセージを設定し、falseを返す
    $error ="入力されていない値があります";
    return false;
  }
  // idが1～3で始まる5桁の整数でない場合
  if (preg_match("/^[1-3][0-9]{4}$/",$id) != true)  { //一般的なフォーマットに合致しているかを検証する
    // エラーメッセージを設定し、falseを返す
    $error = "idには1～3ではじまる５桁の整数を入力して下さい";
    return false;
  }
  // ageが整数でない場合
  if (!is_numeric($age)) {
    // エラーメッセージを設定し、falseを返す
    $error = "ageには整数を入力して下さい";
    return false;
  }
  // workが'syain'または'part'でない場合
if ($work !== '社員' && $work !== 'パート') {
  // エラーメッセージを設定し、falseを返す
  $error = "workには'社員'または'パート'を入力して下さい";
  return false;
}
  // 入力値が正しい場合、trueを返す
  return true;
}
?>
