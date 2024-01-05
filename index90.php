<?php
try {
  $pdo = new PDO(
    'mysql:host=localhost;dbname=company;charset=utf8mb4',
    'root',
    'root'
  );

  // $pdo->query("DROP TABLE IF EXISTS syain");
  // $pdo->query(
  //   "CREATE TABLE syain(
  //     id    INT PRIMARY KEY,
  //     name  VARCHAR(128),
  //     age   INT,
  //     work  VARCHAR(64)
  //   )"
  // );
  $pdo->query(
    "INSERT INTO syain (id, name, age, work) VALUES
    (10001, '佐藤 一朗', 31, '社員'),
    (10002, '山田 花子', 25, '社員'),
    (10003, '鈴木 次郎', 27, '社員'),
    (20001, '田中 友子', 24, 'パート'),
    "
  );

  $stmt = $pdo->query("SELECT * FROM syain");
  $results = $stmt->fetchALL();
  // print_r($result);
  var_dump($results);

} catch(PDOException $e) {
  echo $e->getMessage() . '<br>';
  exit;
}
?>