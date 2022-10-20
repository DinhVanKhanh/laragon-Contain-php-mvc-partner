ToTopPage();
jQuery( "input[name=soi_products]" ).prop( "checked", false );

jQuery(document).bind('keydown keyup', function(e) {
    // 116:F5、82：R
    if ( e.which === 116 || (e.which === 82 && e.ctrlKey) ) {
        jQuery( "input[name=soi_products]" ).prop( "checked", false );
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
        if (jQuery('#old_address').val() != '') {
            var prod = '';
            for (var i = 1; i <= 3; i++) {
                if ( jQuery('#soi_products' + i).is(':checked') ) {
                    prod += ( prod == '') ? jQuery('#soi_products' + i).val() : ',' + jQuery('#soi_products' + i).val();
                }
            }
            get_values(SOUP, prod, null);
        }
    }
    else {
        jQuery('.hBlock_soup').html('');
        jQuery('.errorMsg').html('');
    }
});

// 上記の条件で再検索する
jQuery('input[name="submit_research"]').click(function() {
    var prod = '';
    for (var i = 1; i <= 3; i++) {
        if ( jQuery('#soi_products' + i).is(':checked') ) {
            prod += ( prod == '') ? jQuery('#soi_products' + i).val() : ',' + jQuery('#soi_products' + i).val();
        }
    }
    get_values(SOUP, prod, null);
});

// 検索画面に戻る
jQuery('.btnBack_soup').click(function() {
    jQuery( 'select[name=address]' ).attr('value', '');
    jQuery( 'select[name=address] option:selected' ).removeAttr('selected');
    jQuery( '#old_address' ).val('');
    location.reload();
});

// エベント設定
Click_Event(SOUP, "#next_soup");
Click_Event(SOUP, "#back_soup");
Click_Event(SOUP, ".pageA");

// 検索
function searchAction(params) {
    jQuery('#scLoading').show();
    jQuery.ajax({
        type: 'POST',
        dataType: 'json',
        url: ajaxObject.urlsearch,
        cache: false,
        data: {
            action:       'searchAction',
            numPage:      SOUP,
            address:      params.address,
            soi_products: params.soi_products,
            page:         params.page,
            isButton:     params.isButton,
            isPageA:      params.isPageA
        },
        success: function(data) {
            if (typeof data === 'string') {
                jQuery('.errorMsg').html(data);
                jQuery('#scLoading').hide();
                return;
            }
            if (data.success) {
                jQuery('.hBlock_soup').html(data.dataGrid);
                jQuery('.btnBack_soup').show();
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