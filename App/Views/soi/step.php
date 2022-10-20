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
        <div class="sidebar" id="sidebar" style="height:1900px">
            <?php require_once __DIR__ .  "/../template/sidebar/sidebar.php"; ?>
        </div>

        <!-- Content Right -->
        <div class="content-right">
            <div>
                <h2 class="title-parent-soi">お申込から認定まで</h2>
            </div>

            <!-- Row 1 -->
            <div class="row row_step" style='margin-bottom:10px'>
                <div class="content_step">
                    <div class="title_step">Step 1&emsp;&emsp;<span>受験する認定タイトルの選択</span></div>
                    <div style="padding:10px 15px 0">『会計王』、『給料王』、『販売王 販売・仕入・在庫』の中より希望のタイトルを選択します。</div>
                </div>
            </div>

            <!-- Row 2 -->
            <div class="row row_step" style='margin-bottom:10px'>
                <div class="content_step">
                    <div class="title_step">Step 2&emsp;&emsp;<span>お申込</span></div>
                    <div style="padding:10px 20px 0">
                        <div style="padding:3px 3px 3px 0"><img src="/assets/images/year/2019/04/icon_01.jpg" /> ソリマチパートナー事務局またはホームページにてSOI試験開催日程を確認します。</div>
                        <div style="padding:3px 3px 3px 0"><img src="/assets/images/year/2019/04/icon_01.jpg" /> パンフレットの裏面、または [ <a href="https://www.sorimachi.co.jp/files_pdf/apply/soi_appl.pdf" target="_blank">ダウンロード</a> ] していただいたお申込書に必要事項を記入し、ソリマチパートナー事務局にFAX（03-5475-5339）します。</div>
                    </div>
                </div>
            </div>

            <!-- Row 3 -->
            <div class="row row_step" style='margin-bottom:10px'>
                <div class="content_step">
                    <div class="title_step">Step 3&emsp;&emsp;<span>仮受付票の送付</span></div>
                    <div style="padding:10px 20px 0">受付完了後、仮受付票がFAXされます。仮受付票には、受験料及び受験料のお振込要領が記載されています。</div>
                </div>
            </div>

            <!-- Row 4 -->
            <div class="row row_step" style='margin-bottom:10px'>
                <div class="content_step">
                    <div class="title_step">Step 4&emsp;&emsp;<span>お振込</span></div>
                    <div style="padding:10px 20px 0">
                        <div style="padding:3px 3px 3px 0;"><img src="/assets/images/year/2019/04/icon_01.jpg" /> お振込要領に従った方法で、受講料及び受験料をお振込ください。</div>
                        <div style="padding:3px 3px 3px 0;"><img src="/assets/images/year/2019/04/icon_01.jpg" /> 仮受付票に振り込み明細票のコピーを添付してソリマチパートナー事務局までFAX（03-5475-5339）にて返信してください。</div>
                        <div style="padding:3px 3px 2px 0;">【ご注意】</div>
                        <div style="padding:2px 3px 2px 0;">※受講券及び受講票の送付は、入金確認後となります。</div>
                        <div style="padding:2px 3px 2px 0;">※お申し込み後の受講日及び受験日の変更は原則としてできませんのでご注意ください。</div>
                        <div style="padding:2px 3px 2px 0;">※ご入金後の返金はいたしかねますのでご了承ください。</div>
                        <div style="padding:2px 3px 2px 0;">※受講券及び受講票は、自身で訂正をいれたもの、受講日・受験日が異なるもの、氏名が違うものはすべて無効とさせていただきますので、受取後に必ずご確認ください。</div>
                    </div>
                </div>
            </div>

            <!-- Row 5 -->
            <div class="row row_step" style='margin-bottom:10px'>
                <div class="content_step">
                    <div class="title_step">Step 5&emsp;&emsp;<span>受験票の送付</span></div>
                    <div style="padding:10px 20px 0">入金確認後受講券及び受験票、会場案内図が送られてきます。</div>
                </div>
            </div>

            <!-- Row 6 -->
            <div class="row row_step" style='margin-bottom:10px'>
                <div class="content_step">
                    <div class="title_step">Step 6&emsp;&emsp;<span>認定試験</span></div>
                    <div style="padding:10px 20px 0">
                        <div class="id0_1" style="margin-bottom:3px;">お持ちの製品または体験版にて、事前に予習を行なってください。</div>
                        <div class="id1_2" style="margin-bottom:3px;">※体験版は [ <a href="https://www.sorimachi.co.jp/products_gyou/trial_version/" target="_blank">こちら</a> ] からダウンロードできます。</div>
                        <div class="id1_2">※体験版の送付（CD-ROM）も承っておりますので、ご希望の場合には下記ソリマチパートナー事務局までご連絡ください。</div>
                    </div>
                </div>
            </div>

            <!-- Row 7 -->
            <div class="row row_step" style='margin-bottom:10px'>
                <div class="content_step">
                    <div class="title_step">Step 7&emsp;&emsp;<span>セミナー受講</span></div>
                    <div style="padding:10px 20px 0">対策セミナー受講日当日には受講券及び受験票、写真２枚（H30×W24mm）、筆記用具、計算機をお持ちください。<BR>（各タイトルに関しての基本操作をはじめ、応用機能まで一通りの操作を学んでいただきます）</div>
                </div>
            </div>

            <!-- Row 8 -->
            <div class="row row_step" style='margin-bottom:10px'>
                <div class="content_step">
                    <div class="title_step">Step 8&emsp;&emsp;<span>認定試験</span></div>
                    <div style="padding:10px 20px 0">
                        <div style="padding:3px 3px 3px 0"><img src="/assets/images/year/2019/04/icon_01.jpg" /> セミナー終了後に引き続き認定試験を行ないます。</div>
                        <div style="padding:3px 3px 3px 0"><img src="/assets/images/year/2019/04/icon_01.jpg" /> 認定試験は、筆記試験と実技試験がございます。</div>
                    </div>
                </div>
            </div>

            <!-- Row 9 -->
            <div class="row">
                <div class="content_step">
                    <div class="title_step">Step 9&emsp;&emsp;<span>認定</span></div>
                    <div style="padding:10px 20px 0">
                        <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="img-step-soi" bgcolor="#FFFFFF" width="100" align="center" valign="middle"><img src="/assets/images/year/2019/04/soi_bnr_02.jpg"></td>
                                <td>
                                    <img class="img-step-soi2" src="/assets/images/year/2019/04/soi_bnr_02.jpg"><br>
                                    <div style="padding:3px 3px 3px 15px;"><b>合格されたタイトルの「認定証（IDカード）」をお送りいたします。</b></div>
                                    <div style="padding:2px 3px 2px 15px;">※合否通知は、試験実施より１ヶ月程度でお送りいたします。</div>
                                    <div style="padding:2px 3px 2px 15px;">※不合格であった場合には、次回試験時の対策セミナーは受験されなくても構いません。</div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Row 10 -->
            <div class="row">
                <div class="index_ptmida">
                    <h3>お問い合わせ</h3>
                </div>
                <div class="index_pttxt">
                    ソリマチ株式会社<br>
                    ソリマチパートナー事務局<br>
                    〒141-0022<br>
                    東京都品川区東五反田3-18-6　ソリマチ第8ビル<br>
                    TEL:03-3446-1311&nbsp;&nbsp;FAX:03-5475-5339<br>
                    e-mail : <a href="mailto:soup@mail.sorimachi.co.jp">soup@mail.sorimachi.co.jp</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once __DIR__ . "/../template/footer/footer.php"; ?>