<?php
    // --------------------------------------------------
    // 関数名 getPrefNameJIS
    // 説　明 都道府県名取得関数
    // 引　数 vPrefCode: 都道府県コード
    // 戻り値 都道府県名
    // --------------------------------------------------
    function getPrefNameJIS($vPrefCode) {
        $myStr = "";
        switch($vPrefCode) {
            case 1:
                $myStr = "北海道";
                break;
            case 2:
                $myStr = "青森県";
                break;
            case 3:
                $myStr = "岩手県";
                break;
            case 4:
                $myStr = "宮城県";
                break;
            case 5:
                $myStr = "秋田県";
                break;
            case 6:
                $myStr = "山形県";
                break;
            case 7:
                $myStr = "福島県";
                break;
            case 8:
                $myStr = "茨城県";
                break;
            case 9:
                $myStr = "栃木県";
                break;
            case 10:
                $myStr = "群馬県";
                break;
            case 11:
                $myStr = "埼玉県";
                break;
            case 12:
                $myStr = "千葉県";
                break;
            case 13:
                $myStr = "東京都";
                break;
            case 14:
                $myStr = "神奈川県";
                break;
            case 19:
                $myStr = "山梨県"; 
                break;
            case 20:
                $myStr = "長野県";
                break;
            case 15:
                $myStr = "新潟県";
                break;
            case 16:
                $myStr = "富山県";
                break;
            case 17:
                $myStr = "石川県";
                break;
            case 18:
                $myStr = "福井県";
                break;
            case 21:
                $myStr = "岐阜県";
                break;
            case 22:
                $myStr = "静岡県";
                break;
            case 23:
                $myStr = "愛知県";
                break;
            case 24:
                $myStr = "三重県";
                break;
            case 25:
                $myStr = "滋賀県";
                break;
            case 26:
                $myStr = "京都府";
                break;
            case 27:
                $myStr = "大阪府";
                break;
            case 28:
                $myStr = "兵庫県";
                break;
            case 29:
                $myStr = "奈良県";
                break;
            case 30:
                $myStr = "和歌山県";
                break;
            case 31:
                $myStr = "鳥取県";
                break;
            case 32:
                $myStr = "島根県";
                break;
            case 33:
                $myStr = "岡山県";
                break;
            case 34:
                $myStr = "広島県";
                break;
            case 35:
                $myStr = "山口県";
                break;
            case 36:
                $myStr = "徳島県";
                break;
            case 37:
                $myStr = "香川県";
                break;
            case 38:
                $myStr = "愛媛県";
                break;
            case 39:
                $myStr = "高知県";
                break;
            case 40:
                $myStr = "福岡県";
                break;
            case 41:
                $myStr = "佐賀県";
                break;
            case 42:
                $myStr = "長崎県";
                break;
            case 43:
                $myStr = "熊本県";
                break;
            case 44:
                $myStr = "大分県";
                break;
            case 45:
                $myStr = "宮崎県";
                break;
            case 46:
                $myStr = "鹿児島県";
                break;
            case 47:
                $myStr = "沖縄県";
                break;
            default:
                $myStr = "error";
                break;
        }
        return $myStr;
    }

    // 日付（日本形式）
    function formatYMD($date, $option = 'Y/m/d') {
        return date($option, strtotime($date));
    }
?>
