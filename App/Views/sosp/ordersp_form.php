<!DOCTYPE HTML>
<HTML>

<HEAD>
	<META name="robots" content="noindex,nofollow">
	<TITLE>ソリマチ株式会社 - SOSP Member's Website 販促物請求フォーム</TITLE>
	<META http-equiv="Content-Type" content="TEXT/HTML; charset=utf-8">
	<META http-equiv="Content-Style-Type" content="TEXT/CSS">
	<META http-equiv="Imagetoolbar" content="no">
	<link rel="stylesheet" href="/assets/css/general.css" type="text/css">
	<link rel="stylesheet" href="/assets/css/blue.css" type="text/css">
	<link rel="stylesheet" href="/assets/css/list.css" type="text/css">
</HEAD>

<BODY text="#404040" bgcolor="#FFFFFF">
	<CENTER>
		<TABLE border="0" cellspacing="1" cellpadding="0" width="500">
			<TR>
				<TD nowrap height="30">&nbsp;</TD>
			</TR>
			<TR>
				<TH align="center" class="list_g1">販促物請求フォーム</TH>
			</TR>
			<TR>
				<TD class="p075_130" style="padding:6px 0px 5px 0px;">
					送信内容をご確認のうえ「送信」ボタンを押してください。<BR>
					送信内容に誤りがある場合はブラウザの「戻る」ボタンで戻って修正してください。
				</TD>
			</TR>
			<TR>
				<TD nowrap width="500" height="5" align="left" valign="top">
					<TABLE border="0" cellspacing="1" cellpadding="0" width="500">
						<TR>
							<TH nowrap class="list_g1" width="20%">ID</TH>
							<TD class="list_g1" width="80%"><?= $id ?></TD>
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
							<TH nowrap class="list_g1">住所</TH>
							<TD class="list_g1"><?= '〒' . $zip ?><BR><?= $address1 ?><BR><?= $address2 ?></TD>
						</TR>
						<TR>
							<TH nowrap class="list_g1">電話番号</TH>
							<TD class="list_g1"><?= $tel ?></TD>
						</TR>
						<TR>
							<TH nowrap class="list_g1">e-mail</TH>
							<TD class="list_g1"><?= $email ?></TD>
						</TR>
					</TABLE>
					<BR>
					<TABLE border="0" cellspacing="1" cellpadding="0" width="500">
						<TR>
							<TH colspan="2" class="list_g1">カタログ</TH>
						</TR>
						<TR>
							<TD class="list_g1">会計王／会計王 PRO</TD>
							<TD class="list_g1w"><?= $catalog['会計王／会計王 PRO']; ?>部</TD>
						</TR>
						<TR>
							<TD class="list_g1">給料王</TD>
							<TD class="list_g1w"><?= $catalog['給料王'] ?>部</TD>
						</TR>
						<TR>
							<TD class="list_g1">販売王／販売王 販売・仕入・在庫</TD>
							<TD class="list_g1w"><?= $catalog['販売王'] ?>部</TD>
						</TR>
						<!--<TR><TD class="list_g1">顧客王</TD><TD class="list_g1w">//$catalog['顧客王']部</TD></TR>-->
						<TR>
							<TD class="list_g1">みんなの青色申告</TD>
							<TD class="list_g1w"><?= $catalog['みんなの青色申告'] ?>部</TD>
						</TR>
						<TR>
							<TD class="list_g1">会計王 NPO法人スタイル</TD>
							<TD class="list_g1w"><?= $catalog['会計王 NPO法人スタイル'] ?>部</TD>
						</TR>
						<!--<TR><TD class="list_g1">会計王 介護事業所スタイル</TD><TD class="list_g1w">//$catalog['会計王 介護事業所スタイル']部</TD></TR>-->
						<TR>
							<TD class="list_g1">「王シリーズ」総合カタログ</TD>
							<TD class="list_g1w"><?= $catalog['「王シリーズ」総合カタログ'] ?>部</TD>
						</TR>
<!--
						<TR>
							<TD class="list_g1">訪問指導お助けパック「レスキュー王」</TD>
							<TD class="list_g1w"><?= $catalog['訪問指導お助けパック　レスキュー王'] ?>部</TD>
						</TR>
-->
						<TR>
							<TD class="list_g1">サポート＆サービスガイドブック〈王シリーズ〉</TD>
							<TD class="list_g1w"><?= $catalog['サポート＆サービスガイドブック＜王シリーズ＞'] ?>部</TD>
						</TR>
						<TR>
							<TD class="list_g1">サポート＆サービスガイドブック〈みんなのシリーズ〉</TD>
							<TD class="list_g1w"><?= $catalog['サポート＆サービスガイドブック＜みんなのシリーズ＞'] ?>部</TD>
						</TR>
						<TR>
							<TD class="list_g1">ソリマチ専用帳票カタログ</font>
							</TD>
							<TD class="list_g1w"><?= $catalog['ソリマチ専用帳票カタログ'] ?>部</TD>
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
			<INPUT type="hidden" name="address1" value="<?= htmlspecialchars($address1) ?>">
			<INPUT type="hidden" name="address2" value="<?= htmlspecialchars($address2) ?>">
			<INPUT type="hidden" name="tel" value="<?= htmlspecialchars($tel) ?>">
			<INPUT type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
			<INPUT type="hidden" name="zip" value="<?= htmlspecialchars($zip) ?>">
			<?php
			$i = 1;
			foreach ($catalog as $title => $value) {
				echo '<INPUT type="hidden" name="c' . $i . '" value="' . $value . '">';
				$i++;
			}
			?>
			<INPUT type="hidden" name="act" value="mail"><BR>
			<TABLE>
				<TR>
					<TD class="p075_120" align="right">よろしければ</TD>
					<TD align="left"><INPUT type="submit" form="confirm" formaction="/partner/sosp/member/ordersp_form.php" value="送信" class="p075_120"></TD>
				</TR>
			</TABLE>
		</FORM>
		<TABLE>
			<TR>
				<TD class="p075_120">訂正される場合は</TD>
				<TD align="left"><INPUT type="submit" form="confirm" formaction="<?= $page ?>" value="前画面に戻る" class="p075_120"></TD>
			</TR>
		</TABLE>
	</CENTER>
</BODY>

</HTML>