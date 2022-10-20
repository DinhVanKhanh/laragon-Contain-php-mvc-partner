ToTopPage();
jQuery( "input[name=demo]" ).prop( "checked", false );
jQuery( "input[name=visit]" ).prop( "checked", false );

jQuery(document).bind('keydown keyup', function(e) {
    // 116:F5、82：R
    if ( e.which === 116 || (e.which === 82 && e.ctrlKey) ) {
        jQuery( "input[name=demo]" ).prop( "checked", false );
        jQuery( "input[name=visit]" ).prop( "checked", false );
        jQuery( 'select[name=address]' ).attr('value', '');
        jQuery( 'select[name=address] option:selected' ).removeAttr('selected');
    }
});

// 検索条件
jQuery('select[name="address"]').change(function() {
    if (jQuery(this).val() != '') {
        jQuery('#old_address').val(jQuery(this).val());
        jQuery(this).parents('.select_area').siblings().find('select').attr('value', '');
        jQuery(this).parents('.select_area').siblings().find('option').removeAttr('selected');
        var demo = ( jQuery("#demo1").prop( "checked" ) ) ? 1 : 2;
        var visit = ( jQuery("#visit1").prop( "checked" ) ) ? 1 : 2;
        get_values(SOSP, demo, visit);
    }
    else {
        jQuery('.hBlock_sosp').html('');
        jQuery('.errorMsg').html('');
    }
});

// 上記の条件で再検索する
jQuery('input[name="submit_research"]').click(function() {
    var demo  = (jQuery('#demo1').prop( "checked" )) ? 1 : 2;
    var visit = (jQuery('#visit1').prop( "checked" )) ? 1 : 2;
    get_values(SOSP, demo, visit);
});

// 検索画面に戻る
jQuery('.btnBack_sosp').click(function() {
    jQuery( "input[name=demo]" ).prop( "checked", false );
    jQuery( "input[name=visit]" ).prop( "checked", false );
    jQuery( 'select[name=address]').attr('value', '');
    jQuery( 'select[name=address] option:selected').removeAttr('selected');
    jQuery( '#old_address').val('');
    location.reload();
});

// エベント設定
Click_Event(SOSP, "#next_sosp");
Click_Event(SOSP, "#back_sosp");
Click_Event(SOSP, ".pageA");

// 検索
function searchAction(params) {
    jQuery('#scLoading').show();
    jQuery.ajax({
        type: 'POST',
        dataType: 'json',
        url: ajaxObject.urlsearch,
        cache: false,
        data: {
            action:   'searchAction',
            numPage:  SOSP,
            address:  params.address,
            demo:     params.demo,
            visit:    params.visit,
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
                jQuery('.hBlock_sosp').html(data.dataGrid);
                jQuery('.btnBack_sosp').show();
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