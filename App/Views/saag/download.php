<?php
//import css and js
require_once __DIR__ . "/../template/index.php";

//import head
require_once __DIR__ . "/../template/header/header.php";

//showDir();
@$typePage; //show from controller
@$template; //show from controller
// var_dump( $_SESSION['saag'] ["user_cd"]);
?>
<!-- Content Left -->
<div id="partner-container">
	<div class="containers clear">
		<div class="sidebar" id="sidebar"><?php require_once __DIR__ .  "/../template/sidebar/sidebar.php"; ?></div>

		<!-- Content Right -->
		<div class="content-right">
			<!-- /** Content 1 **/ -->
			<section id="row1" class="clear">
				<div>
					<h2 class="title-parent">各種ダウンロード</h2>
				</div>
				<div class="index_pttxt">SAAG情報やテンプレートデータ、各種申込用紙をダウンロードできます。</div>
			</section>

			<!-- /** Content 2 **/ -->
			<section id="row2" class="clear" style="margin: 20px 0 40px">
				<div class="row" style="margin:0 auto">
					<a href="<?= __EXWS_AdobeReaderDL__ ?>">
						<img src="/assets/images/year/2019/01/img_pdf.jpg" border="0" width="112" height="33">
					</a>
				</div>
				<div class="index_pttxt">PDFファイルをご覧になる場合は、Acrobat Readerが必要です。<br>※ダウンロードボタンを右クリックし、メニュー内の「対象をファイルに保存」を選んでダウンロードしてください。</div>
			</section>

			<!-- /** Content 3 **/ -->
			<section id="row3" class="clear">
				<div class="row">
					<div class="index_ptmida1" id="nyukai-pack">
						<h3>SAAG入会パック - 製品プログラムダウンロード</h3>
					</div>
					<table border="0" cellspacing="0" cellpadding="0" class="table-form">
						<tr style="background:rgb(252, 220, 221)">
							<th nowrap class="list-table-title">項目</th>
							<th nowrap class="list-table-title list-table-600">更新日</th>
							<th nowrap class="list-table-title list-table-600-3">ファイル名</th>
							<th nowrap class="list-table-title list-table-600">データ</th>
							<th nowrap class="list-table-title" style="font-size:80%;">Download</th>
						</tr>

						<tr>
							<th class="list-table" style="background-image:url(/img/sico_accstd22.png); background-repeat:no-repeat; background-size:50px 50px; background-position: 10px center; padding-left:70px;">会計王22</th>
							<td nowrap class="list-table list-table-600">2022/11/16</td>
							<td nowrap class="list-table list-table-600-3" style="font-size:85%;">accstd22dl.exe</td>
							<td nowrap class="list-table list-table-600">exeファイル<br>(345MB)</td>
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('accstd')"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table" style="background-image:url(/img/sico_accnpo22.png); background-repeat:no-repeat; background-size:50px 50px; background-position: 10px center; padding-left:70px;">会計王22 NPO法人スタイル</th>
							<td nowrap class="list-table list-table-600">2022/11/16</td>
							<td nowrap class="list-table list-table-600-3" style="font-size:85%;">accnpo22dl.exe</td>
							<td nowrap class="list-table list-table-600">exeファイル<br>(334MB)</td>
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('accnpo')"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table" style="background-image:url(/img/sico_accnet22.png); background-repeat:no-repeat; background-size:50px 50px; background-position: 10px center; padding-left:70px;">会計王22 PRO</th>
							<td nowrap class="list-table list-table-600">2022/11/16</td>
							<td nowrap class="list-table list-table-600-3" style="font-size:85%;">accnet22dl.exe</td>
							<td nowrap class="list-table list-table-600">exeファイル<br>(633MB)</td>
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('accnet')"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table" style="background-image:url(/img/sico_psl23.png); background-repeat:no-repeat; background-size:50px 50px; background-position: 10px center; padding-left:70px;">給料王23</th>
							<td nowrap class="list-table list-table-600">2023/11/xx</td>
							<td nowrap class="list-table list-table-600-3" style="font-size:85%;">psl23dl.exe</td>
							<td nowrap class="list-table list-table-600">exeファイル<br>(xxx MB)</td>
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('psl')"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table" style="background-image:url(/img/sico_spr22.png); background-repeat:no-repeat; background-size:50px 50px; background-position: 10px center; padding-left:70px;">販売王22 販売・仕入・在庫</th>
							<td nowrap class="list-table list-table-600">2022/11/16</td>
							<td nowrap class="list-table list-table-600-3" style="font-size:85%;">spr22dl.exe</td>
							<td nowrap class="list-table list-table-600">exeファイル<br>(631MB)</td>
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('spr')"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table" style="background-image:url(/img/sico_accper22.png); background-repeat:no-repeat; background-size:50px 50px; background-position: 10px center; padding-left:70px;">みんなの青色申告22</th>
							<td nowrap class="list-table list-table-600">2022/11/16</td>
							<td nowrap class="list-table list-table-600-3" style="font-size:85%;">accper22dl.exe</td>
							<td nowrap class="list-table list-table-600">exeファイル<br>(342MB)</td>
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('accper')"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table" style="background-image:url(/img/sico_accmed21.png); background-repeat:no-repeat; background-size:50px 50px; background-position: 10px center; padding-left:70px;">MA1</th>
							<td nowrap class="list-table list-table-600">2022/11/16</td>
							<td nowrap class="list-table list-table-600-3" style="font-size:85%;">accmed22inst.exe</td>
							<td nowrap class="list-table list-table-600">exeファイル<br>(301MB)</td>
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('accmed')"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

					</table><br>
※製品ダウンロード方法については [ <a href="./about.php">会員サイトの使い方</a> ] ページをご覧ください。
				</div>

				<div class="row">



					<div class="index_ptmida1">
						<h3>ダウンロードファイル一覧</h3>
					</div>
					<table border="0" cellspacing="0" cellpadding="0" class="table-form">
						<tr style="background:rgb(252, 220, 221)">
							<th nowrap class="list-table-title">項目</th>
							<th nowrap class="list-table-title list-table-600">更新日</th>
							<th nowrap class="list-table-title list-table-600-3">ファイル名</th>
							<th nowrap class="list-table-title list-table-600">データ</th>
							<th nowrap class="list-table-title" style="font-size:80%;">Download</th>
						</tr>

						<tr>
							<th class="list-table"><!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">NEW!</span> <br>-->SAAGサービスメニュー</th>
							<td nowrap class="list-table list-table-600">2022/11/24</td>
							<td nowrap class="list-table list-table-600-3" style="font-size:85%;">saag_service_menu.pdf</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/saag/download_files/saag_service_menu.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table"><!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">NEW!</span> <br>-->規約（2022年11月改訂）</th>
							<td nowrap class="list-table list-table-600">2022/11/24</td>
							<td nowrap class="list-table list-table-600-3" style="font-size:85%;">saag_kiyaku_202211.pdf</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/saag/download_files/saag_kiyaku_202211.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table">SAAGロゴ</th>
							<td nowrap class="list-table list-table-600">2016/07/14</td>
							<td nowrap class="list-table list-table-600-3" style="font-size:85%;">saag_logo.lzh</td>
							<td nowrap class="list-table list-table-600">LZH</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/saag/download_files/saag_logo.lzh"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th nowrap class="list-table">製品注文書</th>
							<td colspan="4">FAXでのご注文は受付しておりません。<br>[ <a href="javascript:OrderLogin();"><b>公式オンラインショップ</b></a> ] にてご購入ください。<!--<br>https://order.sorimachi.co.jp/webdirecr/partnerLogin.html--></td>
						</tr>

						<tr>
							<th class="list-table"><!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">NEW!</span> <br>-->最新製品 レベルアップ項目書</th>
							<td nowrap class="list-table list-table-600">2022/11/24</td>
							<td nowrap class="list-table list-table-600-3" style="font-size:85%;">oh22-01sr_point.zip</td>
							<td nowrap class="list-table list-table-600">ZIP<br>(PDF)</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/saag/download_files/oh22-01sr_point.zip"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table"><!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">NEW!</span> <br>-->最新製品 各種画像</th>
							<td nowrap class="list-table list-table-600">2022/11/24</td>
							<td nowrap class="list-table list-table-600-3" style="font-size:85%;">oh22-01sr_images.zip</td>
							<td nowrap class="list-table list-table-600">ZIP</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/saag/download_files/oh22-01sr_images.zip"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table"><!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">NEW!</span> <br>-->ソリマチ専用帳票 画像一式</th>
							<td nowrap class="list-table list-table-600">2022/12/14</td>
							<td nowrap class="list-table list-table-600-3" style="font-size:85%;">supply_all_images.zip</td>
							<td nowrap class="list-table list-table-600">ZIP</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/saag/download_files/supply_all_images.zip"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table"><span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">NEW!</span> <br>最新製品 価格表（第2版）</th>
							<td nowrap class="list-table list-table-600">2023/04/01</td>
							<td nowrap class="list-table list-table-600-3" style="font-size:85%;">saag_pricelist_22-02.pdf</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/saag/download_files/saag_pricelist_22-02.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
					</table>
				</div>

				<div class="row">
					<div class="index_ptmida1">
						<h3>王シリーズ　製品カタログ（PDFデータ）</h3>
					</div>
					<table border="0" cellspacing="0" cellpadding="0" class="table-form">
						<tr style="background:rgb(252, 220, 221)">
							<th nowrap class="list-table-title">項目</th>
							<th nowrap class="list-table-title list-table-600">更新日</th>
							<th nowrap class="list-table-title">Download</th>
						</tr>

						<tr>
							<th class="list-table"><!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">NEW!</span> -->製品カタログ「会計王22」</th>
							<td nowrap class="list-table list-table-600">2022/11/24</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/brochure/acc_apr22.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table"><!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">NEW!</span> -->製品カタログ「みんなの青色申告22」</th>
							<td nowrap class="list-table list-table-600">2022/11/24</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/brochure/accper22.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table">製品カタログ「会計王21 NPO法人スタイル」</th>
							<td nowrap class="list-table list-table-600">2020/12/03</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/brochure/acn21.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table"><span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">NEW!</span>製品カタログ「給料王23」</th>
							<td nowrap class="list-table list-table-600">2023/11/xx</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/brochure/psl23.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table"><!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">NEW!</span> -->製品カタログ「販売王22／販売王22 販売・仕入・在庫」
							</th>
							<td nowrap class="list-table list-table-600">2022/11/24</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/brochure/sal_spr22.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

					</table>
				</div>

				<div class="row">
					<div class="index_ptmida1">
						<h3>セミナーテキスト（PDF形式）</h3>
					</div>
					<table border="0" cellspacing="0" cellpadding="0" class="table-form">
						<tr style="background:rgb(252, 220, 221)">
							<th nowrap class="list-table-title">項目</th>
							<th nowrap class="list-table-title list-table-600">更新日</th>
							<th nowrap class="list-table-title">Download</th>
						</tr>

						<tr>
							<th class="list-table">
								<!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">&ensp;NEW!&ensp;</span> -->会計王／みんなの青色申告　導入コーステキスト
							</th>
							<td nowrap class="list-table list-table-600">2015/04/17</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/seminar_text/rs_kaikei_dounyuu.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table">
								<!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">&ensp;NEW!&ensp;</span> -->会計王／みんなの青色申告　日常コーステキスト
							</th>
							<td nowrap class="list-table list-table-600">2015/04/17</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/seminar_text/rs_kaikei_nichijou.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table">
								<!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">&ensp;NEW!&ensp;</span> -->会計王　応用コーステキスト
							</th>
							<td nowrap class="list-table list-table-600">2015/04/17</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/seminar_text/rs_kaikei_ouyou.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table">
								<!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">&ensp;NEW!&ensp;</span> -->給料王　導入コーステキスト
							</th>
							<td nowrap class="list-table list-table-600">2015/04/30</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/seminar_text/rs_kyuuryou_dounyuu.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table">
								<!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">&ensp;NEW!&ensp;</span> -->給料王　日常コーステキスト
							</th>
							<td nowrap class="list-table list-table-600">2015/04/30</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/seminar_text/rs_kyuuryou_nichijou.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table">
								<!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">&ensp;NEW!&ensp;</span> -->販売王 販売・仕入・在庫　導入コーステキスト
							</th>
							<td nowrap class="list-table list-table-600">2015/04/30</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/seminar_text/rs_hanbai_dounyuu.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table">
								<!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">&ensp;NEW!&ensp;</span> -->販売王 販売・仕入・在庫　日常販売コーステキスト
							</th>
							<td nowrap class="list-table list-table-600">2015/04/30</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/seminar_text/rs_hanbai_nichijouhanbai.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table">
								<!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">&ensp;NEW!&ensp;</span> -->販売王 販売・仕入・在庫　日常仕入コーステキスト
							</th>
							<td nowrap class="list-table list-table-600">2015/04/30</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/seminar_text/rs_hanbai_nichijousiire.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
					</table>
				</div>

				<div class="row">
					<div class="index_ptmida1">
						<h3>ソフトウェアダウンロード</h3>
					</div>
					<table border="0" cellspacing="0" cellpadding="0" class="table-form">
						<tr style="background:rgb(252, 220, 221)">
							<th nowrap class="list-table-title">項目</th>
							<th nowrap class="list-table-title list-table-600">更新日</th>
							<th nowrap class="list-table-title">Download</th>
						</tr>

						<tr>
							<th class="list-table">
								<?php
								$print = "";
								if (date("Y/m/d") < date("2023/04/01")) {
									$print = '&nbsp;<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif">&ensp;NEW!&ensp;</span><br>';
								}
								echo $print;
								?>
								「みんなの確定申告 SAAG Edition〈令和4年分申告用〉」<br>「みんなの確定申告〈令和4年分申告用〉」<br>Ver.22.00.00
							</th>
							<td nowrap class="list-table list-table-600">2023/01/23</td>
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('kakutei2022')"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table">「みんなの確定申告 SAAG Edition」&nbsp;「みんなの確定申告」<br>※過去のプログラムはこちらからダウンロードできます。<br>
								・<a href="javascript:;" onclick="PageJump('kakutei2021')">令和3年分申告用</a><br>
								・<a href="javascript:;" onclick="PageJump('kakutei2020')">令和2年分申告用</a><br>
								・<a href="javascript:;" onclick="PageJump('kakutei2019')">令和元年分申告用</a><br>
								・<a href="javascript:;" onclick="PageJump('kakutei2018')">平成30年分申告用</a><br>
							</th>
							<td nowrap class="list-table" colspan="2" style="text-align:center">―</td>
						</tr>
						<tr>
							<th class="list-table"><?php echo $print ?>「みんなの電子申告〈令和4年分 e-Tax連携オプション〉」</th>
							<td nowrap class="list-table list-table-600">2023/01/27</td>
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('etax2022')"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table">「みんなの電子申告〈令和3年分 e-Tax連携オプション〉」</th>
							<td nowrap class="list-table list-table-600">2022/01/27</td>
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('etax2021')"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
<!--
						<tr>
							<th class="list-table">「みんなの電子申告〈令和2年分 e-Tax連携オプション〉」</th>
							<td nowrap class="list-table list-table-600">2021/01/26</td>
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('etax2020')"><img src="/assets/images/year/2019/01/dl_01_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
-->
					</table>
				</div>
			</section>
		</div>

		<!-- 会計王ダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/download/accstd22_00/" name="accstd" method="post" target="_blank"><input type="hidden" name="l_id" value="<?= $_SESSION['saag']['login'] ?>" /></form>

		<!-- 会計王NPOダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/download/accnpo22_00/" name="accnpo" method="post" target="_blank"><input type="hidden" name="l_id" value="<?= $_SESSION['saag']['login'] ?>" /></form>

		<!-- 会計王PROダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/download/accnet22_00/" name="accnet" method="post" target="_blank"><input type="hidden" name="l_id" value="<?= $_SESSION['saag']['login'] ?>" /></form>

		<!-- 給料王ダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/download/psl23_00/" name="psl" method="post" target="_blank"><input type="hidden" name="l_id" value="<?= $_SESSION['saag']['login'] ?>" /></form>

		<!-- 販売王ダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/download/sal22_00/" name="sal" method="post" target="_blank"><input type="hidden" name="l_id" value="<?= $_SESSION['saag']['login'] ?>" /></form>

		<!-- 販売王販仕在ダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/download/spr22_00/" name="spr" method="post" target="_blank"><input type="hidden" name="l_id" value="<?= $_SESSION['saag']['login'] ?>" /></form>

		<!-- みん青ダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/download/accper22_00/" name="accper" method="post" target="_blank"><input type="hidden" name="l_id" value="<?= $_SESSION['saag']['login'] ?>" /></form>

		<!-- MA1ダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/download/accmed22_00/" name="accmed" method="post" target="_blank"><input type="hidden" name="l_id" value="<?= $_SESSION['saag']['login'] ?>" /></form>

		<!-- みん確2022(R4)ダウンロードリンク処理（SAAG専用）  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/kakutei_prtn_s/2022/saag_index.php" name="kakutei2022" method="post" target="_blank"><input type="hidden" name="kakutei" value="SAAG"><input type="hidden" name="saag-id" value="<?= $_SESSION['SAAG-ID'] ?>" /></form>

		<!-- eTaxOP2022(R4)ダウンロード処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/etax_prtn_s/2022/index.php" name="etax2022" method="post" target="_blank"><input type="hidden" name="etax2022" value="99"><input type="hidden" name="etax" value="SAAG"><input type="hidden" name="saag-id" value="<?= $_SESSION['SAAG-ID'] ?>" /></form>

		<!-- みん確2021(R3)ダウンロードリンク処理（SAAG専用）  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/kakutei_prtn_s/2021/saag_index.php" name="kakutei2021" method="post" target="_blank"><input type="hidden" name="kakutei" value="SAAG"><input type="hidden" name="saag-id" value="<?= $_SESSION['SAAG-ID'] ?>" /></form>

		<!-- eTaxOP2021(R3)ダウンロード処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/etax_prtn_s/2021/index.php" name="etax2021" method="post" target="_blank"><input type="hidden" name="etax2021" value="99"><input type="hidden" name="etax" value="SAAG"><input type="hidden" name="saag-id" value="<?= $_SESSION['SAAG-ID'] ?>" /></form>

		<!-- みん確2020(R2)ダウンロードリンク処理（SAAG専用）  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/kakutei_prtn_s/2020/saag_index.php" name="kakutei2020" method="post" target="_blank"><input type="hidden" name="kakutei" value="SAAG"><input type="hidden" name="saag-id" value="<?= $_SESSION['SAAG-ID'] ?>" /></form>

		<!-- みん確2019(R1)ダウンロードリンク処理（SAAG専用）  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/kakutei_prtn_s/2019/saag_index.php" name="kakutei2019" method="post" target="_blank"><input type="hidden" name="kakutei" value="SAAG"><input type="hidden" name="saag-id" value="<?= $_SESSION['SAAG-ID'] ?>" /></form>

		<!-- eTaxOP2019(R1)ダウンロード処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/etax_prtn_s/2019/index.php" name="etax2019" method="post" target="_blank"><input type="hidden" name="etax2019" value="99"><input type="hidden" name="etax" value="SAAG"><input type="hidden" name="saag-id" value="<?= $_SESSION['SAAG-ID'] ?>" /></form>

		<!-- みん確2018(H30)ダウンロードリンク処理（SAAG専用） -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/kakutei_prtn_s/2018/saag_index.php" name="kakutei2018" method="post" target="_blank"><input type="hidden" name="kakutei" value="SAAG"><input type="hidden" name="saag-id" value="<?= $_SESSION['SAAG-ID'] ?>" /></form>

		<!-- eTaxOP2018(H30)ダウンロード処理 -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/etax_prtn_s/2018/index.php" name="etax2018" method="post" target="_blank"><input type="hidden" name="etax2018" value="99"><input type="hidden" name="etax" value="SAAG"><input type="hidden" name="saag-id" value="<?= $_SESSION['SAAG-ID'] ?>" /></form>

		<!-- eTaxOP2017(H29)ダウンロード処理 -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/usersupport/products_support/softdownload/etax2017/" name="etax2017" method="post" target="_blank"><input type="hidden" name="etax2017" value="99"></form>

		<!-- みん確2016(H28)ダウンロードリンク処理（SAAG専用） -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/kakutei_prtn_s/2016/saag_index.php" name="kakutei2016" method="post" target="_blank"><input type="hidden" name="kakutei" value="SAAG"><input type="hidden" name="saag-id" value="<?= $_SESSION['SAAG-ID'] ?>" /></form>

		<!-- eTaxOP2016(H28)ダウンロード処理 -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/usersupport/products_support/softdownload/etax2016/" name="etax2016" method="post" target="_blank"><input type="hidden" name="etax2016" value="99"></form>

		<!-- みん確2015(H27)ダウンロードリンク処理（SAAG専用） -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/kakutei_prtn_s/2015/saag_index.php" name="kakutei2015" method="post" target="_blank"><input type="hidden" name="kakutei" value="SAAG"><input type="hidden" name="saag-id" value="<?= $_SESSION['SAAG-ID'] ?>" /></form>

		<!-- eTaxOP2015(H27)ダウンロード処理 -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/usersupport/products_support/softdownload/etax2015/" name="etax2015" method="post" target="_blank"><input type="hidden" name="etax2015" value="99"></form>

		<!-- 販売王５PRO・販売王５郵便番号辞書ダウンロードリンク処理 -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/usersupport/products_support/softdownload/post5/" name="postcode5" method="POST" target="_blank"><input type="hidden" name="postcord5" value="99"></form>
	</div>
</div>
<?php require_once __DIR__ . "/../template/footer/footer.php"; ?>