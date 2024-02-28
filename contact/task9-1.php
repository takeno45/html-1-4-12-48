<!-- フォームから送信されたお問合せフォームのデータを、MySQLデータベースのcontactテーブルに挿入する -->
<?php
try {
   //DB名、ユーザー名、パスワードを変数に格納
   $dsn = 'mysql:host=localhost;dbname=consumer;charset=utf8mb4';
   $user = 'root';
   $password = 'root';
  
   //PHP Data Objects（PDO）PHP Data Objectsを使用してMySQLデータベースに接続
   $pdo = new PDO($dsn, $user, $password); 
   //PDO::ATTR_ERRMODEはエラーモードを指定するための定数、PDO::ERRMODE_EXCEPTIONは例外を投げることでエラーを扱うモード
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示

  // $pdo->query("DROP TABLE IF EXISTS contact");
  // $pdo->query(
  //    "CREATE TABLE contact(
  //       id   INT PRIMARY KEY AUTO_INCREMENT,
  //       onamae VARCHAR(128),
  //       furigana VARCHAR(128),
  //       email VARCHAR(128),
  //       tel VARCHAR(128),
  //       koumoku VARCHAR(128),
  //       naiyou TEXT,
  //       policy  VARCHAR(128) 
  //    )"
  // );
  
  //input.phpの値を取得
  $onamae= $_POST['onamae'];
  $furigana = $_POST['furigana'];
  $email = $_POST['email'];
  $tel = $_POST['tel'];
  $koumoku = $_POST['koumoku'];
  $naiyou = $_POST['naiyou'];
  $policy = $_POST['policy'];
 
  // INSERT INTO contact は、contact テーブルに新しい行を挿入することを指定しています。 NOW())は現在の日時→dataに挿入
  $sql = "INSERT INTO contact (onamae, furigana, email, tel, koumoku, naiyou, policy, date) VALUES (:onamae, :furigana, :email, :tel, :koumoku, :naiyou, :policy, NOW())";
  $stmt = $pdo->prepare($sql); //値が空のままSQL文をセット
  $params = array(':onamae' => $onamae, ':furigana' => $furigana,':email' => $email, ':tel' => $tel,':koumoku' => $koumoku, ':naiyou' => $naiyou, ':policy' => $policy); // 挿入する値を配列に格納
  $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行
 
} catch(PDOException $e) {
  echo $e->getMessage() . '<br>';
  exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>contact</title>
    <link rel="stylesheet" href="./css/reset.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"
    />
    <style>
  .sec_01_p9-1 {
    font-size: 30px;
    color:blue;
    text-align:center;
    margin-top:40px;
  }
  </style>
  </head>
  <body>
    <header>
      <div class="header">
        <div class="header-logo01">
          <h1 class="header_logo">ここには会社名が入ります</h1>
          <div class="header_btn">
            <a href="../index.html" class="header_btn01">Home</a>
            <a href="#" class="header_btn02">お問合せ</a>
          </div>
        </div>
        <div class="header_nav">
          <ul class="header_nav_list">
            <li><a href="#" class="header_nav_li">メニュー01</a></li>
            <li><a href="#" class="header_nav_li">メニュー02</a></li>
            <li><a href="#" class="header_nav_li">メニュー03</a></li>
          </ul>
        </div>
        <div class="header_main_img">
          <img src="./img/mv.png" class="mv_img" />
        </div>
      </div>
    </header>
    <main>
      <div class="sec_01">
        <div class="sec_01_content">
          <h1 class="sec_01_title">お問い合わせ</h1>
          <p class=" sec_01_p9-1"><b>送信完了しました。</b></p>
        </div>
      </div>
      <!-- .sec_btn ------------------------------------------ -->
      <div class="sec_btn">
        <div class="wrapper">
          <div class="sec_btn_box">
            <div class="sec_btn_content">
              <h2 class="sec_btn_h2">ここからご購入ください</h2>
              <a href="#" class="sec_btn_a_1">ネットショップ</a>
            </div>
            <div class="sec_btn_content">
              <h2 class="sec_btn_h2">お気軽にお問合せください</h2>
              <a href="#" class="sec_btn_a_2">お問い合せ</a>
            </div>
          </div>
        </div>
      </div>
      <!-- sec_03 ---------------------------------- -->
      <div class="sec_03">
        <h3 class="sec_03_h3">ここには会社名が入ります</h3>
        <p class="sec_03_p">住所が入ります</p>
        <p class="sec_03_p">03-1234-5678</p>
        <p class="sec_03_p">営業時間:9:00～18:00</p>
      </div>
      <!-- sec_04 -------------------------------- -->
      <div class="sec_04">
        <div class="wrapper">
          <div class="sec_04_link">
            <a href="#">リンク01</a>
            <a href="#">リンク02</a>
            <a href="#">リンク03</a>
            <a href="#">リンク04</a>
            <a href="#">リンク05</a>
            <a href="#">リンク06</a>
          </div>
          <div class="sec_04_linl_02">
            <a href="#" class="sec_04_li_07">リンク07</a>
          </div>
        </div>
      </div>
    </main>
    <!-- footer --------------------------------- -->
    <footer>
      <div class="footer">
        <p>ここには会社名がはいります&copy;Copyright.</p>
      </div>
    </footer>
  </body>
</html>
