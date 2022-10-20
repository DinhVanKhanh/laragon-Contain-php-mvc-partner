<?php

namespace App\Controllers\Maintenance;

use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
// ----------------------------------------------------------'
// パラメータ設定
// ----------------------------------------------------------'
define("Wk_txtfile", __DIR__ . "/../../data/shop.csv");

// 列番号
define("COL_OFFICE", 0);        // 会員名
define("COL_PREF", 1);        // 都道府県コード
define("COL_ADDR", 2);        // 住所
define("COL_TEL", 3);            // TEL
define("COL_ISDEMO", 4);        // デモあり
define("COL_ISSTAND", 5);        // 常備あり
define("COL_RNUMBER", 6);        // 通しNo.
define("DEFAULT_NUMBER_OF_PAGE", 50);        // 通しNo.

class ShopSearchController extends \Core\Controller
{
    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        if ( $_SERVER["REQUEST_METHOD"] !== "POST") {
            header("Location: /partner/shop/search/");
        }
        $Wk_komoku = '';
        $Wk_address_s = (isset($_POST['address1'])) ? trim($_POST['address1']) : '';
        $result = [];
        $total_pages = 0;
        $search_condition = (isset($_POST['condition']) && trim($_POST['condition']) !== "") ? trim($_POST['condition']) : '';
        $this->address($Wk_komoku, $Wk_address_s, $search_condition);
        
        //pagination
        $Wk_komoku = explode(chr(10) . chr(13), $Wk_komoku);
        $total_records = count($Wk_komoku) - 1;
        $page = (isset($_POST['page']) && is_numeric($_POST['page']) && !isset($_POST['flag_search'])) ? $_POST['page'] : 0;
        $action = (isset($_POST['action']) && is_numeric($_POST['action'])) ? $_POST['action'] : 0;
        $pagination = $this->pagination($total_records, $page, $action, DEFAULT_NUMBER_OF_PAGE);
        $Wk_komoku_s = array_slice($Wk_komoku, $pagination['offset_start'], DEFAULT_NUMBER_OF_PAGE); // 区切り文字を改行に変更
        foreach ($Wk_komoku_s as $komoku) {
            if ($komoku != "") {
                // フィールドに分割
                $k_data = $this->GetCSV($komoku);    //<-フィールド内カンマ処理他
                // 店頭デモあり
                if (isset($k_data[COL_ISDEMO]) && strval(trim($k_data[COL_ISDEMO])) == "1") {
                    $k_data['vIsDemo'] = "●";
                } else {
                    $k_data['vIsDemo'] = "&nbsp;";
                }
                
                // 常備マーク
                if (isset($k_data[COL_ISSTAND]) && strval(trim($k_data[COL_ISSTAND])) == "1") {
                    $k_data['vIsStand'] = "★";
                }
                $result[] = $k_data;
            }
        }
        $page = $pagination['current_page'];
        $total_pages = $pagination['total_pages'];
        $namePage = "ソリマチ製品取り扱い店舗検索｜ソリマチ株式会社";

        View::render('shop/result.php', compact('namePage', 'page', 'total_pages', 'Wk_address_s', 'result', 'search_condition', 'total_records'));
    }
    // ----------------------------------------------------------'
    // 都道府県検索
    // ----------------------------------------------------------'
    function address(&$Wk_komoku, $Wk_address_s, $search_condition)
    {
        
        $Wk_key = 0;
        
        //エラーチェック
        $Wk_key = explode(":", $Wk_address_s);
        
        $Wk_key[0] = ltrim($Wk_key[0]);
        
        $file_data = realpath(Wk_txtfile);
        
        $data = fopen($file_data, "r") or die("Can't open file");
        
        while (!feof($data)) {
            $Wk_line = fgets($data);
            if (trim($Wk_line) != "") {
                $Wk_line_s = $this->GetCSV($Wk_line); //フィールド内カンマ処理他;
                // エリア・店頭デモ検索
                if ($Wk_key[0] == (int)$Wk_line_s[1] && $this->CheckDemo(@$_POST["demo"], $Wk_line_s)) {
                    if ($search_condition === "") {
                        $Wk_komoku .= $Wk_line . chr(10) . chr(13);
                    } else {
                        if (strpos($Wk_line_s[COL_OFFICE], $search_condition) !== false || strpos($Wk_line_s[COL_ADDR], $search_condition) !== false) {
                            $Wk_komoku .= $Wk_line . chr(10) . chr(13);
                        }
                    }
                }
            }
        }
        fclose($data);
    }
    // ----------------------------------------------------------'
    //  関数名 CheckDemo
    //  説　明 店頭デモチェック
    //  引　数 vCheck: 店頭デモを検索条件に加える？
    //         arrLine: 検索対象となるレコード
    //  戻り値 店頭デモ有無
    // ----------------------------------------------------------'
    function CheckDemo($vCheck, $arrLine)
    {
        $blnRet = true;
        if (strval(trim($vCheck)) == "1") {
            if (strval(trim($arrLine[COL_ISDEMO])) != "1") {
                $blnRet = false;
            }
        }
        return $blnRet;
    }

    function pagination(&$total_records, &$page, &$action, $default_number_records)
    {
        //action: next or prev page, action = 0 is first page, = 1 means next page, = -1 means previous page
        $pagination = [];
        $current_page = ($action == 0) ? $page : $page + $action;
        $offset_start_of_page = $default_number_records * $current_page;
        $pagination = [];
        $pagination['current_page'] = $current_page;
        $pagination['offset_start'] = $offset_start_of_page;
        $pagination['total_pages'] = ($total_records % $default_number_records !== 0) ? ceil($total_records / $default_number_records) : $total_records / $default_number_records;
        return $pagination;
    }

    function GetCSV(&$s)
    {
        $r = explode(",", $s);
        return $r;
    }

}
