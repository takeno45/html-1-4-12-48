<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP 課題3-1</title>
  <style>
  th,
  td {
    text-align: center;
  }
  </style>
</head>

<body>
  <?php
   //消費税率
   $tax_rate = 0.1;

  //商品ごとの価格
  $pencil_price = 100;
  $eraser_price = 200;

  // 税込み価格の計算
  $pencil_tax_price = $pencil_price * (1 + $tax_rate );
  $eraser_tax_price = $eraser_price * (1 + $tax_rate );

  //1dozenの価格計算
  // $pencil_tax_price =110;
  // $eraser_tax_price = 220;
  $dozen = 12;
  $pencil_dozen_price = $pencil_tax_price *= $dozen;
  $eraser_dozen_price = $eraser_tax_price *= $dozen;

  //価格表
  $a =array('merchandise' => '商品','price' =>'価格','tax_price' =>'税込価格','dozen_price' =>'1Dzの価格');
  $b =array('pencil' =>'鉛筆','pencil_price' =>$pencil_price.'円','pencil_tax_price' =>$pencil_tax_price.'円','pencil_dozen_price'=>$pencil_dozen_price.'円');
  $c =array('eraser' =>'消しゴム','eraser_price' =>$eraser_price.'円','eraser_tax_price' =>$eraser_tax_price.'円','eraser_dozen_price'=>$eraser_dozen_price.'円');
  ?>
  <table border="1" width="370" style="border-collapse:collapse">
    <tr>
      <th><?=$a[merchandise];?></th>
      <th><?=$a[price];?></th>
      <th><?=$a[tax_price];?></th>
      <th><?=$a[dozen_price];?></th>
    </tr>
    <tr>
      <td><?=$b[pencil];?></td>
      <td><?=$b[pencil_price];?></td>
      <td><?=$b[pencil_tax_price];?></td>
      <td><?=$b[pencil_dozen_price];?></td>
    </tr>
    <tr>
      <td><?=$c[eraser];?></td>
      <td><?=$c[eraser_price];?></td>
      <td><?=$c[eraser_tax_price];?></td>
      <td><?=$c[eraser_dozen_price];?></td>
    </tr>
  </table>
  <?php
  echo   "<p>消費税は" .($tax_rate * 100)."%です。</p>";
  ?>
</body>

</body>

</html>