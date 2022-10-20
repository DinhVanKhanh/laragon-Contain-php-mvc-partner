<?php
//import css and js
require_once __DIR__ . "/../template/index.php";

//import head
require_once __DIR__ . "/../template/header/header.php";

// //showDir();
@$typePage; //show from controller
@$template; //show from controller
global $SORIMACHI_HOME_SSL, $VER_NEW;

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
                    <h2 class="title-parent-sosp">パートナーソリューション</h2>
                </div>
                <div class="p085_150">
                    「会計王シリーズ」とデータ連動可能なパートナーソリューションの紹介です。ソリマチ製品をユーザー様のニーズにさらに近づける提案にぜひともご活用ください。<br>
                    また、SOSP会員様所有のシステムで、弊社製品とのリレーションをはかれるソリューション製品を募集しております。<br>
                    くわしくは弊社パートナー事務局までお問い合わせください。
                </div>
            </section>

            <!-- /** Content 2 **/ -->
            <section id="row2" class="clear" style="margin-top:10px">
                <!-- SOLUTION 1 -->
                <div style="padding-top:20px; padding-bottom:20px;" class="p085_130"><b>
                        <font color="#0078EB">◆税務会計システム</font>
                    </b></div>

                <!-- Product 1 -->
                <div style="padding-left:20px; padding-bottom:40px;">
                    <table class="table_solution" border="0" cellspacing="1" cellpadding="0" style="border-collapse:collapse">
                        <tr>
                            <th nowrap class="list_sosp_g1">製品名</th>
                            <td class="list_g1_85">消費税の達人</td>
                            <td rowspan="4" valign="top" class="list_g1w">
                                <div style="padding:15px;"><img src="/assets/images/syohizei.gif" border="0" alt="消費税の達人"></div>
                            </td>
                        </tr>
                        <tr>
                            <th nowrap class="list_sosp_g1">開発元</th>
                            <td class="list_g1_85"><a href="<?= __EXWS_NDTatsuzinTop__ ?>" target="_blank">株式会社NTTデータ</a></td>
                        </tr>
                        <tr>
                            <th nowrap class="list_sosp_g1">連動ソフト</th>
                            <td class="list_g1">「会計王<?= $VER_NEW ?>」、「会計王<?= $VER_NEW ?> PRO」</td>
                        </tr>
                        <tr>
                            <th nowrap class="list_sosp_g1">特長</th>
                            <td class="list_g1w">法人および個人が申告する消費税の申告書、各種届出書を作成することができます。申告書、付表、使用頻度の高い11種類の届出書をカバーしています。</td>
                        </tr>
                    </table>
                </div>

                <!-- Product 2 -->
                <div style="padding-left:20px; padding-bottom:40px;">
                    <table class="table_solution" border="0" cellspacing="1" cellpadding="0" style="border-collapse:collapse">
                        <tr>
                            <th nowrap class="list_sosp_g1">製品名</td>
                            <td class="list_g1_85">法人税の達人</td>
                            <td rowspan="4" valign="top" class="list_g1w">
                                <div style="padding:15px;"><img src="/assets/images/houzinzei.gif" border="0" alt="法人税の達人"></div>
                            </td>
                        </tr>
                        <tr>
                            <th nowrap class="list_sosp_g1">開発元</td>
                            <td class="list_g1_85"><a href="<?= __EXWS_NDTatsuzinTop__ ?>" target="_blank">株式会社NTTデータ</a></td>
                        </tr>
                        <tr>
                            <th nowrap class="list_sosp_g1">連動ソフト</td>
                            <td class="list_g1">「会計王<?= $VER_NEW ?>」</td>
                        </tr>
                        <tr>
                            <th nowrap class="list_sosp_g1">特長</th>
                            <td class="list_g1w">法人税（国税）と法人地方税の申告書を作成することができます。複雑な国税、地方税の計算もすべて自動計算。印刷した帳票はそのまま提出することができます。</td>
                        </tr>
                    </table>
                </div>

                <!-- Product 3 -->
                <div style="padding-left:20px; padding-bottom:40px;">
                    <table class="table_solution" border="0" cellspacing="1" cellpadding="0" style="border-collapse:collapse">
                        <tr>
                            <th nowrap class="list_sosp_g1">製品名</th>
                            <td class="list_g1_85">所得税の達人</td>
                            <td rowspan="4" valign="top" class="list_g1w">
                                <div style="padding:15px;"><img src="/assets/images/syotokuzei.gif" border="0" alt="所得税の達人"></div>
                            </td>
                        </tr>
                        <tr>
                            <th nowrap class="list_sosp_g1">開発元</th>
                            <td class="list_g1_85"><a href="<?= __EXWS_NDTatsuzinTop__ ?>" target="_blank">株式会社NTTデータ</a></td>
                        </tr>
                        <tr>
                            <th nowrap class="list_sosp_g1">連動ソフト</th>
                            <td class="list_g1">「会計王<?= $VER_NEW ?>」、「会計王<?= $VER_NEW ?> PRO」</td>
                        </tr>
                        <tr>
                            <th nowrap class="list_sosp_g1">特長</th>
                            <td class="list_g1w">所得税の申告書および決算書、その他の添付書類を作成することができます。青色申告決算書・収支内訳書と申告書を連動。入力データを有効に活用できます。</td>
                        </tr>
                    </table>
                </div>

                <!-- Product 4 -->
                <div style="padding-left:20px; padding-bottom:40px;">
                    <table class="table_solution" border="0" cellspacing="1" cellpadding="0" style="border-collapse:collapse">
                        <tr>
                            <th nowrap class="list_sosp_g1">製品名</th>
                            <td class="list_g1_85">内訳概況書の達人</td>
                            <td rowspan="4" valign="top" class="list_g1w">
                                <div style="padding:15px;"><img src="/assets/images/uchiwake.gif" border="0"></div>
                            </td>
                        </tr>
                        <tr>
                            <th nowrap class="list_sosp_g1">開発元</th>
                            <td class="list_g1_85"><a href="<?= __EXWS_NDTatsuzinTop__ ?>" target="_blank">株式会社NTTデータ</a></td>
                        </tr>
                        <tr>
                            <th nowrap class="list_sosp_g1">連動ソフト</th>
                            <td class="list_g1">「会計王<?= $VER_NEW ?>」</td>
                        </tr>
                        <tr>
                            <th nowrap class="list_sosp_g1">特長</th>
                            <td class="list_g1w">法人税（国税）を申告する際、添付書類として必要な勘定科目内訳明細書と事業概況説明書を作成することができます。多彩な明細編集機能を搭載。自由に科目内訳明細書を作成することができます。</td>
                        </tr>
                    </table>
                </div>

                <!-- Product 5 -->
                <div style="padding-left:20px; padding-bottom:40px;">
                    <table class="table_solution" border="0" cellspacing="1" cellpadding="0" style="border-collapse:collapse">
                        <tr>
                            <th nowrap class="list_sosp_g1">製品名</th>
                            <td class="list_g1_85">減価償却の達人</td>
                            <td rowspan="4" valign="top" class="list_g1w">
                                <div style="padding:15px;"><img src="/assets/images/genkasyokyaku.gif" border="0"></div>
                            </td>
                        </tr>
                        <tr>
                            <th nowrap class="list_sosp_g1">開発元</th>
                            <td class="list_g1_85"><a href="<?= __EXWS_NDTatsuzinTop__ ?>" target="_blank">株式会社NTTデータ</a></td>
                        </tr>
                        <tr>
                            <th nowrap class="list_sosp_g1">連動ソフト</th>
                            <td class="list_g1">「会計王<?= $VER_NEW ?>」、「会計王<?= $VER_NEW ?> PRO」</td>
                        </tr>
                        <tr>
                            <th nowrap class="list_sosp_g1">特長</th>
                            <td class="list_g1w">会社または個人事業者の減価償却資産を管理することができます。有形および無形減価償却資産、繰延資産に関わる減価償却計算はもちろん、土地などの非償却資産台帳までサポートします。</td>
                        </tr>
                    </table>
                </div>

                <!-- Product 6 -->
                <div style="padding-left:20px; padding-bottom:40px;">
                    <table class="table_solution" border="0" cellspacing="1" cellpadding="0" style="border-collapse:collapse">
                        <tr>
                            <th nowrap class="list_sosp_g1">製品名</th>
                            <td class="list_g1_85">年調・法定調書の達人</td>
                            <td rowspan="4" valign="top" class="list_g1w">
                                <div style="padding:15px;"><img src="/assets/images/nentyo.gif" border="0" alt="年調・法定調書の達人"></div>
                            </td>
                        </tr>
                        <tr>
                            <th nowrap class="list_sosp_g1">開発元</th>
                            <td class="list_g1_85"><a href="<?= __EXWS_NDTatsuzinTop__ ?>" target="_blank">株式会社NTTデータ</a></td>
                        </tr>
                        <tr>
                            <th nowrap class="list_sosp_g1">連動ソフト</th>
                            <td class="list_g1">「給料王<?= $VER_NEW ?>」</td>
                        </tr>
                        <tr>
                            <th nowrap class="list_sosp_g1">特長</th>
                            <td class="list_g1w">法人および個人事業者の年末調整および法定調書を処理・作成することができます。市販給与ソフトで登録した社員情報や給与・賞与情報のデータを取り込んで利用することが可能です。</td>
                        </tr>
                    </table>
                </div>

                <!-- SOLUTION 2 -->
                <div style="padding-top:20px; padding-bottom:20px;" class="p085_130"><b>
                        <font color="#0078EB">◆工事台帳システム</font>
                    </b></div>
                <div style="padding-left:20px; padding-bottom:40px;">
                    <table class="table_solution" border="0" cellspacing="1" cellpadding="0" style="border-collapse:collapse;">
                        <tr>
                            <th nowrap class="list_sosp_g1">製品名</th>
                            <td class="list_g1_85">レッツ原価管理Go!</td>
                            <td rowspan="4" valign="top" class="list_g1w">
                                <div style="padding:15px;"><img src="/assets/images/sosp/solution/lets_genkakanrigo.jpg" border="0" alt="レッツ原価管理Go!"></div>
                            </td>
                        </tr>
                        <tr>
                            <th nowrap class="list_sosp_g1">開発元</th>
                            <td class="list_g1_85"><a href="<?= __EXWS_LetsTop__ ?>" target="_blank">株式会社レッツ</td>
                        </tr>
                        <tr>
                            <th nowrap class="list_sosp_g1">連動ソフト</th>
                            <td class="list_g1">「会計王<?= $VER_NEW ?>」、「会計王<?= $VER_NEW ?> PRO」</td>
                        </tr>
                        <tr>
                            <th nowrap class="list_sosp_g1">特長</th>
                            <td class="list_g1w">見積・発注・原価管理までの一連処理を実現。<br>建設業の方々の生の意見をもとにつくりあげた、見積・発注・原価管理ソフトです。各伝票のデータは「会計王<?= $VER_NEW ?>」「会計王<?= $VER_NEW ?> PRO」に連動可能です。</td>
                        </tr>
                        <tr>
                            <th nowrap class="list_sosp_g1">データ</th>
                            <td colspan="2" class="list_g1w">
                                ・<a href="<?= $SORIMACHI_HOME_SSL ?>partner/sosp/download_files/lets_genkakanrigo_brochure.pdf" target="_blank">製品カタログ（PDFファイル）</a><br>
                                ・<a href="<?= $SORIMACHI_HOME_SSL ?>partner/sosp/download_files/lets_genkakanrigo_outputsample.pdf" target="_blank">印刷サンプル（PDFファイル）</a><br>
                                ・<a href="<?= $SORIMACHI_HOME_SSL ?>partner/sosp/download_files/lets_genkakanrigo_prdimage.lzh" target="_blank">製品画像（LZHファイル）</a><br>
                            </td>
                        </tr>
                    </table>
                </div>

                <!-- SOLUTION 3 -->
                <div style="padding-top:20px; padding-bottom:20px;" class="p085_130"><b>
                        <font color="#0078EB">◆タイムレコーダー</font>
                    </b></div>

                <!-- Product 1 -->
                <div style="padding-left:20px; padding-bottom:40px;">
                    <table class="table_solution" border="0" cellspacing="1" cellpadding="0" style="border-collapse:collapse">
                        <tr>
                            <th nowrap class="list_sosp_g1">製品名</th>
                            <td class="list_g1_85">TimeP＠CK III 100<br>TimeP＠CK III 150 WL<br>TimeP＠CK-iC III WL</td>
                            <td rowspan="4" valign="top" class="list_g1wm">
                                <div style="padding:10px;"><img src="/assets/images/sosp/solution/amano_timepackiii.jpg" border="0"></div>
                            </td>
                        </tr>
                        <tr>
                            <th nowrap class="list_sosp_g1">開発元</th>
                            <td class="list_g1_85"><a href="https://timepack.amano.co.jp/" target="_blank">アマノ株式会社</a></td>
                        </tr>
                        <tr>
                            <th nowrap class="list_sosp_g1">連動ソフト</th>
                            <td class="list_g1">「給料王<?= $VER_NEW ?>」</td>
                        </tr>
                        <tr>
                            <th nowrap class="list_sosp_g1">特長</th>
                            <td class="list_g1w">大変要望の多い、タイムレコーダーと「給料王」の連動を実現。TimeP＠CK III は低価格でパソコンとの接続も簡単です。毎月の給与事務における、勤怠データの集計作業が本ソリューションにより大幅削減可能です。</td>
                        </tr>
                        <tr>
                            <th nowrap class="list_sosp_g1">データ</th>
                            <td colspan="2" class="list_g1w">
                                ・<a href="<?= $SORIMACHI_HOME_SSL ?>partner/sosp/download_files/amano_tp3_brc.pdf" target="_blank">TimeP＠CK III 製品カタログ（PDFファイル）</a><br>
                                ・<a href="<?= $SORIMACHI_HOME_SSL ?>partner/sosp/download_files/amano_tp3_nvb_2016.pdf" target="_blank">TimeP＠CK III navi book〈給料王連携版〉（PDFファイル）</a><br>
                                ・<a href="<?= $SORIMACHI_HOME_SSL ?>partner/sosp/download_files/amano_prdimages.lzh" target="_blank">製品写真（LZHファイル）</a>
                            </td>
                        </tr>
                    </table>
                </div>

                <!-- Product 2 -->
                <div style="padding-left:20px; padding-bottom:40px;">
                    <table class="table_solution" border="0" cellspacing="1" cellpadding="0" style="border-collapse:collapse">
                        <tr>
                            <th nowrap class="list_sosp_g1">製品名</th>
                            <td class="list_g1_85">タイムロボ</td>
                            <td rowspan="4" valign="top" class="list_g1w">
                                <div style="padding:15px;"><img src="/assets/images/sosp/solution/prd_timerobo.gif" border="0" alt="タイムロボ"></div>
                            </td>
                        </tr>
                        <tr>
                            <th nowrap class="list_sosp_g1">開発元</th>
                            <td class="list_g1_85"><a href="https://wis.max-ltd.co.jp/op/product_minor_category.html?middle_key=06&minor_key=02" target="_blank">マックス株式会社</a></td>
                        </tr>
                        <tr>
                            <th nowrap class="list_sosp_g1">連動ソフト</th>
                            <td class="list_g1">「給料王<?= $VER_NEW ?>」</td>
                        </tr>
                        <tr>
                            <th nowrap class="list_sosp_g1">特長</th>
                            <td class="list_g1w">タイムカードに印字したデータを付属のメモリーカードでパソコンに取りつけることができます。勤怠管理ソフト「楽々勤怠」で集計したデータを変換して「給料王」に取り込むことができます。</td>
                        </tr>
                        <tr>
                            <th nowrap class="list_sosp_g1">データ</th>
                            <td colspan="2" class="list_g1w"><a href="<?= $SORIMACHI_HOME_SSL ?>partner/sosp/download_files/max_timerobo_brochure.pdf" target="_blank">製品カタログ（PDFファイル）</a> ／ <a href="<?= $SORIMACHI_HOME_SSL ?>partner/sosp/download_files/max_prdimage.lzh" target="_blank">製品写真（LZHファイル）</a></td>
                        </tr>
                    </table>
                </div>
            </section>
        </div>
    </div>
</div>
<?php require_once __DIR__ . "/../template/footer/footer.php"; ?>