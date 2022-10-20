<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/* Template Name: SAAG_CONTACT_FORM */
// require_once __DIR__ . "/core/init.php";
require_once __DIR__ . "/../../functions/contact_form.php";

// get data from controller contact_form.php
@$id;
@$name;
@$email;
@$comment;
@$page;
// echo '<pre>';
// print_r(get_defined_vars());
// echo '<pre>';
// メール送信
// if (@$_POST["act"] == "mail") {
//     SendMail(SAAG);
// }

// // 入力チェック
// $Wk_emes = CheckInput(SAAG);
// if ($Wk_emes != "") {
//     error(SAAG, $Wk_emes);
// }
?>
<!DOCTYPE HTML>
<HTML>

<head>
    <meta name="robots" content="noindex,nofollow">
    <title>ソリマチ株式会社 - saag member's website お問い合わせフォーム</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta http-equiv="Imagetoolbar" content="no">
    <link rel="stylesheet" href="/assets/css/general.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/blue.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/list.css" type="text/css">
</head>

<body text="#404040" bgcolor="#ffffff">
    <center>
        <table border="0" cellspacing="1" cellpadding="0" width="500">
            <tr>
                <td nowrap height="30">&nbsp;</td>
            </tr>
            <tr>
                <th align="center" class="list_g1">お問い合わせ</th>
            </tr>
            <tr>
                <td class="p075_130" style="padding:6px 0px 5px 0px;">
                    送信内容をご確認のうえ「送信」ボタンを押してください。<br>
                    送信内容に誤りがある場合はブラウザの「戻る」ボタンで戻って修正してください。
                </td>
            </tr>
            <tr>
                <td nowrap width="500" height="5" align="left" valign="top">
                    <table border="0" cellspacing="1" cellpadding="0" width="500">
                        <tr>
                            <th nowrap class="list_g1">id</th>
                            <td class="list_g1"><?= $id ?></td>
                        </tr>
                        <tr>
                            <th nowrap class="list_g1">会員名</th>
                            <td class="list_g1"><?= $name ?></td>
                        </tr>
                        <tr>
                            <th nowrap class="list_g1">e-mail</th>
                            <td class="list_g1"><?= $email ?></td>
                        </tr>
                        <tr>
                            <th nowrap class="list_g1">内容</th>
                            <td class="list_g1"><?= str_replace(array("\r\n", "\r", "\n"), "<br>", @$comment) ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <form id='confirm' method="post">
            <input type="hidden" name="id" value="<?= htmlspecialchars(@$id) ?>">
            <input type="hidden" name="fullname" value="<?= htmlspecialchars(@$name) ?>">
            <input type="hidden" name="email" value="<?= htmlspecialchars(@$email) ?>">
            <input type="hidden" name="comment" value="<?= htmlspecialchars(@$comment) ?>">
            <input type="hidden" name="act" value="mail">
            <br>
            <table>
                <tr>
                    <td class="p075_120" align="right">よろしければ</td>
                    <td align="left"><input type="submit" form="confirm" formaction="/partner/saag/member/contact_form.php" value="送信" class="p075_120"></td>
                </tr>
            </table>
        </form>
        <table>
            <tr>
                <td class="p075_120">訂正される場合は</td>
                <td align="left"><input type="submit" form="confirm" formaction="<?= $page ?>" value="前画面に戻る" class="p075_120"></td>
            </tr>
        </table>
    </center>
</body>

</html>