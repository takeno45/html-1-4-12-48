<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
$a = mt_rand(1, 100);
 if ($a <= 5){
  $judge = '今日の運勢は”大凶”です';
  }  elseif($a <= 20){
  $judge = ' 今日の運勢は"凶"です';
 }  elseif($a <= 50){
    $judge = ' 今日の運勢は"吉"です';
 }  elseif($a <= 80){
   $judge = ' 今日の運勢は"中吉"です';
 } else{
   $judge =  '今日の運勢は"大吉"です';
 }
 ?>
  <h1><?=$judge?> </h1>;
</body>

</html>