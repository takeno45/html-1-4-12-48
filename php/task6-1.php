<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>task6-1</title>
</head>

<body>
  <?php
  function showString ($num,$str){
  for ($i = 0; $i<$num;$i++) {
  echo $str;
  }
  }
  $num = 3;
  $str = "気合いだ！<br>";
  showString($num,$str);
  ?>
</body>

</html>