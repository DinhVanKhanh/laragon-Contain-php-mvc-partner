<?php
@$typePage; //show from controller
@$template; //show from controller
?>
<div class="textwidget custom-html-widget">
	<div class="menu-top-sosp">
		<a href="/partner/sosp/search/" target="_blank" rel="noopener noreferrer">SOSP検索</a>
		<font style="color:#fff; font-size:16px;">|</font>
		<a href="https://member.sorimachi.co.jp/form/request_sosp/" target="_blank" rel="noopener noreferrer">資料請求</a>
		<font style="color:#fff; font-size:16px;">|</font>
		<a href="mailto:sosp@mail.sorimachi.co.jp">お問合せ</a>
		<font style="color:#fff; font-size:16px;">|</font>
		<a href="https://www.sorimachi.co.jp/" target="_blank" rel="noopener noreferrer">ソリマチホームページ</a>
		<font style="color:#fff; font-size:16px;">|</font>
		<?php
			if (checkLogin($typePage)) : ?>
			<a href="./about.php" rel="noopener noreferrer">会員サイトの使い方</a>
			<font style="color:#fff; font-size:16px;">|</font>
		<?php endif ?>
	</div>
</div>
<?php
if (checkLogin($typePage)) : ?>
	<div class="widget_text menu-mobile sp">
		<div class="textwidget custom-html-widget">
			<div class='menu-sosp'>
				<a class='menu' href='/partner/sosp/member/'>トップページ</a>
				<a class='menu' href='/partner/sosp/member/news.php'>お知らせ</a>
				<a class='menu' href="javascript:OpenWinForm('/partner/sosp/member/form')">「SOSP検索」情報登録・変更</a>
				<a class='menu' href='/partner/sosp/member/ordersp.php'>販促物請求フォーム</a>
				<a class='menu' href='/partner/sosp/member/contact.php'>ご意見・ご要望フォーム</a>
				<a class='menu' href='/partner/sosp/member/download.php'>各種ダウンロード</a>
				<a class='menu' href='/partner/sosp/member/faq.php' target='_blank' rel="noopener noreferrer">製品Q&amp;A</a>
				<a class='menu' href='/partner/sosp/member/solution.php'>パートナーソリューション</a>
				<a class='menu' href='/partner/sosp/member/mag.php'>メールマガジン バックナンバー</a>
			</div>
		</div>
	</div>
<?php endif ?>
