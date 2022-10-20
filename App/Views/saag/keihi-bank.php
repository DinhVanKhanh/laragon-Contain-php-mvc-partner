<?php
//import css and js
require_once __DIR__ . "/../template/index.php";

//import head
require_once __DIR__ . "/../template/header/header.php";

//showDir();
$typePage; //show from controller
$template; //show from controller
global $SORIMACHI_HOME_SSL;

?>
<!-- Content Left -->
<div id="partner-container">
	<div class="containers clear">
		<div class="sidebar" id="sidebar"><?php require_once __DIR__ .  "/../template/sidebar/sidebar.php"; ?></div>

		<!-- Content Right -->
		<div class="content-right">
			<section id="row1" class="clear">
				<div class="title-parent">
					<h2>経費Bankパートナー for SAAG</h2>
				</div>
				<div class="p075_130_ui" style="padding:5px 15px; background-color:#F0F0F0;">本サービスは、<a href="/partner/newsrelease/20080917_sbibs/" target="_blank"><b>SBI ビジネス・ソリューションズ株式会社との業務提携</b></a>により、SAAG会員の皆様にのみご提供するサービスです。</div>
				<div style="clear:both"><img src="/assets/images/saag/bgimg_kbank.jpg" width="100%"></div>
				<div style="font:12px MS UI Gothic,osaka,sans-serif; padding:4px 10px 3px 10px; background-color:#F0F0F0;" align="center">｜<a href="#kbank01">『経費Bankパートナー for SAAG』とは</a>｜<a href="#kbank02">SAAG会員様のメリット</a>｜<a href="#kbank03">お申込方法</a>｜<a href="#kbank04">ご注意事項</a>｜<a href="#kbank05">お問合せ</a>｜</div>
			</section>

			<section id="row2" class="clear" style="margin-top:40px">
				<!-- kbank01 -->
				<a name="kbank01"></a>
				<div class="row">
					<div class="index_ptmida">
						<h3>「経費Bankパートナー for SAAG」とは</h3>
					</div>
					<div>
						<div class="id2" style="padding-top:1ex;">本サービスは、<a href="<?= __EXWS_SBIBSTop__ ?>" target="_blank">SBI ビジネス・ソリューションズ株式会社</a>が提供する「経費Bank」を、SAAG会員様から顧問先様にご紹介・導入していただくプログラムです。</div>
						<div class="id1_2" style="padding-top:2em;">
							<font color="#EB0000">◆</font>
							<font style="font-size:120%;"><b>「経費Bank」について</b></font>
						</div>
						<div class="id2" style="padding-top:1ex;">「日常業務が忙しく、業務改善や予算管理の仕事に時間がとれない！」<BR>「経理の人員が足りない、採用しようにもなかなかよい人が採れない！」<BR>「システム導入を進めようにも、手間もコストもかかり進まない！」</div>
						<div class="id2" style="padding-top:1em;">このような悩みを抱える企業にぜひおすすめしたいのが、Saas型の経費精算システム「経費Bank」です。<BR></div>
						<div class="id2" style="padding-top:1em;">「経費Bank」は SBI ビジネス・ソリューションズ株式会社が提供する、Webブラウザーで利用できる“経費精算システム”です。<BR>
							<font color="#EB0000">いつでもどこからでも申請・承認</font>ができ、取引先への支払依頼と支払予定表による<font color="#EB0000">支払管理</font>、経費集計による<font color="#EB0000">経費分析</font>、<font color="#EB0000">銀行振込データの作成機能</font>が備わっています。<BR>また、会計仕訳データを作成して<font color="#EB0000">「会計王」に取り込む</font>ことが可能です。
						</div>

						<div class="id2" style="padding-top:1em;">
							<table border="0" style="margin:0 auto" width="490" cellspacing="0" cellpadding="0">
								<tr>
									<td height="162" valign="top"><a href="/assets/images/saag/kbank_img01.gif" target="_blank"><img src="/assets/images/saag/kbank_img01s.gif" border="0"></a></td>
									<td height="162" valign="top"><a href="/assets/images/saag/kbank_img02.gif" target="_blank"><img src="/assets/images/saag/kbank_img02s.gif" border="0"></a></td>
								</tr>
								<tr>
									<td style="font:12px MS UI Gothic,osaka,sans-serif;"><a href="/assets/images/saag/kbank_img01.gif" target="_blank">【図1】「経費Bank」システム</a></td>
									<td style="font:12px MS UI Gothic,osaka,sans-serif;"><a href="/assets/images/saag/kbank_img01.gif" target="_blank">【図2】「経費Bank」システム＋振込代行サービス</a></td>
								</tr>
							</table>
						</div>
						<div class="id2" style="padding-top:1em;">
							申請から承認・振込までを網羅した「経費ワンストップサービス」で、経理効率化の実現をサポートします。<BR>
							※詳しくはSBI ビジネス・ソリューションズ（株）のサイトをご覧ください。
							<div style="margin:3px 0px;"><a href="<?= __EXWS_SBIBSKeihiBankIntro__ ?>" target="_blank"><img src="/assets/images/saag/btn_kbank_kbank1.gif" onMouseover="this.src='/assets/images/saag/btn_kbank_kbank2.gif'" onMouseout="this.src='/assets/images/saag/btn_kbank_kbank1.gif'" alt="" border="0"></a></div>
						</div>
						<div class="id1_2" style="margin-top:3em;">
							<font color="#EB0000">◆</font>
							<font style="font-size:120%;"><b>『経費Bankパートナー for SAAG』について</b></font>
						</div>
						<div class="id2" style="margin-top:1ex;">
							一般企業の「経費Bank」導入にご協力いただく税理士・会計事務所などで構成されるパートナー制度が『<b>経費Bankパートナー</b>』です。<BR>
							　(1) 「経費Bank」を必要とするお客様をご紹介いただける方<BR>
							　(2) 企業に対して「経費Bank」を使った経理の改善を進めていただける方<BR>
							　(3) 「経費Bank」の初期設定支援およびお客様からの運用相談に乗っていただける方<BR>
						</div>
						<div class="id2" style="margin-top:1em;">
							さらにこのたびの業務提携により、<font color="#EB0000">SAAG会員の皆様には更なる特典を追加</font>して、会員様専用のパートナー制度 『<b>
								<font color="#EB0000">経費Bankパートナー for SAAG</font>
							</b>』 としてご利用いただくことができるようになりました。<BR>
							今後、顧問先の皆様からのニーズにさらに幅広くお応えいただくために、「経費Bank」をご活用いただければ幸いです。<BR>
						</div>
					</div>
				</div>

				<!-- kbank02 -->
				<a name="kbank02"></a>
				<div class="row">
					<div class="index_ptmida">
						<h3>SAAG会員様のメリット</h3>
					</div>
					<div>
						<div class="id2_4">【<b>1</b>】 貴事務所内で「経費Bank」を無料（システム利用料のみ）でお試しいただけます。<BR></div>
						<div class="id2_4">【<b>2</b>】 初期設定を行なっていただいた場合（*1）には、「経費Bank」初期費用から一定金額を貴所にキックバックいたします。</div>
						<div class="id2_4">【<b>3</b>】 「経費Bank」の月額システム利用料のうち一定割合を乗じた金額を貴所にキックバックいたします。</div>

						<div class="id1_2" style="margin-top:2em;">
							<font color="#EB0000">◆</font>
							<font style="font-size:120%;"><b>パートナー事務所（貴所）手数料</b></font><BR>顧問先様のシステム利用料、およびSAAG会員様の手数料は以下の表の通りです。
						</div>

						<div style="text-align:center; margin-top:10px;"><img src="/assets/images/saag/kbank_img03.gif" border="0"></div>
						<div class="id3_4" style="margin-top:1em;">*1 初期設定では導入先企業様の承認フロー、科目体系、口座情報などを設定していただきます。<font color="#EB0000">この設定を行なっていただいた場合のみ初期設定料をキックバック</font>いたします。</div>
						<div class="id3_4">※ バックアップ・メンテナンスの為、毎月約2時間程度ご利用になれない時間帯がございますので予めご了承ください。時間帯につきましては事前にご連絡させていただきます。</div>
					</div>
				</div>

				<!-- kbank03 -->
				<a name="kbank03"></a>
				<div class="row">
					<div class="index_ptmida">
						<h3>お申込方法</h3>
					</div>
					<div>
						<div class="id1_2" style="margin-top:1em;">
							<font color="#EB0000">◆</font>
							<font style="font-size:120%;"><b>お申し込みの流れ</b></font>
						</div>
						<div style="text-align:center;"><img src="/assets/images/saag/kbank_img04.gif" border="0"></div>

						<div class="id3" style="margin-top:2em;">
							<div style="margin:3px 0px;"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/apply/saag_keihibank.pdf" target="_blank"><img src="/assets/images/saag/btn_kbank_download1.gif" onMouseover="this.src='/assets/images/saag/btn_kbank_download2.gif'" onMouseout="this.src='/assets/images/saag/btn_kbank_download1.gif'" alt="" border="0"></a></div>
							申込書（PDF形式）はこちらからダウンロードしてください。本ファイルには以下の３枚が含まれます。
							<div class="id1_2" style="margin-top:1ex; line-height:130%;">
								・<b>経費Bankパートナー for SAAG 申込書</b> [ SBIビジネス・ソリューションズ宛 ]<BR>
								<font color="#EB0000">※契約時のみ</font>
							</div>
							<div class="id1_2" style="margin:1ex 0px; line-height:130%;">・<b>契約書</b></div>
							<div class="id1_2" style="margin:1ex 0px; line-height:130%;">
								・<b>経費Bank 導入報告書（兼　経費Bank導入支援金申請書）</b> [ ソリマチ宛 ]<BR>
								<font color="#EB0000">※顧問先および一般企業への導入時（その都度）</font>
							</div>
							それぞれ必ず内容をご確認くださいますよう、お願い申しあげます。<BR>
							<div style="font-size:90%; margin-top:3px;">※本ファイルをご利用になるには <a href="<?= __EXWS_AdobeReaderDL__ ?>" target="_blank">Adobe Reader</a> が必要です。</div>
						</div>
					</div>
				</div>

				<!-- kbank04 -->
				<a name="kbank04"></a>
				<div class="row">
					<div class="index_ptmida">
						<h3>ご注意事項</h3>
					</div>
					<div>
						<div class="id2_3">
							<font style="font-size:80%;">●</font>本サービスのご利用はSAAG会員様限定となります。
						</div>
						<div class="id2_3">
							<font style="font-size:80%;">●</font>ご利用に当たっては、必ず利用規約の内容をご確認ください。
						</div>
						<div class="id2_3">
							<font style="font-size:80%;">●</font>「経費Bankパートナー事務所」としてご契約いただいてから２年間、１社も導入案件がない場合は、契約を終了させていただきます。なお、「経費Bank」無料貸出しも同時に終了となりますので、あらかじめご了承ください。
						</div>
						<div class="id2_3">
							<font style="font-size:80%;">●</font>「経費Bankパートナー事務所」は、原則として法人または税理士事務所に限ります。
						</div>
					</div>
				</div>

				<!-- kbank05 -->
				<a name="kbank05"></a>
				<div class="row">
					<div class="index_ptmida">
						<h3>お問合せ</h3>
					</div>
					<div>
						<div class="id2_4" style="margin-top:1em;">
							【 <b>「経費Bank」および「経費Bankパートナー」に関するお問い合わせ</b> 】<BR>SBIビジネス・ソリューションズ株式会社　経費Bankパートナー事務局<BR>
							[TEL] 03-6229-0809　　[FAX] 03-3589-7962
						</div>
						<div class="id2_4" style="margin-top:1em;">
							【 <b>お申し込みに関するお問い合わせ</b> 】<BR>ソリマチ株式会社　パートナー事務局<BR>
							[TEL] 03-3446-1311　　[FAX] 03-5475-5339
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<?php require_once __DIR__ . "/../template/footer/footer.php"; ?>