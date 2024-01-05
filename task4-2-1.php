<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>task4-2-1</title>
</head>

<body>
  <?php
  $a = mt_rand(1,12);
  switch ($a) {
    case $a == 12 :
    case $a == 1 :
    case $a == 2 :
    $judge = $a."月は冬の季節です。";
    break;
    case $a == 3 :
    case $a == 4 :
    case $a == 5 :
    $judge = $a."月は春の季節です。";
    break;
    case $a == 6 :
    case $a == 7 :
    case $a == 8 :
    $judge = $a."月は夏の季節です。";
    break;
    default:$judge = $a."月は秋の季節です。";
  }
  ?>
  <h1><?=$judge?> </h1>