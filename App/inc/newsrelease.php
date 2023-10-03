<?php
use App\Models\NewsRelease;

require __DIR__ . "/common.php";
// '**********************************************************************
// '*
// '*  ニュースリリースに関する共通設定ファイルです。(KENTAROWatanabe)
// '*    [本サーバー運用開始]    : 2012/11/12
// '*    [テストサーバー運用開始]: 2012/10/27
// '*    [製品プッシュ配信追加]   : 2013/10/20
// '*
// '*
// '*   [NRCategory: 記事カテゴリー]
// '*       1   : お知らせ
// '*       2   : 制度改正情報
// '*       11  : サポート又はパートナーのみに告知
// '*
// '*   [NRTarget: 掲載対象]
// '*       101 : 農業トップ
// '*       201 : SMBトップ
// '*       202 : NPO・介護事業所トップ
// '*       203 : 会計事務所トップ
// '*       211 : SAAG
// '*       212 : SOSP
// '*       213 : SOUP
// '*       221 : SMBサポート
// '*       501 : 会社案内
// '*       502 : オンラインショップ
// '*
// '*       15シリーズ以降の製品（sim:accstd15 等）
// '*
// '**********************************************************************

// VinhDao ニュースリリース管理 会員サイト 修正↓
    // PHP移行check : Vietnam未使用 (2019/03/07 VinhDao)
    // ニュースリリース一覧で年が指定されている場合はその値を取得します
    // function variable_newrealease() {
    //     $pNROpenYear = @$_GET["y"];
    //     $NROpenYear = ($pNROpenYear == "") ? date("y") : $pNROpenYear;
    // }

    // PHP移行check : Vietnam未使用 (2019/03/07 VinhDao)
    // ログイン状態かどうかをチェックします。
    // $AccessIPAddress = "";
    // function CheckNRControlLogin() {
    //     if ( $WEBSERVER_FLG == 0 ) {
    //         $AccessIPAddress = $_SERVER["REMOTE_ADDR"];
    //     }
    // }
// VinhDao パートナー（SAAG/SOSP/SOUP）会員サイト 修正↑

// --------------------------------------------------
// 呼び出し元ごとにニュースリリースのリストを作成します。
//     必要な値: NRTarget（掲載ページ）
//              NRCategory（記事カテゴリー）
//              NRNumber（記載件数）
// --------------------------------------------------
    function IncludeNewsreleaseList($NRTarget, $NRCategory, $NRNumber) {
        // PHP移行check : Vietnam未使用 (2019/03/07 VinhDao)
        //$Date = $NewsreleaseList = $NROpenYear = $WEBSERVER_FLG = "";
        global $WEBSERVER_FLG;
        $Conn = $RS = $objRS = $strSQL = $NRCount = "";
        $Today = date("Y-m-d");
        $SmallestDate = formatYMD(null, "Y-m-d");

        if ( $NRTarget == "101" || $NRTarget == "201" || $NRTarget == "202" || $NRTarget == "203" || $NRTarget == "501" ) {
            // $Conn = ConnectNewsRelease();
            $strSQL  = "SELECT DISTINCT Newsrelease.NRCode, Newsrelease.NRStopFlag,";
            $strSQL .= " Newsrelease.NRStartDate, Newsrelease.NREndDate,";
            $strSQL .= " Newsrelease.NRTitle, Newsrelease.NRLinkAddress, Newsrelease.NRSortValue";
            $strSQL .= "  FROM News_Summary Newsrelease, News_Target Target, News_Category Category, News_TargetMaster"; 
            $strSQL .= "  WHERE Newsrelease.NRCode = Target.NRCode";
            $strSQL .= "   AND Target.NRCode = Category.NRCode";
            $strSQL .= "   AND Target.NRTarget = '".$NRTarget."'";
            $strSQL .= "   AND Target.NRTarget = News_TargetMaster.NRTarget ";
            $strSQL .= "   AND News_TargetMaster.NRTargetClass = '001' ";
            // PHP移行check : Vietnam未使用 (2019/03/07 VinhDao)
            // if( $NewsreleaseList == 1 ) {
            //     $strSQL .= "   AND YEAR(Newsrelease.NRStartDate) = '".$NROpenYear."'";
            // }
            $strSQL .= ($NRCategory == "0") ? "   AND (Category.NRCategory = '1' OR Category.NRCategory = '2')" : "   AND Category.NRCategory = '".$NRCategory."'";
            // PHP移行check : Vietnam未使用 (2019/03/07 VinhDao)
            if( $WEBSERVER_FLG == 0 ) {
                $strSQL .= " AND DATE(Newsrelease.NRStartDate) <= '" . $Today . "'";
            }
            $strSQL .= "  ORDER BY Newsrelease.NRStartDate DESC, Newsrelease.NRSortValue DESC, Newsrelease.NRCode DESC";
            // $RS = mysqli_query($Conn, $strSQL);
            $RS = NewsRelease::getQuery($strSQL,true,false);

            $NRCount = 0;
            foreach ($RS as $objRS) {
                if ( $objRS["NRStopFlag"] == "0" ) {
                    $NREndDate = formatYMD($objRS["NREndDate"], "Y-m-d");
                    if ( $NREndDate == $SmallestDate || $NREndDate >= $Today ) {
                        $NRCount++;
    ?>
                        <li style="list-style:none;" class="clear">
                            <div class="title-news clear">
                                <div class="title-date"><font color="#333"><?php echo formatYMD($objRS["NRStartDate"]) ?></font></div>
                                <div class="title-text"><a href="<?php echo $objRS["NRLinkAddress"] ?>"><?php echo $objRS["NRTitle"] ?></a></div>
                            </div>
                        </li>
    <?php
                        if ( $NRCount == $NRNumber ) {
                            break;
                        }
                    }
                }
            }
            // while ( $objRS = mysqli_fetch_assoc($RS) ) {
            // }
            // mysqli_close($Conn);
        }
        else if ( $NRTarget == "" ) {
            $Conn = ConnectNewsRelease();
            $strSQL  = "SELECT DISTINCT Newsrelease.NRCode, Newsrelease.NRStopFlag,";
            $strSQL .= " Newsrelease.NRStartDate, Newsrelease.NREndDate,";
            $strSQL .= " Newsrelease.NRTitle, Newsrelease.NRLinkAddress, Newsrelease.NRSortValue";
            $strSQL .= "  FROM News_Summary Newsrelease, News_Target Target, News_Category Category";
            $strSQL .= "  WHERE Newsrelease.NRCode = Target.NRCode";
            $strSQL .= "   AND Target.NRCode = Category.NRCode";
            $strSQL .= "   AND Target.NRTarget IN ('101', '201', '202', '203', '501')";
            // PHP移行check : Vietnam未使用 (2019/03/07 VinhDao)
            // if ( $NewsreleaseList == 1 ) {
            //     $strSQL .= "   AND YEAR(Newsrelease.NRStartDate) = '".$NROpenYear."'";
            // }
            $strSQL .= "   AND (Category.NRCategory = '1' OR Category.NRCategory = '2')";
            $strSQL .= "  ORDER BY Newsrelease.NRStartDate DESC, Newsrelease.NRSortValue DESC, Newsrelease.NRCode DESC";
            $RS = mysqli_query($Conn, $strSQL);
            $NRCount = 0;

            while ( $objRS = mysqli_fetch_assoc($RS) ) {
                $NRStartDate = formatYMD($objRS["NRStartDate"], 'Y-m-d');
                if ( $NRStartDate <= $Today && $objRS["NRStopFlag"] == "0" ) {
                    $NREndDate = formatYMD($objRS["NREndDate"], "Y-m-d");
                    if ( $NREndDate == $SmallestDate || $NREndDate >= $Today ) {
                        $NRCount++;
?>
                            <li style="list-style:none;" class="clear">
                                <div class="title-news clear">
                                    <div class="title-date"><font color="#333"><?php echo formatYMD($objRS["NRStartDate"]) ?></font></div>
                                    <div class="title-text"><a href="<?php echo $objRS["NRLinkAddress"] ?>"><?php echo $objRS["NRTitle"] ?></a></div>
                                </div>
                            </li>
<?php
                        if ( $NRCount == $NRNumber ) {
                            break;
                        }
                    }
                }
            }
            mysqli_close($Conn);
        }
        else {
            // $Conn = ConnectNewsRelease();
            $strSQL  = "SELECT DISTINCT Newsrelease.NRCode, Newsrelease.NRStopFlag,";
            $strSQL .= " Newsrelease.NRStartDate, Newsrelease.NREndDate,";
            $strSQL .= " Newsrelease.NRTitle, Newsrelease.NRLinkAddress, Newsrelease.NRSortValue,";
            $strSQL .= " Target.NRTarget, Category.NRCategory";
            $strSQL .= "  FROM News_Summary Newsrelease, News_Target Target, News_Category Category";
            $strSQL .= "  WHERE Newsrelease.NRCode = Target.NRCode";
            $strSQL .= "   AND Target.NRCode = Category.NRCode";
            $strSQL .= "   AND Target.NRTarget = '".$NRTarget."'";
            // PHP移行check : Vietnam未使用 (2019/03/07 VinhDao)     
            // if ( $NewsreleaseList == 1 ) {
            //     $strSQL .= "   AND LEFT(Newsrelease.NRStartDate,4) = '".$NROpenYear."'";
            // }
            $strSQL .= "  ORDER BY Newsrelease.NRStartDate DESC, Newsrelease.NRSortValue DESC, Newsrelease.NRCode DESC";
            // $RS = mysqli_query($Conn, $strSQL);
            $RS = NewsRelease::getQuery($strSQL, true, false);

            $NRCount = 0;
            foreach ($RS as $objRS) {
                $NRStartDate = formatYMD($objRS["NRStartDate"], 'Y-m-d');
                if ( $NRStartDate <= $Today && $objRS["NRStopFlag"] == "0" ) {
                    $NREndDate = formatYMD($objRS["NREndDate"], 'Y-m-d');
    
                    if ( $NREndDate == $SmallestDate || $NREndDate >= $Today ) {
                        $NRCount++;
    ?>
                        <li style="list-style:none;">
                            <div class="title-news">
                                <div class="title-date"><font color="#333"><?php echo formatYMD($objRS["NRStartDate"]) ?></font></div>
                                <div class="title-text"><a href="<?php echo $objRS["NRLinkAddress"] ?>"><?php echo $objRS["NRTitle"] ?></a></div>
                            </div>
                        </li>
    <?php
                        if ( $NRCount == $NRNumber ) {
                            break;
                        }
                    }
                }
            }
            // while ( $objRS = mysqli_fetch_assoc($RS) ) {
            // }
            // mysqli_close($Conn);
        }
    }

// --------------------------------------------------
// 呼び出し元ごとにニュースリリースの本文を作成します。
//     必要な値: NRTarget（掲載ページ）
//              NRNumber（記載件数）
// --------------------------------------------------
    function IncludeNewsreleaseBody($NRTarget, $NRNumber, $typePage) {
        $Conn = $RS = $objRS = $strSQL = $NRCount = $vNRBody = "";
        $Today = date("Y-m-d");
        $SmallestDate = formatYMD(null, "Y-m-d");

        // $Conn = ConnectNewsRelease();
        $strSQL  = "SELECT DISTINCT Newsrelease.NRCode, Newsrelease.NRStopFlag,";
        $strSQL .= " Newsrelease.NRStartDate, Newsrelease.NREndDate,";
        $strSQL .= " Newsrelease.NRTitle, Newsrelease.NRBody, Newsrelease.NRLinkAddress,";
        $strSQL .= " Newsrelease.NRLinkAnchor, Newsrelease.NRSortValue,";
        $strSQL .= " Target.NRTarget, Category.NRCategory";
        $strSQL .= "  FROM News_Summary Newsrelease, News_Target Target, News_Category Category";
        $strSQL .= "  WHERE Newsrelease.NRCode = Target.NRCode";
        $strSQL .= "   AND Target.NRCode = Category.NRCode";
        $strSQL .= "   AND Target.NRTarget = '".$NRTarget."'";
        $strSQL .= "  ORDER BY Newsrelease.NRStartDate DESC, Newsrelease.NRSortValue DESC, Newsrelease.NRCode DESC";
        // $RS = mysqli_query($Conn, $strSQL);
        $RS = NewsRelease::getQuery($strSQL, true, false);

        $NRCount = 0;

        // $page = getDetailPage();
        $url = $typePage;
        foreach ($RS as $objRS) {
            $NRStartDate = formatYMD($objRS["NRStartDate"], 'Y-m-d');
            // 掲載日を過ぎていて、ストップフラグが経っていないもの
            // 掲載終了日を超えているものを省きたいが、なぜかできない…
            if ( ( $NRStartDate <= $Today) && ( $objRS["NRStopFlag"] == "0") && ( $objRS["NRLinkAnchor"] != "") ) {
                $NREndDate = formatYMD($objRS["NREndDate"], "Y-m-d");
                // 掲載終了日が記載されていなければ掲載ＯＫ
                if ( $NREndDate == $SmallestDate || $NREndDate >= $Today) {
                    $NRCount++;
    
                    // ソース記述部分
                    $vNRBody = $objRS["NRBody"];
                    echo "<!--News(START)-->";
                    echo "<div id='".$objRS["NRLinkAnchor"]."'>";
                    echo "<div class='row'><div class='News_".$url."'>".formatYMD($objRS["NRStartDate"])."</div>";
                    echo "<div style='padding:5px 0px'><h3>".$objRS["NRTitle"],"</h3></div>";
                    echo ReplaceBodyText($NRTarget, $vNRBody);
                    echo "</div></div>";
    
                    // 件数の上限に達したら処理を終了
                    if ( $NRCount == $NRNumber ) {
                        break;
                    }
                }
            }

        }
        // while ( $objRS = mysqli_fetch_assoc($RS) ) {
        // }
        // mysqli_close($Conn);
    }

// --------------------------------------------------
// 業務サポート頁、パートナー専用サイト
//     ※新製品が出るたびに追加する必要があるので要注意！
// --------------------------------------------------
    function ReplaceBodyText($vNRTarget, $vNRBody) {
        // サービスパックコードの置き換え（もっといい方法はないのか…）
        // ★新しい製品が出たら追加すること
        global $accper19_00_SP_CODE_No;
        global $accstd19_00_SP_CODE_No;
        global $accnpo19_00_SP_CODE_No;
        global $acccar19_00_SP_CODE_No;
        global $accmed19_00_SP_CODE_No;
        global $accnet19_00_SP_CODE_No;
        global $psl19_00_SP_CODE_No;
        global $sal19_00_SP_CODE_No;
        global $scl19_00_SP_CODE_No;
        global $accper18_00_SP_CODE_No;
        global $accstd18_00_SP_CODE_No;
        global $accnpo18_00_SP_CODE_No;
        global $acccar18_00_SP_CODE_No;
        global $accmed18_00_SP_CODE_No;
        global $accnet18_00_SP_CODE_No;
        global $psl18_00_SP_CODE_No;
        global $sal18_00_SP_CODE_No;
        global $scl18_00_SP_CODE_No;
        global $accper17_00_SP_CODE_No;
        global $accstd17_00_SP_CODE_No;
        global $accnpo17_00_SP_CODE_No;
        global $acccar17_00_SP_CODE_No;
        global $accmed17_00_SP_CODE_No;
        global $accnet17_00_SP_CODE_No;
        global $psl17_00_SP_CODE_No;
        global $sal17_00_SP_CODE_No;
        global $scl17_00_SP_CODE_No;
        global $accper16_00_SP_CODE_No;
        global $accstd16_00_SP_CODE_No;
        global $accnpo16_00_SP_CODE_No;
        global $acccar16_00_SP_CODE_No;
        global $accmed16_00_SP_CODE_No;
        global $accnet16_00_SP_CODE_No;
        global $psl16_00_SP_CODE_No;
        global $sal16_00_SP_CODE_No;
        global $scl16_00_SP_CODE_No;
        global $accper15_00_SP_CODE_No;
        global $accstd15_00_SP_CODE_No;
        global $accnpo15_00_SP_CODE_No;
        global $acccar15_00_SP_CODE_No;
        global $accmed15_05_SP_CODE_No;
        global $accnet15_00_SP_CODE_No;
        global $psl15_00_SP_CODE_No;
        global $sal15_00_SP_CODE_No;
        global $scl15_00_SP_CODE_No;
        global $postcode_AT_THE_DATE_OF;
        global $accper14_00_SP_CODE_No;
        global $accstd14_00_SP_CODE_No;
        global $accnpo14_00_SP_CODE_No;
        global $acccar14_00_SP_CODE_No;
        global $accnet14_00_SP_CODE_No;
        global $psl14_01_SP_CODE_No;
        global $psl14_00_SP_CODE_No;
        global $sal14_00_SP_CODE_No;
        global $scl14_00_SP_CODE_No;
        global $accper13_00_SP_CODE_No;
        global $accstd13_00_SP_CODE_No;
        global $accnpo13_00_SP_CODE_No;
        global $acccar13_00_SP_CODE_No;
        global $accnet13_00_SP_CODE_No;
        global $psl13_01_SP_CODE_No;
        global $psl13_00_SP_CODE_No;
        global $sal13_00_SP_CODE_No;
        global $scl13_00_SP_CODE_No;
        global $accper12_00_SP_CODE_No;
        global $accstd12_00_SP_CODE_No;
        global $accnpo12_00_SP_CODE_No;
        global $acccar12_00_SP_CODE_No;
        global $accnet12_00_SP_CODE_No;
        global $psl12_02_SP_CODE_No;
        global $psl12_00_SP_CODE_No;
        global $sal12_00_SP_CODE_No;
        global $scl12_00_SP_CODE_No;
        global $accper11_00_SP_CODE_No;
        global $accstd11_00_SP_CODE_No;
        global $accnpo11_00_SP_CODE_No;
        global $accnet11_00_SP_CODE_No;
        global $psl11_02_SP_CODE_No;
        global $psl11_00_SP_CODE_No;
        global $sal11_00_SP_CODE_No;
        global $scl11_00_SP_CODE_No;
        global $accp10_00_SP_CODE_No;
        global $acc10_00_SP_CODE_No;
        global $accn10_00_SP_CODE_No;
        global $accnet10_00_SP_CODE_No;
        global $psl10_01_SP_CODE_No;
        global $psl10_00_SP_CODE_No;
        global $sal10_00_SP_CODE_No;
        global $scl10_00_SP_CODE_No;
        global $accp9_00_SP_CODE_No;
        global $acc9_00_SP_CODE_No;
        global $accn9_00_SP_CODE_No;
        global $apr9_00_SP_CODE_No;
        global $psl9_01_SP_CODE_No;
        global $psl9_00_SP_CODE_No;
        global $sal9_00_SP_CODE_No;
        global $scl9_00_SP_CODE_No;

    // 2023/04 KhanhDinh - Change for PHP8 [start]
		//php 8.1 init variable
		$accper19_00_SP_CODE_No = $accper19_00_SP_CODE_No ?? "";
        $accstd19_00_SP_CODE_No = $accstd19_00_SP_CODE_No ?? "";
        $accnpo19_00_SP_CODE_No = $accnpo19_00_SP_CODE_No ?? "";
        $acccar19_00_SP_CODE_No = $acccar19_00_SP_CODE_No ?? "";
        $accmed19_00_SP_CODE_No = $accmed19_00_SP_CODE_No ?? "";
        $accnet19_00_SP_CODE_No = $accnet19_00_SP_CODE_No ?? "";
        $psl19_00_SP_CODE_No 	= $psl19_00_SP_CODE_No ?? "";
        $sal19_00_SP_CODE_No 	= $sal19_00_SP_CODE_No ?? "";
        $scl19_00_SP_CODE_No 	= $scl19_00_SP_CODE_No ?? "";
        $accper18_00_SP_CODE_No = $accper18_00_SP_CODE_No ?? "";
        $accstd18_00_SP_CODE_No = $accstd18_00_SP_CODE_No ?? "";
        $accnpo18_00_SP_CODE_No = $accnpo18_00_SP_CODE_No ?? "";
        $acccar18_00_SP_CODE_No = $acccar18_00_SP_CODE_No ?? "";
        $accmed18_00_SP_CODE_No = $accmed18_00_SP_CODE_No ?? "";
        $accnet18_00_SP_CODE_No = $accnet18_00_SP_CODE_No ?? "";
        $psl18_00_SP_CODE_No 	= $psl18_00_SP_CODE_No ?? "";
        $sal18_00_SP_CODE_No 	= $sal18_00_SP_CODE_No ?? "";
        $scl18_00_SP_CODE_No 	= $scl18_00_SP_CODE_No ?? "";
        $accper17_00_SP_CODE_No = $accper17_00_SP_CODE_No ?? "";
        $accstd17_00_SP_CODE_No = $accstd17_00_SP_CODE_No ?? "";
        $accnpo17_00_SP_CODE_No = $accnpo17_00_SP_CODE_No ?? "";
        $acccar17_00_SP_CODE_No = $acccar17_00_SP_CODE_No ?? "";
        $accmed17_00_SP_CODE_No = $accmed17_00_SP_CODE_No ?? "";
        $accnet17_00_SP_CODE_No = $accnet17_00_SP_CODE_No ?? "";
        $psl17_00_SP_CODE_No 	= $psl17_00_SP_CODE_No ?? "";
        $sal17_00_SP_CODE_No 	= $sal17_00_SP_CODE_No ?? "";
        $scl17_00_SP_CODE_No 	= $scl17_00_SP_CODE_No ?? "";
        $accper16_00_SP_CODE_No = $accper16_00_SP_CODE_No ?? "";
        $accstd16_00_SP_CODE_No = $accstd16_00_SP_CODE_No ?? "";
        $accnpo16_00_SP_CODE_No = $accnpo16_00_SP_CODE_No ?? "";
        $acccar16_00_SP_CODE_No = $acccar16_00_SP_CODE_No ?? "";
        $accmed16_00_SP_CODE_No = $accmed16_00_SP_CODE_No ?? "";
        $accnet16_00_SP_CODE_No = $accnet16_00_SP_CODE_No ?? "";
        $psl16_00_SP_CODE_No 	= $psl16_00_SP_CODE_No ?? "";
        $sal16_00_SP_CODE_No 	= $sal16_00_SP_CODE_No ?? "";
        $scl16_00_SP_CODE_No 	= $scl16_00_SP_CODE_No ?? "";
        $accper15_00_SP_CODE_No = $accper15_00_SP_CODE_No ?? "";
        $accstd15_00_SP_CODE_No = $accstd15_00_SP_CODE_No ?? "";
        $accnpo15_00_SP_CODE_No = $accnpo15_00_SP_CODE_No ?? "";
        $acccar15_00_SP_CODE_No = $acccar15_00_SP_CODE_No ?? "";
        $accmed15_05_SP_CODE_No = $accmed15_05_SP_CODE_No ?? "";
        $accnet15_00_SP_CODE_No = $accnet15_00_SP_CODE_No ?? "";
        $psl15_00_SP_CODE_No 	= $psl15_00_SP_CODE_No ?? "";
        $sal15_00_SP_CODE_No 	= $sal15_00_SP_CODE_No ?? "";
        $scl15_00_SP_CODE_No 	= $scl15_00_SP_CODE_No ?? "";
        $postcode_AT_THE_DATE_OF= $postcode_AT_THE_DATE_OF ?? "";
        $accper14_00_SP_CODE_No = $accper14_00_SP_CODE_No ?? "";
        $accstd14_00_SP_CODE_No = $accstd14_00_SP_CODE_No ?? "";
        $accnpo14_00_SP_CODE_No = $accnpo14_00_SP_CODE_No ?? "";
        $acccar14_00_SP_CODE_No = $acccar14_00_SP_CODE_No ?? "";
        $accnet14_00_SP_CODE_No = $accnet14_00_SP_CODE_No ?? "";
        $psl14_01_SP_CODE_No 	= $psl14_01_SP_CODE_No ?? "";
        $psl14_00_SP_CODE_No 	= $psl14_00_SP_CODE_No ?? "";
        $sal14_00_SP_CODE_No 	= $sal14_00_SP_CODE_No ?? "";
        $scl14_00_SP_CODE_No 	= $scl14_00_SP_CODE_No ?? "";
        $accper13_00_SP_CODE_No = $accper13_00_SP_CODE_No ?? "";
        $accstd13_00_SP_CODE_No = $accstd13_00_SP_CODE_No ?? "";
        $accnpo13_00_SP_CODE_No = $accnpo13_00_SP_CODE_No ?? "";
        $acccar13_00_SP_CODE_No = $acccar13_00_SP_CODE_No ?? "";
        $accnet13_00_SP_CODE_No = $accnet13_00_SP_CODE_No ?? "";
        $psl13_01_SP_CODE_No 	= $psl13_01_SP_CODE_No ?? "";
        $psl13_00_SP_CODE_No 	= $psl13_00_SP_CODE_No ?? "";
        $sal13_00_SP_CODE_No 	= $sal13_00_SP_CODE_No ?? "";
        $scl13_00_SP_CODE_No 	= $scl13_00_SP_CODE_No ?? "";
        $accper12_00_SP_CODE_No = $accper12_00_SP_CODE_No ?? "";
        $accstd12_00_SP_CODE_No = $accstd12_00_SP_CODE_No ?? "";
        $accnpo12_00_SP_CODE_No = $accnpo12_00_SP_CODE_No ?? "";
        $acccar12_00_SP_CODE_No = $acccar12_00_SP_CODE_No ?? "";
        $accnet12_00_SP_CODE_No = $accnet12_00_SP_CODE_No ?? "";
        $psl12_02_SP_CODE_No 	= $psl12_02_SP_CODE_No ?? "";
        $psl12_00_SP_CODE_No 	= $psl12_00_SP_CODE_No ?? "";
        $sal12_00_SP_CODE_No 	= $sal12_00_SP_CODE_No ?? "";
        $scl12_00_SP_CODE_No 	= $scl12_00_SP_CODE_No ?? "";
        $accper11_00_SP_CODE_No = $accper11_00_SP_CODE_No ?? "";
        $accstd11_00_SP_CODE_No = $accstd11_00_SP_CODE_No ?? "";
        $accnpo11_00_SP_CODE_No = $accnpo11_00_SP_CODE_No ?? "";
        $accnet11_00_SP_CODE_No = $accnet11_00_SP_CODE_No ?? "";
        $psl11_02_SP_CODE_No 	= $psl11_02_SP_CODE_No ?? "";
        $psl11_00_SP_CODE_No 	= $psl11_00_SP_CODE_No ?? "";
        $sal11_00_SP_CODE_No 	= $sal11_00_SP_CODE_No ?? "";
        $scl11_00_SP_CODE_No 	= $scl11_00_SP_CODE_No ?? "";
        $accp10_00_SP_CODE_No 	= $accp10_00_SP_CODE_No ?? "";
        $acc10_00_SP_CODE_No 	= $acc10_00_SP_CODE_No ?? "";
        $accn10_00_SP_CODE_No 	= $accn10_00_SP_CODE_No ?? "";
        $accnet10_00_SP_CODE_No = $accnet10_00_SP_CODE_No ?? "";
        $psl10_01_SP_CODE_No 	= $psl10_01_SP_CODE_No ?? "";
        $psl10_00_SP_CODE_No 	= $psl10_00_SP_CODE_No ?? "";
        $sal10_00_SP_CODE_No 	= $sal10_00_SP_CODE_No ?? "";
        $scl10_00_SP_CODE_No 	= $scl10_00_SP_CODE_No ?? "";
        $accp9_00_SP_CODE_No 	= $accp9_00_SP_CODE_No ?? "";
        $acc9_00_SP_CODE_No 	= $acc9_00_SP_CODE_No ?? "";
        $accn9_00_SP_CODE_No 	= $accn9_00_SP_CODE_No ?? "";
        $apr9_00_SP_CODE_No 	= $apr9_00_SP_CODE_No ?? "";
        $psl9_01_SP_CODE_No 	= $psl9_01_SP_CODE_No ?? "";
        $psl9_00_SP_CODE_No 	= $psl9_00_SP_CODE_No ?? "";
        $sal9_00_SP_CODE_No 	= $sal9_00_SP_CODE_No ?? "";
        $scl9_00_SP_CODE_No 	= $scl9_00_SP_CODE_No ?? "";
    // 2023/04 KhanhDinh - Change for PHP8 [end]


        $vNRBody = str_replace("%%accper19_00_SP_CODE_No%%",$accper19_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accstd19_00_SP_CODE_No%%",$accstd19_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accnpo19_00_SP_CODE_No%%",$accnpo19_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%acccar19_00_SP_CODE_No%%",$acccar19_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accmed19_00_SP_CODE_No%%",$accmed19_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accnet19_00_SP_CODE_No%%",$accnet19_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%psl19_00_SP_CODE_No%%",$psl19_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%sal19_00_SP_CODE_No%%",$sal19_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%scl19_00_SP_CODE_No%%",$scl19_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accper18_00_SP_CODE_No%%",$accper18_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accstd18_00_SP_CODE_No%%",$accstd18_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accnpo18_00_SP_CODE_No%%",$accnpo18_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%acccar18_00_SP_CODE_No%%",$acccar18_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accmed18_00_SP_CODE_No%%",$accmed18_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accnet18_00_SP_CODE_No%%",$accnet18_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%psl18_00_SP_CODE_No%%",$psl18_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%sal18_00_SP_CODE_No%%",$sal18_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%scl18_00_SP_CODE_No%%",$scl18_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accper17_00_SP_CODE_No%%",$accper17_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accstd17_00_SP_CODE_No%%",$accstd17_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accnpo17_00_SP_CODE_No%%",$accnpo17_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%acccar17_00_SP_CODE_No%%",$acccar17_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accmed17_00_SP_CODE_No%%",$accmed17_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accnet17_00_SP_CODE_No%%",$accnet17_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%psl17_00_SP_CODE_No%%",$psl17_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%sal17_00_SP_CODE_No%%",$sal17_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%scl17_00_SP_CODE_No%%",$scl17_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accper16_00_SP_CODE_No%%",$accper16_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accstd16_00_SP_CODE_No%%",$accstd16_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accnpo16_00_SP_CODE_No%%",$accnpo16_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%acccar16_00_SP_CODE_No%%",$acccar16_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accmed16_00_SP_CODE_No%%",$accmed16_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accnet16_00_SP_CODE_No%%",$accnet16_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%psl16_00_SP_CODE_No%%",$psl16_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%sal16_00_SP_CODE_No%%",$sal16_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%scl16_00_SP_CODE_No%%",$scl16_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accper15_00_SP_CODE_No%%",$accper15_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accstd15_00_SP_CODE_No%%",$accstd15_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accnpo15_00_SP_CODE_No%%",$accnpo15_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%acccar15_00_SP_CODE_No%%",$acccar15_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accmed15_05_SP_CODE_No%%",$accmed15_05_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accnet15_00_SP_CODE_No%%",$accnet15_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%psl15_00_SP_CODE_No%%",$psl15_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%sal15_00_SP_CODE_No%%",$sal15_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%scl15_00_SP_CODE_No%%",$scl15_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%postcode_AT_THE_DATE_OF%%",$postcode_AT_THE_DATE_OF,$vNRBody);
        $vNRBody = str_replace("%%accper14_00_SP_CODE_No%%",$accper14_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accstd14_00_SP_CODE_No%%",$accstd14_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accnpo14_00_SP_CODE_No%%",$accnpo14_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%acccar14_00_SP_CODE_No%%",$acccar14_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accnet14_00_SP_CODE_No%%",$accnet14_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%psl14_01_SP_CODE_No%%",$psl14_01_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%psl14_00_SP_CODE_No%%",$psl14_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%sal14_00_SP_CODE_No%%",$sal14_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%scl14_00_SP_CODE_No%%",$scl14_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accper13_00_SP_CODE_No%%",$accper13_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accstd13_00_SP_CODE_No%%",$accstd13_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accnpo13_00_SP_CODE_No%%",$accnpo13_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%acccar13_00_SP_CODE_No%%",$acccar13_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accnet13_00_SP_CODE_No%%",$accnet13_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%psl13_01_SP_CODE_No%%",$psl13_01_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%psl13_00_SP_CODE_No%%",$psl13_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%sal13_00_SP_CODE_No%%",$sal13_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%scl13_00_SP_CODE_No%%",$scl13_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accper12_00_SP_CODE_No%%",$accper12_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accstd12_00_SP_CODE_No%%",$accstd12_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accnpo12_00_SP_CODE_No%%",$accnpo12_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%acccar12_00_SP_CODE_No%%",$acccar12_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accnet12_00_SP_CODE_No%%",$accnet12_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%psl12_02_SP_CODE_No%%",$psl12_02_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%psl12_00_SP_CODE_No%%",$psl12_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%sal12_00_SP_CODE_No%%",$sal12_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%scl12_00_SP_CODE_No%%",$scl12_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accper11_00_SP_CODE_No%%",$accper11_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accstd11_00_SP_CODE_No%%",$accstd11_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accnpo11_00_SP_CODE_No%%",$accnpo11_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accnet11_00_SP_CODE_No%%",$accnet11_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%psl11_02_SP_CODE_No%%",$psl11_02_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%psl11_00_SP_CODE_No%%",$psl11_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%sal11_00_SP_CODE_No%%",$sal11_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%scl11_00_SP_CODE_No%%",$scl11_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accp10_00_SP_CODE_No%%",$accp10_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%acc10_00_SP_CODE_No%%",$acc10_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accn10_00_SP_CODE_No%%",$accn10_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accnet10_00_SP_CODE_No%%",$accnet10_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%psl10_01_SP_CODE_No%%",$psl10_01_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%psl10_00_SP_CODE_No%%",$psl10_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%sal10_00_SP_CODE_No%%",$sal10_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%scl10_00_SP_CODE_No%%",$scl10_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accp9_00_SP_CODE_No%%",$accp9_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%acc9_00_SP_CODE_No%%",$acc9_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%accn9_00_SP_CODE_No%%",$accn9_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%apr9_00_SP_CODE_No%%",$apr9_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%psl9_01_SP_CODE_No%%",$psl9_01_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%psl9_00_SP_CODE_No%%",$psl9_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%sal9_00_SP_CODE_No%%",$sal9_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace("%%scl9_00_SP_CODE_No%%",$scl9_00_SP_CODE_No,$vNRBody);
        $vNRBody = str_replace('’’javascript', "javascript", $vNRBody);
        $vNRBody = str_replace("’’>", ">", $vNRBody);
        $vNRBody = str_replace("’", "'", $vNRBody);
        $vNRBody = str_replace("/newsrelease","http://www.sorimachi.co.jp/newsrelease", $vNRBody);
        $vNRBody = str_replace("/usersupport", "http://www.sorimachi.co.jp/usersupport", $vNRBody);

        // 共通置換フレーズ（業務サポート専用）
        if ( $vNRTarget == 221 ) {
            $vNRBody = str_replace("ソフトウェアダウンロードより、", "<A href='/usersupport/products_support/softdown.asp' target='_blank'>ソフトウェアダウンロード</A>より、", $vNRBody);
            $vNRBody = str_replace("%%phrase_ForValueSupportMember%%", "<DIV style='padding:5px 0 5px 2em; text-indent:-1em;'>※対象ソフトの<A href='/usersupport/value/'>バリューサポート</A>会員の方のみご利用いただけます。</DIV>", $vNRBody);
        }
        // 共通置換フレーズ（パートナーサイト）
        else if ( $vNRTarget == 211 || $vNRTarget == 212 || $vNRTarget == 213 ) {
            $vNRBody = str_replace("<BR>いくつかの機能を改善した最新版です。", "", $vNRBody);
            $vNRBody = str_replace("%%phrase_ForValueSupportMember%%", "", $vNRBody);
        }
        return $vNRBody;
    }
?>
