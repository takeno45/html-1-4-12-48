<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP 課題2-2</title>
  <style>
  th,
  td {
    text-align: center;
  }
  </style>
</head>

<body>
  <?php
  $a =array('merchandise' => '商品','price' =>'価格' , 'tax_price' =>'税込価格');
  $b =array('pencil' =>'鉛筆','pencil_price' =>'100 円','pencil_tax_price' =>'110円');
  $c =array('eraser' =>'消しゴム','eraser_price' =>'200円','eraser_tax_price' =>'220円');
  $d =array('ruler' =>'定規','ruler_price' =>'300円','ruler_tax_price' =>'330円');
  ?>
  <table border="1" width="300" style="border-collapse:collapse">
    <tr>
      <th><?=$a[merchandise];?></th>
      <th><?=$a[price];?></th>
      <th><?=$a[tax_price];?></th>
    </tr>
    <tr>
      <td><?=$b[pencil];?></td>
      <td><?=$b[pencil_price];?></td>
      <td><?=$b[pencil_tax_price];?></td>
    </tr>
    <tr>
      <td><?=$c[eraser];?></td>
      <td><?=$c[eraser_price];?></td>
      <td><?=$c[eraser_tax_price];?></td>
    </tr>
    <tr>
      <td><?=$d[ruler];?></td>
      <td><?=$d[ruler_price];?></td>
      <td><?=$d[ruler_tax_price];?></td>
    </tr>
  </table>
</body>

</html>