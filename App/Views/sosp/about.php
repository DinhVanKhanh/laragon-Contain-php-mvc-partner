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
                <div>
                    <h2 class="title-parent-sosp">SOSP会員サイトの使い方</h2>
                </div>
                <div style="padding-top:10px; padding-bottom:10px;">SOSP会員専用サイトをご利用いただき、誠にありがとうございます。ソリマチ製品ダウンロードや公式オンラインショップのご利用方法についてご案内いたします。</div>
                <div class="row">
                    <table cellspacing="1" cellpadding="0" border="0">
                        <tr>
                            <td nowrap height="30"></td>
                        </tr>
                        <tr>
                            <td style="font-size:24px; font-weight:bold; line-height:40px; font-family:Meiryo,Sans-serif;">
                                <a href="https://res.sorimachi.co.jp/files_pdf/partner_product_downlaod.pdf" target="_blank">≫&nbsp;製品ダウンロード方法のご案内(PDF)</a>
                            </td>
                        </tr>
                        <tr>
                            <td nowrap height="30"></td>
                        </tr>
                        <tr>
                            <td style="font-size:24px; font-weight:bold; line-height:40px; font-family:Meiryo,Sans-serif;">
                                <a href="https://res.sorimachi.co.jp/files_pdf/partner_howtouse_onlineshop.pdf" target="_blank">≫&nbsp公式オンラインショップの利用方法(PDF)</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </section>
        </div>

    </div>
</div>
<?php require_once __DIR__ . "/../template/footer/footer.php"; ?>