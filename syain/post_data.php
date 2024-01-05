<?php
// セッションを開始する
session_start();//セッションは、ログイン情報の保持やショッピングカートの内容の保持など、ユーザー固有の情報をページ間で保持するためによく利用されます。

// 共通関数を含むファイルを読み込む
require_once('common.php');//PHPファイルに common.php を一度だけ読み込むためのもの

// POSTデータが存在する場合
if (isset($_POST["status"])) {
  // 各POSTデータを変数に格納する
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
    // 社員作成に失敗した場合
    if ($db->createsyain($id, $name, $age, $work) == false) {
      // エラーメッセージを設定し、社員作成ページにリダイレクトする
      $error = "DBエラー";
      $_SESSION['input_data'] = $_POST; 
      header("Location: syain_create.php?error={$error}");
      exit();
    }
    // 社員作成に成功した場合、社員一覧ページにリダイレクトする
    unset($_SESSION['input_data']); 
    header("Location: index.php");
    exit();
  }
  // 社員情報を更新する場合
  elseif ($_POST["status"] == "update") {
    // データベース接続情報
    define('DSN', 'mysql:host=localhost;dbname=company;charset=utf8mb4');
    define('USER', 'root');
    define('PASS', 'root');

    // データベースに接続
    $dbh = new PDO(DSN, USER, PASS);

    // SQL文を作成
    $sql = "UPDATE syain SET id = :id, name = :name, age = :age, work = :work WHERE id = :old_id";

    // プリペアドステートメントを作成
    $stmt = $dbh->prepare($sql);//データベースへの効率的かつ安全なアクセスが可能になる

    // パラメータをバインド  SQL文のパラメータに外部からの入力値を安全に組み込むことができる。
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':age', $age, PDO::PARAM_INT);
    $stmt->bindParam(':work', $work, PDO::PARAM_STR);
    $stmt->bindParam(':old_id', $old_id, PDO::PARAM_INT);

    // SQLを実行
    $stmt->execute();

    // index.phpにリダイレクト
    header('Location: index.php');
    exit;
  }
  // 社員情報を削除する場合
  elseif ($_POST["status"] == "delete") {
    // データベース接続情報
    define('DSN', 'mysql:host=localhost;dbname=company;charset=utf8mb4');
    define('USER', 'root');
    define('PASS', 'root');

    // データベースに接続
    $dbh = new PDO(DSN, USER, PASS);

    // SQL文を作成
    $sql = "DELETE FROM syain WHERE id = :id";

    // プリペアドステートメントを作成
    $stmt = $dbh->prepare($sql);

    // パラメータをバインド
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // SQLを実行
    $stmt->execute();

    // index.phpにリダイレクト
    header('Location: index.php');
    exit;
  }
}
?>
