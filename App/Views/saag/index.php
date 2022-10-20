<?php
//import css and js
require_once __DIR__ . "/../template/index.php";
//import header to check islogin()
require_once __DIR__ . "/../template/header/header.php";
//showDir();
@$typePage; //show from controller
@$template; //show from controller
?>

<div id="partner-container">
	<div class="containers clear">
		<div style="font-size:17px; font-weight:bold; border:4px #bbbbbb solid; background-color:#ffffdd; padding:10px; margin-bottom:50px;">
			【記帳支援団体の皆様へお知らせ】<br>
			<a href="https://www.sorimachi.co.jp/j/kdk/" target="_blank">　→「みんなの確定申告〈令和3年分申告用〉」のダウンロードはこちらから</a>
		</div>

		<div class="buttonscroll">
			<button id="btn-last-page2"><a href="#table-price">SAAGご入会・お申込み方法はこちら</a></button>
		</div>

		<div>
			<h2 class="title-parent">SAAG 制度概要</h2>
		</div>
		<div class="p085_150_ui">
			<span style="color:#eb0000">コンサルティングビジネスをネットワークで結ぶトータルサポートシステム</span></br>
			<font face="arila,sans-serif">SAAG (Sorimachi Application Advisory Group)</font>は、反町税務会計事務所を母体とするソリマチが提案する、まったく新しいコンサルティング・ネットワークプログラムです。
		</div>

		<!-- Row 1 -->
		<div class="row">
			<div class="img_stt"><img src="/assets/images/year/2018/11/nb1.png"></div>
			<div class="info_right">
				<div class="index_ptmida">
					<h3>SAAG入会パック</h3>
				</div>
				<div class="index_pttxt">SAAG会員の事務所内使用版として、製品およびバリューサポートを無償でご提供いたします。また、顧問先への導入用として、２製品を無償提供いたします。</div>
			</div>
		</div>

		<!-- Row 2 -->
		<div class="row">
			<div class="img_stt"><img src="/assets/images/year/2018/11/nb2.png"></div>
			<div class="info_right">
				<div class="index_ptmida">
					<h3>バージョンアップ料金無料（SAAG会員対象）</h3>
				</div>
				<div class="index_pttxt">SAAG入会パックの事務所内使用版としてご提供したSAAG会員所有の製品には、税制改正対応版やSAAG会員、ユーザーの要望を反映させたレベルアップ版およびバージョンアップ版をその都度ご提供します。</div>
			</div>
		</div>

		<!-- Row 3 -->
		<div class="row">
			<div class="img_stt"><img src="/assets/images/year/2018/11/nb3.png"></div>
			<div class="info_right">
				<div class="index_ptmida">
					<h3>所内端末向け優待ライセンス販売（SAAG会員対象）</h3>
				</div>
				<div class="index_pttxt">所内のスタッフの方が、それぞれにご使用いただけるよう、お求めやすい価格で、所内ライセンスをご提供いたします。SAAG会員事務所内の複数のパソコンにインストールして運用可能です。</div>
			</div>
		</div>

		<!-- Row 4 -->
		<div class="row">
			<div class="img_stt"><img src="/assets/images/year/2018/11/nb4.png"></div>
			<div class="info_right">
				<div class="index_ptmida">
					<h3>顧問先導入製品優待価格（SAAG会員→顧問先）</h3>
				</div>
				<div class="index_pttxt">ソリマチ「王シリーズ」全製品、さらにはソリマチ専用帳票（サプライ用品）、サポート＆サービス料金も優待価格にてご提供いたします。もちろん導入される顧問先への直送も可能です。</div>
			</div>
		</div>

		<!-- Row 5 -->
		<div class="row">
			<div class="img_stt"><img src="/assets/images/year/2018/11/nb5.png"></div>
			<div class="info_right">
				<div class="index_ptmida">
					<h3>顧問先他社製品乗換特別価格</h3>
				</div>
				<div class="index_pttxt">
					SAAG会員の顧問先で他社会計システムをすでにご利用中の方が当社「会計王」へ22,000円（税込価格）で乗り換えていただける特典です。これにより顧問先とのシステム統一ができます。</br>
					※顧問先が他社製品所有を確認できるものを提示していただく必要がございます。
				</div>
			</div>
		</div>

		<!-- Row 6 -->
		<div class="row">
			<div class="img_stt"><img src="/assets/images/year/2018/11/nb6.png"></div>
			<div class="info_right">
				<div class="index_ptmida">
					<h3>SAAG会員専用コールセンター</h3>
				</div>
				<div class="index_pttxt">SAAG会員専用のコールセンターをご用意しました。専用回線ですから、よりスムーズで的確なサポートをご提供いたします。さらにフリーダイヤルですので通話料金はかかりません。ソリマチはつねに満足度No.1のサポート体制をめざしています。</div>
			</div>
		</div>

		<!-- Row 7 -->
		<div class="row">
			<div class="img_stt"><img src="/assets/images/year/2018/11/nb7.png"></div>
			<div class="info_right">
				<div class="index_ptmida">
					<h3>SAAG会員専用Webサイト</h3>
				</div>
				<div class="index_pttxt">SAAG会員専用Webサイトをご用意。ソリマチ製品の最新情報や、各種ツールがいつでも手に入ります。また、会員様同士の有益な情報交換の場としてもご活用いただけます。</div>
			</div>
		</div>

		<!-- Row 8 -->
		<div class="row">
			<div class="img_stt"><img src="/assets/images/year/2018/11/nb8.png"></div>
			<div class="info_right">
				<div class="index_ptmida">
					<h3>SAAG会員事務所をソリマチホームページで紹介</h3>
				</div>
				<div class="index_pttxt">ソリマチホームページで、登録されたSAAG会員の住所、連絡先、ホームページへのリンクやアピールポイントなどの情報をご提供することができますので、ビジネスチャンスがさらに広がります。</div>
			</div>
		</div>

		<!-- Row 9 -->
		<div class="row">
			<div class="img_stt"><img src="/assets/images/year/2018/11/nb9.png"></div>
			<div class="info_right">
				<div class="index_ptmida">
					<h3>ソリマチ認定インストラクター試験の受験料が無料（所内１名様１回）</h3>
				</div>
				<div class="index_pttxt">
					ソリマチ認定インストラクター「ＳＯＩ」認定試験を、所内１名様１回に限り無料で受験できます。業務のスキルアップと、顧問先からの信頼獲得に役立ちます。</br>
					※認定試験対策セミナーは有料です。
				</div>
			</div>
		</div>

		<!-- Row 10 -->
		<div class="row">
			<div class="img_stt"><img src="/assets/images/year/2018/11/nb10.png"></div>
			<div class="info_right">
				<div class="index_ptmida">
					<h3>会計事務所専用ツールのご提案</h3>
				</div>
				<div class="index_pttxt">ソリマチ「王シリーズ」の連携製品である、各社の会計事務所専用ツールをご提案いたします。</br>
					<div class="colum-50">
						<img src="/assets/images/year/2018/11/saag_img_01.jpg" /></br>
						<font style="font-size:15px; font-weight:bold">達人シリーズ（株式会社ＮＴＴデータ）</font></br>
						法人税、減価償却、消費税、内訳書、概況書、所得税、年調・法定調書、相続税、財産評価など「王シリーズ」と連携し税務申告業務等を効率化する税務ソフトです。電子申告に対応、国税（e-Tax）及び地方税（eLTAX）の電子申告を行なうことができます。</br>
						<a href="http://www.tatsuzin.info" target="_blank">http://www.tatsuzin.info</a>
					</div>

					<div class="colum-50">
						<img src="/assets/images/year/2018/11/saag_img_02.jpg" /></br>
						<font style="font-size:15px; font-weight:bold">フロンティア２１（株式会社オリコンタービレ）</font></br>
						会計・給料の顧問先データをサーバーで簡単に一元管理できます。遠隔地の顧問先ともつなぐ事も可能で自計化推進ツールとして多くの会計事務所が採用しています。</br>
						<a href="http://www.occ21.co.jp" target="_blank">http://www.occ21.co.jp</a>
					</div>
				</div>
			</div>
		</div>

		<!-- Row 11 -->
		<div class="row">
			<div class="img_stt"><img src="/assets/images/year/2018/11/nb11.jpg"></div>
			<div class="info_right">
				<div class="index_ptmida">
					<h3>SAAG会員向けソリューションのご提供</h3>
				</div>
				<div class="index_pttxt">
					<!--SAAG会員向けソリューション</div>-->
					<div class="colum-50">
						<img src="/assets/images/year/2018/11/saag_img_03.jpg" /><br>
						<font style="font-size:15px; font-weight:bold">「経費Bankパートナー for SAAG」</font></br>
						（業務提携：SBIビジネス・ソリューションズ株式会社）</br>
						「会計王」と連動し、経理業務をピンポイントで改善するSaas型の経費精算システム「
						<!--<a href="http://www.sbi-bs.co.jp/01_01_03.html" target="_blank">-->経費Bank
						<!--</a>-->」。</br>
						『経費Bankパートナー for SAAG』として顧問先にご提案・導入をしていただくことで、SAAG会員様だけの特典を受けることができるソリューションサービスです。
					</div>

					<div class="colum-50" style="margin:0">
						<img src="/assets/images/year/2018/11/saag_img_04.jpg" /><br>
						<font style="font-size:15px; font-weight:bold">「ビジネスクラスセミナー for SAAG」</font></br>
						（業務提携：株式会社ファシオ）</br>
						株式会社ファシオが提供するセミナー情報ポータル「<a href="http://www.bc-seminar.jp" target="_blank">ビジネスクラスセミナー</a>」を会員様特別価格でご利用いただくことができます。SAAG会員の皆様が開催するセミナーの告知や集客を支援するサービスです。</br>
						セミナー情報についてはSAAG会員専用Webサイトでもご紹介しています。ぜひご覧ください。
					</div>
				</div>
			</div>
		</div>

		<!--------- TABLE PRICE --------->
		<div id="table-price">
			<h2 class="title-parent">ご入金・お申し込み</h2>
		</div>
		<div class="info-left">
			<div class="row">
				<div class="index_ptmida">
					<h3>期間</h3>
				</div>
				<div class="index_pttxt">期間は、入会日の翌月１日から１年間とします。期間満了までに退会のご連絡がない場合は継続とみなし、年会費をご請求させていただきます。</div>
			</div>
			<div class="row">
				<div class="index_ptmida">
					<h3>会費</h3>
				</div>
				<table cellpadding="0" cellspacing="0" style="text-align:center">
					<tr style="border-top:0.5px dotted #333; border-bottom:0.5px dotted #333">
						<td>登録料</td>
						<td style="font-size:12px;">※初年度のみ</td>
						<td>55,000円（税込価格)</td>
					</tr>
					<tr style="border-top:0.5px dotted #333; border-bottom:0.5px dotted #333">
						<td>年会費</td>
						<td></td>
						<td>55,000円（税込価格)</td>
					</tr>
				</table>
				※登録料は初年度のみ申し受けます。</br>
				※「SAAG」に関する詳しい内容についてはソリマチパートナー事務局までお問い合わせください。
			</div>
		</div>

		<!--------- 手続 --------->
		<div class="info-right">
			<div class="index_ptmida">
				<h3>手続</h3>
			</div>

			<div class="row">
				<div class="index_ptmida1">
					<h3>貴事務所</h3>
				</div>
				<div class="index_pttxt0">
					必要な書類：<b>SAAG入会申込書</b><br>
					※入会申込書のダウンロードは [ <a href="https://www.sorimachi.co.jp/files_pdf/apply/saag_appl.pdf">こちら</a> ]
				</div>
			</div>

			<div class="row">
				<div class="index_ptmida0">
					<h3>最寄のソリマチ営業所</h3>
				</div>
				<div class="index_pttxt0">規約・入会パックをお届けします</div>
			</div>

			<div class="row">
				<div class="index_ptmida0">
					<h3>貴事務所</h3>
				</div>
				<div class="index_pttxt0"><b>ホームページ掲載申込書</b>をお送りください</div>
			</div>

			<div class="row">
				<div class="index_ptmida0">
					<h3>最寄のソリマチ営業所</h3>
				</div>
				<div class="index_pttxt0"><b>
						<font color="#EB0000">SAAG会員証</font>
					</b>をお渡しいたします</div>
			</div>

			<div class="row">
				<div class="index_ptmida0">
					<h3>貴事務所</h3>
				</div>
				<div class="index_pttxt" style="padding-top:10px">
					<span><a href="https://www.sorimachi.co.jp/files_pdf/apply/saag_appl.pdf" target="_blank">「SAAG入会申込書（PDF）」</a>はこちらからダウンロードできます。</span>
					<div class="row" style="margin: 10px 0">
						<div class="btn-down-left"><a href="https://www.sorimachi.co.jp/files_pdf/apply/saag_appl.pdf" target="_blank">
								<img src="/assets/images/year/2018/11/down_pdf.png" alt="「SAAG入会申込書」ダウンロード"></a>
						</div>
						<div style="padding: 5px 0">ボタンを右クリックし、<br>メニューから「対象をファイルに保存」を選択して保存してください。</div>
					</div>
					<div>※「SAAG入会申込書」をご覧になる場合は <a href="http://www.adobe.co.jp/products/acrobat/readstep2.html" target="_blank">Adobe Reader</a> が必要です。</div>
					<div>※ファイルとしてダウンロードしたい場合は、該当するリンクを右クリックし、メニュー内の「対象をファイルに保存」を選んでしてください。</div>
				</div>
			</div>
		</div>


	</div>
</div>
<?php require_once __DIR__ . "/../template/footer/footer.php"; ?>