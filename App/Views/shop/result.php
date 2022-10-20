<?php
/* Template Name: SAAG SEARCH */
// require_once __DIR__ . "/../template-partner/header/header-search.php";
require_once __DIR__ . "/../template/header/header-search.php";

/* params is got from controller ShopSearchController.php */
define("COL_OFFICE", 0);        // 会員名
define("COL_PREF", 1);        	// 都道府県コード
define("COL_ADDR", 2);        	// 住所
define("COL_TEL", 3);           // TEL
define("COL_ISDEMO", 4);        // デモあり

$prefecture = explode(':', $Wk_address_s);
?>
<link rel="stylesheet" href="/assets/css/search_form/shop_srch.css">

<body style="text-align: left;">
	<div id="wrapper">
		<article id="main" class="clearfix" style="margin-bottom:60px;">
			<section id="main_content">
				<!--/contents start/-->
				<!-- <div class="header"> -->
					<h2>ソリマチ製品取り扱い店舗<span>検索結果</span>
					<button type="button" class="title-back" id="backBtn">検索画面に戻る</button></h2>
				<!-- </div> -->

				<div class="search-filter">
					<div class="describe">
						<p><span class="text-important">■店頭デモ実施店について</span><br>
							店頭デモ実施店欄に「●」がついています。<br>
							店頭デモの実施日については [ <a href="https://info.sorimachi.co.jp/demo/demo_program.php?area_id=3" target="_blank">こちら </a>] で確認してください。
						</p>
					</div>
					<div class="search-box" id="search-box">
						<form action="" method="POST">
							<img src="/assets/images/shop/icon-search.png" alt="icon-search" height="29px" style="margin-bottom:-8px;">
							<input type="text" name="condition" id="" placeholder="「取扱店」「住所」の一部で絞り込み検索ができます。" value="<?= $search_condition ?>">
							<input type="hidden" name="flag_search" value="1">
							<input type="hidden" name="page" value="<?= $page ?>">
							<input type="hidden" name="total_page" value="<?= $total_pages ?>">
							<input type="hidden" name="address1" value="<?= $Wk_address_s ?>">
							<button type="submit" id="btn_search">検索</button>
						</form>
					</div>
					<p><b><?= $prefecture[COL_PREF] . "のソリマチ製品取り扱い店舗：" . $total_records . "件" ?></b></p>
				</div>

				<div class="result">
					<table id="search_rs">
						<tr>
							<th>取扱店</th>
							<th style="width: 35%;">住所</th>
							<th style="width: 20%;">電話番号</th>
							<th style="width: 20%;">店頭デモ実施店</th>
						</tr>
						<?php
						if (is_array($result) && count($result) > 0) {
							foreach ($result as $row) {
								echo "<tr>
                                        <td>" . $row[COL_OFFICE] . "</td>
                                        <td>" . $row[COL_ADDR] . "</td>
                                        <td>" . $row[COL_TEL] . "</td>
                                        <td style='text-align:center;'>" . $row['vIsDemo'] . "</td>
                                    </tr>";
							}
						} else {
							echo "<tr><td colspan = '4' style='text-align:center;'>該当する店舗は見つかりませんでした。</td></tr>";
						}
						?>
					</table>
				</div>

				<div class="pagination" style="position: relative;">
					<form action="" method="post" id="pagination">
						<!-- left -->
						<?php
						if ($page > 0) {
							echo '<button type="button" value="前のページ" style="background-color:olive;float:left;" onclick="setAction(-1);">前のページ</button>';
						} 
						?>

						<!-- center -->
						<div class="pagination-center" style="display: flex; align-items: center; position: absolute;right: 50%;transform: translate(50%,0);">
							<?php if (!empty($result)) { ?>
								<span style="font-size: 12px;" class="bold"><?= "ページ: " . ($page + 1) . "/" . $total_pages . "&nbsp;&nbsp;"; ?></span>
								<?php for ($i = 1; $i <= $total_pages; $i++) { ?>
										<button type="button" class="pageA pagination-center-number btn-pagination" name="<?= ($i - 1) ?>" value="<?= $i ?>" onclick="setPage(this.value - 1);"><?= $i ?></button>
								<?php } ?>
							<?php } ?>
						</div>

						<!-- right -->
						<?php
						if ($page < $total_pages - 1) {
							echo '<button type="button" value="次のページ" style="background-color:olive;float:right;" onclick="setAction(1);">次のページ</button>';
						}
						?>

						<input type="hidden" name="action" id="action" value="">
						<input type="hidden" name="total_page" value="<?= $total_pages ?>">
						<input type="hidden" name="address1" value="<?= $Wk_address_s ?>">
						<input type="hidden" name="condition" value="<?= $search_condition ?>">
						<input type="hidden" name="page" id="page" value="<?= $page ?>">
					</form>
				</div>

				<!-- search area-->
				<?php require_once __DIR__ . "/search_area.php"; ?>
				<!-- </div> -->
			</section>
			<?php require_once __DIR__ . "/../template/footer/footer-search.php"; ?>
		</article>
		<div id="toTop" style="display:block;">
			<p><a id="btn_top_page" href="#main"><span>Topへ戻る</span></a></p>
		</div>
	</div>
</body>

<script>
	$(document).ready(function() {
		let page = '<?= $page ?>';
		$("button[name=" + page + "]").prop('disabled', true);
		$("button[name=" + page + "]").css('background-color', 'olive');
		$("button[name=" + page + "]").css('color', 'white');
		$("#backBtn").click(()=> {window.location = '/partner/shop/search'});
		if ( window.history.replaceState ) {
 	 		window.history.replaceState( null, null, window.location.href );
		}
	});
	const setAction = (action) => {
		$("#action").val(action);
		$("#pagination").submit();

	}
	const setPage = (page) => {
		$("#page").val(page);
		$("#pagination").submit();
	}
	
</script>