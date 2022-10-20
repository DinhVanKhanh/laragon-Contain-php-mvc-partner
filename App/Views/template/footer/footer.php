<a id="btn_top_page" href="#top_page" style="display:none; transition:1s ease"><img src="/assets/images/year/2018/11/pagetop.jpg" /></a>
<footer id="footer">
	<div class="partner_footer">Copyright&#169; Sorimachi Co.,Ltd. All rights reserved.</div>
</footer>
</div>
<?php
global $SORIMACHI_HOME_SSL;

if ($typePage == "saag") { ?>
	<!-- SBI-BS「助成金補助金 診断ナビ」 -->
	<form action="<?= $SORIMACHI_HOME_SSL ?>usersupport/partner_service/jhsn/login_saag.asp" name="login_jhsn" method="post">
		<input type="hidden" name="saagid" value="<?= @$_SESSION["SAAG-ID"] ?>">
		<input type="hidden" name="saagname" value="<?= @$_SESSION["SAAG-NAME"] ?>">
	</form><?php
		}
			?>
<?php /* wp_footer();  */?>
</body>

</html>
