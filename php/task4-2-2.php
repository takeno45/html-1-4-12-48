<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>task4-2-2</title>
</head>

<body>
  <?php
$a = mt_rand(1, 12);
 if ($a == 1){
  $judge2 = "1月は冬の季節です。";
  }  elseif($a == 2){
  $judge2 = "2月は冬の季節です。";
 }  elseif($a == 3){
    $judge2 = "3月は春の季節です。";
 }  elseif($a == 4){
   $judge2 = "4月は春の季節です。";
 }  elseif($a == 5){
   $judge2 = "5月は春の季節です。";
 } elseif($a == 6){
   $judge2 = "6月は夏の季節です。";
 } elseif($a == 7){
   $judge2 = "7月は夏の季節です。";
 }  elseif($a == 8){
   $judge2 = "8月は夏の季節です。";
 }  elseif($a == 9){
   $judge2 = "9月は秋の季節です。";
 } elseif($a == 10){
   $judge2 = "10月は秋の季節です。";
 }  elseif($a == 11){
   $judge2 = "11月は秋の季節です。";
 }  elseif($a == 12){
   $judge2 = "12月は冬の季節です。";
 } 
 ?>
  <h1><?=$judge2?> </h1>
</body>

</html>