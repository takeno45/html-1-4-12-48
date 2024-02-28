<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP基礎1-2-①</title>
</head>

<body>
  <?php
// 定数の定義
define("TAX_RATE", 10);

// 商品の情報
$pencil = "鉛筆";
$value_01 = 100;
$eraser = "消しゴム";
$value_02 = 200;

// 消費税の計算
$tax_01 = $value_01*TAX_RATE/100;
$tax_02 = $value_02*TAX_RATE/100;

// 税込み価格の計算
$price_01 = $value_01 + $tax_01;
$price_02 = $value_02 + $tax_02;

?>
  <?php
echo   "<p>現在、消費税は".(TAX_RATE)."%です。</p>";
echo  "<p>{$pencil}が{$value_01}円で税込{$price_01}円です。</p>";
echo  "<p>{$eraser}が{$value_02}円で税込{$price_02}円です。</p>";
?>


</html>