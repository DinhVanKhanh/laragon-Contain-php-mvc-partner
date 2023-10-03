<?php

use \App\Models\User;
use \App\Models\TFP;

// use Core\Model;
// use PDO;

// require_once __DIR__ . "/../../handle/core-mail.php";
require_once __DIR__ . "/../../../../../common_files/smtp_mail.php";

// // フラグ
function checkFlag($flag)
{
	return ($flag == 1 || $flag == '1') ? "●" : '';
}

// 掲載形式
function checkType($type)
{
	return ($type == 1 || $type == '1') ? "詳細" : '簡易';
}

// 一覧表示
function loadList($pro_id)
{
	// $conn = ConnectPartner();
	$data = "<table id='tblResult' class='show_ban display dataTable pt10' width='100%' data-order='[[ 0, \"asc\" ]]'>";
	$sql = 'SELECT * FROM %s';
	$title = '';

	switch ($pro_id) {
		case SAAG:
			$sql   = sprintf($sql, 'infos_saag');
			$title = '
                    <th class="w10">SAAG-ID</th>
                    <th class="w11">都道府県</th>
                    <th class="">掲載事務所名</th>
                    <th class="w7">WEB</br>掲載</th>
                    <th class="w10">掲載</br>形式</th>
                    <th class="w9">みんなの</br>税務相談</th>
                    <th class="w7">写真</th>';
			break;

		case SOSP:
			$sql   = sprintf($sql, 'infos_sosp');
			$title = '
                    <th class="w10">SOSP-ID</th>
                    <th class="w11">都道府県</th>
                    <th class="">会社名</th>
                    <th class="w7">WEB</br>掲載</th>
                    <th class="w7">写真</th>
                    <th class="w7">SBM</th>';
			break;

		case SOUP:
			$sql   = sprintf($sql, 'infos_soup');
			$title = '
                    <th class="w10">SOUP-ID</th>
                    <th class="w11">都道府県</th>
                    <th class="">会社名</th>
                    <th class="w7">WEB</br>掲載</th>
                    <th class="w7">写真</th>
                    <th class="w7">SBM</th>';
			break;
	}

	$data .= "
            <thead>
                <tr>
                    <th class='w5'>ID</th>
                    <th class='w7'>操作</th>
                    {$title}
                    <th class='w15'>最終更新日</th>
                </tr>
            </thead>
            <tbody>";

	// SQL実施
	// $result = mysqli_query($conn, $sql);
	$result = User::getQuery($sql, true, false);
	foreach ($result as $row) {
		$id = $row["id"];
		$query = "SELECT pref_name FROM prefectures WHERE pref_code='" . $row["pref_code"] . "'";
		// $prefname = getRow($conn, $query);
		$prefname = User::getQuery($query, false, false);

		$modified = date_create($row["modified"]);
		$main_id = ($pro_id == SOSP) ? $row['sosp_id'] : (($pro_id == SOUP) ? $row['soup_id'] : $row["saag_id"]);
		$data .= '<tr><td class="center">' . $id . '</td><td class="center areaBtn" style="width:10%!important;">';

		switch ($pro_id) {
			case SAAG:
				$data .= "
                                <button name='btnConfirmDel' onclick='deleteData(this.id, {$pro_id});' class='btnDel btnConfirmDel btnFancyDelClose' id='{$main_id}' value='{$main_id}' href='#confirmBox'>削除</button>
                                <button name='btnEdit' onclick='openDialog(this.id, true, {$pro_id})' class='btnEdit fancybox3' id='{$main_id}' value='{$main_id}' href='#inline0'>修正</button>
                            </td>
                            <td class='center areaCode'>{$main_id}</td>
                            <td class='areaName center'>" . $prefname['pref_name'] . "</td>
                            <td class='areaName'>" . $row["company_name"] . '</td>
                            <td class="center areaName">' . checkFlag($row['show_web']) . '</td>
                            <td class="center areaName">' . checkType($row['info_type']) . '</td>
                            <td class="center areaName">' . checkFlag($row['campaign1']) . '</td>
                            <td class="center areaName">' . checkFlag($row['photo']) . '</td>';
				break;

			case SOSP:
			case SOUP:
				$data .= "
                                <button name='btnConfirmDel' onclick='deleteData(this.id, {$pro_id});' class='btnDel btnConfirmDel btnFancyDelClose' id='{$main_id}' value='{$main_id}' href='#confirmBox'>削除</button>
                                <button name='btnEdit' onclick='openDialog(this.id, true, {$pro_id})' class='btnEdit fancybox3' id='{$main_id}' value='{$main_id}' href='#inline0'>修正</button>
                            </td>
                            <td class='center areaCode'>{$main_id}</td>
                            <td class='areaName center'>" . $prefname['pref_name'] . "</td>
                            <td class='reaName'>" . $row['company_name'] . '</td>
                            <td class="center areaName">' . checkFlag($row['show_web']) . '</td>
                            <td class="center areaName">' . checkFlag($row['photo']) . '</td>
                            <td class="center areaName">' . checkFlag($row['sbm_flag']) . '</td>';
				break;
		}
		$data .= '  <td class="center areaName">' . date_format($modified, "Y/m/d H:i") . '</td></tr>';
	}
	// while ($row = mysqli_fetch_assoc($result)) {

	// }
	$data .= '</tbody></table>';

	$html = HTMLEdit($pro_id);
	$arr["listdata"] = $data;
	$arr["success"]  = true;
	$arr['HTML']  = $html[0];
	$arr['input'] = $html[1];
	$arr['numPage'] = $pro_id;

	// mysqli_free_result($result);
	// mysqli_close($conn);
	return $arr;
}

// IDに該当するデータを取得
function loadById($pro_id, $main_id)
{
	// $conn = ConnectPartner();
	$arr_infos[] = $areaOption = $arr_photo = '';

	$table = ($pro_id == SOSP) ? 'sosp' : (($pro_id == SOUP) ? 'soup' : 'saag');
	$sql = "SELECT * FROM infos_{$table} WHERE {$table}_id = '{$main_id}'";
	// $row = getRow($conn, $sql);
	$row = User::getQuery($sql, false, false);

	if ($row !== false) {
		$arr_infos["{$table}_id"]  = $row["{$table}_id"];
		$arr_infos['show_web']     = $row['show_web'];
		$arr_infos['company_name'] = $row['company_name'];
		$arr_infos['contact']      = $row['contact'];
		$arr_infos['zip_code']     = $row['zip_code'];
		$arr_infos['pref_code']    = $row['pref_code'];
		$arr_infos['address']      = $row['address'];
		$arr_infos['tel']          = $row['tel'];
		$arr_infos['fax']          = $row['fax'];
		$arr_infos['Email']        = $row['Email'];
		$arr_infos['URL']          = $row['URL'];
		$arr_infos['comment']      = $row['comments'];
		$arr_infos['photo']        = $row['photo'];

		$path = "/assets/images/uploads/profile/images_{$table}/";
		$arr_photo = loadPhoto($arr_infos['photo'], $path, $pro_id, $main_id);

		switch ($pro_id) {
			case SAAG:
				$arr_infos['info_type']      = $row['info_type'];
				$arr_infos['member_name']    = $row['member_name'];
				$arr_infos['products']       = preg_replace('/, /', ',', preg_replace('/ /', '', preg_replace('/\s\s+/', '　', trim($row['products']))));
				$arr_infos['campaign1']      = $row['campaign1'];
				$arr_infos['areas']          = $row['areas'];
				$arr_infos['qualifications'] = preg_replace('/, /', ',', preg_replace('/ /', '', preg_replace('/\s\s+/', '　', trim($row['qualifications']))));
				$arr_infos['customer_code']  = $row['customer_code'];
				break;

			case SOSP:
				$arr_infos['sbm_flag']    = $row['sbm_flag'];
				$arr_infos['Email_open']  = $row['Email_open'];
				$arr_infos['demospace']   = $row['demospace'];
				$arr_infos['visit_guide'] = $row['visit_guide'];
				break;

			case SOUP:
				$arr_infos['sbm_flag']     = $row['sbm_flag'];
				$arr_infos['Email_open']   = $row['Email_open'];
				$arr_infos['school_flag']  = $row['school_flag'];
				$arr_infos['areas']        = $row['areas'];
				$arr_infos['soi_products'] = $row['soi_products'];
				break;
		}
	}

	// 都道府県リスト
	$areaOption = listArea($row['pref_code']);
	return [$arr_infos, $areaOption, $arr_photo];
}

// IDに該当するデータを一覧に表示
function loadListById($pro_id)
{
	// チェック
	if (empty($_POST["id"])) {
		return 'IDの取得に失敗しました。';
	}

	$id = trim($_POST["id"]);
	$arrInfo = loadById($pro_id, $id);
	$table = ($pro_id == SOSP) ? 'sosp' : (($pro_id == SOUP) ? 'soup' : 'saag');

	$arr['success'] = true;
	$arr["{$table}"] = $arrInfo[0];
	$arr["areaOption"] = $arrInfo[1];
	$arr["photo"] = $arrInfo[2];
	return $arr;
}

// 削除処理
function deleteData($pro_id, $main_id)
{
	// チェック
	if ($main_id == '') {
		return 'IDの取得に失敗しました。';
	}

	// サムネイル
	$table = ($pro_id == SOSP) ? 'sosp' : (($pro_id == SOUP) ? 'soup' : 'saag');
	$path = __DIR__ . "/../../../public" . "/assets/images/uploads/profile/images_{$table}/";

	// Temp
	$file_temp = $path . 'temp/' . $main_id . ".jpg";
	if (file_exists($file_temp)) {
		unlink($file_temp);
	}

	// Thumbnail
	$file_thumbnail = $path . 'thumbnail/' . $main_id . ".jpg";
	if (file_exists($file_thumbnail)) {
		unlink($file_thumbnail);
	}

	// 削除
	// $conn = ConnectPartner();
	// mysqli_query($conn, "DELETE FROM infos_{$table} WHERE {$table}_id='{$main_id}'");
	// mysqli_query($conn, "DELETE FROM img_{$table} WHERE {$table}_id='{$main_id}'");
	// mysqli_query($conn, "DELETE FROM id_{$table} WHERE {$table}_id='{$main_id}' OR {$table}_id_old1='{$main_id}' OR {$table}_id_old2='{$main_id}'");
	User::prepareQuery("DELETE FROM infos_{$table} WHERE {$table}_id='{$main_id}'");
	User::prepareQuery("DELETE FROM img_{$table} WHERE {$table}_id='{$main_id}'");
	User::prepareQuery("DELETE FROM id_{$table} WHERE {$table}_id='{$main_id}' OR {$table}_id_old1='{$main_id}' OR {$table}_id_old2='{$main_id}'");
	// mysqli_close($conn);

	$result['success'] = true;
	$result['page'] = $pro_id;
	return $result;
}

//Dinh Van Khanh
function checkID($oldID, $newID, $numPage)
{
	$result["success"] = true;
	$result["error"] = "";
	$user_cd = "";
	$table = ($numPage == SOSP) ? 'sosp' : (($numPage == SOUP) ? 'soup' : 'saag');

	switch ($numPage) {
		case '1':
			$typePage = "saag";
			break;
		case '2':
			$typePage = "sosp";
			break;
		case '3':
			$typePage = "soup";
			break;
		default:
			break;
	}
	$newID = preg_replace("/-/", "", $newID);

	//check similar oldID and newID
	if ($oldID == $newID) {
		// $result["error"] = "2 ID khong duoc trung nhau";
		// $result["error"] = "現在のパートナー会員IDと新しいのパートナー会員IDは重複しません";
		$result["error"] = "パートナー会員IDが変更されていません。新しいパートナー会員IDをご確認ください。";
		return $result;
	}

	$ValueUserSub = TFP::getValueUserSub($typePage);
	$result["error"] = checkNot12($newID, $user_cd, $ValueUserSub);

	if (!empty($result["error"]))
		return $result;

	$result["data"]["user_cd"] = $user_cd;
	$queryFindInfoID = "SELECT * FROM infos_{$table} WHERE {$table}_id = '$newID'";
	$result["error"] = User::getQuery($queryFindInfoID, false, true);

	if ($result["error"] >= 1) {
		// $result["error"] = "database đã có ID này";
		$result["error"] = "「新しいパートナー会員ID」は、すでにパートナー検索に登録されています。";
		return $result;
	}

	Result:
	return $result;
}

function updateDatabaseFromID($oldID, $newID, $numPage)
{
	$result['error'] = "";
	$table = ($numPage == SOSP) ? 'sosp' : (($numPage == SOUP) ? 'soup' : 'saag');
	$flag_old_file = false;
	$newID = preg_replace("/-/", "", $newID);
	try {
		//rename jpg in file temp
		$path = '/assets/images/uploads/profile/images_' . (($numPage == SOSP) ? 'sosp/' : (($numPage == SOUP) ? 'soup/' : 'saag/'));
		$upload = __DIR__ . '/../../../public' . $path . "thumbnail/";
		if (!file_exists($upload)) {
			mkdir($upload);
		}
		$old_file = $upload . $oldID . ".jpg";
		$new_file = $upload . $newID . ".jpg";
		if (file_exists($old_file)) {
			rename($old_file, $new_file);
			$flag_old_file = true;
		}

		//rename jpg in file temp
		$upload_temp = __DIR__ . '/../../../public' . $path . "temp/";
		if (!file_exists($upload_temp)) {
			mkdir($upload_temp);
		}
		$old_file_temp = $upload_temp . $oldID . ".jpg";
		$new_file_temp = $upload_temp . $newID . ".jpg";
		if (file_exists($old_file_temp)) {
			rename($old_file_temp, $new_file_temp);
		}

		// $this->conn->beginTransaction();
		$newImg = $newID . ".jpg";
		$formatNowDate = date("Y/m/d H:i:s", strtotime("now"));

		$updateInfos = User::prepareQuery("UPDATE infos_{$table}
										 	SET {$table}_id='{$newID}', customer_code ='{$newID}', {$table}_id_mfd = '{$formatNowDate}', customer_code_mfd = '{$formatNowDate}', modified = '{$formatNowDate}'
										 	WHERE {$table}_id='{$oldID}'");
		// $updateId = User::prepareQuery("UPDATE id_{$table} SET {$table}_id='{$newID}' WHERE {$table}_id='{$oldID}'");
		if ($flag_old_file) {
			$updateImg = User::prepareQuery("UPDATE img_{$table} SET {$table}_id='{$newID}', img_name = '{$newImg}' WHERE {$table}_id='{$oldID}'");
		}
	} catch (PDOException $e) {
		$result['error'] = '更新失敗';
		return $result;
	} catch (Exception $e) {
		$result['error'] = $e->getMessage();
		return $result;
	}
	return $result;
}
//Dinh Van Khanh

function checkNot12($newID, &$user_cd, $ValueUserSub = [])
{
	$error = "";

	$json_user_sub_val = TFP::jsonNot12($newID, $ValueUserSub['value_not_12']);
	$user_sub_val = TFP::GetAPIData("user_sub", $json_user_sub_val, "GET");
	$count = (int)TFP::GetFirstByField($user_sub_val, "count");
	if ($count == 0) {
		// $error = "ID cu khong ton tai trong API";
		$error = "「新しいパートナー会員ID」が、ホスト(TFP)に登録されていません。登録されていないIDに変更することはできません。";
		return $error;
	}

	$user_cd = TFP::GetFirstByField($user_sub_val["user_sub"][0], "user_cd");

	return $error;
}

function compareOldAndNew($newID, $user = [])
{
	$error = "";
	$user_cd = TFP::GetFirstByField($user["user_sub"][0], "user_cd");
	$user_sub_val = TFP::GetFirstByField($user["user_sub"][0], "user_sub_val");

	if (!in_array($newID, [$user_cd, $user_sub_val])) {
		// $error = "ID moi khong trung voi ID cu trong API";
		$error = "新しいのパートナー会員IDはTFPのSAAG-IDに現在のパートナー会員IDと違います。";
		return $error;
	}
	return $error;
}
//Dinh Van Khanh

function HTMLEdit($numPage)
{
	$html = $input = '';
	switch ($numPage) {
		case SAAG:
			$html .= "<p class=\"Title\"><span>SAAG会員の登録情報を修正します。</span></p>
                        <div class=\"frmSection\">                      
                            <div class=\"show_parent\">
                                <table cellspacing=\"2\" cellpadding=\"0\" border=\"0\">                              
                                    <tr>
                                        <th rowspan=\"\" class=\"list_g1n w25\"><span style=\"color:red\">パートナー会員ID</span</th>
                                        <td rowspan=\"\" class=\"list_g1\" id=\"Id\"></td>                                    
                                    </tr>
                                    <tr>
                                        <th class=\"list_g1n\">希望掲載形式</th>
                                        <td class=\"list_g1w\">
                                            <input type=\"radio\" name=\"InfoType\" value=\"1\" id=\"InfoType1\" checked=\"\">詳細形式　
                                            <input type=\"radio\" name=\"InfoType\" value=\"2\" id=\"InfoType2\">簡易リスト形式<br/>
                                            <p class=\"caution_text clear\">くわしくは [ <a href=\"javascript:OpenWinInfotype();\">こちら</a> ] をご参照ください</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class=\"list_g1n\">対応可能サービス</th>
                                        <td colspan=\"2\" class=\"list_g1w\"><input type=\"checkbox\" name=\"campaign\" id=\"campaign\" value=\"1\">みんなの税務相談</td>
                                    </tr>
                                    <tr>
                                        <th class=\"list_g1n\">掲載事務所名<img class=\"show_pc\" src=\"/assets/images/uploads/profile/images_layout/hissu_12px.gif\" alt=\"必須項目\"><span class=\"caution_text clear show_sp\"><b>※</b></span></th>
                                        <td class=\"list_g1w\">
                                            <input type=\"text\" name=\"company_name\" id=\"company_name\" style=\"width:80%;\" maxlength=\"250\"><br/><p class=\"caution_text clear\">SAAG検索や冊子にはこちらのお名前で掲載いたします。
                                            <br/><font class=\"error_blue error_inline0\" style=\"visibility:visible;\"></font></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class=\"list_g1n\">所長名<img id=\"essentials3a\" class=\"show_pc\" src=\"/assets/images/uploads/profile/images_layout/hissu_12px.gif\" alt=\"必須項目\"><span id=\"essentials3\" class=\"caution_text clear show_sp\" style=\"visibility:visible\"><b>※</b></span></th>
                                        <td class=\"list_g1w\">
                                            <input type=\"text\" name=\"member_name\" id=\"member_name\" style=\"width:80%;\" maxlength=\"250\">
                                            <br/><font class=\"error_blue error_inline1\" style=\"visibility:visible;\"></font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class=\"list_g1n\">担当者名<img id=\"essentials4a\" class=\"show_pc\" src=\"/assets/images/uploads/profile/images_layout/hissu_12px.gif\" alt=\"必須項目\"><span id=\"essentials4\" class=\"caution_text clear show_sp\" style=\"visibility:visible\"><b>※</b></span></th>
                                        <td class=\"list_g1w\">
                                            <input type=\"text\" name=\"contact\" id=\"contact\" style=\"width:80%\" maxlength=\"250\">
                                            <br/><font class=\"error_blue error_inline2\" style=\"visibility:visible;\"></font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th nowrap class=\"list_g1n\">貴所または担当者<br/>のE-Mailアドレス<img class=\"show_pc\" src=\"/assets/images/uploads/profile/images_layout/hissu_12px.gif\" alt=\"必須項目\"><span class=\"caution_text clear show_sp\" id=\"essentials5\" style=\"visibility:visible;\"><b>※</b></span></th>
                                        <td class=\"list_g1w\">
                                            <div style=\"margin-bottom:5px\">
                                                <input type=\"text\" id=\"Mail1\" name=\"Mail1\" style=\"width:80%\">
                                                <span class=\"caution_text clear\">（半角）</span>
                                            </div>
                                            <div style=\"margin-bottom:5px\">
                                                <input type=\"text\" id=\"Mail2\" name=\"Mail2\" style=\"width:80%\">
                                                <span class=\"caution_text clear\">（確認用）</span>
                                            </div>
                                            <p class=\"caution_text clear\">確認用E-Mailアドレスはコピー＆ペーストはせず、必ず手入力をしてください。</p>
                                            <br/><font class=\"error_blue error_inline3\" style=\"visibility:visible;\"></font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class=\"list_g1n\" rowspan=\"3\">住所<img class=\"show_pc\" src=\"/assets/images/uploads/profile/images_layout/hissu_12px.gif\" alt=\"必須項目\"><span id=\"essentials6\" class=\"caution_text clear show_sp\" style=\"visibility:visible\"><b>※</b></span></th>
                                        <td class=\"list_g1w\">〒
                                            <input id=\"Zip1\" name=\"Zip1\" type=\"text\" style=\"width:25%\" size=\"3\" maxlength=\"3\"> -
                                            <input id=\"Zip2\" name=\"Zip2\" type=\"text\" style=\"width:25%\" size=\"4\" maxlength=\"4\">
                                            <span class=\"caution_text clear\">（半角）</span>
                                            <br/><font class=\"error_blue error_inline4\" style=\"visibility:visible;\"></font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class=\"list_g1w\"><select id=\"pref_code\" name=\"pref_code\" style=\"width:60%\"></select></td>
                                    </tr>
                                    <tr>
                                        <td colspan=\"2\" class=\"list_g1w\">
                                            <textarea id=\"Address\" name=\"Address\" maxlength=\"\" rows=\"3\" style=\"overflow:hidden; width:100% !important; overflow-wrap:break-word;\"></textarea>
                                            <br/><font class=\"error_blue error_inline5\" style=\"visibility:visible;\"></font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class=\"list_g1n\">電話番号<img class=\"show_pc\" src=\"/assets/images/uploads/profile/images_layout/hissu_12px.gif\" alt=\"必須項目\"><span id=\"essentials7\" class=\"caution_text clear show_sp\" style=\"visibility:visible\"><b>※</b></span></th>
                                        <td colspan=\"2\" class=\"list_g1w\">
                                            <input type=\"text\" id=\"Tel1\" name=\"Tel1\" size=\"6\" maxlength=\"5\" style=\"width:25%\"> -
                                            <input type=\"text\" id=\"Tel2\" name=\"Tel2\" size=\"6\" maxlength=\"4\" style=\"width:25%\"> -
                                            <input type=\"text\" id=\"Tel3\" name=\"Tel3\" size=\"6\" maxlength=\"4\" style=\"width:25%\">
                                            <span class=\"caution_text clear\">（半角）</span>
                                            <br/><font class=\"error_blue error_inline6\" style=\"visibility:visible;\"></font>
                                       </td>
                                    </tr>
                                    <tr>
                                        <th class=\"list_g1n\">ＦＡＸ番号<span id=\"essentials8\" class=\"caution_text clear show_sp\" style=\"visibility:hidden\">※</span></th>
                                        <td colspan=\"2\" class=\"list_g1w\">
                                            <input type=\"text\" id=\"Fax1\" name=\"Fax1\" size=\"6\" maxlength=\"5\" style=\"width:25%\"> -
                                            <input type=\"text\" id=\"Fax2\" name=\"Fax2\" size=\"6\" maxlength=\"4\" style=\"width:25%\"> -
                                            <input type=\"text\" id=\"Fax3\" name=\"Fax3\" size=\"6\" maxlength=\"4\" style=\"width:25%\">
                                            <span class=\"caution_text clear\">（半角）</span>
                                        </td>
                                     </tr>
                                     <tr>
                                        <th class=\"list_g1n\">貴所ＨＰアドレス</th>
                                        <td colspan=\"2\" class=\"list_g1w\">
                                            <input type=\"text\" id=\"URL\" name=\"URL\" style=\"width:80%\" maxlength=\"100\"><br/>
                                            <p class=\"caution_text clear\">必ず「http://」の部分から記載してください。</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class=\"list_g1n\">所有資格<img id=\"essentials10a\" class=\"show_pc\" src=\"/assets/images/uploads/profile/images_layout/hissu_12px.gif\" alt=\"必須項目\"><span class=\"caution_text clear show_sp\" id=\"essentials10\" style=\"visibility:visible;\"><b>※</b></span></th>
                                        <td colspan=\"2\" class=\"list_g1w\">
                                            <input type=\"checkbox\" id=\"OfficeQua1\" name=\"OfficeQualification\" value=\"税理士\">税理士
                                            <input type=\"checkbox\" id=\"OfficeQua2\" name=\"OfficeQualification\" value=\"公認会計士\">公認会計士
                                            <input type=\"checkbox\" id=\"OfficeQua3\" name=\"OfficeQualification\" value=\"社会保険労務士\">社会保険労務士
                                            <input type=\"checkbox\" id=\"OfficeQua4\" name=\"OfficeQualification\" value=\"中小企業診断士\">中小企業診断士
                                            <input type=\"checkbox\" id=\"OfficeQua5\" name=\"OfficeQualification\" value=\"不動産鑑定士\">不動産鑑定士
                                            <input type=\"checkbox\" id=\"OfficeQua6\" name=\"OfficeQualification\" value=\"行政書士\">行政書士
                                            <input type=\"checkbox\" id=\"OfficeQua7\" name=\"OfficeQualification\" value=\"司法書士\">司法書士
                                            <input type=\"checkbox\" id=\"OfficeQua8\" name=\"OfficeQualification\" value=\"弁護士\">弁護士
                                            <input type=\"checkbox\" id=\"OfficeQua9\" name=\"OfficeQualification\" value=\"弁理士\">弁理士
                                            <input type=\"checkbox\" id=\"OfficeQua10\" name=\"OfficeQualification\" value=\"ＩＴコーディネータ\">ＩＴコーディネータ<br/>
                                            &nbsp;その他資格 <input type=\"text\" id=\"OfficeQualificationOther\" name=\"OfficeQualificationOther\" style=\"width:80%\" maxlength=\"100\">
                                            <br/><font class=\"error_blue error_inline7\" style=\"visibility:visible;\"></font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class=\"list_g1n\">対応可能製品<img id=\"essentials11a\" class=\"show_pc\" src=\"/assets/images/uploads/profile/images_layout/hissu_12px.gif\" alt=\"必須項目\"><span id=\"essentials11\" class=\"caution_text clear show_sp\" style=\"visibility:visible\"><b>※</b></span></th>
                                        <td colspan=\"2\" class=\"list_g1w\">
                                            <input type=\"checkbox\" id=\"OfficePro1\" name=\"OfficeProduct\" value=\"会計王\">会計王
                                            <input type=\"checkbox\" id=\"OfficePro2\" name=\"OfficeProduct\" value=\"会計王PRO\">会計王PRO
                                            <input type=\"checkbox\" id=\"OfficePro3\" name=\"OfficeProduct\" value=\"会計王NPO法人スタイル\">会計王NPO法人スタイル
                                            <input type=\"checkbox\" id=\"OfficePro4\" name=\"OfficeProduct\" value=\"会計王介護事業所スタイル\">会計王介護事業所スタイル
                                            <input type=\"checkbox\" id=\"OfficePro5\" name=\"OfficeProduct\" value=\"給料王\">給料王
                                            <input type=\"checkbox\" id=\"OfficePro6\" name=\"OfficeProduct\" value=\"販売王\">販売王<br/>
                                            その他 <input type=\"text\" id=\"OfficeProductOther\" name=\"OfficeProductOther\" style=\"width:350px\" maxlength=\"100\"><br/>
                                            <br/><font class=\"error_blue error_inline8\" style=\"visibility:visible;\"></font>
                                       </td>
                                    </tr>
                                    <tr>
                                        <th class=\"list_g1n\">WEBへの掲載</th>
                                        <td class=\"list_g1w\"><input type=\"checkbox\" id=\"show_web\" name=\"show_web\" value=\"1\">SAAG検索(WEB)に掲載する</td>
                                    </tr>
                                    <tr>
                                        <th class=\"list_g1n\">対応可能エリア
                                            <img id=\"essentials12a\" class=\"show_pc\" src=\"/assets/images/uploads/profile/images_layout/hissu_12px.gif\" alt=\"必須項目\">
                                            <span id=\"essentials12\" class=\"caution_text clear show_sp\" style=\"visibility:visible\"><b>※</b></span>
                                        </th>
                                        <td colspan=\"2\" class=\"list_g1w\">
                                            <font style=\" line-height:18px;\">
                                                <div style=\"margin-bottom:10px; padding-bottom:10px; border-bottom:1px #A0A0A0 dotted;\">
                                                    <input type=\"checkbox\" name=\"OfficeAreaAll\" id=\"OfficeAreaAll\" value=\"日本全国\">日本全国
                                                    <span id=\"error_inline11\" class=\"caution_text pl10\" style='display:none'>対応可能エリアは未入力です。</span>
                                                </div>
                                                <input type=\"checkbox\" id=\"area1\" name=\"area\" value=\"北海道\">北海道
                                                <input type=\"checkbox\" id=\"area2\" name=\"area\" value=\"青森県\">青森県
                                                <input type=\"checkbox\" id=\"area3\" name=\"area\" value=\"岩手県\">岩手県
                                                <input type=\"checkbox\" id=\"area4\" name=\"area\" value=\"宮城県\">宮城県
                                                <input type=\"checkbox\" id=\"area5\" name=\"area\" value=\"秋田県\">秋田県
                                                <input type=\"checkbox\" id=\"area6\" name=\"area\" value=\"山形県\">山形県
                                                <input type=\"checkbox\" id=\"area7\" name=\"area\" value=\"福島県\">福島県
                                                <input type=\"checkbox\" id=\"area8\" name=\"area\" value=\"茨城県\">茨城県<br/>
                                                <input type=\"checkbox\" id=\"area9\" name=\"area\" value=\"栃木県\">栃木県
                                                <input type=\"checkbox\" id=\"area10\" name=\"area\" value=\"群馬県\">群馬県
                                                <input type=\"checkbox\" id=\"area11\" name=\"area\" value=\"埼玉県\">埼玉県
                                                <input type=\"checkbox\" id=\"area12\" name=\"area\" value=\"千葉県\">千葉県
                                                <input type=\"checkbox\" id=\"area13\" name=\"area\" value=\"東京都\">東京都
                                                <input type=\"checkbox\" id=\"area14\" name=\"area\" value=\"神奈川県\">神奈川県
                                                <input type=\"checkbox\" id=\"area15\" name=\"area\" value=\"新潟県\">新潟県
                                                <input type=\"checkbox\" id=\"area16\" name=\"area\" value=\"富山県\">富山県<br/>
                                                <input type=\"checkbox\" id=\"area17\" name=\"area\" value=\"石川県\">石川県
                                                <input type=\"checkbox\" id=\"area18\" name=\"area\" value=\"福井県\">福井県
                                                <input type=\"checkbox\" id=\"area19\" name=\"area\" value=\"山梨県\">山梨県
                                                <input type=\"checkbox\" id=\"area20\" name=\"area\" value=\"長野県\">長野県
                                                <input type=\"checkbox\" id=\"area21\" name=\"area\" value=\"岐阜県\">岐阜県
                                                <input type=\"checkbox\" id=\"area22\" name=\"area\" value=\"静岡県\">静岡県
                                                <input type=\"checkbox\" id=\"area23\" name=\"area\" value=\"愛知県\">愛知県
                                                <input type=\"checkbox\" id=\"area24\" name=\"area\" value=\"三重県\">三重県<br/>
                                                <input type=\"checkbox\" id=\"area25\" name=\"area\" value=\"滋賀県\">滋賀県
                                                <input type=\"checkbox\" id=\"area26\" name=\"area\" value=\"京都府\">京都府
                                                <input type=\"checkbox\" id=\"area27\" name=\"area\" value=\"大阪府\">大阪府
                                                <input type=\"checkbox\" id=\"area28\" name=\"area\" value=\"兵庫県\">兵庫県
                                                <input type=\"checkbox\" id=\"area29\" name=\"area\" value=\"奈良県\">奈良県
                                                <input type=\"checkbox\" id=\"area30\" name=\"area\" value=\"和歌山県\">和歌山県
                                                <input type=\"checkbox\" id=\"area31\" name=\"area\" value=\"鳥取県\">鳥取県
                                                <input type=\"checkbox\" id=\"area32\" name=\"area\" value=\"島根県\">島根県<br/>
                                                <input type=\"checkbox\" id=\"area33\" name=\"area\" value=\"岡山県\">岡山県
                                                <input type=\"checkbox\" id=\"area34\" name=\"area\" value=\"広島県\">広島県
                                                <input type=\"checkbox\" id=\"area35\" name=\"area\" value=\"山口県\">山口県
                                                <input type=\"checkbox\" id=\"area36\" name=\"area\" value=\"徳島県\">徳島県
                                                <input type=\"checkbox\" id=\"area37\" name=\"area\" value=\"香川県\">香川県
                                                <input type=\"checkbox\" id=\"area38\" name=\"area\" value=\"愛媛県\">愛媛県
                                                <input type=\"checkbox\" id=\"area39\" name=\"area\" value=\"高知県\">高知県
                                                <input type=\"checkbox\" id=\"area40\" name=\"area\" value=\"福岡県\">福岡県<br/>
                                                <input type=\"checkbox\" id=\"area41\" name=\"area\" value=\"佐賀県\">佐賀県
                                                <input type=\"checkbox\" id=\"area42\" name=\"area\" value=\"長崎県\">長崎県
                                                <input type=\"checkbox\" id=\"area43\" name=\"area\" value=\"熊本県\">熊本県
                                                <input type=\"checkbox\" id=\"area44\" name=\"area\" value=\"大分県\">大分県
                                                <input type=\"checkbox\" id=\"area45\" name=\"area\" value=\"宮崎県\">宮崎県
                                                <input type=\"checkbox\" id=\"area46\" name=\"area\" value=\"鹿児島県\">鹿児島県
                                                <input type=\"checkbox\" id=\"area47\" name=\"area\" value=\"沖縄県\">沖縄県
                                            </font>
                                            <br/><font class=\"error_blue error_inline9\" style=\"visibility:visible;\"></font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th nowrap class=\"list_g1n\">貴所ＰＲ<img id=\"essentials13a\" class=\"show_pc\" src=\"/assets/images/uploads/profile/images_layout/hissu_12px.gif\" alt=\"必須項目\"><span id=\"essentials13\" class=\"caution_text clear show_sp\" style=\"visibility:visible\"><b>※</b></span><br/>（100文字以内）</th>
                                        <td colspan=\"2\" class=\"list_g1w\">
                                           <textarea id=\"comment\" name=\"comment\" rows=\"5\" style=\"width:97.5% !important;\" maxlength=\"200\" class=\"border\"></textarea>
                                           <br/><font class=\"error_blue error_inline10\" style=\"visibility:visible;\"></font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class=\"list_g1n\" style=\"height:20px;\">掲載写真データ</th>
                                        <td class=\"list_g1wc\"> 
                                            <table class=\"table_img\">
                                                <tr>
                                                    <td id=\"show_img\" class=\"w25\"></td>
                                                    <td>
                                                        <input type=\"hidden\" id=\"inputPdf\" width=\"100%\">
                                                        <input type=\"file\" id=\"ipPdf\" name=\"ipPdf\" style=\"display:none\" accept=\"application/images\" onchange=\"$('#inputPdf').val($(this).val());\">
                                                        <input type=\"button\" name=\"btnAdd_img\" class=\"btn btnAdd\" value=\"写真を更新する\" style=\"position:relative\" onclick=\"document.getElementById('ipPdf').click()\">
                                                        <input type=\"button\" name=\"btnDel_img\" class=\"btnDel\" value=\"写真を削除する\">
                                                        <p class=\"caution_text clear\">この画面の画像を変更するだけでは登録が完了しません。<br/>必ず下の「入力内容を確認する」ボタンから最終的な登録まですべて完了してください。</p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>";
			$input .= ' <input type="hidden" id="saag_id">
                            <input type="hidden" id="isEdit">
                            <input type="hidden" id="old_saag_id">
                            <input type="hidden" id="old_customer_code">
                            <input type="hidden" id="old_info_type">
                            <input type="hidden" id="old_campaign">
                            <input type="hidden" id="old_company_name">
                            <input type="hidden" id="old_member_name">
                            <input type="hidden" id="old_contact">
                            <input type="hidden" id="old_email">
                            <input type="hidden" id="old_zip_code">
                            <input type="hidden" id="old_pref_code">
                            <input type="hidden" id="old_address">
                            <input type="hidden" id="old_tel">
                            <input type="hidden" id="old_fax">
                            <input type="hidden" id="old_URL">
                            <input type="hidden" id="old_qualifications">
                            <input type="hidden" id="old_products">
                            <input type="hidden" id="old_show_web">
                            <input type="hidden" id="old_areas">
                            <input type="hidden" id="old_comment">
                            <input type="hidden" id="old_photo">
                            <input type="hidden" id="file_name">
                            <input type="hidden" id="edit_img">
                            <input type="hidden" id="del_img"> ';
			break;
		case SOSP:
			$html .= "  <p class=\"Title\"><span>SOSP会員の登録情報を修正します。</span></p>
                            <div class=\"frmSection\">                      
                                <div class=\"show_parent\">
                                    <table cellspacing=\"2\" cellpadding=\"0\" border=\"0\">                              
                                        <tr>
                                            <th rowspan=\"\" class=\"list_g1n w25\">SOSP会員ID</th>
                                            <td rowspan=\"\" class=\"list_g1\" id=\"Id\"></td>                                 
                                        </tr>
                                        <tr>
                                            <th class=\"list_g1n\">SBM確認</th>
                                            <td class=\"list_g1w\">
                                                <input type=\"checkbox\" name=\"sbm_flag\" value=\"1\" id = \"sbm_flag\">SBM（ソリマチブランドマスター）である。                                  
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class=\"list_g1n\">WEBへの掲載</th>
                                            <td class=\"list_g1w\">
                                                <input type=\"checkbox\" name=\"show_web\" value=\"1\" id=\"show_web\">SOSP検索(WEB)に掲載する。                                   
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class=\"list_g1n\">会社名<img class=\"show_pc\" src=\"/assets/images/uploads/profile/images_layout/hissu_12px.gif\" alt=\"必須項目\"><span class=\"caution_text clear show_sp\"><b>※</b></span></th>
                                            <td class=\"list_g1w\">
                                                <input type=\"text\" id=\"company_name\" name=\"company_name\" style=\"width:80%\" maxlength=\"150\">
                                                <p class=\"caution_text clear\"><font class=\"error_blue error_inline0\" style=\"visibility:visible;\"></font></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class=\"list_g1n\">ご担当者名<img id=\"essentials3a\" class=\"show_pc\" src=\"/assets/images/uploads/profile/images_layout/hissu_12px.gif\" alt=\"必須項目\"><span id=\"essentials3\" class=\"caution_text clear show_sp\" style=\"visibility:visible;\"><b>※</b></span></th>
                                            <td class=\"list_g1w\">
                                                <input type=\"text\" id=\"contact\" name=\"contact\" style=\"width:80%\" maxlength=\"60\">
                                                <p class=\"caution_text clear\"><font class=\"error_blue error_inline1\" style=\"visibility:visible;\"></font></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class=\"list_g1n\" rowspan=\"3\">住所<img class=\"show_pc\" src=\"/assets/images/uploads/profile/images_layout/hissu_12px.gif\" alt=\"必須項目\"><span id=\"essentials6\" class=\"caution_text clear show_sp\" style=\"visibility:visible;\"><b>※</b></span></th>
                                            <td class=\"list_g1w\">〒
                                                <input id=\"Zip1\" name=\"Zip1\" type=\"text\" style=\"width:25%\" size=\"3\" maxlength=\"3\"> -
                                                <input id=\"Zip2\" name=\"Zip2\" type=\"text\" style=\"width:25%\" size=\"4\" maxlength=\"4\">
                                                <span class=\"caution_text clear\">（半角）</span><br/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class=\"list_g1w\"><select id=\"pref_code\" name=\"pref_code\" style=\"width:60%\"></select></td>
                                        </tr>
                                        <tr>
                                            <td colspan=\"2\" class=\"list_g1w\">
                                                <textarea id=\"Address\" name=\"Address\" rows=\"5\" style=\"width:100%!important;\" maxlength=\"200\" class=\"border\"></textarea>
                                                <p class=\"caution_text clear\"><font class=\"error_blue error_inline3\" style=\"visibility:visible;\"></font></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class=\"list_g1n\">電話番号<img class=\"show_pc\" src=\"/assets/images/uploads/profile/images_layout/hissu_12px.gif\" alt=\"必須項目\"><span id=\"essentials7\" class=\"caution_text clear show_sp\" style=\"visibility:visible;\"><b>※</b></span></th>
                                            <td colspan=\"2\" class=\"list_g1w\">
                                                <input type=\"text\" id=\"Tel1\" name=\"Tel1\" size=\"6\" maxlength=\"5\" style=\"width:25%\"> -
                                                <input type=\"text\" id=\"Tel2\" name=\"Tel2\" size=\"6\" maxlength=\"4\" style=\"width:25%\"> -
                                                <input type=\"text\" id=\"Tel3\" name=\"Tel3\" size=\"6\" maxlength=\"4\" style=\"width:25%\">
                                                <span class=\"caution_text clear\">（半角）</span>
                                                <p class=\"caution_text clear\"><font class=\"error_blue error_inline4\" style=\"visibility:visible;\"></font></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class=\"list_g1n\">ＦＡＸ番号<span id=\"essentials8\" class=\"caution_text clear show_sp\" style=\"visibility:hidden;\">※</span></th>
                                            <td colspan=\"2\" class=\"list_g1w\">
                                                <input type=\"text\" id=\"Fax1\" name=\"Fax1\" size=\"6\" maxlength=\"5\" style=\"width:25%\"> -
                                                <input type=\"text\" id=\"Fax2\" name=\"Fax2\" size=\"6\" maxlength=\"4\" style=\"width:25%\"> -
                                                <input type=\"text\" id=\"Fax3\" name=\"Fax3\" size=\"6\" maxlength=\"4\" style=\"width:25%\">
                                                <span class=\"caution_text clear\">（半角）</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class=\"list_g1n\">E-MailをWEBで公開しない</th>
                                            <td class=\"list_g1w\"><input type=\"checkbox\" id=\"Email_open\" name=\"Email_open\" value=\"1\"></td>
                                        </tr>
                                        <tr>
                                            <th nowrap class=\"list_g1n\">御社または担当者<br/>のE-Mailアドレス<img class=\"show_pc mail\" src=\"/assets/images/uploads/profile/images_layout/hissu_12px.gif\" alt=\"必須項目\"><span id=\"essentials5\" class=\"caution_text clear show_sp mail\" style=\"visibility:visible;\"><b>※</b></span></th>
                                            <td class=\"list_g1w\">
                                                <div style=\"margin-bottom:5px;\">
                                                    <input type=\"text\" id=\"Mail1\" name=\"Mail1\" style=\"width:80%\">
                                                    <span class=\"caution_text clear\">（半角）</span>
                                                </div>
                                                <div style=\"margin-bottom:5px;\">
                                                    <input type=\"text\" id=\"Mail2\" name=\"Mail2\" style=\"width:80%\">
                                                    <span class=\"caution_text clear\">（確認用）</span>
                                                </div>
                                                <p class=\"caution_text clear\">確認用E-Mailアドレスはコピー＆ペーストはせず、必ず手入力をしてください。</p>
                                                <p class=\"caution_text clear\"><font class=\"error_blue error_inline5\" style=\"visibility:visible;\"></font></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class=\"list_g1n\">御社ＨＰアドレス</th>
                                            <td colspan=\"2\" class=\"list_g1w\"><input type=\"text\" id=\"URL\" name=\"URL\" style=\"width:80%\" maxlength=\"100\"><br/>
                                                <p class=\"caution_text clear\">必ず「http://」の部分から記載してください。</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class=\"list_g1n\">デモスべース</th>
                                            <td class=\"list_g1w\">
                                                <input type=\"radio\" id=\"demospace1\" name=\"demospace\" value=\"1\"> 有り
                                                <input type=\"radio\" id=\"demospace2\" name=\"demospace\" value=\"2\" checked=\"\"> なし
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class=\"list_g1n\">訪問による導入支援<br/>（別途有償）</th>
                                            <td class=\"list_g1w\">
                                              <input type=\"radio\" id=\"visit_guide1\" name=\"visit_guide\" value=\"1\"> 対応有り
                                              <input type=\"radio\" id=\"visit_guide2\" name=\"visit_guide\" value=\"2\" checked=\"\"> 対応していない
                                            </td>
                                        </tr>
                                        <tr>
                                            <th nowrap class=\"list_g1n\">ＰＲ・コメント欄<br/>（200文字以内）</th>
                                            <td colspan=\"2\" class=\"list_g1w\">
                                                <textarea id=\"comment\" name=\"comment\" rows=\"5\" style=\"width:97.5%!important; overflow:auto!important;\" maxlength=\"200\" class=\"border\"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class=\"list_g1n\" style=\"height:20px\">掲載写真データ</th>
                                            <td class=\"list_g1wc\">
                                                <table class=\"table_img\">
                                                    <tr>
                                                        <td id=\"show_img\" class=\"w25\"></td>
                                                        <td>
                                                            <input type=\"hidden\" id=\"inputPdf_sosp\" width=\"100%\">
                                                            <input type=\"file\" id=\"ipPdf_sosp\" name=\"ipPdf_sosp\" style=\"display:none\" accept=\"application/images\" onchange=\"$('#inputPdf_sosp').val($(this).val());\">
                                                            <input type=\"button\" name=\"btnAdd_img\" class=\"btn btnAdd\" value=\"写真を更新する\" style=\"position:relative\" onclick=\"document.getElementById('ipPdf_sosp').click()\">
                                                            <input type=\"button\" name=\"btnDel_img\" class=\"btnDel\" value=\"写真を削除する\">
                                                            <p class=\"caution_text clear\">この画面の画像を変更するだけでは登録が完了しません。<br/>必ず下の「入力内容を確認する」ボタンから最終的な登録まですべて完了してください。</p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>";
			$input .= ' <input type="hidden" id="sosp_id">
                            <input type="hidden" id="isEdit">
                            <input type="hidden" id="old_sosp_id">
                            <input type="hidden" id="old_sbm_flag">
                            <input type="hidden" id="old_show_web">
                            <input type="hidden" id="old_company_name">
                            <input type="hidden" id="old_contact">
                            <input type="hidden" id="old_zip_code">
                            <input type="hidden" id="old_pref_code">
                            <input type="hidden" id="old_address">
                            <input type="hidden" id="old_tel">
                            <input type="hidden" id="old_fax">
                            <input type="hidden" id="old_Email_open">
                            <input type="hidden" id="old_email">
                            <input type="hidden" id="old_URL">
                            <input type="hidden" id="old_demospace">
                            <input type="hidden" id="old_visit_guide">
                            <input type="hidden" id="old_comment">
                            <input type="hidden" id="old_photo">
                            <input type="hidden" id="file_name">
                            <input type="hidden" id="edit_img">
                            <input type="hidden" id="del_img">';
			break;
		case SOUP:
			$html .= "<p class=\"Title\"><span>SOUP会員の登録情報を修正します。</span></p>
                        <div class=\"frmSection\">                      
                            <div class=\"show_parent\">
                                <table cellspacing=\"2\" cellpadding=\"0\" border=\"0\">                              
                                    <tr>
                                        <th rowspan=\"\" class=\"list_g1n w25\">SOUP会員ID</th>
                                        <td rowspan=\"\" class=\"list_g1\" id=\"Id\"></td>                                 
                                    </tr>
                                    <tr>
                                        <th class=\"list_g1n\">SBM確認</th>
                                        <td class=\"list_g1w\">
                                            <input type=\"checkbox\" name=\"sbm_flag\" value=\"1\" id=\"sbm_flag\">SBM（ソリマチブランドマスター）である。
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class=\"list_g1n\">認定スクール確認</th>
                                        <td class=\"list_g1w\">
                                            <input type=\"checkbox\" name=\"school_flag\" value=\"1\" id=\"school_flag\">認定スクールである。
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class=\"list_g1n\">WEBへの掲載</th>
                                        <td class=\"list_g1w\"><input type=\"checkbox\" id=\"show_web\" name=\"show_web\" value=\"1\">SOUP検索(WEB)に掲載する。</td>
                                    </tr>
                                    <tr>
                                        <th class=\"list_g1n\">会社名<img class=\"show_pc\" src=\"/assets/images/uploads/profile/images_layout/hissu_12px.gif\" alt=\"必須項目\"><span class=\"caution_text clear show_sp\"><b>※</b></span></th>
                                        <td class=\"list_g1w\">
                                            <input type=\"text\" id=\"company_name\" name=\"company_name\" style=\"width:80%\" maxlength=\"150\">
                                            <p class=\"caution_text clear\"><font class=\"error_blue error_inline0\" style=\"visibility:visible;\"></font></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class=\"list_g1n\">ご担当者名<img id=\"essentials3a\" class=\"show_pc\" src=\"/assets/images/uploads/profile/images_layout/hissu_12px.gif\" alt=\"必須項目\"><span id=\"essentials3\" class=\"caution_text clear show_sp\" style=\"visibility:visible;\"><b>※</b></span></th>
                                        <td class=\"list_g1w\">
                                            <input type=\"text\" id=\"contact\" name=\"contact\" style=\"width:80%\" maxlength=\"60\">
                                            <p class=\"caution_text clear\"><font class=\"error_blue error_inline1\" style=\"visibility:visible;\"></font></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class=\"list_g1n\">在籍SOI<img id=\"essentials12a\" class=\"show_pc\" src=\"/assets/images/uploads/profile/images_layout/hissu_12px.gif\" alt=\"必須項目\"><span id=\"essentials12\" class=\"caution_text clear show_sp\" style=\"visibility:visible;\"><b>※</b></span>
                                        <br/><span class=\"font70\">（ソリマチ認定インストラクター）</span></th>
                                        <td colspan=\"2\" class=\"list_g1w\">
                                            <font style=\" line-height:18px;\">
                                                <input type=\"checkbox\" id=\"soi_product1\" name=\"soi_product\" value=\"会計王\">会計王
                                                <input type=\"checkbox\" id=\"soi_product2\" name=\"soi_product\" value=\"給料王\">給料王
                                                <input type=\"checkbox\" id=\"soi_product3\" name=\"soi_product\" value=\"販売王 販売・仕入・在庫\">販売王 販売・仕入・在庫
                                            </font>
                                            <p class=\"caution_text clear\"><font class=\"error_blue error_inline2\" style=\"visibility:visible;\"></font></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class=\"list_g1n\" rowspan=\"3\">住所<img class=\"show_pc\" src=\"/assets/images/uploads/profile/images_layout/hissu_12px.gif\" alt=\"必須項目\"><span id=\"essentials6\" class=\"caution_text clear show_sp\" style=\"visibility:visible;\"><b>※</b></span></th>
                                        <td class=\"list_g1w\">〒
                                            <input id=\"Zip1\" name=\"Zip1\" type=\"text\" style=\"width:25%\" size=\"3\" maxlength=\"3\"> -
                                            <input id=\"Zip2\" name=\"Zip2\" type=\"text\" style=\"width:25%\" size=\"4\" maxlength=\"4\">
                                            <span class=\"caution_text clear\">（半角）</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class=\"list_g1w\"><select id=\"pref_code\" name=\"pref_code\" style=\"width:60%;\"></select></td>
                                    </tr>
                                    <tr>
                                        <td colspan=\"2\" class=\"list_g1w\">
                                            <textarea id=\"Address\" name=\"Address\" rows=\"5\" style=\"width:100%!important;\" maxlength=\"200\" class=\"border\"></textarea>
                                            <p class=\"caution_text clear\"><font class=\"error_blue error_inline3\" style=\"visibility:visible;\"></font></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class=\"list_g1n\">電話番号<img class=\"show_pc\" src=\"/assets/images/uploads/profile/images_layout/hissu_12px.gif\" alt=\"必須項目\"><span id=\"essentials7\" class=\"caution_text clear show_sp\" style=\"visibility:visible;\"><b>※</b></span></th>
                                        <td colspan=\"2\" class=\"list_g1w\">
                                            <input type=\"text\" id=\"Tel1\" name=\"Tel1\" size=\"6\" maxlength=\"5\" style=\"width:25%\"> -
                                            <input type=\"text\" id=\"Tel2\" name=\"Tel2\" size=\"6\" maxlength=\"4\" style=\"width:25%\"> -
                                            <input type=\"text\" id=\"Tel3\" name=\"Tel3\" size=\"6\" maxlength=\"4\" style=\"width:25%\">
                                            <span class=\"caution_text clear\">（半角）</span>
                                            <p class=\"caution_text clear\"><font class=\"error_blue error_inline4\" style=\"visibility:visible;\"></font></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class=\"list_g1n\">ＦＡＸ番号<span id=\"essentials8\" class=\"caution_text clear show_sp\" style=\"visibility:hidden;\">※</span></th>
                                        <td colspan=\"2\" class=\"list_g1w\">
                                            <input type=\"text\" id=\"Fax1\" name=\"Fax1\" size=\"6\" maxlength=\"5\" style=\"width:25%\"> -
                                            <input type=\"text\" id=\"Fax2\" name=\"Fax2\" size=\"6\" maxlength=\"4\" style=\"width:25%\"> -
                                            <input type=\"text\" id=\"Fax3\" name=\"Fax3\" size=\"6\" maxlength=\"4\" style=\"width:25%\">
                                            <span class=\"caution_text clear\">（半角）</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class=\"list_g1n\">E-MailをWEBで公開しない</th>
                                        <td class=\"list_g1w\"><input type=\"checkbox\" id=\"Email_open\" name=\"Email_open\" value=\"1\"></td>
                                    </tr>
                                    <tr>
                                        <th nowrap class=\"list_g1n\">御社または担当者<br/>のE-Mailアドレス<img class=\"show_pc mail\" src=\"/assets/images/uploads/profile/images_layout/hissu_12px.gif\" alt=\"必須項目\"><span id=\"essentials5\" class=\"caution_text clear show_sp mail\" style=\"visibility:visible;\"><b>※</b></span></th>
                                        <td class=\"list_g1w\">
                                            <div style=\"margin-bottom:5px;\">
                                                <input type=\"text\" id=\"Mail1\" name=\"Mail1\" style=\"width:80%\">
                                                <span class=\"caution_text clear\">（半角）</span>
                                            </div>
                                            <div style=\"margin-bottom:5px;\">
                                                <input type=\"text\" id=\"Mail2\" name=\"Mail2\" style=\"width:80%\">
                                                <span class=\"caution_text clear\">（確認用）</span> 
                                            </div>
                                            <p class=\"caution_text clear\">確認用E-Mailアドレスはコピー＆ペーストはせず、必ず手入力をしてください。</p>
                                            <p class=\"caution_text clear\"><font class=\"error_blue error_inline5\" style=\"visibility:visible;\"></font></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class=\"list_g1n\">御社ＨＰアドレス</th>
                                        <td colspan=\"2\" class=\"list_g1w\"><input type=\"text\" id=\"URL\" name=\"URL\" style=\"width:80%\" maxlength=\"100\">
                                            <p class=\"caution_text clear\">必ず「http://」の部分から記載してください。</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class=\"list_g1n\">対応可能地域</th>
                                        <td colspan=\"2\" class=\"list_g1w\">
                                            <font style=\"line-height:18px;\">
                                                <input type=\"checkbox\" id=\"area1\" name=\"area\" value=\"北海道\">北海道
                                                <input type=\"checkbox\" id=\"area2\" name=\"area\" value=\"青森県\">青森県
                                                <input type=\"checkbox\" id=\"area3\" name=\"area\" value=\"岩手県\">岩手県
                                                <input type=\"checkbox\" id=\"area4\" name=\"area\" value=\"宮城県\">宮城県
                                                <input type=\"checkbox\" id=\"area5\" name=\"area\" value=\"秋田県\">秋田県
                                                <input type=\"checkbox\" id=\"area6\" name=\"area\" value=\"山形県\">山形県
                                                <input type=\"checkbox\" id=\"area7\" name=\"area\" value=\"福島県\">福島県
                                                <input type=\"checkbox\" id=\"area8\" name=\"area\" value=\"茨城県\">茨城県<br/>
                                                <input type=\"checkbox\" id=\"area9\" name=\"area\" value=\"栃木県\">栃木県
                                                <input type=\"checkbox\" id=\"area10\" name=\"area\" value=\"群馬県\">群馬県
                                                <input type=\"checkbox\" id=\"area11\" name=\"area\" value=\"埼玉県\">埼玉県
                                                <input type=\"checkbox\" id=\"area12\" name=\"area\" value=\"千葉県\">千葉県
                                                <input type=\"checkbox\" id=\"area13\" name=\"area\" value=\"東京都\">東京都
                                                <input type=\"checkbox\" id=\"area14\" name=\"area\" value=\"神奈川県\">神奈川県
                                                <input type=\"checkbox\" id=\"area15\" name=\"area\" value=\"新潟県\">新潟県
                                                <input type=\"checkbox\" id=\"area16\" name=\"area\" value=\"富山県\">富山県<br/>
                                                <input type=\"checkbox\" id=\"area17\" name=\"area\" value=\"石川県\">石川県
                                                <input type=\"checkbox\" id=\"area18\" name=\"area\" value=\"福井県\">福井県
                                                <input type=\"checkbox\" id=\"area19\" name=\"area\" value=\"山梨県\">山梨県
                                                <input type=\"checkbox\" id=\"area20\" name=\"area\" value=\"長野県\">長野県
                                                <input type=\"checkbox\" id=\"area21\" name=\"area\" value=\"岐阜県\">岐阜県
                                                <input type=\"checkbox\" id=\"area22\" name=\"area\" value=\"静岡県\">静岡県
                                                <input type=\"checkbox\" id=\"area23\" name=\"area\" value=\"愛知県\">愛知県
                                                <input type=\"checkbox\" id=\"area24\" name=\"area\" value=\"三重県\">三重県<br/>
                                                <input type=\"checkbox\" id=\"area25\" name=\"area\" value=\"滋賀県\">滋賀県
                                                <input type=\"checkbox\" id=\"area26\" name=\"area\" value=\"京都府\">京都府
                                                <input type=\"checkbox\" id=\"area27\" name=\"area\" value=\"大阪府\">大阪府
                                                <input type=\"checkbox\" id=\"area28\" name=\"area\" value=\"兵庫県\">兵庫県
                                                <input type=\"checkbox\" id=\"area29\" name=\"area\" value=\"奈良県\">奈良県
                                                <input type=\"checkbox\" id=\"area30\" name=\"area\" value=\"和歌山県\">和歌山県
                                                <input type=\"checkbox\" id=\"area31\" name=\"area\" value=\"鳥取県\">鳥取県
                                                <input type=\"checkbox\" id=\"area32\" name=\"area\" value=\"島根県\">島根県<br/>
                                                <input type=\"checkbox\" id=\"area33\" name=\"area\" value=\"岡山県\">岡山県
                                                <input type=\"checkbox\" id=\"area34\" name=\"area\" value=\"広島県\">広島県
                                                <input type=\"checkbox\" id=\"area35\" name=\"area\" value=\"山口県\">山口県
                                                <input type=\"checkbox\" id=\"area36\" name=\"area\" value=\"徳島県\">徳島県
                                                <input type=\"checkbox\" id=\"area37\" name=\"area\" value=\"香川県\">香川県
                                                <input type=\"checkbox\" id=\"area38\" name=\"area\" value=\"愛媛県\">愛媛県
                                                <input type=\"checkbox\" id=\"area39\" name=\"area\" value=\"高知県\">高知県
                                                <input type=\"checkbox\" id=\"area40\" name=\"area\" value=\"福岡県\">福岡県<br/>
                                                <input type=\"checkbox\" id=\"area41\" name=\"area\" value=\"佐賀県\">佐賀県
                                                <input type=\"checkbox\" id=\"area42\" name=\"area\" value=\"長崎県\">長崎県
                                                <input type=\"checkbox\" id=\"area43\" name=\"area\" value=\"熊本県\">熊本県
                                                <input type=\"checkbox\" id=\"area44\" name=\"area\" value=\"大分県\">大分県
                                                <input type=\"checkbox\" id=\"area45\" name=\"area\" value=\"宮崎県\">宮崎県
                                                <input type=\"checkbox\" id=\"area46\" name=\"area\" value=\"鹿児島県\">鹿児島県
                                                <input type=\"checkbox\" id=\"area47\" name=\"area\" value=\"沖縄県\">沖縄県
                                            </font>
                                            <p class=\"caution_text clear\"><font class=\"error_blue error_inline6\" style=\"visibility:visible;\"></font></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th nowrap class=\"list_g1n\">ＰＲ・コメント欄<br/><span class=\"font70\">（200文字以内）</span></th>
                                        <td colspan=\"2\" class=\"list_g1w\">
                                            <textarea id=\"comment\" name=\"comment\" rows=\"5\" style=\"width:97.5%!important; overflow:auto!important;\" maxlength=\"200\" class=\"border\"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class=\"list_g1n\" style=\"height:20px\">掲載写真データ</th>
                                        <td class=\"list_g1wc\"> 
                                            <table class=\"table_img\">
                                                <tr>
                                                    <td id=\"show_img\" class=\"w25\"></td>
                                                    <td>
                                                        <input type=\"hidden\" id=\"inputPdf_soup\" width=\"100%\" />
                                                        <input type=\"file\" id=\"ipPdf_soup\" name=\"ipPdf_soup\" style=\"display:none\" accept=\"application/images\" onchange=\"$('#inputPdf_soup').val($(this).val());\">
                                                        <input type=\"button\" name=\"btnAdd_img\" class=\"btn btnAdd\" value=\"写真を更新する\" style=\"position:relative\" onclick=\"document.getElementById('ipPdf_soup').click()\">
                                                        <input type=\"button\" name=\"btnDel_img\" class=\"btnDel\" value=\"写真を削除する\">
                                                        <p class=\"caution_text clear\">この画面の画像を変更するだけでは登録が完了しません。<br/>必ず下の「入力内容を確認する」ボタンから最終的な登録まですべて完了してください。</p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>";
			$input .= ' <input type="hidden" id="soup_id">
                            <input type="hidden" id="isEdit">
                            <input type="hidden" id="old_soup_id">
                            <input type="hidden" id="old_sbm_flag">
                            <input type="hidden" id="old_school_flag">
                            <input type="hidden" id="old_show_web">
                            <input type="hidden" id="old_company_name">
                            <input type="hidden" id="old_contact">
                            <input type="hidden" id="old_products">
                            <input type="hidden" id="old_zip_code">
                            <input type="hidden" id="old_pref_code">
                            <input type="hidden" id="old_address">
                            <input type="hidden" id="old_tel">
                            <input type="hidden" id="old_fax">
                            <input type="hidden" id="old_Email_open">
                            <input type="hidden" id="old_email">
                            <input type="hidden" id="old_URL">
                            <input type="hidden" id="old_areas">
                            <input type="hidden" id="old_comment">
                            <input type="hidden" id="old_photo">
                            <input type="hidden" id="file_name">
                            <input type="hidden" id="edit_img">
                            <input type="hidden" id="del_img">';
			break;
	}
	$html .= "  <p class=\"center pb0 pd10\">
                            <input type=\"button\" name=\"submit_a\" value=\"登録\" style=\"width:150px; font-size:15px;\" />
                            <input type=\"button\" name=\"submit_close\" value=\"キャンセル\" style=\"width:150px; font-size:15px;\" />
                        </p>
                    </div>";
	return array($html, $input);
}

// 一覧表示（メール送信先設定表示）
function loadMailBcc()
{
	// $conn   = ConnectPartner();
	$query  = "SELECT * FROM bcc";
	// $result = mysqli_query($conn, $query);
	$result = User::getQuery($query, true, false);
	$grid_mail = '  <p class="boxTitle">メール送信先設定</p>
                        <table summary="メール送信先設定" class="tblStyle">
                        <thead>
                            <tr>
                                <th>パートナー</th>
                                <th>差出人</th>
                                <th>BCC</th>
                                <th class="w10">操作</th>
                            </tr>
                        </thead>
                        <tbody>';
	foreach ($result as $row) {
		$id = $row["id"];
		$pro_id = $row["pro_id"];
		$bcc = $row["bcc"];
		$bcc = str_replace(',', '<br>', $bcc);
		$frommail = $row["FromEmail"];
		$pro_name = ($pro_id == SAAG) ? 'SAAG' : (($pro_id == SOSP) ? 'SOSP' : (($pro_id == SOUP) ? 'SOUP' : '全パートナー'));

		$grid_mail .= " <tr>
                                <td class='center'>{$pro_name}</td>
                                <td>{$frommail}</td>
                                <td>{$bcc}</td>
                                <td class='center'><button name='btnEdit' onclick='openDialogEditMailBcc(this.id)' class='btnEdit fancyboxBccMail' id='{$id}' value='{$id}' href='#inline1'>修正</button></td>
                            </tr>";
	}
	// while ($row = mysqli_fetch_assoc($result)) {
	// }
	$grid_mail .= '</tbody></table>';
	// mysqli_free_result($result);
	// mysqli_close($conn);

	$arr["success"] = true;
	$arr["listmail"] = $grid_mail;
	return $arr;
}

// メール送信先更新
function loadDialogEditMailBcc()
{
	// チェック
	if (empty($_POST['bccId'])) {
		return 'IDの取得に失敗しました。';
	}

	// $conn   = ConnectPartner();
	$query  = "SELECT * FROM bcc WHERE id='" . $_POST['bccId'] . "'";
	$crypt  = new RijndaelOpenSSL();
	// $row    = getRow($conn, $query);
	$row = User::getQuery($query, false, false);

	$arr['success']        = true;
	$arr['Bcc']            = $row["bcc"];
	$arr['id']             = $row["id"];
	$arr['pro_id']         = $row["pro_id"];
	$arr['Host']           = $row["Hostss"];
	$arr['Port']           = $row["Ports"];
	$arr['Username']       = $row["Username"];
	$arr['Password']       = $crypt->decrypt($row["Passwords"], saltinfo());
	$arr['FromEmail']      = $row["FromEmail"];
	$arr['FromName']       = $row["FromName"];
	$arr['EncriptionType'] = $row["EncriptionType"];

	// mysqli_close($conn);
	return $arr;
}

//「テスト用の送信」ボタン
function testSendMail()
{
	$id         = (int) htmlspecialchars($_POST['IDEmail']);
	// $conn       = ConnectPartner();
	$query      = "SELECT * FROM bcc WHERE pro_id=" . $id;
	// $row        = getRow( $conn, $query );
	$row = User::getQuery($query, false, false);

	$arg["Host"]         = htmlspecialchars($_POST['Host']);
	$arg["SMTPSecure"]   = htmlspecialchars($_POST['EncriptionType']);
	$arg["Port"]         = (trim(@$_POST['Port']) != "" && trim(@$_POST['Port']) != 0) ? htmlspecialchars($_POST['Port']) : 587;
	$arg["Username"]     = htmlspecialchars(str_replace("@" . $arg["Host"], "", $_POST['Username']));
	$arg["Password"]     = htmlspecialchars($_POST['Password']);
	$arg["From"]["Mail"] = htmlspecialchars($_POST['FromMail']);
	$arg["From"]["Name"] = htmlspecialchars($_POST['FromName']);
	$arg["To"]["Mail"]   = htmlspecialchars($_POST['MailTest']);
	$arg["BCC"]          = $row['bcc'];
	$arg["Subject"]      = "メールをテストします";
	$arg["Body"]         = "メールをテストします";

	// return sendMailPHPMailer( $arg );
	// return send_mail_PHPMailer($arg["To"]["Mail"], $arg["Subject"], $arg["Body"], $arg["From"]["Mail"]);
	return send_mail_PHPMailer("nguyentrungquan65@gmail.com", $arg["Subject"], $arg["Body"], "khanhvandinhkhanh1@gmail.com");
}

// //「登録」ボタン
function addEmail()
{
	$id = $_POST['id'];
	$old_bcc = $_POST['old_bcc'];
	$FromEmail = $_POST['FromMail'];
	$pro_id = $_POST['pro_id'];
	$FromName = replaceText($_POST['FromName']);
	$EncriptionType = $_POST['EncriptionType'];
	$Host = $_POST['Host'];
	$Port = empty($_POST['Port']) ? 0 : $_POST['Port'];
	$Bcc = trim(replaceText($_POST['Bcc']), ',');
	$Username = $_POST['Username'];
	$Password = replaceText($_POST['Password']);

	// メールアドレス
	if (empty($FromEmail) || !filter_var($FromEmail, FILTER_VALIDATE_EMAIL)) {
		$arr = array('success' => false, 'tagFocus' => 'FromMail', 'error' => "差出人(from)のメールアドレスを入力してください。");
		return $arr;
	}

	// 差出名
	if (empty($FromName)) {
		$arr = array('success' => false, 'tagFocus' => 'FromName', 'error' => "差出名(from)の名前を入力してください。");
		return $arr;
	}

	// SMTPサーバー
	if (empty($Host)) {
		$arr = array('success' => false, 'tagFocus' => 'Host', 'error' => "SMTPサーバーを入力してください。");
		return $arr;
	}

	// SMTPユーザー名
	// if (empty($Username) || !filter_var($Username, FILTER_VALIDATE_EMAIL)) {
	//     $arr = array('success'=> false, 'tagFocus'=>'Username', 'error'=>"SMTPユーザー名を入力してください。");
	//     return $arr;
	// }

	// SMTPパスワード
	if (empty($Password)) {
		$arr = array('success' => false, 'tagFocus' => 'Password', 'error' => "SMTPパスワードを入力してください。");
		return $arr;
	}

	// 確認用アドレス(bcc)
	if (!empty($Bcc)) {
		$flag = strpos($Bcc, ',');
		if ($flag == true) {
			$arrBCC = explode(',', $Bcc);
			$cnt = count($arrBCC);
			for ($i = 0; $i < $cnt; $i++) {
				if (!filter_var($arrBCC[$i], FILTER_VALIDATE_EMAIL)) {
					$arr = array('success' => false, 'tagFocus' => 'Bcc', 'error' => "確認用アドレス(bcc)を入力してください。\nexample@gmail.com");
					return $arr;
				}
			}
		} elseif (!filter_var($Bcc, FILTER_VALIDATE_EMAIL)) {
			$arr = array('success' => false, 'tagFocus' => 'Bcc', 'error' => "確認用アドレス(bcc)を入力してください。\nexample@gmail.com");
			return $arr;
		}
	}

	// $conn  = ConnectPartner();
	$query = "SELECT bcc_mfd FROM bcc WHERE id='{$id}'";
	// $mfd = getRow($conn, $query);
	$mfd = User::getQuery($query, false, false);
	$bcc_mfd = $mfd['bcc_mfd'];

	$update = date('Y-m-d H:i:s');
	$changeBCC = substr_compare($Bcc, $old_bcc, 0);
	if ($changeBCC !== 0 || $changeBCC !== '0') {
		$bcc_mfd = $update;
	}

	$query = "SELECT Passwords FROM bcc WHERE id='{$id}'";
	// $Passwords = getRow($conn, $query);
	$Passwords = User::getQuery($query, false, false);

	$crypt = new RijndaelOpenSSL();
	$Password_old = $crypt->decrypt($Passwords['Passwords'], saltinfo());

	// パスワード一致
	if ($Password_old != $Password) {
		$encryptedData = $crypt->encrypt($Password, saltinfo());
		$query = "UPDATE bcc SET Hostss='{$Host}', Ports='{$Port}', pro_id='{$pro_id}', Username='{$Username}', Passwords='{$encryptedData}', FromEmail='{$FromEmail}', FromName = '{$FromName}', bcc ='{$Bcc}', bcc_mfd='{$bcc_mfd}', EncriptionType='{$EncriptionType}' where id='{$id}'";
	} else {
		$query = "UPDATE bcc SET Hostss='{$Host}', Ports='{$Port}', pro_id='{$pro_id}', Username='{$Username}', FromEmail='{$FromEmail}', FromName = '{$FromName}', bcc ='{$Bcc}', bcc_mfd='{$bcc_mfd}', EncriptionType='{$EncriptionType}' where id='{$id}'";
	}
	User::prepareQuery($query);
	// mysqli_query($conn, $query);
	// mysqli_close($conn);

	$arr['success'] = true;
	return $arr;
}

// 一覧表示（管理者ID/PW管理）
function loadGridIdPass()
{
	// $conn   = ConnectPartner();
	$sql    = "SELECT * FROM userform";
	// $result = mysqli_query($conn, $sql);
	$result = User::getQuery($sql, true, false);


	$grid_data = '  <div class="boxStyle01">
                            <p class="boxTitle">管理者ID/PW管理</p>
                            <p class="boxBtn"><button name="btnCreate" class="fancyboxIdPass btn btnAdd" value="" onclick="openDialogAddIdPass();" href="#managerIdPass" style="width:130px;">追加</button></p>
                        </div>
                        <table summary="管理者ID/PW管理" class="tblStyle">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th class="w15">パートナー</th>
                                <th>ユーザーID</th>
                                <th>ユーザー名</th>
                                <th class="w15">操作</th>
                            </tr>
                        </thead>
                        <tbody>';

	$i = 0;
	foreach ($result as $row) {
		$i++;
		$id = $row["id"];
		$userid = htmlspecialchars($row["userid"]);
		$username = htmlspecialchars($row["username"]);
		$pro_id = $row["pro_id"];
		$pro_name = ($pro_id == SAAG) ? 'SAAG' : (($pro_id == SOSP) ? 'SOSP' : (($pro_id == SOUP) ?  'SOUP' : '全パートナー'));

		$grid_data .= " <tr>
                                <td class='center'>{$i}</td>
                                <td class='center'>{$pro_name}</td>
                                <td>{$userid}</td>
                                <td>{$username}</td>
                                <td class='center'>
                                    <button name='btnConfirmDelUser' onclick='deleteUser({$id})' class='btnDel btnConfirmDelUser' id='{$id}' value='{$id}' href='#confirmBoxDelUser'>削除</button>
                                    <button name='btnEdit' onclick='openDialogEditIdPass({$id},true)' class='btnEdit fancyboxIdPass' id='{$id}' value='{$id}' href='#managerIdPass'>修正</button>
                                </td>
                            </tr>";
	}
	// while ($row = mysqli_fetch_assoc($result)) {
	// }
	$grid_data .= '</tbody></table>';
	// mysqli_free_result($result);
	// mysqli_close($conn);

	$arr["success"] = true;
	$arr["grid"] = $grid_data;
	return $arr;
}

//「修正」ボタン
function loadEditIdPass()
{
	// チェック
	if (empty($_POST['userId'])) {
		return 'IDの取得に失敗しました。';
	}

	// $conn            = ConnectPartner();
	$query           = "SELECT * FROM userform WHERE id = '" . replaceText($_POST['userId']) . "'";
	// $row             = getRow($conn, $query);
	$row             = User::getQuery($query, false, false);
	$arr['success']  = true;
	$arr['userid']   = $row["userid"];
	$arr['fullname'] = $row["username"];
	$arr['pro_id']   = $row["pro_id"];

	// mysqli_close($conn);
	return $arr;
}

//「削除」ボタン
function deleteUser()
{
	// チェック
	if (empty($_POST['userId'])) {
		return 'IDの取得に失敗しました。';
	}

	// $conn = ConnectPartner();
	$sql = "DELETE FROM userform where id='" . $_POST['userId'] . "'";
	// $result = sqlExec($conn, $sql);
	$result = User::execQuery($sql);
	// mysqli_close($conn);
	if ($result == -1) {
		return '削除でエラーが発生しました。';
	}

	return true;
}

//「登録」ボタン
function saveUser()
{
	// $conn = ConnectPartner();
	$pro_id = $_POST['pro_id'];
	$userid = replaceText($_POST['userid']);
	$fullname = replaceText($_POST['fullname']);
	$Password = md5($_POST['Password']);
	$isPwChange = $_POST['isPwChange'];
	$isEditUser = $_POST['isEditUser'];

	// 更新
	$flag_update = 0;
	if ($isEditUser == 1) {
		$sql = "UPDATE userform SET ";
		if ($fullname != "") {
			$sql .= "username='{$fullname}'";
			$flag_update = 1;
		}
		if ($isPwChange == 1) {
			if ($flag_update > 0) {
				$sql .= ",";
			}
			$sql .= "passwords='{$Password}'";
		}
		$sql .= ", pro_id='{$pro_id}' WHERE userid='{$userid}'";
	}
	// 追加
	else {
		// $search = mysqli_query($conn, "SELECT * from userform where userid='{$userid}'");
		$search = User::getQuery("SELECT * from userform where userid='{$userid}'", false, true);
		if ($search > 0) {
			return 'ユーザーは既に存在しています。';
		}
		$sql = "INSERT INTO userform (userid, username, passwords, pro_id) VALUES ('{$userid}', '{$fullname}', '{$Password}', '{$pro_id}')";
	}

	if (!User::prepareQuery($sql))
		return false;
	// mysqli_query($conn, $sql);
	// mysqli_close($conn);
	return true;
}

// パートナーID/PW 取り込み
function importDataCSV($numPage)
{

	// $conn = ConnectPartner();
	$result['success'] = false;
	$ids = array();

	if ($_FILES['file']['error'] == 0) {
		$table = ($numPage == SAAG) ? 'saag' : (($numPage == SOSP) ? 'sosp' : 'soup');

		// ファイルタイプ（TXT、CSV）
		$mimes = array('application/vnd.ms-excel', 'text/plain', 'text/csv', 'text/tsv', 'csv');
		if (in_array($_FILES['file']['type'], $mimes)) {
			// Count fields
			// $count = mysqli_query( $conn, "SELECT * FROM id_{$table} LIMIT 1" );
			$count = User::getColumn("SELECT * FROM id_{$table} LIMIT 1");
			// $count = mysqli_num_fields( $count );
			// mysqli_real_query($conn, "TRUNCATE TABLE id_{$table}");
			//delete records in table
			User::execQuery("TRUNCATE TABLE id_{$table}");
			$query = "INSERT INTO id_{$table}(`{$table}_id`, `{$table}_id_old1`, `{$table}_id_old2`, `{$table}_name`, `passwords`, `customer_code`, `passwords_old1`) VALUES ";

			$i = 0;

			ini_set('auto_detect_line_endings', TRUE);
			$file = fopen($_FILES["file"]["tmp_name"], "rb");
			while (($row = fgetcsv($file)) !== false) {
				$row = array_map("removeCharacter", $row);
				if ($i == 0 && count($row) != $count) {
					$result["error"] = "ファイルが無効です";
					return $result;
				}

				$id             = !empty(trim(@$row[1])) ? trim($row[1]) : null;
				$id_old1        = !empty(trim(@$row[2])) ? trim($row[2]) : null;
				$id_old2        = !empty(trim(@$row[3])) ? trim($row[3]) : null;
				$name           = !empty(trim(@$row[4])) ? trim($row[4]) : null;
				$passwords      = !empty(trim(@$row[5])) ? trim($row[5]) : null;
				$customer_code  = !empty(trim(@$row[6])) ? trim($row[6]) : null;
				$passwords_old1 = !empty(trim(@$row[7])) ? trim($row[7]) : null;
				if (strpos($id, "id") !== false) {
					continue;
				}

				if ($id == null) {
					if ($id_old1 == null && $id_old2 == null) {
						$result["error"] = "レコードが無効です";
						return $result;
					}
				}
				$exec = User::execQuery($query . "('{$id}', '{$id_old1}', '{$id_old2}', '{$name}', '{$passwords}', '{$customer_code}', '{$passwords_old1}')");

				// echo '<pre>';
				// // print_r(get_defined_vars());
				// print_r(fgetcsv($file));
				// print_r('row:' . count($row));
				// print_r('exec:' . $exec);
				// echo '<pre>';
				//     die();
				if (!$exec) {
					$result["error"] = "エラー行" . $i++ . "があります";
					return $result;
				}
				$ids[] = $id;
				$i++;
			}
			ini_set('auto_detect_line_endings', FALSE);
			fclose($file);

			$result['numAffect'] = count($ids);
			$result['success'] = true;
		} else {
			$result['error'] = "ファイルが無効です";
			goto Result;
		}
	}

	// 不要なメンバー削除
	$result['listID'] = "";
	if ($result['success']) {
		if (count(deleteNotMember($numPage, $ids)) > 0) {
			$result['listID'] = deleteNotMember($numPage, $ids);
		}
	}

	Result:
	return $result;
}

function removeCharacter($value)
{
	$value = str_replace('"', "", $value);
	$value = trim($value);
	return $value;
}

// 不要なメンバー削除
function deleteNotMember($numPage, $ids, $method = "GET")
{
	// $conn = ConnectPartner();
	$method = strtoupper($method);
	$table  = ($numPage == SAAG) ? 'saag' : (($numPage == SOSP) ? 'sosp' : 'soup');
	$id = array();
	switch ($method) {
		case "GET":
			$query = "SELECT {$table}_id FROM infos_{$table} WHERE {$table}_id NOT IN ('" . join("','", $ids) . "')\r\n" .
				"UNION\r\n" .
				"SELECT {$table}_id FROM img_{$table} WHERE {$table}_id NOT IN ('" . join("','", $ids) . "')";
			// $result = mysqli_query($conn, $query);
			// $result = mysqli_query($conn, $query);
			// $listID = mysqli_fetch_all( $result );
			$listID = User::getQuery($query, true, false);
			// mysqli_close($conn);

			$listID = array_map(function ($item) {
				return join("", $item);
			}, $listID);
			return $listID;

		case "DELETE":
			// Info
			// mysqli_real_query( $conn, "DELETE FROM infos_{$table} WHERE {$table}_id IN ('" . join( "','", $ids ) . "')" );
			User::prepareQuery("DELETE FROM infos_{$table} WHERE {$table}_id IN ('" . join("','", $ids) . "')");

			// Images
			$path_img       = __DIR__ . "/../profile/images_{$table}";
			$path_temp      = $path_img . "/temp";
			$path_thumbnail = $path_img . "/thumbnail";

			// $result = mysqli_query( $conn, "SELECT {$table}_id FROM img_{$table} WHERE {$table}_id IN ('" . join("','", $ids) . "')" );
			$result = User::getQuery("SELECT {$table}_id FROM img_{$table} WHERE {$table}_id IN ('" . join("','", $ids) . "')", true, false);

			foreach ($result as $row) {
				// 画像削除
				$img = realpath($path_thumbnail . "/"  . $row["{$table}_id"] . ".jpg");

				if (file_exists($img)) {
					@chmod($img, 0777);
					@unlink($img);
				}

				$img = realpath($path_temp . "/"  . $row["{$table}_id"] . ".jpg");
				if (file_exists($img)) {
					@chmod($img, 0777);
					@unlink($img);
				}
			}

			// while ( $row = mysqli_fetch_assoc( $result ) ) {
			// }
			// mysqli_real_query( $conn, "DELETE FROM img_{$table} where {$table}_id IN ('" . join( "','", $ids ) . "')" );
			User::execQuery("DELETE FROM img_{$table} where {$table}_id IN ('" . join("','", $ids) . "')");
			return $id;
	}
	// mysqli_close($conn);
}
