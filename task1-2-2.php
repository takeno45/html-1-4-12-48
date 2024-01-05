<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>課題2 PHP基礎1-2-1</title>
</head>

<body>
  <?php
  //消費税率
  $taxRate = 0.1;

  //商品ごとの価格
  $pencilPrice = 100;
  $eraserPrice = 200;

  // 税込み価格の計算
  $pencilTotal = $pencilPrice * (1 + $taxRate);
  $eraserTotal = $eraserPrice * (1 + $taxRate);

  echo   "<p>現在、消費税は".($taxRate * 100)."%です。</p>";
  echo  "<p>鉛筆が" .$pencilPrice . "円で税込". $pencilTotal . "円です。</p>";
  echo  "<p>消しゴムが" . $eraserPrice . "円で税込" . $eraserTotal ."円です。</p>";
?>


</body>

</html>