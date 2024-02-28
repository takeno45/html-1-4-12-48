<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>task7-1.php</title>
  </style>
</head>

<body>

  <?php
  // class Staffの定義
class Staff {
  private $name;
  private $age;
  private $sex;
  private $id;
  // 各インスタンスごとにカウンターを設定して社員番号を割り振る定義
  private static $counter = 0;

  //引数の受け取り
  public function __construct($name, $age, $sex) {
  //引数から受け取った値の設定
      $this->name = $name;
      $this->age = $age;
      $this->sex = $sex;
  //社員番号が4桁で、スタッフが増加される度に1ずつ増加する設定
      self::$counter++;
      $this->id = 'S' . str_pad(self::$counter, 4, '0', STR_PAD_LEFT);
  }
  public function show() {
      printf("(%s)\n%s\n%s歳\n%s<br><br>\n", $this->id, $this->name, $this->age, $this->sex);
  }
}
$staff1 = new Staff('佐藤　一郎', 31, '男性');
$staff1->show();  

$staff2 = new Staff('山田　花子', 25, '女性');
$staff2->show(); 

$staff3 = new Staff('鈴木　次郎', 27, '男性');
$staff3->show(); 

?>



</body>

</html>