<?php
//import css and js
require_once __DIR__ . "/../template/index.php";

//import head
require_once __DIR__ . "/../template/header/header.php";

// //showDir();
$typePage; //show from controller. $typePage = saag
$template; //show from controller. $template = index
$id = @$_SESSION["SAAG-ID"];

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
			<div style="padding-bottom:3px; border-bottom:1px #EB0000 solid;"><img src="/assets/images/contact/images_saag/ctitle_inquiry.gif"></div>
			<div style="padding:0 10px;">
				<table border="0" cellspacing="0" cellpadding="0" width="100%">
					<tr>
						<td align="left" valign="top" style="padding-top:10px; font-size:14px">ソリマチ製品やSAAGに対するご意見・ご要望をお寄せください。</td>
					</tr>
				</table>
				<form method="post" action="/partner/saag/member/contact_form.php">
					<div style="border:1px #E8E8E8 solid; background-color:#F8F8F8">
						<div style="text-align:center; background-color:#E8E8E8; margin-bottom:10px;">
							<span>下記項目をご記入いただき、「次へ」ボタンを押してください。</span><br>
							<span>※入力項目はすべて必須項目となります。</span>
						</div>
						<div style="padding:0 10px;">
							<div style="margin-bottom:10px; background-color:#E8E8E8;"><span>SAAG ID：<?= $id ?></span></div>
							<div style="margin-bottom:10px; background-color:#E8E8E8;"><label>会員名</label><br><input type="text" name="fullname" maxlength="60" style="width:100%;" value="<?= !empty($_POST['fullname']) ? $_POST['fullname'] : '' ?>"></div>
							<div style="margin-bottom:10px; background-color:#E8E8E8;"><label>e-mail</label><br><input type="text" name="email" maxlength="60" style="width:100%;" value="<?= !empty($_POST['email']) ? $_POST['email'] : '' ?>"></div>
							<div style="margin-bottom:10px; background-color:#E8E8E8;"><label>文章(300文字以内)</label><br><TEXTAREA name="comment" style="width:100%; height:120px;"><?= !empty($_POST['comment']) ? $_POST['comment'] : '' ?></TEXTAREA></div>

							<!-- 送信ボタン(START) -->
							<div>
								<table cellspacing="0" cellpadding="0" style="border:0; width:100%;">
									<tr>
										<td nowrap colspan="2" class="list_g1w" align="center">
											<script src="https://www.google.com/recaptcha/api.js"></script>
											<div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI" data-callback="enableBtn"></div>

										</td>
									</tr>
									<tr>
										<td nowrap colspan="2">
											<div align="center">弊社の個人情報保護基本方針を必ずご確認の上、確認画面へお進みください。<br>なお、弊社の個人情報保護基本方針につきましては、<a href="https://www.sorimachi.co.jp/about/privacy.php" target="_Blank">こちらのページ</a>からも<br>同じ内容をご確認いただけます。</div>
											<div align="center" style="margin:5px auto;"><iframe style="width:510px; height:160px;" src="/partner/policy/"></iframe></div>
											<div id="form-submit" style="text-align:center"><input style="margin:10px; width:500px; height:50px; color:#fff; font-weight:bold; font-size:18px; background-color:#f80; border:0px; border-radius:5px; cursor:pointer;" id="submit" type="submit" name="submit" value="個人情報保護基本方針に同意して、確認画面へ進む"></div>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
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