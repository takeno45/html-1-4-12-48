<!-- <?php
// for ($year_old =0;$year_old < 8; $year_old++ ){
  // echo "ゆうやは、".$year_old."歳です<br>";
  // echo "ゆうやは、{$year_old}歳です<br>";
// } -->
// $yuya = 0;
// while($yuya <= 7){ // echo "ゆうやは、{$yuya}歳です<br>" ; // $yuya++; // } <?php

// 商品情報の連想配列
$products = array(
    "鉛筆" => array("価格" => 100, "税込価格" => 110),
    "消しゴム" => array("価格" => 200, "税込価格" => 220),
    "定規" => array("価格" => 300, "税込価格" => 330)
);

// 表のヘッダ
echo "<table border='1'>
        <tr>
            <th>商品</th>
            <th>価格</th>
            <th>税込価格</th>
        </tr>";

// 商品情報を表に出力
foreach ($products as $product => $info) {
    echo "<tr>";
    echo "<td>" . $product . "</td>";
    echo "<td>" . $info["価格"] . "円</td>";
    echo "<td>" . $info["税込価格"] . "円</td>";
    echo "</tr>";
}

// 表の終了
echo "</table>";

?>