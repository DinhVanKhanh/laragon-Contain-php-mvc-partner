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
                <h2 class="title-parent-soi">制度概要</h2>
            </div>
            <div class="p085_150_ui">
                「SOI」は「SOUP」へのステップでありビジネスツールとして、また自己スキルアップの一環としてもご活用いただける資格となっており「SOI」取得者が「SOUP」制度、またはさまざまなビジネスステージでの主役となります。
            </div>

            <!-- Row 1 -->
            <div class="row">
                <div class="index_ptmida">
                    <h3>インフォメーション</h3>
                </div>
                <div style="width:100%; margin:0; padding:10px 20px; background:#ffc400; color:#3b4336; font-size:18px; font-weight:600">SOI試験について</div>
                <div class="index_pttxt" style="background:#eeeeee; color:#3b4336; padding:10px 20px 20px; text-align:justify;">
                    ソリマチの認定資格であるSOI(ソリマチ・オフィシャル・インストラクター)試験の合格者の皆さまはすでに全国のさまざまな職場で活躍されています。<br><br>
                    インストラクター業務としてその実力の証明のために取得するだけでなく、現場での業務ソフトの運用と指導の力を認定する実務資格として、ユーザー様の受験も増えています。<br>
                    「販売チャンスがあったのにソリマチソフトのことがわからなくて困った」<br>
                    「広くユースウェア業務も行ないたい」<br>
                    「実務に詳しい業務ソフトのプロとして、自分をアピールしたい」<br><br>
                    全国で100万本の出荷本数を誇るソリマチソフトの認定資格であるSOIは、きっと皆さまの商売繁盛やステップアップに役立ちます。<br>
                    皆さまのご参加をお待ちしておりますので、ぜひこの機会にお申し込みくださいますようお願いいたします。<br>
                    また試験は臨時的に開催しておりますので、ご希望の方は <a href="mailto:soup@mail.sorimachi.co.jp">soup@mail.sorimachi.co.jp</a> へご相談ください。
                </div>
            </div>

            <!-- Row 2 -->
            <div class="row">
                <div class="index_ptmida">
                    <h3>認定後の特典</h3>
                </div>

                <div class="index_pttxt">
                    <div class="p085_150" style="padding-left:15px;"><img src="/assets/images/year/2019/04/icon_01.jpg" /> 認定証（ＩＤカード）を提供いたします。</div>
                    <div style="padding:3px 0 10px 30px"><img src="/assets/images/year/2019/04/soi_img_01.jpg" width="144" height="96" /></div>
                    <div class="p085_150" style="padding-left:15px;"><img src="/assets/images/year/2019/04/icon_01.jpg" /> 認定シール（名刺貼付用）を提供いたします。</div>
                </div>
            </div>

            <!-- Row 3 -->
            <div class="row">
                <div class="index_ptmida">
                    <h3>お申し込み条件</h3>
                </div>
                <div class="index_pttxt">
                    <div style="padding-bottom:4px;">(1) Windows の基本操作を理解している。</div>
                    <div>(2) 受講しようとする対象アプリケーションソフトの基本操作を理解している。また、業務に関する基礎知識を備えている。</div>
                    <div style="padding-left:20px; padding-bottom:3px;">
                        【 <b>会計</b> 】 経理の流れ、簿記の知識があること。<br>
                        【 <b>給与</b> 】 給与計算（所得税・社会保険等）の知識があること。<br>
                        【 <b>販売</b> 】 一般的な販売・仕入・在庫管理の知識があること。
                    </div>
                    <div style="padding-left:30px;">※条件は諸事情により、変更される場合があります。</div>
                    <div style="padding-bottom:3px;">※お申込み方法につきましては [ <a href="/partner/soi/step.php"><b>お申込から認定まで</b></a> ] のページをご覧ください。</div>
                </div>
            </div>

            <!-- Row 4 -->
            <div class="row">
                <div class="index_ptmida">
                    <h3>認定タイトルの種類とセミナー受講料及び受験料</h3>
                </div>
                <div class="index_pttxt">
                    <table style="border-collapse:collapse;" width="100%" cellspacing="0" cellpadding="5" border="1" bordercolor="#c5c3c4">
                        <tbody>
                            <tr style="background:#ffc300">
                                <th style="background:#eceaeb; padding:10px 0; width:25%">分野</th>
                                <th style="width:25%">会計</th>
                                <th style="width:25%">給与</th>
                                <th style="width:25%">販売</th>
                            </tr>
                            <tr style='text-align:center'>
                                <th style="background:#eceaeb; padding: 10px 0">認定タイトルの種類</th>
                                <td>『会計王』</td>
                                <td>『給料王』</td>
                                <td>『販売王 <br><span style="font-size:80%;">販売・仕入・在庫』</span></td>
                            </tr>
                            <tr style='text-align:center'>
                                <th style="background:#eceaeb; padding: 10px 0">認定試験対策<br>セミナー受講料</th>
                                <!--                        <td colspan="3">10,000円(税抜価格)</td>-->
                                <td colspan="3">11,000円(税込価格)</td>
                            </tr>
                            <tr style='text-align:center'>
                                <th style="background:#eceaeb; padding: 10px 0">認定試験受験料</th>
                                <!--                        <td colspan="3">10,000円(税抜価格)／タイトル(筆記試験・実技試験)</td>-->
                                <td colspan="3">11,000円(税込価格)／タイトル(筆記試験・実技試験)</td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="margin-top:20px; padding-bottom:3px;">※製品がバージョンアップされた場合、バージョンアップセミナーまたは更新試験を受講していただく場合がございます。</div>
                    <div style="padding-bottom:3px;">※事前に学習していただくために、認定タイトルのデモ（体験）版を弊社ホームページよりダウンロードいただけます。</div>
                    <div>※試験の内容や予定につきましては [ <a href="/partner/soi/schedule.php"><b>認定試験・セミナー情報</b></a> ] のページをご覧ください。</div>
                </div>
            </div>

            <!-- Row 5 -->
            <div class="row">
                <div class="index_ptmida">
                    <h3>お問い合わせ</h3>
                </div>
                <div class="index_pttxt">
                    ソリマチ株式会社<br>
                    ソリマチパートナー事務局<br>
                    〒141-0022<br>
                    東京都品川区東五反田3-18-6　ソリマチ第8ビル<br>
                    TEL:03-6773-7530&nbsp;&nbsp;FAX:03-6685-4470<br>
                    e-mail : <a href="mailto:soup@mail.sorimachi.co.jp">soup@mail.sorimachi.co.jp</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once __DIR__ . "/../template/footer/footer.php"; ?>