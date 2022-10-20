// 初期表示
function loadAreas() {
    jQuery('.error_inline0').html('');
    jQuery.ajax({
        type: 'POST',
        dataType: 'json',
        url: ajaxObject.urlform,
        cache: false,
        data: { action: 'loadAreas', numPage: SOUP },
        success: function(data) {
            if (typeof data === 'string') {
                alert(data);
                return;
            }

            if (data.success) {
                var edit = data.edit;
                jQuery('#isEdit').val(edit);
                jQuery('#id_soup').html(data.soup_id);
                jQuery('#pref_code').html(data.areaOption);
                jQuery('#show_img').html(data.photo);

                if ( edit == 0 ) {
                    jQuery('input[name="soi_product"]').prop('checked', false);
                    jQuery('input[name="Email_open"]').prop('checked', false);
                    jQuery('input[name="area"]').prop('checked', false);
                    jQuery('#old_sbm_flag').val(0);
                    jQuery('#old_school_flag').val(0);
                }
                else {
                    jQuery('#old_soup_id').val(data.soup.soup_id);
                    jQuery('#old_sbm_flag').val(data.soup.sbm_flag);
                    jQuery('#old_school_flag').val(data.soup.school_flag);
                    jQuery('#old_show_web').val(data.soup.show_web);
                    jQuery('#old_company_name').val(data.soup.company_name);
                    jQuery('#old_contact').val(data.soup.contact);
                    jQuery('#old_products').val(data.soup.soi_products);
                    jQuery('#old_zip_code').val(data.soup.zip_code);
                    jQuery('#old_pref_code').val(data.soup.pref_code);
                    jQuery('#old_address').val(data.soup.address);
                    jQuery('#old_tel').val(data.soup.tel);
                    jQuery('#old_fax').val(data.soup.fax);
                    jQuery('#old_Email_open').val(data.soup.Email_open);
                    jQuery('#old_email').val(data.soup.Email);
                    jQuery('#old_URL').val(data.soup.URL);
                    jQuery('#old_areas').val(data.soup.areas);
                    jQuery('#old_comment').val(data.soup.comment);
                    jQuery('#old_photo').val(data.soup.photo);

                    // WEBへの掲載
                    if ( data.soup.show_web == 1 ) {
                        jQuery('input[name="show_web"]').prop("checked", true);
                    }

                    jQuery('#company_name').val(data.soup.company_name); // 会社名
                    jQuery('#contact').val(data.soup.contact);           // ご担当者名

                    // 在籍SOI（ソリマチ認定インストラクター）
                    var soi_products = data.soup.soi_products.split(',');
                    setCheckboxState(soi_products, 'soi_product', null);

                    // 住所
                    var zipCode = data.soup.zip_code.split('-');
                    jQuery('#Zip1').val(zipCode[0]);
                    jQuery('#Zip2').val(zipCode[1]);
                    jQuery('#Address').val(data.soup.address);

                    // 電話番号
                    var arrTel = data.soup.tel.split('-');
                    jQuery('#Tel1').val(arrTel[0]);
                    jQuery('#Tel2').val(arrTel[1]);
                    jQuery('#Tel3').val(arrTel[2]);

                    // ＦＡＸ番号
                    var arrFax = data.soup.fax.split('-');
                    jQuery('#Fax1').val(arrFax[0]);
                    jQuery('#Fax2').val(arrFax[1]);
                    jQuery('#Fax3').val(arrFax[2]);

                    // 御社または担当者のE-Mailアドレス
                    jQuery('#Mail1').val(data.soup.Email);
                    jQuery('#Mail2').val(data.soup.Email);
                    if ( data.soup.Email_open == 1 ) {
                        jQuery('input[name="Email_open"]').prop("checked", true);
                    }

                    // 御社ＨＰアドレス
                    jQuery('#URL').val(data.soup.URL);

                    // 対応可能地域
                    var areas = data.soup.areas.split(',');
                    setCheckboxState(areas, 'area', null);

                    // ＰＲ・コメント欄
                    jQuery('#comment').val(data.soup.comment);
                }
            }
        },
        error: function(xhr, textStatus, errorThrown) {
            jQuery('.error_inline').css('display','block');
            jQuery('.error_inline').html('サーバーへの接続に失敗しました。' + errorThrown);
        }
    });
}

// SOUP 情報の新規作成・更新
function saveFormSoup(params ) {
    jQuery('.dialogLoading').show();
    jQuery.ajax({
        type: 'POST',
        url: ajaxObject.urlform,
        data: {
            action:           'saveForm',
            numPage:          SOUP,
            isEdit:           params.isEdit,

            old_soup_id:      params.old_soup_id,
            old_sbm_flag:     params.old_sbm_flag,
            old_school_flag:  params.old_school_flag,
            old_show_web:     params.old_show_web,
            old_company_name: params.old_company_name,
            old_contact:      params.old_contact,
            old_soi_products: params.old_soi_products,
            old_zip_code:     params.old_zip_code,
            old_pref_code:    params.old_pref_code,
            old_address:      params.old_address,
            old_tel:          params.old_tel,
            old_fax:          params.old_fax,
            old_email_open:   params.old_Email_open,
            old_email:        params.old_Email,
            old_URL:          params.old_URL,
            old_areas:        params.old_areas,
            old_comment:      params.old_comment,
            old_photo:        params.old_photo,

            soup_id:          params.soup_id,
            sbm_flag:         params.sbm_flag,
            school_flag:      params.school_flag,
            show_web:         params.show_web,
            company_name:     params.company_name,
            contact:          params.contact,
            soi_products:     params.soi_products,
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
            areas:            params.areas,
            comment:          params.comment,
            images:           params.images,
            edit_img:         params.edit_img,
            del_img: 		  params.del_img,
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
    formLoad(SOUP, null);

    // この内容で送信する
    jQuery('input[name="submit_a"]').click(function() {
        // 在籍SOI（ソリマチ認定インストラクター）
        var products = '';
        for (var i = 1; i <= 3; i++) {
            if ( jQuery('#soi_product' + i).is(':checked')) {
                products += (products == '') ? jQuery('#soi_product' + i).val() : ',' + jQuery('#soi_product' + i).val();
            }
        }

        // 対応可能地域
        var areas = '';
        for (var i = 1; i <= 47; i++) {
            if ( jQuery('#area' + i).is(':checked')) {
                areas += (areas == '') ? jQuery('#area' + i).val() : ',' + jQuery('#area' + i).val();
            }
        }

        // データ設定
        var params = new Object();
        params.old_soup_id      = jQuery('#old_soup_id').val();
        params.old_sbm_flag     = jQuery('#old_sbm_flag').val();
        params.old_school_flag  = jQuery('#old_school_flag').val();
        params.old_Email_open   = jQuery('#old_Email_open').val();
        params.old_soi_products = jQuery('#old_products').val();
        params.old_areas        = jQuery('#old_areas').val();

        params.soup_id          = jQuery('#soup_id').val();
        params.sbm_flag         = jQuery('#old_sbm_flag').val();
        params.school_flag      = jQuery('#old_school_flag').val();
        params.Email_open       = (jQuery('#Email_open').is(':checked')) ? 1 : 0;
        params.soi_products     = products;
        params.areas            = areas;

        generalConfirm(params);
        saveFormSoup(params);
    });
});