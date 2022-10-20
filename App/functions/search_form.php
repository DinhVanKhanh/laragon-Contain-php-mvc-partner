<?php

use \App\Models\User;
// use PDO;

    // require_once __DIR__ . "/../../../../../../../common_files/connect_db.php";
    require_once __DIR__ . '/../../../../common_files/security.php';

    date_default_timezone_set('Asia/Tokyo');
    define('SAAG', 1);
    define('SOSP', 2);
    define('SOUP', 3);

    // Kentaro.Watanabe 2020/09/03
    define('LogPath', __DIR__ . "/../../../../../data/logs/partner/maintenance_".date("Y")."_". date("m").".txt");    // define('LogPath', __DIR__ . "/../../../../../../logs/partner/maintenance_".date("Y")."_". date("m").".txt");

    // 画面表示
    function loadForm($pro_id, $main_id) {
        $table = ($pro_id == SOSP) ? 'sosp' : (($pro_id == SOUP) ? 'soup' : 'saag');
        $sql   = "SELECT * FROM infos_{$table} WHERE {$table}_id = {$main_id}";
        $path  = "/assets/images/uploads/profile/images_{$table}/";

        // 初期値
        $arr_infos[] = '';
        $edit        = 0;

        // 会員情報取得
        $row = User::getQuery($sql,false,false);

        if ($row === false) {
            $areaOption = listArea();
            $arr_photo  = '<img src="/assets/images/uploads/profile/dummy.jpg" width = "160">';
        }
        else {
            $edit       = 1;
            $code       = $row['pref_code'];
            $areaOption = listArea($code);

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

            switch ($pro_id) {
                case SAAG:
                    $arr_infos['saag_id']        = trim($row['saag_id']);
                    $arr_infos['info_type']      = $row['info_type'];
                    $arr_infos['campaign1']      = $row['campaign1'];
                    $arr_infos['member_name']    = $row['member_name'];
                    $arr_infos['qualifications'] = preg_replace('/, /', ',', preg_replace('/　/', '', preg_replace('/\s\s+/', '　', trim($row['qualifications'])) ) );
                    $arr_infos['products']       = preg_replace( '/, /', ',', preg_replace( '/ /', '', preg_replace('/\s\s+/', '　', trim($row['products'])) ) );
                    $arr_infos['areas']          = $row['areas'];
                    $arr_infos['comment']        = $row['comments'];
                    $arr_infos['customer_code']  = $row['customer_code'];
                    break;

                case SOSP:
                    $arr_infos['sosp_id']     = $row['sosp_id'];
                    $arr_infos['sbm_flag']    = $row['sbm_flag'];
                    $arr_infos['Email_open']  = $row['Email_open'];
                    $arr_infos['demospace']   = $row['demospace'];
                    $arr_infos['visit_guide'] = $row['visit_guide'];
                    break;

                case SOUP:
                    $arr_infos['soup_id']      = $row['soup_id'];
                    $arr_infos['sbm_flag']     = $row['sbm_flag'];
                    $arr_infos['school_flag']  = $row['school_flag'];
                    $arr_infos['soi_products'] = $row['soi_products'];
                    $arr_infos['Email_open']   = $row['Email_open'];
                    $arr_infos['areas']        = $row['areas'];
                    break;
            }

            // 画像取得
            $arr_photo = loadPhoto($arr_infos['photo'], $path, $pro_id, $main_id);
            if ( is_bool($arr_photo) ) {
                return '画像ファイルを開けませんでした。';
            }
        }

        return [$arr_infos, $areaOption, $arr_photo, $edit];
    }

    // 都道府県リスト作成
    function listArea($code='') {
        // $conn = ConnectPartner();
        $sql  = "SELECT pref_code, pref_name FROM prefectures";
        // $result = mysqli_query($conn, $sql);
        $result = User::getQuery($sql, true, false);
        // echo '<pre>';
        // print_r($result);
        // echo '<pre>';
        $areaOption = "<option value=0>都道府県を選択してください。</option>";
        // while ( $row = mysqli_fetch_array($result) ) {
        //     $pref_code   = $row['pref_code'];
        //     $pref_name   = $row['pref_name'];
        //     $areaOption .= "<option value='" . $pref_code . "'" . ((!empty($code) && $pref_code == $code) ? " selected='true'" : '') . ">" . $pref_name . "</option>";
        // }
        foreach ($result as $row) {
            $pref_code   = $row['pref_code'];
            $pref_name   = $row['pref_name'];
            $areaOption .= "<option value='" . $pref_code . "'" . ((!empty($code) && $pref_code == $code) ? " selected='true'" : '') . ">" . $pref_name . "</option>";
        }
        
        // mysqli_free_result($result);
        // mysqli_close($conn);
        return $areaOption;
    }

    // 画像取得
    function loadPhoto($photo, $path, $pro_id, $main_id) {
        $table = ($pro_id == SOSP) ? 'sosp' : (($pro_id == SOUP) ? 'soup' : 'saag');
        $query_img = "SELECT * FROM img_{$table} WHERE {$table}_id = {$main_id}";

        // 画像の存在チェック
        // $conn = ConnectPartner();
        // $row  = getRow($conn, $query_img);
        $row = User::getQuery($query_img,false,false);
        if ( $photo == 0 || $row == 0 ) {
            return "<img src='/assets/images/uploads/profile/dummy.jpg' width='160'>";
        }

        $path_thumb = __DIR__ . "/../../public" . "{$path}thumbnail/";
    
        $fp_thumb = opendir($path_thumb);
        if (!$fp_thumb) {
            return "<img src='/assets/images/uploads/profile/dummy.jpg' width='160'>";
        }

        while ($file = readdir($fp_thumb)) {
            if ($file != '.' && $file != '..') {
                if (is_file($path_thumb . $file)) {
                    $img_name = $row['img_name'];
                    list($txt, $ext) = explode(".", $img_name);
                    $pos = strpos($file, $txt);
                    if ($pos !== false) {
                        return "<img src='".$path.'thumbnail/'.$img_name."?v=".rand(0, 100)."' width='160'>";
                    }
                }
            }
        }
        // mysqli_close($conn);
    }

    // 画像削除
    function flagDelete($pro_id, $table, $main_id, $del_img) {
        $path = __DIR__ . "/../../public/assets/images/uploads" . '/profile/images_'.(($pro_id == SOSP) ? 'sosp/' : (($pro_id == SOUP) ? 'soup/' : 'saag/'));
        $path_temp = $path.'temp/';
        $path_thumb =  $path.'thumbnail/';

        if ($del_img != '') {
            $fp_thumb  = opendir($path_thumb);
            if ($fp_thumb) {
                while ($file = readdir($fp_thumb)) {
                    if (is_file($path_thumb . $file)) {
                        list($txt, $ext) = explode(".", $file);
                        $pos = strpos($txt, $main_id);
                        if ($pos !== false) {
                            unlink($path_temp . $file);
                            unlink($path_thumb . $file);
                        }
                    }
                }
            }
            // $conn = ConnectPartner();
            $query_img  = "DELETE FROM img_{$table} WHERE {$table}_id=".$main_id;
            // mysqli_query($conn, $query_img);
            echo "delete flagDelete:" . User::execQuery($query_img,false,false);
        }
    }

    // 会員情報が存在するかチェック
    function CheckRegisterMember($obj, $pro_id) {
        $query_custom = '';
        switch ($pro_id) {
            case SAAG:
                $query = "SELECT * FROM infos_saag WHERE 1=1";
                if ( !empty($obj->stinfo_type) ) {
                    $query_custom .= " and info_type = '".$obj->stinfo_type."'";
                }
                if ( !empty($obj->stqualifications) ) {
                    $query_custom .= " and qualifications = '".$obj->stqualifications."'";
                }
                if ( !empty($obj->stproducts) ) {
                    $query_custom .= " and products = '".$obj->stproducts."'";
                }
                if ( !empty($obj->stareas) ) {
                    $query_custom .= " and areas = '".$obj->stareas."'";
                }
                if ( !empty($obj->exceptId) ) {
                    $query_custom .= " and saag_id <> ".$obj->exceptId;
                }
                break;

            case SOSP:
                $query = "SELECT * FROM infos_sosp WHERE 1=1";
                if ( !empty($obj->stsbm_flag) ) {
                    $query_custom .= " and sbm_flag = '".$obj->stsbm_flag."' ";
                }
                if ( !empty($obj->exceptId) ) {
                    $query_custom .= " and sosp_id <> " .$obj->exceptId;
                }
                break;

            case SOUP:
                $query = "SELECT * FROM infos_soup WHERE 1=1";
                if ( !empty($obj->stsbm_flag) ) {
                    $query_custom .= " and sbm_flag = '".$obj->stsbm_flag."' ";
                }
                if ( !empty($obj->stschool_flag) ) {
                    $query_custom .= " and school_flag = '".$obj->stschool_flag."' ";
                }
                if ( !empty($obj->exceptId) ) {
                    $query_custom .= " and soup_id <> " .$obj->exceptId;
                }
                break;
        }

        // 他の条件
        if ( !empty($obj->stcustomer_code) ) {
            $query .= " and customer_code = '".$obj->stcustomer_code."' ";
        }
        if ( !empty($obj->stcompany_name) ) {
            $query .= " and company_name = '".$obj->stcompany_name."' ";
        }
        if ( !empty($obj->stzip_code) ) {
            $query .= " and zip_code = '".$obj->stzip_code."' ";
        }
        if ( !empty($obj->stpref_code) ) {
            $query .= " and pref_code = '".$obj->stpref_code."' ";
        }
        if ( !empty($obj->sttel) ) {
            $query .= " and tel = '".$obj->sttel."' ";
        }
        if ( !empty($obj->staddress) ) {
            $query .= " and address = '".$obj->staddress."' ";
        }
        $query .= $query_custom;

        // $conn   = ConnectPartner();
        // $result = mysqli_query($conn, $query);
        // $rows   = mysqli_fetch_array($result);
        // mysqli_close($conn);
        $rows = User::getQuery($query,false,true);
        if ( $rows > 0 ) {
            return true;
        }
        return false;
    }

    // --------------------------------------------------
    // 画像関数
    // --------------------------------------------------
    // 画像アップロード
    function uploadImage($pro_id) {
        // 拡張子
        $curPdf = $_POST['curPdf'];
        if ( !empty($curPdf) ) {
            $fileType = pathinfo($curPdf, PATHINFO_EXTENSION);
            if ( $fileType != "jpg" && $fileType != "jpeg" && $fileType != "png" && $fileType != "gif" && $fileType != "bmp"
              && $fileType != "JPG" && $fileType != "BMP" ) {
                return "画像ファイルが有効ではありません。";
            }
        }

        // ファイルサイズ
        if ( $_FILES["file"]["size"] > 2000000 ) {
            return "画像ファイルのサイズはxxMBまでです。";
        }

        if ( $_FILES['file']['error'] == 0 ) {

            $path = '/assets/images/uploads/profile/images_'.(($pro_id == SOSP) ? 'sosp/' : (($pro_id == SOUP) ? 'soup/' : 'saag/'));
            $upload = __DIR__ . '/../../public' . $path;
            if ( !file_exists($upload) ) {
                mkdir($upload);
            }

            $upload_temp = __DIR__ . '/../../public' . $path . 'temp/';
            if ( !file_exists($upload_temp) ) {
                mkdir($upload_temp);
            }

            // アップロード
            $filename = ( !empty($_FILES["file"]["name"]) ) ? $_FILES["file"]["name"] : '';
            list($txt, $ext) = explode(".", $filename);
            if ( !empty($filename) ) {
                $valid_formats = array("bmp", "BMP");
                $change_img    = $txt.".jpg";
                $old_file      = $upload_temp.$filename;
                $new_file      = $upload_temp.$change_img;

                error_reporting(E_ALL);
                if ( !move_uploaded_file($_FILES["file"]["tmp_name"], $old_file) ) {
                    goto Error;
                }
                rename($old_file, $new_file);

                // 画像変換
                if (in_array($ext, $valid_formats)) {
                    convertImage($new_file, $new_file, 50);
                }
                $arr_photo ='<img src="'.$path.'temp/'.$change_img.'" width = "160" class="2">';
            }

            $result['photo']     = $arr_photo;
            $result['changeimg'] = $txt;
            $result['success']   = true;
            return $result;
        }

        Error:
        return "画像ファイルのアップロードに失敗しました。";
    }

    // 画像変換
    function convertImage($srcImg, $dstImage, $quality) {
        $tmp = explode('.', $srcImg);
        $ext = $tmp[count($tmp) - 1];
        $ext = strtolower($ext);

        if ( preg_match('/jpg|jpeg/i',$ext) ) {
            $tmpImage = imagecreatefromjpeg($srcImg);
        }
        else if ( preg_match('/png/i',$ext) ) {
            $tmpImage = imagecreatefrompng($srcImg);
        }
        else if ( preg_match('/gif/i',$ext) ) {
            $tmpImage = imagecreatefromgif($srcImg);
        }
        else if ( preg_match('/bmp/i',$ext) ) {
            $tmpImage = imagecreatefromwbmp($srcImg);
        }
        else {
            return 0;
        }

        imagejpeg($tmpImage, $dstImage, $quality);
        imagedestroy($tmpImage);
        return 1;
    }

    // 画像サムネイル
    function createThumbnail($img, $newWidth, $newHeight, $uploadDir, $moveToDir) {
        $path = $uploadDir.$img;
        $mime = getimagesize($path);
        switch ($mime['mime']) {
            case 'image/jpg':
            case 'image/jpeg':
            case 'image/pjpeg':
                $src_img = imagecreatefromjpeg($path);
                break;
            case 'image/png':
                $src_img = imagecreatefrompng($path);
                break;
            case 'image/gif':
                $src_img = imagecreatefromgif($path);
                break;
            case 'image/bmp':
                $src_img = imagecreatefromwbmp($path);
                break;
        }

        // サイズ制御
        $old_x = imageSX($src_img);
        $old_y = imageSY($src_img);
        if ( $old_x > $old_y ) {
            $thumb_w = $newWidth;
            $thumb_h = $old_y * ($newHeight / $old_x);
        }
        else if ( $old_x < $old_y ) {
            $thumb_w = $old_x * ($newWidth / $old_y);
            $thumb_h = $newHeight;
        }
        else {
            $thumb_w = $newWidth;
            $thumb_h = $newHeight;
        }
        $dst_img = ImageCreateTrueColor($thumb_w, $thumb_h);
        $white   = imagecolorallocate($dst_img, 255, 255, 255);
        imagefill($dst_img, 0, 0, $white);
        imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $thumb_w, $thumb_h, $old_x, $old_y);

        // 拡張子
        $valid_formats = array("jpeg", "pjpeg", "png","gif", "bmp");
        list($txt, $ext) = explode(".", $img);
        if ( in_array($ext, $valid_formats) ) {
            $img = $txt.".jpg";
        }

        // サムネイル
        $result = ($mime['mime']=='image/bmp') ? imagebmp($dst_img, $moveToDir.$img, 80) : imagejpeg($dst_img, $moveToDir.$img, 80);
        imagedestroy($dst_img);
        imagedestroy($src_img);
        return $result;
    }

    // 画像削除
    function deleteImage($pro_id) {
        $table = ($pro_id == SOSP) ? 'sosp' : (($pro_id == SOUP) ? 'soup' : 'saag');
        $path = __DIR__ . "/../../public/assets/images/uploads/profile/images_{$table}/";

        // $conn   = ConnectPartner();
        $query  = "SELECT * FROM img_{$table}";
        // $result = mysqli_query($conn, $query);
        $result = User::getQuery($query,true,false);
        $id = array();
        // while ($row = mysqli_fetch_assoc($result)) {
        //     $id[] = $row["{$table}_id"];
        // }
        foreach ($result as $row) {
            $id[] = $row["{$table}_id"];
        }

        if ( file_exists($path) ) {
            $path_temp = opendir($path.'temp/');
            if ($path_temp !== false) {
                while ($ftp_temp = readdir($path_temp)) {
                    if ($ftp_temp != '.' && $ftp_temp != '..') {
                        list($name, $ext) = explode('.', $ftp_temp);
                        if (!in_array($name, $id)) {
                            unlink($path.'temp/'.$ftp_temp);
                        }
                    }
                }
            }
        }
    }

    // URL形式
    function formatsURL($url) {
        $str = preg_replace('/\s\s+/', '　', trim($url));
        $str = preg_replace('/　/', '　', $str);
        $str = preg_replace("/'/", "’", $str);
        return !empty($str) ? $str : '';
    }

    // FAX形式
    function formatsFax($fax1, $fax2, $fax3) {
        return ( empty($fax1) || empty($fax2) || empty($fax3) ) ? "" : $fax1.'-'.$fax2.'-'.$fax3;
    }

    // 正確に文字列変換
    function replaceText($str) {
        $str = str_replace('/\s\s+/', '', trim($str));
        $str = str_replace('/--/', '', $str);
        $str = str_replace('/　/', '　', $str);
        $str = str_replace('/、/', ',', $str);
        $str = str_replace("/'/", "’", $str);
        $str = str_replace("/&quot;/", " ” ", $str);
        $str = str_replace("/&lpar;/", "（", $str);
        $str = str_replace("/&rpar;/", "）", $str);
        $str = str_replace("/&gt;/", "]", $str);
        $str = str_replace("/&lt;/", "[", $str);
        $str = str_replace("/UNI0N/", "", $str);
        $str = str_replace("/(from|select|insert|delete|where|drop table|show tables)/", "", $str);
        return trim(strip_tags($str));
    }

    // saltinfo
    function saltinfo() {
        $filename = __DIR__ . "/../../../../../../../common_files/salt.txt";
        $myfile = fopen($filename, "r") or die("Unable to open file!");
        $tokenSecret = fread($myfile, filesize($filename));
        fclose($myfile);
        return hash_hmac('sha256', $tokenSecret, 'A really strong static key goes here!');
    }

    function WriteLog($body) {
        file_put_contents(LogPath, $body.PHP_EOL, FILE_APPEND | LOCK_EX);
    }

    function GetClientIP(){
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipAddr = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipAddr = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipAddr = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipAddr = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipAddr = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipAddr = $_SERVER['REMOTE_ADDR'];
        else
            $ipAddr = 'UNKNOWN';
        return $ipAddr;
    }
?>