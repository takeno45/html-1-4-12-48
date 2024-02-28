<!-- task8-1 PHP -->
<?php
	$errmsg = ''; // エラーメッセージの初期化
	
	// 入力チェック
  //お名前が未入力の場合にエラーメッセージが出る
	if (!$_POST['onamae']){
		$errmsg .= 'お名前が入力されていません<br>';
	}
  //フリガナが未入力の場合にエラーメッセージが出る
	if (!$_POST['furigana']){
		$errmsg .= 'フリガナが入力されていません<br>';
	}
  //メールアドレスが未入力の場合にエラーメッセージが出る
	if (!$_POST['email']){
		$errmsg .= 'メールアドレスが入力されていません<br>';
	}
  //電話番号が未入力の場合にエラーメッセージが出る
	if (!$_POST['tel']){
		$errmsg .= '電話番号が入力されていません<br>';
	}
   //お問合せ項目が未選択の場合にエラーメッセージが出る
	if (!$_POST['koumoku']){
		$errmsg .= 'お問い合わせ項目が選択されていません<br>';
	}
   //お問合せ内容が未入力の場合にエラーメッセージが出る
	if (!$_POST['naiyou']){
		$errmsg .= 'お問い合わせ内容が入力されていません<br>';
	}
	
	// チェックボックスの処理
  //チェックボックスにチェックが入っていない場合はエラーメッセージが出る
	$policy = '';
	if (!isset($_POST['policy'])){
		$errmsg .= '個人情報保護方針にチェックが入っていません<br>';
	}
	else{
		$policy = ' checked';
	}
	
	// 個別バリデーション

  //email
	//値はあるが、＠が入っていない場合はエラーメッセージが出る
	if ($_POST['email'] && false === strpos($_POST['email'], '@')){
		$errmsg .= 'メールアドレスが正しくありません<br>';
	}
  //電話番号
  //電話番号が10桁以上かつ11桁以下でない場合はエラーメッセージが出る
	if (
		$_POST['tel'] 
		&& 
		(
      //strlen=文字列の長さを返す関数 
			!(
				strlen($_POST['tel']) <= 11 
				&& 
				strlen($_POST['tel']) >= 10
			)
		)
	){
		$errmsg .= '電話番号の桁数に誤りがあります<br>';
	}
  
	// お問合せ項目
  //ドロップダウンの配列
	$dropdown_array = array('資料請求', '会社案内', '求人募集', '給料について', '仕事内容');
	$dropdown_html = '<option value="">選択してください</option>';
	foreach ($dropdown_array as $drp){
		$drpselected = '';
		if ($drp == $_POST['koumoku']){
			$drpselected = ' selected';
		}
		$dropdown_html .= '<option value="' . $drp . '"' . $drpselected . '>'. $drp . '</option>';
	}
	
	// ボタン表示及びフォームの飛び先を指定
	//エラーが無い場合は送信ボタンを表示し、task8-2に送信
  $btntext = '送信';
	$posturl = 'task9-1.php';
  //エラーがある場合は確認ボタンを表示し、task8-1
	if ($errmsg){
		$btntext = '確認';
		$posturl = 'task8-1.php';
	}
?>

<!-- index.htmlからのコピー -->
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
   /* エラーメッセージのCSS */
  .errormsg {
    color: red;
    text-align: center;
    font-size:18px;
  }
  /* 確認ボタンのCSS */
  
.form-label_confirmation input[type="submit"] {
    background-color: green; 
    color: white; 
    border:solid 0;
    padding: 22px 77px;
  border-radius: 3px;
  font-weight: bold;
  background-color: green;
  margin: 50px auto;
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
          <p class="sec_01_p">
            お問合せや業務内容に関するご質問は、電話またはこちらのお問合せフォームより承っております。<br />
            後ほど担当者よりご連絡させて頂きます。
          </p>
        </div>
      </div>
      <!-- sec_02 ------------------------------- -->
      <div class="sec_02">
      <div class="errormsg">
				<?php echo $errmsg; ?>
			</div>
      <form method="POST" action="<?php echo $posturl; ?>">
      
          <div class="form-row">
            <div class="form-label">
              <label for="onamae">お名前</label>
              <span>必須</span>
            </div>
            <input type="text" id="onamae" name="onamae" placeholder=" 山田 太朗"  value="<?php echo $_POST['onamae']; ?>"/>
          </div>
          <div class="form-row">
            <div class="form-label">
              <label for="furigana">フリガナ</label>
              <span>必須</span>
            </div>
            <input type="text" id="furigana" name="furigana" placeholder=" ヤマダタロウ" value="<?php echo $_POST['furigana']; ?>"/>
          </div>
          <div class="form-row">
            <div class="form-label">
              <label for="email">メールアドレス:</label>
              <span>必須</span>
            </div>
            <input type="email" id="email" name="email" placeholder="info@fast-creademy.jp" value="<?php echo $_POST['email']; ?>"/>
          </div>
          <div class="form-row">
            <div class="form-label">
              <label for="tel">電話番号</label>
              <span>必須</span>
            </div>
            <input type="tel" id="tel" name="tel" placeholder="0000000000" value="<?php echo $_POST['tel']; ?>"/>
          </div>
          <div class="form-row">
            <div class="form-label">
              <label for="question">お問合せ項目</label>
              <span>必須</span>
            </div>
            <select name="koumoku">
							<?php echo $dropdown_html; ?>
						</select>
          </div>
          <div class="form-row">
            <div class="form-label">
              <label for="naiyou">お問い合わせ内容</label>
              <span>必須</span>
            </div>
            <textarea
              id="naiyou"
              name="naiyou"
              rows="5"
              placeholder="お問い合わせ内容をこちらにご記入ください"
            ><?php echo $_POST['naiyou']; ?></textarea>
          </div>
          <div class="form-row">
            <div class="form-label">
              <label for="policy">個人情報保護方針</label>
              <span>必須</span>
            </div> 
            <label
              ><input type="checkbox" name="policy" value="policy" <?php echo $policy; ?>/>
              <u>個人情報保護方針 </u
              ><span class="material-symbols-outlined"> news </span
              >に同意します。</label
            >
          </div>
          <div class="form-row">
            <div class="form-label_confirmation">
              <input type="submit" name="submit" value="<?php echo $btntext; ?>">
            </div>
          </div>
        </form>
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
