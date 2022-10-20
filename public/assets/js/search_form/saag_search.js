loadAllChecklist();
ToTopPage();
// 検索条件
jQuery('select[name="address"]').change(function() {
    if (jQuery(this).val() != '') {
        jQuery('#old_address').val(jQuery(this).val());
        jQuery(this).parents('.select_area').siblings().find('select').attr('value', '');
        jQuery(this).parents('.select_area').siblings().find('option').removeAttr('selected');
        get_values(SAAG, null, null);
    }
    else {
        jQuery('.hBlock_saag').html('');
        jQuery('.errorMsg').html('');
    }
});

// 上記の条件で再検索する
jQuery('input[name="submit_research"]').click(function() {
    get_values(SAAG, null, null);
});

// 検索画面に戻る
jQuery('.btnBack').click(function() {
    jQuery('select[name=address]').attr('value', '');
    jQuery('select[name=address] option').removeAttr('selected');
    jQuery('.check_map input').attr('value', '');
    jQuery( '#old_address').val('');
    location.reload();
});

// エベント設定
Click_Event(SAAG, "#next_saag");
Click_Event(SAAG, "#back_saag");
Click_Event(SAAG, ".pageA");

// 製品・始業チェックボックス
function loadAllChecklist() {
    jQuery.ajax({
        async: false,
        cache: false,
        type: 'POST',
        dataType: 'json',
        url: ajaxObject.urlsearch,
        data: { action: 'loadAllChecklist' },
        success: function(data) {
            if (data.success) {
                jQuery('#check_pro').html(data.checkpro);
                jQuery('#check_sp').html(data.checksp);
            }
        },
        error: function(xhr, textStatus, errorThrown) {
            jQuery('.errorMsg').html('接続失敗');
        }
    });
}

// 検索
function searchAction(params) {
    jQuery('#scLoading').show();
    jQuery.ajax({
        cache: false,
        type: 'POST',
        dataType: 'json',
        url: ajaxObject.urlsearch,
        data: {
            action:   'searchAction',
            numPage:  SAAG,
            address:  params.address,
            seihin:   params.seihin,
            sigyo:    params.sigyo,
            page:     params.page,
            isButton: params.isButton,
            isPageA:  params.isPageA
        },
        success: function(data) {
            if (typeof data === 'string') {
                jQuery('.errorMsg').html(data);
                jQuery('#scLoading').hide();
                return;
            }
            if (data.success) {
                jQuery('.hBlock_saag').html(data.dataGrid);
                jQuery('.btnBack').show();
                jQuery('#old_address').val(data.old_address);
                jQuery('input[name="submit_research"]').css('display', 'block');
                jQuery('#scLoading').hide();
            }
            jQuery("html, body").animate({ scrollTop: 0 }, "fast");
        },
        error: function(xhr, textStatus, errorThrown) {
            jQuery('.errorMsg').html('接続失敗：' + errorThrown);
        }
    });
}