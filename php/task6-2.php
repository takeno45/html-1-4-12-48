<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>task6-2</title>
</head>

<body>
  <?php

function max_number($n1, $n2) {
    return ($n1 > $n2) ? $n1 : $n2;
}

$a = 9;
$b = 21;
$max_value = max_number($a, $b);

echo "<p>\$a = $a</p>";
echo "<p>\$b = $b</p>";
echo "<p>\$aと\$bのうち最大値は$max_value です。</p>";
?>
</body>

</html>