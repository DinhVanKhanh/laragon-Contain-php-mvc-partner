<?php
//import css and js
require_once __DIR__ . "/../template/index.php";

//import head
require_once __DIR__ . "/../template/header/header.php";

require_once __DIR__ . "/../../inc/newsrelease.php";

// //showDir();
@$typePage; //show from controller. $typePage = saag
@$template; //show from controller. $template = index

global $SORIMACHI_HOME, $SORIMACHI_HOME_SSL;
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
				<div class="row" style="margin:0 auto">
					<a id='saagform' href="javascript:OpenWinForm('/partner/saag/member/form/')"><img class="pic" width="100%" src="/assets/images/year/2018/11/member_img_03.jpg"></a>
				</div>
			</section>

			<!-- /** Content 2 **/ -->
			<section id="row2" class="clear" style="margin-top: 50px">
				<div>
					<h2 class="title-parent">TOPICS</h2>
				</div>
				<div style="width:100%; margin:10px auto 20px;">
					<a href="/partner/saag/member/download.php#nyukai-pack"><img class="pic" width="100%" src="/assets/images/nyukai_pack_saag.png"></a>
<br>※製品ダウンロード方法については [ <a href="./about.php">会員サイトの使い方</a> ] ページをご覧ください。
				</div>

				<div style="width:100%; margin:10px auto">
					<a href="javascript:PageJump('login_jhsn');"><img class="pic" width="100%" src="/assets/images/year/2018/11/member_img_05.jpg"></a>
				</div>
				<div style="width:100%; margin:10px auto">
					<a href="/partner/saag/member/keihi-bank.php" target="_blank"><img class="pic" width="100%" src="/assets/images/year/2018/11/member_img_06.jpg"></a>
				</div>
				<div style="width:100%; margin:10px auto">
					<a href="/partner/saag/member/seminar.php" target="_blank"><img class="pic" width="100%" src="/assets/images/year/2018/11/member_img_04.jpg"></a>
				</div>
			</section>

			<!-- /** Content 3 **/ -->
			<section id="row3" class="clear" style="margin: 50px 0 0;">
				<div>
					<h2 class="title-parent">会員専用サイトのご案内</h2>
				</div>
				<div class="row">
					<div class="index_ptmida">
						<h3>お知らせ</h3><a href="/partner/saag/member/news.php" class="btn_read_more pc"><button>≫ぺージを見る</button></a>
					</div>
					<div class="index_pttxt">SAAG事務局から、SAAG会員様だけにお知らせするホットなニュースを掲載しております。</div>
					<a href="/partner/saag/member/news.php" class="btn_read_more sp"><button>≫ぺージを見る</button></a>
				</div>

				<div class="row">
					<div class="index_ptmida">
						<h3>各種ダウンロード</h3><a href="/partner/saag/member/download.php" class="btn_read_more pc"><button>≫ぺージを見る</button></a>
					</div>
					<div class="index_pttxt">SAAG会員様への情報やテンプレートデータ、各種申込用紙、オプションシステムなどをダウンロードできます。</div>
					<a href="/partner/saag/member/download.php" class="btn_read_more sp"><button>≫ぺージを見る</button></a>
				</div>

				<div class="row" class="pc">
					<div class="index_ptmida">
						<h3>製品サポート情報</h3><a href="https://member.sorimachi.co.jp/" class="btn_read_more pc" target="_blank"><button>≫ぺージを見る</button></a>
					</div>
					<div class="index_pttxt">会計王シリーズの最新のサポート＆サービスをご案内しております。サービスパックはこちらのページからご利用ください。</div>
					<a href="https://member.sorimachi.co.jp/" class="btn_read_more sp" target="_blank"><button>≫ぺージを見る</button></a></button>
				</div>

				<div class="row">
					<div class="index_ptmida">
						<h3>製品Ｑ＆Ａ</h3><a href="/partner/saag/member/faq.php" class="btn_read_more pc" target="_blank"><button>≫ぺージを見る</button></a>
					</div>
					<div class="index_pttxt">ソリマチ製品のＱ＆Ａ集を製品別にご用意しております。</div>
					<a href="/partner/saag/member/faq.php" class="btn_read_more sp" target="_blank"><button>≫ぺージを見る</button></a>
				</div>

				<div class="row">
					<div class="index_ptmida">
						<h3>王シリーズ連動製品</h3><a href="/partner/saag/member/solution.php" class="btn_read_more pc"><button>≫ぺージを見る</button></a>
					</div>
					<div class="index_pttxt">「会計王シリーズ」と連動が可能な製品（ソリューション）の紹介です。貴所で、あるいは顧問先様で、ぜひご活用ください。</div>
					<a href="/partner/saag/member/solution.php" class="btn_read_more sp"><button>≫ぺージを見る</button></a>
				</div>

				<div class="row">
					<div class="index_ptmida">
						<h3>助成金補助金診断ナビ for SAAG</h3><a href="javascript:PageJump('login_jhsn');" class="btn_read_more pc"><button>≫ぺージを見る</button></a>
					</div>
					<div class="index_pttxt">かんたんな質問に答えるだけで、受給可能性のある助成金・補助金を無料で診断します。SAAG会員のお客様は顧問先様にも本サービスをご紹介いただくことができます。</div>
					<a href="javascript:PageJump('login_jhsn');" class="btn_read_more sp"><button>≫ぺージを見る</button></a>
				</div>

				<div class="row">
					<div class="index_ptmida">
						<h3>経費BANKパートナー for SAAG</h3><a href="/partner/saag/member/keihi-bank.php" class="btn_read_more pc"><button>≫ぺージを見る</button></a>
					</div>
					<div class="index_pttxt">「会計王」と連動し、経理業務をピンポイントで改善するSaas型の経費精算システム「経費BANK」。顧問先に提案・導入していただくことで、SAAG会員様だけの特典が受けられます。</div>
					<a href="/partner/saag/member/keihi-bank.php" class="btn_read_more sp"><button>≫ぺージを見る</button></a>
				</div>

				<div class="row">
					<div class="index_ptmida">
						<h3>ビジネスクラスセミナー for SAAG</h3><a href="/partner/saag/member/seminar.php" class="btn_read_more pc" target="_blank"><button>≫ぺージを見る</button></a>
					</div>
					<div class="index_pttxt">セミナー情報ポータル「ビジネスクラスセミナー」を会員特別価格でご利用いただくことができます。SAAG会員様が開催するセミナーの告知や集客を支援するサービスです。</div>
					<a href="/partner/saag/member/seminar.php" class="btn_read_more sp" target="_blank"><button>≫ぺージを見る</button></a>
				</div>

				<div class="row">
					<div class="index_ptmida">
						<h3>メールマガジン バックナンバー</h3><a href="/partner/saag/member/mag.php" class="btn_read_more pc"><button>≫ぺージを見る</button></a>
					</div>
					<div class="index_pttxt">毎月発行のパートナー様向けメールマガジン、およびエンドユーザー様向けのメールマガジンのバックナンバーを掲載しております。</div>
					<a href="/partner/saag/member/mag.php" class="btn_read_more sp"><button>≫ぺージを見る</button></a>
				</div>

				<div class="row">
					<div class="index_ptmida">
						<h3>「SAAG検索」情報登録・変更</h3><a href="javascript:OpenWinForm('/partner/saag/member/form')" class="btn_read_more pc"><button>≫ぺージを見る</button></a>
					</div>
					<div class="index_pttxt">新しくSAAGに入会された会員様、もしくは既存の登録情報に変更のある会員様は、こちらで登録情報申請をお願いします。</div>
					<a href="javascript:OpenWinForm('/partner/saag/member/form')" class="btn_read_more sp"><button>≫ぺージを見る</button></a>
				</div>

				<div class="row">
					<div class="index_ptmida">
						<h3>お問い合わせフォーム</h3><a href="/partner/saag/member/contact.php" class="btn_read_more pc"><button>≫ぺージを見る</button></a>
					</div>
					<div class="index_pttxt">ソリマチ製品やSAAGに対するご意見・ご要望をお寄せください。</div>
					<a href="/partner/saag/member/contact.php" class="btn_read_more sp"><button>≫ぺージを見る</button></a>
				</div>

				<div class="row">
					<div class="index_ptmida">
						<h3>SOSP検索</h3><a href="/partner/sosp/search/" class="btn_read_more pc" target="_blank"><button>≫ぺージを見る</button></a>
					</div>
					<div class="index_pttxt">ソリマチ認定特約店検索です。</div>
					<a href="/partner/sosp/search/" class="btn_read_more sp" target="_blank"><button>≫ぺージを見る</button></a>
				</div>

				<div class="row">
					<div class="index_ptmida">
						<h3>SOUP検索</h3><a href="/partner/soup/search/" class="btn_read_more pc" target="_blank"><button>≫ぺージを見る</button></a>
					</div>
					<div class="index_pttxt">ソリマチ認定ユースウェアパートナー検索です。</div>
					<a href="/partner/soup/search/" class="btn_read_more sp" target="_blank"><button>≫ぺージを見る</button></a>
				</div>

				<div class="row border-form">
					<div style="background-color:#fff; padding:20px">
						<div style="text-align:center; font-size:25px; font-weight:bold; margin-bottom:15px">ソリマチ公式オンラインショップ</div>
						<div class="index_pttxt">いろいろな製品をご注文いただける会員様専用オンラインショッピングサイトです。
							<div style="background:url('/assets/images/year/2018/11/icon_01.jpg') no-repeat; background-position:left center; padding-left:20px"><b>対象となる製品</b></div>
							<div class="index_pttxt">　　パッケージ製品／ネットワーク製品／サプライ用紙／<br>　　バージョンアップ製品／グレードアップ製品</div>
							<div style="background:url('/assets/images/year/2018/11/icon_01.jpg') no-repeat; background-position:left center; padding-left:20px">
								<a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/apply/sgonlineshop_rules.pdf" target="_blank"><b>ソリマチ公式オンラインショップ利用規約</b></a><b>（PDF)</b>
						</div>
<br>※公式オンラインショップの利用方法については [ <a href="./about.php">会員サイトの使い方</a> ] ページをご覧ください。
					</div>
				</div>
			</section>

			<!-- /** Content 4 **/ -->
			<section id="row4" class="clear" style="margin: 20px 0 60px">
				<div>
					<h2 class="title-parent">新着情報</h2>
				</div>
				<div id="news_member" class="scroll-news"><?php IncludeNewsreleaseList(211, 11, 24) ?></div>
			</section>

			<!-- /** Content 5 **/ -->
			<section id="row5" class="clear">
				<div class="row border-form">
					<div style="background-color:#fff; padding:20px">
						<div style="text-align:center; font-size:25px; font-weight:bold; margin-bottom:15px">ビジネスクラスセミナー・ピックアップ！</div>
						<?= getDataRSS("https://www.bc-seminar.jp/rss/saag/index.rdf"); ?>
						<div style='text-align:right; margin-top:8px; margin-bottom:10px; font:bold 13px/16px Meiryo UI,MS UI Gothic,Meiryo,メイリオ,sans-serif'><a href="https://www.bc-seminar.jp/semi-info/premium/?mg=saag" target="_blank">≫すべてのビジネスクラスセミナーはこちらから</a></div>
						<div class="index_ptmida">
							<h3>セミナー情報を掲載したい</h3>
						</div>
						<div class="index_pttxt">
							皆様が開催するセミナーの告知や集客を強力にバックアップ！<br>
							<a href="/partner/saag/member/seminar.php"><b>「ビジネスクラスセミナー for SAAG」のご案内はこちら！</b></a>
						</div>
					</div>
				</div>
			</section>

			<!-- /** Content 7 for mobile **/ -->
			<section id="row7" class="sp" class="clear">
				<div style="width:100%; display:flex; justify-content:center; margin:0 auto 15px">
					<img src="/assets/images/year/2018/11/member_img_01.jpg" width="50%" height="30%" style="margin:0 auto">
				</div>
				<div style="width:100%; display:flex; justify-content:center; margin:0 auto 15px">
					<img src="/assets/images/year/2018/11/member_img_02.jpg" width="50%" height="30%" style="margin:0 auto">
				</div>
			</section>
		</div>

		<!-- みん確2019(R1)ダウンロードリンク処理（SAAG専用） -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/kakutei2019/saag_index.asp" name="kakutei2019" method="post"><input type="hidden" name="kakutei" value="SAAG"></form>

		<!-- eTaxOP2019(R1)ダウンロード処理 -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/products_support/softdownload/etax2019/" name="etax2019" method="post"><input type="hidden" name="etax2019" value="99"></form>

		<!-- メールマガジンバックナンバー（ユーザー向） -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/mag/backnumber/list_u.asp" name="mag_user" method="post"><input type="hidden" name="mag_user" value="partner"></form>

		<!-- メールマガジンバックナンバー（パートナー向） -->
		<form action="<?= $SORIMACHI_HOME_SSL ?>partner/mag/backnumber/list_p.asp" name="mag_partner" method="post"><input type="hidden" name="mag_partner" value="partner"></form>
	</div>
</div>
<?php require_once __DIR__ . "/../template/footer/footer.php"; ?>