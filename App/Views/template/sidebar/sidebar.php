<div class="sidebar-top">
	<?php
	// $page = getDetailPage();
	// $typePage = $page["type"];
	// $template = $page["template"];
	switch ($typePage) {
		case "saag":
			$img = "member_img_02.jpg";
			dynamic_sidebar($typePage);
			break;

		case "sosp":
			$img = "member_img_02_sosp.jpg";
			dynamic_sidebar($typePage);
			break;

		case "soup":
			dynamic_sidebar($typePage);
			break;

		case "soi":
			echo "<img src='/assets/images/year/2019/04/soi_bnr_01.jpg' width='100%' style='margin-bottom:10px'/>";
			dynamic_sidebar($typePage);
			break;
	}
	?>
</div>

<?php if ($typePage != "soup" && $typePage != "soi") { ?>
	<div id="sticky-sidebar" class="sticky-sidebar">
		<div class="sidebar-bottom">
			<div style="width:100%; margin:0 auto;"><img src="/assets/images/year/2018/11/member_img_01.jpg" width="100%"></div>
			<div style="width:100%; margin:0 auto;"><button onclick="OrderLogin()" style="border:none; width:100%; cursor:pointer; padding:0; margin:0;"><img src="/assets/images/year/2018/11/<?= $img ?>" width="100%"></button></div>
			<div style="margin-top:10px; font-size:16px; line-height:20px; font-weight:bold; padding-left:1em; text-indent:-1em;">
				<a href="https://www.sorimachi.co.jp/files_pdf/apply/sgonlineshop_rules.pdf" target="_blank">≫ ソリマチ公式オンラインショップ 利用規約</a>
			</div>
			<div style="padding-top:10px; font-size:13px; line-height:18px;">利用規約をご覧になるには、<a href="http://www.adobe.com/jp/products/acrobat/readstep2.html" target="_blank">Adobe Reader</a>が必要です。</div>
<?php if ($typePage == "saag" || $typePage == "sosp") { ?>
			<div style="padding-top:10px; font-size:13px; line-height:18px;">
<br>※公式オンラインショップの利用方法については [ <a href="./about.php">会員サイトの使い方</a> ] ページをご覧ください。
			</div>
<?php } ?>
		</div>
	</div>
<?php } ?>

<script>
	function OrderLogin() {
		var win = window.open('https://order.sorimachi.co.jp/webdirect/partnerLogin.html', 'order', 'toolbar=no,location=no,status=no,directories=no,menubar=no,scrollbars=yes,width=800,height=700');
	}
</script>

<?php function dynamic_sidebar($typePage)
{
	switch ($typePage) {
		case 'saag': ?>
			<div class='menu-saag'>
				<a class='menu' href='/partner/saag/member/'>トップページ</a>
				<a class='menu' href='/partner/saag/member/news.php'>お知らせ</a>
				<a class='menu' href='/partner/saag/member/download.php'>各種ダウンロード</a>
				<a class='menu pc' href='https://member.sorimachi.co.jp/' target='_blank'>製品サポート情報</a>
				<a class='menu' href='/partner/saag/member/faq.php' >製品Ｑ＆Ａ</a>
				<a class='menu' href='/partner/saag/member/solution.php'>王シリーズ連動製品</a>
				<a class='menu' href="javascript:PageJump('login_jhsn');">助成金補助金診断ナビ for SAAG</a>
				<a class='menu' href='/partner/saag/member/keihi-bank.php'>経費Bankパートナー for SAAG</a>
				<a class='menu' href='/partner/saag/member/seminar.php'>ビジネスクラスセミナー for SAAG</a>
				<a class='menu' href='/partner/saag/member/mag.php'>メールマガジン バックナンバー</a>
				<a class='menu' href="javascript:OpenWinForm('/partner/saag/member/form')">「SAAG検索」情報登録・変更</a>
				<a class='menu' href='/partner/saag/member/contact.php'>お問い合わせフォーム</a>
				<a class='menu' href='/partner/sosp/search/' target='_blank'>SOSP検索</a>
				<a class='menu' href='/partner/soup/search/' target='_blank'>SOUP検索</a>
			</div>
		<?php break;

		case 'sosp': ?>
			<div class='menu-sosp'>
				<a class='menu' href='/partner/sosp/member/'>トップページ</a>
				<a class='menu' href='/partner/sosp/member/news.php'>お知らせ</a>
				<a class='menu' href="javascript:OpenWinForm('/partner/sosp/member/form')">「SOSP検索」情報登録・変更</a>
				<a class='menu' href='/partner/sosp/member/ordersp.php'>販促物請求フォーム</a>
				<a class='menu' href='/partner/sosp/member/contact.php'>ご意見・ご要望フォーム</a>
				<a class='menu' href='/partner/sosp/member/download.php'>各種ダウンロード</a>
				<a class='menu' href='/partner/sosp/member/faq.php'>製品Q&amp;A</a>
				<a class='menu' href='/partner/sosp/member/solution.php'>パートナーソリューション</a>
				<a class='menu' href='/partner/sosp/member/mag.php'>メールマガジン バックナンバー</a>
			</div>
		<?php break;

		case 'soup': ?>
			<div class='menu-soup'>
				<a class='menu' href='/partner/soup/member/'>トップページ</a>
				<a class='menu' href='/partner/soup/member/news.php'>お知らせ</a>
				<a class='menu' href="javascript:OpenWinForm('/partner/soup/member/form')">「SOUP検索」情報登録・変更 </a>
				<a class='menu' href='/partner/soup/member/contact.php'>ご意見・ご要望フォーム</a>
				<a class='menu' href='/partner/soup/member/download.php'>各種ダウンロード </a>
				<a class='menu' href='/partner/soup/member/faq.php'>製品Ｑ＆Ａ</a>
				<a class='menu' href='/partner/soup/member/mag.php'>メールマガジン バックナンバー</a>
			</div>
		<?php break;

		case 'soi': ?>
			<section id="custom_html-5" class="widget_text widget menu-soi widget_custom_html">
				<div class="textwidget custom-html-widget">
					<a class='menu' href="/partner/soi/">制度概要</a>
					<a class='menu' href="/partner/soi/step.php">お申込から認定まで</a>
					<a class='menu' href="/partner/soi/schedule.php">認定試験・セミナー情報</a>
				</div>
			</section>
<?php break;

		default:
			# code...
			break;
	}
} ?>