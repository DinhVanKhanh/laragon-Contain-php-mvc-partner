<?php
//import css and js
require_once __DIR__ . "/../template/index.php";
//import header to check islogin()
require_once __DIR__ . "/../template/header/header.php";

@$typePage; //show from controller
@$template; //show from controller
global $SORIMACHI_HOME_SSL;
?>
<div id="partner-container">
    <div class="containers clear">
        <div class="buttonscroll">
            <button id="btn-last-page1" style="background-color:#f60;"><a href="#SMB">ソリマチブランドマスターのご案内</a></button>
            <button id="btn-last-page2" style="background-color:#f60;"><a href="#table-price">ご入会・お申し込み</a></button>
        </div>

        <div>
            <h2 class="title-parent-soup">SOUP 制度概要</h2>
        </div>
        <div class="p085_150_ui">
            <span style="color:#f60;">ビジネスチャンスと売上アップに直結するバックアップ体制！</span></br>
            ソリマチ認定スースウェアパートナー「SOUP」制度は、エンドユーザーの複雑な要望を把握し、解決に導くための確かな技能と経験を持った「<a href="https://partner.sorimachi.co.jp/soi/">SOI</a>」が在籍する法人及び個人事業に対して認定される支援制度です。<br>
            認定後は、売上アップに直結するさまざまな有益情報や、実務に則したサポートが貴社のビジネスチャンスを大きく広げます。
        </div>

        <!-- Row 1 -->
        <div class="row">
            <div class="img_stt"><img src="/assets/images/year/2018/11/nb1.png"></div>
            <div class="info_right">
                <div class="index_ptmida">
                    <h3>認定タイトルの最新ソフトウェアを提供</h3>
                </div>
                <div class="index_pttxt">レベルアップや税制改正などその都度お客さまより早く提供いたしますので、常に最新の製品をご利用ご確認いただけます。</div>
            </div>
        </div>

        <!-- Row 2 -->
        <div class="row">
            <div class="img_stt"><img src="/assets/images/year/2018/11/nb2.png"></div>
            <div class="info_right">
                <div class="index_ptmida">
                    <h3>SOUP会員をソリマチホームページで紹介</h3>
                </div>
                <div class="index_pttxt">ソリマチホームページで、登録されたSOUP会員の住所、連絡先、ホームページへのリンクやアピールポイントなどの情報を提供することができます。</div>
            </div>
        </div>

        <!-- Row 3 -->
        <div class="row">
            <div class="img_stt"><img src="/assets/images/year/2018/11/nb3.png"></div>
            <div class="info_right">
                <div class="index_ptmida">
                    <h3>SOUP会員専用WEBサイト</h3>
                </div>
                <div class="index_pttxt">SOUP会員専用WEBサイトをご用意。ソリマチ製品の最新情報や各種ツールがいつでも手に入ります。</div>
            </div>
        </div>

        <!-- Row 4 -->
        <div class="row">
            <div class="img_stt"><img src="/assets/images/year/2018/11/nb4.png"></div>
            <div class="info_right">
                <div class="index_ptmida">
                    <h3>SOUP会員専用コールセンターをご用意</h3>
                </div>
                <div class="index_pttxt">専用回線ですから、よりスムーズで的確なサポートをご提供いたします。さらにフリーダイヤルですので通話料金はかかりません。</div>
            </div>
        </div>

        <!-- Row 5 -->
        <div class="row">
            <div class="img_stt"><img src="/assets/images/year/2018/11/nb5.png"></div>
            <div class="info_right">
                <div class="index_ptmida">
                    <h3>ソリマチ認定スクール申込資格が得られます</h3>
                </div>
                <div class="index_pttxt">ソリマチ製品のセミナーを開催いただける資格です。SOUP会員の方は申込をするだけで別途料金は必要ありません。</div>
            </div>
        </div>

        <!-- Row 6 (SMB) -->
        <div id="SMB">
            <h2 class="title-parent-soup">SBM（ソリマチブランドマスター）のご案内</h2>
        </div>
        <div class="row">
            <div style="width:16%; float:left"><img width="100%" src="/assets/images/year/2018/12/sosp_img_01.jpg"></div>
            <div class="info_right" style="width:84%; padding-left:20px">
                <div class="index_pttxt">「SOSP」と「SOUP」の両制度に加盟している事業者の証、それが「SBM（ソリマチブランドマスター）」です。ソフトウェアの購入時はもちろん購入後の運用指導まで、ソリマチ製品のことならなんでも相談できる心強い存在として、全国のソリマチユーザーから高い支持を得ています。</div>
            </div>
        </div>

        <!--------- TABLE PRICE --------->
        <div id="table-price">
            <h2 class="title-parent-soup">ご入会・お申し込み</h2>
        </div>
        <div class="info-left">
            <div class="row">
                <div class="index_ptmida">
                    <h3>お申し込みの条件</h3>
                </div>
                <div class="index_pttxt">１タイトル以上のソリマチ認定インストラクター「SOI」が同一事業所に１名以上在籍していること。業務ソフトのサポート業務を行なうための必要な体制が整っていること。</div>
            </div>

            <div class="row">
                <div class="index_ptmida">
                    <h3>登録料及び年会費</h3>
                </div>
                <table cellpadding="0" cellspacing="0" style="text-align:center;">
                    <tr style="background-color:rgba(0,0,0,0.2);">
                        <td>初年度ご登録料金</td>
                        <td></td>
                    </tr>
                    <tr style="border-top:0.5px dotted #333; border-bottom:0.5px dotted #333">
                        <td>登録料</td>
                        <!--                <td>20,000円（税抜価格)</td>-->
                        <td>22,000円（税込価格)</td>
                    </tr>
                    <tr style="border-top:0.5px dotted #333; border-bottom:0.5px dotted #333">
                        <td>年会費</td>
                        <!--                <td>30,000円（税抜価格)</td>-->
                        <td>33,000円（税込価格)</td>
                    </tr>
                    <tr style="background-color:rgba(0,0,0,0.2);">
                        <td>次年度以降</td>
                        <td></td>
                    </tr>
                    <tr style="border-top:0.5px dotted #333; border-bottom:0.5px dotted #333">
                        <td>更新料金</td>
                        <!--                <td>30,000円（税抜価格)</td>-->
                        <td>33,000円（税込価格)</td>
                    </tr>
                </table>
                ※製品がバージョンアップされた場合、バージョンアップセミナーを受講していただく場合がございます。
            </div>
        </div>
        <div class="info-right">
            <div class="index_ptmida">
                <h3>認定までの流れ</h3>
            </div>
            <div class="row">
                <div class="index_ptmida1" style="background-color:#f60">
                    <h3>認定試験対策教材を送付</h3>
                </div>
                <div class="index_pttxt0" style="text-align:left; padding:10px 20px 45px">ソリマチ認定インストラクター「SOI」のタイトル（会計王、給料王、販売王 販売・仕入・在庫）のうち、いずれか１つの認定を同一事業所の誰かが取得していて、業務ソフトのサポートを行なうための必要な体制が整っていること。</div>
            </div>

            <div class="row">
                <div class="index_ptmida0" style="background-color:#f60">
                    <h3>セミナー受講</h3>
                </div>
                <div class="index_pttxt0" style="text-align:left; padding:10px 20px 45px">
                    ソリマチパートナー事務局から申込書・規約書を取り寄せ、規約内容を確認した上で申込書に必要事項を記入し、ソリマチパートナー事務局へお申し込みください。<br>
                    ※お支払方法については、お申し込み時に弊社よりご説明いたしますので、あらかじめご了承ください。<br>
                    ※申込書による申請をもって規約にご同意いただいたものとみなします。
                </div>
            </div>

            <div class="row">
                <div class="index_ptmida0" style="background-color:#f60">
                    <h3>認定</h3>
                </div>
                <div class="index_pttxt0">
                    <div style="width:16%; float:left"><img width="100%" src="/assets/images/year/2018/12/sosp_img_02.jpg"></div>
                    <div class="info_right" style="width:84%; padding-left:20px;">
                        <div class="index_pttxt" style="text-align: left; margin-top: 0">弊社より、ソリマチ認定ユースウェアパートナー「SOUP」を証明する楯などをお送りします。</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once __DIR__ . "/../template/footer/footer.php"; ?>