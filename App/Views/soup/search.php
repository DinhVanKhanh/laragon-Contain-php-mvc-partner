<?php
/* Template Name: SOUP SEARCH */
require_once __DIR__ . "/../template/header/header-search.php";

?>

<body class="page-template page-template-Search_Form page-template-soup_search page-template-Search_Formsoup_search-php page page-id-119 page-child parent-pageid-87 has-header-image page-two-column colors-light">
	<div id="wrapper">
		<article id="main" class="clearfix">
			<section id="main_content">
				<p id="scLoading" style="display:none"><img src="/assets/images/uploads/profile/images_layout/icon_loading.gif"></p>
				<h2>ソリマチ製品 導入支援パートナー<span>検索</span><input type="button" value="検索画面に戻る" class="btnBack_soup" /></h2>
				<section id="sa_search" style="display:block">
					<p class="color_soup bold">ソフトの導入や操作に詳しい導入支援パートナーをご紹介いたします。</p>
					<p class="pb20">豊富な知識や経験を持ち、ユーザーの皆さまに充実したサービス・適切なサポートが提供できる<span class="bold">ソリマチ認定ユースウェアパートナー「SOUP」</span>。ソリマチ会計王シリーズに関する指導のご依頼、運用上のご相談などは、ぜひお近くのパートナーにお気軽にどうぞ。</p>
					<div class="hBlock_soup"></div>
					<div class="errorMsg"></div>
					<section id="ad_search" class="clearfix">
						<p class="title1">１．　条件を選択してください。</p>
						<p class="title2">２．　都道府県を選択して検索してください。</p>
						<div class="select">
							<div class="soup_map">
								<ul class="title_soup mb20">
									<li>■　ソリマチ認定インストラクター</li>
									<li><span>ソリマチ製品の公式インストラクターを、製品ごとに検索できます。<br />選択しない場合はすべての資格で選択します。</span></li>
								</ul>
								<ul class="area">
									<li><input type="checkbox" name="soi_products" value="会計王" id="soi_products1"> 会計王</li>
									<li><input type="checkbox" name="soi_products" value="給料王" id="soi_products2"> 給料王</li>
									<li><input type="checkbox" name="soi_products" value="販売王 販売・仕入・在庫" id="soi_products3"> 販売王 販売・仕入・在庫</li>
								</ul>
							</div>

							<div class="map_selected">
								<div class="select_area">
									<p class="soup_bl_area">北海道</p>
									<select id="area1" name="address">
										<option value="" selected="selected">選択して下さい</option>
										<option value="1:北海道">北海道</option>
									</select>
								</div>
								<div class="select_area">
									<p class="soup_bl_area">東北</p>
									<select id="area2" name="address">
										<option value="" selected="selected">選択して下さい</option>
										<option value="2:青森県">青森県</option>
										<option value="3:岩手県">岩手県</option>
										<option value="4:宮城県">宮城県</option>
										<option value="5:秋田県">秋田県</option>
										<option value="6:山形県">山形県</option>
										<option value="7:福島県">福島県</option>
									</select>
								</div>
								<div class="select_area">
									<p class="soup_bl_area">関東</p>
									<select id="area3" name="address">
										<option value="" selected="selected">選択して下さい</option>
										<option value="8:茨城県">茨城県</option>
										<option value="9:栃木県">栃木県</option>
										<option value="10:群馬県">群馬県</option>
										<option value="11:埼玉県">埼玉県</option>
										<option value="12:千葉県">千葉県</option>
										<option value="13:東京都">東京都</option>
										<option value="14:神奈川県">神奈川県</option>
										<option value="19:山梨県">山梨県</option>
									</select>
								</div>
								<div class="select_area">
									<p class="soup_bl_area">信越</p>
									<select id="area5" name="address">
										<option value="" selected="selected">選択して下さい</option>
										<option value="20:長野県">長野県</option>
										<option value="15:新潟県">新潟県</option>
										<option value="16:富山県">富山県</option>
										<option value="17:石川県">石川県</option>
									</select>
								</div>
								<div class="select_area">
									<p class="soup_bl_area">中部</p>
									<select id="area4" name="address">
										<option value="" selected="selected">選択して下さい</option>
										<option value="21:岐阜県">岐阜県</option>
										<option value="22:静岡県">静岡県</option>
										<option value="23:愛知県">愛知県</option>
										<option value="24:三重県">三重県</option>
									</select>
								</div>
								<div class="select_area">
									<p class="soup_bl_area">関西</p>
									<select id="area6" name="address">
										<option value="" selected="selected">選択して下さい</option>
										<option value="20:福井県">福井県</option>
										<option value="25:滋賀県">滋賀県</option>
										<option value="26:京都府">京都府</option>
										<option value="27:大阪府">大阪府</option>
										<option value="28:兵庫県">兵庫県</option>
										<option value="29:奈良県">奈良県</option>
										<option value="30:和歌山県">和歌山県</option>
									</select>
								</div>
								<div class="select_area">
									<p class="soup_bl_area">中四国</p>
									<select id="area7" name="address">
										<option value="" selected="selected">選択して下さい</option>
										<option value="31:鳥取県">鳥取県</option>
										<option value="32:島根県">島根県</option>
										<option value="33:岡山県">岡山県</option>
										<option value="34:広島県">広島県</option>
										<option value="35:山口県">山口県</option>
										<option value="36:徳島県">徳島県</option>
										<option value="37:香川県">香川県</option>
										<option value="38:愛媛県">愛媛県</option>
										<option value="39:高知県">高知県</option>
									</select>
								</div>
								<div class="select_area">
									<p class="soup_bl_area">九州</p>
									<select id="area8" name="address">
										<option value="" selected="selected">選択して下さい</option>
										<option value="40:福岡県">福岡県</option>
										<option value="41:佐賀県">佐賀県</option>
										<option value="42:長崎県">長崎県</option>
										<option value="43:熊本県">熊本県</option>
										<option value="44:大分県">大分県</option>
										<option value="45:宮崎県">宮崎県</option>
										<option value="46:鹿児島県">鹿児島県</option>
										<option value="47:沖縄県">沖縄県</option>
									</select>
								</div>
								<p class="center"><input type="button" name="submit_research" id="ok" value="上記の条件で再検索する" style="width:98%; font-size:15px; display:none; background-color:#e87500 !important; background-image:none !important;" /></p>
							</div>
							<div class="map">
								<p><img src="/assets/images/uploads/profile/images_layout/map_japan.jpg" width="330" height="241"></p>
							</div>
						</div>
					</section>
					<p class="center img">
						<a href="/partner/soup/req/" class="iconSo" target="_blank">
							<img src="/assets/images/uploads/profile/images_layout/banner_03.jpg" width="859" height="180" class="hide_sp">
							<img src="/assets/images/uploads/profile/images_layout/banner_03_sp.jpg" width="859" height="180" class="hide_pc">
						</a>
					</p>
				</section>
				<input type="hidden" id="old_address">
			</section>
			<?php require_once __DIR__ . "/../template/footer/footer-search.php"; ?>
		</article>
		<div id="toTop" style="display:block">
			<p><a id="btn_top_page"><span>Topへ戻る</span></a></p>
		</div>
	</div>
</body>
<script type='text/javascript' src='/assets/js/search_form/autosize.js'></script>
<script type='text/javascript' src='/assets/js/search_form/init.js'></script>
<script type='text/javascript' src='/assets/js/search_form/soup_search.js'></script>