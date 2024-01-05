<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>task5-3</title>
  <style>
  th,
  td {
    text-align: center;
  }
  </style>
</head>

<body>
  <?php
 $a = [
    "鉛筆" => ["価格" => 100, "税込価格" => 110],
    "消しゴム" => ["価格" => 200, "税込価格" => 220],
    "定規" => ["価格" => 300, "税込価格" => 330]
  ];
  ?>
  <table border="1" width="300" style="border-collapse:collapse">
    <?php
echo 
"<tr>
    <th>商品</th>
    <th>価格</th>
    <th>税込価格</th>
</tr>";
foreach ($a as $b => $price) {
echo "<tr>
    <td>$b</td>
    <td>{$price['価格']}円</td> 
    <td>{$price['税込価格']}円</td>
  </tr>";
}
echo "</table>";
?>
  </table>
</body>

</html>