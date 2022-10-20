<?php
//import css and js
require_once __DIR__ . "/../template/index.php";

//import head
require_once __DIR__ . "/../template/header/header.php";

// //showDir();
$typePage; //show from controller
$template; //show from controller
//global $SORIMACHI_HOME_SSL, $SERVER_DOWNLOAD_MEMBER;
?>
<!-- Content Left -->
<div id="partner-container">
	<div class="containers clear">
		<div class="sidebar" id="sidebar">
			<?php require_once __DIR__ .  "/../template/sidebar/sidebar.php"; ?>

		</div>

		<!-- Content Right -->
		<div class="content-right">
			<!-- /** Content 1 **/ -->
			<section id="row1" class="clear">
				<div>
					<h2 class="title-parent-soup">各種ダウンロード</h2>
				</div>
				<div class="index_pttxt">ファイルは、lzhファイル、またはPDFファイル、エクセルファイルでご用意しております。</div>
			</section>

			<!-- /** Content 2 **/ -->
			<section id="row2" class="clear" style="margin: 20px 0 40px">
				<div class="row" style="margin:0 auto">
					<a href="http://www.adobe.com/jp/products/acrobat/readstep2.html"><img src="/assets/images/year/2020/01/img_pdf.jpg" border="0" width="112" height="33"></a>
				</div>
				<div class="index_pttxt">PDFファイルをご覧になる場合は、Acrobat Readerが必要です。<br>※ダウンロードボタンを右クリックし、メニュー内の「対象をファイルに保存」を選んでダウンロードしてください。</div>
			</section>

			<!-- /** Content 3 **/ -->
			<section id="row3" class="clear">
				<div class="row">
					<div class="index_ptmida1" style="background-color:#f60">
						<h3>SOUP書類</h3>
					</div>
					<!-- SOUP書類(START) -->
					<table border="0" cellspacing="0" cellpadding="0" class="table-form">
						<tr style="background:#ffe2d0">
							<th nowrap class="list-table-title">項目</th>
							<th nowrap class="list-table-title list-table-600">更新日</th>
							<th nowrap class="list-table-title list-table-600-3">ファイル名</th>
							<th nowrap class="list-table-title list-table-600">データ</th>
							<th nowrap class="list-table-title" style="font-size:85%;">Download</th>
						</tr>
						<tr>
							<th class="list-table">SOI 認定試験・対策セミナー申込書</th>
							<td nowrap class="list-table list-table-600">2021/03/22</td>
							<td nowrap class="list-table list-table-600-3">soi_appl.pdf</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/apply/soi_appl.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table">SOUP規約
								<!-- <span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">&ensp;NEW!&ensp;</span>-->
								</td>
							<td nowrap class="list-table list-table-600">2013/05/01</td>
							<td nowrap class="list-table list-table-600-3">soup_kiyaku.pdf</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/soup/download_files/soup_kiyaku.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table">ユースウェア業務の手引
								<!-- <span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">&ensp;NEW!&ensp;</span>-->
								</td>
							<td nowrap class="list-table list-table-600">2013/05/01</td>
							<td nowrap class="list-table list-table-600-3">gyoumu.pdf</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/soup/download_files/gyoumu.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table">ユースウェア価格一覧表</td>
							<td nowrap class="list-table list-table-600">2021/03/22</td>
							<td nowrap class="list-table list-table-600-3" style="font-size:85%;">useware21-01_price.pdf</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/soup/download_files/useware21-01_price.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table">レスキュー王ホームページ用申込書
								<!-- <span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">&ensp;NEW!&ensp;</span>-->
								</td>
							<td nowrap class="list-table list-table-600">2013/05/01</td>
							<td nowrap class="list-table list-table-600-3">rescue_201305.pdf</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/soup/download_files/rescue_201305.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table">レスキュー王終了報告書
								<!-- <span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">&ensp;NEW!&ensp;</span>-->
								</td>
							<td nowrap class="list-table list-table-600">2012/02/08</td>
							<td nowrap class="list-table list-table-600-3">rescue_shuryou.pdf</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/soup/download_files/rescue_shuryou.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table">セミナー日程申請書
								<!-- <span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">&ensp;NEW!&ensp;</span>-->
								</td>
							<td nowrap class="list-table list-table-600">2012/02/08</td>
							<td nowrap class="list-table list-table-600-3" style="font-size:85%;">seminar_nittei_shinsei.xls</td>
							<td nowrap class="list-table list-table-600">XLS</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/soup/download_files/seminar_nittei_shinsei.xls" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table">セミナー申込書
								<!-- <span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">&ensp;NEW!&ensp;</span>-->
								</td>
							<td nowrap class="list-table list-table-600">2013/05/01</td>
							<td nowrap class="list-table list-table-600-3">regular_seminar.pdf</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/apply/regular_seminar.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
					</table>
				</div>

				<div class="row">
					<div class="index_ptmida1" style="background-color:#f60">
						<h3>画像</h3>
					</div>
					<table border="0" cellspacing="0" cellpadding="0" class="table-form">
						<tr style="background:#ffe2d0">
							<th nowrap class="list-table-title">項目</th>
							<th nowrap class="list-table-title list-table-600">更新日</th>
							<th nowrap class="list-table-title list-table-600-3">ファイル名</th>
							<th nowrap class="list-table-title list-table-600">データ</th>
							<th nowrap class="list-table-title">Download</th>
						</tr>
						<tr>
							<th class="list-table">ロゴ・パッケージ使用規定(800KB)</td>
							<td nowrap class="list-table list-table-600">2004/09/21</td>
							<td nowrap class="list-table list-table-600-3">logo_shiyoukitei.pdf</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/soup/download_files/logo_shiyoukitei.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table">
								<!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif">&ensp;NEW!&ensp;</span><br>-->ソリマチロゴ(189KB)</td>
							<td nowrap class="list-table list-table-600">2018/07/12</td>
							<td nowrap class="list-table list-table-600-3">sorimachi_logo.jpg</td>
							<td nowrap class="list-table list-table-600">JPEG</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/soup/download_files/sorimachi_logo.jpg" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table">SOUPロゴ(170KB)</td>
							<td nowrap class="list-table list-table-600">2001/11/01</td>
							<td nowrap class="list-table list-table-600-3">souplogo.lzh</td>
							<td nowrap class="list-table list-table-600">LZH</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/soup/download_files/souplogo.lzh" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table">SOTロゴ(145KB)</td>
							<td nowrap class="list-table list-table-600">2001/12/01</td>
							<td nowrap class="list-table list-table-600-3">sotlogo.lzh</td>
							<td nowrap class="list-table list-table-600">LZH</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/soup/download_files/sotlogo.lzh" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table">SOIロゴ(39KB)</td>
							<td nowrap class="list-table list-table-600">2002/08/14</td>
							<td nowrap class="list-table list-table-600-3">soilogo.lzh</td>
							<td nowrap class="list-table list-table-600">LZH</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/soup/download_files/soilogo.lzh" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table">ソリマチブランドマスターロゴ(72KB)</td>
							<td nowrap class="list-table list-table-600">2003/04/03</td>
							<td nowrap class="list-table list-table-600-3">sbmlogo.lzh</td>
							<td nowrap class="list-table list-table-600">LZH</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/soup/download_files/sbmlogo.lzh" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table">ソリマチ認定スクールロゴ(98KB)</td>
							<td nowrap class="list-table list-table-600">2003/04/03</td>
							<td nowrap class="list-table list-table-600-3">schoollogo.lzh</td>
							<td nowrap class="list-table list-table-600">LZH</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/soup/download_files/schoollogo.lzh" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table">最新製品 各種画像</th>
							<td nowrap class="list-table list-table-600">2020/11/17</td>
							<td nowrap class="list-table list-table-600-3">oh21sr_images.zip</td>
							<td nowrap class="list-table list-table-600">ZIP</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/soup/download_files/oh21sr_images.zip" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table">ソリマチ専用帳票 画像一式
								<!-- <span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">&ensp;NEW!&ensp;</span>-->
							</th>
							<td nowrap class="list-table list-table-600">2017/11/10</td>
							<td nowrap class="list-table list-table-600-3">supply_all_images.zip</td>
							<td nowrap class="list-table list-table-600">ZIP</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/soup/download_files/supply_all_images.zip" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
					</table>
				</div>

				<div class="row">
					<div class="index_ptmida1" style="background-color:#f60">
						<h3>王シリーズ関連資料</h3>
					</div>
					<table border="0" cellspacing="0" cellpadding="0" class="table-form">
						<tr style="background:#ffe2d0">
							<th class="list-table-title">項目</th>
							<th nowrap class="list-table-title list-table-600">更新日</th>
							<th nowrap class="list-table-title list-table-600-3">ファイル名</th>
							<th nowrap class="list-table-title list-table-600">データ</th>
							<th nowrap class="list-table-title">Download</th>
						</tr>
						<tr>
							<th class="list-table">最新製品 レベルアップ項目書<br /><span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">NEW!</span></th>
							<td nowrap class="list-table list-table-600">2021/12/01</td>
							<td nowrap class="list-table list-table-600-3">oh21-02sr_point.zip</td>
							<td nowrap class="list-table list-table-600">ZIP<br>（PDF）</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/soup/download_files/oh21-02sr_point.zip" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
					</table>
				</div>

				<div class="row">
					<div class="index_ptmida1" style="background-color:#f60">
						<h3>王シリーズ　製品カタログ（PDFデータ）</h3>
					</div>
					<table border="0" cellspacing="0" cellpadding="0" class="table-form">
						<tr style="background:#ffe2d0">
							<th nowrap class="list-table-title">項目</th>
							<th nowrap class="list-table-title list-table-600">更新日</th>
							<th nowrap class="list-table-title list-table-600">データ</th>
							<th nowrap class="list-table-title">Download</th>
						</tr>

						<tr>
							<th class="list-table">製品カタログ「会計王21」</th>
							<td nowrap class="list-table list-table-600">2020/12/03</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/brochure/acc_apr21.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table">製品カタログ「みんなの青色申告21」</th>
							<td nowrap class="list-table list-table-600">2020/12/03</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/brochure/accper21.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table">
								<!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">NEW!</span>--> 製品カタログ「販売王20／販売王20 販売・仕入・在庫」
							</th>
							<td nowrap class="list-table list-table-600">2019/09/02</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/brochure/sal_spr20.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table">製品カタログ「会計王21 NPO法人スタイル」</th>
							<td nowrap class="list-table list-table-600">2020/12/03</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/brochure/acn21.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table">
								<!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">NEW!</span>--> 製品カタログ「会計王20 介護事業所スタイル」
							</th>
							<td nowrap class="list-table list-table-600">2019/09/02</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/brochure/acccar20.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table">製品カタログ「給料王21」</th>
							<td nowrap class="list-table list-table-600">2020/12/03</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/brochure/psl21.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
					</table>
				</div>

				<div class="row">
					<div class="index_ptmida1" style="background-color:#f60">
						<h3>セミナーテキスト（PDF形式）</h3>
					</div>
					<table border="0" cellspacing="0" cellpadding="0" class="table-form">
						<tr style="background:#ffe2d0">
							<th nowrap class="list-table-title">項目</th>
							<th nowrap class="list-table-title list-table-600">更新日</th>
							<th nowrap class="list-table-title">Download</th>
						</tr>
						<tr>
							<th class="list-table">
								<!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">&ensp;NEW!&ensp;</span> -->会計王／みんなの青色申告　導入コーステキスト
							</th>
							<td nowrap class="list-table list-table-600">2015/04/17</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/seminar_text/rs_kaikei_dounyuu.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table">
								<!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">&ensp;NEW!&ensp;</span> -->会計王／みんなの青色申告　日常コーステキスト
							</th>
							<td nowrap class="list-table list-table-600">2015/04/17</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/seminar_text/rs_kaikei_nichijou.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table">
								<!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">&ensp;NEW!&ensp;</span> -->会計王　応用コーステキスト
							</th>
							<td nowrap class="list-table list-table-600">2015/04/17</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/seminar_text/rs_kaikei_ouyou.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table">
								<!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">&ensp;NEW!&ensp;</span> -->給料王　導入コーステキスト
							</th>
							<td nowrap class="list-table list-table-600">2015/04/30</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/seminar_text/rs_kyuuryou_dounyuu.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table">
								<!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">&ensp;NEW!&ensp;</span> -->給料王　日常コーステキスト
							</th>
							<td nowrap class="list-table list-table-600">2015/04/30</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/seminar_text/rs_kyuuryou_nichijou.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table">
								<!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">&ensp;NEW!&ensp;</span> -->販売王 販売・仕入・在庫　導入コーステキスト
							</th>
							<td nowrap class="list-table list-table-600">2015/04/30</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/seminar_text/rs_hanbai_dounyuu.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table">
								<!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">&ensp;NEW!&ensp;</span> -->販売王 販売・仕入・在庫　日常販売コーステキスト
							</th>
							<td nowrap class="list-table list-table-600">2015/04/30</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/seminar_text/rs_hanbai_nichijouhanbai.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table">
								<!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">&ensp;NEW!&ensp;</span> -->販売王 販売・仕入・在庫　日常仕入コーステキスト
							</th>
							<td nowrap class="list-table list-table-600">2015/04/30</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/seminar_text/rs_hanbai_nichijousiire.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
					</table>
				</div>

				<div class="row">
					<div class="index_ptmida1" style="background-color:#f60">
						<h3>ソフトウェアダウンロード</h3>
					</div>
					<table border="0" cellspacing="0" cellpadding="0" class="table-form">
						<tr style="background:#ffe2d0">
							<th nowrap class="list-table-title">項目</th>
							<th nowrap class="list-table-title list-table-600">更新日</th>
							<th nowrap class="list-table-title">Download</th>
						</tr>
						<tr>
							<th class="list-table">
								<?php
								$print = "";
								if (date("Y/m/d") < "2022/07/01") {
									$print = '&nbsp;<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif">&ensp;NEW!&ensp;</span>';
								}
								echo $print;
								?>
								<br>「みんなの確定申告〈令和3年分申告用〉」<br>Ver.21.00.00
							</th>
							<td nowrap class="list-table list-table-600">2022/01/24</td>
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('kakutei2021')"><img src="/assets/images/year/2020/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table"><?php echo $print ?><br>「みんなの電子申告〈令和3年分 e-Tax連携オプション〉」</th>
							<td nowrap class="list-table list-table-600">2022/01/27</td>
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('etax2021')"><img src="/assets/images/year/2020/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<!-- <tr>
                                    <th class="list-table">販売王・顧客王シリーズ共通<br>郵便番号辞書</th>
                                    <td nowrap class="list-table list-table-600">毎月更新</td>
                                    <td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('postcode5')"><img src="/assets/images/year/2020/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
                                </tr> -->
					</table>
				</div>
			</section>
		</div>

		<!-- みん確2021(R3)ダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/kakutei_prtn_s/2021/" name="kakutei2021" method="post" target="_blank"><input type="hidden" name="kakutei" value="SOUP"><input type="hidden" name="soup-id" value="<?= $_SESSION['SOUP-ID'] ?>" /></form>

		<!-- eTaxOP2021(R3)ダウンロード処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/etax_prtn_s/2021/" name="etax2021" method="post" target="_blank"><input type="hidden" name="etax2021" value="99"><input type="hidden" name="etax" value="SOUP"><input type="hidden" name="soup-id" value="<?= $_SESSION['SOUP-ID'] ?>" /></form>

		<!-- みん確2020(R2)ダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/kakutei_prtn_s/2020/" name="kakutei2020" method="post" target="_blank"><input type="hidden" name="kakutei" value="SOUP"><input type="hidden" name="soup-id" value="<?= $_SESSION['SOUP-ID'] ?>" /></form>

		<!-- eTaxOP2020(R2)ダウンロード処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/etax_prtn_s/2020/" name="etax2020" method="post" target="_blank"><input type="hidden" name="etax2020" value="99"><input type="hidden" name="etax" value="SOUP"><input type="hidden" name="soup-id" value="<?= $_SESSION['SOUP-ID'] ?>" /></form>

		<!-- みん確2019(R1)ダウンロードリンク処理 -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/kakutei_prtn_s/2019/" name="kakutei2019" method="post"><input type="hidden" name="kakutei" value="SOUP"><input type="hidden" name="soup-id" value="<?= $_SESSION['SOUP-ID'] ?>" /></form>

		<!-- eTaxOP2019(R1)ダウンロード処理 -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/etax_prtn_s/2019/" name="etax2019" method="post" target="_blank"><input type="hidden" name="etax2019" value="99"><input type="hidden" name="etax" value="SOUP"><input type="hidden" name="soup-id" value="<?= $_SESSION['SOUP-ID'] ?>" /></form>
	</div>
</div>
<?php require_once __DIR__ . "/../template/footer/footer.php"; ?>