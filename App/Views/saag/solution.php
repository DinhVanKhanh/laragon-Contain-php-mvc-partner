<?php
//import css and js
require_once __DIR__ . "/../template/index.php";

//import head
require_once __DIR__ . "/../template/header/header.php";

//showDir();
$typePage; //show from controller
$template; //show from controller
global $SORIMACHI_HOME_SSL, $VER_NEW;
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
                    <h2 class="title-parent">王シリーズ連動製品</h2>
                </div>
                <div class="p090_150">「会計王シリーズ」と連動が可能な製品（ソリューション）の紹介です。<br>貴所で、あるいは顧問先様で、ぜひご活用ください。</div>
                <div class="p075_180" style="margin:10px;">
                    - <a href="#solution01">達人シリーズ [株式会社NTTデータ]</a><br>
                    - <a href="#solution02">フロンティア21 [株式会社オリコンタービレ]</a><br>
                </div>
            </section>

            <!-- /** Content 2 **/ -->
            <section id="row2" class="clear" style="margin-top:40px">
                <div id="solution01" class="index_ptmida">
                    <h3>達人シリーズ ［株式会社NTTデータ］</h3>
                </div>
                <!-- SOLUTION 1 -->
                <div class="p075_150" style="margin:15px 20px 15px 10px;">法人税、減価償却、消費税、内訳書、概況書、所得税、年調・法定調書、相続税、財産評価など「王シリーズ」と連携し税務申告業務等を効率化する税務ソフトです。電子申告に対応、国税（e-Tax）及び地方税（eLTAX）の電子申告を行なうことができます。</div>

                <!-- Product 1 -->
                <div style="padding-left:10px; padding-bottom:20px;">
                    <table class="table_solution" border="0" cellspacing="1" cellpadding="0">
                        <tr>
                            <th nowrap class="list_saag_g1">製品名</th>
                            <td class="list_g1_85"><b>消費税の達人</b></td>
                            <td rowspan="4" class="list_g1wcm">
                                <div style="padding:15px;"><img src="/assets/images/syohizei.gif" border="0" alt="消費税の達人"></div>
                            </td>
                        </tr>
                        <tr>
                            <th nowrap class="list_saag_g1">開発元</th>
                            <td class="list_g1">株式会社NTTデータ</td>
                        </tr>
                        <tr>
                            <th nowrap class="list_saag_g1">連動ソフト</th>
                            <td class="list_g1">「会計王21」<br>「会計王21PRO」</td>
                        </tr>
                        <tr>
                            <th nowrap class="list_saag_g1">特長</th>
                            <td class="list_g1w">法人および個人が申告する消費税の申告書、各種届出書を作成することができます。申告書、付表、使用頻度の高い11種類の届出書をカバーしています。</td>
                        </tr>
                    </table>
                </div>

                <!-- Product 2 -->
                <div style="padding-left:10px; padding-bottom:20px;">
                    <table class="table_solution" border="0" cellspacing="1" cellpadding="0">
                        <tr>
                            <th nowrap class="list_saag_g1">製品名</td>
                            <td class="list_g1_85"><b>法人税の達人</b></td>
                            <td rowspan="4" class="list_g1wcm">
                                <div style="padding:15px;"><img src="/assets/images/houzinzei.gif" border="0" alt="法人税の達人"></div>
                            </td>
                        </tr>
                        <tr>
                            <th nowrap class="list_saag_g1">開発元</td>
                            <td class="list_g1">株式会社NTTデータ</td>
                        </tr>
                        <tr>
                            <th nowrap class="list_saag_g1">連動ソフト</td>
                            <td class="list_g1">「会計王21」</td>
                        </tr>
                        <tr>
                            <th nowrap class="list_saag_g1">特長</th>
                            <td class="list_g1w">法人税（国税）と法人地方税の申告書を作成することができます。複雑な国税、地方税の計算もすべて自動計算。印刷した帳票はそのまま提出することができます。</td>
                        </tr>
                    </table>
                </div>

                <!-- Product 3 -->
                <div style="padding-left:10px; padding-bottom:20px;">
                    <table class="table_solution" border="0" cellspacing="1" cellpadding="0">
                        <tr>
                            <th nowrap class="list_saag_g1">製品名</th>
                            <td class="list_g1_85"><b>所得税の達人</b></td>
                            <td rowspan="4" class="list_g1wcm">
                                <div style="padding:15px;"><img src="/assets/images/syotokuzei.gif" border="0" alt="所得税の達人"></div>
                            </td>
                        </tr>
                        <tr>
                            <th nowrap class="list_saag_g1">開発元</th>
                            <td class="list_g1">株式会社NTTデータ</td>
                        </tr>
                        <tr>
                            <th nowrap class="list_saag_g1">連動ソフト</th>
                            <td class="list_g1">「会計王21」<br>「会計王21PRO」</td>
                        </tr>
                        <tr>
                            <th nowrap class="list_saag_g1">特長</th>
                            <td class="list_g1w">所得税の申告書および決算書、その他の添付書類を作成することができます。青色申告決算書・収支内訳書と申告書を連動。入力データを有効に活用できます。</td>
                        </tr>
                    </table>
                </div>

                <!-- Product 4 -->
                <div style="padding-left:10px; padding-bottom:20px;">
                    <table class="table_solution" border="0" cellspacing="1" cellpadding="0">
                        <tr>
                            <th nowrap class="list_saag_g1">製品名</th>
                            <td class="list_g1_85"><b>内訳概況書の達人</b></td>
                            <td rowspan="4" class="list_g1wcm">
                                <div style="padding:15px;"><img src="/assets/images/uchiwake.gif" border="0"></div>
                            </td>
                        </tr>
                        <tr>
                            <th nowrap class="list_saag_g1">開発元</th>
                            <td class="list_g1">株式会社NTTデータ</td>
                        </tr>
                        <tr>
                            <th nowrap class="list_saag_g1">連動ソフト</th>
                            <td class="list_g1">「会計王21」</td>
                        </tr>
                        <tr>
                            <th nowrap class="list_saag_g1">特長</th>
                            <td class="list_g1w">法人税（国税）を申告する際、添付書類として必要な勘定科目内訳明細書と事業概況説明書を作成することができます。多彩な明細編集機能を搭載。自由に科目内訳明細書を作成することができます。</td>
                        </tr>
                    </table>
                </div>

                <!-- Product 5 -->
                <div style="padding-left:10px; padding-bottom:20px;">
                    <table class="table_solution" border="0" cellspacing="1" cellpadding="0">
                        <tr>
                            <th nowrap class="list_saag_g1">製品名</th>
                            <td class="list_g1_85"><b>減価償却の達人</b></td>
                            <td rowspan="4" class="list_g1wcm">
                                <div style="padding:15px;"><img src="/assets/images/genkasyokyaku.gif" border="0"></div>
                            </td>
                        </tr>
                        <tr>
                            <th nowrap class="list_saag_g1">開発元</th>
                            <td class="list_g1">株式会社NTTデータ</td>
                        </tr>
                        <tr>
                            <th nowrap class="list_saag_g1">連動ソフト</th>
                            <td class="list_g1">「会計王21」<br>「会計王21PRO」</td>
                        </tr>
                        <tr>
                            <th nowrap class="list_saag_g1">特長</th>
                            <td class="list_g1w">会社または個人事業者の減価償却資産を管理することができます。有形および無形減価償却資産、繰延資産に関わる減価償却計算はもちろん、土地などの非償却資産台帳までサポートします。</td>
                        </tr>
                    </table>
                </div>

                <!-- Product 6 -->
                <div style="padding-left:10px; padding-bottom:50px;">
                    <table class="table_solution" border="0" cellspacing="1" cellpadding="0">
                        <tr>
                            <th nowrap class="list_saag_g1">製品名</th>
                            <td class="list_g1_85"><b>年調・法定調書の達人</b></td>
                            <td rowspan="4" class="list_g1wcm">
                                <div style="padding:15px;"><img src="/assets/images/nentyo.gif" border="0" alt="年調・法定調書の達人"></div>
                            </td>
                        </tr>
                        <tr>
                            <th nowrap class="list_saag_g1">開発元</th>
                            <td class="list_g1">株式会社NTTデータ</td>
                        </tr>
                        <tr>
                            <th nowrap class="list_saag_g1">連動ソフト</th>
                            <td class="list_g1">「給料王21」</td>
                        </tr>
                        <tr>
                            <th nowrap class="list_saag_g1">特長</th>
                            <td class="list_g1w">法人および個人事業者の年末調整および法定調書を処理・作成することができます。市販給与ソフトで登録した社員情報や給与・賞与情報のデータを取り込んで利用することが可能です。</td>
                        </tr>
                    </table>
                </div>

                <!-- SOLUTION 2 -->
                <div id="solution02" class="index_ptmida">
                    <h3>フロンティア２１ ［株式会社オリコンタービレ］</h3>
                </div>
                <div style="padding-left:10px; padding-bottom:50px;">
                    <table class="table_solution" border="0" cellspacing="1" cellpadding="0">
                        <tr>
                            <th nowrap class="list_saag_g1">製品名</th>
                            <td class="list_g1_85"><b>フロンティア２１</b></td>
                            <td rowspan="4" class="list_g1wcm"><img src="/assets/images/saag/solution/logo_frnt21.gif" border="0" alt="フロンティア２１"></td>
                        </tr>
                        <tr>
                            <th nowrap class="list_saag_g1">開発元</th>
                            <td class="list_g1"><a href="<?= __EXWS_OCCTop__ ?>">株式会社オリコンタービレ</a></td>
                        </tr>
                        <tr>
                            <th nowrap class="list_saag_g1">特長</th>
                            <td class="list_g1w">会計・給料の顧問先データをサーバーで簡単に一元管理できます。遠隔地の顧問先ともつなぐ事も可能で自計化推進ツールとして多くの会計事務所が採用しています。</td>
                        </tr>
                    </table>
                </div>
            </section>
        </div>
    </div>
</div>
<?php require_once __DIR__ . "/../template/footer/footer.php"; ?>