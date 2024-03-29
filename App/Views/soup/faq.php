<?php
//import css and js
require_once __DIR__ . "/../template/index.php";

//import head
require_once __DIR__ . "/../template/header/header.php";

// //showDir();
$typePage; //show from controller
$template; //show from controller
global $VER_WHP, $SORIMACHI_HOME, $SORIMACHI_HOME_SSL, $SERVER_DOWNLOAD_MEMBER, $SORIMACHIWEB_HOME;

?>
<!-- Content Left -->
<div id="partner-container">
    <div class="containers clear">
        <div class="sidebar" id="sidebar">
            <?php require_once __DIR__ .  "/../template/sidebar/sidebar.php"; ?>
        </div>

        <!-- Content Right -->
        <div class="content-right">
            <div>
                <h2 class="title-parent-soup">製品Ｑ＆Ａ</h2>
            </div>
            <div style="padding-left:5px">
                <div style="margin:10px 0px;" class="p085_150">ソリマチ製品を使っていて困ったことについてお答えします。<BR>　製品名をクリックしてご利用ください。</div>
                <table class="table_solution" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
                    <tr>
                        <td class="list_soup_g1cm" width="20%"><a href="https://member.sorimachi.co.jp/faq/kakutei2022/" target="_blank">みんなの<BR>確定申告<br>令和4年分</a></td>
                        <td class="list_soup_g1cm" width="20%"><a href="https://member.sorimachi.co.jp/faq/etax2022/" target="_blank">みんなの<BR>電子申告<br>令和4年分</a></td>
                    </tr>
                    <tr>
                        <td nowrap colspan="5" height="10"></td>
                    </tr>
                    <tr>
                        <td class="list_soup_g1cm" width="20%"><a href="https://member.sorimachi.co.jp/faq/accstd22/" target="_blank">会計王22</a></td>
                        <td class="list_soup_g1cm" width="20%"><a href="https://member.sorimachi.co.jp/faq/accnet22/" target="_blank">会計王22 PRO</a></td>
                        <td class="list_soup_g1cm" width="20%"><a href="https://member.sorimachi.co.jp/faq/accnpo22/" target="_blank">会計王22<BR>NPO法人スタイル</a></td>
                        <td class="list_soup_g1cm" width="20%"><a href="https://member.sorimachi.co.jp/faq/accper22/" target="_blank">みんなの<BR>青色申告22</a></td>
                        <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="list_soup_g1cm"><a href="https://member.sorimachi.co.jp/faq/psl22/" target="_blank">給料王22</a></td>
                        <td class="list_soup_g1cm"><a href="https://member.sorimachi.co.jp/faq/sal22/" target="_blank">販売王22</a></td>
                        <td class="list_soup_g1cm"><a href="https://member.sorimachi.co.jp/faq/spr22/" target="_blank">販売王22<BR>販売・仕入・在庫</a></td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                        <td nowrap colspan="5" height="10"></td>
                    </tr>
                    <tr>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/kakutei2021/" target="_blank">みんなの<BR>確定申告<br>令和3年分</a></td>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/etax2021/" target="_blank">みんなの<BR>電子申告<br>令和3年分</a></td>
                    </tr>
                    <tr>
                        <td nowrap colspan="5" height="10"></td>
                    </tr>
                    <tr>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/accstd21/" target="_blank">会計王21</a></td>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/accnet21/" target="_blank">会計王21 PRO</a></td>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/accnpo21/" target="_blank">会計王21<BR>NPO法人スタイル</a></td>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/acccar21/" target="_blank">会計王21<BR>介護事業所スタイル</a></td>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/accper21/" target="_blank">みんなの<BR>青色申告21</a></td>
                    </tr>
                    <tr>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/psl21/" target="_blank">給料王21</a></td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                        <td nowrap colspan="5" height="10"></td>
                    </tr>
                    <tr>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/accstd20/" target="_blank">会計王20</a></td>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/accnet20/" target="_blank">会計王20 PRO</a></td>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/accnpo20/" target="_blank">会計王20<BR>NPO法人スタイル</a></td>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/acccar20/" target="_blank">会計王20<BR>介護事業所スタイル</a></td>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/accper20/" target="_blank">みんなの<BR>青色申告20</a></td>
                    </tr>
                    <tr>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/psl20/" target="_blank">給料王20</a></td>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/sal20/" target="_blank">販売王20</a></td>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/spr20/" target="_blank">販売王20<BR>販売・仕入・在庫</a></td>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/scl20/" target="_blank">顧客王20</a></td>
                        <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                        <td nowrap colspan="5" height="10"></td>
                    </tr>
                    <tr>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/accstd19/" target="_blank">会計王19</a></td>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/accnet19/" target="_blank">会計王19 PRO</a></td>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/accnpo19/" target="_blank">会計王19<BR>NPO法人スタイル</a></td>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/acccar19/" target="_blank">会計王19<BR>介護事業所スタイル</a></td>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/accper19/" target="_blank">みんなの<BR>青色申告19</a></td>
                    </tr>
                    <tr>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/psl19/" target="_blank">給料王19</a></td>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/sal19/" target="_blank">販売王19</a></td>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/spr19/" target="_blank">販売王19<BR>販売・仕入・在庫</a></td>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/scl19/" target="_blank">顧客王19</a></td>
                        <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                        <td nowrap colspan="5" height="10"></td>
                    </tr>
                    <tr>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/accstd18/" target="_blank">会計王18</a></td>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/accnet18/" target="_blank">会計王18 PRO</a></td>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/accnpo18/" target="_blank">会計王18<BR>NPO法人スタイル</a></td>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/acccar18/" target="_blank">会計王18<BR>介護事業所スタイル</a></td>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/accper18/" target="_blank">みんなの<BR>青色申告18</a></td>
                    </tr>
                    <tr>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/psl18/" target="_blank">給料王18</a></td>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/sal18/" target="_blank">販売王18</a></td>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/spr18/" target="_blank">販売王18<BR>販売・仕入・在庫</a></td>
                        <td class="list_g1cm"><a href="https://member.sorimachi.co.jp/faq/scl18/" target="_blank">顧客王18</a></td>
                        <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                        <td nowrap colspan="5" height="10"></td>
                    </tr>
                    <tr>
                        <td class="list_g1cm"><a href="http://support.sorimachi.co.jp/faq-s/prd/accstd17/" target="_blank">会計王17</a></td>
                        <td class="list_g1cm"><a href="http://support.sorimachi.co.jp/faq-s/prd/accnet17/" target="_blank">会計王17 PRO</a></td>
                        <td class="list_g1cm"><a href="http://support.sorimachi.co.jp/faq-s/prd/accstd17/?mode=npo" target="_blank">会計王17<BR>NPO法人スタイル</a></td>
                        <td class="list_g1cm"><a href="http://support.sorimachi.co.jp/faq-s/prd/accstd17/?mode=car" target="_blank">会計王17<BR>介護事業所スタイル</a></td>
                        <td class="list_g1cm"><a href="http://support.sorimachi.co.jp/faq-s/prd/accper17/" target="_blank">みんなの<BR>青色申告17</a></td>
                    </tr>
                    <tr>
                        <td class="list_g1cm"><a href="http://support.sorimachi.co.jp/faq-s/prd/psl17/" target="_blank">給料王17</a></td>
                        <td class="list_g1cm"><a href="http://support.sorimachi.co.jp/faq-s/prd/sal17/" target="_blank">販売王17</a></td>
                        <td class="list_g1cm"><a href="http://support.sorimachi.co.jp/faq-s/prd/spr17/" target="_blank">販売王17<BR>販売・仕入・在庫</a></td>
                        <td class="list_g1cm"><a href="http://support.sorimachi.co.jp/faq-s/prd/scl17/" target="_blank">顧客王17</a></td>
                        <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                        <td nowrap colspan="5" height="10"></td>
                    </tr>
                    <tr>
                        <td class="list_g1cm"><a href="<?= $SORIMACHI_HOME ?>usersupport/products_support/products_faq/kaikei16/" target="_blank">会計王16</a></td>
                        <td class="list_g1cm"><a href="<?= $SORIMACHI_HOME ?>usersupport/products_support/products_faq/kaikei16_pro/" target="_blank">会計王16 PRO</a></td>
                        <td class="list_g1cm"><a href="<?= $SORIMACHI_HOME ?>usersupport/products_support/products_faq/kaikei16/?mode=npo" target="_blank">会計王16<BR>NPO法人スタイル</a></td>
                        <td class="list_g1cm"><a href="<?= $SORIMACHI_HOME ?>usersupport/products_support/products_faq/kaikei16/?mode=car" target="_blank">会計王16<BR>介護事業所スタイル</a></td>
                        <td class="list_g1cm"><a href="<?= $SORIMACHI_HOME ?>usersupport/products_support/products_faq/min_aosin16/" target="_blank">みんなの<BR>青色申告16</a></td>
                    </tr>
                    <tr>
                        <td class="list_g1cm"><a href="<?= $SORIMACHI_HOME ?>usersupport/products_support/products_faq/kyuryo16/" target="_blank">給料王16</a></td>
                        <td class="list_g1cm"><a href="<?= $SORIMACHI_HOME ?>usersupport/products_support/products_faq/hanbai16/" target="_blank">販売王16</a></td>
                        <td class="list_g1cm"><a href="<?= $SORIMACHI_HOME ?>usersupport/products_support/products_faq/hanbai16_pro/" target="_blank">販売王16<BR>販売・仕入・在庫</a></td>
                        <td class="list_g1cm"><a href="<?= $SORIMACHI_HOME ?>usersupport/products_support/products_faq/kokyaku16/" target="_blank">顧客王16</a></td>
                        <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                        <td nowrap colspan="5" height="10"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once __DIR__ . "/../template/footer/footer.php"; ?>