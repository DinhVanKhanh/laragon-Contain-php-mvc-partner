<?php

namespace App\Controllers\Maintenance;

use \Core\View;
use \App\Models\User;
use Core\Model;
use PDO;
use App\Controllers\maintenance\MasterController;

if (empty(session_id()))
	session_start();

/**
 * Home controller
 *
 * PHP version 7.0
 */

class SearchController extends \Core\Controller
{
	/**
	 * Show the index page
	 *
	 * @return void
	 */
	public function indexAction()
	{

		// require_once __DIR__ . '/../core/init.php';
		// require_once dirname( dirname( __DIR__ ) )."/inc/common.php";
		require_once __DIR__ . '/../../functions/search_form.php';
		require_once __DIR__ . "/../../inc/common.php";

		define('page_cnt', 10);

		// 動作判定
		if (isset($_POST['action'])) {
			switch ($_POST['action']) {
				case 'loadAllChecklist':
					$this->loadAllChecklist();
					break;
				case 'searchAction':
					echo json_encode($this->searchAction($_POST['numPage']));
					break;
			}
		}
	}

	// 製品・始業チェックボックス
	public function loadAllChecklist()
	{
		// $conn       = ConnectPartner();
		$ul_even    = '<ul class="even">';
		$ul_odd     = '<ul class="odd">';
		$i          = 0;

		// 製品
		$query_pro  = "SELECT * FROM seihin";
		// $result_pro = mysqli_query($conn, $query_pro);
		$result_pro = User::getQuery($query_pro, true, false);
		foreach ($result_pro as $row_pro) {
			$i++;
			$sei_name = $row_pro["sei_name"];
			if ($i % 2 == 0) {
				$ul_even .= '<li><input type="checkbox" name="seihin" value="' . $sei_name . '"><span class="name_pro">' . $sei_name . '</span></li>';
			} else {
				$ul_odd  .= '<li><input type="checkbox" name="seihin" value="' . $sei_name . '"><span class="name_pro">' . $sei_name . '</span></li>';
			}
		}
		// while ($row_pro = mysqli_fetch_array($result_pro)) {
		//     $i++;
		//     $sei_name = $row_pro["sei_name"];
		//     if ($i % 2 == 0) {
		//         $ul_even .= '<li><input type="checkbox" name="seihin" value="' . $sei_name . '"><span class="name_pro">' . $sei_name . '</span></li>';
		//     } else {
		//         $ul_odd  .= '<li><input type="checkbox" name="seihin" value="' . $sei_name . '"><span class="name_pro">' . $sei_name . '</span></li>';
		//     }
		// }
		// mysqli_free_result($result_pro);
		$ul_even .= '</ul>';
		$ul_odd  .= '</ul>';
		$arr["checkpro"] = $ul_odd . $ul_even;

		$ul_even      = '<ul class="even">';
		$ul_odd       = '<ul class="odd">';
		$i            = 0;

		// 始業
		$query_sigyo  = "SELECT * FROM sigyo";
		// $result_sigyo = mysqli_query($conn, $query_sigyo);
		$result_sigyo = User::getQuery($query_sigyo, true, false);

		foreach ($result_sigyo as $row_sigyo) {
			$i++;
			$si_name = $row_sigyo["si_name"];
			if ($i % 2 == 0) {
				$ul_even .= '<li><input type="checkbox" name="sigyo" value="' . $si_name . '"><span class="name_siyo">' . $si_name . '</span></li>';
			} else {
				$ul_odd  .= '<li><input type="checkbox" name="sigyo" value="' . $si_name . '"><span class="name_siyo">' . $si_name . '</span></li>';
			}
		}
		// while ($row_sigyo = mysqli_fetch_array($result_sigyo)) {
		//     $i++;
		//     $si_name = $row_sigyo["si_name"];
		//     if ($i % 2 == 0) {
		//         $ul_even .= '<li><input type="checkbox" name="sigyo" value="' . $si_name . '"><span class="name_siyo">' . $si_name . '</span></li>';
		//     } else {
		//         $ul_odd  .= '<li><input type="checkbox" name="sigyo" value="' . $si_name . '"><span class="name_siyo">' . $si_name . '</span></li>';
		//     }
		// }
		// mysqli_free_result($result_sigyo);
		$ul_even .= '</ul>';
		$ul_odd  .= '</ul>';
		$arr["checksp"] = $ul_odd . $ul_even;

		$arr["success"] = true;
		$arr            = json_encode($arr);
		echo $arr;
	}

	// 検索
	public function searchAction($numPage = 1)
	{
		global $page, $page_s, $page_e, $db_cnt, $h_cnt;
		$page_s = $page_e = $db_cnt = $h_cnt = 0;

		// ページング
		if (isset($_POST["page"]) && $_POST["page"] != 0) {
			$page   = $_POST["page"] + 1;
			$page_e = page_cnt * $page;
			$page_s = $page_e - page_cnt;
		} else {
			$page   = 1;
			$page_e = page_cnt;
			$page_s = 0;
		}

		//　画像設定ファイルチェック
		$n = 0;

		$iniFile = fopen(__DIR__ . "/../../../public" . "/assets/images/uploads/profile/images.ini", "r");
		$FilePath = array();
		if ($iniFile) {
			while (($line = fgets($iniFile)) !== false) {
				$lines        = explode("=", $line);
				$FilePath[$n] = trim($lines[1]);
				$n++;
			}
			fclose($iniFile);
		} else {
			return "エラー";
		}

		// 都道府県チェック
		$Wk_cnt  = 0;
		$address = $_POST['address'];
		$Wk_address_s = explode(",", str_replace(" ", "", $address));
		$Wk_key = array();

		for ($i = 0; $i <= 7; $i++) {
			if ($Wk_address_s[$i] != '') {
				$Wk_cnt++;
				$Wk_key = explode(":", $Wk_address_s[$i]);
				break;
			}
		}
		if ($Wk_cnt == 0) {
			return '<p class="title">選択エラー</p><p>都道府県が選択されていません。</p>';
		}

		// 検索処理
		// $conn = ConnectPartner();
		$conn = "";
		$SearchPrefCode = ltrim($Wk_key[0]);
		$SearchPref     = trim($Wk_key[1]);
		$strSQL_taio    = $grid = '';
		$Wk_komoku = $custom_input = $class_back = '';
		switch ($numPage) {
			case SAAG:
				$strSQL_chiiki = "SELECT * FROM infos_saag WHERE pref_code = '" . $SearchPrefCode . "'";

				// 製品の選択項目をチェック
				$seihin = (!empty($_POST['seihin'])) ? ((is_array($_POST['seihin'])) ? str_replace(' ', '', implode(',', $_POST['seihin'])) : $_POST['seihin']) : "";
				if (trim($seihin) != "") {
					$strSQL_taio   .= " AND (";
					$strSQL_chiiki .= " AND (";

					$arrSeihin = explode(",", str_replace(" ", "", $seihin));
					$nSeihin = count($arrSeihin);
					for ($k = 0; $k < $nSeihin; $k++) {
						$strSQL_taio   .= (($k == 0) ? '' : 'OR') . " products LIKE '%" . $arrSeihin[$k] . "%'";
						$strSQL_chiiki .= (($k == 0) ? '' : 'OR') . " products LIKE '%" . $arrSeihin[$k] . "%'";
					}
					$strSQL_taio   .= ")";
					$strSQL_chiiki .= ")";
				}

				// 資格の選択項目をチェック
				$sigyo = (!empty($_POST['sigyo'])) ? ((is_array($_POST['sigyo'])) ? str_replace(' ', '', implode(',', $_POST['sigyo'])) : $_POST['sigyo']) : "";
				if (trim($sigyo) != "") {
					$strSQL_taio   .= " AND (";
					$strSQL_chiiki .= " AND (";

					$arrSigyo = explode(",", str_replace(" ", "", $sigyo));
					$nSigyo = count($arrSigyo);
					for ($j = 0; $j < $nSigyo; $j++) {
						$strSQL_taio   .= (($j == 0) ? '' : 'OR') . " qualifications LIKE '%" . $arrSigyo[$j] . "%'";
						$strSQL_chiiki .= (($j == 0) ? '' : 'OR') . " qualifications LIKE '%" . $arrSigyo[$j] . "%'";
					}
					$strSQL_taio   .= ")";
					$strSQL_chiiki .= ")";
				}

				// SQL
				$areaZenkoku      = '日本全国';
				$strSQL_taio     .= " AND pref_code <> " . $SearchPrefCode;
				$sql_taio_area    = "SELECT * FROM infos_saag WHERE areas LIKE '%" . $SearchPref . "%'" . $strSQL_taio;
				$sql_taio_zenkoku = "SELECT * FROM infos_saag WHERE areas = '" . $areaZenkoku . "'" . $strSQL_taio;

				// 共通表示内容
				// $result_taio_area    = mysqli_query($conn, $sql_taio_area);
				// $result_taio_zenkoku = mysqli_query($conn, $sql_taio_zenkoku);
				// $result_chiiki       = mysqli_query($conn, $strSQL_chiiki);

				$result_taio_area    = User::getQuery($sql_taio_area, true, false);
				$result_taio_zenkoku = User::getQuery($sql_taio_zenkoku, true, false);
				$result_chiiki       = User::getQuery($strSQL_chiiki, true, false);


				global $numRowsTaiou, $numRowsTaiouArea, $numRowsTaiouZenkoku, $numRowsChiiki, $sumItem;
				$Wk_komoku            = $this->buildData($result_taio_area, $FilePath[2], $numPage);
				$numRowsTaiouArea     = $db_cnt;

				$Wk_komoku           .= $this->buildData($result_taio_zenkoku, $FilePath[2], $numPage);
				$numRowsTaiouZenkoku  = $db_cnt - $numRowsTaiouArea;

				$Wk_komoku           .= $this->buildData($result_chiiki, $FilePath[2], $numPage);
				$numRowsTaiou         = $numRowsTaiouArea + $numRowsTaiouZenkoku;

				$numRowsChiiki        = $db_cnt - $numRowsTaiou;
				$sumItem              = $numRowsTaiou + $numRowsChiiki;

				// HTML
				if (!empty($numRowsTaiou) || !empty($numRowsChiiki) || !empty($seihin) || !empty($sigyo)) {
					$grid .= "<p class='txtCondition bold'>";
				}
				if (!empty($numRowsChiiki)) {
					$grid .= "<span class='nowrap'>" . $SearchPref . "のSAAG：" . $numRowsChiiki . "件</span><br>";
				}
				if (!empty($numRowsTaiou)) {
					$grid .= "<span class='nowrap'>" . $SearchPref . "に対応可能なSAAG：" . $numRowsTaiou . "件</span><br>";
				}
				if (!empty($sigyo) && !empty($seihin)) {
					$grid .= "<br>" . str_replace(',', '、', $sigyo);
				}
				if (!empty($seihin)) {
					$grid .= str_replace(',', '、', $seihin);
				}
				if (!empty($sigyo)) {
					$grid .= str_replace(',', '、', $sigyo);
				}
				if (!empty($numRowsTaiou) || !empty($numRowsChiiki)) {
					$grid .= "</p>";
				}

				if ($db_cnt == 0) {
					$grid .= "<table width='500' border='0' cellpadding='3' cellspacing='1'><tr><td colspan='2'><b>該当するＳＡＡＧ会員は見つかりませんでした。</b></td></tr></table>";
				}

				$custom_input  = "<input type='hidden' name='seihin1' value='" . $seihin . "'>";
				$custom_input .= "<input type='hidden' name='sigyo1' value='" . $sigyo . "'>";
				$class_back    = "_saag";
				break;

			case SOSP:
				$areaZenkoku = "";
				if ($SearchPrefCode === 48 || $SearchPrefCode === '48') {
					$areaZenkoku = "BETWEEN 2 AND 7";
				} elseif ($SearchPrefCode === 49 || $SearchPrefCode === '49') {
					$areaZenkoku = "IN (8,9,10,11,12,13,14,19)";
				} elseif ($SearchPrefCode === 50 || $SearchPrefCode === '50') {
					$areaZenkoku = "IN (15,16,17,20)";
				} elseif ($SearchPrefCode === 51 || $SearchPrefCode === '51') {
					$areaZenkoku = "BETWEEN 21 AND 24";
				} elseif ($SearchPrefCode === 52 || $SearchPrefCode === '52') {
					$areaZenkoku = "IN (18,25,26,27,28,29,30)";
				} elseif ($SearchPrefCode === 53 || $SearchPrefCode === '53') {
					$areaZenkoku = "BETWEEN 31 AND 39";
				} elseif ($SearchPrefCode === 54 || $SearchPrefCode === '54') {
					$areaZenkoku = "BETWEEN 40 AND 47";
				}
				$sql_taio_zenkoku = "SELECT * FROM infos_sosp WHERE pref_code " . ($areaZenkoku !== "" ? $areaZenkoku : '= ' . $SearchPrefCode) . " AND show_web = 1";

				// SQL
				$demo  = $_POST['demo'];
				$visit = $_POST['visit'];
				if ($demo == 1 && $visit == 1) {
					$sql_taio_zenkoku .= " AND demospace = " . $demo . " AND visit_guide = " . $visit;
				} elseif ($demo == 1) {
					$sql_taio_zenkoku .= " AND demospace = " . $demo;
				} elseif ($visit == 1) {
					$sql_taio_zenkoku .= " AND visit_guide = " . $visit;
				}

				// 共通表示内容
				// $result_taio_zenkoku = mysqli_query($conn, $sql_taio_zenkoku);
				$result_taio_zenkoku = User::getQuery($sql_taio_zenkoku, true, false);

				global $numRowsTaiou, $numRowsTaiouArea, $numRowsTaiouZenkoku, $numRowsChiiki, $sumItem;

				$numRowsTaiouArea     = $db_cnt;
				$Wk_komoku            = $this->buildData($result_taio_zenkoku, $FilePath[2], $numPage);
				$numRowsTaiouZenkoku  = $db_cnt - $numRowsTaiouArea;

				$numRowsTaiou         = $numRowsTaiouArea + $numRowsTaiouZenkoku;
				$numRowsChiiki        = $db_cnt - $numRowsTaiou;
				$sumItem              = $numRowsTaiou + $numRowsChiiki;

				// HTML
				if (!empty($numRowsTaiou) || !empty($numRowsChiiki) || !empty($demo) || !empty($visit)) {
					$grid .= "<p class='txtCondition bold'>";
				}
				if (!empty($numRowsTaiou)) {
					$grid .= "<span class='nowrap'>" . $SearchPref . "のSOSP：" . $numRowsTaiou . "件</span><br>";
				}
				if (!empty($numRowsTaiou) || !empty($numRowsChiiki)) {
					$grid .= "</p>";
				}

				if ($db_cnt == 0) {
					$grid .= "<table width='500' border='0' cellpadding='3' cellspacing='1'>";
					$grid .= "<tr>";
					$grid .= "<td colspan='2'>
                                <span class='txtCondition bold'>" . $SearchPref . "のSOSP：" . $numRowsTaiou . "件</span><br>
                                <b>該当するパートナーが見つかりませんでした。条件を変更して再度検索してください。</b></td>";
					$grid .= "</tr>";
					$grid .= "</table>";
				}

				$custom_input  = "<input type='hidden' name='demo1' value='" . $demo . "'>";
				$custom_input .= "<input type='hidden' name='visit1' value='" . $visit . "'>";
				$class_back    = "_sosp";
				break;

			case SOUP:
				$soi_products = (!empty($_POST['soi_products'])) ? $_POST['soi_products'] : '';
				$sql_soi_products = "";
				if ($soi_products != '') {
					$key   = ",";
					$count = 0;

					for ($x = 0; $x < strlen($soi_products); $x++) {
						if (substr($soi_products, $x, 1) == $key) {
							$count++;
						}
					}
					$sql_soi_products .= " AND (";

					for ($i = 0; $i <= $count; $i++) {
						$soi = explode(",", $soi_products);
						$sql_soi_products .= (($i == 0) ? '' : ' AND') . " soi_products LIKE '%" . $soi[$i] . "%'";
					}
					$sql_soi_products .= ")";
				}

				// SQL
				$strSQL_taio   = "SELECT * FROM infos_soup WHERE pref_code = " . $SearchPrefCode . " AND show_web = 1";
				$strSQL_chiiki = "SELECT * FROM infos_soup WHERE pref_code <> " . $SearchPrefCode . " AND show_web = 1 AND areas LIKE '%" . $SearchPref . "%'";
				if ($sql_soi_products !== "") {
					$strSQL_taio   .= $sql_soi_products;
					$strSQL_chiiki .= $sql_soi_products;
				}

				// 共通表示内容
				// $result_taio   = mysqli_query($conn, $strSQL_taio);
				// $result_chiiki = mysqli_query($conn, $strSQL_chiiki);

				$result_taio    = User::getQuery($strSQL_taio, true, false);
				$result_chiiki       = User::getQuery($strSQL_chiiki, true, false);

				global $numRowsTaiou, $numRowsTaiouArea, $numRowsTaiouZenkoku, $sumItem;
				$Wk_komoku            = $this->buildData($result_taio, $FilePath[2], $numPage);
				$numRowsTaiouArea     = $db_cnt;

				$Wk_komoku           .= $this->buildData($result_chiiki, $FilePath[2], $numPage);
				$numRowsTaiouZenkoku  = $db_cnt - $numRowsTaiouArea;

				$numRowsTaiou         = $numRowsTaiouArea + $numRowsTaiouZenkoku;
				$sumItem              = $numRowsTaiou;

				// HTML
				if (!empty($numRowsTaiou) || !empty($area)) {
					$grid .= "<p class='txtCondition bold'>";
				}
				if (!empty($numRowsTaiou)) {
					$grid .= "<span class='nowrap'>" . $SearchPref . "のSOUP：" . $numRowsTaiouArea . "件</span><br>";
				}
				if (!empty($numRowsTaiouZenkoku)) {
					$grid .= "<span class='nowrap'>" . $SearchPref . "での対応が可能なSOUP：" . $numRowsTaiouZenkoku . "件</span><br>";
				}
				if (!empty($numRowsTaiou)) {
					$grid .= "</p>";
				}

				if ($db_cnt == 0) {
					$grid .= "<table width='500' border='0' cellpadding='3' cellspacing='1'>";
					$grid .= "<tr>";
					$grid .= "<td colspan='2'>
                              <span class='txtCondition bold nowrap '>" . $SearchPref . "のSOUP：" . $numRowsTaiouArea . "件</span><br>";
					$grid .= "<span class='nowrap'>" . $SearchPref . "での対応が可能なSOUP：" . $numRowsTaiouZenkoku . "件</span><br>";
					$grid .= "<b>該当するパートナーが見つかりませんでした。条件を変更して再度検索してください。</b></td>";
					$grid .= "</tr>";
					$grid .= "</table>";
				}

				$custom_input = "<input type='hidden' name='soi_products1' value='" . $soi_products . "'>";
				$class_back   = "_soup";
				break;
		}
		$grid .= $this->searchTable($Wk_komoku, $SearchPref, $numPage);

		// ページング
		$grid .= "<table width='100%' class='pageNumber'>";
		$grid .= "<tr>";

		$grid .= "<td class='left w120px'>";
		if ($page > 1) {
			$grid .= "<input type='hidden' name='page_back' value='" . intval($page - 2) . "'>";
			$grid .= "<input type='button' value='前のページ' id='back" . $class_back . "' class='back" . $class_back . "'><span class='icon'>&nbsp;</span>";
		}
		$grid .= "</td>";

		$grid .= "<td class='center pageTd'>";
		$grid .= "<p class='conLeft'>";
		$grid .= "<input type='hidden' name='address1' value='" . $address . "'>";
		$grid .= $custom_input;
		$sumPage = (($sumItem % page_cnt) > 0) ? floor($sumItem / page_cnt) + 1 : floor($sumItem / page_cnt);
		$grid .= '<span class="pageSpan">ページ　' . $page . '/' . $sumPage . '</span>';

		$page_id = 1;
		while ($page_id <= $sumPage) {
			$grid .= ($page_id == $page) ? '<span class="pageA active">' . $page_id . '</span>' : '<span class="pageA">' . $page_id . '</span>';
			$page_id++;
		}
		$grid .= '</p>';
		$grid .= "</td>";

		$grid .= "<td class='right w120px'>";
		if ($db_cnt > $h_cnt) {
			$grid .= "<input type='hidden' name='page_next' value='" . $page . "'>";
			$grid .= "<input type='button' value='次のページ' id='next" . $class_back . "' class='next" . $class_back . "'><span class='icon'>&nbsp;</span>";
		}
		$grid .= "</td></tr></table>";

		// mysqli_close($conn);
		$result['old_address'] = $address;
		$result['dataGrid']    = $grid;
		$result['success']     = true;
		return $result;
	}

	// データ作成
	public function buildData($result_sql, $FilePath, $numPage = 1)
	{
		global $db_cnt, $dir_thumb;
		$Wk_komoku = "";
		$strId     = $this->getInfosID($numPage);

		switch ($numPage) {
			case SAAG:
				$dir_thumb = __DIR__ . "/../../../public" . '/assets/profile/images_saag/' . $FilePath . '/';
				$arr_thumb = explode(';', $dir_thumb);
				foreach ($result_sql as $row) {
					// データを格納する配列
					$dataid         = $row["id"];
					$SaagId         = $row["saag_id"];
					$CustomerCode   = $row["customer_code"];
					$CompanyName    = $row["company_name"];
					$MemberName     = $row["member_name"];
					$Contact        = $row["contact"];
					$Email          = $row["Email"];
					$ZipCode        = $row["zip_code"];
					$PrefCode       = $row["pref_code"];
					$Address        = $row["address"];
					$Tel            = $row["tel"];
					$Fax            = $row["fax"];
					$HomePage       = $row["URL"];
					$Qualifications = $row["qualifications"];
					$Products       = $row["products"];
					$TaiouAreas     = $row["areas"];
					$Comment        = $row["comments"];
					$OfficePhoto    = $row["photo"];
					$InfoType       = $row["info_type"];
					$ShowWeb        = $row["show_web"];
					$Campaign1      = $row["campaign1"];
					$Fname = "";

					// SAAG会員のリストをチェックし、ＯＫの場合
					// 2020/11/13 Kentaro.Watanabe IDを10101010に変更
					if (($this->checkMember($strId, $SaagId) == 1 || $this->checkMember($strId, $CustomerCode) == 1) && $SaagId != "10101010" && $ShowWeb != false) {
						// 写真があるかチェック
						if ($OfficePhoto == 1) {
							foreach ($arr_thumb as $FnameVal) {
								if (strpos($FnameVal, $SaagId) !== false) {
									$Fname = $FnameVal;
									break;
								}
							}
						}

						// “念の為の”処理
						$HomePage       = (is_null($HomePage)) ? "" : str_replace(",", ".", $HomePage);
						$Address        = (is_null($Address)) ? "" : str_replace("vbNewLine", "　", $Address);
						$Products       = (is_null($Products)) ? "" : str_replace(" ", "", str_replace(",", "、", $Products));
						$Qualifications = (is_null($Qualifications)) ? "" : str_replace(" ", "", str_replace(",", "、", $Qualifications));
						$TaiouAreas     = (is_null($TaiouAreas)) ? "" : str_replace(" ", "", str_replace(",", "、", $TaiouAreas));
						$Comment        = (is_null($Comment)) ? "" : str_replace(",", "，", str_replace("vbVerticalTab", "<br />", str_replace("vbNewLine", "<br />", $Comment)));

						$Wk_komoku .= $dataid . "line;" . $SaagId . "line;" . $CompanyName . "line;" . $MemberName . "line;" . $Contact . "line;" . $Email . "line;" . $ZipCode . "line;" . $PrefCode . "line;" . $Address;
						$Wk_komoku .= "line;" . $Tel . "line;" . $Fax . "line;" . $HomePage . "line;" . $Qualifications . "line;" . $Products . "line;" . $TaiouAreas . "line;" . $Comment . "line;" . $OfficePhoto . "line;" . $InfoType;
						$Wk_komoku .= "line;" . $ShowWeb . "line;" . $Campaign1 . "line;" . $Fname . "line;vbNewLine";
						$db_cnt++;
					}
				}
				// while ($row = mysqli_fetch_assoc($result_sql)) {

				// }
				break;

			case SOSP:
			case SOUP:
				if ($numPage == 2) {
					$dir_thumb    = __DIR__ . "/../../../public" . '/assets/images/uploads/profile/images_sosp/' . $FilePath . '/';
					$column_custom = ['sosp_id', 'demospace', 'visit_guide'];
				} else {
					$dir_thumb    = __DIR__ . "/../../../public" . '/assets/images/uploads/profile/images_soup/' . $FilePath . '/';
					$column_custom = ['soup_id', 'soi_products', 'areas'];
				}
				foreach ($result_sql as $row) {
					$dataid       = $row["id"];
					$custom_id    = $row[$column_custom[0]];
					$customA      = $row[$column_custom[1]];
					$customB      = $row[$column_custom[2]];
					$CustomerCode = $row["customer_code"];
					$CompanyName  = $row["company_name"];
					$Contact      = $row["contact"];
					$Email_open   = $row["Email_open"];
					$Email        = $row["Email"];
					$ZipCode      = $row["zip_code"];
					$PrefCode     = $row["pref_code"];
					$Address      = $row["address"];
					$Tel          = $row["tel"];
					$Fax          = $row["fax"];
					$sbm          = $row["sbm_flag"];
					$HomePage     = $row["URL"];
					$Comment      = $row["comments"];
					$OfficePhoto  = $row["photo"];
					$ShowWeb      = $row["show_web"];

					// SOSP, SOUP会員のリストをチェックし、ＯＫの場合
					if (($this->checkMember($strId, $custom_id) == 1)) {
						// “念の為の”処理
						$HomePage = (is_null($HomePage)) ? "" : str_replace(",", ".", $HomePage);
						$Address  = (is_null($Address)) ? "" : str_replace("vbNewLine", "　", $Address);
						$Comment  = (is_null($Comment)) ? "" : str_replace(",", "，", str_replace("vbVerticalTab", "<br />", str_replace("vbNewLine", "<br />", $Comment)));

						$Wk_komoku .= $dataid . "line;" . $custom_id . "line;" . $CompanyName . "line;" . $Contact . "line;" . $Email_open . "line;" . $Email . "line;" . $ZipCode . "line;" . $PrefCode . "line;" . $Address . "line;" . $Tel;
						$Wk_komoku .= "line;" . $Fax . "line;" . $customA . "line;" . $customB . "line;" . $sbm . "line;" . $HomePage . "line;" . $Comment . "line;" . $ShowWeb . "line;" . $OfficePhoto . "line;vbNewLine";
						$db_cnt++;
					}
				}

				// while ($row = mysqli_fetch_array($result_sql)) {
				// }
				break;
		}
		return $Wk_komoku;
	}

	// データ検索
	public function searchTable($Wk_komoku, $SearchPref, $numPage = 1)
	{
		global $page, $page_s, $page_e, $db_cnt, $h_cnt;
		global $numRowsTaiou, $numRowsTaiouArea, $numRowsTaiouZenkoku, $numRowsChiiki;
		$Wk_komoku_s = explode('vbNewLine', $Wk_komoku); // 区切り文字を改行に変更

		$isButton = isset($_POST['isButton']) ? $_POST['isButton'] : 0;
		$isPageA  = isset($_POST['isPageA']) ? $_POST['isPageA'] : 0;
		if (($isButton == 1 || $isPageA == 1) && isset($_SESSION['array_komoku'])) {
			$Wk_komoku_s = $_SESSION['array_komoku'];
		} else {
			$arr_taiou_area    = array_slice($Wk_komoku_s, 0, $numRowsTaiouArea);
			shuffle($arr_taiou_area); //random position array

			$arr_taiou_zenkoku = array_slice($Wk_komoku_s, $numRowsTaiouArea, $numRowsTaiouZenkoku);
			shuffle($arr_taiou_zenkoku); //random position array

			$arr_chiiki        = array_slice($Wk_komoku_s, $numRowsTaiou, $numRowsChiiki);
			shuffle($arr_chiiki); //random position array

			$Wk_komoku_s       = array_merge($arr_chiiki, $arr_taiou_area, $arr_taiou_zenkoku);
			$_SESSION['array_komoku'] = $Wk_komoku_s;
		}
		$db_cnt = count($Wk_komoku_s);

		$text_array = array();
		switch ($numPage) {
			case SAAG:
				$text_array = ['のSAAG', 'に対応が可能なSAAG'];
				break;
			case SOSP:
				$text_array = ['のソリマチ製品取扱特約店', 'のソリマチ製品取扱特約店'];
				break;
			case SOUP:
				$text_array = ['のSOUP', 'での対応が可能なSOUP'];
				break;
		}

		$rs = '';
		$h_cnt = 0;
		foreach ($Wk_komoku_s as $keyKomoku => $komoku) {
			if ($komoku != "") {
				if ($h_cnt >= $page_e) {
					break;
				}
				if ($h_cnt >= $page_s) {
					$id = $keyKomoku + 1;
					$id_begin_of_page = ($page - 1) * page_cnt + 1;
					if (($id == 1 && $numRowsChiiki > 0) || ($id == $id_begin_of_page && $id < $numRowsChiiki)) {
						$rs .= '<p class="h3Title">' . $SearchPref . $text_array[0] . '</p>';
					} elseif (($id == $numRowsChiiki + 1) || ($id == $id_begin_of_page && $id > $numRowsChiiki)) {
						$rs .= '<p class="h3Title">' . $SearchPref . $text_array[1] . '</p>';
					}

					// 各パートナー情報の表示
					$k_data = array_map('trim', explode('line;', $komoku));
					$rs .= $this->writeInfo($k_data, $numPage);
				}
			}
			$h_cnt++;
		}
		return $rs;
	}

	// パートナー情報表示
	public function writeInfo($arrLine, $numPage = 1)
	{
		$COL_CUSTOMERCODE = 1;  // 顧客コード
		$COL_OFFICE       = 2;  // 会社名
		$COL_MAIL         = 5;  // EMAIL
		$COL_ZIP          = 6;  // ZIPCODE
		$COL_PREF         = 7;  // 都道府県
		$COL_ADDR         = 8;  // 住所
		$COL_TEL          = 9;  // TEL
		$COL_FAX          = 10; // FAX

		$rs_html = '';
		switch ($numPage) {
			case SAAG:
				$COL_CHARGE      = 4;  // 担当者名
				$COL_URL         = 11; // URL
				$COL_LICENSE     = 12; // 資格
				$COL_PRODUCTS    = 13; // 対応製品
				$COL_SUPPORTPREF = 14; // 対応可能地域
				$COL_COMMENT     = 15; // コメント
				$COL_IMAGE       = 16; // 会社イメージ画像

				$vCustomerCode   = $arrLine[$COL_CUSTOMERCODE];                 // 顧客コード
				$vOffice         = $arrLine[$COL_OFFICE];                       // 会社名
				$vCharge         = $arrLine[$COL_CHARGE];                       // 担当者
				$vMail           = trim($arrLine[$COL_MAIL]);                   // メール
				$vZip            = $arrLine[$COL_ZIP];                          // 郵便番号
				$vPrefName       = getPrefNameJIS($arrLine[$COL_PREF]);         // 都道府県
				$vAddr           = $arrLine[$COL_ADDR];                         // 所在地
				$vTel            = $arrLine[$COL_TEL];                          // TEL
				$vFax            = $arrLine[$COL_FAX];                          // FAX
				$vUrl            = $this->proccessDataURL(trim($arrLine[$COL_URL]));   // URL
				$vLicense        = $arrLine[$COL_LICENSE];                      // 資格
				$vProducts       = $arrLine[$COL_PRODUCTS];                     // 対応製品
				$vImage          = $arrLine[$COL_IMAGE];                        // 会社イメージ画像

				// コメント
				$vComment = '';
				if (trim($arrLine[$COL_COMMENT]) != "") {
					$vComment = "<div style='font-weight:bold'>【 担当者からのひとこと 】</div><textarea style='width:100%!important;' readonly='readonly'>" . htmlspecialchars($arrLine[$COL_COMMENT]) . "</textarea>";
				}

				// 対応都道府県
				$arrPref      = explode("、", $arrLine[$COL_SUPPORTPREF]);
				$vSupportPref = "";
				foreach ($arrPref as $vCode) {
					$vSupportPref .= ($vCode == $vPrefName) ? "" : $vCode . "、";
				}
				$vSupportPref = rtrim($vSupportPref, "　、");

				// 会社イメージ画像
				$vImageURL = "/assets/images/uploads/profile/images_layout/saag.gif";
				$vImageAlt = "No Image";
				$vImageSize[0] = 120;
				$vImageSize[1] = 46;

				if ($vImage != 0) {
					$path_thumbnail =  __DIR__ . "/../../../public" . "/assets/images/uploads/profile/images_saag/thumbnail/";
					$fp_thumbnail = opendir($path_thumbnail);
					while ($file = readdir($fp_thumbnail)) {
						if (is_file($path_thumbnail . $file)) {
							$pos = strpos($file, $vCustomerCode);
							if ($pos !== false) {
								$vImageURL = "/assets/images/uploads/profile/images_saag/thumbnail/{$vCustomerCode}.jpg";
								$vImageAlt = "{$vOffice}様のご紹介";
								$vImageSize[1] = 120;
								break;
							}
						}
					}
				}

				// HTML
				$rs_html .= '<h4 id="company_name">' . $vOffice . '</h4>
                    <p class="show_img"><img src="' . $vImageURL . '" alt="' . $vImageAlt . '" width="' . $vImageSize[0] . '"></p>
                    <script src="/assets/js/search_form/autosize.js"></script>
                    <script>autosize(document.querySelectorAll("textarea"));</script>
                    <table class="show_de">
                        <tr>
                            <th>住所</th>
                            <td>' . $vZip . '<br />' . $vPrefName . '<br />' . $vAddr . '</td>
                        </tr>
                        <tr>
                            <th>担当者名</th>
                            <td>' . $vCharge . '&nbsp;</td>
                        </tr>
                        <tr>
                            <th>電話番号</th>
                            <td>' . $vTel . '</td>
                        </tr>
                        <tr>
                            <th>ＦＡＸ番号</th>
                            <td>' . $vFax . '</td>
                        </tr>
                        <tr>
                            <th>E-Mailアドレス</th>
                            <td class="readmore">';
				$rs_html .= ($vMail != "") ? $vMail : '&nbsp;';
				$rs_html .= '</td>
                        </tr>
                        <tr>
                            <th>貴所ＨＰアドレス</th>
                            <td class="readmore">';
				$rs_html .= ($vUrl <> "") ? '<a href="' . $vUrl . '" target="_blank">' . $vUrl . '</a>' : '&nbsp;';
				$rs_html .= '</td>
                        </tr>
                        <tr>
                            <th>所有資格</th>
                            <td>' . $vLicense . '</td>
                        </tr>
                        <tr>
                            <th>対応可能製品</th>
                            <td>' . $vProducts . '</td>
                        </tr>
                        <tr>
                            <th>対応可能エリア</th>
                            <td>';
				$rs_html .= ($vSupportPref <> "") ? $vSupportPref : $vPrefName;
				$rs_html .= '</td>
                        </tr>
                        <tr>
                            <th>貴所ＰＲ</th>
                            <td>' . $vComment . '&nbsp;</td>
                        </tr>
                    </table>';
				break;

			case SOSP:
			case SOUP:
				$COL_CHARGE    = 3; // 担当者名
				$COL_OPEN_MAIL = 4; // EMAIL

				if ($numPage == 2) {
					$dirName   = 'sosp';
					$COL_DEMO  = 11;
					$COL_VISIT = 12;

					$vDemo  = ($arrLine[$COL_DEMO] == 1) ? "有り" : (($arrLine[$COL_DEMO] == 2) ? "―" : $arrLine[$COL_DEMO]);
					$vVisit = ($arrLine[$COL_VISIT] == 1) ? "対応有り" : (($arrLine[$COL_VISIT] == 2) ? "―" : $arrLine[$COL_VISIT]);

					$table = '  <tr>
                                    <th>デモスペース</th>
                                    <td>' . $vDemo . '</td>
                                </tr>
                                <tr>
                                    <th>訪問による導入支援<br/>（別途有償）</th>
                                    <td>' . $vVisit . '</td>
                                </tr>';
				} else {
					$dirName = 'soup';
					$COL_SOI_PRODUCTS = 11;
					$COL_AREAS        = 12;
					$vSoi_products  = $arrLine[$COL_SOI_PRODUCTS];
					$vAreas         = $arrLine[$COL_AREAS];

					$table = '  <tr>
                                    <th>在籍SOI<br/><span class="font70">（ソリマチ認定インストラクター）</span></th>
                                    <td>' . $vSoi_products . '</td>
                                </tr>
                                <tr>
                                    <th>対応可能地域</th>
                                    <td>' . $vAreas . '</td>
                                </tr>';
				}

				$COL_SBM       = 13; // SBM
				$COL_URL       = 14; // URL
				$COL_COMMENT   = 15; // コメント
				$COL_SHOW_WEB  = 16; // URL表示
				$COL_IMAGE     = 17; // 会社イメージ画像

				$vCustomerCode = $arrLine[$COL_CUSTOMERCODE];                           // 顧客コード
				$vOffice       = $arrLine[$COL_OFFICE];                                 // 会社名
				$vCharge       = $arrLine[$COL_CHARGE];                                 // 担当者名
				$vEmail        = ($arrLine[$COL_OPEN_MAIL] == 0 || $arrLine[$COL_OPEN_MAIL] == "false") ? '<tr><th>E-Mail</th><td>' . $arrLine[$COL_MAIL] . '</td></tr>' : '';
				$vZip          = $arrLine[$COL_ZIP];                                    // 郵便番号
				$vPrefName     = getPrefNameJIS($arrLine[$COL_PREF]);                   // 都道府県
				$vAddr         = $arrLine[$COL_ADDR];                                   // 所在地
				$vTel          = $arrLine[$COL_TEL];                                    // TEL
				$vFax          = ($arrLine[$COL_FAX] == '-') ? '' : $arrLine[$COL_FAX]; // FAX
				$vSbm          = ($arrLine[$COL_SBM] == 1) ? "ソリマチブランドマスター" : '';   // SBM
				$vShow_web     = $arrLine[$COL_SHOW_WEB];                               // URL表示
				$vImage        = $arrLine[$COL_IMAGE];                                  // 会社イメージ画像

				// URL
				$vUrl = "";
				if ($vShow_web == "true" || $vShow_web == 1) {
					$vUrl = $this->proccessDataURL(trim($arrLine[$COL_URL]));
				}

				// コメント
				$vComment = '';
				if (trim($arrLine[$COL_COMMENT]) != "") {
					$vComment = "<div style='font-weight:bold'>【 担当者からのひとこと 】</div><textarea style='width:100%!important;' readonly='readonly'>" . htmlspecialchars($arrLine[$COL_COMMENT]) . "</textarea>";
				}

				// 会社イメージ画像
				$flag_img = 0;
				$vImageURL = "/assets/images/uploads/profile/images_layout/bms.gif";
				$vImageAlt = "No Image";
				$vImageSize[0] = 145;
				$vImageSize[1] = 46;

				if ($vImage != 0) {
					$path_thumbnail =  __DIR__ . "/../../../public" . "/assets/images/uploads/profile/images_{$dirName}/thumbnail/";
					$fp_thumbnail = opendir($path_thumbnail);
					while ($file = readdir($fp_thumbnail)) {
						if (is_file($path_thumbnail . $file)) {
							$pos = strpos($file, $vCustomerCode);
							if ($pos !== false) {
								$flag_img = 1;
								$vImageURL = "/assets/images/uploads/profile/images_{$dirName}/thumbnail/{$vCustomerCode}.jpg";
								$vImageAlt = "{$vOffice}様のご紹介";
								$vImageSize[1] = 145;
								break;
							}
						}
					}
				}

				// HTML
				$rs_html .= ($vSbm !== '') ? '<h4 id="company_name">' . $vSbm . '<br/><span class="mt10 font140">' . $vOffice . '</span></h4>' : '<h4 id="company_name" class="font140">' . $vOffice . '</span></h4>';
				$rs_html .= '<p class="show_img center">' . (($flag_img == 1) ? '<img src="' . $vImageURL . '" alt="' . $vImageAlt . '" width="' . $vImageSize[0] . '"><br/>' : '');
				if ($vSbm == 'ソリマチ ブランドマスター') {
					$rs_html .= '<img' . (($flag_img == 1) ? ' class="mt10"' : '') . ' src="/assets/images/uploads/profile/images_layout/bms.gif" alt="SBM（ソリマチ ブランドマスター)" width="145">';
				} else {
					$rs_html .= '<img' . (($flag_img == 1) ? ' class="mt10"' : '') . ' src="/assets/images/uploads/profile/images_layout/title_' . $dirName . '.jpg" alt="' . $dirName . '資料請求" width="145">';
				}

				$rs_html .= '</p>
                    <script src="/assets/js/search_form/autosize.js"></script>
                    <script>autosize(document.querySelectorAll("textarea"));</script>
                    <table class="show_de">
                        <tr>
                            <th>住所</th>
                            <td>' . $vZip . '<br />' . $vPrefName . '<br />' . $vAddr . '</td>
                        </tr>
                        <tr>
                            <th>電話番号</th>
                            <td>' . $vTel . '</td>
                        </tr>
                        <tr>
                            <th>FAX番号</th>
                            <td>' . $vFax . '</td>
                        </tr>
                        <tr>
                            <th>URL</th>
                            <td class="readmore">';
				$rs_html .= ($vUrl <> "") ? '<a href="' . $vUrl . '" target="_blank">' . $vUrl . '</a>' : "";
				$rs_html .= '</td>
                        </tr>
                        <tr>
                            <th>担当者名</th>
                            <td>' . $vCharge . '&nbsp;</td>
                        </tr>' . $vEmail . $table .
					'<tr>
                            <th>PR</th>
                            <td>' . $vComment . '&nbsp;</td>
                        </tr>
                    </table>';
				break;
		}
		return $rs_html;
	}

	// URL取得
	public function proccessDataURL($vUrl)
	{
		$oUrl    = $vUrl;
		$len     = mb_strlen($vUrl, 'UTF-8');
		$str_asc = '';
		for ($i = 0; $i <= $len; $i++) {
			for ($j = $i; $j <= $len; $j++) {
				$key = mb_substr($vUrl, $j, 1, 'UTF-8');
				if (preg_match('/[\x{4E00}-\x{9FBF}\x{3040}-\x{309F}\x{30A0}-\x{30FF}]/u', $key) > 0) {
					$str_asc .= ($j - $i == 1) ? $key : ", " . $key;
					$i = $j;
				}
			}
		}

		if ($str_asc != '') {
			$test    = explode(", ", $str_asc);
			$arr_asc = array_map('trim', $test);
			foreach ($arr_asc as $key => $value) {
				if (mb_strlen(strstr($vUrl, $value)) > 0) {
					$vUrl = str_replace($value, idn_to_ascii($value), $vUrl);
					break;
				}
			}

			$f = fopen($vUrl, "r");
			$r = fread($f, 1000);
			fclose($f);
			return (strlen($r) > 1) ? $oUrl : "";
		} else {
			$curlInit = curl_init($vUrl);
			curl_setopt($curlInit, CURLOPT_CONNECTTIMEOUT, 10);
			curl_setopt($curlInit, CURLOPT_HEADER, true);
			curl_setopt($curlInit, CURLOPT_NOBODY, true);
			curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);

			// レスポンス
			$response = curl_exec($curlInit);
			curl_close($curlInit);
			return ($response) ? $vUrl : "";
		}
	}

	// 会員かチェック
	public function checkMember($strId, $member_code)
	{
		return (strpos($strId, $member_code) !== false) ? 1 : 0;
	}

	// ID取得
	public function getInfosID($numPage = 1)
	{
		switch ($numPage) {
			case SAAG:
				$nameCol = "saag_id";
				$table = "infos_saag";
				break;
			case SOSP:
				$nameCol = "sosp_id";
				$table = "infos_sosp";
				break;
			case SOUP:
				$nameCol = "soup_id";
				$table = "infos_soup";
				break;
		}

		// $conn   = ConnectPartner();
		$query  = "SELECT {$nameCol} FROM {$table}";
		// $result = mysqli_query($conn, $query);
		$result = User::getQuery($query, true, false);

		$i      = 0;
		$strId  = "";
		foreach ($result as $row) {
			$strId = ($i == 0) ? trim($row[$nameCol]) : $strId . ',' . trim($row[$nameCol]);
			$i++;
		}
		// while ($row = mysqli_fetch_assoc($result)) {
		// }
		return $strId;
	}
}
