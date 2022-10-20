<?php
//import css and js
require_once __DIR__ . "/../template/index.php";
//import functions
require_once __DIR__ . "/../../functions.php";
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
            <!-- /** Content 1 **/ -->
            <section id="row1" class="clear">
                <div>
                    <h2 class="title-parent">ビズネスクラスセミナーfor SAAG</h2>
                </div>
                <div style="padding:5px 15px; background-color:#F0F0F0;">本サービスは、株式会社ファシオとの業務提携により、SAAG会員の皆様にのみご提供するサービスです。</div>
                <div style="background:url(/assets/images/saag/bgimg01.gif) no-repeat; background-size:cover; padding:120px 170px 20px 17px;">
                    <div style="font:normal 105%/150% 'MS UI Gothic',Osaka,sans-serif">
                        このようなご要望にお応えするのが 『ビジネスクラスセミナー for SAAG』 です。<br>
                        株式会社ファシオとの提携により、SAAG会員の皆様に特別価格でご提供いたします。
                    </div>
                </div>
            </section>

            <!-- /** Content 2 **/ -->
            <section id="row2" class="clear" style="margin-top:40px">
                <div class="row border-form">
                    <div style="background-color:#fff; padding:20px">
                        <div style="text-align:center; font-size:25px; font-weight:bold; margin-bottom:15px">ビジネスクラスセミナー・ピックアップ！</div>
                        <?= getDataRSS("https://www.bc-seminar.jp/rss/saag/index.rdf"); ?>
                        <div style='text-align:right; margin-top:8px; margin-bottom:10px; font:bold 13px/16px Meiryo UI,MS UI Gothic,Meiryo,メイリオ,sans-serif'><a href="https://www.bc-seminar.jp/semi-info/premium/?mg=saag" target="_blank">≫すべてのビジネスクラスセミナーはこちらから</a></div>
                    </div>
                </div>
            </section>

            <!-- /** Content 3 **/ -->
            <section id="row3" class="clear">
                <div class="row">
                    <div class="index_ptmida">
                        <h3>本サービスの概要</h3>
                    </div>
                    <div class="index_pttxt id2">
                        セミナー情報ポータル「<a href="<?= __EXWS_SBIBSBCSeminarTop__ ?>" target="_blank"><b>ビジネスクラスセミナー</b></a>」を、SAAG会員特別価格でご利用いただくことができます。皆様が開催するセミナーの告知や集客を支援します。<BR>
                        ぜひ [ <a href="<?= __EXWS_SBIBSBCSeminarSAAGTop__ ?>" target="_balnk"><b>こちら</b></a> ] から詳細をご確認いただき、皆様の実務にお役立てください。<BR>
                        <div style="margin:5px 0px 10px 0px;"><a href="<?= __EXWS_SBIBSBCSeminarSAAGTop__ ?>" target="_blank"><img src="/assets/images/btn_sbibs_service1.gif" onMouseover="this.src='/assets/images/btn_sbibs_service2.gif'" onMouseout="this.src='/assets/images/btn_sbibs_service1.gif'" alt="" border="0"></a></div>
                        <div style="margin-left:2em; text-indent:-1em;">【ご利用価格】 １セミナー掲載につき 11,000円（税込価格）　※ご登録（初期費用）は無料です</div>
                        <div style="margin-left:2em; text-indent:-1em;">【お申込・ご利用方法】 下記の『初回の登録からご利用までの流れ』をご覧ください。</div>
                    </div>
                </div>

                <div class="row">
                    <div class="index_ptmida">
                        <h3>初回の登録からご利用までの流れ</h3>
                    </div>
                    <div>SAAG会員様特別価格をご用意しておりますので、以下の申込・ご利用フローを必ずご確認ください。</div>
                    <div style="margin:20px 0px 10px 2em;"><img src="/assets/images/mida_bcseminar02a.gif" border="0"></div>
                    <table border="0" width="480" cellspacing="0" cellpadding="0" style="border-collapse:collapse; width:100%">
                        <tr>
                            <TH nowrap class="list_partner_g1l">
                                <div class="id0_1">1．申込書・規約を<BR>ダウンロードして<BR>ください</div>
                            </TH>
                            <td class="seminar_g1">
                                <div style="margin:3px 0px;"><a href="<?= $SORIMACHI_HOME_SSL ?>files_pdf/apply/saag_bcseminar.pdf" target="_blank"><img src="/assets/images/btn_sbibs_download1.gif" onMouseover="this.src='/assets/images/btn_sbibs_download2.gif'" onMouseout="this.src='/assets/images/btn_sbibs_download1.gif'" alt="" border="0"></a></div>
                                始めに本サービスの申込書・会員規約（PDF形式／２頁）をダウンロードし、必ず内容をご確認ください。<BR>
                                <div style="font-size:90%; margin-top:3px;">※「利用登録申込書」をご覧になるには <a href="<?= __EXWS_AdobeReaderDL__ ?>" target="_blank">Adobe Reader</a> が必要です。</div>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:5px 0px;" align="center"><img src="/assets/images/allow_under.gif"></td>
                            <td class="p075_150"></td>
                        </tr>
                        <tr>
                            <TH nowrap class="list_partner_g1l">
                                <div class="id0_1">2．ソリマチに申込書<BR>をお送りください</div>
                            </TH>
                            <td class="seminar_g1">ご記入いただいた申込書を、郵送で<b>ソリマチ宛に</b>お送りください。<BR>
                                <div style="margin-top:1ex;">【<b>送付先</b>】<BR>
                                    ソリマチ（株） 営業統轄本部内<BR>ビジネスクラスセミナー for SAAG 事務局担当<BR>
                                    〒141-0022 東京都品川区東五反田3-18-6 ソリマチ第8ビル<BR>
                                </div>
                                <div style="margin-top:1ex;">
                                    ※お急ぎの場合はあらかじめFAX（03-5475-5339）をお送りください。
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:5px 0px;" align="center"><img src="/assets/images/allow_under.gif"></td>
                            <td class="p075_150">※到着から約３営業日</td>
                        </tr>
                        <tr>
                            <TH nowrap class="list_partner_g1l">
                                <div class="id0_1">3．ID・パスワードを<BR>発行・設定します<BR>[<font color="#FF3300">登録完了</font>]</div>
                            </TH>
                            <td class="seminar_g1"><b>株式会社ファシオ</b>から、<font color="#FF3300">サービスサイトのアドレス</font>と<font color="#FF3300">専用のID</font>を、ご担当者様にメールでご連絡いたします（発行・ご連絡には申込書到着から約３営業日ほどかかります。あらかじめご了承ください）。<BR>このサービスサイトにアクセスしていただき、<b>パスワードを設定してください</b>。これを以ってご登録は完了となります。<BR></td>
                        </tr>
                        <tr>
                            <td nowrap height="15"></td>
                        </tr>
                        <tr>
                            <td style="padding:5px 0px;" align="center"><img src="/assets/images/allow_under.gif"></td>
                            <td class="p075_150"><b>以下の手順はセミナーごとに必要です。</b></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div style="margin:20px 0px 10px 0px;"><img src="/assets/images/mida_bcseminar02b.gif" border="0"></div>
                            </td>
                        </tr>
                        <tr>
                            <TH nowrap class="list_partner_g1l">
                                <div class="id0_1">4．セミナー情報を<BR>ご入力ください</div>
                            </TH>
                            <td class="seminar_g1">専用のIDとパスワードを利用して、サービスサイトからセミナー掲載のお申し込みをしてください。
                                入力完了後、“更新”ボタンを押していただくと事務局で内容確認し、その後サイトに掲載いたします（登録後、１営業日以内で掲載いたします）。<BR>
                                また提携サイトへの掲載は、各社によって日程が違います（セミナーカテゴリによっては、掲載ができない提携サイトもありますので別途お問合せください）。<BR>
                                <div style="margin-top:1ex;">
                                    ※ご登録いただいていれば、セミナーの掲載は何度でもお申し込みいただくことができます（１セミナー掲載につき10,500円（税込）となります）
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:5px 0px;" align="center"><img src="/assets/images/allow_under.gif"></td>
                            <td class="p075_150"></td>
                        </tr>
                        <tr>
                            <TH nowrap class="list_partner_g1l">
                                <div class="id0_1">5．請求書を発行<BR>します</div>
                            </TH>
                            <td class="seminar_g1">掲載させていただいたセミナーの件数に応じて、<b>株式会社ファシオ</b>から請求書を発行いたします。</td>
                        </tr>
                        <tr>
                            <td style="padding:5px 0px;" align="center"><img src="/assets/images/allow_under.gif"></td>
                            <td class="p075_150"></td>
                        </tr>
                        <tr>
                            <TH nowrap class="list_partner_g1l">
                                <div class="id0_1">6．請求書の金額を<BR>お支払ください</div>
                            </TH>
                            <td class="seminar_g1">請求書に記載されている締日（申込月 月末）までに、指定銀行口座にお振込みください。</td>
                        </tr>
                    </table>
                </div>

                <div class="row">
                    <div class="index_ptmida">
                        <h3>ご注意事項</h3>
                    </div>
                    <div class="index_pttxt">
                        <div class="id2_3">※本サービスのご利用はSAAG会員様限定となります。</div>
                        <div class="id2_3">※ご利用に当たっては、必ず利用規約の内容をご確認ください。万一利用規約に合致しない内容のセミナーを本サービスから告知された場合は、ご利用登録を取り消させていただく場合がございます。</div>
                        <div class="id2_3">※お客さまのお名前・ご住所などの情報について、本件サービス提供以外の目的で第三者に開示いたしません。</div>
                    </div>
                </div>

                <div class="row">
                    <div class="index_ptmida">
                        <h3>お問い合わせ先</h3>
                    </div>
                    <div class="index_pttxt">
                        <div class="id2_4">
                            【 <b>初回の登録、お申し込み方法に関するお問合せ</b> 】<BR>ソリマチ株式会社　パートナー事務局<BR>
                            [TEL] 03-3446-1311　[FAX] 03-5475-5339<BR>
                            [MAIL] saag@mail.sorimachi.co.jp
                            <div style="margin-top:1em;">【 <b>サービスの詳細、ご利用に関するお問合せ（ご登録後）</b> 】<BR>株式会社ファシオ　ビジネスクラスセミナー担当</div>
                        </div>
                        <div class="id4" style="margin-top:10px;">
                            <a href="<?= __EXWS_SBIBSBCSeminarSAAGTop__ ?>" target="_blank"><img src="/assets/images/btn_sbibs_service1.gif" onMouseover="this.src='/assets/images/btn_sbibs_service2.gif'" onMouseout="this.src='/assets/images/btn_sbibs_service1.gif'" alt="" border="0"></a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php require_once __DIR__ . "/../template/footer/footer.php"; ?>