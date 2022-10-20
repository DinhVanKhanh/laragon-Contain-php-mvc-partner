<?php
//import css and js
require_once __DIR__ . "/../template/index.php";

//import head
require_once __DIR__ . "/../template/header/header.php";

// //showDir();
@$typePage; //show from controller. $typePage = saag
@$template; //show from controller. $template = index
$id = @$_SESSION["SOSP-ID"];


?>
<link rel="stylesheet" href="/assets/css/general_req.css" type="text/css" media="screen,print">
<!-- Content Left -->
<div id="partner-container">
	<div class="containers clear">
		<div class="sidebar" id="sidebar" style="height:1300px">
			<?php require_once __DIR__ .  "/../template/sidebar/sidebar.php"; ?>
		</div>

		<!-- Content Right -->
		<div class="content-right">
			<div style="padding-bottom:3px; border-bottom:1px #0078EB solid;"><img src="/assets/images/contact/images_sosp/ctitle_order.gif"></div>
			<div style="padding:0 10px;">
				<table border="0" cellspacing="0" cellpadding="0" width="100%">
					<tr>
						<td halign="left" valign="top" style="padding-top:10px; font-size:14px">ソリマチ製品や、SOSP制度に対するご意見・ご要望をお寄せください。大切なご意見として製品バージョンアップやSOSPキャンペーン企画等に可能な限り反映させて参りたいと存じます。</td>
					</tr>
				</table>
				<form method="post" action="/partner/sosp/member/contact_form.php">
					<table border="0" cellspacing="0" cellpadding="0" width="100%">
						<tr>
							<td nowrap align="left" valign="top" bgcolor="#F8F8F8" style="border:1px #E8E8E8 solid;">
								<table border="0" cellspacing="0" cellpadding="0" width="100%">
									<tr>
										<td nowrap align="center" valign="middle" bgcolor="#E8E8E8" style="padding:5px">下記項目をご入力のうえ、「次へ」ボタンを押してください。<br>項目はすべて必須入力項目です。</td>
									</tr>
								</table>
								<CENTER>
									<table border="0" cellspacing="10" cellpadding="3" width="100%" style="padding:0 10px; font-size:16px">
										<tr>
											<td nowrap align="left" valign="middle" bgcolor="#E8E8E8" style="padding-left:5px">SOSP ID：<?= $id ?></td>
										</tr>
										<tr>
											<td nowrap align="left" valign="middle" bgcolor="#E8E8E8" style="padding-left:5px;">貴社名<br><input type="text" name="syamei" maxlength="60" style="width:100%;" value="<?= !empty($_POST['syamei']) ? $_POST['syamei'] : '' ?>"></td>
										</tr>
										<tr>
											<td nowrap align="left" valign="middle" bgcolor="#E8E8E8" style="padding-left:5px;">ご担当者名<br><input type="text" name="tant" maxlength="60" style="width:100%;" value="<?= !empty($_POST['tant']) ? $_POST['tant'] : '' ?>"></td>
										</tr>
										<tr>
											<td nowrap align="left" valign="middle" bgcolor="#E8E8E8" style="padding-left:5px;">e-mail（半角）<br><input type="text" name="email" maxlength="60" style="width:100%;" value="<?= !empty($_POST['email']) ? $_POST['email'] : '' ?>"></td>
										</tr>
										<tr>
											<td nowrap align="left" valign="middle" bgcolor="#E8E8E8" style="padding-left:5px;">カテゴリ：(一覧より選択)<br>
												<select name="cat">
													<option value="">一覧より選択してください
													<option value="会計王に関するご意見・ご要望">会計王に関するご意見・ご要望
													<option value="給料王に関するご意見・ご要望">給料王に関するご意見・ご要望
													<option value="販売王に関するご意見・ご要望">販売王に関するご意見・ご要望
													<option value="会計王PROに関するご意見・ご要望">会計王PROに関するご意見・ご要望
													<option value="SOSPに関するご意見・ご要望">SOSPに関するご意見・ご要望
													<option value="SOSPキャンペーン企画に関するご提案">SOSPキャンペーン企画に関するご提案
													<option value="SOSP会員専用サイトに対するご提案">SOSP会員専用サイトに対するご提案
													<option value="その他ご意見・ご要望">その他ご意見・ご要望
												</select>
											</td>
										</tr>
										<tr>
											<td nowrap align="left" valign="middle" bgcolor="#E8E8E8" style="padding-left:5px;">内容<br><TEXTAREA name="comment" style="width:100%; height:120px;"><?= !empty($_POST['comment']) ? $_POST['comment'] : '' ?></TEXTAREA></td>
										</tr>
									</table>
								</CENTER>
								<!-- 送信ボタン(START) -->
								<table border="0" cellspacing="0" cellpadding="0" width="100%">
									<tr>
										<td nowrap colspan="2" class="list_g1w" align="center">
											<script src='https://www.google.com/recaptcha/api.js' async defer></script>
											<div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI" data-callback="enableBtn"></div>
										</td>
									</tr>
									<tr>
										<td nowrap colspan="2">
											<table align="center" width="100%" border="0" cellspacing="0" cellpadding="4">
												<tr>
													<td style="padding-top:20px;">
														<div align="center">弊社の個人情報保護基本方針を必ずご確認の上、確認画面へお進みください。<br>なお、弊社の個人情報保護基本方針につきましては、<a href="https://www.sorimachi.co.jp/about/privacy.php" target="_Blank">こちらのページ</a>からも<br>同じ内容をご確認いただけます。</div>
														<div align="center" style="margin:5px auto;"><iframe style="width:510px; height:160px" src="/partner/policy/"></iframe></div>
														<div id="form-submit" style="text-align:center"><input style="margin:10px; width:500px; height:50px; color:#fff; font-weight:bold; font-size:18px; background-color:#f80; border:0px; border-radius:5px; cursor:pointer;" id="submit" type="submit" name="submit" value="個人情報保護基本方針に同意して、確認画面へ進む"></div>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<!-- 送信ボタン(END) -->
							</td>
						</tr>
					</table>
					<input type="hidden" name="page" value="<?= $_SERVER['REQUEST_URI']; ?>" />
					<input type="hidden" name="id" value="<?= $id ?>">
				</form>
			</div>
		</div>
	</div>
</div>
<?php
// require_once __DIR__ . '/../footer.php';
require_once __DIR__ . "/../template/footer/footer.php";

// require_once __DIR__ . '/core/footer.php';
?>
<script type="text/javascript">
	$("#submit").attr("disabled", true);
	$("#submit").css("background-color", 'gray');

	function enableBtn() {
		$("#submit").attr("disabled", false);
		$("#submit").css("background-color", '#f80');
	}
</script>
<script>
	grecaptcha.ready(function() {
		grecaptcha.execute('6LdBvO8aAAAAAGioY2UxRcNohv5dxTxFzYqBNuj6', {
			action: 'homepage'
		}).then(function(token) {
			// pass the token to the backend script for verification
		});
	});
</script>