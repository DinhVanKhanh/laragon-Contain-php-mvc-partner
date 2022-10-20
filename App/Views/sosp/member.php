<?php
//import css and js
require_once __DIR__ . "/../template/index.php";

//import head
require_once __DIR__ . "/../template/header/header.php";

// //showDir();
@$typePage; //show from controller. $typePage = sosp
@$template; //show from controller. $template = index

require_once __DIR__ . "/../../inc/newsrelease.php";
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
                    <h2 class="title-parent-sosp">はじめに</h2>
                </div>
                <div class="index_pttxt">
                    日頃より、ソリマチ製品の販促支援をいただき、誠にありがとうございます。<br>
                    ソリマチ製品を販売していただく上で、「こんな情報が欲しい」「こんな資料が欲しい」等ございましたら、<br>
                    <a href="javascript:PageJump('order')">ご意見･ご要望</a>をどんどんお聞かせください。
                </div>
            </section>

            <!-- /** Content 2 **/ -->
            <section id="row2" class="clear" style="margin-top: 50px">
                <div>
                    <h2 class="title-parent-sosp">会員専用サイトのご案内</h2>
                </div>
                <div class="row">
                    <div class="index_ptmida">
                        <h3>お知らせ</h3><a href="/partner/sosp/member/news.php" class="btn_read_more pc"><button>≫ぺージを見る</button></a>
                    </div>
                    <div class="index_pttxt">SOSP事務局からのお知らせを掲載しております。</div>
                    <a href="/partner/sosp/member/news.php" class="btn_read_more sp"><button>≫ぺージを見る</button></a>
                </div>

                <div class="row">
                    <div class="index_ptmida">
                        <h3>「SOSP検索」情報登録・変更</h3><a href="javascript:OpenWinForm('/partner/sosp/member/form')" class="btn_read_more pc"><button>≫ぺージを見る</button></a>
                    </div>
                    <div class="index_pttxt">新しくSOSPに入会された加盟店様、早速こちらより会員登録をお願いします。また、会員登録情報に変更がある方はこちらで登録情報の変更申請をお願いします。</div>
                    <a href="javascript:OpenWinForm('/partner/sosp/member/form')" class="btn_read_more sp"><button>≫ぺージを見る</button></a>
                </div>

                <div class="row">
                    <div class="index_ptmida">
                        <h3>販促物請求フォーム</h3><a href="/partner/sosp/member/ordersp.php" class="btn_read_more pc"><button>≫ぺージを見る</button></a>
                    </div>
                    <div class="index_pttxt">販促物をご請求の場合はこちらのフォームよりお気軽にお申込みください。</div>
                    <a href="/partner/sosp/member/ordersp.php" class="btn_read_more sp"><button>≫ぺージを見る</button></a>
                </div>

                <div class="row">
                    <div class="index_ptmida">
                        <h3>ご意見・ご要望フォーム</h3><a href="/partner/sosp/member/contact.php" class="btn_read_more pc"><button>≫ぺージを見る</button></a>
                    </div>
                    <div class="index_pttxt">ソリマチ製品やSOSPに対するご意見・ご要望をお寄せください。</div>
                    <a href="/partner/sosp/member/contact.php" class="btn_read_more sp"><button>≫ぺージを見る</button></a>
                </div>

                <div class="row">
                    <div class="index_ptmida">
                        <h3>各種ダウンロード</h3><a href="/partner/sosp/member/download.php" class="btn_read_more pc"><button>≫ぺージを見る</button></a>
                    </div>
                    <div class="index_pttxt">販促用の資料はこちらよりダウンロードしご使用ください。</div>
                    <a href="/partner/sosp/member/download.php" class="btn_read_more sp"><button>≫ぺージを見る</button></a>
                </div>

                <div class="row">
                    <div class="index_ptmida">
                        <h3>製品Q＆A</h3><a href="/partner/sosp/member/faq.php" class="btn_read_more pc" target="_blank"><button>≫ぺージを見る</button></a>
                    </div>
                    <div class="index_pttxt">ソリマチ製品のQ＆A集を製品別にご用意しております。</div>
                    <a href="/partner/sosp/member/faq.php" class="btn_read_more sp" target="_blank"><button>≫ぺージを見る</button></a>
                </div>

                <div class="row">
                    <div class="index_ptmida">
                        <h3>パートナーソリューション</h3><a href="/partner/sosp/member/solution.php" class="btn_read_more pc"><button>≫ぺージを見る</button></a>
                    </div>
                    <div class="index_pttxt">ソリマチ「王シリーズ」と連動するパートナーソリューションのご紹介です。</div>
                    <a href="/partner/sosp/member/solution.php" class="btn_read_more sp"><button>≫ぺージを見る</button></a>
                </div>

                <div class="row">
                    <div class="index_ptmida">
                        <h3>メールマガジンバックナンバー</h3><a href="/partner/sosp/member/mag.php" class="btn_read_more pc"><button>≫ぺージを見る</button></a>
                    </div>
                    <div class="index_pttxt">毎月発行のパートナー様向けメールマガジン、およびエンドユーザー様向けのメールマガジンのバックナンバーを掲載しております。</div>
                    <a href="/partner/sosp/member/mag.php" class="btn_read_more sp"><button>≫ぺージを見る</button></a>
                </div>

                <div class="row border-form">
                    <div style="background-color:#fff; padding:20px;">
                        <div style="text-align:center; font-size:25px; font-weight:bold; margin-bottom:15px;">ソリマチ公式オンラインショップ</div>
                        <div class="index_pttxt">いろいろな製品をご注文いただける会員様専用オンラインショッピングサイトです。
                            <div style="background:url('/assets/images/year/2018/11/icon_01_sosp.jpg') no-repeat; background-position:left center; padding-left:20px;"><b>対象となる製品</b></div>
                            <div class="index_pttxt">パッケージ製品・ネットワーク製品・サプライ用紙・ユースウェア製品・バージョンアップ製品・グレードアップ製品・保守サービス</div>
                            <div style="background:url('/assets/images/year/2018/11/icon_01_sosp.jpg') no-repeat; background-position:left center; padding-left: 20px;">
                                <a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/apply/sgonlineshop_rules.pdf" target="_blank"><b>利用規約</b></a> ／
                                <a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/apply/sgonlineshop_appl.pdf" target="_blank"><b>ご利用申込書</b></a><b>（PDF)</b>
                            </div>

                            <div class="index_pttxt">
                                お申込に当たっては、必ず「<a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/apply/sgonlineshop_rules.pdf" target="_blank">利用規約</a>」の内容をご確認ください。<br>
                                「ご利用申込書」をダウンロードの上、必要事項をご記入いただき、FAXにてお申込みください。パートナー事務局よりID・パスワードおよび利用開始日を連絡いたします。<br>
                                <font color="#E00000">ユーザー様用ID・パスワード発行画面より利用申込みをされた場合、SAAG会員様用価格ではご購入いただけませんのでご注意ください。</font><br>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- /** Content 3 **/ -->
            <section id="row3" class="clear" style="margin: 20px 0 60px">
                <div>
                    <h2 class="title-parent-sosp">新着情報</h2>
                </div>
                <div id="news_member" class="scroll-news"><?php IncludeNewsreleaseList(212, 11, 24) ?></div>
            </section>

            <!-- /** Content 7 for mobile **/ -->
            <section id="row7" class="clear sp">
                <div style="width:100%; display:flex; justify-content:center; margin:0 auto 15px">
                    <img src="/assets/images/year/2018/11/member_img_01.jpg" width="50%" height="30%" style="margin:0 auto">
                </div>
                <div style="width:100%; display:flex; justify-content:center; margin:0 auto 15px">
                    <img src="/assets/images/year/2018/11/member_img_02_sosp.jpg" width="50%" height="30%" style="margin:0 auto">
                </div>
            </section>
        </div>
        <form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/mag/backnumber/list_u.asp" name="mag_user" method="post"><input type="hidden" name="mag_user" value="partner"></form>
        <form action="<?= $SORIMACHI_HOME_SSL ?>partner/mag/backnumber/list_p.asp" name="mag_partner" method="post"><input type="hidden" name="mag_partner" value="partner"></form>
        <form action="/partner/sosp/member/ordersp.php" name="ordersp" method="post"><input type="hidden" name="id" value="<?= $_SESSION['SOSP-ID'] ?>"></form>
        <form action="/partner/sosp/member/contact.php" name="order" method="post"><input type="hidden" name="id" value="<?= $_SESSION['SOSP-ID'] ?>"></form>
    </div>
</div>
<?php require_once __DIR__ . "/../template/footer/footer.php"; ?>