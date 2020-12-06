<?php 
	// フォームのボタンが押されたら
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// フォームから送信されたデータを各変数に格納
		$name = $_POST["name"];
		$furigana = $_POST["furigana"];
		$email = $_POST["email"];
		$tel = $_POST["tel"];
		$sex = $_POST["sex"];
		$item = $_POST["item"];
		$content  = $_POST["content"];
	}

	// 送信ボタンが押されたら
	if (isset($_POST["submit"])) {
		// 送信ボタンが押された時に動作する処理をここに記述する
        	
		// 日本語をメールで送る場合のおまじない
        	mb_language("ja");
		mb_internal_encoding("UTF-8");
		
		//mb_send_mail("kanda.it.school.trial@gmail.com", "メール送信テスト", "メール本文");

        	// 件名を変数subjectに格納
        	$subject = "［自動送信］お問い合わせ内容の確認";

        	// メール本文を変数bodyに格納
		$body = <<< EOM
{$name}　様

お問い合わせありがとうございます。
以下のお問い合わせ内容を、メールにて確認させていただきました。

===================================================
【 お名前 】 
{$name}

【 ふりがな 】 
{$furigana}

【 メール 】 
{$email}

【 電話番号 】 
{$tel}

【 性別 】 
{$sex}

【 項目 】 
{$item}

【 内容 】 
{$content}
===================================================

内容を確認のうえ、回答させて頂きます。
しばらくお待ちください。
EOM;
        
		// 送信元のメールアドレスを変数fromEmailに格納
		$fromEmail = "souzoukougakukensyu@gmail.com";

		// 送信元の名前を変数fromNameに格納
		$fromName = "お問い合わせテスト";

		// ヘッダ情報を変数headerに格納する		
		$header = "From: " .mb_encode_mimeheader($fromName) ."<{$fromEmail}>";

		// メール送信を行う
		mb_send_mail($email, $subject, $body, $header);

 		// サンクスページに画面遷移させる
		header("Location: https://kitsuya0828.github.io/bookingbears/thanks.php");
		exit;
	}
?>
<?php
include "
<!DOCTYPE html>
<html dir="ltr" lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=yes, maximum-scale=1.0, minimum-scale=1.0">
<meta name="description" content="Booking Bears | 東北大学　青葉山グラウンド・体育館の予約サイト">
<meta name="keywords" content="">
<title>Booking Bears | 東北大学　青葉山グラウンド・体育館の予約サイト</title>
<!-- <link rel="stylesheet" href="style1.css"> -->
<script type="text/javascript" src="contact.js"></script>
<link rel="stylesheet" href="style.css" type="text/css" media="screen">
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<script src="js/css3-mediaqueries.js"></script>
<![endif]-->
</head>
<body>

<!-- ヘッダー -->
<div id="header">
	<div class="inner">
		<h1>東北大学　青葉山グラウンド・体育館の予約サイト</h1>
		<!-- ロゴ -->
		<div class="logo">
			<a href="index.html">Booking Bears<br><!--<span>クマも驚く快適予約</span>--></a>
		</div>
		<!-- / ロゴ -->
		<!-- トップナビゲーション -->
		<ul id="topnav">
			<li><a href="index.html">トップページ<br><span>Top</span></a></li>
			<li><a href="cautions.html">ご利用上の注意<br><span>Cautions</span></a></li>
			<li><a href="introduction.html">体育館・グラウンド紹介<br><span>Introduction</span></a></li>
			<li><a href="developers.html">開発者情報<br><span>Developers</span></a></li>
			<li class="active"><a href="contact.html">お問い合わせ<br><span>Contact</span></a></li>
		</ul>
		<!-- トップナビゲーション -->
	</div>
</div>
<!-- / ヘッダー -->

<div id="wrapper">    
	<!-- コンテンツ -->
	<section id="main">

		<!-- サブ画像 -->
		<div id="mainBanner" class="subImg">
			<img src="images/mainImg2.jpg" alt="" width="940" height="200">
			<div class="slogan">
				<h2>Lorem ipsum dolor sit amet</h2>
				<h3>Donec ut magna in dolor aliquet feugiat eu eget risus.</h3>
			</div>
		</div>
		<!-- / サブ画像 -->

		<section class="content">
            <div><h1>Booking Bears</h1></div>
            <div><h2>お問い合わせ</h2></div>
            <div>
                <form action="confirm.php" method="post">
                        <input type="hidden" name="name" value="<?php echo $name; ?>">
                        <input type="hidden" name="furigana" value="<?php echo $furigana; ?>">
                        <input type="hidden" name="email" value="<?php echo $email; ?>">
                        <input type="hidden" name="tel" value="<?php echo $tel; ?>">
                        <input type="hidden" name="sex" value="<?php echo $sex; ?>">
                        <input type="hidden" name="item" value="<?php echo $item; ?>">
                        <input type="hidden" name="content" value="<?php echo $content; ?>">
                        <h1 class="contact-title">お問い合わせ 内容確認</h1>
                        <p>お問い合わせ内容はこちらで宜しいでしょうか？<br>よろしければ「送信する」ボタンを押して下さい。</p>
                        <div>
                            <div>
                                <label>お名前</label>
                                <p><?php echo $name; ?></p>
                            </div>
                            <div>
                                <label>ふりがな</label>
                                <p><?php echo $furigana; ?></p>
                            </div>
                            <div>
                                <label>メールアドレス</label>
                                <p><?php echo $email; ?></p>
                            </div>
                            <div>
                                <label>電話番号</label>
                                <p><?php echo $tel; ?></p>
                            </div>
                            <div>
                                <label>性別</label>
                                <p><?php echo $sex ?></p>
                            </div>
                            <div>
                                <label>お問い合わせ項目</label>
                                <p><?php echo $item; ?></p>
                            </div>
                            <div>
                                <label>お問い合わせ内容</label>
                                <p><?php echo nl2br($content); ?></p>
                            </div>
                        </div>
                    <input type="button" value="内容を修正する" onclick="history.back(-1)">
                    <button type="submit" name="submit">送信する</button>
                </form>
            </div>
        </section>
        
	</section>
    <!-- / コンテンツ -->

</div>
<!-- / WRAPPER -->

<!-- フッター -->
<div id="footer">
	<div class="inner">
		<!-- 3カラム -->
		<section class="gridWrapper">
			<article class="grid">
				<!-- ロゴ -->
				<a href="index.html"><b>Booking Bears</b><br><!--<span>クマも驚く快適予約</span>--></a>
				<!-- / ロゴ -->
			</article>
			<article class="grid">
				<!-- 電話番号+受付時間 -->
				<p>工学部・工学研究科　教務課学生支援係</p>
				<p class="tel">電話: <strong>022-795-5822</strong></p>
				<p class="mail">E-mail: eng-kose@grp.tohoku.ac.jp</p>
				<!--<p>受付時間: 平日 AM 10:00 〜 PM 5:00</p>-->
				<!-- / 電話番号+受付時間 -->
			</article>
			<article class="grid copyright">
				Copyright(c) 2012 Sample Inc. All Rights Reserved. Design by <a href="http://f-tpl.com" target="_blank" rel="nofollow">http://f-tpl.com</a>
			</article>
		</section>
		<!-- / 3カラム -->
	</div>
</div>
<!-- / フッター -->

</body>
</html>"
?>