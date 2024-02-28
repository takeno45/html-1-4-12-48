<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <style>
  td {
    width: 100px;
  }
  </style>
</head>

<body>
  <h1>九九の計算</h1>
  <table>
    <?php for ($i=1; $i <=9; $i++) {
      echo "<tr>";
      for ($j=1; $j <=9; $j++) {
        $a=$i * $j;
        echo "<td>$i × $j = $a </td>";
      }
     echo  "</tr>";
  }
  ?>
  </table>
</body>

</html>