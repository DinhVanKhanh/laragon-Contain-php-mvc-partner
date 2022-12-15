<?php
define('SAAG', 1);
define('SOSP', 2);
define('SOUP', 3);
define('SOI', 4);

require_once __DIR__ . "/../../../../common_files/smtp_mail.php";
// require_once __DIR__ . "/../../handle/core-mail.php";

// 入力チェック
function CheckInput($site, $ordersp = false)
{
	$id       = @$_POST["id"];
	$name     = @$_POST["fullname"];
	$email    = @$_POST["email"];
	$comment  = str_replace(array("\r\n", "\r", "\n"), "<BR>", @$_POST["comment"]);
	$syamei   = @$_POST["syamei"];
	$tant     = @$_POST["tant"];
	$cat      = @$_POST["cat"];
	$address1 = @$_POST["address1"];
	$tel      = @$_POST["tel"];
	// echo '<pre>';
	// print_r(get_defined_vars());
	// echo '<pre>';
	// die();
	$Wk_emes = ($id == "") ? "<TR><TH class='list_g1_85'>未入力</TH><TD class='list_g1_85'>「" . $site . "-ID」の項目が入力されていません。</TD></TR>" : "";
	switch ($site) {
		case "saag":
			$Wk_emes .= ($name == "") ? "<TR><TH class='list_g1_85'>未入力</TH><TD class='list_g1_85'>「会員名」の項目が入力されていません。</TD></TR>" : "";
			break;
		case "sosp":
		case "soup":
			$Wk_emes .= ($syamei == "") ? "<TR><TH class='list_g1_85'>未入力</TH><TD class='list_g1_85'>「会社名」の項目が入力されていません。</TD></TR>" : "";
			$Wk_emes .= ($tant == "") ? "<TR><TH class='list_g1_85'>未入力</TH><TD class='list_g1_85'>「ご担当者名」の項目が入力されていません。</TD></TR>" : "";
			if ($ordersp) {
				$Wk_emes .= ($address1 == "") ? "<TR><TH class='list_g1_85'>未入力</TH><TD class='list_g1_85'>「住所」の項目が入力されていません。</TD></TR>" : "";
				$Wk_emes .= ($tel == "") ? "<TR><TH class='list_g1_85'>未入力</TH><TD class='list_g1_85'>「電話番号」の項目が入力されていません。</TD></TR>" : "";
			}
			break;
	}
	$Wk_emes .= ($email == "") ? "<TR><TH class='list_g1_85'>未入力</TH><TD class='list_g1_85'>「e-mail」の項目が入力されていません。</TD></TR>" : "";
	$Wk_emes .= (strpos($email, "@") === false) ? "<TR><TH class='list_g1_85'>未入力</TH><TD class='list_g1_85'>「e-mail」の形式が間違っています。</TD></TR>" : "";
	$Wk_emes .= (strpos($email, ":")) ? "<TR><TH class='list_g1_85'>未入力</TH><TD class='list_g1_85'>「e-mail」にコロンは使えません</TD></TR>" : "";
	$Wk_emes .= (strpos($email, ";")) ? "<TR><TH class='list_g1_85'>未入力</TH><TD class='list_g1_85'>「e-mail」にセミコロンは使えません</TD></TR>" : "";
	$Wk_emes .= (strpos($email, ",")) ? "<TR><TH class='list_g1_85'>未入力</TH><TD class='list_g1_85'>「e-mail」にカンマは使えません</TD></TR>" : "";
	if ($site != SAAG && $ordersp == false) {
		$Wk_emes .= ($site == SOSP && $cat == "") ? "<TR><TH class='list_g1_85'>未入力</TH><TD class='list_g1_85'>「カテゴリ」の項目が入力されていません。</TD></TR>" : "";
		$Wk_emes .= ($comment == "") ? "<TR><TH class='list_g1_85'>未入力</TH><TD class='list_g1_85'>「" . (($site == SOSP) ? "コメント欄" : "ご意見・ご要望") . "」の項目が入力されていません。</TD></TR>" : "";
	}
	return $Wk_emes;
}

// エラールーチン
function error($site, $Wk_emes, $Wk_errt = "", $Wk_In = "")
{
	global $typePage;
	$title = "入力フォーム";
	$form = "";
	$email = @$_POST["email"];
	$comment = @$_POST["comment"];
	$page = @$_POST["page"] ?? "/partner/" . $typePage . "/member/contact.php";
	switch ($site) {
		case "saag":
			$name = @$_POST["fullname"];

			$title = 'エラーが発生しました';
			$form = '
                    <INPUT type="hidden" name="fullname" value="' . $name . '">
                    <INPUT type="hidden" name="email" value="' . $email . '">
                    <INPUT type="hidden" name="comment" value="' . $comment . '">';
			break;

		case "sosp":
			$syamei = @$_POST["syamei"];
			$tant = @$_POST["tant"];

			$form = '
                    <INPUT type="hidden" name="syamei" value="' . $syamei . '">
                    <INPUT type="hidden" name="tant" value="' . $tant . '">
                    <INPUT type="hidden" name="email" value="' . $email . '">
                    <INPUT type="hidden" name="comment" value="' . $comment . '">';

			if (isset($_POST['address1'])) {
				global $catalog;
				$address1 = @$_POST["address1"];
				$address2 = @$_POST["address2"];
				$tel = @$_POST["tel"];
				$zip = @$_POST["zip"];
				// $catalog = @$_POST["catalog"];

				$form .= '
                        <INPUT type="hidden" name="address1" value="' . $address1 . '">
                        <INPUT type="hidden" name="address2" value="' . $address2 . '">
                        <INPUT type="hidden" name="tel" value="' . $tel . '">
                        <INPUT type="hidden" name="zip" value="' . $zip . '">';

				$i = 1;
				if (!empty($catalog)) {
					foreach ($catalog as $title => $value) {
						$form .= '<INPUT type="hidden" name="c' . $i . '" value="' . $value . '">';
						$i++;
					}
				}
			} else {
				$cat = @$_POST["cat"];

				$form .= '<INPUT type="hidden" name="cat" value="' . $cat . '">';
			}
			break;

		case "soup":
			$syamei = @$_POST["syamei"];
			$tant = @$_POST["tant"];

			$form = '
                    <input type="hidden" name="syamei" value="' . $syamei . '">
                    <input type="hidden" name="tant" value="' . $tant . '">
                    <input type="hidden" name="email" value="' . $email . '">
                    <input type="hidden" name="comment" value="' . $comment . '">';
			break;
	}
	echo '<!DOCTYPE HTML>
                    <html>
                        <head>
                            <title>ソリマチ株式会社 - ' . $title . '</title>' . "
                            <meta name='robots' content='noindex,nofollow'>
                            <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
                            <meta http-equiv='Content-Style-Type' content='TEXT/CSS'>
                            <meta http-equiv='Imagetoolbar' content='no'>
                            <LINK rel='shortcut icon' href='/sorimachi.ico'>
                            <link rel='stylesheet' href='/assets/css/general.css' type='text/css'>
                            <link rel='stylesheet' href='/assets/css/list.css' type='text/css'>
                            <link rel='stylesheet' href='/assets/css/blue.css' type='text/css'>
                        </head>
                        <body text='#404040' bgcolor='#FFFFFF'>
                            <center><br>
                                <table width=400 cellpadding=0 cellspacing=0 border=0>";
	echo ($Wk_emes == "") ? "<tr><td><font color='#C00000'>●</font><b>" . $Wk_errt . "</b><hr></td></tr><tr><td style='font:16px/24px 'MS UI Gothic',osaka,sans-serif;'>" . $Wk_In . "</TD></TR>" : $Wk_emes;
	echo "                  </table>
                                <br>
                                <form id='confirm' method='POST' action='" . $page . "'>
                                    {$form}
                                </form>
                                <input type='submit' form='confirm' value='前画面に戻る'>
                            </center>
                        </body>
                    </html>";
	exit;
}

// メール送信
function SendMail($site, $catalog = NULL)
{
	global $SMTP_SERVER_SORIMACHI_NAME, $USER_SMTP_SERVER_SORIMACHI, $PASS_SMTP_SERVER_SORIMACHI;
	global $MAILFROM_SAAG_MCONTACT_FORM, $MAILTO_SAAG_MCONTACT_FORM, $MAILBCC_SAAG_MCONTACT_FORM;
	global $MAILFROM_SOSP_MCONTACT_FORM, $MAILTO_SOSP_MCONTACT_FORM, $MAILBCC_SOSP_MCONTACT_FORM;
	global $MAILFROM_SOSP_MORDERSP_FORM, $MAILTO_SOSP_MORDERSP_FORM, $MAILBCC_SOSP_MORDERSP_FORM;
	global $MAILFROM_SOUP_MCONTACT_FORM, $MAILTO_SOUP_MCONTACT_FORM, $MAILBCC_SOUP_MCONTACT_FORM;
	global $BASP21_MAILSV; // Unknown

	echo '<pre>';
	$id       = @$_POST["id"];
	$name     = @$_POST["fullname"];
	$email    = @$_POST["email"];
	$comment  = str_replace(array("\r\n", "\r", "\n"), "<BR>", @$_POST["comment"]);
	$syamei   = @$_POST["syamei"];
	$tant     = @$_POST["tant"];
	$cat      = @$_POST["cat"];
	$address1 = @$_POST["address1"];
	$address2 = @$_POST["address2"];
	$tel      = @$_POST["tel"];
	$zip      = @$_POST["zip"];

	switch ($site) {
		case "saag":
			$text = array(
				'subj' => '【SAAG】 お問い合わせフォーム',
				'field' => array(
					'[会員ID]' => $id,
					'[会員名]' => $name,
					'[e-mail]' => $email,
					'[文章]' => $comment
				),
				'title_page' => "SAAG Member's Website お問い合わせフォーム",
				'sentence' => 'このたびはSAAGに関するお問い合わせをいただき、<BR>まことにありがとうございます。<BR>下記の通り受付をいたしました。<BR>今後ともソリマチ株式会社をよろしくお願い申しあげます。',
				'link' => "/partner/saag/member/"
			);
			$mailfrom = $MAILFROM_SAAG_MCONTACT_FORM;
			$mailfromname = $BASP21_MAILSV . " SAAG";
			$mailto = $MAILTO_SAAG_MCONTACT_FORM;
			$bcc = $MAILBCC_SAAG_MCONTACT_FORM;
			$body1 = file_get_contents(__DIR__ . "/../Views/mailtemplate/template_saag.txt");
			$body1 = str_replace('$id', $id, $body1);
			$body1 = str_replace('$name', $name, $body1);
			$body1 = str_replace('$email', $email, $body1);
			$body1 = str_replace('$comment', $comment, $body1);
			break;
		case "sosp":
			if ($catalog == NULL) {
				$text = array(
					'subj' => '【SOSP】 ご意見・ご要望フォーム',
					'field' => array(
						'【SOSP】' => 'ご意見・ご要望をいただきました。',
						'[SOSP-ID]' => $id,
						'[会員名]' => $syamei,
						'[ご担当者名]' => $tant,
						'[e-mail]' => $email,
						'[カテゴリ]' => $cat,
						'[コメント欄]' => $comment
					),
					'title_page' => "SOSP Member's Website ご意見・ご要望フォーム",
					'sentence' => '送信をいただき、ありがとうございます。下記のとおり受付をいたしました。今後ともソ<BR>リマチ株式会社をよろしくお願い申しあげます。',
					'link' => "/partner/sosp/member/"
				);
				$mailfrom = $MAILFROM_SOSP_MCONTACT_FORM;
				$mailfromname = $BASP21_MAILSV . " SOSP";
				$mailto = $MAILTO_SOSP_MCONTACT_FORM;
				$bcc = $MAILBCC_SOSP_MCONTACT_FORM;
				$body1 = file_get_contents(__DIR__ . "/../Views/mailtemplate/template_sosp.txt");
				$body1 = str_replace('$id', $id, $body1);
				$body1 = str_replace('$syamei', $syamei, $body1);
				$body1 = str_replace('$tant', $tant, $body1);
				$body1 = str_replace('$email', $email, $body1);
				$body1 = str_replace('$cat', $cat, $body1);
				$body1 = str_replace('$comment', $comment, $body1);
			} else {
				$text = array(
					'subj' => '【SOSP】 販促物請求フォーム',
					'field' => array(
						'下記の内容で販促物請求のお問い合わせがありました。' => '',
						'[SOSP-ID]' => $id,
						'[会員名]' => $syamei,
						'[ご担当者名]' => $tant,
						'[住所]' => "〒{$zip} {$address1} {$address2}",
						'[電話番号]' => $tel,
						'[e-mail]' => $email
					),
					'title_page' => "SOSP Member's Website 販促物請求フォーム",
					'sentence' => '送信をいただき、ありがとうございます。下記のとおり受付をいたしました。<br>今後ともソリマチ株式会社をよろしくお願い申しあげます。',
					'link' => "/partner/sosp/member/"
				);
				$mailfrom = $MAILFROM_SOSP_MORDERSP_FORM;
				$mailfromname = $BASP21_MAILSV . " SOSP";
				$mailto = $MAILTO_SOSP_MORDERSP_FORM;
				$bcc = $MAILBCC_SOSP_MORDERSP_FORM;
				$body1 = file_get_contents(__DIR__ . "/../Views/mailtemplate/template_sosp_sp.txt");
				$body1 = str_replace('$id', $id, $body1);
				$body1 = str_replace('$syamei', $syamei, $body1);
				$body1 = str_replace('$tant', $tant, $body1);
				$body1 = str_replace('$address', $text['field']['[住所]'], $body1);
				$body1 = str_replace('$tel', $tel, $body1);
				$body1 = str_replace('$email', $email, $body1);
			}
			break;
		case "soup":
			$text = array(
				'subj' => '【SOUP】 ご意見ご要望フォーム',
				'field' => array(
					'[SOUP-ID]' => $id,
					'[会員名]' => $syamei,
					'[ご担当者名]' => $tant,
					'[e-mail]' => $email,
					'[ご意見・ご要望]' => $comment
				),
				'title_page' => "SOUP Member's Website ご意見・ご要望フォーム",
				'sentence' => 'この度はSOUP制度に関するお問い合わせありがとうございました。<BR>下記のとおり受付をいたしました。<BR>今後ともソリマチを宜しくお願い申し上げます。',
				'link' => "/partner/soup/member/"
			);
			$mailfrom = $MAILFROM_SOUP_MCONTACT_FORM;
			$mailfromname = $BASP21_MAILSV . " SOUP";
			$mailto = $MAILTO_SOUP_MCONTACT_FORM;
			$bcc = $MAILBCC_SOUP_MCONTACT_FORM;
			$body1 = file_get_contents(__DIR__ . "/../Views/mailtemplate/template_soup.txt");
			$body1 = str_replace('$id', $id, $body1);
			$body1 = str_replace('$syamei', $syamei, $body1);
			$body1 = str_replace('$tant', $tant, $body1);
			$body1 = str_replace('$email', $email, $body1);
			$body1 = str_replace('$comment', $comment, $body1);
			break;
	}

	$subj = $text['subj'];

	//カタログ
	$sCatalog = array();
	$ctNum = 0;
	$commentsp = '';
	if (is_array($catalog)) {
		// 1, 2, 3, 4, 5, 10, 12, 11, 6, 7, 8, 9
		// 4 -> 顧客王(停止)
		// 12 -> 介護(停止)
		// 6 -> レスキュー王(停止)
		$sequence = array(1, 2, 3, 5, 10, 11, 7, 8, 9);
		$ctNum = count($sequence);
		$keys = array_keys($catalog);
		for ($i = 0; $i < $ctNum; $i++) {
			$title = $keys[$sequence[$i] - 1];
			$commentsp .= "「" . $title . "」　" . $catalog[$title] . "部<BR>";
			$sCatalog[$title] = $catalog[$title];
		}
		$body1 = str_replace('$comment', $commentsp, $body1);
	}
	$body1 = str_replace('<BR>', "\n", $body1);

	$arg["Host"]         = $SMTP_SERVER_SORIMACHI_NAME;
	$arg["Port"]         = 587;
	$arg["Username"]     = $USER_SMTP_SERVER_SORIMACHI;
	$arg["Password"]     = $PASS_SMTP_SERVER_SORIMACHI;
	// $arg["From"]["Mail"] = "dinhvankhanh107@gmail.com";
	$arg["From"]["Mail"] = $mailfrom;
	$arg["From"]["Name"] = $mailfromname;
	$arg["To"]["Mail"]   = $mailto;
	// $arg["To"]["Mail"]   = "k_watanabe@mail.sorimachi.co.jp";
	// $arg["To"]["Mail"]   = "nguyentrungquan65@gmail.com";
	// $arg["BCC"]          = [$bcc . "," . $email];
	$arg["Subject"]      = $subj;
	$arg["Body"]         = $body1;

	echo "<!DOCTYPE HTML>";
	echo "<HEAD>";
	echo "<TITLE>ソリマチ株式会社 - " . $text['title_page'] . "</TITLE>";
	echo "<META name='robots' content='noindex,nofollow'>";
	echo "<META http-equiv='Content-Type' content='text/html; charset=utf-8'>";
	echo "<LINK rel='stylesheet' href='/assets/css/general.css' type='TEXT/CSS'>";
	echo "<LINK rel='stylesheet' href='/assets/css/list.css' type='TEXT/CSS'>";
	echo "<LINK rel='stylesheet' href='/assets/css/list.css' type='TEXT/CSS'>";
	echo "</HEAD>";
	echo "<BODY text='#404040' bgcolor='#FFFFFF'><CENTER>";

	// 送信成功
	// echo '<pre>';
	// print_r($arg);
	// echo '<pre>';
	// die();
	// $arg["To"]["Mail"] = "khanhvandinhkhanh2@gmail.com";
	// $bcc = "nhitty099@gmail.com,khanhvandinhkhanh1@gmail.com";

	if (send_mail_PHPMailer($arg["To"]["Mail"], $arg["Subject"], $arg["Body"], $arg["From"]["Mail"], ["BCC" => $bcc])) {
	// if (send_mail_PHPMailer($arg["To"]["Mail"], $arg["Subject"], $arg["Body"], $arg["From"]["Mail"])) {
		// if (send_mail_PHPMailer("nguyentrungquan65@gmail.com", $arg["Subject"], $arg["Body"], "khanhvandinhkhanh1@gmail.com")) {
		echo "<TABLE border='0' cellspacing='1' cellpadding='0' width='500'>";
		echo "<TR><TD nowrap height='30'>&nbsp;</TD></TR>";
		echo "<TR><TD class='p085_150'>";
		echo $text['sentence'];
		echo "</TD></TR>";
		echo "</TABLE>";
		echo "<BR>";
		echo "<TABLE border='0' cellspacing='1' cellpadding='0' width='500'><BR>";

		echo "<TR><TH nowrap class='list_g1'>ID</TH><TD class='list_g1'>" . $id . "</TD></TR>";
		switch ($site) {
			case "saag":
				echo "<TR><TH nowrap class='list_g1'>会員名</TH><TD class='list_g1'>" . $name . "</TD></TR>";
				echo "<TR><TH nowrap class='list_g1'>e-mail</TH><TD class='list_g1'>" . $email . "</TD></TR>";
				echo "<TR><TH nowrap class='list_g1'>内容</TH><TD class='list_g1'>" . $comment . "</TD></TR>";
				break;
			case "sosp":
				echo "<TR><TH nowrap class='list_g1'>会社名</TH><TD class='list_g1'>" . $syamei . "</TD></TR>";
				echo "<TR><TH nowrap class='list_g1'>ご担当者名</TH><TD class='list_g1'>" . $tant . "</TD></TR>";
				if ($catalog == NULL) {
					echo "<TR><TH nowrap class='list_g1'>e-mail</TH><TD class='list_g1'>" . $email . "</TD></TR>";
					echo "<TR><TH nowrap class='list_g1'>カテゴリ</TH><TD class='list_g1'>" . $cat . "</TD></TR>";
					echo "<TR><TH nowrap class='list_g1'>コメント欄</TH><TD class='list_g1'>" . $comment . "</TD></TR>";
				} else {
					echo "<TR><TH nowrap class='list_g1'>住所</TH><TD class='list_g1'>〒" . $zip . "<BR>" . $address1 . "<BR>" . $address2 . "</TD></TR>";
					echo "<TR><TH nowrap class='list_g1'>電話番号</TH><TD class='list_g1'>" . $tel . "</TD></TR>";
					echo "<TR><TH nowrap class='list_g1'>e-mail</TH><TD class='list_g1'>" . $email . "</TD></TR>";
					echo "</TABLE>";
					echo "<TABLE border='0' cellspacing='1' cellpadding='0' width='500'><BR>";
					echo "<TR><TH colspan=2 class='list_g1'>カタログ</TH></TR>";

					$keys = array_keys($sCatalog);
					for ($i = 0; $i < $ctNum; $i++) {
						echo "<TR><TD class='list_g1' width='85%'>" . $keys[$i] . "</TD>";
						echo "<TD class='list_g1w' width='15%'>" . $sCatalog[$keys[$i]] . "</TD></TR>";
					}
				}
				break;
			case "soup":
				echo "<TR><TH nowrap class='list_g1'>会社名</TH><TD class='list_g1'>" . $syamei . "</TD></TR>";
				echo "<TR><TH nowrap class='list_g1'>ご担当者名</TH><TD class='list_g1'>" . $tant . "</TD></TR>";
				echo "<TR><TH nowrap class='list_g1'>e-mail</TH><TD class='list_g1'>" . $email . "</TD></TR>";
				echo "<TR><TH nowrap class='list_g1'>ご意見・<BR>ご要望</TH><TD class='list_g1'>" . $comment . "</TD></TR>";
				break;
		}
		echo "</TABLE>";
	}
	// 送信失敗
	else {
		error($site, "", "メール送信エラー", "メールを送信する際にエラーが発生しました。再度戻ってお試しください。<BR>引き続きエラーが発生する場合は、お手数ではございますがソリマチパートナー事務局までお問い合わせ頂きますよう、お願い申しあげます。");
	}
	echo "<BR><BR>";
	echo "<DIV class='p090_120'>[ <A href=" . $text['link'] . ">戻る</A> ]</DIV><BR>";
	echo "</CENTER></BODY></HTML>";
	exit;
}
