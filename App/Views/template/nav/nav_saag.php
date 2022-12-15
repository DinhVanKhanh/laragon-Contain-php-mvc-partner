<?php
@$typePage; //show from controller
@$template; //show from controller
?>

<div class="textwidget custom-html-widget">
	<div class="menu-top-saag">
		<a href="/partner/saag/search/" target="_blank" rel="noopener noreferrer">SAAG検索</a>
		<font style="color:#fff; font-size:16px;">|</font>
		<a href="https://member.sorimachi.co.jp/form/request_saag/" target="_blank" rel="noopener noreferrer">資料請求</a>
		<font style="color:#fff; font-size:16px;">|</font>
		<a href="mailto:saag@mail.sorimachi.co.jp">お問合せ</a>
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
		<div class="menu-saag">
			<a class="menu" href="/partner/saag/member/">トップページ</a>
			<a class="menu" href="/partner/saag/member/news.php">お知らせ</a>
			<a class="menu" href="/partner/saag/member/download.php">各種ダウンロード</a>
			<a class="menu pc" href="https://support.sorimachi.co.jp/download-s/sp" target="_blank" rel="noopener noreferrer">最新サービスパック一覧</a>
			<a class="menu" href="/partner/saag/member/faq.php" target="_blank" rel="noopener noreferrer">製品Ｑ＆Ａ</a>
			<a class="menu" href="/partner/saag/member/solution.php">王シリーズ連動製品</a>
			<a class="menu" href="javascript:PageJump('login_jhsn');">助成金補助金診断ナビ for SAAG</a>
			<a class="menu" href="/partner/saag/member/keihi-bank.php">経費Bankパートナー for SAAG</a>
			<a class="menu" href="/partner/saag/member/seminar.php">ビジネスクラスセミナー for SAAG</a>
			<a class="menu" href="/partner/saag/member/mag.php">メールマガジン バックナンバー</a>
			<a class="menu" href="javascript:OpenWinForm('/partner/saag/member/form')">「SAAG検索」情報登録・変更</a>
			<a class="menu" href="/partner/saag/member/contact.php">お問い合わせフォーム</a>
			<a class="menu" href="/partner/sosp/search/" target="_blank" rel="noopener noreferrer">SOSP検索</a>
			<a class="menu" href="/partner/soup/search/" target="_blank" rel="noopener noreferrer">SOUP検索</a>
		</div>
	</div>
</div>
<?php endif ?>