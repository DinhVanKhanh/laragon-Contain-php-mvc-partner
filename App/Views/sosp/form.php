<?php
/* Template Name: SOSP FORM */
require_once __DIR__ . "/../template/header/header-form.php";

?>


<body class="page-template page-template-Search_Form page-template-sosp_form page-template-Search_Formsosp_form-php page page-id-211 page-child parent-pageid-81 has-header-image page-two-column colors-light">
    <div id="sosp_form">
        <div id="sosp_form">
            <section id="wrapper">
                <article id="main" class="clear clearfix">
                    <section id="main_content" class="clear">
                        <div class="tableLayout">
                            <section id="inline0" class="section fancyboxSection">
                                <form action="" method="POST">
                                    <div class="box_1">
                                        <p class="mb10 sosp_title"><img src="/assets/images/uploads/profile/images_layout/ctitle_spsrch_reg.gif"></p>
                                        <p class="mb10 hidden_success">　こちらで入力していただいた情報を元に、ソリマチオフィシャルホームページでのSOSPご案内ページに掲載させていただきます。特にお電話番号やe-mailアドレスの入力間違いなどございませんようご注意ください。</p>
                                        <p>なお、本ページの使用にあたり、以下の行為は禁止させていただきます。</p>
                                        <ul class="sosp_list">
                                            <li>公序良俗に反する内容の掲載</li>
                                            <li>第三者を誹謗中傷する行為</li>
                                            <li>金額の掲載</li>
                                            <li>弊社と競合すると思われる他社情報の掲載</li>
                                            <li>事実と異なる内容の掲載</li>
                                            <li>他人のプライバシーの侵害する行為</li>
                                        </ul>
                                        <div class="box_sosp">
                                            <p><b>
                                                    <font class="color_sosp">◆ご注意</font>
                                                </b></p>
                                            <p>
                                                この入力フォームは、当サイト内の「ＳＯＳＰ検索」に掲載される情報を入力していただくためのものです。<br />
                                                <font class="color_sosp">会員としての登録情報原本は変更されませんのでご注意ください。</font><br />登録情報原本そのものを変更する場合は、お手数ですが弊社パートナー事務局までご連絡ください。
                                            </p>
                                        </div>
                                        <p class="bg_text">下記項目をご記入いただき、「入力内容を確認する」ボタンを押してください。</p>
                                    </div>
                                    <div class="box_2 mb10" style="display:none">
                                        <p class="mb10 sosp_title"><img src="/assets/images/uploads/profile/images_layout/ctitle_spsrch_reg.gif"></p>
                                        <p>送信内容をご確認の上、「この内容で送信する」ボタンを押してください。<br>内容を変更する場合は、「入力フォームへ戻る」ボタンで戻って修正してください。</p>
                                    </div>

                                    <div class="frmSection">
                                        <div class="show_parent">
                                            <p class="error_inline pb0 color_red center bg_text" style="display:none">&nbsp;</p>
                                            <table cellspacing="2" cellpadding="0" border="0" class="show_client">
                                                <tr>
                                                    <th class="list_g1n w30">SOSP会員ID</th>
                                                    <td id="id_sosp" class="list_g1"></td>
                                                </tr>
                                                <tr>
                                                    <th class="list_g1n">WEBへの掲載</th>
                                                    <td class="list_g1w"><input type="checkbox" id="show_web" name="show_web" value="1">SOSP検索(WEB)に掲載する。</td>
                                                </tr>
                                                <tr>
                                                    <th class="list_g1n">会社名<img class="show_pc" src="/assets/images/uploads/profile/images_layout/hissu_12px.gif" alt="必須項目"><span class="caution_text clear show_sp"><b>※</b></span></th>
                                                    <td class="list_g1w">
                                                        <input type="text" id="company_name" name="company_name" style="width:80%" maxlength="150">
                                                        <p class="caution_text clear">
                                                            <font class="error_blue error_inline0" style="visibility:visible;"></font>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="list_g1n">ご担当者名<img id="essentials3a" class="show_pc" src="/assets/images/uploads/profile/images_layout/hissu_12px.gif" alt="必須項目"><span id="essentials3" class="caution_text clear show_sp" style="visibility:visible;"><b>※</b></span></th>
                                                    <td class="list_g1w">
                                                        <input type="text" id="contact" name="contact" style="width:80%" maxlength="60">
                                                        <p class="caution_text clear">
                                                            <font class="error_blue error_inline1" style="visibility:visible;"></font>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="list_g1n" rowspan="3">住所<img class="show_pc" src="/assets/images/uploads/profile/images_layout/hissu_12px.gif" alt="必須項目"><span id="essentials6" class="caution_text clear show_sp" style="visibility:visible;"><b>※</b></span></th>
                                                    <td class="list_g1w">〒
                                                        <input id="Zip1" name="Zip1" type="text" style="width:25%" size="3" maxlength="3"> -
                                                        <input id="Zip2" name="Zip2" type="text" style="width:25%" size="4" maxlength="4">
                                                        <span class="caution_text clear">（半角）</span><br />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="list_g1w"><select id="pref_code" name="pref_code" style="width:60%"></select></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="list_g1w">
                                                        <textarea id="Address" name="Address" rows="5" style="width:100%!important;" maxlength="200" class="border"></textarea>
                                                        <p class="caution_text clear">
                                                            <font class="error_blue error_inline3" style="visibility:visible;"></font>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="list_g1n">電話番号<img class="show_pc" src="/assets/images/uploads/profile/images_layout/hissu_12px.gif" alt="必須項目"><span id="essentials7" class="caution_text clear show_sp" style="visibility:visible;"><b>※</b></span></th>
                                                    <td colspan="2" class="list_g1w">
                                                        <input type="text" id="Tel1" name="Tel1" size="6" maxlength="5" style="width:25%"> -
                                                        <input type="text" id="Tel2" name="Tel2" size="6" maxlength="4" style="width:25%"> -
                                                        <input type="text" id="Tel3" name="Tel3" size="6" maxlength="4" style="width:25%">
                                                        <span class="caution_text clear">（半角）</span>
                                                        <p class="caution_text clear">
                                                            <font class="error_blue error_inline4" style="visibility:visible;"></font>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="list_g1n">ＦＡＸ番号<span id="essentials8" class="caution_text clear show_sp" style="visibility:hidden;">※</span></th>
                                                    <td colspan="2" class="list_g1w">
                                                        <input type="text" id="Fax1" name="Fax1" size="6" maxlength="5" style="width:25%"> -
                                                        <input type="text" id="Fax2" name="Fax2" size="6" maxlength="4" style="width:25%"> -
                                                        <input type="text" id="Fax3" name="Fax3" size="6" maxlength="4" style="width:25%">
                                                        <span class="caution_text clear">（半角）</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="list_g1n">E-MailをWEBで公開しない</th>
                                                    <td class="list_g1w"><input type="checkbox" id="Email_open" name="Email_open" value="1"></td>
                                                </tr>
                                                <tr>
                                                    <th nowrap class="list_g1n">御社または担当者<br />のE-Mailアドレス<img class="show_pc mail" src="/assets/images/uploads/profile/images_layout/hissu_12px.gif" alt="必須項目"><span id="essentials5" class="caution_text clear show_sp mail" style="visibility:visible;"><b>※</b></span></th>
                                                    <td class="list_g1w">
                                                        <div style="margin-bottom:5px;">
                                                            <input type="text" id="Mail1" name="Mail1" style="width:80%">
                                                            <span class="caution_text clear">（半角）</span>
                                                        </div>
                                                        <div style="margin-bottom:5px;">
                                                            <input type="text" id="Mail2" name="Mail2" style="width:80%">
                                                            <span class="caution_text clear">（確認用）</span>
                                                        </div>
                                                        <p class="caution_text clear">確認用E-Mailアドレスはコピー＆ペーストはせず、必ず手入力をしてください。</p>
                                                        <p class="caution_text clear">
                                                            <font class="error_blue error_inline5" style="visibility:visible;"></font>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="list_g1n">御社ＨＰアドレス</th>
                                                    <td colspan="2" class="list_g1w"><input type="text" id="URL" name="URL" style="width:80%" maxlength="100"><br />
                                                        <p class="caution_text clear">必ず「http://」の部分から記載してください。</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="list_g1n">デモスべース</th>
                                                    <td class="list_g1w">
                                                        <input type="radio" id="demospace1" name="demospace" value="1"> 有り
                                                        <input type="radio" id="demospace2" name="demospace" value="2" checked=""> なし
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="list_g1n">訪問による導入支援<br />（別途有償）</th>
                                                    <td class="list_g1w">
                                                        <input type="radio" id="visit_guide1" name="visit_guide" value="1"> 対応有り
                                                        <input type="radio" id="visit_guide2" name="visit_guide" value="2" checked=""> 対応していない
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th nowrap class="list_g1n">ＰＲ・コメント欄<br />（200文字以内）</th>
                                                    <td colspan="2" class="list_g1w">
                                                        <textarea id="comment" name="comment" rows="5" style="width:97.5%!important; overflow:auto!important;" maxlength="200" class="border"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="list_g1n" style="height:20px">掲載写真データ</th>
                                                    <td class="list_g1wc">
                                                        <table class="table_img">
                                                            <tr>
                                                                <td id="show_img" class="w25"></td>
                                                                <td>
                                                                    <input type="hidden" id="inputPdf_sosp" width="100%">
                                                                    <input type="file" id="ipPdf_sosp" name="ipPdf_sosp" style="display:none" accept="application/images" onchange="$('#inputPdf_sosp').val($(this).val());">
                                                                    <input type="button" name="btnAdd_img" class="btn btnAdd" value="写真を更新する" style="position:relative" onclick="document.getElementById('ipPdf_sosp').click()">
                                                                    <input type="button" name="btnDel_img" class="btnDel" value="写真を削除する">
                                                                    <p class="caution_text clear">この画面の画像を変更するだけでは登録が完了しません。<br />必ず下の「入力内容を確認する」ボタンから最終的な登録まですべて完了してください。</p>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>

                                            <table class="show_confirm" cellspacing="2" cellpadding="0" border="0" style="display:none">
                                                <tr>
                                                    <th class="list_g1n w30">SOSP会員 ID</th>
                                                    <td class="list_g1"><span class="sosp_id"></span></td>
                                                </tr>
                                                <tr>
                                                    <th class="list_g1n">WEBへの掲載</th>
                                                    <td class="list_g1"><span class="show_web"></span></td>
                                                </tr>
                                                <tr>
                                                    <th class="list_g1n">会社名</th>
                                                    <td class="list_g1"><span class="company_name"></span></td>
                                                </tr>
                                                <tr>
                                                    <th class="list_g1n">ご担当者名</th>
                                                    <td class="list_g1"><span class="contact"></span></td>
                                                </tr>
                                                <tr>
                                                    <th class="list_g1n">住所</th>
                                                    <td class="list_g1"><span class="Address"></span></td>
                                                </tr>
                                                <tr>
                                                    <th class="list_g1n">電話番号</th>
                                                    <td class="list_g1"><span class="Tel"></span></td>
                                                </tr>
                                                <tr>
                                                    <th class="list_g1n">ＦＡＸ番号</th>
                                                    <td class="list_g1"><span class="Fax"></span></td>
                                                </tr>
                                                <tr>
                                                    <th class="list_g1n">E-MailをWEBで公開しない</th>
                                                    <td class="list_g1"><span class="Email_open"></span></td>
                                                </tr>
                                                <tr>
                                                    <th class="list_g1n">御社または担当者<br />のE-Mailアドレス</th>
                                                    <td class="list_g1"><span class="Mail"></span></td>
                                                </tr>
                                                <tr>
                                                    <th class="list_g1n">御社ＨＰアドレス</th>
                                                    <td class="list_g1"><span class="URL"></span></td>
                                                </tr>
                                                <tr>
                                                    <th class="list_g1n">デモスべース</th>
                                                    <td class="list_g1"><span class="demospace"></span></td>
                                                </tr>
                                                <tr>
                                                    <th class="list_g1n">訪問による導入支援<br />（別途有償）</th>
                                                    <td class="list_g1"><span class="visit_guide"></span></td>
                                                </tr>
                                                <tr>
                                                    <th class="list_g1n">ＰＲ・コメント欄<br />（200文字以内）</th>
                                                    <td class="list_g1"><textarea class="comment" style="overflow:hidden; width:100%!important; background-color:#fff;" readonly="readonly"></textarea></td>
                                                </tr>
                                                <tr>
                                                    <th class="list_g1n">掲載写真データ</th>
                                                    <td class="list_g1"><span class="show_img"></span></td>
                                                </tr>
                                            </table>

                                            <div class="show_success" style="display:none">
                                                <p class="mb10 sosp_title"><img src="/assets/images/uploads/profile/images_layout/ctitle_spsrch_reg1.gif"></p>
                                                <p style="text-align:center; margin-top:50px!important;">今後とも弊社にご高配を賜ります様、何卒よろしくお願い申し上げます。</p>
                                                <p style="text-align:center; margin-bottom:50px!important;">[<a href="javascript:window.close();">ウインドウを閉じる</a>]</p>

                                                <div align="center">
                                                    <table style="border-right:#C0C0C0 1px solid; border-bottom:#B0B0B0 1px solid; width:430px!important" vspace="0" hspace="0" cellspacing="0" cellpadding="0" border="0">
                                                        <tbody>
                                                            <tr>
                                                                <td style="font-size:13px; line-height:120%; font-weight:bold; color:#FFFFFF; background:#3C4EAB; padding:6px 6px 4px 6px; text-align:center; vertical-align:middle; border:#3C4EAB 1px solid;" nowrap>本件に関するお問い合わせは</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="background:#FFFFC0; padding:8px 8px 8px 50px; border:#3C4EAB 1px solid" valign="middle">
                                                                    <div style="font-size:100%; line-height:16px; font-weight:bold; color:#A31D1D;">ソリマチ パートナー事務局</div>
                                                                    <div style="font-size:100%; line-height:120%; color:#404040;">ＴＥＬ：03-6773-7530&#12288;ＦＡＸ：03-6685-4470</div>
                                                                    <div style="font-size:100%; line-height:120%; color:#404040;">141-0022&nbsp;東京都品川区東五反田3-18-6 ソリマチ第8ビル</div>
                                                                    <div style="font-size:100%; line-height:120%; color:#404040; font-family:verdana">E-mail： <a href="mailto:partner@mail.sorimachi.co.jp">partner@mail.sorimachi.co.jp</a></div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="center pb0 pd10"><input type="button" id="submit_client" name="submit_client" value="入力内容を確認する" style="width:200px; font-size:15px" /></p>
                                        <p class="center pb0 pd10">
                                            <input type="button" id="back" name="back" value="入力フォームへ戻る" style="width:160px; font-size:15px; display:none; padding:5px!important" />
                                            <input type="button" id="ok" name="submit_a" value="この内容で送信する" style="width:160px; font-size:15px; display:none; padding:5px!important" />
                                        </p>
                                    </div>
                                </form>
                            </section>
                        </div>
                    </section>
                </article>
            </section>
        </div>
        <input type="hidden" id="sosp_id" value="<?= @$_SESSION['SOSP-ID']; ?>">
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
        <input type="hidden" id="del_img">
        <?php require_once __DIR__ . "/../template/footer/footer-form.php"; ?>
</body>
<script type='text/javascript' src='/assets/js/search_form/init.js'></script>
<script type='text/javascript' src='/assets/js/search_form/sosp_form.js'></script>