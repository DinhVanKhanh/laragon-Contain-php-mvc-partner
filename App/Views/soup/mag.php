<?php
//import css and js
require_once __DIR__ . "/../template/index.php";

//import head
require_once __DIR__ . "/../template/header/header.php";

// //showDir();
$typePage; //show from controller
$template; //show from controller

global $SORIMACHI_HOME;
// require_once($_SERVER['DOCUMENT_ROOT'] . "/../../common_files/connect_db.php" );
//         $DB_SERVER_PARTNER_NAME = $_ENV['DB_SERVER_PARTNER_NAME'];
//         $NAME_PARTNER_DB = $_ENV['NAME_PARTNER_DB'];
//         $USER_PARTNER_DB = $_ENV['USER_PARTNER_DB'];
//         $PASS_PARTNER_DB = $_ENV['PASS_PARTNER_DB'];
// echo "DB_SERVER_PARTNER_NAME:" . $DB_SERVER_PARTNER_NAME ."--".$NAME_PARTNER_DB . "-" . $USER_PARTNER_DB . "-" . $PASS_PARTNER_DB;
// echo "mot hai ba";
?>
<!-- Content Left -->
<div id="partner-container">
    <div class="containers clear">
        <div class="sidebar" id="sidebar">
            <?php require_once __DIR__ .  "/../template/sidebar/sidebar.php"; ?>
        </div>

        <!-- Content Right -->
        <div class="content-right">
            <section id="row1" class="clear">
                <div>
                    <h2 class="title-parent-soup">メールマガジン バックナンバー</h2>
                </div>
                <div style="padding-top:10px; padding-bottom:10px;">　毎月発行のパートナー様向けメールマガジン、およびエンドユーザー様向けのメールマガジンのバックナンバーを掲載しております。</div>
                <div class="row">
                    <table border="0" cellspacing="1" cellpadding="0">
                        <tr>
                            <td nowrap height="30"></td>
                        </tr>
                        <tr>
                            <td nowrap style="padding:0px 5px;"><a href="javascript:PageJump('mag_partner')"><img src="/assets/images/soup/btn_mag_p1.gif" onMouseover="this.src='/assets/images/soup/btn_mag_p2.gif'" onMouseout="this.src='/assets/images/soup/btn_mag_p1.gif'" border="0" alt=""></a></td>
                            <td nowrap style="font-size:14px; line-height:20px; font-family:'MS UI Gothic','ＭＳ Ｐゴシック',Osaka,Sans-serif; ">
                                パートナー様向けのソリマチ公式メールマガジン<BR>
                                「ソリマチ パートナーニュース」の<BR>
                                バックナンバーはこちらから
                            </td>
                        </tr>
                        <tr>
                            <td nowrap height="30"></td>
                        </tr>
                        <tr>
                            <td nowrap style="padding:0px 5px;"><a href="javascript:PageJump('mag_user_vn')"><img src="/assets/images/soup/btn_mag_u1.gif" onMouseover="this.src='/assets/images/soup/btn_mag_u2.gif'" onMouseout="this.src='/assets/images/soup/btn_mag_u1.gif'" border="0" alt=""></a></td>
                            <td nowrap style="font-size:14px; line-height:20px; font-family:'MS UI Gothic','ＭＳ Ｐゴシック',Osaka,Sans-serif; ">
                                エンドユーザー様向けのソリマチ公式メールマガジン<BR>「ソリマチ impressメール」の<BR>バックナンバーはこちらから
                            </td>
                        </tr>
                    </table>
                </div>
            </section>
        </div>


        <!-- メールマガジンバックナンバー（パートナー向） -->
        <FORM action="<?= htmlspecialchars("https://info.sorimachi.co.jp/mag/"); ?>" name="mag_partner" method="post" target="_blank">
            <input type="hidden" name="mag_user" value="<?= base64_encode(mt_rand(10, 20) . $_SESSION["SOUP-ID"] . mt_rand(10, 20)) ?>">
            <input type="hidden" name="mag_category" value="partner">
            <input type="hidden" name="mag_child" value="soup">
        </FORM>

        <!-- メールマガジンバックナンバー（ユーザー向） -->
        <FORM action="<?= htmlspecialchars("https://info.sorimachi.co.jp/mag/"); ?>" name="mag_user_vn" method="post" target="_blank">
            <input type="hidden" name="mag_user" value="<?= base64_encode(mt_rand(10, 20) . $_SESSION["SOUP-ID"] . mt_rand(10, 20)) ?>">
            <input type="hidden" name="mag_category" value="user">
            <input type="hidden" name="mag_child" value="soup">
        </FORM>

        <!-- メールマガジンバックナンバー（ユーザー向）
<FORM action="https://www.sorimachi.co.jp/usersupport/mag/backnumber/list_u.asp" name="mag_user_vn" method="post"><input type="hidden" name="mag_user" value="partner"></FORM> -->
        <!-- メールマガジンバックナンバー（パートナー向）
<FORM action="https://www.sorimachi.co.jp/partner/mag/backnumber/list_p.asp" name="mag_partner" method="post"><input type="hidden" name="mag_partner" value="saag"></FORM> -->
    </div>
</div>
<?php require_once __DIR__ . "/../template/footer/footer.php"; ?>