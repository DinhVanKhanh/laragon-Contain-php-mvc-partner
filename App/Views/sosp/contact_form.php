<?php
/* Template Name: SOSP_ORDER_FORM */
require_once __DIR__ . "/../../functions/contact_form.php";

@$id;
@$syamei;
@$tant;
@$email;
@$cat;
@$comment;
@$page;

?>
<!DOCTYPE HTML>
<HTML>

<HEAD>
    <meta name="robots" content="noindex,nofollow">
    <title>ソリマチ株式会社 - SOSP Member's Website ご意見・ご要望フォーム</title>
    <meta http-equiv="Content-Type" content="TEXT/HTML; charset=utf-8">
    <meta http-equiv="Content-Style-Type" content="TEXT/CSS">
    <meta http-equiv="Imagetoolbar" content="no">
    <link rel="stylesheet" href="/assets/css/general.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/blue.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/list.css" type="text/css">
</HEAD>

<BODY text="#404040" bgcolor="#FFFFFF">
    <CENTER>
        <TABLE border="0" cellspacing="1" cellpadding="0" vspace="0" hspace="0" width="500">
            <TR>
                <TD nowrap height="30">&nbsp;</TD>
            </TR>
            <TR>
                <TH align="center" class="list_g1">ご意見・ご要望フォーム</TH>
            </TR>
            <TR>
                <TD class="p075_130" style="padding:6px 0px 5px 0px;">
                    送信内容をご確認のうえ「送信」ボタンを押してください。<BR>
                    送信内容に誤りがある場合はブラウザの「戻る」ボタンで戻って修正してください。
                </TD>
            </TR>
            <TR>
                <TD nowrap width="500" height="5" align="left" valign="top">
                    <TABLE border="0" cellspacing="1" cellpadding="0" vspace="0" hspace="0" width="500">
                        <TR>
                            <TH nowrap class="list_g1">ID</TH>
                            <TD class="list_g1"><?= $id ?></TD>
                        </TR>
                        <TR>
                            <TH nowrap class="list_g1">会社名</TH>
                            <TD class="list_g1"><?= $syamei ?></TD>
                        </TR>
                        <TR>
                            <TH nowrap class="list_g1">ご担当者名</TH>
                            <TD class="list_g1"><?= $tant ?></TD>
                        </TR>
                        <TR>
                            <TH nowrap class="list_g1">e-mail</TH>
                            <TD class="list_g1"><?= $email ?></TD>
                        </TR>
                        <TR>
                            <TH nowrap class="list_g1">カテゴリ</TH>
                            <TD class="list_g1"><?= $cat ?></TD>
                        </TR>
                        <TR>
                            <TH nowrap colspan="2" class="list_g1">コメント欄</TH>
                        </TR>
                        <TR>
                            <TD colspan="2" class="list_g1"><?= str_replace(array("\r\n", "\r", "\n"), "<BR>", $comment) ?></TD>
                        </TR>
                    </TABLE>
                </TD>
            </TR>
        </TABLE>
        <IMG src="/assets/images/images_general/spacer.gif" border="0" width="1" height="5"><BR>
        <FORM id="confirm" method="post">
            <INPUT type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
            <INPUT type="hidden" name="syamei" value="<?= htmlspecialchars($syamei) ?>">
            <INPUT type="hidden" name="tant" value="<?= htmlspecialchars($tant) ?>">
            <INPUT type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
            <INPUT type="hidden" name="cat" value="<?= htmlspecialchars($cat) ?>">
            <INPUT type="hidden" name="comment" value="<?= htmlspecialchars($comment) ?>">
            <INPUT type="hidden" name="act" value="mail"><BR>
            <TABLE>
                <TR>
                    <TD class="p075_120" align="right">よろしければ</TD>
                    <TD align="left"><INPUT type="submit" value="送信" form="confirm" formaction="/partner/sosp/member/contact_form.php" class="p075_120"></TD>
                </TR>
            </TABLE>
        </FORM>
        <TABLE>
            <TR>
                <TD class="p075_120">訂正される場合は</TD>
                <TD align="left"><INPUT type="submit" value="前画面に戻る" form="confirm" formaction="<?= $page ?>" class="p075_120"></TD>
            </TR>
        </TABLE>
    </CENTER>
</BODY>

</HTML>