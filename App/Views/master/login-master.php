<?php

/**
 * Template Name: Login master
 * @author Khanh Dinh
 * @since 2021/06
 **/
require_once __DIR__ . '/../../functions/search_form.php';
?>
<html>

<head>
    <title>ログイン</title>
    <meta name="robots" content="noindex,nofollow">
    <link href="/assets/css/search_form/content.css" rel="stylesheet" type="text/css" media="screen,print" />
</head>

<body>
    <section class="form_login">
        <h2 class="h2Title"><span>SMBパートナー検索 管理者画面ログイン</span></h2>
        <div class="login_text">
            <?php
            // $errFormat = "%sを入力してください。 <script type='text/javascript'>jQuery(document).ready(function() { focus('%s'); });</script>";
            // $errWarn = "<script type='text/javascript'>jQuery(document).ready(function() { focus('%s'); });</script>";
            // $err = "";

            // if ($_SERVER['REQUEST_METHOD'] == "POST") {
            //     $Uid = $_POST['txtUid'];
            //     $Upass = $_POST['txtUpass'];

            //     // ログイン処理
            //     if (isset($_POST['wp-submit'])) {
            //         // 入力チェック
            //         if ($Uid == "") {
            //             $err = sprintf($errFormat, 'ユーザーID', 'ユーザーID');
            //             echo sprintf($errWarn, 'txtUid');
            //         } elseif ($Upass == "") {
            //             $err = sprintf($errFormat, 'パスワード', 'パスワード');
            //             echo sprintf($errWarn, 'txtUpass');
            //         }

            //         // 認証チェック
            //         $_SESSION['isLogged'] = false;
            //         if ($err == '') {
            //             $conn = ConnectPartner();
            //             $Uid = preg_replace("/[&^%$#@?|!''= ’–]/", "", $Uid);
            //             $query = "SELECT * FROM userform WHERE userid = '{$Uid}' AND passwords = '" . md5($Upass) . "'";

            //             $row = getRow($conn, $query);
            //             if ($row !== false) {
            //                 $_SESSION['page'] = ($row['pro_id'] == 0) ? "admin" : (($row['pro_id'] == 1) ? "saag" : (($row['pro_id'] == 2) ? "sosp" : "soup"));
            //                 $_SESSION['isLogged'] = true;
            //                 WriteLog(date("Y-m-d") . ", " . date("H:i:s") . ", " . GetClientIP() . ", " . $Uid . ", " . $row["username"] . ", login, ok,");
            //                 echo "<script type='text/javascript'>window.location.replace('/partner/maintenance/master');</script>";
            //             } else {
            //                 $err = 'ユーザーIDまたは パスワードに誤りがあります。';
            //             }
            //         }
            //     }
            // }
            ?>
            <form class="form-horizontal" method="POST" role="form" action="/partner/maintenance/login-master.php">
                <fieldset>
                    <div class="form-group">
                        <p class="error color_red" id="message">
                            <?php
                            if (!empty(@$err)) {
                                echo @$err . '';
                                WriteLog(date("Y-m-d") . ", " . date("H:i:s") . ", " . GetClientIP() . ", " . @$Uid . ", , login, error,");
                            }
                            ?>
                        </p>
                        <label class="control-label col-sm-3">ユーザーID</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control no-copy-paste" name="txtUid" id="txtUid" maxlength="20" value="<?= @$Uid ?>" style="ime-mode:disabled">
                        </div>
                    </div>
                    <div class="form-group clear">
                        <label class="control-label col-sm-3">パスワード</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control no-copy-paste" name="txtUpass" id="txtUpass" maxlength="12">
                        </div>
                    </div>
                    <div class="form-group clear">
                        <div class="col-sm-offset-3">
                            <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-primary" value="ログイン">
                        </div>
                    </div>
                </fieldset>
            </form>
        </div><!-- End login_text -->
    </section>
    <script type="text/javascript" src="/assets/js/search_form/jquery.js"></script>
    <script type="text/javascript" src="/assets/js/search_form/init.js"></script>
    <script type="text/javascript">
        jQuery("#txtUid").on("input", function() {
            var regexp = /[&^%$#!''= ’–]/g;
            if (jQuery(this).val().match(regexp)) {
                jQuery(this).val(jQuery(this).val().replace(regexp, ""));
            }
        });

        jQuery(document).ready(function() {
            focus('txtUid');

            var ctrlDown = false,
                ctrlKey = 17,
                cmdKey = 91,
                vKey = 86,
                cKey = 67;

            jQuery(document).keydown(function(e) {
                if (e.keyCode == ctrlKey || e.keyCode == cmdKey) {
                    ctrlDown = true;
                }
            }).keyup(function(e) {
                if (e.keyCode == ctrlKey || e.keyCode == cmdKey) {
                    ctrlDown = false;
                }
            });

            jQuery(".no-copy-paste").keydown(function(e) {
                if (ctrlDown && (e.keyCode == vKey || e.keyCode == cKey)) {
                    return false;
                }
            });
            bindInputCode('txtUid');
        });
    </script>
</body>

</html>