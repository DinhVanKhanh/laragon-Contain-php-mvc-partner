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
                <h2 class="title-parent-soi">認定試験・セミナー情報</h2>
            </div>

            <!-- Row 1 -->
            <div class="row">
                <div class="index_ptmida">
                    <h3>セミナー・試験会場及び日程</h3>
                </div>
                <div class="index_pttxt">
                    <span>試験は臨時的に開催しております。</span><br><span>ご希望の方は <a href="mailto:soup@mail.sorimachi.co.jp">soup@mail.sorimachi.co.jp</a> へご相談ください。</span><br>
                    <span>※お申込書は [ <a href="https://www.sorimachi.co.jp/files_pdf/apply/soi_appl.pdf" target="_blank"><b>こちら</b></a> ] からダウンロードしてください。</span><br>
                    <span>※PDFファイルをご覧になるには [ <a href="http://www.adobe.co.jp/products/acrobat/readstep2.html" target="_blank">Adobe Reader</a> ] が必要です。</span>
                </div>
            </div>

            <!-- Row 2 -->
            <div class="row">
                <div class="index_ptmida">
                    <h3>認定試験対策セミナー・認定試験内容</h3>
                </div>
                <div class="index_pttxt">
                    <div><img src="/assets/images/year/2019/04/icon_01.jpg" /> <b>認定試験対策セミナー</b>（２時間）</div>
                    <div style="padding-left:12px">業務知識、ソフトウェア説明</div>
                    <div style="padding-top:10px"><img src="/assets/images/year/2019/04/icon_01.jpg" /> <b>認定試験</b>（３時間）</div>
                    <div style="padding-left:12px">筆記試験・実技試験</div>
                    <div style="padding-top:10px"><img src="/assets/images/year/2019/04/icon_01.jpg" /> <b>認定試験形式</b></div>
                    <div style="padding-left:12px; margin-bottom:20px">ソリマチの現行シリーズ製品を対象とし、筆記試験と実技試験（実際にパソコンを使用してソフトウェアを操作し出題を入力する事により回答を出す）を行ないます。<br><b>筆記試験</b>：選択及び記述式<br><b>実技試験</b>：パソコン操作による実技試験（操作して得られた答えを記述</div>

                    <!-- TABLE 会計王 認定試験概要 -->
                    <div><b style="color:#fd2c05; font-size:20px">会計王</b> <span style="font-weight:600; color:#333">認定試験概要</span></div>
                    <table style="border-collapse:collapse;" width="100%" cellspacing="0" cellpadding="5" border="1" bordercolor="#c5c3c4">
                        <tbody>
                            <tr style="background:#ffc300; color:#3c4238; font-size:18px;">
                                <th class="list_soi_g1" style="width:50%">筆記試験</th>
                                <th class="list_soi_g1 img-step-soi" style="width:50%">実技試験</th>
                            </tr>
                            <tr>
                                <td class="list_g1">会計王・会計王PROの基礎知識</td>
                                <td class="list_g1 img-step-soi">データの作成</td>
                            </tr>
                            <tr>
                                <td class="list_g1">　・会計王・会計王PRのスペック</td>
                                <td class="list_g1 img-step-soi">初期設定</td>
                            </tr>
                            <tr>
                                <td class="list_g1">　・会計王・会計王PROの操作・機能</td>
                                <td class="list_g1 img-step-soi">　・会社情報・勘定科目・開始残高</td>
                            </tr>
                            <tr>
                                <td class="list_g1">簿記の基礎知識</td>
                                <td class="list_g1 img-step-soi">日常処理</td>
                            </tr>
                            <tr>
                                <td class="list_g1">　・日常仕訳・決算仕訳</td>
                                <td class="list_g1 img-step-soi">　・仕訳伝票入力</td>
                            </tr>
                            <tr>
                                <td class="list_g1">　・決算に伴なう処理</td>
                                <td class="list_g1 img-step-soi">決算処理</td>
                            </tr>
                            <tr>
                                <td class="list_g1">簿記の応用問題</td>
                                <td class="list_g1 img-step-soi">　・決算仕訳・減価償却</td>
                            </tr>
                            <tr>
                                <td class="list_g1">　・財務諸表の作成</td>
                                <td class="list_g1 img-step-soi">経営分析</td>
                            </tr>
                            <tr>
                                <td class="list_g1">パソコンの基礎知識</td>
                                <td class="img-step-soi" style="border:none"></td>
                            </tr>
                            <tr>
                                <td class="list_g1">　・ネットワーク関連</td>
                                <td class="img-step-soi" style="border:none"></td>
                            </tr>
                            <tr>
                                <td class="list_g1">　・Windowsの基礎知識</td>
                                <td class="img-step-soi" style="border:none"></td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="shedule-soi" style="border-collapse:collapse;" width="100%" cellspacing="0" cellpadding="5" border="1" bordercolor="#c5c3c4">
                        <tbody>
                            <tr style="background:#ffc300; color:#3c4238; font-size:18px;">
                                <th class="list_soi_g1" style="width:50%">実技試験</th>
                            </tr>
                            <tr>
                                <td class="list_g1">データの作成</td>
                            </tr>
                            <tr>
                                <td class="list_g1">初期設定</td>
                            </tr>
                            <tr>
                                <td class="list_g1">　・会社情報・勘定科目・開始残高</td>
                            </tr>
                            <tr>
                                <td class="list_g1">日常処理</td>
                            </tr>
                            <tr>
                                <td class="list_g1">　・仕訳伝票入力</td>
                            </tr>
                            <tr>
                                <td class="list_g1">決算処理</td>
                            </tr>
                            <tr>
                                <td class="list_g1">　・決算仕訳・減価償却</td>
                            </tr>
                            <tr>
                                <td class="list_g1">経営分析</td>
                            </tr>
                        </tbody>
                    </table>
                    <br>

                    <!-- TABLE 給料王 認定試験概要 -->
                    <div><b style="color:#00A7E2; font-size:20px">給料王</b> <span style="font-weight:600; color:#333">認定試験概要</span></div>
                    <table style="border-collapse:collapse;" width="100%" cellspacing="0" cellpadding="5" border="1" bordercolor="#c5c3c4">
                        <tbody>
                            <tr style="background:#ffc300; color:#3c4238; font-size:18px;">
                                <th class="list_soi_g1" style="width:50%">筆記試験</th>
                                <th class="list_soi_g1 img-step-soi" style="width:50%">実技試験</th>
                            </tr>
                            <tr>
                                <td class="list_g1 img-step-soi">給料業務の基礎知識</td>
                                <td class="list_g1">データ作成</td>
                            </tr>
                            <tr>
                                <td class="list_g1 img-step-soi">　・年間の給料業務の流れ</td>
                                <td class="list_g1">初期設定</td>
                            </tr>
                            <tr>
                                <td class="list_g1 img-step-soi">給与計算知識</td>
                                <td class="list_g1">　・会社情報・社員設定</td>
                            </tr>
                            <tr>
                                <td class="list_g1 img-step-soi">　・給与計算</td>
                                <td class="list_g1">日常処理</td>
                            </tr>
                            <tr>
                                <td class="list_g1 img-step-soi">給料王の基礎知識</td>
                                <td class="list_g1">　・勤怠登録・月次給料計算処理</td>
                            </tr>
                            <tr>
                                <td class="list_g1 img-step-soi">　・給料王のスペック</td>
                                <td class="list_g1">法定調書作成</td>
                            </tr>
                            <tr>
                                <td class="list_g1 img-step-soi">　・給料王の操作･機能</td>
                                <td class="list_g1">賞与計算処理</td>
                            </tr>
                            <tr>
                                <td class="list_g1 img-step-soi">パソコンの基礎知識</td>
                                <td class="img-step-soi" style="border:none"></td>
                            </tr>
                            <tr>
                                <td class="list_g1 img-step-soi">　・ネットワーク関連</td>
                                <td class="img-step-soi" style="border:none"></td>
                            </tr>
                            <tr>
                                <td class="list_g1 img-step-soi">　・Windowsの基礎知識</td>
                                <td class="img-step-soi" style="border:none"></td>
                            </tr>
                        </tbody>
                    </table>

                    <!--MOBILE-->
                    <table class="shedule-soi" style="border-collapse:collapse;" width="100%" cellspacing="0" cellpadding="5" border="1" bordercolor="#c5c3c4">
                        <tbody>
                            <tr style="background:#ffc300; color:#3c4238; font-size:18px;">
                                <th class="list_soi_g1" style="width:50%">実技試験</th>
                            </tr>
                            <tr>
                                <td class="list_g1">データ作成</td>
                            </tr>
                            <tr>
                                <td class="list_g1">初期設定</td>
                            </tr>
                            <tr>
                                <td class="list_g1">　・会社情報・社員設定</td>
                            </tr>
                            <tr>
                                <td class="list_g1">日常処理</td>
                            </tr>
                            <tr>
                                <td class="list_g1">　・勤怠登録・月次給料計算処理</td>
                            </tr>
                            <tr>
                                <td class="list_g1">法定調書作成</td>
                            </tr>
                            <tr>
                                <td class="list_g1">賞与計算処理</td>
                            </tr>
                        </tbody>
                    </table>
                    <br>

                    <!-- TABLE 販売王 販売・仕入・在庫 認定試験概要 -->
                    <div><b style="color:#026150; font-size:20px">販売王 販売・仕入・在庫</b> <span style="font-weight:600; color:#333">認定試験概要</span></div>
                    <table style="border-collapse:collapse;" width="100%" cellspacing="0" cellpadding="5" border="1" bordercolor="#c5c3c4">
                        <tbody>
                            <tr style="background:#ffc300; color:#3c4238; font-size:18px;">
                                <th class="list_soi_g1" style="width:50%">筆記試験</th>
                                <th class="list_soi_g1 img-step-soi" style="width:50%">実技試験</th>
                            </tr>
                            <tr>
                                <td class="list_g1">販売・仕入・在庫業務の基礎知識</td>
                                <td class="list_g1 img-step-soi">データの作成</td>
                            </tr>
                            <tr>
                                <td class="list_g1">　・日常業務知識</td>
                                <td class="list_g1 img-step-soi">初期設定</td>
                            </tr>
                            <tr>
                                <td class="list_g1">販売王 販売・仕入・在庫の基礎知識</td>
                                <td class="list_g1 img-step-soi">　・会社情報</td>
                            </tr>
                            <tr>
                                <td class="list_g1">　・スペック</td>
                                <td class="list_g1 img-step-soi">　・得意先、仕入先、商品等</td>
                            </tr>
                            <tr>
                                <td class="list_g1">　・操作･機能</td>
                                <td class="list_g1 img-step-soi">　・各台帳処理</td>
                            </tr>
                            <tr>
                                <td class="list_g1">消費税改正</td>
                                <td class="list_g1 img-step-soi">日常処理</td>
                            </tr>
                            <tr>
                                <td class="list_g1">パソコンの基礎知識</td>
                                <td class="list_g1 img-step-soi">　・売上伝票入力・仕入伝票</td>
                            </tr>
                            <tr>
                                <td class="list_g1">　・ネットワーク関連</td>
                                <td class="list_g1 img-step-soi">月次処理</td>
                            </tr>
                            <tr>
                                <td class="list_g1">　・Windowsの基礎知識</td>
                                <td class="list_g1 img-step-soi">　・請求書発行処理</td>
                            </tr>
                            <tr>
                                <td class="img-step-soi" style="border:none"></td>
                                <td class="list_g1 img-step-soi">　・入金処理</td>
                            </tr>
                            <tr>
                                <td class="img-step-soi" style="border:none"></td>
                                <td class="list_g1 img-step-soi">　・買掛処理</td>
                            </tr>
                        </tbody>
                    </table>

                    <!--MOBILE-->
                    <table class="shedule-soi" style="border-collapse:collapse;" width="100%" cellspacing="0" cellpadding="5" border="1" bordercolor="#c5c3c4">
                        <tbody>
                            <tr style="background:#ffc300; color:#3c4238; font-size:18px;">
                                <th class="list_soi_g1" style="width:50%">実技試験</th>
                            </tr>
                            <tr>
                                <td class="list_g1">データの作成</td>
                            </tr>
                            <tr>
                                <td class="list_g1">初期設定</td>
                            </tr>
                            <tr>
                                <td class="list_g1">　・会社情報</td>
                            </tr>
                            <tr>
                                <td class="list_g1">　・得意先、仕入先、商品等</td>
                            </tr>
                            <tr>
                                <td class="list_g1">　・各台帳処理</td>
                            </tr>
                            <tr>
                                <td class="list_g1">日常処理</td>
                            </tr>
                            <tr>
                                <td class="list_g1">　・売上伝票入力・仕入伝票</td>
                            </tr>
                            <tr>
                                <td class="list_g1">月次処理</td>
                            </tr>
                            <tr>
                                <td class="list_g1">　・請求書発行処理</td>
                            </tr>
                            <tr>
                                <td class="list_g1">　・入金処理</td>
                            </tr>
                            <tr>
                                <td class="list_g1">　・買掛処理</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Row 3 -->
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