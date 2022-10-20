<?php

/* Template Name: Master */
// $btnLogout = '';

$lang = [
    "ja" => "ja",
    "en" => "en",
    "vn" => "vn",
];

?>
<!DOCTYPE HTML>
<html lang="<?= $lang['ja'] ?>">

<head>
    <meta charset="utf-8" />
    <meta name="robots" content="noindex,nofollow">
    <title>フォーム管理 – Partner's Website – Sorimachi</title>
    <link rel='stylesheet' id='wp-block-library-css' href='/assets/css/search_form/style.min.css?ver=5.3.8' type='text/css' media='all' />
    <link rel='stylesheet' id='fancybox-css' href='/assets/css/search_form/jquery.fancybox.css' type='text/css' media='all' />
    <link rel='stylesheet' id='dataTables-css' href='/assets/css/search_form/jquery.dataTables.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='responsive-css' href='/assets/css/search_form/responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' id='datepicker-css' href='/assets/css/search_form/ui.datepicker.css' type='text/css' media='all' />
    <link rel='stylesheet' id='content-css' href='/assets/css/search_form/content.css' type='text/css' media='all' />
</head>

<body>
    <form method="post"><input type="hidden" id="cookie_page" name="cookie_page"></form>
    <article id="main" class="clear clearfix">
        <p id="scLoading" style="display:none;"><img src="/assets/images/uploads/profile/images_layout/icon_loading.gif"></p>
        <section id="main_content" class="clear">
            <div class="tableLayout">
                <div class="tab_menu clearfix">
                    <div class="bt_logout"><?= $btnLogout ?></div>
                    <input type="hidden" id="pageload" value="<?= $page ?>" />
                    <input type="hidden" id="activetab" value="<?= $tabBox ?>">
                    <ul class="tab clearfix" id="tabs">
                        <li id="tabSaag" <?= $tabSaag ?>>SAAG一覧</li>
                        <li id="tabSosp" <?= $tabSosp ?>>SOSP一覧</li>
                        <li id="tabSoup" <?= $tabSoup ?>>SOUP一覧</li>
                        <li id="tab4" <?= $tabMenu ?>>管理者メニュー</li>
                    </ul>

                    <div class="border_tab clear"></div>
                    <!--- Tab Content SAAG SOSP SOUP --->
                    <div class="area" id="tab-box">
                        <div class="boxStyle01 clearfix">
                            <p class="boxTitle"></p>
                            <div id="tableContent" class="clearfix"></div>
                        </div>
                    </div>

                    <!--- Tab Content ADMIN --->
                    <div class="area" id="tab4-box">
                        <p class="boxTitle1">管理者メニュー</p>
                        <ul class="list_button">
                            <li>●パートナーID/PW 取り込み</li>
                            <li>
                                <button onclick="document.getElementById('ipSAAGCSV').click();" class="btn btnAdd btnImport">SAAG</button>
                                <input style="display:none;" type="file" id="ipSAAGCSV" name="ipSAAGCSV" onchange="importDataCSV('SAAG')" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                            </li>
                            <li>
                                <button onclick="document.getElementById('ipSOSPCSV').click();" class="btn btnAdd">SOSP</button>
                                <input style="display:none;" type="file" id="ipSOSPCSV" name="ipSOSPCSV" onchange="importDataCSV('SOSP')" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                            </li>
                            <li>
                                <button onclick="document.getElementById('ipSOUPCSV').click();" class="btn btnAdd">SOUP</button>
                                <input style="display:none;" type="file" id="ipSOUPCSV" name="ipSOUPCSV" onchange="importDataCSV('SOUP')" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                            </li>
                            <li>●SAAG小冊子作成</li>
                            <li><button name="btnExportToCSV" class="btn btnAdd" onclick="exportSaagToCSV();" href="#inline0" style="width:200px; margin-right:3px;">テキストー括ダウンロード</button></li>
                            <!-- そのまま -->
                            <li><button name="btnDownloadAll" class="btn btnAdd" id="downdloadAll" href="#inline0" style="width:200px;">画像⼀括ダウンロード</button></li>
                            <li class="mb20"><button name="btnUpdateDate" id="btnUpdateDate" class="btn btnConfirmDate" href="#resetdate">掲載基準⽇を更新する</button></li>
                            <li>●管理者情報</li>
                            <!-- <li><button name="btnManagerMail" class="btn btnAdd" onclick="loadMailBcc()">メール送信先設定</button></li> -->
                            <li><button name="btnManagerIdPass" class="btn btnAdd" onclick="loadGridIdPass()">管理者ID/PW管理</button></li>
                        </ul>

                        <section id="resetdate" class="section fancyboxSection" style="display:none">
                            <h2 class="h2Title"><span>更新基準日を指定</span></h2>
                            <p>更新基準日：<span id="reset_date"></span></p>
                            <div class="frmSection show_parent pb20 center">
                                <div id="datepicker" style="margin:0 auto;"><input type="hidden" id="resetdate_text"></div>
                            </div>
                            <p class="center pb20"><input type="button" name="btndate" id="btndate" value="更新する" style="width:150px; font-size:15px;" /></p>
                        </section>

                        <section class="detailListID section fancyboxSection">
                            <div class="boxCenter"></div>
                        </section>
                        <section class="boxManage">
                            <div class="mailBcc idPass"></div>
                        </section>
                        <section id="managerIdPass" class="section fancyboxSection" style="display:none">
                            <h2 class="h2Title"><span>ユーザー管理</span></h2>
                            <p class="error error_idpass"></p>
                            <div class="frmSection show_parent pb20">
                                <table summary="ユーザー管理">
                                    <tr>
                                        <th class="w30"><label for="userid">ユーザーID</label><span class="show_pc red_import">(必須)</span></th>
                                        <td><input type="text" name="userid" id="userid" class="bind img-responsive" style="ime-mode:disabled;" size="30" maxlength="50" /></td>
                                    </tr>
                                    <tr>
                                        <th><label for="fullname">ユーザー名</label><span class="show_pc0 red_import">(必須)</span></th>
                                        <td><input type="text" name="fullname" id="fullname" size="30" class="img-responsive" maxlength="50" /></td>
                                    </tr>
                                    <tr>
                                        <th><label for="pwd1">パスワード</label><span class="show_pc1 red_import">(必須)</span></th>
                                        <td><input type="password" name="pwd1" id="pwd1" size="30" class="img-responsive" maxlength="50" /></td>
                                    </tr>
                                    <tr>
                                        <th><label for="pwd2">パスワード確認</label><span class="show_pc1 red_import">(必須)</span></th>
                                        <td><input type="password" name="pwd2" id="pwd2" size="30" class="img-responsive" maxlength="50" /></td>
                                    </tr>
                                    <tr>
                                        <th><label for="pro_id">パートナー</label></th>
                                        <td>
                                            <input name="pro_id" id="admin" value="0" type="radio"><label for="全パートナー">全パートナー </label>
                                            <input name="pro_id" id="saag" value="1" type="radio"><label for="SAAG">SAAGのみ</label>
                                            <input name="pro_id" id="sosp" value="2" type="radio"><label for="SOSP">SOSPのみ</label>
                                            <input name="pro_id" id="soup" value="3" type="radio"><label for="SOUP">SOUPのみ</label>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <p class="center pb20">
                                <input type="button" name="btnSubmitUser" id="btnSubmitUser" value="登録" style="width:150px; font-size:15px; padding:5px !important" />
                                <a title="Close" class="btn" href="javascript:;" onclick="jQuery.fancybox.close()" style="width:150px; font-size:15px;">キャンセル</a>
                            </p>
                        </section>

                        <section id="inline1" class="section fancyboxSection" style="display:none">
                            <h2 class="h2Title"><span>メール送信先管理</span></h2>
                            <p class="error_inline1mail"></p>
                            <div class="frmSection show_parent pb20">
                                <table summary="メール送信先管理">
                                    <tbody>
                                        <tr>
                                            <th><label for="FromMail">差出人<span class="red_import">(必須)</span></label></th>
                                            <td><input name="FromMail" id="FromMail" size="25" class="img-responsive" maxlength="100" type="text"></td>
                                        </tr>
                                        <tr>
                                            <th><label for="pro_id">パートナー</label></th>
                                            <td>
                                                <input name="pro_id" id="mail_admin" value="0" type="radio" checked="checked"><label for="全パートナー">全パートナー </label>
                                                <input name="pro_id" id="mail_saag" value="1" type="radio" checked="checked"><label for="SAAG">SAAGのみ </label>
                                                <input name="pro_id" id="mail_sosp" value="2" type="radio"><label for="SOSP">SOSPのみ </label>
                                                <input name="pro_id" id="mail_soup" value="3" type="radio"><label for="SOUP">SOUPのみ </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label for="FromName">差出名<span class="red_import">(必須)</span></label></th>
                                            <td><input name="FromName" id="FromName" size="25" class="img-responsive" maxlength="100" type="text"></td>
                                        </tr>
                                        <tr>
                                            <th><label for="Bcc">BCC</label></th>
                                            <td><input name="Bcc" id="Bcc" size="25" class="img-responsive" maxlength="100" type="text"></td>
                                        </tr>
                                        <tr>
                                            <th><label for="Host">SMTPサーバー<span class="red_import">(必須)</span></label></td>
                                            <td><input name="Host" id="Host" size="25" class="img-responsive" maxlength="30" type="text"></td>
                                        </tr>
                                        <tr>
                                            <th><label for="EncriptionType">暗号化方式<span class="red_import">(必須)</span></label></th>
                                            <td>
                                                <input name="EncriptionType" id="raNone" value="0" type="radio"><label for="raNone">なし</label>
                                                <input name="EncriptionType" id="raSSL" value="1" checked="checked" type="radio"><label for="raSSL">SSL</label>
                                                <input name="EncriptionType" id="raTLS" value="2" type="radio"><label for="raTLS">TLS</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label for="Port">SMTPポート<span class="red_import showport" style="visibility:visible">(必須)</span></label></td>
                                            <td><input name="Port" id="Port" size="25" class="img-responsive" maxlength="10" type="text"></td>
                                        </tr>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <td style="padding-top:10px;"><input id="checkSmtp" name="checkSmtp" type="checkbox"> <label for="checkSmtp">SMTPを有効にします</label></td>
                                        </tr>
                                        <tr>
                                            <th><label for="Username">SMTPユーザ名</label><span class="red_import">(必須)</span></th>
                                            <td><input name="Username" id="Username" size="25" class="img-responsive" maxlength="100" type="text"></td>
                                        </tr>
                                        <tr>
                                            <th><label for="Password">SMTPパスワード<span class="red_import">(必須)</span></label></th>
                                            <td><input name="Password" id="Password" size="25" class="img-responsive" maxlength="24" type="password"></td>
                                        </tr>
                                        <tr>
                                            <th><label>テスト用の宛先</label></th>
                                            <td><input type="text" name="MailTest" id="MailTest" value="k_watanabe@mail.sorimachi.co.jp" size="25" class="img-responsive" maxlength="50" /></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <p class="center pb20">
                                <input type="button" name="btnTestMail" value="テスト用の送信" style="width:150px; font-size:15px; padding:5px !important" />
                                <input type="button" name="btnEditApp" value="登録" style="width:150px; font-size:15px; padding:5px !important" />
                                <a title="Close" class="btn btnClose" href="javascript:;" onclick="jQuery.fancybox.close()" style="width:150px; font-size:15px; padding:5px !important">キャンセル</a>
                            </p>
                        </section>
                    </div>
                </div>

                <!-- Confirm dialog -->
                <div class="fancyboxConfirm" id="confirmBox" style="display:none;">
                    <div class="cell-middle">
                        <p class="message">SAAGIDを削除してよろしいでしょうか？</p>
                        <p class="btnCenter">
                            <button name="btnDel_b" id="del_b" class="btnDel btnDel_a">はい</button>
                            <a title="Close" class="btn btnClose" href="javascript:;" onclick="jQuery.fancybox.close()" style="width:150px; font-size:15px;">いいえ</a>
                        </p>
                    </div>
                </div>

                <!-- Confirm dialog Delete Users -->
                <div class="fancyboxConfirm" id="confirmBoxDelUser" style="display:none;">
                    <div class="cell-middle">
                        <p class="message">ユーザーを削除してよろしいでしょうか？</p>
                        <p class="btnCenter">
                            <button name="btnDel_user" id="del_user" class="btnDel btnDel_user">はい</button>
                            <a title="Close" class="btn btnClose" href="javascript:;" onclick="jQuery.fancybox.close()" style="width:150px; font-size:15px;">いいえ</a>
                        </p>
                    </div>
                </div>
            </div>

            <!---------- DIALOG SAAG ------------->
            <section class="section fancyboxSection" id="inline0" style="display:none;">
                <form id='HTMLEdit' action="" method="POST"></form>
                <div id="inputDialog"></div>
            </section>
        </section>
    </article>
    <input type="hidden" id="mail_id">
    <input type="hidden" id="old_bcc">
    <input type="hidden" id="userId">
    <input type="hidden" id="isEditUser">
    <input type="hidden" id="hidePw1" />
    <input type="hidden" id="change" />
    <input type="hidden" id="EmailId">
    <input type="hidden" id="isEditMail">
    <input type="hidden" id="valSubCheckID">
    <input type="hidden" id="valNewID" value="0">
    <input type="hidden" id="valOldID">


    <!-- Dialog check and update ID in TFP -->
    <div class="fancyboxConfirm" id="dialogOpen" style="display:none;">
        <div class="dialog-form">
            <div class="row" style="width: 70%;">
                <!-- <a title="Close" class="dialog-close" onclick="$('#dialogOpen').dialog('close');"></a> -->
                <a title="Close" class="dialog-close" onclick="$('#dialogOpen').dialog('close');">
                    <img src="/assets/images/uploads/profile/images_layout/dialog_close.png">
                </a>
                <div class="dialog-title-info content-center" style="color:#C00000;">パートナー会員IDを変更する</div>
                <div class="hr">
                    <hr>
                </div>
                <div class="infomation">
                    <span class="old-id">現在のパートナー会員ID :</span>
                    <span class="old-id" id="oldID"></span>
                </div>
                <div class="infomation" style="color:red">
                    <span class="new-id">新しいパートナー会員ID :</span>
                    <div class="infomation-side">
                        <input class="new-id" id="newID" value="">
                        <span class="showNewID new-id" style="display: none;"></span>
                        <p class="new-id serialNewID" id="serialNewID"></p>
                    </div>

                </div>
                <div class="notificate">
                    <div class="notificate-box">
                        <span id="notificate1">【要注意】TFPに登録されていない会員IDを新たに指定することはできません。この画面で会員IDを変更する場合は、予めTFPの登録情報をご確認ください。</span>
                        <span id="notificate2" style="display:none;">【要注意】パートナー会員IDを変更すると、元に戻すことができません。新しいパートナー会員IDが正しいことを、もう一度ご確認ください。</span>
                        <span id="notificate3" style="display:none;">パートナー会員IDの変更が完了しました。</span>
                        <span id="notificate-error"></span>

                    </div>
                </div>
                <div class="divCheckID content-center">
                    <button class="subCheckID radius" id="subCheckIDStep1" onclick="checkID()">パートナー会員IDを確認する</button>
                    <button class="subCheckID radius" id="subCheckIDStep2" style="display:none;" onclick="updateDatabaseFromID()">パートナー会員IDを変更する</button>
                    <button class="subCheckID radius" id="subCheckIDStep3" style="display:none;" onclick="reloadData();">閉じる</button>
                </div>
            </div>
        </div>
    </div>
</body>
<?php /* wp_footer(); */ ?>

</html>

<!-- Dinh Van Khanh -->

<!-- <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> -->
<!-- <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script> -->
<script type='text/javascript' src='/assets/js/search_form/jquery-1.11.1.min.js'></script>
<script type='text/javascript' src='/assets/js/search_form/jquery-ui-1.11.1.min.js'></script>
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script> -->
<!-- <script src="https://code.jquery.com/ui/1.13.0-rc.3/jquery-ui.js" integrity="sha256-tYLuvehjddL4JcVWw1wRMB0oPSz7fKEpdZrIWf3rWNA=" crossorigin="anonymous"> -->
<!-- </script> -->
<!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" /> -->
<!-- Dinh Van Khanh -->

<script type='text/javascript' src='/assets/js/search_form/jquery.js'></script>
<script type='text/javascript' src='/assets/js/search_form/jquery-migrate.min.js'></script>
<script type='text/javascript' src='/assets/js/search_form/autosize.js'></script>
<script type='text/javascript' src='/assets/js/search_form/init.js'></script>

<script type='text/javascript' src='/assets/js/search_form/jquery.dataTables.min.js'></script>
<script type='text/javascript' src='/assets/js/search_form/jquery.datepair.js'></script>
<script type='text/javascript' src='/assets/js/search_form/jquery.fancybox.js'></script>

<script type='text/javascript' src='/assets/js/search_form/master.js'></script>