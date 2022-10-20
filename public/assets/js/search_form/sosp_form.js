// 初期表示
function loadAreas() {
    jQuery('.error_inline0').html('');
    jQuery.ajax({
        type: 'POST',
        dataType: 'json',
        url: ajaxObject.urlform,
        cache: false,
        data: { action: 'loadAreas', numPage: SOSP },
        success: function(data) {
            if (typeof data === 'string') {
                alert(data);
                return;
            }

            if (data.success) {
                var edit = data.edit;
                jQuery('#isEdit').val(edit);
                jQuery('#id_sosp').html(data.sosp_id);
                jQuery('#pref_code').html(data.areaOption);
                jQuery('#show_img').html(data.photo);

                if ( edit == 0 ) {
                    jQuery('input[name="Email_open"]').prop('checked', false);
                    jQuery('#old_sbm_flag').val(0);
                }
                else {
                    jQuery('#old_sosp_id').val(data.sosp.sosp_id);
                    jQuery('#old_sbm_flag').val(data.sosp.sbm_flag);
                    jQuery('#old_show_web').val(data.sosp.show_web);
                    jQuery('#old_company_name').val(data.sosp.company_name);
                    jQuery('#old_contact').val(data.sosp.contact);
                    jQuery('#old_zip_code').val(data.sosp.zip_code);
                    jQuery('#old_pref_code').val(data.sosp.pref_code);
                    jQuery('#old_address').val(data.sosp.address);
                    jQuery('#old_tel').val(data.sosp.tel);
                    jQuery('#old_fax').val(data.sosp.fax);
                    jQuery('#old_Email_open').val(data.sosp.Email_open);
                    jQuery('#old_email').val(data.sosp.Email);
                    jQuery('#old_URL').val(data.sosp.URL);
                    jQuery('#old_demospace').val(data.sosp.demospace);
                    jQuery('#old_visit_guide').val(data.sosp.visit_guide);
                    jQuery('#old_comment').val(data.sosp.comment);
                    jQuery('#old_photo').val(data.sosp.photo);

                    // WEBへの掲載
                    if ( data.sosp.show_web == 1 ) {
                        jQuery('input[name="show_web"]').prop("checked", true);
                    }

                    jQuery('#company_name').val(data.sosp.company_name); // 会社名
                    jQuery('#contact').val(data.sosp.contact);           // ご担当者名

                    // 住所
                    var zipCode = data.sosp.zip_code.split('-');
                    jQuery('#Zip1').val(zipCode[0]);
                    jQuery('#Zip2').val(zipCode[1]);
                    jQuery('#Address').val(data.sosp.address);

                    // 電話番号
                    var arrTel = data.sosp.tel.split('-');
                    jQuery('#Tel1').val(arrTel[0]);
                    jQuery('#Tel2').val(arrTel[1]);
                    jQuery('#Tel3').val(arrTel[2]);

                    // ＦＡＸ番号
                    var arrFax = data.sosp.fax.split('-');
                    jQuery('#Fax1').val(arrFax[0]);
                    jQuery('#Fax2').val(arrFax[1]);
                    jQuery('#Fax3').val(arrFax[2]);

                    // 御社または担当者のE-Mailアドレス
                    jQuery('#Mail1').val(data.sosp.Email);
                    jQuery('#Mail2').val(data.sosp.Email);
                    if ( data.sosp.Email_open == 1 ) {
                        jQuery('input[name="Email_open"]').prop("checked", true);
                    }

                    jQuery('#URL').val(data.sosp.URL);                                       // 御社ＨＰアドレス
                    jQuery('#demospace' + data.sosp.demospace).prop("checked", true);        // デモスべース（有り、なし）
                    jQuery('#visit_guide' + data.sosp.visit_guide).prop("checked", true);    // 訪問による導入支援（別途有償）（対応有り、対応していない）
                    jQuery('#comment').val(data.sosp.comment);                               // ＰＲ・コメント欄
                }
            }
        },
        error: function(xhr, textStatus, errorThrown) {
            jQuery('.error_inline').css('display', 'block');
            jQuery('.error_inline').html('サーバーへの接続に失敗しました。' + errorThrown);
        }
    });
}

// SOSP 情報の新規作成・更新
function saveFormSosp(params ) {
    jQuery('.dialogLoading').show();
    jQuery.ajax({
        type: 'POST',
        url: ajaxObject.urlform,
        data: {
            action:           'saveForm',
            numPage:          SOSP,
            isEdit:           params.isEdit,

            old_sosp_id:      params.old_sosp_id,
            old_sbm_flag:     params.old_sbm_flag,
            old_show_web:     params.old_show_web,
            old_company_name: params.old_company_name,
            old_contact:      params.old_contact,
            old_zip_code:     params.old_zip_code,
            old_pref_code:    params.old_pref_code,
            old_address:      params.old_address,
            old_tel:          params.old_tel,
            old_fax:          params.old_fax,
            old_email_open:   params.old_Email_open,
            old_email:        params.old_email,
            old_URL:          params.old_URL,
            old_demospace:    params.old_demospace,
            old_visit_guide:  params.old_visit_guide,
            old_comment:      params.old_comment,
            old_photo:        params.old_photo,

            sosp_id:          params.sosp_id,
            sbm_flag:         params.sbm_flag,
            show_web:         params.show_web,
            company_name:     params.company_name,
            contact:          params.contact,
            zip_code1:        params.Zip1,
            zip_code2:        params.Zip2,
            pref_code:        params.pref_code,
            address:          params.address,
            tel1:             params.Tel1,
            tel2:             params.Tel2,
            tel3:             params.Tel3,
            fax1:             params.Fax1,
            fax2:             params.Fax2,
            fax3:             params.Fax3,
            email_open:       params.Email_open,
            mail1:            params.Mail1,
            mail2:            params.Mail2,
            URL:              params.URL,
            demospace:        params.demospace,
            visit_guide:      params.visit_guide,
            comment:          params.comment,
            images:           params.images,
            edit_img:         params.edit_img,
            del_img:          params.del_img,
        },
        success: function(data ) {
            jQuery('.error_inline0').html(data);
            jQuery('.dialogLoading').hide();
        },
        error: function(xhr, textStatus, errorThrown ) {
            jQuery('.error_inline0').html('サーバーへの接続に失敗しました。' + errorThrown);
        }
    });

    // 初期値
    jQuery('.show_client').css('display', 'none');
    jQuery('.show_confirm').css('display', 'none');
    jQuery('.hidden_success').css('display', 'none');
    jQuery('.show_success').css('display', 'block');
    jQuery('.box_2').css('display', 'none');
    jQuery('#back').css('display', 'none');
    jQuery('#ok').css('display', 'none');
}

// 初期処理
jQuery(document).ready(function() {
    formLoad(SOSP, null);

    // この内容で送信する
    jQuery('input[name="submit_a"]').click(function() {
        // データ設定
        var params = new Object();
        params.old_sosp_id     = jQuery('#old_sosp_id').val();
        params.old_sbm_flag    = jQuery('#old_sbm_flag').val();
        params.old_Email_open  = jQuery('#old_Email_open').val();
        params.old_demospace   = jQuery('#old_demospace').val();
        params.old_visit_guide = jQuery('#old_visit_guide').val();

        params.sosp_id         = jQuery('.sosp_id').text();
        params.sbm_flag        = jQuery('#old_sbm_flag').val();
        params.Email_open      = (jQuery('#Email_open').is(':checked')) ? 1 : 0;
        params.demospace 	   = (jQuery('#demospace1').is(':checked')) ? 1 : 2;
        params.visit_guide 	   = (jQuery('#visit_guide1').is(':checked')) ? 1 : 2;

        generalConfirm(params)
        saveFormSosp(params);
    });
});