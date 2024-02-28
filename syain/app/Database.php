<?php
// データベース接続情報を定義する
define('DSN',  'mysql:host=localhost;dbname=company;charset=utf8mb4');
define('USER', 'root');
define('PASS', 'root');

// データベース操作を行うクラス
class Database
{
  // PDOインスタンスを保持するプライベート変数 PDOを使うと、データベースとのやり取りが簡単にできるようになる
  private $pdo;

  // データベースに接続するプライベートメソッド(connect)
  private function connect()
  {
    // PDOにデータがない場合は接続する 
    if (!isset($this->pdo)) {
      // 接続情報の指定（PDOインスタンスを作成し、接続する）
      $this->pdo = new PDO(
         DSN,
         USER,
         PASS,
        [
         //接続オプションの設定
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,//データベースからデータを取得する際のデフォルトの形式を連想配列形式に設定
          PDO::ATTR_EMULATE_PREPARES => false,//SQLクエリの解析と実行をデータベースサーバーに任せることになる。
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // エラーモードを例外モードに設定
        ]
      );  
    }
  }

  // 全社員情報を取得するメソッド 定義
  function getallsyain()
  {
    try {               //try catch 例外処理
      // データベースに接続する
      $this->connect();
     
      // SQLクエリを実行し、結果を取得する id とnameを引っ張ってくる
      $stmt = $this->pdo->query("SELECT id, name FROM syain ORDER BY id;");//syainテーブルから全ての社員のidとnameをidの順に取得することを指示
      $members = $stmt->fetchAll();//実行したSQLクエリの結果を全て取得し、それを$membersに代入。fetchAllメソッドは、全ての結果を取得するためのPDOのメソッド
      return $members;//取得した結果をこのメソッドの呼び出し元に返却

      //データベース操作中にエラーが発生した場合の処理
    } catch(PDOException $e) {
      // エラーメッセージを出力し、プログラムを終了する
      echo $e->getMessage() . '<br>';
      exit;
   }
 }

 // 指定したIDの社員情報を取得するメソッド
 function getsyain($id)
 {
    try {
      // データベースに接続する
      $this->connect();
      // SQLクエリを準備する
      $stmt = $this->pdo->prepare("SELECT * FROM syain WHERE id = ?;" );
      // パラメータをバインドする
      $stmt->bindparam(1, $id, PDO::PARAM_INT);
      // SQLクエリを実行する
      $member = $stmt->execute();

      // 結果が存在する場合
      if ($member) {
        // 結果を取得する
        $member = $stmt->fetchAll();
        // 結果が空でない場合、最初の結果を返す
        if(count($member) == 0){
          return null;
        }
        return $member[0];
      }
      // 結果が存在しない場合、nullを返す
      return null;
    } catch(PDOException $e) {
      // エラーメッセージを出力し、プログラムを終了する
      echo $e->getMessage() . '<br>';
      exit;
   }
 }

 // 指定したIDが存在するかどうかを確認するメソッド
 function idexist($id)
 {
  // 指定したIDの社員情報が存在する場合、trueを返す
  if ($this->getsyain($id) != null) {
    return true;
  }
  // 存在しない場合、falseを返す
  return false;
 }

 // 新しい社員を作成するメソッド　　 全体として、このクラスは社員情報に関連する一連のCRUD（Create, Read, Update, Delete）操作をデータベース上で行うためのメソッドを提供します。
 function createsyain($id, $name, $age, $work)
 {
  try{
    // SQLクエリを準備する
    $stmt = $this->pdo->prepare("INSERT INTO syain VALUES(?,?,?,?);");
    // パラメータをバインドする
    $stmt->bindParam(1, $id, PDO::PARAM_INT);
    $stmt->bindParam(2, $name, PDO::PARAM_STR);
    $stmt->bindParam(3, $age, PDO::PARAM_INT);
    $stmt->bindParam(4, $work, PDO::PARAM_STR);
    // SQLクエリを実行する
    $result = $stmt->execute();
    return true;
  }catch(PDOException $e) {
      // エラーメッセージを出力し、プログラムを終了する
      echo $e->getMessage() . '<br>';
      exit;
  }
 // エラーが発生した場合、falseを返す
 return false;
}
}
?>
