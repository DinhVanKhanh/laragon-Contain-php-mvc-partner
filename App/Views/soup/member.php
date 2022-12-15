<?php
//import css and js
require_once __DIR__ . "/../template/index.php";

//import head
require_once __DIR__ . "/../template/header/header.php";

require_once __DIR__ . "/../../inc/newsrelease.php";

// //showDir();
@$typePage; //show from controller. $typePage = soup
@$template; //show from controller. $template = index
global $SORIMACHI_HOME_SSL;
?>

<!-- Content Left -->
<div id="partner-container">
    <div class="containers clear">
        <div class="sidebar" id="sidebar">
            <?php require_once __DIR__ .  "/../template/sidebar/sidebar.php"; ?>
        </div>
        <!-- Content Right -->
        <div class="content-right">

			<!-- /** Content 2 **/ -->
            <section id="row1" class="clear">
				<div>
					<h2 class="title-parent-soup">TOPICS</h2>
				</div>
				<div style="width:100%; margin:10px auto">
					<a href="/partner/soup/member/download.php#nyukai-pack"><img class="pic" width="100%" src="/assets/images/nyukai_pack_soup.png"></a>
				</div>
			</section>


            <!-- /** Content 1 **/ -->
            <section id="row2" class="clear" style="margin-top: 50px">
                <div>
                    <h2 class="title-parent-soup">はじめに</h2>
                </div>
                <div>
                    こちらはSOUP会員専用サイトです。ソリマチ認定ユースウェアパートナーとして充実したサービスや適切なサポートを行なっていただくために必要な情報や、ご活用いただける資料を提供してまいります。どんどんご利用ください。<BR>
                    また、ご意見・ご要望もこちらからお寄せください。お待ちしております。
                </div>
            </section>

            <!-- /** Content 2 **/ -->
            <section id="row2" class="clear" style="margin-top: 50px">
                <div>
                    <h2 class="title-parent-soup">会員専用サイトのご案内</h2>
                </div>

                <div class="row">
                    <div class="index_ptmida">
                        <h3>お知らせ</h3><a href="/partner/soup/member/news.php" class="btn_read_more pc"><button>≫ぺージを見る</button></a>
                    </div>
                    <div class="index_pttxt">弊社、およびSOUPに関する最新情報を提供します。</div>
                    <a href="/partner/soup/member/news.php" class="btn_read_more sp"><button>≫ぺージを見る</button></a>
                </div>

                <div class="row">
                    <div class="index_ptmida">
                        <h3>「SOUP検索」情報登録・変更</h3><a href="javascript:OpenWinForm('/partner/soup/member/form')" class="btn_read_more pc"><button>≫ぺージを見る</button></a>
                    </div>
                    <div class="index_pttxt">新しく会員になられた方、およびSOUP検索ページにて表示される項目(住所や電話番号など)について変更があった場合は、こちらから変更してください</div>
                    <a href="javascript:OpenWinForm('/partner/soup/member/form')" class="btn_read_more sp"><button>≫ぺージを見る</button></a>
                </div>

                <div class="row">
                    <div class="index_ptmida">
                        <h3>ご意見・ご要望フォーム</h3><a href="/partner/soup/member/contact.php" class="btn_read_more pc"><button>≫ぺージを見る</button></a>
                    </div>
                    <div class="index_pttxt">ソリマチ（株）、およびＳＯＵＰ制度に対するご意見・ご要望をお寄せください。</div>
                    <a href="/partner/soup/member/contact.php" class="btn_read_more sp"><button>≫ぺージを見る</button></a>
                </div>

                <div class="row">
                    <div class="index_ptmida">
                        <h3>各種ダウンロード</h3><a href="/partner/soup/member/download.php" class="btn_read_more pc"><button>≫ぺージを見る</button></a>
                    </div>
                    <div class="index_pttxt">各種書類や画像がダウンロードできます。</div>
                    <a href="/partner/soup/member/download.php" class="btn_read_more sp"><button>≫ぺージを見る</button></a>
                </div>

                <div class="row">
                    <div class="index_ptmida">
                        <h3>製品Ｑ＆Ａ</h3><a href="/partner/soup/member/faq.php" class="btn_read_more pc" target="_blank"><button>≫ぺージを見る</button></a>
                    </div>
                    <div class="index_pttxt">ソリマチ製品を使っていて困ったことについてお答えします。</div>
                    <a href="/partner/soup/member/faq.php" class="btn_read_more sp" target="_blank"><button>≫ぺージを見る</button></a>
                </div>

                <div class="row">
                    <div class="index_ptmida">
                        <h3>メールマガジン バックナンバー</h3><a href="/partner/soup/member/mag.php" class="btn_read_more pc"><button>≫ぺージを見る</button></a>
                    </div>
                    <div class="index_pttxt">毎月発行のパートナー様向けメールマガジン、およびエンドユーザー様向けのメールマガジンのバックナンバーを掲載しております。</div>
                    <a href="/partner/soup/member/mag.php" class="btn_read_more sp"><button>≫ぺージを見る</button></a>
                </div>
            </section>

            <!-- /** Content 3 **/ -->
            <section id="row3" class="clear" style="margin: 20px 0 60px">
                <div>
                    <h2 class="title-parent-soup">新着情報</h2>
                </div>
                <div id="news_member" class="scroll-news"><?php IncludeNewsreleaseList(213, 11, 24) ?></div>
            </section>
        </div>
    </div>
</div>
<?php require_once __DIR__ . "/../template/footer/footer.php"; ?>