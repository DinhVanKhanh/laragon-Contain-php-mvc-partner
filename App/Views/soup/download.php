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
					<div class="index_ptmida1" style="background-color:#f60" id="nyukai-pack">
						<h3>ソリマチ最新製品プログラムダウンロード<br><span style="font-weight: bold; font-size:80%; color:#ffff00;">※認定タイトルを取得している製品のみインストール可能です</span></h3>
					</div>
					<table border="0" cellspacing="0" cellpadding="0" class="table-form">
						<tr style="background:#ffe2d0">
							<th class="list-table-title">製品名</th>
							<th class="list-table-title">更新日</th>
							<th class="list-table-title">ファイル名</th>
							<th class="list-table-title">データ</th>
							<th class="list-table-title" style="font-size:80%;">Download</th>
						</tr>

						<?php // if(in_array("1",$_SESSION[$typePage]['instructor']) && !empty($_SESSION[$typePage]['instructor']) ): ?>
						<tr>
							<th class="list-table" style="background-image:url(/img/sico_accstd22.png); background-repeat:no-repeat; background-size:50px 50px; background-position: 10px center; padding-left:70px;">会計王22<br><span style="font-weight:normal; font-size:80%;">対象認定タイトル：会計王</span></th>
							<td nowrap class="list-table list-table-600">2022/11/16</td>
							<td nowrap class="list-table list-table-600-3" style="font-size:85%;">accstd22dl.exe</td>
							<td nowrap class="list-table list-table-600">exeファイル<br>(345MB)</td>
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('accstd')"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table" style="background-image:url(/img/sico_accnpo22.png); background-repeat:no-repeat; background-size:50px 50px; background-position: 10px center; padding-left:70px;">会計王22 NPO法人スタイル<br><span style="font-weight:normal; font-size:80%;">対象認定タイトル：会計王</span></th>
							<td nowrap class="list-table list-table-600">2022/11/16</td>
							<td nowrap class="list-table list-table-600-3" style="font-size:85%;">accnpo22dl.exe</td>
							<td nowrap class="list-table list-table-600">exeファイル<br>(334MB)</td>
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('accnpo')"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table" style="background-image:url(/img/sico_accnet22.png); background-repeat:no-repeat; background-size:50px 50px; background-position: 10px center; padding-left:70px;">会計王22 PRO<br><span style="font-weight:normal; font-size:80%;">対象認定タイトル：会計王</span></th>
							<td nowrap class="list-table list-table-600">2022/11/16</td>
							<td nowrap class="list-table list-table-600-3" style="font-size:85%;">accnet22dl.exe</td>
							<td nowrap class="list-table list-table-600">exeファイル<br>(633MB)</td>
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('accnet')"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table" style="background-image:url(/img/sico_accper22.png); background-repeat:no-repeat; background-size:50px 50px; background-position: 10px center; padding-left:70px;">みんなの青色申告22<br><span style="font-weight:normal; font-size:80%;">対象認定タイトル：会計王</span></th>
							<td nowrap class="list-table list-table-600">2022/11/16</td>
							<td nowrap class="list-table list-table-600-3" style="font-size:85%;">accper22dl.exe</td>
							<td nowrap class="list-table list-table-600">exeファイル<br>(342MB)</td>
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('accper')"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<?php // endif; ?>

						<?php // if(in_array("2",$_SESSION[$typePage]['instructor']) && !empty($_SESSION[$typePage]['instructor']) ): ?>
						<tr>
							<th class="list-table" style="background-image:url(/img/sico_psl23.png); background-repeat:no-repeat; background-size:50px 50px; background-position: 10px center; padding-left:70px;">給料王23<br><span style="font-weight:normal; font-size:80%;">対象認定タイトル：給料王</span></th>
							<td nowrap class="list-table list-table-600">2023/11/xx</td>
							<td nowrap class="list-table list-table-600-3" style="font-size:85%;">psl23dl.exe</td>
							<td nowrap class="list-table list-table-600">exeファイル<br>(xxx MB)</td>
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('psl')"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<?php // endif; ?>

						<?php // if(in_array("3",$_SESSION[$typePage]['instructor']) && !empty($_SESSION[$typePage]['instructor']) ): ?>
						<tr>
							<th class="list-table" style="background-image:url(/img/sico_spr22.png); background-repeat:no-repeat; background-size:50px 50px; background-position: 10px center; padding-left:70px;">販売王22販売・仕入・在庫<br><span style="font-weight:normal; font-size:80%;">対象認定タイトル：販売王 販売・仕入・在庫</span></th>
							<td nowrap class="list-table list-table-600">2022/11/16</td>
							<td nowrap class="list-table list-table-600-3" style="font-size:85%;">spr22dl.exe</td>
							<td nowrap class="list-table list-table-600">exeファイル<br>(631MB)</td>
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('spr')"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<?php // endif; ?>

					</table>

				</div>

				<div class="row">

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
							<td nowrap class="list-table list-table-600">2023/09/26</td>
							<td nowrap class="list-table list-table-600-3">soi_appl.pdf</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/apply/soi_appl.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table"><!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">&ensp;NEW!&ensp;</span><br>-->SOUP規約
								</td>
							<td nowrap class="list-table list-table-600">2022/12/06</td>
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
							<th class="list-table">レスキュー王終了報告書
								<!-- <span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">&ensp;NEW!&ensp;</span>-->
								</td>
							<td nowrap class="list-table list-table-600">2023/09/26</td>
							<td nowrap class="list-table list-table-600-3">rescue_shuryou.pdf</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/soup/download_files/rescue_shuryou.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
<!--
						<tr>
							<th class="list-table">セミナー日程申請書</th>
							<td nowrap class="list-table list-table-600">2012/02/08</td>
							<td nowrap class="list-table list-table-600-3" style="font-size:85%;">seminar_nittei_shinsei.xls</td>
							<td nowrap class="list-table list-table-600">XLS</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/soup/download_files/seminar_nittei_shinsei.xls" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table">セミナー申込書</th>
							<td nowrap class="list-table list-table-600">2013/05/01</td>
							<td nowrap class="list-table list-table-600-3">regular_seminar.pdf</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/apply/regular_seminar.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
-->
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
							<th class="list-table"><!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">NEW!</span><br> -->最新製品 レベルアップ項目書</th>
							<td nowrap class="list-table list-table-600">2022/11/24</td>
							<td nowrap class="list-table list-table-600-3">oh22-01sr_point.zip</td>
							<td nowrap class="list-table list-table-600">ZIP<br>（PDF）</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/soup/download_files/oh22-01sr_point.zip" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table"><!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">NEW!</span> -->最新製品 各種画像</th>
							<td nowrap class="list-table list-table-600">2022/11/24</td>
							<td nowrap class="list-table list-table-600-3">oh22-01sr_images.zip</td>
							<td nowrap class="list-table list-table-600">ZIP</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/soup/download_files/oh22-01sr_images.zip" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
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
							<th class="list-table"><!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">NEW!</span> <br>-->製品カタログ「会計王22」</th>
							<td nowrap class="list-table list-table-600">2022/11/24</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/brochure/acc_apr22.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table"><!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">NEW!</span> <br>-->製品カタログ「みんなの青色申告22」</th>
							<td nowrap class="list-table list-table-600">2022/11/24</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/brochure/accper22.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table">製品カタログ「会計王21 NPO法人スタイル」</th>
							<td nowrap class="list-table list-table-600">2020/12/03</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/brochure/acn21.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table"><span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">NEW!</span> <br>製品カタログ「給料王23」</th>
							<td nowrap class="list-table list-table-600">2023/11/xx</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/brochure/psl23.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table"><!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">NEW!</span> <br>-->製品カタログ「販売王22／販売王22 販売・仕入・在庫」
							</th>
							<td nowrap class="list-table list-table-600">2022/11/24</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/brochure/sal_spr22.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
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
								if (date("Y/m/d") < "2023/04/01") {
									$print = '&nbsp;<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif">&ensp;NEW!&ensp;</span><br>';
								}
								echo $print;
								?>
								「みんなの確定申告〈令和4年分申告用〉」<br>Ver.22.00.00
							</th>
							<td nowrap class="list-table list-table-600">2023/01/23</td>
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('kakutei2022')"><img src="/assets/images/year/2020/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table"><?php echo $print ?>「みんなの電子申告〈令和4年分 e-Tax連携オプション〉」</th>
							<td nowrap class="list-table list-table-600">2023/01/27</td>
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('etax2022')"><img src="/assets/images/year/2020/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
<!--
						<tr>
							<th class="list-table">「みんなの電子申告〈令和3年分 e-Tax連携オプション〉」</th>
							<td nowrap class="list-table list-table-600">2022/01/27</td>
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('etax2021')"><img src="/assets/images/year/2020/01/dl_03_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
-->
					</table>
				</div>
			</section>
		</div>

		<!-- 会計王ダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/download/accstd22_00/" name="accstd" method="post" target="_blank"><input type="hidden" name="l_id" value="<?= $_SESSION['soup']['login'] ?>" /></form>

		<!-- 会計王NPOダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/download/accnpo22_00/" name="accnpo" method="post" target="_blank"><input type="hidden" name="l_id" value="<?= $_SESSION['soup']['login'] ?>" /></form>

		<!-- 会計王PROダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/download/accnet22_00/" name="accnet" method="post" target="_blank"><input type="hidden" name="l_id" value="<?= $_SESSION['soup']['login'] ?>" /></form>

		<!-- 給料王ダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/download/psl23_00/" name="psl" method="post" target="_blank"><input type="hidden" name="l_id" value="<?= $_SESSION['soup']['login'] ?>" /></form>

		<!-- 販売王ダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/download/sal22_00/" name="sal" method="post" target="_blank"><input type="hidden" name="l_id" value="<?= $_SESSION['soup']['login'] ?>" /></form>

		<!-- 販売王販仕在ダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/download/spr22_00/" name="spr" method="post" target="_blank"><input type="hidden" name="l_id" value="<?= $_SESSION['soup']['login'] ?>" /></form>

		<!-- みん青ダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/download/accper22_00/" name="accper" method="post" target="_blank"><input type="hidden" name="l_id" value="<?= $_SESSION['soup']['login'] ?>" /></form>

		<!-- みん確2022(R4)ダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/kakutei_prtn_s/2022/" name="kakutei2022" method="post" target="_blank"><input type="hidden" name="kakutei" value="SOUP"><input type="hidden" name="soup-id" value="<?= $_SESSION['SOUP-ID'] ?>" /></form>

		<!-- eTaxOP2022(R4)ダウンロード処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/etax_prtn_s/2022/" name="etax2022" method="post" target="_blank"><input type="hidden" name="etax2022" value="99"><input type="hidden" name="etax" value="SOUP"><input type="hidden" name="soup-id" value="<?= $_SESSION['SOUP-ID'] ?>" /></form>

		<!-- みん確2021(R3)ダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/kakutei_prtn_s/2021/" name="kakutei2021" method="post" target="_blank"><input type="hidden" name="kakutei" value="SOUP"><input type="hidden" name="soup-id" value="<?= $_SESSION['SOUP-ID'] ?>" /></form>

		<!-- eTaxOP2021(R3)ダウンロード処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/etax_prtn_s/2021/" name="etax2021" method="post" target="_blank"><input type="hidden" name="etax2021" value="99"><input type="hidden" name="etax" value="SOUP"><input type="hidden" name="soup-id" value="<?= $_SESSION['SOUP-ID'] ?>" /></form>

		<!-- みん確2020(R2)ダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/kakutei_prtn_s/2020/" name="kakutei2020" method="post" target="_blank"><input type="hidden" name="kakutei" value="SOUP"><input type="hidden" name="soup-id" value="<?= $_SESSION['SOUP-ID'] ?>" /></form>

		<!-- eTaxOP2020(R2)ダウンロード処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/etax_prtn_s/2020/" name="etax2020" method="post" target="_blank"><input type="hidden" name="etax2020" value="99"><input type="hidden" name="etax" value="SOUP"><input type="hidden" name="soup-id" value="<?= $_SESSION['SOUP-ID'] ?>" /></form>

	</div>
</div>
<?php require_once __DIR__ . "/../template/footer/footer.php"; ?>