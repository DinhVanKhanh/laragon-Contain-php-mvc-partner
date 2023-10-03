<?php
// //import css and js
// require_once __DIR__ . "/../template/index.php";

//import head
require_once __DIR__ . "/../template/header/header-form.php";

?>

<body class="page-template page-template-Search_Form page-template-saag_form page-template-Search_Formsaag_form-php page page-id-113 page-child parent-pageid-73 has-header-image page-two-column colors-light">
    <div id="sa_form">
        <section id="wrapper">
            <article id="main" class="clear clearfix">
                <section id="main_content" class="clear">
                    <div class="tableLayout">
                        <section id="inline0" class="section fancyboxSection">
                            <form action="" method="POST">
                                <div class="box_1">
                                    <p class="mb10 saag_title"><img src="/assets/images/uploads/profile/images_layout/ctitle_sasrch_reg.gif"></p>
                                    <p class="mb10 hidden_success">　こちらで入力していただいた情報を元に、ソリマチオフィシャルホームページでのSAAGご案内ページに掲載させていただきます。特にお電話番号やe-mailアドレスの入力間違いなどございませんようご注意ください。</p>
                                    <p>なお、本ページの使用にあたり、以下の行為は禁止させていただきます。</p>
                                    <ul class="saag_list">
                                        <li>公序良俗に反する内容の掲載</li>
                                        <li>第三者を誹謗中傷する行為</li>
                                        <li>金額の掲載</li>
                                        <li>弊社と競合すると思われる他社情報の掲載</li>
                                        <li>事実と異なる内容の掲載</li>
                                        <li>他人のプライバシーの侵害する行為</li>
                                    </ul>
                                    <div class="box_saag">
                                        <p><b>
                                                <font class="color_saag">◆ご注意</font>
                                            </b></p>
                                        <p>
                                            この入力フォームは、当サイト内の「ＳＡＡＧ検索」に掲載される情報を入力していただくためのものです。<br />
                                            <font class="color_saag">会員としての登録情報原本は変更されませんのでご注意ください。</font><br />登録情報原本そのものを変更する場合は、お手数ですが弊社パートナー事務局までご連絡ください。
                                        </p>
                                    </div>
                                    <p class="bg_text">下記項目をご記入いただき、「入力内容を確認する」ボタンを押してください。</p>
                                </div>
                                <div class="box_2 mb10" style="display:none">
                                    <p class="mb10 saag_title"><img src="/assets/images/uploads/profile/images_layout/ctitle_sasrch_reg.gif"></p>
                                    <p>送信内容をご確認の上、「この内容で送信する」ボタンを押してください。<br>内容を変更する場合は、「入力フォームへ戻る」ボタンで戻って修正してください。</p>
                                </div>

                                <div class="frmSection">
                                    <div class="show_parent">
                                        <table cellspacing="2" cellpadding="0" border="0" class="show_client">
                                            <tr>
                                                <th class="list_g1n">登録情報<br />（変更不可）</th>
                                                <td id="id_saag" class="list_g1"></td>
                                            </tr>
                                            <tr>
                                                <th class="list_g1n">希望掲載形式</th>
                                                <td class="list_g1w">
                                                    <input type="radio" id="InfoType1" name="InfoType" value="1" checked>詳細形式　
                                                    <input type="radio" id="InfoType2" name="InfoType" value="2">簡易リスト形式<br />
                                                    <p class="caution_text clear">くわしくは [ <a href="javascript:OpenWinInfotype();">こちら</a> ] をご参照ください</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="list_g1n">対応可能サービス</th>
                                                <td colspan="2" class="list_g1w"><input type="checkbox" id="campaign" name="campaign" value="1">みんなの税務相談</td>
                                            </tr>
                                            <tr>
                                                <th class="list_g1n">掲載事務所名<img class="show_pc" src="/assets/images/uploads/profile/images_layout/hissu_12px.gif" alt="必須項目"><span class="caution_text clear show_sp"><b>※</b></span></th>
                                                <td class="list_g1w">
                                                    <input type="text" id="company_name" name="company_name" style="width:80%" maxlength="250"><br />
                                                    <p class="caution_text clear">SAAG検索や冊子にはこちらのお名前で掲載いたします。
                                                        <br />
                                                        <font class="caution_text error_inline0" style="color:blue; visibility:visible"></font>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="list_g1n">所長名<img id="essentials3a" class="show_pc" src="/assets/images/uploads/profile/images_layout/hissu_12px.gif" alt="必須項目"><span id="essentials3" class="caution_text clear show_sp" style="visibility:visible"><b>※</b></span></th>
                                                <td class="list_g1w">
                                                    <input type="text" id="member_name" name="member_name" style="width:80%" maxlength="60">
                                                    <br />
                                                    <font class="caution_text error_inline1" style="visibility:visible"></font>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="list_g1n">担当者名<img id="essentials4a" class="show_pc" src="/assets/images/uploads/profile/images_layout/hissu_12px.gif" alt="必須項目"><span id="essentials4" class="caution_text clear show_sp" style="visibility:visible"><b>※</b></span></th>
                                                <td class="list_g1w">
                                                    <input type="text" id="contact" name="contact" style="width:80%" maxlength="60">
                                                    <br />
                                                    <font class="caution_text error_inline2" style="visibility:visible"></font>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th nowrap class="list_g1n">貴所または担当者<br />のE-Mailアドレス<img class="show_pc" src="/assets/images/uploads/profile/images_layout/hissu_12px.gif" alt="必須項目"><span id="essentials5" class="caution_text clear show_sp" style="visibility:visible"><b>※</b></span></th>
                                                <td class="list_g1w">
                                                    <div style="margin-bottom:5px">
                                                        <input type="text" id="Mail1" name="Mail1" style="width:80%" maxlength="100">
                                                        <span class="caution_text clear">（半角）</span>
                                                    </div>
                                                    <div style="margin-bottom:5px">
                                                        <input type="text" id="Mail2" name="Mail2" style="width:80%" maxlength="100">
                                                        <span class="caution_text clear">（確認用）</span>
                                                    </div>
                                                    <p class="caution_text clear">確認用E-Mailアドレスはコピー＆ペーストはせず、必ず手入力をしてください。</p>
                                                    <br />
                                                    <font class="caution_text error_inline3" style="visibility:visible"></font>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="list_g1n" rowspan="3">住所<img class="show_pc" src="/assets/images/uploads/profile/images_layout/hissu_12px.gif" alt="必須項目"><span id="essentials6" class="caution_text clear show_sp" style="visibility:visible"><b>※</b></span></th>
                                                <td class="list_g1w">〒
                                                    <input id="Zip1" name="Zip1" type="text" style="width:25%" size="3" maxlength="3"> -
                                                    <input id="Zip2" name="Zip2" type="text" style="width:25%" size="4" maxlength="4">
                                                    <span class="caution_text clear">（半角）</span>
                                                    <br />
                                                    <font class="caution_text error_inline4" style="visibility:visible"></font>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="list_g1w"><select id="pref_code" name="pref_code" style="width:60%"></select></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="list_g1w">
                                                    <textarea id="Address" name="Address" rows="2" style="width:100%!important" maxlength="150" class="border"></textarea>
                                                    <br />
                                                    <font class="caution_text error_inline5" style="visibility:visible"></font>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="list_g1n">電話番号<img class="show_pc" src="/assets/images/uploads/profile/images_layout/hissu_12px.gif" alt="必須項目"><span id="essentials7" class="caution_text clear show_sp" style="visibility:visible"><b>※</b></span></th>
                                                <td colspan="2" class="list_g1w">
                                                    <input type="text" id="Tel1" name="Tel1" size="6" maxlength="5" style="width:25%"> -
                                                    <input type="text" id="Tel2" name="Tel2" size="6" maxlength="4" style="width:25%"> -
                                                    <input type="text" id="Tel3" name="Tel3" size="6" maxlength="4" style="width:25%">
                                                    <span class="caution_text clear">（半角）</span>
                                                    <br />
                                                    <font class="caution_text error_inline6" style="visibility:visible"></font>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="list_g1n">ＦＡＸ番号<span id="essentials8" class="caution_text clear show_sp" style="visibility:hidden">※</span></th>
                                                <td colspan="2" class="list_g1w">
                                                    <input type="text" id="Fax1" name="Fax1" size="6" maxlength="5" style="width:25%"> -
                                                    <input type="text" id="Fax2" name="Fax2" size="6" maxlength="4" style="width:25%"> -
                                                    <input type="text" id="Fax3" name="Fax3" size="6" maxlength="4" style="width:25%">
                                                    <span class="caution_text clear">（半角）</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="list_g1n">貴所ＨＰアドレス</th>
                                                <td colspan="2" class="list_g1w">
                                                    <input type="text" id="URL" name="URL" style="width:80%" maxlength="100"><br />
                                                    <p class="caution_text clear">必ず「http://」の部分から記載してください。</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="list_g1n">所有資格<img id="essentials10a" class="show_pc" src="/assets/images/uploads/profile/images_layout/hissu_12px.gif" alt="必須項目"><span id="essentials10" class="caution_text clear show_sp" style="visibility:visible"><b>※</b></span></th>
                                                <td colspan="2" class="list_g1w">
                                                    <input type="checkbox" id="OfficeQua1" name="OfficeQualification" value="税理士">税理士
                                                    <input type="checkbox" id="OfficeQua2" name="OfficeQualification" value="公認会計士">公認会計士
                                                    <input type="checkbox" id="OfficeQua3" name="OfficeQualification" value="社会保険労務士">社会保険労務士
                                                    <input type="checkbox" id="OfficeQua4" name="OfficeQualification" value="中小企業診断士">中小企業診断士
                                                    <input type="checkbox" id="OfficeQua5" name="OfficeQualification" value="不動産鑑定士">不動産鑑定士
                                                    <input type="checkbox" id="OfficeQua6" name="OfficeQualification" value="行政書士">行政書士
                                                    <input type="checkbox" id="OfficeQua7" name="OfficeQualification" value="司法書士">司法書士
                                                    <input type="checkbox" id="OfficeQua8" name="OfficeQualification" value="弁護士">弁護士
                                                    <input type="checkbox" id="OfficeQua9" name="OfficeQualification" value="弁理士">弁理士
                                                    <input type="checkbox" id="OfficeQua10" name="OfficeQualification" value="ＩＴコーディネータ">ＩＴコーディネータ<br />
                                                    &nbsp;その他資格 <input type="text" id="OfficeQualificationOther" name="OfficeQualificationOther" style="width:350px" maxlength="100">
                                                    <br />
                                                    <font class="caution_text error_inline7" style="visibility:visible"></font>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="list_g1n">対応可能製品<img id="essentials11a" class="show_pc" src="/assets/images/uploads/profile/images_layout/hissu_12px.gif" alt="必須項目"><span id="essentials11" class="caution_text clear show_sp" style="visibility:visible"><b>※</b></span></th>
                                                <td colspan="2" class="list_g1w">
                                                    <input type="checkbox" id="OfficePro1" name="OfficeProduct" value="会計王">会計王
                                                    <input type="checkbox" id="OfficePro2" name="OfficeProduct" value="会計王PRO">会計王PRO
                                                    <input type="checkbox" id="OfficePro3" name="OfficeProduct" value="会計王NPO法人スタイル">会計王NPO法人スタイル
                                                    <input type="checkbox" id="OfficePro4" name="OfficeProduct" value="会計王介護事業所スタイル">会計王介護事業所スタイル
                                                    <input type="checkbox" id="OfficePro5" name="OfficeProduct" value="給料王">給料王
                                                    <input type="checkbox" id="OfficePro6" name="OfficeProduct" value="販売王">販売王<br />
                                                    その他 <input type="text" id="OfficeProductOther" name="OfficeProductOther" style="width:350px" maxlength="100"><br />
                                                    <br />
                                                    <font class="caution_text error_inline8" style="visibility:visible"></font>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="list_g1n">WEBへの掲載</th>
                                                <td class="list_g1w"><input type="checkbox" id="show_web" name="show_web" value="1">SAAG検索(WEB)に掲載する</td>
                                            </tr>
                                            <tr>
                                                <th class="list_g1n">対応可能エリア
                                                    <img id="essentials12a" class="show_pc" src="/assets/images/uploads/profile/images_layout/hissu_12px.gif" alt="必須項目">
                                                    <span id="essentials12" class="caution_text clear show_sp" style="visibility:visible"><b>※</b></span>
                                                </th>
                                                <td colspan="2" class="list_g1w">
                                                    <font style="line-height:18px">
                                                        <div style="margin-bottom:10px; padding-bottom:10px; border-bottom:1px #A0A0A0 dotted;">
                                                            <input type="checkbox" id="OfficeAreaAll" name="OfficeAreaAll" value="日本全国">日本全国
                                                            <span id="error_inline11" class="caution_text pl10"></span>
                                                        </div>
                                                        <input type="checkbox" id="area1" name="area" value="北海道">北海道
                                                        <input type="checkbox" id="area2" name="area" value="青森県">青森県
                                                        <input type="checkbox" id="area3" name="area" value="岩手県">岩手県
                                                        <input type="checkbox" id="area4" name="area" value="宮城県">宮城県
                                                        <input type="checkbox" id="area5" name="area" value="秋田県">秋田県
                                                        <input type="checkbox" id="area6" name="area" value="山形県">山形県
                                                        <input type="checkbox" id="area7" name="area" value="福島県">福島県
                                                        <input type="checkbox" id="area8" name="area" value="茨城県">茨城県<br />
                                                        <input type="checkbox" id="area9" name="area" value="栃木県">栃木県
                                                        <input type="checkbox" id="area10" name="area" value="群馬県">群馬県
                                                        <input type="checkbox" id="area11" name="area" value="埼玉県">埼玉県
                                                        <input type="checkbox" id="area12" name="area" value="千葉県">千葉県
                                                        <input type="checkbox" id="area13" name="area" value="東京都">東京都
                                                        <input type="checkbox" id="area14" name="area" value="神奈川県">神奈川県
                                                        <input type="checkbox" id="area15" name="area" value="新潟県">新潟県
                                                        <input type="checkbox" id="area16" name="area" value="富山県">富山県<br />
                                                        <input type="checkbox" id="area17" name="area" value="石川県">石川県
                                                        <input type="checkbox" id="area18" name="area" value="福井県">福井県
                                                        <input type="checkbox" id="area19" name="area" value="山梨県">山梨県
                                                        <input type="checkbox" id="area20" name="area" value="長野県">長野県
                                                        <input type="checkbox" id="area21" name="area" value="岐阜県">岐阜県
                                                        <input type="checkbox" id="area22" name="area" value="静岡県">静岡県
                                                        <input type="checkbox" id="area23" name="area" value="愛知県">愛知県
                                                        <input type="checkbox" id="area24" name="area" value="三重県">三重県<br />
                                                        <input type="checkbox" id="area25" name="area" value="滋賀県">滋賀県
                                                        <input type="checkbox" id="area26" name="area" value="京都府">京都府
                                                        <input type="checkbox" id="area27" name="area" value="大阪府">大阪府
                                                        <input type="checkbox" id="area28" name="area" value="兵庫県">兵庫県
                                                        <input type="checkbox" id="area29" name="area" value="奈良県">奈良県
                                                        <input type="checkbox" id="area30" name="area" value="和歌山県">和歌山県
                                                        <input type="checkbox" id="area31" name="area" value="鳥取県">鳥取県
                                                        <input type="checkbox" id="area32" name="area" value="島根県">島根県<br />
                                                        <input type="checkbox" id="area33" name="area" value="岡山県">岡山県
                                                        <input type="checkbox" id="area34" name="area" value="広島県">広島県
                                                        <input type="checkbox" id="area35" name="area" value="山口県">山口県
                                                        <input type="checkbox" id="area36" name="area" value="徳島県">徳島県
                                                        <input type="checkbox" id="area37" name="area" value="香川県">香川県
                                                        <input type="checkbox" id="area38" name="area" value="愛媛県">愛媛県
                                                        <input type="checkbox" id="area39" name="area" value="高知県">高知県
                                                        <input type="checkbox" id="area40" name="area" value="福岡県">福岡県<br />
                                                        <input type="checkbox" id="area41" name="area" value="佐賀県">佐賀県
                                                        <input type="checkbox" id="area42" name="area" value="長崎県">長崎県
                                                        <input type="checkbox" id="area43" name="area" value="熊本県">熊本県
                                                        <input type="checkbox" id="area44" name="area" value="大分県">大分県
                                                        <input type="checkbox" id="area45" name="area" value="宮崎県">宮崎県
                                                        <input type="checkbox" id="area46" name="area" value="鹿児島県">鹿児島県
                                                        <input type="checkbox" id="area47" name="area" value="沖縄県">沖縄県
                                                    </font>
                                                    <br />
                                                    <font class="caution_text error_inline9" style="visibility:visible"></font>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th nowrap class="list_g1n">貴所ＰＲ<img id="essentials13a" class="show_pc" src="/assets/images/uploads/profile/images_layout/hissu_12px.gif" alt="必須項目"><span id="essentials13" class="caution_text clear show_sp" style="visibility:visible"><b>※</b></span><br />（100文字以内）</th>
                                                <td colspan="2" class="list_g1w">
                                                    <textarea id="comment" name="comment" rows="5" style="width:97.5% !important;" maxlength="100" class="border"></textarea>
                                                    <br />
                                                    <font class="caution_text error_inline10" style="visibility:visible"></font>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="list_g1n" style="height:20px">掲載写真データ</th>
                                                <td class="list_g1wc">
                                                    <table class="table_img">
                                                        <tr>
                                                            <td id="show_img" class="w25"></td>
                                                            <td>
                                                                <input type="hidden" id="inputPdf" width="100%">
                                                                <input type="file" id="ipPdf" name="ipPdf" style="display:none" accept="application/images" onchange="$('#inputPdf').val($(this).val())">
                                                                <input type="button" name="btnAdd_img" class="btn btnAdd" value="写真を更新する" style="position:relative" onclick="document.getElementById('ipPdf').click()">
                                                                <input type="button" name="btnDel_img" class="btnDel" value="写真を削除する">
                                                                <p class="caution_text clear">この画面の画像を変更するだけでは登録が完了しません。<br />必ず下の「入力内容を確認する」ボタンから最終的な登録まですべて完了してください。</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>

                                        <table id="confirm" class="show_confirm" cellspacing="2" cellpadding="0" border="0" style="display:none">
                                            <tr>
                                                <th class="list_g1n w30">登録情報<br />（変更不可）</th>
                                                <td class="list_g1"><span class="saag_id"></span></td>
                                            </tr>
                                            <tr>
                                                <th class="list_g1n">希望掲載形式</th>
                                                <td class="list_g1w"><span class="InfoType"></span></td>
                                            </tr>
                                            <tr>
                                                <th class="list_g1n">対応可能サービス</th>
                                                <td class="list_g1w"><span class="campaign"></span></td>
                                            </tr>
                                            <tr>
                                                <th class="list_g1n">掲載事務所名</th>
                                                <td class="list_g1w"><span class="company_name"></span></td>
                                            </tr>
                                            <tr>
                                                <th class="list_g1n">所長名</th>
                                                <td class="list_g1w"><span class="member_name"></span></td>
                                            </tr>
                                            <tr>
                                                <th class="list_g1n">担当者名</th>
                                                <td class="list_g1w"><span class="contact"></span></td>
                                            </tr>
                                            <tr>
                                                <th nowrap class="list_g1n">貴所または担当者<br />のE-Mailアドレス</th>
                                                <td class="list_g1w"><span class="Mail"></span></td>
                                            </tr>
                                            <tr>
                                                <th class="list_g1n">住所</th>
                                                <td class="list_g1w"><span class="Address"></span></td>
                                            </tr>
                                            <tr>
                                                <th class="list_g1n">電話番号</th>
                                                <td class="list_g1w"><span class="Tel"></span></td>
                                            </tr>
                                            <tr>
                                                <th class="list_g1n">ＦＡＸ番号</th>
                                                <td class="list_g1w"><span class="Fax"></span></td>
                                            </tr>
                                            <tr>
                                                <th class="list_g1n">貴所ＨＰアドレス</th>
                                                <td class="list_g1w"><span class="URL"></span></td>
                                            </tr>
                                            <tr>
                                                <th class="list_g1n">所有資格</th>
                                                <td class="list_g1w"><span class="OfficeQua"></span></td>
                                            </tr>
                                            <tr>
                                                <th class="list_g1n">対応可能製品</th>
                                                <td class="list_g1w"><span class="OfficePro"></span></td>
                                            </tr>
                                            <tr>
                                                <th class="list_g1n">WEBへの掲載</th>
                                                <td class="list_g1w"><span class="show_web"></span></td>
                                            </tr>
                                            <tr>
                                                <th class="list_g1n">対応可能エリア</th>
                                                <td class="list_g1w"><span class="OfficeArea"></span></td>
                                            </tr>
                                            <tr>
                                                <th nowrap class="list_g1n">貴所ＰＲ<br />（100文字以内）</th>
                                                <td class="list_g1w"><textarea class="comment" style="width:97.5%!important" readonly="readonly"></textarea></td>
                                            </tr>
                                            <tr>
                                                <th class="list_g1n" style="height:20px">掲載写真データ</th>
                                                <td class="list_g1w"><span class="show_img"> </span></td>
                                            </tr>
                                        </table>

                                        <div class="show_success" style="display:none">
                                            <p class="mb10 saag_title"><img src="/assets/images/uploads/profile/images_layout/ctitle_sasrch_reg.gif"></p>
                                            <p style="text-align:center; margin-top:50px!important">ご登録いただいたメールアドレス宛に、更新内容に関するメールをお送りしております。</p>
                                            <p style="text-align:center; margin-top:50px!important">今後とも弊社にご高配を賜ります様、何卒よろしくお願い申し上げます。</p>
                                            <p style="text-align:center; margin-bottom:50px!important">[<a href="javascript:window.close();">ウインドウを閉じる</a>]</p>

                                            <div align="center">
                                                <table style="border-right:#C0C0C0 1px solid; border-bottom:#B0B0B0 1px solid; width:430px!important" vspace="0" hspace="0" cellspacing="0" cellpadding="0" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="font-size:13px; line-height:120%; font-weight:bold; color:#FFFFFF; background:#3C4EAB; padding:6px 6px 4px 6px; text-align:center; vertical-align:middle; border:#3C4EAB 1px solid">本件に関するお問い合わせは</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background:#FFFFC0; background-position:8px center; background-repeat:no-repeat; padding:8px 8px 8px 50px; border:#3C4EAB 1px solid" valign="middle">
                                                                <div style="font-size:100%; line-height:16px; font-weight:bold; color:#A31D1D">ソリマチ パートナー事務局</div>
                                                                <div style="font-size:100%; line-height:120%; color:#404040">ＴＥＬ：03-6773-7530&#12288;ＦＡＸ：03-6685-4470</div>
                                                                <div style="font-size:100%; line-height:120%; color:#404040">141-0022&nbsp;東京都品川区東五反田3-18-6 ソリマチ第8ビル</div>
                                                                <div style="font-size:100%; line-height:120%; color:#404040; font-family:verdana">E-mail： <a href="mailto:partner@mail.sorimachi.co.jp">partner@mail.sorimachi.co.jp</a></div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <p class="center pb0 pd10"><input type="button" id="submit_client" name="submit_client" value="入力内容を確認する" style="width:200px; font-size:15px" /></p>
                                        <p class="center pb0 pd10">
                                            <input type="button" id="back" name="back" value="入力フォームへ戻る" style="width:160px; font-size:15px; display:none; padding:5px!important" />
                                            <input type="button" id="ok" name="submit_a" value="この内容で送信する" style="width:160px; font-size:15px; display:none; padding:5px!important" />
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>
                </section>
            </article>
        </section>
    </div>
    <input type="hidden" id="saag_id" value="<?= @$_SESSION["SAAG-ID"] ?>">
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
    <input type="hidden" id="del_img">
    <?php require_once __DIR__ . "/../template/footer/footer-form.php"; ?>
</body>

<script type='text/javascript' src='/assets/js/search_form/init.js'></script>
<script type='text/javascript' src='/assets/js/search_form/saag_form.js'></script>