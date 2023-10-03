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

class FormController extends \Core\Controller
{
	/**
	 * Show the index page
	 *
	 * @return void
	 */
	public function indexAction()
	{
		require_once __DIR__ . '/../../functions/search_form.php';
		require_once __DIR__ . "/../../../../../common_files/smtp_mail.php";
		require_once __DIR__ . "/../../inc/common.php";
		require_once __DIR__ . '/MasterController.php';

		// 動作判定
		if (isset($_POST['action'])) {
			switch ($_POST['action']) {
				case 'loadAreas':
					echo json_encode($this->loadAreas(@$_POST['numPage']));
					break;
				case 'uploadImage':
					echo json_encode(uploadImage(@$_POST['numPage']));
					break;
					// case 'deleteImage':
					//     deleteImage();
					//     break;
				case 'deleteImageNotUse':
					deleteImage(@$_POST['numPage']);
					break;
				case 'saveForm':
					if (isset($_POST['sbm']) && @$_POST['sbm'] == true) {
						echo $this->SaveDataForm(@$_POST['numPage'], @$_POST['sbm']);
					} else {
						echo $this->SaveDataForm(@$_POST['numPage']);
					}
					break;

					// 一覧表示（管理者専用）
				case 'loadList':
					echo json_encode(loadList($_POST['numPage']));
					break;
					// ダイアログを開いて、データ修正
				case 'loadListById':
					echo json_encode(loadListById($_POST['numPage']));
					break;
					//「削除」ボタン
				case 'deleteData':
					echo json_encode(deleteData($_POST['numPage'], $_POST['id']));
					break;
					//Dinh Van Khanh check id from API
				case 'checkID':
					echo json_encode(checkID($_POST['oldID'], $_POST['newID'], $_POST['numPage']));
					// echo json_encode(checkID($_POST['numPage'], $_POST['id']));
					break;
				case 'updateDatabaseFromID':
					echo json_encode(updateDatabaseFromID($_POST['oldID'], $_POST['newID'], $_POST['numPage']));
					// echo json_encode(checkID($_POST['numPage'], $_POST['id']));
					break;
					// 一覧表示（メール送信先設定表示）
				case 'loadMailBcc':
					echo json_encode(loadMailBcc());
					break;
					// メール送信先更新
				case 'loadDialogEditMailBcc':
					echo json_encode(loadDialogEditMailBcc());
					break;
					//「テスト用の送信」ボタン
				case 'testSendMail':
					echo testSendMail();
					break;
					//「登録」ボタン
				case 'addEmail':
					echo json_encode(addEmail());
					break;

					// 一覧表示（管理者ID/PW管理）
				case 'loadGridIdPass':
					echo json_encode(loadGridIdPass());
					break;
					//「修正」ボタン
				case 'loadEditIdPass':
					echo json_encode(loadEditIdPass());
					break;
					//「削除」ボタン
				case 'deleteUser':
					echo json_decode(deleteUser());
					break;
					//「登録」ボタン
				case 'saveUser':
					echo json_encode(saveUser());
					break;

					// パートナーID/PW 取り込み
				case 'importDataCSV':
					echo json_encode(importDataCSV($_POST['numPage']));
					break;
					// 不要なメンバー削除
				case 'deleteNotMember':
					echo json_encode(deleteNotMember($_POST['numPage'], $_POST['listID'], 'DELETE'));
					break;
			}
		}
	}

	// 画面表示
	public function loadAreas($pro_id)
	{
		$column    = ($pro_id == SOSP) ? 'sosp' : (($pro_id == SOUP) ? 'soup' : 'saag');
		$id        = $_SESSION[strtoupper($column) . "-ID"];
		$arr_infos = loadForm($pro_id, $id);
		if (is_string($arr_infos)) {
			return $arr_infos;
		}

		// データ設定
		$arr = array();
		$arr[$column]       = $arr_infos[0];
		$arr["areaOption"]  = $arr_infos[1];
		$arr["photo"]       = $arr_infos[2];
		$arr["edit"]        = $arr_infos[3];
		$arr[$column . "_id"] = $id;
		$arr["success"]     = true;
		return $arr;
	}

	// 情報の新規作成・更新
	public function SaveDataForm($pro_id, $page_sbm = false)
	{
		$table = ($pro_id == SOSP) ? 'sosp' : (($pro_id == SOUP) ? 'soup' : 'saag');

		$old_show_web     = $_POST['old_show_web'];
		$old_company_name = $_POST['old_company_name'];
		$old_contact      = $_POST['old_contact'];
		$old_email        = @$_POST['old_email'];
		$old_zip_code     = $_POST['old_zip_code'];
		$old_pref_code    = $_POST['old_pref_code'];
		$old_address      = $_POST['old_address'];
		$old_tel          = $_POST['old_tel'];
		$old_fax          = $_POST['old_fax'];
		$old_URL          = replaceText($_POST['old_URL']);
		$old_comment      = $_POST['old_comment'];
		$old_photo        = $_POST["old_photo"];

		$edit         = $_POST["isEdit"];
		$id           = preg_replace("/[^0-9]/", "", preg_replace('/\s\s+/', '　', trim($_POST["{$table}_id"])));
		$show_web     = $_POST['show_web'];
		$company_name = replaceText(trim($_POST['company_name']));
		$contact      = replaceText(trim($_POST['contact']));
		$zip_code     = $_POST['zip_code1'] . '-' . $_POST['zip_code2'];
		$pref_code    = $_POST['pref_code'];
		$address      = replaceText(trim($_POST['address']));
		$tel          = preg_replace("/[^0-9-]/", "", formatsFax($_POST['tel1'], $_POST['tel2'], $_POST['tel3']));
		$fax          = preg_replace("/[^0-9-]/", "", formatsFax($_POST['fax1'], $_POST['fax2'], $_POST['fax3']));
		$email1       = $_POST['mail1'];
		$email2       = $_POST['mail2'];
		$url          = formatsURL($_POST['URL']);
		$comment      = rtrim($_POST['comment'], ";");
		$img          = $_POST["images"];
		$edit_img     = @$_POST['edit_img'];
		$del_img      = @$_POST["del_img"];

		// 画像削除
		$photo = ($edit_img != '') ? 1 : (($del_img != '') ? 0 : $old_photo);
		flagDelete($pro_id, $table, $id, $del_img);

		// 初期値
		// $conn        = ConnectPartner();
		$conn        = "";
		$query_reset = "SELECT * FROM infos_{$table} WHERE {$table}_id = '{$id}'";
		// $row_reset   = getRow($conn, $query_reset);
		$row_reset = User::getQuery($query_reset, false, false);
		$modified    = $modified1 = $row_reset["modified"] ?? "";

		$obj = array();
		$email = '';
		$query_custom = '';
		$update = date('Y-m-d H:i:s');
		// $body = file_get_contents(dirname(__FILE__) . "/../mailtemplate/template_{$table}.txt");
		$body = file_get_contents(__DIR__ . "/../../Views/mailformtemplate/template_{$table}.txt");


		switch ($pro_id) {
			case SAAG:
				$old_info_type      = $_POST['old_info_type'];
				$old_campaign1      = $_POST['old_campaign1'];
				$old_member_name    = $_POST['old_member_name'];
				$old_qualifications = $_POST['old_qualifications'];
				$old_products       = $_POST['old_products'];
				$old_areas          = $_POST['old_areas'];

				$customer_code      = $id;
				$info_type          = $_POST['info_type'];
				$campaign1          = $_POST['campaign1'];
				$member_name        = replaceText($_POST['member_name']);
				$email = ($email1 == $email2) ? $email1 : '';
				$OfficeQuaOther     = replaceText($_POST['OfficeQuaOther']);
				$OfficeProductOther = replaceText($_POST['OfficeProductOther']);
				$areas              = $_POST['OfficeArea'];
				$qualis             = (empty($OfficeQuaOther)) ? replaceText($_POST['OfficeQua']) : replaceText($_POST['OfficeQua'] . ', ' . $OfficeQuaOther);
				$products           = (empty($OfficeProductOther)) ? replaceText($_POST['OfficePro']) : replaceText($_POST['OfficePro'] . ', ' . $OfficeProductOther);

				// 新規作成
				if ($edit == 0) {
					$info_type_mfd = $campaign1_mfd = $member_name_mfd = $qualifications_mfd = $products_mfd = $areas_mfd = $update;
					$query_custom .= ",info_type,info_type_mfd,member_name,member_name_mfd,qualifications,qualifications_mfd,products,products_mfd,campaign1,campaign1_mfd,areas,areas_mfd";
					$query_value = ",'{$info_type}','{$info_type_mfd}',N'{$member_name}','{$member_name_mfd}','{$qualis}','{$qualifications_mfd}','{$products}','{$products_mfd}','{$campaign1}','{$campaign1_mfd}','{$areas}','{$areas_mfd}'";
				}
				// 更新
				else {
					$old_info_type_mfd      = $row_reset["info_type_mfd"];
					$old_campaign1_mfd      = $row_reset["campaign1_mfd"];
					$old_member_name_mfd    = $row_reset["member_name_mfd"];
					$old_qualifications_mfd = $row_reset["qualifications_mfd"];
					$old_products_mfd       = $row_reset["products_mfd"];
					$old_areas_mfd          = $row_reset["areas_mfd"];

					$info_type_mfd          = ($old_info_type == $info_type) ? $old_info_type_mfd : $update;
					$campaign1_mfd          = ($old_campaign1 == $campaign1) ? $old_campaign1_mfd : $update;
					$member_name_mfd        = ($old_member_name == $member_name) ? $old_member_name_mfd : $update;
					$qualifications_mfd     = ($old_qualifications == $qualis) ? $old_qualifications_mfd : $update;
					$products_mfd           = ($old_products == $products) ? $old_products_mfd : $update;
					$areas_mfd              = ($old_areas == $areas) ? $old_areas_mfd : $update;

					if ($old_info_type != $info_type || $old_member_name != $member_name || $old_qualifications != $qualis || $old_products != $products || $old_campaign1 != $campaign1 || $old_areas != $areas) {
						$modified1 = $update;
					}
					$query_custom = ", qualifications = '{$qualis}', qualifications_mfd = '{$qualifications_mfd}', areas = '{$areas}', areas_mfd = '{$areas_mfd}', products = '{$products}', products_mfd = '{$products_mfd}',   info_type = {$info_type}, info_type_mfd = '{$info_type_mfd}', member_name = '{$member_name}', member_name_mfd = '{$member_name_mfd}', campaign1 = '{$campaign1}', campaign1_mfd = '{$campaign1_mfd}'";
				}

				// 会員情報
				$obj['stinfo_type']      = $info_type;
				$obj['stcampaign1']      = $campaign1;
				$obj['stmember_name']    = $member_name;
				$obj['stqualifications'] = $qualis;
				$obj['stproducts']       = $products;
				$obj['stareas']          = $areas;
				$obj['error']            = 'すでにSAAG会員の情報が登録されています。';

				// メール内容
				$subject = "【SAAG-ID：{$id}】 「SAAG検索」掲載情報変更";
				$info_type_name = ($info_type == "1") ? "詳細形式" : (($info_type == "2") ? '簡易リスト形式' : '');
				$campaign1 = ($campaign1 != '1') ? "" : "みんなの税務相談";

				$body = str_replace('$customer_code', $customer_code, $body);
				$body = str_replace('$info_type_name', $info_type_name, $body);
				$body = str_replace('$campaign1', $campaign1, $body);
				$body = str_replace('$member_name', $member_name, $body);
				$body = str_replace('$qualis', $qualis, $body);
				$body = str_replace('$products', $products, $body);
				$body = str_replace('$areas', $areas, $body);
				break;

			case SOSP:
				$old_sbm_flag    = $_POST['old_sbm_flag'];
				$old_email_open  = $_POST['old_email_open'];
				$old_demospace   = $_POST['old_demospace'];
				$old_visit_guide = $_POST['old_visit_guide'];

				$sbm_flag        = $_POST['sbm_flag'];
				$email_open      = $_POST['email_open'];
				$demospace       = $_POST['demospace'];
				$visit_guide     = $_POST['visit_guide'];

				// E-MailをWEBで公開
				$email = ($email_open == 1 && $email1 == '') ? $old_email : ((($email1 !== '' && $email1 !== $old_email) || $email1 == $email2) ? $email1 : '');

				// 新規作成
				if ($edit == 0) {
					$sbm_flag_mfd  =  $email_open_mfd = $demospace_mfd  = $visit_guide_mfd = $update;
					$query_custom .= ",sbm_flag,sbm_flag_mfd,Email_open,Email_open_mfd,demospace,demospace_mfd,visit_guide,visit_guide_mfd";
					$query_value = ",'{$sbm_flag}','{$sbm_flag_mfd}','{$email_open}','{$email_open_mfd}','{$demospace}','{$demospace_mfd}','{$visit_guide}','{$visit_guide_mfd}'";
				}
				// 更新
				else {
					$old_sbm_flag_mfd    = $row_reset['sbm_flag_mfd'];
					$old_email_open_mfd  = $row_reset['Email_open_mfd'];
					$old_demospace_mfd   = $row_reset['demospace_mfd'];
					$old_visit_guide_mfd = $row_reset['visit_guide_mfd'];

					$sbm_flag_mfd        = ($old_sbm_flag == $sbm_flag) ? $old_sbm_flag_mfd : $update;
					$email_open_mfd      = ($old_email_open == $email_open) ? $old_email_open_mfd : $update;
					$demospace_mfd       = ($old_demospace == $demospace) ? $old_demospace_mfd : $update;
					$visit_guide_mfd     = ($old_visit_guide == $visit_guide) ? $old_visit_guide_mfd : $update;

					if ($old_sbm_flag != $sbm_flag || $old_demospace != $demospace || $old_visit_guide != $visit_guide || $old_email_open != $email_open) {
						$modified1 = $update;
					}
					$query_custom .= ", sbm_flag = '{$sbm_flag}', sbm_flag_mfd = '{$sbm_flag_mfd}', Email_open = '{$email_open}', Email_open_mfd  = '{$email_open_mfd}', demospace = '{$demospace}', demospace_mfd = '{$demospace_mfd}', visit_guide = '{$visit_guide}', visit_guide_mfd = '{$visit_guide_mfd}' ";
				}

				// 会員情報
				$obj['stsbm_flag']    = $sbm_flag;
				$obj['stEmail_open']  = $email_open;
				$obj['stdemospace']   = $demospace;
				$obj['stvisit_guide'] = $visit_guide;
				$obj['error']         = 'SOSPは既に存在しています。';

				// メール内容
				$subject = "【SOSP-ID：{$id}】 「SOSP検索」掲載情報変更";
				$open1 = ($email_open == 1) ? "公開しない" : "公開する";
				$demospace_name = ($demospace == 1) ? "有り" : (($demospace == 2) ? "なし" : '');
				$visit_guide_name = ($visit_guide == 1) ? "対応有り" : (($visit_guide == 2) ? "対応していない" : '');

				$body = str_replace('$open1', $open1, $body);
				$body = str_replace('$demospace_name', $demospace_name, $body);
				$body = str_replace('$visit_guide_name', $visit_guide_name, $body);
				break;

			case SOUP:
				$old_sbm_flag     = $_POST['old_sbm_flag'];
				$old_school_flag  = $_POST['old_school_flag'];
				$old_soi_products = $_POST['old_soi_products'];
				$old_email_open   = $_POST['old_email_open'];
				$old_areas        = $_POST['old_areas'];

				$sbm_flag         = $_POST['sbm_flag'];
				$school_flag      = $_POST['school_flag'];
				$soi_products     = $_POST['soi_products'];
				$email_open       = $_POST['email_open'];
				$areas            = $_POST['areas'];

				// E-MailをWEBで公開
				$email = ($email_open == 1 && $email1 == '') ? $old_email : ((($email1 !== '' && $email1 !== $old_email) || $email1 == $email2) ? $email1 : '');

				// 新規作成
				if ($edit == 0) {
					$sbm_flag_mfd = $email_open_mfd = $school_flag_mfd = $soi_products_mfd = $areas_mfd = $update;
					$query_custom .= ",Email_open,Email_open_mfd,areas,areas_mfd,soi_products,soi_products_mfd,sbm_flag,sbm_flag_mfd,school_flag,school_flag_mfd";
					$query_value   = ",'{$email_open}','{$email_open_mfd}','{$areas}','{$areas_mfd}','{$soi_products}','{$soi_products_mfd}',{$sbm_flag},'{$sbm_flag_mfd}',{$school_flag},'{$school_flag_mfd}'";
				}
				// 更新
				else {
					$old_sbm_flag_mfd     = $row_reset['sbm_flag_mfd'];
					$old_school_flag_mfd  = $row_reset['school_flag_mfd'];
					$old_soi_products_mfd = $row_reset['soi_products_mfd'];
					$old_Email_open_mfd   = $row_reset['Email_open_mfd'];
					$old_areas_mfd        = $row_reset['areas_mfd'];

					$sbm_flag_mfd         = ($old_sbm_flag == $sbm_flag) ? $old_sbm_flag_mfd : $update;
					$school_flag_mfd      = ($old_school_flag == $school_flag) ? $old_school_flag_mfd : $update;
					$soi_products_mfd     = ($old_soi_products == $soi_products) ? $old_soi_products_mfd : $update;
					$Email_open_mfd       = ($old_email_open == $email_open) ? $old_Email_open_mfd : $update;
					$areas_mfd            = ($old_areas == $areas) ? $old_areas_mfd : $update;

					if ($old_sbm_flag != $sbm_flag || $old_school_flag != $school_flag || $old_soi_products != $soi_products || $old_areas != $areas || $old_email_open != $email_open) {
						$modified1 = $update;
					}
					$query_custom .= ", sbm_flag = '{$sbm_flag}', sbm_flag_mfd = '{$sbm_flag_mfd}', school_flag = '{$school_flag}', school_flag_mfd = '{$school_flag_mfd}', Email_open = '{$email_open}', Email_open_mfd = '{$Email_open_mfd}', soi_products = '{$soi_products}', soi_products_mfd = '{$soi_products_mfd}', areas = '{$areas}', areas_mfd = '{$areas_mfd}' ";
				}

				// 会員情報
				$obj['stsbm_flag']     = $sbm_flag;
				$obj['stschool_flag']  = $school_flag;
				$obj['stsoi_products'] = $soi_products;
				$obj['stEmail_open']   = $email_open;
				$obj['stareas']        = $areas;
				$obj['error']          = 'SOUPは既に存在しています。';

				// メール内容
				$subject = "【SOUP-ID：{$id}】 「SOUP検索」掲載情報変更";
				$open1 = ($email_open == 1) ? "公開しない" : "公開する";

				$body = str_replace('$soi_products', $soi_products, $body);
				$body = str_replace('$open1', $open1, $body);
				$body = str_replace('$areas', $areas, $body);
				break;
		}

		// 新規作成
		$sql = '';
		if ($edit == 0) {
			$customer_code = $operator = $id;
			$id_mfd = $customer_code_mfd = $created = $modified = $show_web_mfd = $company_name_mfd = $contact_mfd = $update;
			$email_mfd = $zip_code_mfd = $pref_code_mfd = $address_mfd = $tel_mfd = $fax_mfd = $url_mfd = $photo_mfd =  $comment_mfd = $update;

			$sql = "INSERT INTO infos_{$table} ({$table}_id,{$table}_id_mfd,customer_code,customer_code_mfd,show_web,show_web_mfd,company_name,company_name_mfd,contact,contact_mfd,Email,Email_mfd,zip_code,zip_code_mfd,pref_code,pref_code_mfd,address,address_mfd,tel,tel_mfd,fax,fax_mfd,URL,URL_mfd,photo,photo_mfd,comments,comment_mfd,operator,created,modified {$query_custom})
                    VALUES ('{$id}','{$id_mfd}','{$customer_code}','{$customer_code_mfd}','{$show_web}','{$show_web_mfd}','{$company_name}','{$company_name_mfd}','{$contact}','{$contact_mfd}','{$email}','{$email_mfd}','{$zip_code}','{$zip_code_mfd}','{$pref_code}','{$pref_code_mfd}','{$address}','{$address_mfd}','{$tel}','{$tel_mfd}','{$fax}','{$fax_mfd}','{$url}','{$url_mfd}','{$photo}','{$photo_mfd}','{$comment}','{$comment_mfd}','{$operator}','{$created}','{$modified}' {$query_value});";
		}
		// 更新
		else {
			$old_show_web_mfd     = $row_reset['show_web_mfd'];
			$old_company_name_mfd = $row_reset['company_name_mfd'];
			$old_contact_mfd      = $row_reset['contact_mfd'];
			$old_Email_mfd        = $row_reset['Email_mfd'];
			$old_zip_code_mfd     = $row_reset['zip_code_mfd'];
			$old_pref_code_mfd    = $row_reset['pref_code_mfd'];
			$old_address_mfd      = $row_reset['address_mfd'];
			$old_tel_mfd          = $row_reset['tel_mfd'];
			$old_fax_mfd          = $row_reset['fax_mfd'];
			$old_URL_mfd          = $row_reset['URL_mfd'];
			$old_comment_mfd      = $row_reset['comment_mfd'];
			$old_photo_mfd        = $row_reset["photo_mfd"];

			$show_web_mfd     = ($old_show_web == $show_web) ? $old_show_web_mfd : $update;
			$company_name_mfd = ($old_company_name == $company_name) ? $old_company_name_mfd : $update;
			$contact_mfd      = ($old_contact == $contact) ? $old_contact_mfd : $update;
			$email_mfd        = ($old_email == $email) ? $old_Email_mfd : $update;
			$zip_code_mfd     = ($old_zip_code == $zip_code) ? $old_zip_code_mfd : $update;
			$pref_code_mfd    = ($old_pref_code == $pref_code) ? $old_pref_code_mfd : $update;
			$address_mfd      = ($old_address == $address) ? $old_address_mfd : $update;
			$tel_mfd          = ($old_tel == $tel) ? $old_tel_mfd : $update;
			$fax_mfd          = ($old_fax == $fax) ? $old_fax_mfd : $update;
			$URL_mfd          = ($old_URL == $url) ? $old_URL_mfd : $update;
			$comment_mfd      = ($old_comment == $comment) ? $old_comment_mfd : $update;
			$photo_mfd        = ($old_photo == $photo) ? $old_photo_mfd : $update;

			// 更新判定
			if ($modified != $modified1) {
				$modified = $modified1;
			} else {
				if (
					$old_show_web != $show_web || $old_company_name != $company_name || $old_contact != $contact || $old_email != $email || $old_zip_code != $zip_code || $old_pref_code != $pref_code
					|| $old_address != $address || $old_tel != $tel || $old_fax != $fax || $old_URL != $url || $old_photo != $photo || $old_comment != $comment
				) {
					$modified = $update;
				}
			}
			// mysqli_query($conn, "SET sql_mode = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");
			// Model::getDB()->query("SET sql_mode = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");
		// ↓↓　<2023/05/08> <YenNhiTran> <Change for MYSQL8>
			// User::setPDO("SET sql_mode = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");
			User::setPDO("SET sql_mode = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION'");
		// ↑↑　<2023/05/08> <YenNhiTran> <Change for MYSQL8>

			$sql = "UPDATE infos_{$table} SET
                show_web         = '{$show_web}',
                show_web_mfd     = '{$show_web_mfd}',
                Email            = '{$email}',
                Email_mfd        = '{$email_mfd}',
                zip_code         = '{$zip_code}',
                zip_code_mfd     = '{$zip_code_mfd}',
                pref_code        = {$pref_code},
                pref_code_mfd    = '{$pref_code_mfd}',
                tel              = '{$tel}',
                tel_mfd          = '{$tel_mfd}',
                fax              = '{$fax}',
                fax_mfd          = '{$fax_mfd}',
                URL              = '{$url}',
                URL_mfd          = '{$URL_mfd}',
                photo            = '{$photo}',
                photo_mfd        = '{$photo_mfd}',
                modified         = '{$modified}',
                company_name     = '{$company_name}',
                company_name_mfd = '{$company_name_mfd}',
                contact          = '{$contact}',
                contact_mfd      = '{$contact_mfd}',
                comments         = '{$comment}',
                comment_mfd      = '{$comment_mfd}',
                address          = '{$address}',
                address_mfd      = '{$address_mfd}'{$query_custom} where {$table}_id = '{$id}'";
			$sql = str_replace("\r\n", "", $sql);
			while (strpos($sql, "  ") !== false) {
				$sql = str_replace("  ", " ", $sql);
			}
		}

		// テストデータの処理
		$obj['stcustomer_code'] = $id;
		$obj['stshow_web']      = $show_web;
		$obj['stcompany_name']  = $company_name;
		$obj['stcontact']       = $contact;
		$obj['stEmail']         = $email;
		$obj['stzip_code']      = $zip_code;
		$obj['stpref_code']     = $pref_code;
		$obj['staddress']       = $address;
		$obj['sttel']           = $tel;
		$obj['stfax']           = $fax;
		$obj['stURL']           = $url;
		$obj['stcomment']       = $comment;
		$obj['exceptId']        = $id;

		// 会員情報が存在するかチェック
		if (CheckRegisterMember((object)$obj, $pro_id) == true) {
			return $obj['error'];
		}

		// 掲載写真データ
		if ($edit_img == 1) {
			$img_upload = "{$img}.jpg";
			$image_name = "{$id}.jpg";

			$path_temp  = __DIR__ . "/../../../public" . "/assets/images/uploads/profile/images_{$table}/temp/";
			$path_thumb = __DIR__ . "/../../../public" . "/assets/images/uploads/profile/images_{$table}/thumbnail/";
			copy($path_temp . $img_upload, $path_thumb . $img_upload);
			rename($path_temp . $img_upload, $path_temp . $image_name);
			rename($path_thumb . $img_upload, $path_thumb . $image_name);
			createThumbnail($image_name, 200, 200, $path_thumb, $path_thumb);

			$query_img = "SELECT * FROM img_{$table} WHERE {$table}_id= '{$id}'";
			// $rows_img  = getNumRows($conn, $query_img);
			$rows_img = User::getQuery($query_img, false, true);
			if ($rows_img == 0) {
				$query_proimg = "INSERT INTO img_{$table} ({$table}_id, img_name) VALUES('{$id}','{$image_name}')";
				// mysqli_query($conn, $query_proimg);
				User::prepareQuery($query_proimg);
			}
		}

		// SQL　実行
		// $affect_row = sqlExec($conn, $sql);
		$affect_row = User::execQuery($sql);
		// echo "<br>" . "affect_row" . $affect_row;
		if ($affect_row > 0 && $page_sbm === false) {
			$query_area = "SELECT pref_name FROM prefectures WHERE pref_code = {$pref_code}";
			// $row        = getRow($conn, $query_area);
			$row        = User::getQuery($query_area, false, false);
			$pref_name  = $row['pref_name'];

			$web = ($show_web == 1) ? "掲載する" : "掲載しない";
			$photo1 = ($photo == 1) ? "あり" : "なし";

			$body = str_replace('$company_name', $company_name, $body);
			$body = str_replace('$id', $id, $body);
			$body = str_replace('$web', $web, $body);
			$body = str_replace('$contact', $contact, $body);
			$body = str_replace('$zip_code', $zip_code, $body);
			$body = str_replace('$pref_name', $pref_name, $body);
			$body = str_replace('$address', $address, $body);
			$body = str_replace('$tel', $tel, $body);
			$body = str_replace('$fax', $fax, $body);
			$body = str_replace('$url', $url, $body);
			$body = str_replace('$email', $email, $body);
			$body = str_replace('$comment', $comment, $body);
			$body = str_replace('$photo1', $photo1, $body);

			// メール内容
			global $SMTP_SERVER_SORIMACHI_NAME, $USER_SMTP_SERVER_SORIMACHI, $PASS_SMTP_SERVER_SORIMACHI;

			// 処理変更(2020/09/26 Kentaro.Watanabe)
			$bcc_pro_id = ($pro_id == SOSP) ? '2' : (($pro_id == SOUP) ? '3' : '1');
			$query      = "SELECT * FROM bcc WHERE pro_id=" . $bcc_pro_id;
			// $query      = "SELECT * FROM bcc WHERE pro_id=" . $pro_id;
			// $row        = getRow($conn, $query);
			$row        = User::getQuery($query, false, false);

			$arg["Host"]         = $SMTP_SERVER_SORIMACHI_NAME;
			$arg["Port"]         = 587;
			$arg["Username"]     = $USER_SMTP_SERVER_SORIMACHI;
			$arg["Password"]     = $PASS_SMTP_SERVER_SORIMACHI;
			$arg["From"]["Mail"] = $row['FromEmail'];
			$arg["From"]["Name"] = $row['FromName'];
			$arg["To"]["Mail"]   = $email;
			$arg["BCC"]          = $row['bcc'];
			$arg["Subject"]      = $subject;
			$arg["Body"]         = $body;
			// return sendMailPHPMailer($arg);
			// try {
			$send = send_mail_PHPMailer($arg["To"]["Mail"], $arg["Subject"], $arg["Body"], $arg["From"]["Mail"]);
			// $send = send_mail_PHPMailer("nguyentrungquan65@gmail.com", $arg["Subject"], $arg["Body"], "khanhvandinhkhanh1@gmail.com");
			// } catch (\Throwable $th) {
			//     throw new Exception($th->getMessage());
			// } catch(Exception $e){
			//     throw new Exception($e->getMessage());
			// }
			if ($send)
				return 'ttrue';
			else
				return 'ffalse';
		}
		// mysqli_close($conn);
	}
}
