// 初期表示
function loadAreas() {
    jQuery('.error_inline0').html('');
    jQuery.ajax({
        type: 'POST',
        dataType: 'json',
        url: ajaxObject.urlform,
        cache: false,
        data: { action: 'loadAreas', numPage: SAAG },
        success: function(data) {
            if (typeof data === 'string') {
                alert(data);
                return;
            }

            if (data.success) {
                var edit = data.edit;
                jQuery('#isEdit').val(edit);
                jQuery('#id_saag').html(data.saag_id);
                jQuery('#pref_code').html(data.areaOption);
                jQuery('#show_img').html(data.photo);

                if ( edit == 0 ) {
                    jQuery('#InfoType1').prop("checked", true);
                }
                else {
                    jQuery('#old_saag_id').val(data.saag.saag_id);
                    jQuery('#old_customer_code').val(data.saag.customer_code);
                    jQuery('#old_info_type').val(data.saag.info_type);
                    jQuery('#old_campaign').val(data.saag.campaign1);
                    jQuery('#old_company_name').val(data.saag.company_name);
                    jQuery('#old_member_name').val(data.saag.member_name);
                    jQuery('#old_contact').val(data.saag.contact);
                    jQuery('#old_email').val(data.saag.Email);
                    jQuery('#old_zip_code').val(data.saag.zip_code);
                    jQuery('#old_pref_code').val(data.saag.pref_code);
                    jQuery('#old_address').val(data.saag.address);
                    jQuery('#old_tel').val(data.saag.tel);
                    jQuery('#old_fax').val(data.saag.fax);
                    jQuery('#old_URL').val(data.saag.URL);
                    jQuery('#old_qualifications').val(data.saag.qualifications);
                    jQuery('#old_products').val(data.saag.products);
                    jQuery('#old_show_web').val(data.saag.show_web);
                    jQuery('#old_areas').val(data.saag.areas);
                    jQuery('#old_comment').val(data.saag.comment);
                    jQuery('#old_photo').val(data.saag.photo);

                    // 希望掲載形式
                    var InfoType = data.saag.info_type;
                    jQuery('#InfoType' + InfoType).prop("checked", true)
                    affectInfo(InfoType);

                    // 対応可能サービス
                    if (data.saag.campaign1 == 1) {
                        jQuery('input[name="campaign"]').prop("checked", true);
                    }

                    jQuery('#company_name').val(data.saag.company_name); // 掲載事務所名
                    jQuery('#member_name').val(data.saag.member_name);   // 所長名
                    jQuery('#contact').val(data.saag.contact);           // 担当者名

                    // 貴所または担当者のE-Mailアドレス
                    jQuery('#Mail1').val(data.saag.Email);
                    jQuery('#Mail2').val(data.saag.Email);

                    // 住所
                    var zipCode = data.saag.zip_code.split('-');
                    jQuery('#Zip1').val(zipCode[0]);
                    jQuery('#Zip2').val(zipCode[1]);
                    jQuery('#Address').val(data.saag.address);

                    // 電話番号
                    var arrTel = data.saag.tel.split('-');
                    jQuery('#Tel1').val(arrTel[0]);
                    jQuery('#Tel2').val(arrTel[1]);
                    jQuery('#Tel3').val(arrTel[2]);

                    // ＦＡＸ番号
                    var arrFax = data.saag.fax.split('-');
                    jQuery('#Fax1').val(arrFax[0]);
                    jQuery('#Fax2').val(arrFax[1]);
                    jQuery('#Fax3').val(arrFax[2]);

                    jQuery('#URL').val(data.saag.URL); // 貴所ＨＰアドレス

                    // 所有資格
                    var OfficeQuas = data.saag.qualifications.split(',');
                    setCheckboxState(OfficeQuas, 'OfficeQualification', '#OfficeQualificationOther');

                    // 対応可能製品
                    var OfficePros = data.saag.products.split(',');
                    setCheckboxState(OfficePros, 'OfficeProduct', '#OfficeProductOther');

                    // WEBへの掲載
                    if ( data.saag.show_web == 1 ) {
                        jQuery('input[name="show_web"]').prop("checked", true);
                    }

                    // 対応可能エリア
                    var OfficeAreas = replaceAll(data.saag.areas, " ", "");
                    OfficeAreas = OfficeAreas.split(',');
                    var j = 0;
                    var isAll = false;
                    while ( j < jQuery('input[name="area"]').length ) {
                        jQuery('input[name="area"]').eq(j).prop("checked", false);
                        if (!isAll) {
                            for (var i = 0; i < OfficeAreas.length; i++) {
                                if ( OfficeAreas[i] == '日本全国' ) {
                                    jQuery('input[name="OfficeAreaAll"]').prop("checked", true);
                                    isAll = true;
                                    break;
                                }
                                else if ( jQuery('input[name="area"]').eq(j).val() == OfficeAreas[i] ) {
                                    jQuery('input[name="area"]').eq(j).prop("checked", true);
                                    break;
                                }
                            }
                        }
                        j++;
                    }

                    // 貴所ＰＲ
                    jQuery('#comment').val(data.saag.comment);
                }
            }
        },
        error: function(xhr, textStatus, errorThrown) {
            jQuery('.error_inline0').html('サーバーへの接続に失敗しました。' + errorThrown);
        }
    });
}

// SAAG 情報の新規作成・更新
function saveFormSaag(params) {
    jQuery('.dialogLoading').show();
    jQuery.ajax({
        type: 'POST',
        url: ajaxObject.urlform,
        data: {
            action:             'saveForm',
            numPage:            SAAG,
            isEdit:             params.isEdit,

            old_saag_id:        params.old_saag_id,
            old_customer_code:  params.old_customer_code,
            old_info_type:      params.old_info_type,
            old_campaign1:      params.old_campaign1,
            old_company_name:   params.old_company_name,
            old_member_name:    params.old_member_name,
            old_contact:        params.old_contact,
            old_email:          params.old_email,
            old_zip_code:       params.old_zip_code,
            old_pref_code:      params.old_pref_code,
            old_address:        params.old_address,
            old_tel:            params.old_tel,
            old_fax:            params.old_fax,
            old_URL:            params.old_URL,
            old_qualifications: params.old_qualifications,
            old_products:       params.old_products,
            old_show_web:       params.old_show_web,
            old_areas:          params.old_areas,
            old_comment:        params.old_comment,
            old_photo:          params.old_photo,

            saag_id:            params.saag_id,
            info_type:          params.info_type,
            campaign1:          params.campaign1,
            company_name:       params.company_name,
            member_name:        params.member_name,
            contact:            params.contact,
            mail1:              params.Mail1,
            mail2:              params.Mail2,
            zip_code1:          params.Zip1,
            zip_code2:          params.Zip2,
            pref_code:          params.pref_code,
            address:            params.address,
            tel1:               params.Tel1,
            tel2:               params.Tel2,
            tel3:               params.Tel3,
            fax1:               params.Fax1,
            fax2:               params.Fax2,
            fax3:               params.Fax3,
            URL:                params.URL,
            OfficeQua:          params.OfficeQua,
            OfficeQuaOther:     params.OfficeQuaOther,
            OfficePro:          params.OfficePro,
            OfficeProductOther: params.OfficeProductOther,
            show_web:           params.show_web,
            OfficeArea:         params.OfficeArea,
            comment:            params.comment,
            images:             params.images,
            edit_img:           params.edit_img,
            del_img:            params.del_img,
        },
        success: function(data) {
            jQuery('.error_inline0').html(data);
            jQuery('.dialogLoading').hide();
        },
        error: function(xhr, textStatus, errorThrown) {
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
    formLoad(SAAG, null);
    bindInputCode('member_name');

    // 希望掲載形式＝詳細形式
    jQuery('#InfoType1').click(function() {
        affectInfo(1);
    });
    // 希望掲載形式＝簡易リスト形式
    jQuery('#InfoType2').click(function() {
        affectInfo(2);
    });

    // この内容で送信する
    jQuery('input[name="submit_a"]').click(function() {
        // 所有資格
        var OfficeQua = '';
        for ( var i = 1; i <= 10; i++ ) {
            if ( jQuery('#OfficeQua' + i).is(':checked') ) {
                OfficeQua += ( OfficeQua == '' ) ? jQuery('#OfficeQua' + i).val() : ', ' + jQuery('#OfficeQua' + i).val();
            }
        }

        // 対応可能製品
        var OfficePro = '';
        for ( var i = 1; i <= 6; i++ ) {
            if ( jQuery('#OfficePro' + i).is(':checked') ) {
                OfficePro += ( OfficePro == '' ) ? jQuery('#OfficePro' + i).val() : ', ' + jQuery('#OfficePro' + i).val();
            }
        }

        // 対応可能エリア
        var OfficeArea = '';
        if ( jQuery('input[name="OfficeAreaAll"]').is(':checked') ) {
            OfficeArea = jQuery('input[name="OfficeAreaAll"]:checked').val();
        }
        for ( var i = 1; i <= 47 ; i++ ) {
            if ( !jQuery('input[name="OfficeAreaAll"]').is(':checked') && jQuery('#area' + i).is(':checked') ) {
                OfficeArea += ( OfficeArea == '' ) ? jQuery('#area' + i).val() : ', ' + jQuery('#area' + i).val();
            }
        }

        // データ設定
        var params = new Object();
        params.old_saag_id        = jQuery('#old_saag_id').val();
        params.old_customer_code  = jQuery('#old_customer_code').val();
        params.old_info_type      = jQuery('#old_info_type').val();
        params.old_campaign1      = jQuery('#old_campaign').val();
        params.old_member_name    = jQuery('#old_member_name').val();
        params.old_qualifications = jQuery('#old_qualifications').val();
        params.old_products       = jQuery('#old_products').val();
        params.old_areas          = jQuery('#old_areas').val();

        params.saag_id            = jQuery('.saag_id').text();
        params.info_type          = (jQuery('#InfoType1').is(':checked')) ? '1' : '2';
        params.campaign1          = (jQuery('#campaign').is(':checked')) ? '1' : '0';
        params.member_name        = jQuery('#member_name').val();
        params.OfficeQua          = OfficeQua;
        params.OfficeQuaOther     = jQuery('#OfficeQualificationOther').val();
        params.OfficePro          = OfficePro;
        params.OfficeProductOther = jQuery('#OfficeProductOther').val();
        params.OfficeArea         = OfficeArea;
        params.old_pref_code      = jQuery('#old_pref_code').val();

        generalConfirm(params);
        saveFormSaag(params);
    });


});