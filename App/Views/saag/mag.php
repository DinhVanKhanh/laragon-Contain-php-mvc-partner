<?php
//import css and js
require_once __DIR__ . "/../template/index.php";

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
            <section id="row1" class="clear">
                <div class="title-parent">
                    <h2>メールマガジン バックナンバー</h2>
                </div>
                <div style="padding-top:10px; padding-bottom:10px;">　毎月発行のパートナー様向けメールマガジン、およびエンドユーザー様向けのメールマガジンのバックナンバーを掲載しております。</div>
                <div class="row">
                    <table cellspacing="1" cellpadding="0" border="0">
                        <tbody>
                            <tr>
                                <td nowrap height="30"></td>
                            </tr>
                            <tr>
                                <td style="padding:0px 5px;" nowrap><a href="javascript:PageJump('mag_partner')"><img src="/assets/images/saag/btn_mag_p1.gif" onmouseover="this.src='/assets/images/saag/btn_mag_p2.gif'" onmouseout="this.src='/assets/images/saag/btn_mag_p1.gif'" alt="" border="0"></a></td>
                                <td style="font-size:14px; line-height:20px; font-family:'MS UI Gothic','ＭＳ Ｐゴシック',Osaka,Sans-serif; " nowrap>
                                    パートナー様向けのソリマチ公式メールマガジン<br>
                                    「ソリマチ パートナーニュース」の<br>
                                    バックナンバーはこちらから
                                </td>
                            </tr>
                            <tr>
                                <td nowrap height="30"></td>
                            </tr>
                            <tr>
                                <td style="padding:0px 5px;" nowrap><a href="javascript:PageJump('mag_user_vn')"><img src="/assets/images/saag/btn_mag_u1.gif" onmouseover="this.src='/assets/images/saag/btn_mag_u2.gif'" onmouseout="this.src='/assets/images/saag/btn_mag_u1.gif'" alt="" border="0"></a></td>
                                <td style="font-size:14px; line-height:20px; font-family:'MS UI Gothic','ＭＳ Ｐゴシック',Osaka,Sans-serif; " nowrap>
                                    エンドユーザー様向けのソリマチ公式メールマガジン<br>
                                    「ソリマチ impressメール」の<br>
                                    バックナンバーはこちらから
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>

        <!-- メールマガジンバックナンバー（パートナー向） -->
        <!-- <FORM action="<?//= htmlspecialchars("https://info.sorimachi.co.jp/mag/"); ?>" name="mag_partner" method="post" target="_blank"> -->
        <!-- <FORM action="<?= htmlspecialchars("https://info.hp-sorimachi.apn.mym.sorimachi.biz/mag/"); ?>" name="mag_partner" method="post" target="_blank"> -->
        <FORM action="<?= htmlspecialchars("http://info:6062/mag/"); ?>" name="mag_partner" method="post" target="_blank">
            <input type="hidden" name="mag_user" value="<?= base64_encode(mt_rand(10, 20) . $_SESSION["SAAG-ID"] . mt_rand(10, 20)) ?>">
            <input type="hidden" name="mag_category" value="partner">
            <input type="hidden" name="mag_child" value="saag">
        </FORM>

        <!-- メールマガジンバックナンバー（ユーザー向） -->
        <!-- <FORM action="<?//= htmlspecialchars("https://info.sorimachi.co.jp/mag/"); ?>" name="mag_user_vn" method="post" target="_blank"> -->
        <!-- <FORM action="<?= htmlspecialchars("https://info.hp-sorimachi.apn.mym.sorimachi.biz/mag/"); ?>" name="mag_user_vn" method="post" target="_blank"> -->
        <FORM action="<?= htmlspecialchars("http://info:6062/mag/"); ?>" name="mag_user_vn" method="post" target="_blank">
            <input type="hidden" name="mag_user" value="<?= base64_encode(mt_rand(10, 20) . $_SESSION["SAAG-ID"] . mt_rand(10, 20)) ?>">
            <input type="hidden" name="mag_category" value="user">
            <input type="hidden" name="mag_child" value="saag">
        </FORM>

        <!-- メールマガジンバックナンバー（ユーザー向）
<FORM action="<?= $SORIMACHI_HOME_SSL ?>usersupport/mag/backnumber/list_u.asp" name="mag_user_vn" method="post"><input type="hidden" name="mag_user" value="partner"></FORM> -->
        <!-- メールマガジンバックナンバー（パートナー向）
<FORM action="<?= $SORIMACHI_HOME_SSL ?>partner/mag/backnumber/list_p.asp" name="mag_partner" method="post"><input type="hidden" name="mag_partner" value="saag"></FORM> -->
    </div>
</div>
<?php require_once __DIR__ . "/../template/footer/footer.php"; ?>