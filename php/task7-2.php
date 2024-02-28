<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>task7-2.php</title>
</head>

<body>
  <?php
  //エラーを表示する
  ini_set('display_errors', 1);
  // staffの基本構造の定義(抽象クラス)
  // 親クラス
  abstract class MainStaff{
    // 子クラスで実装される抽象メソッド
    abstract public function show();
    // 共通プロパティ（子クラスで必ず指定すべきメソッド（無いとエラーに）
    protected $name;
    protected $age;
    protected $sex;
    protected $id;
    // スタッフ数をカウントするカウンター(クラス全体で共有)
    protected static $counter = 0;
    // 共通のプロパティを初期化するコンストラクタ
    public function __construct($name, $age, $sex)
    {
      $this->name = $name;
      $this->age = $age;
      $this->sex = $sex;
      // ++でIDを1ずつ増やして割り当てる(self::でプロパティの呼び出し)
      self::$counter++;
      $this->id = 'S' . str_pad(self::$counter, 4, '0', STR_PAD_LEFT);
    }
  }
  // 子クラス (MainStaff を親クラスとした子クラス)
  class Staff extends MainStaff{

    //staff情報を表示するメソッド
      public function show()
      {
        // printf を使用してスタッフの詳細を表示
        printf("(%s) %s %s %s<br>", $this->id, $this->name, $this->age !== null ? $this->age . '歳' : '', $this->sex);
      }
  }
  // MainStaff を継承したPartStaffを表す子クラス
  class PartStaff extends MainStaff{
    //PartStaff の追加プロパティ
    protected $jikyuu;
     // プロパティを初期化するコンストラクタ。親のコンストラクタも呼び出す
    public function __construct($name, $age, $sex, $jikyuu)
    {
    // 親クラス（MainStaff）のコンストラクタを呼び出す 
      parent::__construct($name, $age, $sex);
     // PartStaffに特有のプロパティを割り当て 
      $this->jikyuu = $jikyuu; 
      $this->id = 'P' . str_pad(self::$counter, 4, '0', STR_PAD_LEFT);
    }
    // 親クラスの show メソッドをオーバーライド
    public function show()
    {
    // PartStaffの jikyuu プロパティが設定されているか確認    
      if ($this->jikyuu !== null) {
    // PartStaffの詳細を表示 
        printf("(%s) %s %s %s 時給：%s円<br>", $this->id, $this->name, $this->age !== null ? $this->age . '歳' : '', $this->sex, $this->jikyuu);
      } 
    }
  }
// Staffオブジェクトを格納する配列の作成
  $staffs = [];
  $staffs[0] = new Staff('佐藤　一郎', 31, '男性');
  $staffs[1] = new Staff('山田　花子', 25, '女性');
  $staffs[2] = new Staff('鈴木　次郎', 27, '男性');
  $staffs[3] = new PartStaff('田中　友子', 24, '女性', 900);
  $staffs[4] = new Staff('中村　三郎', 27, '男性');
// 任意のMainStaff オブジェクトを受け入れる関数
  function AllStaff(MainStaff $staff)
  {
    // 渡された staffオブジェクトのshowメソッドを呼び出す
    $staff->show();
  }
//Staffの配列をループし、各スタッフメンバーの詳細を表示
////foreachで順番に処理をする
  foreach ($staffs as $staff) {
    AllStaff($staff);
  }
  ?>
</body>

</html>