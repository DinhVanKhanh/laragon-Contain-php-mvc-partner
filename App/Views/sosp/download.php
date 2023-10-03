<?php
//import css and js
require_once __DIR__ . "/../template/index.php";

//import head
require_once __DIR__ . "/../template/header/header.php";

// //showDir();
@$typePage; //show from controller
@$template; //show from controller

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
					<h2 class="title-parent-sosp">各種ダウンロード</h2>
				</div>
				<div class="index_pttxt">こちらのページより、各種情報・販促ツールをダウンロードしてご活用ください。また「あったら便利！」といったツールがございましたら、ぜひご意見・ご要望をお寄せください。</div>

				<div class="index_pttxt">
					<a href="#terms">規約</a>｜
					<a href="#proposal">販促用チラシ・提案書</a>｜
					<a href="#brochure">ソリマチ製品カタログ</a>
				</div>

				<div class="index_pttxt">
					<a href="#image">画像</a>｜
					<a href="#banner">バナー画像</a>｜
					<a href="#software">ソフトウェアダウンロード</a>
				</div>
				<div class="index_pttxt">※PDFファイルをご利用になる場合は <a href="<?= __EXWS_AdobeReaderDL__ ?>" target="_blank">Adobe Reader</a> が必要です。</div>
			</section>
<br>

			<!-- /** Content 3 **/ -->
			<section id="row3" class="clear">
				<div class="row">
					<div class="index_ptmida1" style="background-color:#0077eb" id="nyukai-pack">
						<h3>「Start Tool BOX」 - 製品プログラムダウンロード</h3>
					</div>
					<table border="0" cellspacing="0" cellpadding="0" class="table-form">
						<tr style="background:rgb(153, 204, 255)">
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
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('accstd')"><img src="/assets/images/year/2019/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table" style="background-image:url(/img/sico_accnpo22.png); background-repeat:no-repeat; background-size:50px 50px; background-position: 10px center; padding-left:70px;">会計王22 NPO法人スタイル</th>
							<td nowrap class="list-table list-table-600">2022/11/16</td>
							<td nowrap class="list-table list-table-600-3" style="font-size:85%;">accnpo22dl.exe</td>
							<td nowrap class="list-table list-table-600">exeファイル<br>(334MB)</td>
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('accnpo')"><img src="/assets/images/year/2019/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table" style="background-image:url(/img/sico_accnet22.png); background-repeat:no-repeat; background-size:50px 50px; background-position: 10px center; padding-left:70px;">会計王22 PRO</th>
							<td nowrap class="list-table list-table-600">2022/11/16</td>
							<td nowrap class="list-table list-table-600-3" style="font-size:85%;">accnet22dl.exe</td>
							<td nowrap class="list-table list-table-600">exeファイル<br>(633MB)</td>
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('accnet')"><img src="/assets/images/year/2019/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table" style="background-image:url(/img/sico_psl23.png); background-repeat:no-repeat; background-size:50px 50px; background-position: 10px center; padding-left:70px;">給料王23</th>
							<td nowrap class="list-table list-table-600">2023/11/xx</td>
							<td nowrap class="list-table list-table-600-3" style="font-size:85%;">psl23dl.exe</td>
							<td nowrap class="list-table list-table-600">exeファイル<br>(xxx MB)</td>
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('psl')"><img src="/assets/images/year/2019/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table" style="background-image:url(/img/sico_spr22.png); background-repeat:no-repeat; background-size:50px 50px; background-position: 10px center; padding-left:70px;">販売王22 販売・仕入・在庫</th>
							<td nowrap class="list-table list-table-600">2022/11/16</td>
							<td nowrap class="list-table list-table-600-3" style="font-size:85%;">spr22dl.exe</td>
							<td nowrap class="list-table list-table-600">exeファイル<br>(631MB)</td>
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('spr')"><img src="/assets/images/year/2019/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table" style="background-image:url(/img/sico_accper22.png); background-repeat:no-repeat; background-size:50px 50px; background-position: 10px center; padding-left:70px;">みんなの青色申告22</th>
							<td nowrap class="list-table list-table-600">2022/11/16</td>
							<td nowrap class="list-table list-table-600-3" style="font-size:85%;">accper22dl.exe</td>
							<td nowrap class="list-table list-table-600">exeファイル<br>(342MB)</td>
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('accper')"><img src="/assets/images/year/2019/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

					</table>

				</div>

				<div class="row">




			<!-- /** Content 2 **/ -->
			<section id="row2" class="clear" style="margin: 20px 0 0">
				<a name="terms"></a>
				<div class="row">
					<div class="index_ptmida1" style="background-color:#0077eb">
						<h3>規約</h3>
					</div>
					<table border="0" cellspacing="0" cellpadding="0" class="table-form">
						<tr style="background:rgb(153, 204, 255)">
							<th nowrap class="list-table-title">項目</th>
							<th nowrap class="list-table-title list-table-600">更新日</th>
							<th nowrap class="list-table-title list-table-600-3">ファイル名</th>
							<th nowrap class="list-table-title list-table-600">データ</th>
							<th nowrap class="list-table-title" style="font-size:80%;">Download</th>
						</tr>

						<tr>
							<th nowrap class="list-table"><!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">NEW!</span> <br>-->SOSP会員規約</th>
							<td nowrap class="list-table list-table-600">2022/12/06</td>
							<td nowrap class="list-table list-table-600-3">sosp_kiyaku.pdf</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/sosp/download_files/sosp_kiyaku.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th nowrap class="list-table"><span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">NEW!</span> <br>最新製品 価格表（第2版）</th>
							<td nowrap class="list-table list-table-600">2023/04/01</td>
							<td nowrap class="list-table list-table-600-3" style="word-break:break-all; white-space:normal; font-size:80%;">sosp_pricelist_22-02.pdf</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/sosp/download_files/sosp_pricelist_22-02.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
					</table>
				</div>

				<a name="proposal"></a>
				<div class="row">
					<div class="index_ptmida1" style="background-color:#0077eb">
						<h3>販促用チラシ・提案書</h3>
					</div>
					<table border="0" cellspacing="0" cellpadding="0" class="table-form">
						<tr style="background:rgb(153, 204, 255)">
							<th nowrap class="list-table-title">項目</th>
							<th nowrap class="list-table-title list-table-600">更新日</th>
							<th nowrap class="list-table-title list-table-600-3">ファイル名</th>
							<th nowrap class="list-table-title list-table-600">データ</th>
							<th nowrap class="list-table-title">Download</th>
						</tr>

						<tr>
							<th class="list-table"><!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">NEW!</span> <br>-->最新製品 レベルアップ項目書</th>
							<td nowrap class="list-table list-table-600">2022/11/24</td>
							<td nowrap class="list-table list-table-600-3">oh22-01sr_point.zip</td>
							<td nowrap class="list-table list-table-600">ZIP<br>（PDF）</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/sosp/download_files/oh22-01sr_point.zip"><img src="/assets/images/year/2019/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
					</table>
				</div>

				<!--【トップに戻る】-->
				<a name="brochure"></a>
				<div class="row">
					<div class="index_ptmida1" style="background-color:#0077eb">
						<h3>王シリーズ　製品カタログ（PDFデータ）</h3>
					</div>
					<table border="0" cellspacing="0" cellpadding="0" class="table-form">
						<tr style="background:rgb(153, 204, 255)">
							<th nowrap class="list-table-title">項目</th>
							<th nowrap class="list-table-title list-table-600">更新日</th>
							<th nowrap class="list-table-title list-table-600">データ</th>
							<th nowrap class="list-table-title">Download</th>
						</tr>

						<tr>
							<th class="list-table"><!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">NEW!</span> <br>-->製品カタログ「会計王22」</th>
							<td nowrap class="list-table list-table-600">2022/11/24</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/brochure/acc_apr22.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table"><!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">NEW!</span> <br>-->製品カタログ「みんなの青色申告22」</th>
							<td nowrap class="list-table list-table-600">2022/11/24</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/brochure/accper22.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table">製品カタログ「会計王21 NPO法人スタイル」</th>
							<td nowrap class="list-table list-table-600">2020/12/03</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/brochure/acn21.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table"><span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">NEW!</span> <br>製品カタログ「給料王23」</th>
							<td nowrap class="list-table list-table-600">2023/11/xx</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/brochure/psl23.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<tr>
							<th class="list-table"><!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">NEW!</span> <br>-->製品カタログ「販売王22／販売王22 販売・仕入・在庫」
							</th>
							<td nowrap class="list-table list-table-600">2022/11/24</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/brochure/sal_spr22.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

					</table>
				</div>

				<a name="image"></a>
				<div class="row">
					<div class="index_ptmida1" style="background-color:#0077eb">
						<h3>画像</h3>
					</div>
					<table border="0" cellspacing="0" cellpadding="0" class="table-form">
						<tr style="background:rgb(153, 204, 255)">
							<th nowrap class="list-table-title">項目</th>
							<th nowrap class="list-table-title list-table-600">更新日</th>
							<th nowrap class="list-table-title list-table-600-3">ファイル名</th>
							<th nowrap class="list-table-title list-table-600">データ</th>
							<th nowrap class="list-table-title">Download</th>
						</tr>

						<tr>
							<th nowrap class="list-table">ロゴ・パッケージ使用規定</th>
							<td nowrap class="list-table list-table-600">2004/09/21</td>
							<td nowrap class="list-table list-table-600-3">logo_shiyoukitei.pdf</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/sosp/download_files/logo_shiyoukitei.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table">
								<!--<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">&ensp;NEW!&ensp;</span><br>-->ソリマチロゴ
							</th>
							<td nowrap class="list-table list-table-600">2018/07/12</td>
							<td nowrap class="list-table list-table-600-3">sorimachi_logo.jpg</td>
							<td nowrap class="list-table list-table-600">JPEG</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/sosp/download_files/sorimachi_logo.jpg" target="_blank"><img src="/assets/images/year/2019/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table">SOSPロゴ</th>
							<td nowrap class="list-table list-table-600">2002/08/14</td>
							<td nowrap class="list-table list-table-600-3">sosplogo.lzh</td>
							<td nowrap class="list-table list-table-600">LZH</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/sosp/download_files/sosplogo.lzh"><img src="/assets/images/year/2019/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table">ソリマチブランドマスターロゴ</th>
							<td nowrap class="list-table list-table-600">2003/04/03</td>
							<td nowrap class="list-table list-table-600-3">sbmlogo.lzh</td>
							<td nowrap class="list-table list-table-600">LZH</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/sosp/download_files/sbmlogo.lzh"><img src="/assets/images/year/2019/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table">最新製品 各種画像 </th>
							<td nowrap class="list-table list-table-600">2020/11/17</td>
							<td nowrap class="list-table list-table-600-3">oh21sr_images.zip</td>
							<td nowrap class="list-table list-table-600">ZIP</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/sosp/download_files/oh21sr_images.zip"><img src="/assets/images/year/2019/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table">ソリマチ専用帳票 画像一式</th>
							<td nowrap class="list-table list-table-600">2017/11/10</td>
							<td nowrap class="list-table list-table-600-3">supply_all_images.zip</td>
							<td nowrap class="list-table list-table-600">ZIP</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/sosp/download_files/supply_all_images.zip"><img src="/assets/images/year/2019/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
					</table>
				</div>

				<a name="banner"></a>
				<div class="row">
					<div class="index_ptmida1" style="background-color:#0077eb">
						<h3>バナー画像</h3>
					</div>
					<table border="0" cellspacing="0" cellpadding="0" class="table-form">
						<tr style="background:rgb(153, 204, 255)">
							<th nowrap class="list-table-title">項目</th>
							<th nowrap class="list-table-title list-table-600">更新日</th>
							<th nowrap class="list-table-title list-table-600">データ</th>
							<th nowrap class="list-table-title">Download</th>
						</tr>

						<tr>
							<th class="list-table">「会計王シリーズ」<br>貴社ウェブサイト用バナー</th>
							<td nowrap class="list-table list-table-600">2017/11/14</td>
							<td nowrap class="list-table list-table-600">ZIP<br>（GIF）</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/sosp/download_files/oh19sr_bnr.zip"><img src="/assets/images/year/2019/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<td colspan="4" class="list-table">
								<div style="margin-bottom:10px;">
									3種類のバナーを1ファイルにまとめた圧縮ファイル(ZIP形式)です。<br>
									<font color="#FF3300">※リンク先のアドレスは弊社製品紹介ページ等をご指定ください。<br>
										<font face="verdana,sans-serif"><b><?= $SORIMACHI_HOME_SSL ?>products_gyou/</b></font>
									</font>
								</div>

								<div style="margin-bottom:10px;">
									<a href="<?= $SORIMACHI_HOME_SSL ?>products_gyou/" target="_blank"><img src="<?= $SORIMACHI_HOME_SSL ?>partner/sosp/download_files/oh19sr_bnr_120_60.gif" border="0" alt="ソリマチ 会計王シリーズ"></a>&emsp;
									<a href="<?= $SORIMACHI_HOME_SSL ?>products_gyou/" target="_blank"><img src="<?= $SORIMACHI_HOME_SSL ?>partner/sosp/download_files/oh19sr_bnr_125_125.gif" border="0" alt="ソリマチ 会計王シリーズ"></a>
								</div>

								<div style="margin-bottom:10px;">
									<a href="<?= $SORIMACHI_HOME_SSL ?>products_gyou/" target="_blank"><img src="<?= $SORIMACHI_HOME_SSL ?>partner/sosp/download_files/oh19sr_bnr_550_60.gif" width="500" border="0" alt="ソリマチ 会計王シリーズ"></a>
								</div>
							</td>
						</tr>
					</table>
				</div>

				<a name="software"></a>
				<div class="row">
					<div class="index_ptmida1" style="background-color:#0077eb">
						<h3>ソフトウェアダウンロード</h3>
					</div>
					<table border="0" cellspacing="0" cellpadding="0" class="table-form">
						<tr style="background:rgb(153, 204, 255)">
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
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('kakutei2022')"><img src="/assets/images/year/2020/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table"><?php echo $print ?>「みんなの電子申告〈令和4年分 e-Tax連携オプション〉」</th>
							<td nowrap class="list-table list-table-600">2023/01/27</td>
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('etax2022')"><img src="/assets/images/year/2020/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>
						<table border="0" cellspacing="0" cellpadding="0" class="table-form" style="margin-top:40px">
							<tr>
								<td class="list-table" valign="top" style="width:112px; border-top:1px solid #ddd"><a href="<?= __EXWS_AdobeReaderDL__ ?>" target="_blank"><img src="/assets/images/year/2020/01/img_pdf.jpg" border="0" width="112" height="33"></a></td>
								<td class="list-table" style="border-top:1px solid #ddd">PDFファイルをご覧になるには<a href="<?= __EXWS_AdobeReaderDL__ ?>" target="_blank">Adobe Reader</a>が必要です。</td>
							</tr>
						</table>
					</table>
				</div>
			</section>

			<!-- /** Content 7 for mobile **/ -->
			<section id="row7" class="sp clear">
				<div style="width:100%; display:flex; justify-content:center; margin:0 auto 15px">
					<img src="/assets/images/year/2018/11/member_img_01.jpg" width="50%" height="30%" style="margin:0 auto">
				</div>
				<div style="width:100%; display:flex; justify-content:center; margin:0 auto 15px">
					<img src="/assets/images/year/2018/11/member_img_02.jpg" width="50%" height="30%" style="margin:0 auto">
				</div>
			</section>
		</div>

		<!-- 会計王ダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/download/accstd22_00/" name="accstd" method="post" target="_blank"><input type="hidden" name="l_id" value="<?= $_SESSION['sosp']['login'] ?>" /></form>

		<!-- 会計王NPOダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/download/accnpo22_00/" name="accnpo" method="post" target="_blank"><input type="hidden" name="l_id" value="<?= $_SESSION['sosp']['login'] ?>" /></form>

		<!-- 会計王PROダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/download/accnet22_00/" name="accnet" method="post" target="_blank"><input type="hidden" name="l_id" value="<?= $_SESSION['sosp']['login'] ?>" /></form>

		<!-- 給料王ダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/download/psl23_00/" name="psl" method="post" target="_blank"><input type="hidden" name="l_id" value="<?= $_SESSION['sosp']['login'] ?>" /></form>

		<!-- 販売王ダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/download/sal22_00/" name="sal" method="post" target="_blank"><input type="hidden" name="l_id" value="<?= $_SESSION['sosp']['login'] ?>" /></form>

		<!-- 販売王販仕在ダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/download/spr22_00/" name="spr" method="post" target="_blank"><input type="hidden" name="l_id" value="<?= $_SESSION['sosp']['login'] ?>" /></form>

		<!-- みん青ダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/download/accper22_00/" name="accper" method="post" target="_blank"><input type="hidden" name="l_id" value="<?= $_SESSION['sosp']['login'] ?>" /></form>

		<!-- みん確2022(R4)ダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/kakutei_prtn_s/2022/" name="kakutei2022" method="post" target="_blank"><input type="hidden" name="kakutei" value="SOSP"><input type="hidden" name="sosp-id" value="<?= $_SESSION['SOSP-ID'] ?>" /></form>

		<!-- eTaxOP2022(R4)ダウンロード処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/etax_prtn_s/2022/" name="etax2022" method="post" target="_blank"><input type="hidden" name="etax2022" value="99"><input type="hidden" name="etax" value="SOSP"><input type="hidden" name="sosp-id" value="<?= $_SESSION['SOSP-ID'] ?>" /></form>

		<!-- みん確2021(R3)ダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/kakutei_prtn_s/2021/" name="kakutei2021" method="post" target="_blank"><input type="hidden" name="kakutei" value="SOSP"><input type="hidden" name="sosp-id" value="<?= $_SESSION['SOSP-ID'] ?>" /></form>

		<!-- eTaxOP2021(R3)ダウンロード処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/etax_prtn_s/2021/" name="etax2021" method="post" target="_blank"><input type="hidden" name="etax2021" value="99"><input type="hidden" name="etax" value="SOSP"><input type="hidden" name="sosp-id" value="<?= $_SESSION['SOSP-ID'] ?>" /></form>

		<!-- みん確2020(R2)ダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/kakutei_prtn_s/2020/" name="kakutei2020" method="post" target="_blank"><input type="hidden" name="kakutei" value="SOSP"><input type="hidden" name="sosp-id" value="<?= $_SESSION['SOSP-ID'] ?>" /></form>

		<!-- eTaxOP2020(R2)ダウンロード処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/etax_prtn_s/2020/" name="etax2020" method="post" target="_blank"><input type="hidden" name="etax2020" value="99"><input type="hidden" name="etax" value="SOSP"><input type="hidden" name="sosp-id" value="<?= $_SESSION['SOSP-ID'] ?>" /></form>

		<!-- みん確2019(R1)ダウンロードリンク処理 -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/kakutei_prtn_s/2019/" name="kakutei2019" method="post" target="_blank"><input type="hidden" name="kakutei" value="SOSP"><input type="hidden" name="sosp-id" value="<?= $_SESSION['SOSP-ID'] ?>" /></form>

		<!-- eTaxOP2019(R1)ダウンロード処理 -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/etax_prtn_s/2019/" name="etax2019" method="post" target="_blank"><input type="hidden" name="etax2018" value="99"><input type="hidden" name="etax" value="SOSP"><input type="hidden" name="sosp-id" value="<?= $_SESSION['SOSP-ID'] ?>" /></form>
	</div>
</div>
<?php require_once __DIR__ . "/../template/footer/footer.php"; ?>