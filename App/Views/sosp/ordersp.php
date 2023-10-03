<?php
//import css and js
require_once __DIR__ . "/../template/index.php";

//import head
require_once __DIR__ . "/../template/header/header.php";

// //showDir();
@$typePage; //show from controller. $typePage = saag
@$template; //show from controller. $template = index
$id = @$_SESSION["SOSP-ID"];
?>
<link rel="stylesheet" href="/assets/css/general_req.css" type="text/css" media="screen,print">
<div id="partner-container">
    <div class="containers clear">
        <!-- Content Left -->
        <div class="sidebar" id="sidebar" style="height:1300px">
            <?php require_once __DIR__ .  "/../template/sidebar/sidebar.php"; ?>
        </div>

        <!-- Content Right -->
        <div class="content-right">
            <div style="padding-bottom:3px; border-bottom:1px #0078EB solid;"><img src="/assets/images/contact/images_sosp/ctitle_ordersp.gif"></div>
            <div style="padding:0 10px;">
                <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td halign="left" valign="top" style="padding-top:10px; font-size:12.5px;">販促物をご請求の会員様は下記フォームに必要事項をお書きのうえ「次へ」ボタンをクリックしてください。<br>なお、お客さま情報の入力欄は資料をお送りする関係上必須項目となっておりますので、もれなくご記入ください。</td>
                    </tr>
                </table>
                <form method="post" action="/partner/sosp/member/ordersp_form.php">
                    <div style="border:1px #E8E8E8 solid; background-color:#F8F8F8">
                        <div style="text-align:center; background-color:#E8E8E8; margin-bottom:10px;">
                            <span>下記項目をご入力の上、「次へ」ボタンを押してください。</span><br>
                            <span>資料をお送りする関係上、項目はすべて必須入力項目となります。</span>
                        </div>
                        <div style="padding:0 10px;">
                            <div style="margin-bottom:10px; background-color:#E8E8E8;"><label>貴社名</label><br><input type="text" name="syamei" maxlength="60" style="width:100%;" value="<?= !empty($_POST['syamei']) ? $_POST['syamei'] : '' ?>"></div>
                            <div style="margin-bottom:10px; background-color:#E8E8E8;"><label>ご担当者名</label><br><input type="text" name="tant" maxlength="60" style="width:100%;" value="<?= !empty($_POST['tant']) ? $_POST['tant'] : '' ?>"></div>
                            <div style="margin-bottom:10px; background-color:#E8E8E8;">
                                <label>送付先のご住所</label><br>
                                〒<input type="text" name="zip" maxlength="20" style="width:30%;" value="<?= !empty($_POST['zip']) ? $_POST['zip'] : '' ?>"><br>
                                <input type="text" name="address1" maxlength="20" style="width:100%;" value="<?= !empty($_POST['address1']) ? $_POST['address1'] : '' ?>"><br>
                                <input type="text" name="address2" maxlength="20" style="width:100%;" value="<?= !empty($_POST['address2']) ? $_POST['address2'] : '' ?>">
                            </div>
                            <div style="margin-bottom:10px; background-color:#E8E8E8;"><label>電話番号（半角）</label><br><input type="text" name="tel" maxlength="60" style="width:100%;" value="<?= !empty($_POST['tel']) ? $_POST['tel'] : '' ?>"></div>
                            <div style="margin-bottom:10px; background-color:#E8E8E8;"><label>e-mail（半角）</label><br><input type="text" name="email" maxlength="60" style="width:100%;" value="<?= !empty($_POST['email']) ? $_POST['email'] : '' ?>"></div>

                            <!-- LIST(START) -->
                            <div style="margin-bottom:10px;">
                                <table cellspacing="1" cellpadding="4" style="border:0; width:100%;">
                                    <tr>
                                        <td nowrap colspan="2" align="left" valign="middle" bgcolor="#E0E0E0" style="padding-left:5px;">カタログ（必要な部数をご入力ください）</td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#E8E8E8" style="padding-left:5px;">会計王／会計王 PRO</td>
                                        <td bgcolor="#E8E8E8" style="padding-left:5px;"><input type="text" name="c1" size="5" maxlength="6">&nbsp;部</td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#E8E8E8" style="padding-left:5px;">給料王</td>
                                        <td bgcolor="#E8E8E8" style="padding-left:5px;"><input type="text" name="c2" size="5" maxlength="6">&nbsp;部</td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#E8E8E8" style="padding-left:5px;">販売王／販売王 販売・仕入・在庫</td>
                                        <td bgcolor="#E8E8E8" style="padding-left:5px;"><input type="text" name="c3" size="5" maxlength="6">&nbsp;部</td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#E8E8E8" style="padding-left:5px;">みんなの青色申告</td>
                                        <td bgcolor="#E8E8E8" style="padding-left:5px;"><input type="text" name="c5" size="5" maxlength="6">&nbsp;部</td>
                                    </tr>
<!--
                                    <tr>
                                        <td bgcolor="#E8E8E8" style="padding-left:5px;">会計王 NPO法人スタイル</td>
                                        <td bgcolor="#E8E8E8" style="padding-left:5px;"><input type="text" name="c10" size="5" maxlength="6">&nbsp;部</td>
                                    </tr>
-->
                                    <tr>
                                        <td bgcolor="#E8E8E8" style="padding-left:5px;">「王シリーズ」総合カタログ</td>
                                        <td bgcolor="#E8E8E8" style="padding-left:5px;"><input type="text" name="c11" size="5" maxlength="6">&nbsp;部</td>
                                    </tr>
<!--
                                    <tr>
                                        <td bgcolor="#E8E8E8" style="padding-left:5px;">訪問指導お助けパック「レスキュー王」</td>
                                        <td bgcolor="#E8E8E8" style="padding-left:5px;"><input type="text" name="c6" size="5" maxlength="6">&nbsp;部</td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#E8E8E8" style="padding-left:5px;">サポート＆サービスガイドブック〈王シリーズ〉</td>
                                        <td bgcolor="#E8E8E8" style="padding-left:5px;"><input type="text" name="c7" size="5" maxlength="6">&nbsp;部</td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#E8E8E8" style="padding-left:5px;">サポート＆サービスガイドブック〈みんなのシリーズ〉</td>
                                        <td bgcolor="#E8E8E8" style="padding-left:5px;"><input type="text" name="c8" size="5" maxlength="6">&nbsp;部</td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#E8E8E8" style="padding-left:5px;">ソリマチ専用帳票カタログ</td>
                                        <td bgcolor="#E8E8E8" style="padding-left:5px;"><input type="text" name="c9" size="5" maxlength="6">&nbsp;部</td>
                                    </tr>
-->
                                </table>
                                <?php
                                echo "<script>
                                                window.onload = function () { ";
                                for ($i = 1; $i <= 12; $i++) {
                                    echo isset($_POST['c' . $i]) ? '$("input[name=\'c' . $i . '\']").val("' . $_POST['c' . $i] . '");' : '';
                                }
                                echo "}
                                            </script>";
                                ?>
                            </div>

                            <!-- 送信ボタン(START) -->
                            <div>
                                <table cellspacing="0" cellpadding="0" style="border:0; width:100%;">
                                    <tr>
                                        <td nowrap colspan="2" align="center" style="padding-bottom:30px;">
                                            <script src='https://www.google.com/recaptcha/api.js' async defer></script>
                                            <div class="g-recaptcha" data-sitekey="6LftYJEUAAAAACyp331INQW6eidV8O6dHcD2LNGz" data-callback="enableBtn"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td nowrap colspan="2">
                                            <div align="center">弊社の個人情報保護基本方針を必ずご確認の上、確認画面へお進みください。<br>なお、弊社の個人情報保護基本方針につきましては、<a href="https://www.sorimachi.co.jp/about/privacy.php" target="_Blank">こちらのページ</a>からも<br>同じ内容をご確認いただけます。</div>
                                            <div align="center" style="margin:5px auto;"><iframe style="width:600px; height:200px;" src="/partner/policy/"></iframe></div>
                                            <div id="form-submit" style="text-align:center"><input style="margin:10px; width:500px; height:50px; color:#fff; font-weight:bold; font-size:18px; background-color:#f80; border:0px; border-radius:5px; cursor:pointer;" id="submit" type="submit" name="submit" value="個人情報保護基本方針に同意して、確認画面へ進む"></div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="page" value="<?= $_SERVER['REQUEST_URI']; ?>" />
                    <input type="hidden" name="id" value="<?= $id ?>">
                </form>
                <br>
            </div>
        </div>
    </div>
</div>
<?php
require_once __DIR__ . "/../template/footer/footer.php";
?>
<script type="text/javascript">
    $("#submit").attr("disabled", true);
    $("#submit").css("background-color", 'gray');

    function enableBtn() {
        $("#submit").attr("disabled", false);
        $("#submit").css("background-color", '#f80');
    }
</script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('6LdBvO8aAAAAAGioY2UxRcNohv5dxTxFzYqBNuj6', {
            action: 'homepage'
        }).then(function(token) {
            // pass the token to the backend script for verification
        });
    });
</script>