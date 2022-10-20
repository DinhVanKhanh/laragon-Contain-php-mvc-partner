<?php
//import css and js
require_once __DIR__ . "/../template/index.php";

//import head
require_once __DIR__ . "/../template/header/header.php";

// //showDir();
@$typePage; //show from controller. $typePage = saag
@$template; //show from controller. $template = index

require_once __DIR__ . "/../../inc/newsrelease.php";

// createSession();

//global $SORIMACHI_HOME, $SORIMACHI_HOME_SSL, $SERVER_DOWNLOAD_MEMBER;
?>
<!-- Content Left -->
<div id="partner-container">
	<div class="containers clear">
		<div class="sidebar" id="sidebar">
			<?php require_once __DIR__ .  "/../template/sidebar/sidebar.php"; ?>
		</div>

		<!-- Content Right -->
		<div class="content-right">
			<div>
				<h2 class="title-parent-soup">お知らせ</h2>
			</div>
			<div>こちらに事務局からのお知らせを随時配信してまいります。</div><br>
			<?php IncludeNewsreleaseBody(213, 1000, $typePage) ?>
		</div>

		<!-- みん確2021(R3)ダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/kakutei_prtn_s/2021/" name="kakutei2021" method="post" target="_blank"><input type="hidden" name="kakutei" value="SOUP"><input type="hidden" name="soup-id" value="<?= $_SESSION['SOUP-ID'] ?>" /></form>

		<!-- eTaxOP2021(R3)ダウンロード処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/etax_prtn_s/2021/" name="etax2021" method="post" target="_blank"><input type="hidden" name="etax2021" value="99"><input type="hidden" name="etax" value="soup-id"><input type="hidden" name="soup-id" value="<?= $_SESSION['SOUP-ID'] ?>" /></form>

		<!-- みん確2020(R2)ダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/kakutei_prtn_s/2020/" name="kakutei2020" method="post" target="_blank"><input type="hidden" name="kakutei" value="SOUP"><input type="hidden" name="soup-id" value="<?= $_SESSION['SOUP-ID'] ?>" /></form>

		<!-- eTaxOP2020(R2)ダウンロード処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/etax_prtn_s/2020/" name="etax2020" method="post" target="_blank"><input type="hidden" name="etax2020" value="99"><input type="hidden" name="etax" value="soup-id"><input type="hidden" name="soup-id" value="<?= $_SESSION['SOUP-ID'] ?>" /></form>

		<!-- みん確2019(R1)ダウンロードリンク処理 -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/kakutei_prtn_s/2019/" name="kakutei2019" method="post"><input type="hidden" name="kakutei" value="SOUP"><input type="hidden" name="soup-id" value="<?= $_SESSION['SOUP-ID'] ?>" /></form>

		<!-- eTaxOP2019(R1)ダウンロード処理 -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/etax_prtn_s/2019/" name="etax2019" method="post" target="_blank"><input type="hidden" name="etax2019" value="99"><input type="hidden" name="etax" value="soup-id"><input type="hidden" name="soup-id" value="<?= $_SESSION['SOUP-ID'] ?>" /></form>

		<!-- みん確2018(H30)ダウンロードリンク処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/kakutei2018/" name="kakutei2018" method="post"><input type="hidden" name="kakutei" value="SOUP"></form>

		<!-- eTaxOP2018(H30)ダウンロード処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/etax2018/" name="etax2018" method="post"><input type="hidden" name="etax2018" value="99"></form>

		<!-- みん確2017(H29)ダウンロードリンク処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/kakutei2017/" name="kakutei2017" method="post"><input type="hidden" name="kakutei" value="SOUP"></form>

		<!-- eTaxOP2017(H29)ダウンロード処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/etax2017/" name="etax2017" method="post"><input type="hidden" name="etax2017" value="99"></form>

		<!-- みん確2016(H28)ダウンロードリンク処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/kakutei2016/" name="kakutei2016" method="post"><input type="hidden" name="kakutei" value="SOUP"></form>

		<!-- eTaxOP2016(H28)ダウンロード処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/etax2016/" name="etax2016" method="post"><input type="hidden" name="etax2016" value="99"></form>

		<!-- みん確2015(H27)ダウンロードリンク処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/kakutei2015/" name="kakutei2015" method="post"><input type="hidden" name="kakutei" value="SOUP"></form>

		<!-- eTaxOP2015(H27)ダウンロード処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/etax2015/" name="etax2015" method="post"><input type="hidden" name="etax2015" value="99"></form>

		<!-- みん確2014(H26)ダウンロードリンク処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/kakutei2014/" name="kakutei2014" method="post"><input type="hidden" name="kakutei" value="SOUP"></form>

		<!-- eTaxOP2014(H26)ダウンロード処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/etax2014/" name="etax2014" method="post"><input type="hidden" name="etax2014" value="99"></form>

		<!-- みん確2013(H25)ダウンロードリンク処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/kakutei2013/" name="kakutei2013" method="post"><input type="hidden" name="kakutei" value="SOUP"></form>

		<!-- eTaxOP2013(H25)ダウンロード処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/etax2013/" name="etax2013" method="post"><input type="hidden" name="etax2013" value="99"></form>

		<!-- みん確2012(H24)ダウンロードリンク処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/kakutei2012/" name="kakutei2012" method="post"><input type="hidden" name="kakutei" value="SOUP"></form>

		<!-- eTaxOP2012(H24)ダウンロード処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/etax2012/" name="etax2012" method="post"><input type="hidden" name="etax2012" value="99"></form>

		<!-- みん確2011(H23)ダウンロードリンク処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/kakutei2011/" name="kakutei2011" method="post"><input type="hidden" name="kakutei" value="SOUP"></form>

		<!-- eTaxOP2011(H23)ダウンロード処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/etax2011/" name="etax2011" method="post"><input type="hidden" name="etax2011" value="99"></form>

		<!-- みん確2010(H22)ダウンロードリンク処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/kakutei2010/" name="kakutei2010" method="post"><input type="hidden" name="kakutei" value="SOUP"></form>

		<!-- eTaxOP2010(H22)ダウンロード処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/etax2010/" name="etax2010" method="post"><input type="hidden" name="etax2010" value="99"></form>

		<!-- みん確2009(H21)ダウンロードリンク処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/kakutei2009/" name="kakutei2009" method="post"><input type="hidden" name="kakutei" value="SOUP"></form>

		<!-- eTaxOP2009(H21)ダウンロード処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/etax2009/" name="etax2009" method="post"><input type="hidden" name="etax2009" value="99"></form>

		<!-- みん確2008(H20)ダウンロードリンク処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/kakutei2008/" name="kakutei2008" method="post"><input type="hidden" name="kakutei" value="SOUP"></form>

		<!-- eTaxOP2008(H20)ダウンロード処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/etax2008/" name="etax2008" method="post"><input type="hidden" name="etax2008" value="99"></form>

		<!-- 販売王５PRO・販売王５郵便番号辞書ダウンロードリンク処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/post5/index.asp" name="postcode5" method="post"><input type="hidden" name="postcord5" value="99"></form>

		<!-- コンビニ収納代行オプション13ダウンロードリンク処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/con_opt13/" name="con_opt13" method="post"><input type="hidden" name="con_opt13" value="99"></form>

		<!-- コンビニ収納代行オプション12ダウンロードリンク処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/con_opt12/" name="con_opt12" method="post"><input type="hidden" name="con_opt12" value="99"></form>

		<!-- コンビニ収納代行オプション11ダウンロードリンク処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/con_opt11/" name="con_opt11" method="post"><input type="hidden" name="con_opt11" value="99"></form>

		<!-- コンビニ収納代行オプション10ダウンロードリンク処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/con_opt10/" name="con_opt10" method="post"><input type="hidden" name="con_opt10" value="99"></form>

		<!-- コンビニ収納代行オプション9ダウンロードリンク処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/con_opt9/index.asp" name="con_opt9" method="post"><input type="hidden" name="con_opt9" value="99"></form>

		<!-- コンビニ収納代行オプション8ダウンロードリンク処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/con_opt8/index.asp" name="con_opt8" method="post"><input type="hidden" name="con_opt8" value="99"></form>

		<!-- コンビニ収納代行オプションダウンロードリンク処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/con_opt7/index.asp" name="con_opt7" method="post"><input type="hidden" name="con_opt7" value="99"></form>

		<!-- コンビニ収納代行オプションダウンロードリンク処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/con_opt17/index.asp" name="con_opt17" method="post"><input type="hidden" name="con_opt17" value="99"></form>

		<!-- コンビニ収納代行オプションダウンロードリンク処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/con_opt/index.asp" name="con_opt" method="post"><input type="hidden" name="con_opt" value="99"></form>

		<!-- 給料王ダウンロード用リンク処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/pay2/pay2download.asp" name="pay2_down" method="post"><input type="hidden" name="pay2" value="99"></form>

		<!-- コンバートツール用リンク処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/convert/index.asp" name="convert" method="post"><input type="hidden" name="convert" value="99"></form>

		<!-- 旧郵便番号辞書ダウンロードリンク処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/post/post.asp" name="postcode" method="post"><input type="hidden" name="postcord" value="99"></form>

		<!-- 「給料王」平成15年度社会保険改正対応リンク処理-->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/kyuryo_kaisei.asp" name="kyuryo_kaisei" method="post"><input type="hidden" name="kyuryo_kaisei" value="99"></form>
	</div>
</div>
<?php require_once __DIR__ . "/../template/footer/footer.php"; ?>