<?php
// データベース接続情報を定義する
define('DSN',  'mysql:host=localhost;dbname=company;charset=utf8mb4');
define('USER', 'root');
define('PASS', 'root');

// データベース操作を行うクラス
class Database
{
  // PDOインスタンスを保持するプライベート変数
  private $pdo;

  // データベースに接続するプライベートメソッド
  private function connect()
  {
    // まだ接続していない場合
    if (!isset($this->pdo)) {
      // PDOインスタンスを作成し、接続する
      $this->pdo = new PDO(
         DSN,
         USER,
         PASS,
        [
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_EMULATE_PREPARES => false,
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // エラーモードを例外モードに設定
        ]
      );  
    }
  }

  // 全社員情報を取得するメソッド
  function getallsyain()
  {
    try {
      // データベースに接続する
      $this->connect();
     
      // SQLクエリを実行し、結果を取得する
      $stmt = $this->pdo->query("SELECT id, name FROM syain ORDER BY id;");
      $members = $stmt->fetchAll();
      return $members;
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

 // 新しい社員を作成するメソッド
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
