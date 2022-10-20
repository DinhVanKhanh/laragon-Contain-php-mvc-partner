<body class="page-template page-template-Search_Form page-template-sosp_search page-template-Search_Formsosp_search-php page page-id-108 page-child parent-pageid-79 has-header-image page-two-column colors-light">
	<div id="wrapper">
		<article id="main" class="clearfix">
			<section id="main_content">
				<p id="scLoading" style="display:none"><img src="/assets/images/uploads/profile/images_layout/icon_loading.gif"></p>
				<h2>ソリマチ製品取り扱い店舗<span>検索</span><input type="button" value="検索画面に戻る" class="btnBack_soup" /></h2>
				<section id="sa_search" style="display:block">
					<p class="color_shop bold">お近くのパソコンショップ・家電量販店を検索できます。</p>
					<p class="pb20">業務ソフトをご検討する際には、ぜひお近くのソリマチ製品取り扱い店舗を検索してみてください。<br />※店頭デモや訪問指導は事前に各店舗宛にご連絡ください。</p>
					<div class="hBlock_sosp"></div>
					<div class="errorMsg"></div>
					<?php require_once __DIR__ . "/search_area.php"; ?>
				</section>
			</section>
			<?php require_once __DIR__ . "/../template/footer/footer-search.php"; ?>
		</article>
		<div id="toTop" style="display:block">
			<p><a id="btn_top_page"><span>Topへ戻る</span></a></p>
		</div>
	</div>
</body>

</html>

<script type='text/javascript' src='/assets/js/search_form/autosize.js'></script>

<!-- <script type='text/javascript' src='/assets/js/search_form/init.js'></script> -->
<!-- <script type='text/javascript' src='/assets/js/search_form/sosp_search.js'></script> -->