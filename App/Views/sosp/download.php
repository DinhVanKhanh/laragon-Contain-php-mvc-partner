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
							<th nowrap class="list-table">SOSP会員規約</th>
							<td nowrap class="list-table list-table-600">2004/08/05</td>
							<td nowrap class="list-table list-table-600-3">sosp_kiyaku.pdf</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/sosp/download_files/sosp_kiyaku.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th nowrap class="list-table">最新製品 価格表（第4版）</th>
							<td nowrap class="list-table list-table-600">2021/04/30</td>
							<td nowrap class="list-table list-table-600-3" style="word-break:break-all; white-space:normal; font-size:80%;">sosp_pricelist_21-04.pdf</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/sosp/download_files/sosp_pricelist_21-04.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
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
							<th class="list-table">最新製品 レベルアップ項目書 <span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">NEW!</span></th>
							<td nowrap class="list-table list-table-600">2021/12/01</td>
							<td nowrap class="list-table list-table-600-3">oh21-02sr_point.zip</td>
							<td nowrap class="list-table list-table-600">ZIP<br>（PDF）</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/sosp/download_files/oh21-02sr_point.zip"><img src="/assets/images/year/2019/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
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
							<th class="list-table">製品カタログ「会計王21」</th>
							<td nowrap class="list-table list-table-600">2020/12/03</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/brochure/acc_apr21.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table">製品カタログ「みんなの青色申告21」</th>
							<td nowrap class="list-table list-table-600">2020/12/03</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/brochure/accper21.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table">
								<!-- <span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">NEW!</span>--> 製品カタログ「販売王20／販売王20 販売・仕入・在庫」
							</th>
							<td nowrap class="list-table list-table-600">2019/09/02</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/brochure/sal_spr20.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table">製品カタログ「会計王20 NPO法人スタイル」</th>
							<td nowrap class="list-table list-table-600">2020/12/03</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/brochure/acn21.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table">
								<!-- <span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif;">NEW!</span>-->製品カタログ「会計王20 介護事業所スタイル」
							</th>
							<td nowrap class="list-table list-table-600">2019/09/02</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/brochure/acccar20.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table">製品カタログ「給料王21」</th>
							<td nowrap class="list-table list-table-600">2020/12/03</td>
							<td nowrap class="list-table list-table-600">PDF</td>
							<td nowrap class="list-table"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/brochure/psl21.pdf" target="_blank"><img src="/assets/images/year/2019/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
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
								if (date("Y/m/d") < "2022/06/01") {
									$print = '&nbsp;<span style="background-color:#FF3300; color:#FFFFFF; font:bold 100%/110% verdana,sans-serif">&ensp;NEW!&ensp;</span>';
								}
								echo $print;
								?>
								<br>「みんなの確定申告〈令和3年分申告用〉」<br>Ver.21.00.00
							</th>
							<td nowrap class="list-table list-table-600">2022/01/24</td>
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('kakutei2021')"><img src="/assets/images/year/2020/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
						</tr>

						<tr>
							<th class="list-table"><?php echo $print ?><br>「みんなの電子申告〈令和3年分 e-Tax連携オプション〉」</th>
							<td nowrap class="list-table list-table-600">2022/01/27</td>
							<td nowrap class="list-table"><a href="javascript:;" onclick="PageJump('etax2021')"><img src="/assets/images/year/2020/01/dl_02_pdf.png" alt="ダウンロード" border="0"></a></td>
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

		<!-- みん確2021(R2)ダウンロードリンク処理  -->
		<form action="<?= $SERVER_DOWNLOAD_MEMBER ?>/kakutei_prtn_s/2021/" name="kakutei2021" method="post" target="_blank"><input type="hidden" name="kakutei" value="SOSP"><input type="hidden" name="sosp-id" value="<?= $_SESSION['SOSP-ID'] ?>" /></form>

		<!-- eTaxOP2021(R2)ダウンロード処理  -->
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