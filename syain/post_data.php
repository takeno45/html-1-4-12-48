<?php
//① セッションを開始する
session_start();//セッションはユーザー固有の情報をページ間で保持する

//②common.php を一度だけ読み込む
require_once('common.php');

//③POSTデータが存在する場合
if (isset($_POST["status"])) {
  // 各POSTデータ(フォームに入力されたデータ）を変数に格納する
  $id = $_POST["id"] ?? '';
  $name = $_POST["name"] ?? '';
  $age = $_POST["age"] ?? '';
  $work = $_POST["work"] ?? '';
  $old_id = $_POST["old_id"] ?? '';

  // 新しい社員を作成する場合
  if ($_POST["status"] == "create") {
    // 入力チェックを行う
    if (check_input($id, $name, $age, $work, $error) == false) {
      // エラーがある場合、エラーメッセージとともに社員作成ページにリダイレクトする
      $_SESSION['input_data'] = $_POST; 
      header("Location: syain_create.php?error={$error}");
      exit();
    }
    // IDが既に存在する場合
    if ($db->idexist($id) == true) {
      // エラーメッセージを設定し、社員作成ページにリダイレクトする
      $error = "既に使用されているIDです";
      $_SESSION['input_data'] = $_POST; 
      header("Location: syain_create.php?error={$error}");
      exit();
    }
    // 社員作成に失敗した場合  Database.php
    if ($db->createsyain($id, $name, $age, $work) == false) {
      // エラーメッセージを設定し、社員作成ページにリダイレクトする
      $error = "DBエラー";
      $_SESSION['input_data'] = $_POST; 
      header("Location: syain_create.php?error={$error}");
      exit();
    }
    // 社員作成に成功した場合、社員一覧ページにリダイレクトする
    unset($_SESSION['input_data']); //データを削除
    header("Location: index.php"); //index.phpにリダイレクト
    exit();
  }
  // 新規作成では無く、社員情報を更新する場合
  elseif ($_POST["status"] == "update") {
    // データベース接続情報
    define('DSN', 'mysql:host=localhost;dbname=company;charset=utf8mb4');
    define('USER', 'root');
    define('PASS', 'root');

    // データベースに接続 new PDO 新しいインスタンス作成
    $dbh = new PDO(DSN, USER, PASS);

    // SQL文を作成　WERE id = :old_idで、一致するDBを探し、新しい値にDBの情報を更新する
    $sql = "UPDATE syain SET id = :id, name = :name, age = :age, work = :work WHERE id = :old_id";

    // SQLクエリを準備し、$stmtに格納　$dbhはDBへの接続
    $stmt = $dbh->prepare($sql);//データベースへの効率的かつ安全なアクセスが可能になる

    // パラメータをバインド（結びつけ）  SQL文のパラメータに外部からの入力値を安全に組み込むことができる。
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); //$idを整数としてidに収納,データベースに送る
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);//$nameを文字列としてnameに格納、データベースに送る
    $stmt->bindParam(':age', $age, PDO::PARAM_INT);// $ageを整数としてageに収納し、データベースに送る
    $stmt->bindParam(':work', $work, PDO::PARAM_STR); //$workを文字列としてworkに収納し、データベースに送る
    $stmt->bindParam(':old_id', $old_id, PDO::PARAM_INT);//$old_idを整数としてold_idに収納し、データベースに送る

    // SQLを実行
    $stmt->execute();

    // index.phpにリダイレクト
    header('Location: index.php');
    exit;
  }
  // 新規作成ではなく、社員情報を削除する場合
  elseif ($_POST["status"] == "delete") {
    // データベース接続情報を設定
    define('DSN', 'mysql:host=localhost;dbname=company;charset=utf8mb4');
    define('USER', 'root');
    define('PASS', 'root');

    // データベースに接続　DBへの接続を$dbnに保存
    $dbh = new PDO(DSN, USER, PASS);

    // syainテーブルから特定のidを持つレコードを削除するSQL文を作成
    $sql = "DELETE FROM syain WHERE id = :id";

    // プリペアドステートメントを作成(SQL文を安全に送る為の準備)
    $stmt = $dbh->prepare($sql);

    // パラメータをバインド(idが$idに置き換えられidが削除対象となる)
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // SQLを実行(SQL文をデータベースに送り実行)
    $stmt->execute();

    // index.phpにリダイレクト
    header('Location: index.php');
    exit;
  }
}
?>
