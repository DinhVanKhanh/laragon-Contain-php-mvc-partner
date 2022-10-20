<?php
@$typePage; //show from controller
@$template; //show from controller
?>
<div class="textwidget custom-html-widget">
	<div class="menu-top-soup">
		<a href="/partner/soup/search/" target="_blank" rel="noopener noreferrer">SOUP検索</a>
		<font style="color:#fff; font-size:16px;">|</font>
		<a href="https://member.sorimachi.co.jp/form/request_soup/" target="_blank" rel="noopener noreferrer">資料請求</a>
		<font style="color:#fff; font-size:16px;">|</font>
		<a href="mailto:soup@mail.sorimachi.co.jp">お問合せ</a>
		<font style="color:#fff; font-size:16px;">|</font>
		<a href="https://www.sorimachi.co.jp/" target="_blank" rel="noopener noreferrer">ソリマチホームページ</a>
		<font style="color:#fff; font-size:16px;">|</font>
	</div>
</div>

<?php
if (checkLogin($typePage)) : ?>
	<div class="widget_text menu-mobile sp">
		<div class="textwidget custom-html-widget">
			<div class="menu-soup">
				<a class="menu" href="/partner/soup/member/">トップページ</a>
				<a class="menu" href="/partner/soup/member/news.php">お知らせ</a>
				<a class="menu" href="javascript:OpenWinForm('/partner/soup/member/form')">「SOUP検索」情報登録・変更 </a>
				<a class="menu" href="/partner/soup/member/contact.php">ご意見・ご要望フォーム</a>
				<a class="menu" href="/partner/soup/member/download.php">各種ダウンロード </a>
				<a class="menu" href="/partner/soup/member/faq.php" target="_blank" rel="noopener noreferrer">製品Ｑ＆Ａ</a>
				<a class="menu" href="/partner/soup/member/mag.php">メールマガジン バックナンバー</a>
			</div>
		</div>
	</div>
<?php endif ?>


