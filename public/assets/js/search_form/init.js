// Content-Security-Policy: script-src 'self' https://apis.google.com
const SAAG = 1;
const SOSP = 2;
const SOUP = 3;
var ajaxObject = {
  urlform: "/partner/form-controller/",
  urlsearch: "/partner/search-controller/",
  urlmaster: "/partner/master-controller/",
};
// リンク設定
jQuery("a[href ^= '#']").click(function () {
  var speed = 300;
  var href = jQuery(this).attr("href");
  var target = jQuery(href == "#" || href == "" ? "html" : href);
  var position = target.offset().top;
  jQuery(jQuery.browser.safari ? "body" : "html").animate(
    { scrollTop: position },
    speed,
    "easeOutExpo"
  );
  return false;
});

// データチェック
function arrVal(ain) {
  var checkedValues = ain
    .map(function () {
      return this.value;
    })
    .get();
  return checkedValues;
}

// データ取得
// numPage SAAG, SOSP, SOUP
// custom1 SAAG=null, SOSP=demo,  SOUP=soi_products
// custom2 SAAG=null, SOSP=visit, SOUP=null
function get_values(numPage, custom1, custom2) {
  // SAAG
  if (numPage == SAAG) {
    if (jQuery("#old_address").val() != "") {
      var params = new Object();
      params.address = jQuery("#old_address").val();
      params.seihin = arrVal(jQuery('input[name="seihin"]:checked'));
      params.sigyo = arrVal(jQuery('input[name="sigyo"]:checked'));
      params.page = jQuery('input[name="page"]').val();
      searchAction(params);
    }
    return;
  }
  // SOSP, SOUP
  else {
    var params = new Object();
    params.address = jQuery("#old_address").val();
    if (numPage == SOSP) {
      params.demo = custom1;
      params.visit = custom2;
    } else {
      params.soi_products = custom1 != "" ? custom1 : "";
    }
    params.isButton = 0;
    params.isPageA = 0;
    params.page = jQuery('input[name="page"]').val();
    searchAction(params);
    return;
  }
}

// エベント設定
// numPage   SAAG, SOSP, SOUP
// nameClass #next, #back
function Click_Event(numPage, nameClass) {
  jQuery(document).on("click", nameClass, function (e) {
    var params = new Object();
    params.address = jQuery('input[name="address1"]').val();
    params.isButton = 0;
    params.isPageA = 0;
    var id = "";
    var back = "";

    switch (numPage) {
      case SAAG:
        params.seihin = jQuery('input[name="seihin1"]').val();
        params.sigyo = jQuery('input[name="sigyo1"]').val();
        id = "#next_saag";
        back = "#back_saag";
        break;
      case SOSP:
        params.demo = jQuery('input[name="demo1"]').val();
        params.visit = jQuery('input[name="visit1"]').val();
        id = "#next_sosp";
        back = "#back_sosp";
        break;
      case SOUP:
        params.demo = jQuery('input[name="soi_product1"]').val();
        id = "#next_soup";
        back = "#back_soup";
        break;
    }

    if (nameClass == id) {
      params.page = jQuery('input[name="page_next"]').val();
      params.isButton = 1;
    } else if (nameClass == back) {
      params.page = jQuery('input[name="page_back"]').val();
      params.isButton = 1;
    } else if (nameClass == ".pageA") {
      params.page = jQuery(e.target).text() - 1;
      params.isPageA = 1;
    }
    searchAction(params);
  });
}

// TOPページへ
function ToTopPage() {
  jQuery("#btn_top_page").click(function (event) {
    jQuery("html,body").animate({ scrollTop: 0 }, 1400);
    return false;
  });
}

// 初期処理
function formLoad(numPage, category) {
  deleteImageNotUse();
  if (category == null) {
    loadAreas();
    formBack(numPage);
    jQuery("#submit_client").click(function () {
      submitClient(numPage, category);
    });
  }
  bindInputCode("company_name");
  bindInputCode("contact");
  bindInputCode("URL");
  bindInputCode("comment");

  keydownEmail("#Mail1");
  keydownEmail("#Mail2");

  numericInput("Tel1");
  numericInput("Tel2");
  numericInput("Tel3");
  bindInputCode("Tel1");
  bindInputCode("Tel2");
  bindInputCode("Tel3");

  numericInput("Fax1");
  numericInput("Fax2");
  numericInput("Fax3");
  bindInputCode("Fax1");
  bindInputCode("Fax2");
  bindInputCode("Fax3");

  numericInput("Zip1");
  numericInput("Zip2");
  bindInputCode("Zip1");
  bindInputCode("Zip2");
  bindInputCode("Address");

  changeFileImage(numPage);
  deleteImage(numPage);
  resizeTextarea();
  window.onbeforeunload = function (e) {
    localStorage.setItem("scrollpos", 0);
  };
  var scrollpos = localStorage.getItem("scrollpos");
  if (scrollpos) window.scrollTo(0, scrollpos);

  // $(window).scroll(function (event) {
  //     localStorage.setItem('scrollpos', window.scrollY);
  // });
}

// 前のページへ
function formBack(numPage) {
  jQuery('input[name="back"]').click(function () {
    jQuery(".error_inline0").html("");
    jQuery(".error_inline2").html("");
    jQuery(".error_inline3").html("");
    jQuery(".error_inline4").html("");
    jQuery(".error_inline5").html("");

    switch (numPage) {
      case SAAG:
        jQuery(".error_inline1").html("");
        jQuery(".error_inline6").html("");
        jQuery(".error_inline7").html("");
        jQuery(".error_inline8").html("");
        jQuery(".error_inline10").html("");
        jQuery(".error_inline11").html("");
        break;
      case SOUP:
        jQuery(".error_inline6").html("");
        break;
    }

    jQuery(".box_1").css("display", "block");
    jQuery(".box_2").css("display", "none");
    jQuery(".show_client").css("display", "block");
    jQuery(".show_confirm").css("display", "none");
    jQuery("#submit_client").css("display", "inline-block");
    jQuery("#back").css("display", "none");
    jQuery("#ok").css("display", "none");
    jQuery("html, body").animate({ scrollTop: 0 }, "slow");
  });
}

//「この内容で送信する」ボタンのデータ設定
function generalConfirm(params) {
  params.isEdit = jQuery("#isEdit").val();
  params.old_company_name = jQuery("#old_company_name").val();
  params.old_contact = jQuery("#old_contact").val();
  params.old_email = jQuery("#old_email").val();
  params.old_zip_code = jQuery("#old_zip_code").val();
  params.old_pref_code = jQuery("#old_pref_code").val();
  params.old_address = jQuery("#old_address").val();
  params.old_tel = jQuery("#old_tel").val();
  params.old_fax = jQuery("#old_fax").val();
  params.old_URL = jQuery("#old_URL").val();
  params.old_show_web = jQuery("#old_show_web").val();
  params.old_comment = jQuery("#old_comment").val();
  params.old_photo =
    jQuery("#old_photo").val() == "" ? 0 : jQuery("#old_photo").val();

  params.company_name = jQuery("#company_name").val();
  params.contact = jQuery("#contact").val();
  params.Mail1 = jQuery("#Mail1").val();
  params.Mail2 = jQuery("#Mail2").val();
  params.Zip1 = jQuery("#Zip1").val();
  params.Zip2 = jQuery("#Zip2").val();
  params.pref_code = jQuery("#pref_code").val();
  params.address = jQuery("#Address").val();
  params.Tel1 = jQuery("#Tel1").val();
  params.Tel2 = jQuery("#Tel2").val();
  params.Tel3 = jQuery("#Tel3").val();
  params.Fax1 = jQuery("#Fax1").val();
  params.Fax2 = jQuery("#Fax2").val();
  params.Fax3 = jQuery("#Fax3").val();
  params.URL = jQuery("#URL").val();
  params.show_web = jQuery("#show_web").is(":checked") ? 1 : 0;
  params.comment = jQuery("#comment").val();
  params.images = jQuery("#file_name").val();
  params.edit_img = jQuery("#edit_img").val();
  params.del_img = jQuery("#del_img").val();
}

//「入力内容を確認する」ボタン
function submitClient(numPage, category) {
  jQuery(".error_inline0").html("");
  jQuery(".error_inline1").html("");
  jQuery(".error_inline2").html("");
  jQuery(".error_inline3").html("");
  jQuery(".error_inline4").html("");
  jQuery(".error_inline5").html("");

  var Error_Addr = "error_inline3";
  var Error_Tel = "error_inline4";
  var Error_Mail = "error_inline5";

  switch (numPage) {
    case SAAG:
      Error_Addr = "error_inline5";
      Error_Tel = "error_inline5";
      Error_Mail = "error_inline3";

      jQuery(".error_inline6").html("");
      jQuery(".error_inline7").html("");
      jQuery(".error_inline8").html("");
      jQuery(".error_inline9").html("");
      jQuery(".error_inline10").html("");
      jQuery(".error_inline11").html("");

      // 所有資格
      var OfficeQua = "";
      for (var i = 1; i <= 10; i++) {
        if (jQuery("#OfficeQua" + i).is(":checked")) {
          OfficeQua +=
            OfficeQua == ""
              ? jQuery("#OfficeQua" + i).val()
              : ", " + jQuery("#OfficeQua" + i).val();
        }
      }

      // 対応可能製品
      var OfficePro = "";
      for (var i = 1; i <= 6; i++) {
        if (jQuery("#OfficePro" + i).is(":checked")) {
          OfficePro +=
            OfficePro == ""
              ? jQuery("#OfficePro" + i).val()
              : ", " + jQuery("#OfficePro" + i).val();
        }
      }

      // 対応可能エリア
      var OfficeArea = "";
      if (jQuery('input[name="OfficeAreaAll"]').is(":checked")) {
        OfficeArea = jQuery('input[name="OfficeAreaAll"]:checked').val();
      }
      for (var i = 1; i <= 47; i++) {
        if (
          !jQuery('input[name="OfficeAreaAll"]').is(":checked") &&
          jQuery("#area" + i).is(":checked")
        ) {
          OfficeArea +=
            OfficeArea == ""
              ? jQuery("#area" + i).val()
              : ", " + jQuery("#area" + i).val();
        }
      }

      // 掲載事務所名
      var company_name = jQuery("#company_name").val();
      if (company_name.trim() == "") {
        setError(
          "error_inline0",
          "掲載事務所名を入力してください。",
          "#company_name",
          numPage
        );
        return false;
      }
      if (company_name.length > 250) {
        setError(
          "error_inline0",
          "掲載事務所名を250文字以内で入力してください。",
          "#company_name",
          numPage
        );
        return false;
      }

      // 希望掲載形式＝詳細形式
      if (jQuery("#InfoType1").is(":checked")) {
        // 所長名
        if (jQuery("#member_name").val().trim() == "") {
          setError(
            "error_inline1",
            "所長名を入力してください。",
            "#member_name",
            numPage
          );
          return false;
        }
        if (jQuery("#member_name").val().length > 250) {
          setError(
            "error_inline1",
            "所長名は250文字以内で入力してください。",
            "#member_name",
            numPage
          );
          return false;
        }

        // 担当者名
        if (jQuery("#contact").val().trim() == "") {
          setError(
            "error_inline2",
            "担当者名を入力してください。",
            "#contact",
            numPage
          );
          return false;
        }
        if (jQuery("#contact").val().length > 250) {
          setError(
            "error_inline2",
            "担当者名は250文字以内で入力してください。",
            "#contact",
            numPage
          );
          return false;
        }

        // 所有資格
        if (
          OfficeQua == "" &&
          jQuery("#OfficeQualificationOther").val() == ""
        ) {
          setError(
            "error_inline7",
            "所有資格を入力してください。",
            "#OfficeQualificationOther",
            numPage
          );
          return false;
        }

        // 対応可能製品
        if (OfficePro == "" && jQuery("#OfficeProductOther").val() == "") {
          setError(
            "error_inline8",
            "対応可能製品を入力してください。",
            "#OfficeProductOther",
            numPage
          );
          return false;
        }

        // 対応可能エリア
        if (OfficeArea == "") {
          jQuery(".error_inline0").html("");
          jQuery(".error_inline1").html("");
          jQuery(".error_inline2").html("");
          jQuery(".error_inline3").html("");
          jQuery(".error_inline4").html("");
          jQuery(".error_inline5").html("");
          jQuery(".error_inline6").html("");
          jQuery(".error_inline7").html("");
          jQuery(".error_inline8").html("");
          jQuery(".error_inline9").html("対応可能エリアを入力してください。");
          jQuery(".error_inline10").html("");
          document.getElementById("error_inline11").focus();
          return false;
        }

        // 貴所ＰＲ
        if (trimCustom(jQuery("#comment").val()) == "") {
          setError(
            "error_inline10",
            "貴所ＰＲを入力してください。",
            "comment",
            numPage
          );
          return false;
        }
      }

      // 都道府県
      if (jQuery("#pref_code").val() == 0) {
        setError(
          "error_inline5",
          "都道府県を選択してください。",
          "#pref_code",
          numPage
        );
        return false;
      }
      break;

    case SOSP:
      // 会社名
      var company_name = jQuery("#company_name").val();
      if (company_name.trim() == "") {
        setError(
          "error_inline0",
          "会社名を入力してください。",
          "#company_name",
          numPage
        );
        return false;
      }
      if (company_name.length > 150) {
        setError(
          "error_inline0",
          "会社名を150文字以内で入力してください。",
          "#company_name",
          numPage
        );
        return false;
      }

      // ご担当者名
      var contact = jQuery("#contact").val();
      if (contact.trim() == "") {
        setError(
          "error_inline1",
          "ご担当者名を入力してください。",
          "#contact",
          numPage
        );
        return false;
      }
      if (contact.length > 60) {
        setError(
          "error_inline1",
          "ご担当者名を60文字以内で入力してください。",
          "#contact",
          numPage
        );
        return false;
      }

      // 都道府県
      if (jQuery("#pref_code").val() == 0) {
        setError(
          "error_inline3",
          "都道府県を選択してください。",
          "#pref_code",
          numPage
        );
        return false;
      }
      break;

    case SOUP:
      jQuery(".error_inline6").html("");

      // 在籍SOI（ソリマチ認定インストラクター）
      var products = "";
      for (var i = 1; i <= 3; i++) {
        if (jQuery("#soi_product" + i).is(":checked")) {
          products +=
            products == ""
              ? jQuery("#soi_product" + i).val()
              : "," + jQuery("#soi_product" + i).val();
        }
      }

      // 対応可能地域
      var areas = "";
      for (var i = 1; i <= 47; i++) {
        if (jQuery("#area" + i).is(":checked")) {
          areas +=
            areas == ""
              ? jQuery("#area" + i).val()
              : "," + jQuery("#area" + i).val();
        }
      }

      // 会社名
      var company_name = jQuery("#company_name").val();
      if (company_name.trim() == "") {
        setError(
          "error_inline0",
          "会社名を入力してください。",
          "#company_name",
          numPage
        );
        return false;
      }
      if (company_name.length > 150) {
        setError(
          "error_inline0",
          "会社名を150文字以内で入力してください。",
          "#company_name",
          numPage
        );
        return false;
      }

      // ご担当者名
      var contact = jQuery("#contact").val();
      if (contact.trim() == "") {
        setError(
          "error_inline1",
          "ご担当者名を入力してください。",
          "#contact",
          numPage
        );
        return false;
      }
      if (contact.length > 60) {
        setError(
          "error_inline1",
          "ご担当者名を60文字以内で入力してください。",
          "#contact",
          numPage
        );
        return false;
      }

      // 在籍SOI（ソリマチ認定インストラクター）
      if (products == "") {
        setError(
          "error_inline2",
          "在籍SOIの１つチェックしてください。",
          "#error_inline2",
          numPage
        );
        jQuery('input[name^="soi_product"]')[0].focus();
        return false;
      }

      // 都道府県
      if (jQuery("#pref_code").val() == 0) {
        setError(
          "error_inline3",
          "都道府県を選択してください。",
          "#pref_code",
          numPage
        );
        return false;
      }
      break;
  }
  jQuery(".show_img").html(jQuery("#show_img").html());

  // 住所
  var zip1 = validText(jQuery("#Zip1").val(), "NORMAL");
  jQuery("#Zip1").val(zip1);
  if (trimCustom(zip1) == "") {
    setError(Error_Addr, "住所を入力してください。", "#Zip1", numPage);
    return false;
  }

  var zip2 = validText(jQuery("#Zip2").val(), "NORMAL");
  jQuery("#Zip2").val(zip2);
  if (zip2.trim() == "") {
    setError(Error_Addr, "住所を入力してください。", "#Zip2", numPage);
    return false;
  }

  var address = validText(jQuery("#Address").val(), "NORMAL");
  jQuery("#Address").val(address);
  if (address.trim() == "") {
    setError(Error_Addr, "住所を入力してください。", "#Address", numPage);
    return false;
  }
  if (address.length > 100) {
    setError(
      Error_Addr,
      "住所を100文字以内で入力してください。",
      "#Address",
      numPage
    );
    return false;
  }

  var zipCode =
    "〒" +
    zip1 +
    " - " +
    zip2 +
    "<br/>" +
    jQuery("#pref_code option:selected").text() +
    "<br/>" +
    address;
  jQuery(".Address").html(zipCode.trim());

  // 電話番号
  var tel1 = validText(jQuery("#Tel1").val(), "NORMAL");
  jQuery("#Tel1").val(tel1);
  if (tel1.trim() == "") {
    setError(Error_Tel, "電話番号を入力してください。", "#Tel1", numPage);
    return false;
  }

  var tel2 = validText(jQuery("#Tel2").val(), "NORMAL");
  jQuery("#Tel2").val(tel2);
  if (tel2.trim() == "") {
    setError(Error_Tel, "電話番号を入力してください。", "#Tel2", numPage);
    return false;
  }

  var tel3 = validText(jQuery("#Tel3").val(), "NORMAL");
  jQuery("#Tel3").val(tel3);
  if (tel3.trim() == "") {
    setError(Error_Tel, "電話番号を入力してください。", "#Tel3", numPage);
    return false;
  }

  // FAX
  var fax1 = validText(jQuery("#Fax1").val(), "NORMAL");
  jQuery("#Fax1").val(fax1);
  var fax2 = validText(jQuery("#Fax2").val(), "NORMAL");
  jQuery("#Fax2").val(fax2);
  var fax3 = validText(jQuery("#Fax3").val(), "NORMAL");
  jQuery("#Fax3").val(fax3);

  var arrFax =
    fax1 == "" || fax2 == "" || fax3 == ""
      ? ""
      : fax1 + " - " + fax2 + " - " + fax3;
  jQuery(".Fax").html(arrFax.trim());

  // 貴所または担当者のE-Mailアドレス
  var filter =
    /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  var mail1 = validText(jQuery("#Mail1").val(), "MAIL");
  jQuery("#Mail1").val(mail1);
  if (trimCustom(mail1) == "") {
    setError(
      Error_Mail,
      "貴所または担当者のE-Mailアドレス(半角)を入力してください。",
      "#Mail1",
      numPage
    );
    return false;
  }
  if (!filter.test(mail1)) {
    setError(
      Error_Mail,
      "貴所または担当者のE-Mailアドレスを入力してください。\nexample@gmail.com",
      "#Mail1",
      numPage
    );
    return false;
  }

  var mail2 = validText(jQuery("#Mail2").val(), "MAIL");
  jQuery("#Mail2").val(mail2);
  if (mail2 == "") {
    setError(
      Error_Mail,
      "貴所または担当者のE-Mailアドレス(確認用)を入力してください。",
      "#Mail2",
      numPage
    );
    return false;
  }
  if (trimCustom(mail1) != mail2) {
    setError(
      Error_Mail,
      "E-Mailアドレス(２箇所)の入力内容をご確認ください。",
      "#Mail2",
      numPage
    );
    return false;
  }

  var mail_short = jQuery("#Mail1");
  mail_short.each(function () {
    var description = jQuery(this).val();
    if (description.length > 50) {
      var mail = description.split("@");
      jQuery(this).val(mail[0].substring(0, 40) + "[...]@" + mail[1]);
    }
  });

  if (category == null) {
    switch (numPage) {
      case SAAG:
        // 掲載事務所名
        jQuery(".company_name").text(company_name.trim());

        var infoType = jQuery("#InfoType1").is(":checked")
          ? "詳細形式"
          : "簡易リスト形式";
        jQuery(".InfoType").text(infoType);

        jQuery(".saag_id").text(jQuery("#id_saag").html());

        // 対応可能サービス
        var campaign = jQuery("#campaign").is(":checked")
          ? "みんなの税務相談"
          : "";
        jQuery(".campaign").text(campaign);

        jQuery(".member_name").text(jQuery("#member_name").val().trim());
        jQuery(".contact").text(jQuery("#contact").val().trim());

        // 貴所ＨＰアドレス
        var URL = validText(jQuery("#URL").val(), "URL");
        jQuery("#URL").val(URL);
        jQuery(".URL").text(URL.trim());

        // 所有資格
        var OfficeQua2 =
          OfficeQua !== "" && jQuery("#OfficeQualificationOther").val() !== ""
            ? OfficeQua + ", " + jQuery("#OfficeQualificationOther").val()
            : OfficeQua !== "" &&
              jQuery("#OfficeQualificationOther").val() == ""
            ? OfficeQua
            : jQuery("#OfficeQualificationOther").val();
        jQuery(".OfficeQua").text(OfficeQua2.trim());

        // 対応可能製品
        var OfficePro2 =
          OfficePro !== "" && jQuery("#OfficeProductOther").val() !== ""
            ? OfficePro + ", " + jQuery("#OfficeProductOther").val()
            : OfficePro !== "" && jQuery("#OfficeProductOther").val() == ""
            ? OfficePro
            : jQuery("#OfficeProductOther").val();
        jQuery(".OfficePro").text(OfficePro2.trim());

        // WEBへの掲載
        var show_web = jQuery("#show_web").is(":checked")
          ? "SAAG検索(WEB)に掲載する"
          : "WEBには掲載しない";
        jQuery(".show_web").text(show_web);

        jQuery(".OfficeArea").text(OfficeArea);
        jQuery(".comment").text(jQuery("#comment").val().trim());
        break;
      case SOSP:
        // 会社名
        jQuery(".company_name").text(company_name.trim());

        // ご担当者名
        jQuery(".contact").text(contact.trim());
        jQuery(".sosp_id").text(jQuery("#id_sosp").html());

        // WEBへの掲載
        var show_web = jQuery("#show_web").is(":checked")
          ? "SOSP検索(WEB)に掲載する"
          : "WEBには掲載しない";
        jQuery(".show_web").text(show_web);

        // 御社または担当者のE-Mailアドレス
        var email_open = jQuery("#Email_open").is(":checked")
          ? "公開しない"
          : "公開する";
        jQuery(".Email_open").text(email_open);

        // デモスべース（有り、なし）
        var demospace = jQuery("#demospace1").is(":checked") ? "有り" : "なし";
        jQuery(".demospace").text(demospace);

        // 訪問による導入支援（別途有償）（対応有り、対応していない）
        var visit_guide = jQuery("#visit_guide1").is(":checked")
          ? "対応有り"
          : "対応していない";
        jQuery(".visit_guide").text(visit_guide);

        jQuery(".URL").text(jQuery("#URL").val().trim());
        jQuery(".comment").text(jQuery("#comment").val().trim());
        break;
      case SOUP:
        // 会社名
        jQuery(".company_name").text(company_name.trim());

        // ご担当者名
        jQuery(".contact").text(contact.trim());
        jQuery(".soup_id").text(jQuery("#id_soup").html());

        // WEBへの掲載
        var show_web = jQuery("#show_web").is(":checked")
          ? "SOUP検索(WEB)に掲載する"
          : "WEBには掲載しない";
        jQuery(".show_web").text(show_web);

        // 御社または担当者のE-Mailアドレス
        var email_open = jQuery("#Email_open").is(":checked")
          ? "公開しない"
          : "公開する";
        jQuery(".Email_open").text(email_open);

        jQuery(".soi_products").text(products);
        jQuery(".areas").text(areas);
        jQuery(".URL").text(jQuery("#URL").val().trim());
        jQuery(".comment").text(jQuery("#comment").val().trim());
        break;
    }
    var arrTel = tel1 + " - " + tel2 + " - " + tel3;
    jQuery(".Tel").text(arrTel.trim());

    jQuery(".Mail").text(mail1.trim());

    jQuery.getScript("/assets/js/search_form/autosize.js", function () {
      autosize(document.querySelectorAll("textarea"));
    });
    jQuery(".show_client").css("display", "none");
    jQuery(".show_confirm").css("display", "table");
    jQuery("#submit_client").css("display", "none");
    jQuery(".box_1").css("display", "none");
    jQuery(".box_2").css("display", "block");
    jQuery("#back").css("display", "inline-block");
    jQuery("#ok").css("display", "inline-block");
    jQuery("html, body").animate({ scrollTop: 0 }, "slow");
  }
}

// エラー設定
function setError(itemErr, itemErrMsg, itemFocus, numPage) {
  jQuery(".error_blue").parent().css({ display: "block" });
  jQuery(".error_inline0").html("");
  jQuery(".error_inline1").html("");
  jQuery(".error_inline2").html("");
  jQuery(".error_inline3").html("");
  jQuery(".error_inline4").html("");
  jQuery(".error_inline5").html("");

  switch (numPage) {
    case SAAG:
      jQuery(".error_inline6").html("");
      jQuery(".error_inline7").html("");
      jQuery(".error_inline8").html("");
      jQuery(".error_inline9").html("");
      jQuery(".error_inline10").html("");
      jQuery(".error_inline11").html("");
      break;
    case SOUP:
      jQuery(".error_inline6").html("");
      break;
  }

  jQuery("." + itemErr).html(itemErrMsg);
  jQuery(itemFocus).focus();
}

// ダイアログを開いて、データ修正
function openDialog(id, isEdit, numPage) {
  // get position window when click
  var scrollpos = document.documentElement.scrollTop;
  localStorage.setItem("scrollpos", scrollpos);

  //disable button close avoid error close because use fancybox and dialog jquery
  // $(".dialog-close").removeClass('fancybox-close');

  jQuery(".show_pc").css("display", "inline-block");
  jQuery(".error_inline0").html("");
  jQuery(".error_inline1").html("");
  jQuery(".error_inline2").html("");
  jQuery(".error_inline3").html("");
  jQuery(".error_inline4").html("");
  jQuery(".error_inline5").html("");
  jQuery(".error_inline6").html("");
  jQuery(".error_inline7").html("");
  jQuery(".error_inline8").html("");
  jQuery(".error_inline9").html("");
  jQuery(".error_inline10").html("");

  bindInputCode("company_name");
  bindInputCode("contact");
  bindInputCode("URL");
  bindInputCode("comment");

  keydownEmail("#Mail1");
  keydownEmail("#Mail2");

  numericInput("Tel1");
  numericInput("Tel2");
  numericInput("Tel3");
  bindInputCode("Tel1");
  bindInputCode("Tel2");
  bindInputCode("Tel3");

  numericInput("Fax1");
  numericInput("Fax2");
  numericInput("Fax3");
  bindInputCode("Fax1");
  bindInputCode("Fax2");
  bindInputCode("Fax3");

  numericInput("Zip1");
  numericInput("Zip2");
  bindInputCode("Zip1");
  bindInputCode("Zip2");
  bindInputCode("Address");

  // 更新
  if (isEdit == true) {
    switch (numPage) {
      case SAAG:
        jQuery.ajax({
          type: "POST",
          dataType: "json",
          url: ajaxObject.urlform,
          crossDomain: true,
          headers: {
            "Access-Control-Allow-Origin": "*",
          },
          data: {
            action: "loadListById",
            numPage: numPage,
            id: id,
          },
          success: function (data) {
            if (data.success) {
              jQuery("#show_img").html(data.photo);
              // jQuery('#Id').html(data.saag.saag_id);
              jQuery("#Id").html(
                `<div><span>${data.saag.saag_id}</span><button type='button' class="radius btnCheckID" onclick='dialogEditID("${data.saag.saag_id}","${numPage}");' id='${data.saag.saag_id}' value='${data.saag.saag_id}'>パートナー会員IDを変更する　※要注意</button></div>`
              );
              jQuery("#pref_code").html(data.areaOption);
              jQuery("#show_img").html(data.photo);
              jQuery("#old_saag_id").val(data.saag.saag_id);
              jQuery("#old_customer_code").val(data.saag.customer_code);
              jQuery("#old_info_type").val(data.saag.info_type);
              jQuery("#old_campaign").val(data.saag.campaign1);
              jQuery("#old_company_name").val(data.saag.company_name);
              jQuery("#old_member_name").val(data.saag.member_name);
              jQuery("#old_contact").val(data.saag.contact);
              jQuery("#old_email").val(data.saag.Email);
              jQuery("#old_zip_code").val(data.saag.zip_code);
              jQuery("#old_pref_code").val(data.saag.pref_code);
              jQuery("#old_address").val(data.saag.address);
              jQuery("#old_tel").val(data.saag.tel);
              jQuery("#old_fax").val(data.saag.fax);
              jQuery("#old_URL").val(data.saag.URL);
              jQuery("#old_qualifications").val(data.saag.qualifications);
              jQuery("#old_products").val(data.saag.products);
              jQuery("#old_show_web").val(data.saag.show_web);
              jQuery("#old_areas").val(data.saag.areas);
              jQuery("#old_comment").val(data.saag.comment);
              jQuery("#old_photo").val(data.saag.photo);

              // 希望掲載形式
              var InfoType = data.saag.info_type;
              jQuery("#InfoType" + InfoType).prop("checked", true);
              var display = InfoType == 1 ? "visible" : "hidden";
              jQuery("#essentials3").css("visibility", display);
              jQuery("#essentials4").css("visibility", display);
              jQuery("#essentials3a").css("visibility", display);
              jQuery("#essentials4a").css("visibility", display);
              jQuery("#essentials10a").css("visibility", display);
              jQuery("#essentials11a").css("visibility", display);
              jQuery("#essentials12a").css("visibility", display);
              jQuery("#essentials13a").css("visibility", display);

              // 対応可能サービス
              if (data.saag.campaign1 == 1) {
                jQuery('input[name="campaign"]').prop("checked", true);
              }

              jQuery("#company_name").val(data.saag.company_name); // 掲載事務所名
              jQuery("#member_name").val(data.saag.member_name); // 所長名
              jQuery("#contact").val(data.saag.contact); // 担当者名

              // 貴所または担当者のE-Mailアドレス
              jQuery("#Mail1").val(data.saag.Email);
              jQuery("#Mail2").val(data.saag.Email);

              // 住所
              var zipCode = data.saag.zip_code.split("-");
              jQuery("#Zip1").val(zipCode[0]);
              jQuery("#Zip2").val(zipCode[1]);
              jQuery("#Address").val(data.saag.address);

              // 電話番号
              var arrTel = data.saag.tel.split("-");
              jQuery("#Tel1").val(arrTel[0]);
              jQuery("#Tel2").val(arrTel[1]);
              jQuery("#Tel3").val(arrTel[2]);

              // ＦＡＸ番号
              var arrFax = data.saag.fax.split("-");
              jQuery("#Fax1").val(arrFax[0]);
              jQuery("#Fax2").val(arrFax[1]);
              jQuery("#Fax3").val(arrFax[2]);

              jQuery("#URL").val(data.saag.URL); // 貴所ＨＰアドレス

              // 所有資格
              var OfficeQuas = data.saag.qualifications.split(",");
              setCheckboxState(
                OfficeQuas,
                "OfficeQualification",
                "#OfficeQualificationOther"
              );

              // 対応可能製品
              var OfficePros = data.saag.products.split(",");
              setCheckboxState(
                OfficePros,
                "OfficeProduct",
                "#OfficeProductOther"
              );

              // WEBへの掲載
              if (data.saag.show_web == 1) {
                jQuery('input[name="show_web"]').prop("checked", true);
              }

              // 対応可能エリア
              var OfficeAreas = replaceAll(data.saag.areas, " ", "");
              OfficeAreas = OfficeAreas.split(",");
              var j = 0;
              var isAll = false;
              while (j < jQuery('input[name="area"]').length) {
                jQuery('input[name="area"]').eq(j).prop("checked", false);
                if (!isAll) {
                  for (var i = 0; i < OfficeAreas.length; i++) {
                    if (OfficeAreas[i] == "日本全国") {
                      jQuery('input[name="OfficeAreaAll"]').prop(
                        "checked",
                        true
                      );
                      isAll = true;
                      break;
                    } else if (
                      jQuery('input[name="area"]').eq(j).val() == OfficeAreas[i]
                    ) {
                      jQuery('input[name="area"]').eq(j).prop("checked", true);
                      break;
                    }
                  }
                }
                j++;
              }

              // 貴所ＰＲ
              jQuery("#comment").val(data.saag.comment);
              jQuery.getScript(
                "/assets/js/search_form/autosize.js",
                function () {
                  autosize(document.querySelectorAll("textarea"));
                }
              );
            }
          },
          error: function (xhr, textStatus, errorThrown) {
            jQuery(".error_inline0").html("サーバーへの接続に失敗しました。");
          },
        });
        break;

      case SOSP:
        jQuery.ajax({
          type: "POST",
          dataType: "json",
          url: ajaxObject.urlform,
          crossDomain: true,
          headers: {
            "Access-Control-Allow-Origin": "*",
          },
          data: {
            action: "loadListById",
            numPage: numPage,
            id: id,
          },
          success: function (data) {
            if (data.success) {
              jQuery("#show_img").html(data.photo);
              // jQuery('#Id').html(data.sosp.sosp_id);
              jQuery("#Id").html(
                `<div><span>${data.sosp.sosp_id}</span><button type='button' class="radius btnCheckID" onclick='dialogEditID("${data.sosp.sosp_id}","${numPage}");' id='${data.sosp.sosp_id}' value='${data.sosp.sosp_id}'>パートナー会員IDを変更する　※要注意</button></div>`
              );
              jQuery("#old_sosp_id").val(data.sosp.sosp_id);
              jQuery("#old_sbm_flag").val(data.sosp.sbm_flag);
              jQuery("#old_show_web").val(data.sosp.show_web);
              jQuery("#old_company_name").val(data.sosp.company_name);
              jQuery("#old_contact").val(data.sosp.contact);
              jQuery("#old_zip_code").val(data.sosp.zip_code);
              jQuery("#old_pref_code").val(data.sosp.pref_code);
              jQuery("#old_address").val(data.sosp.address);
              jQuery("#old_tel").val(data.sosp.tel);
              jQuery("#old_fax").val(data.sosp.fax);
              jQuery("#old_Email_open").val(data.sosp.Email_open);
              jQuery("#old_email").val(data.sosp.Email);
              jQuery("#old_URL").val(data.sosp.URL);
              jQuery("#old_demospace").val(data.sosp.demospace);
              jQuery("#old_visit_guide").val(data.sosp.visit_guide);
              jQuery("#old_comment").val(data.sosp.comment);
              jQuery("#old_photo").val(data.sosp.photo);

              // SBM（ソリマチブランドマスター）
              if (data.sosp.sbm_flag == 1) {
                jQuery('input[name="sbm_flag"]').prop("checked", true);
              }

              jQuery("#pref_code").html(data.areaOption); // 都道府県

              // WEBへの掲載
              if (data.sosp.show_web == 1) {
                jQuery('input[name="show_web"]').prop("checked", true);
              }

              jQuery("#company_name").val(data.sosp.company_name); // 会社名
              jQuery("#contact").val(data.sosp.contact); // ご担当者名

              // 住所
              var zipCode = data.sosp.zip_code.split("-");
              jQuery("#Zip1").val(zipCode[0]);
              jQuery("#Zip2").val(zipCode[1]);
              jQuery("#Address").val(data.sosp.address);

              // 電話番号
              var arrTel = data.sosp.tel.split("-");
              jQuery("#Tel1").val(arrTel[0]);
              jQuery("#Tel2").val(arrTel[1]);
              jQuery("#Tel3").val(arrTel[2]);

              // ＦＡＸ番号
              var arrFax = data.sosp.fax.split("-");
              jQuery("#Fax1").val(arrFax[0]);
              jQuery("#Fax2").val(arrFax[1]);
              jQuery("#Fax3").val(arrFax[2]);

              // 御社または担当者のE-Mailアドレス
              jQuery("#Mail1").val(data.sosp.Email);
              jQuery("#Mail2").val(data.sosp.Email);
              if (data.sosp.Email_open == 1) {
                jQuery('input[name="Email_open"]').prop("checked", true);
              }

              jQuery("#URL").val(data.sosp.URL); // 御社ＨＰアドレス
              jQuery("#demospace" + data.sosp.demospace).prop("checked", true); // デモスべース（有り、なし）
              jQuery("#visit_guide" + data.sosp.visit_guide).prop(
                "checked",
                true
              ); // 訪問による導入支援（別途有償）（対応有り、対応していない）
              jQuery("#comment").val(data.sosp.comment); // ＰＲ・コメント欄
              jQuery.getScript(
                "/assets/js/search_form/autosize.js",
                function () {
                  autosize(document.querySelectorAll("textarea"));
                }
              );
            }
          },
          error: function (xhr, textStatus, errorThrown) {
            jQuery(".error_inline0").html("サーバーへの接続に失敗しました。");
          },
        });
        break;

      case SOUP:
        jQuery.ajax({
          type: "POST",
          dataType: "json",
          url: ajaxObject.urlform,
          crossDomain: true,
          headers: {
            "Access-Control-Allow-Origin": "*",
          },
          data: {
            action: "loadListById",
            numPage: numPage,
            id: id,
          },
          success: function (data) {
            if (data.success) {
              jQuery("#pref_code").html(data.areaOption);
              jQuery("#show_img").html(data.photo);
              // jQuery('#Id').html(data.soup.soup_id);
              jQuery("#Id").html(
                `<div><span>${data.soup.soup_id}</span><button type='button' class="radius btnCheckID" onclick='dialogEditID("${data.soup.soup_id}","${numPage}");' id='${data.soup.soup_id}' value='${data.soup.soup_id}'>パートナー会員IDを変更する　※要注意</button></div>`
              );
              jQuery("#old_soup_id").val(data.soup.soup_id);
              jQuery("#old_sbm_flag").val(data.soup.sbm_flag);
              jQuery("#old_school_flag").val(data.soup.school_flag);
              jQuery("#old_show_web").val(data.soup.show_web);
              jQuery("#old_company_name").val(data.soup.company_name);
              jQuery("#old_contact").val(data.soup.contact);
              jQuery("#old_products").val(data.soup.soi_products);
              jQuery("#old_zip_code").val(data.soup.zip_code);
              jQuery("#old_pref_code").val(data.soup.pref_code);
              jQuery("#old_address").val(data.soup.address);
              jQuery("#old_tel").val(data.soup.tel);
              jQuery("#old_fax").val(data.soup.fax);
              jQuery("#old_Email_open").val(data.soup.Email_open);
              jQuery("#old_email").val(data.soup.Email);
              jQuery("#old_URL").val(data.soup.URL);
              jQuery("#old_areas").val(data.soup.areas);
              jQuery("#old_comment").val(data.soup.comment);
              jQuery("#old_photo").val(data.soup.photo);

              // SBM（ソリマチブランドマスター）
              if (data.soup.sbm_flag == 1) {
                jQuery('input[name="sbm_flag"]').prop("checked", true);
              }

              // 認定スクール
              if (data.soup.school_flag == 1) {
                jQuery("#school_flag").prop("checked", true);
              }

              // WEBへの掲載
              if (data.soup.show_web == 1) {
                jQuery('input[name="show_web"]').prop("checked", true);
              }

              jQuery("#company_name").val(data.soup.company_name); // 会社名
              jQuery("#contact").val(data.soup.contact); // ご担当者名

              // 在籍SOI（ソリマチ認定インストラクター）
              var soi_products = data.soup.soi_products.split(",");
              setCheckboxState(soi_products, "soi_product", null);

              // 住所
              var zipCode = data.soup.zip_code.split("-");
              jQuery("#Zip1").val(zipCode[0]);
              jQuery("#Zip2").val(zipCode[1]);
              jQuery("#Address").val(data.soup.address);

              // 電話番号
              var arrTel = data.soup.tel.split("-");
              jQuery("#Tel1").val(arrTel[0]);
              jQuery("#Tel2").val(arrTel[1]);
              jQuery("#Tel3").val(arrTel[2]);

              // ＦＡＸ番号
              var arrFax = data.soup.fax.split("-");
              jQuery("#Fax1").val(arrFax[0]);
              jQuery("#Fax2").val(arrFax[1]);
              jQuery("#Fax3").val(arrFax[2]);

              // 御社または担当者のE-Mailアドレス
              jQuery("#Mail1").val(data.soup.Email);
              jQuery("#Mail2").val(data.soup.Email);
              if (data.soup.Email_open == 1) {
                jQuery('input[name="Email_open"]').prop("checked", true);
              }

              // 御社ＨＰアドレス
              jQuery("#URL").val(data.soup.URL);

              // 対応可能地域
              var areas = data.soup.areas.split(",");
              setCheckboxState(areas, "area", null);

              // ＰＲ・コメント欄
              jQuery("#comment").val(data.soup.comment);
              jQuery.getScript(
                "/assets/js/search_form/autosize.js",
                function () {
                  autosize(document.querySelectorAll("textarea"));
                }
              );
            }
          },
          error: function (xhr, textStatus, errorThrown) {
            jQuery(".error_inline0").html("サーバーへの接続に失敗しました。");
          },
        });
        break;
    }
    jQuery("#isEdit").val("1");
  } else {
    jQuery("#isEdit").val("0");
  }
}

// 情報の新規作成・更新
function saveForm(numPage, params) {
  switch (numPage) {
    case SAAG:
      jQuery.ajax({
        type: "POST",
        url: ajaxObject.urlform,
        crossDomain: true,
        headers: {
          "Access-Control-Allow-Origin": "*",
        },
        data: {
          action: "saveForm",
          numPage: SAAG,
          sbm: true,
          isEdit: params.isEdit,

          old_saag_id: params.old_saag_id,
          old_customer_code: params.old_customer_code,
          old_info_type: params.old_info_type,
          old_campaign1: params.old_campaign1,
          old_company_name: params.old_company_name,
          old_member_name: params.old_member_name,
          old_contact: params.old_contact,
          old_email: params.old_email,
          old_zip_code: params.old_zip_code,
          old_pref_code: params.old_pref_code,
          old_address: params.old_address,
          old_tel: params.old_tel,
          old_fax: params.old_fax,
          old_URL: params.old_URL,
          old_qualifications: params.old_qualifications,
          old_products: params.old_products,
          old_show_web: params.old_show_web,
          old_areas: params.old_areas,
          old_comment: params.old_comment,
          old_photo: params.old_photo,

          saag_id: params.saag_id,
          info_type: params.info_type,
          campaign1: params.campaign1,
          company_name: params.company_name,
          member_name: params.member_name,
          contact: params.contact,
          mail1: params.Mail1,
          mail2: params.Mail2,
          zip_code1: params.Zip1,
          zip_code2: params.Zip2,
          pref_code: params.pref_code,
          address: params.address,
          tel1: params.Tel1,
          tel2: params.Tel2,
          tel3: params.Tel3,
          fax1: params.Fax1,
          fax2: params.Fax2,
          fax3: params.Fax3,
          URL: params.URL,
          OfficeQua: params.OfficeQua,
          OfficeQuaOther: params.OfficeQuaOther,
          OfficePro: params.OfficePro,
          OfficeProductOther: params.OfficeProductOther,
          show_web: params.show_web,
          OfficeArea: params.OfficeArea,
          comment: params.comment,
          images: params.images,
          edit_img: params.edit_img,
          del_img: params.del_img,
        },
        success: function (data) {
          jQuery.fancybox.close();
          loadList(SAAG);
          var scrollpos = localStorage.getItem("scrollpos");
          if (scrollpos) window.scrollTo(0, scrollpos);
          console.log(scrollpos);
          window.scrollTo(0, scrollpos);
        },
        error: function (xhr, textStatus, errorThrown) {
          jQuery(".error_inline0").html(
            "サーバーへの接続に失敗しました。" + errorThrown
          );
        },
      });
      break;

    case SOSP:
      jQuery.ajax({
        type: "POST",
        url: ajaxObject.urlform,
        crossDomain: true,
        headers: {
          "Access-Control-Allow-Origin": "*",
        },
        data: {
          action: "saveForm",
          numPage: SOSP,
          sbm: true,
          isEdit: params.isEdit,

          old_sosp_id: params.old_sosp_id,
          old_sbm_flag: params.old_sbm_flag,
          old_show_web: params.old_show_web,
          old_company_name: params.old_company_name,
          old_contact: params.old_contact,
          old_zip_code: params.old_zip_code,
          old_pref_code: params.old_pref_code,
          old_address: params.old_address,
          old_tel: params.old_tel,
          old_fax: params.old_fax,
          old_email_open: params.old_Email_open,
          old_email: params.old_email,
          old_URL: params.old_URL,
          old_demospace: params.old_demospace,
          old_visit_guide: params.old_visit_guide,
          old_comment: params.old_comment,
          old_photo: params.old_photo,

          sosp_id: params.sosp_id,
          sbm_flag: params.sbm_flag,
          show_web: params.show_web,
          company_name: params.company_name,
          contact: params.contact,
          zip_code1: params.Zip1,
          zip_code2: params.Zip2,
          pref_code: params.pref_code,
          address: params.address,
          tel1: params.Tel1,
          tel2: params.Tel2,
          tel3: params.Tel3,
          fax1: params.Fax1,
          fax2: params.Fax2,
          fax3: params.Fax3,
          email_open: params.Email_open,
          mail1: params.Mail1,
          mail2: params.Mail2,
          URL: params.URL,
          demospace: params.demospace,
          visit_guide: params.visit_guide,
          comment: params.comment,
          images: params.images,
          edit_img: params.edit_img,
          del_img: params.del_img,
        },
        success: function (data) {
          jQuery.fancybox.close();
          loadList(SOSP);
        },
        error: function (xhr, textStatus, errorThrown) {
          jQuery(".error_inline0").html(
            "サーバーへの接続に失敗しました。" + errorThrown
          );
        },
      });
      break;

    case SOUP:
      jQuery.ajax({
        type: "POST",
        url: ajaxObject.urlform,
        crossDomain: true,
        headers: {
          "Access-Control-Allow-Origin": "*",
        },
        data: {
          action: "saveForm",
          numPage: SOUP,
          sbm: true,
          isEdit: params.isEdit,

          old_soup_id: params.old_soup_id,
          old_sbm_flag: params.old_sbm_flag,
          old_school_flag: params.old_school_flag,
          old_show_web: params.old_show_web,
          old_company_name: params.old_company_name,
          old_contact: params.old_contact,
          old_soi_products: params.old_soi_products,
          old_zip_code: params.old_zip_code,
          old_pref_code: params.old_pref_code,
          old_address: params.old_address,
          old_tel: params.old_tel,
          old_fax: params.old_fax,
          old_email_open: params.old_Email_open,
          old_email: params.old_Email,
          old_URL: params.old_URL,
          old_areas: params.old_areas,
          old_comment: params.old_comment,
          old_photo: params.old_photo,

          soup_id: params.soup_id,
          sbm_flag: params.sbm_flag,
          school_flag: params.school_flag,
          show_web: params.show_web,
          company_name: params.company_name,
          contact: params.contact,
          soi_products: params.soi_products,
          zip_code1: params.Zip1,
          zip_code2: params.Zip2,
          pref_code: params.pref_code,
          address: params.address,
          tel1: params.Tel1,
          tel2: params.Tel2,
          tel3: params.Tel3,
          fax1: params.Fax1,
          fax2: params.Fax2,
          fax3: params.Fax3,
          email_open: params.Email_open,
          mail1: params.Mail1,
          mail2: params.Mail2,
          URL: params.URL,
          areas: params.areas,
          comment: params.comment,
          images: params.images,
          edit_img: params.edit_img,
          del_img: params.del_img,
        },
        success: function (data) {
          jQuery.fancybox.close();
          loadList(SOUP);
        },
        error: function (xhr, textStatus, errorThrown) {
          jQuery(".error_inline0").html(
            "サーバーへの接続に失敗しました。" + errorThrown
          );
        },
      });
      break;
  }
}

// タブ初期処理
function openTab(Page) {
  jQuery(".tab li").removeClass("active");
  jQuery(".area").css({ display: "none" });
  jQuery("#tabs li").removeClass("active");

  // 管理者メニュー
  if (Page == "tab4") {
    jQuery("#tab-box").removeClass("active");
    jQuery("#tab-box").css({ display: "none" });
    jQuery("#tab4").addClass("active");
    jQuery("#tab4-box").addClass("active");
    jQuery("#tab4-box").css({ display: "block" });
    // loadMailBcc();
    loadGridIdPass();
  }
  // SAAG, SOSP, SOUP一覧
  else {
    var numPage = Page == "tabSaag" ? SAAG : Page == "tabSosp" ? SOSP : SOUP;
    var title = numPage == SAAG ? "SAAG" : numPage == SOSP ? "SOSP" : "SOUP";

    jQuery("#tab4-box").removeClass("active");
    jQuery("#tab4-box").css({ display: "none" });
    jQuery("#" + Page).addClass("active");
    jQuery("#tab-box").addClass("active");
    jQuery("#tab-box").css({ display: "block" });
    loadList(numPage);
    jQuery("p.boxTitle").text(title + "一覧");
  }
}

// --------------------------------------------------
// 画像関数
// --------------------------------------------------
// 画像切り替え
function changeFileImage(numPage) {
  var btn =
    numPage == SOSP
      ? "#ipPdf_sosp"
      : numPage == SOUP
      ? "#ipPdf_soup"
      : "#ipPdf";
  jQuery(btn).change(function () {
    var file = jQuery(btn)[0].files[0];
    if (typeof file == "undefined") {
      return false;
    }
    jQuery("#file_name").val(file.name);
    if (file == "") {
      jQuery(".error_inline0").html("画像ファイル名を入力してください。");
      jQuery(btn).focus();
      return false;
    }
    uploadImage(numPage);
  });
}

// 画像アップロード
function uploadImage(numPage) {
  var id = ["saag_id", jQuery("#old_saag_id").val()];
  var showImg = "#show_img";
  var pathFile = "#ipPdf";
  switch (numPage) {
    case SOSP:
      id = ["sosp_id", jQuery("#old_sosp_id").val()];
      pathFile = "#ipPdf_sosp";
      break;
    case SOUP:
      id = ["soup_id", jQuery("#old_soup_id").val()];
      pathFile = "#ipPdf_soup";
      break;
  }

  jQuery("#edit_img").val(1);
  jQuery(".error_inline0").html("");

  var formData = new FormData();
  formData.append("file", jQuery(pathFile)[0].files[0]);
  formData.append("action", "uploadImage");
  formData.append("curPdf", jQuery("#file_name").val());
  formData.append(id[0], id[1]);
  formData.append("numPage", numPage);
  jQuery.ajax({
    type: "POST",
    dataType: "json",
    url: ajaxObject.urlform,
    crossDomain: true,
    headers: {
      "Access-Control-Allow-Origin": "*",
    },
    data: formData,
    processData: false,
    contentType: false,
    success: function (data) {
      if (typeof data === "string") {
        alert(data);
      }

      if (data.success) {
        jQuery(showImg).html(data.photo);
        jQuery("#file_name").val(data.changeimg);
      }
    },
    error: function (xhr, textStatus, errorThrown) {
      jQuery(".error_inline0").html("サーバーへの接続に失敗しました。");
    },
  });
}

// 画像削除
function deleteImage(numPage) {
  jQuery('input[name="btnDel_img"]').click(function () {
    jQuery("#show_img").html(
      '<img src="/assets/images/uploads/profile/dummy.jpg" width = "160">'
    );
    jQuery("#del_img").val(0);
    jQuery("#file_name").removeAttr("value");
    jQuery("#edit_img").removeAttr("value");


  });
}

// 不要な画像削除
function deleteImageNotUse() {
  jQuery.ajax({
    type: "post",
    url: ajaxObject.urlform,
    crossDomain: true,
    headers: {
      "Access-Control-Allow-Origin": "*",
    },
    data: { action: "deleteImageNotUse" },
    error: function (xhr, textStatus, errorThrown) {
      console.log(errorThrown);
    },
  });
}

// --------------------------------------------------
// 共通関数
// --------------------------------------------------
// 文字制限
function bindInputCode(input) {
  jQuery("#" + input).on("blur", function () {
    var iVal = jQuery(this).val().trim();
    jQuery(this).val(iVal);
  });

  jQuery("#" + input).on("input", function () {
    jQuery(this).val(jQuery(this).val().replace("<", "＜"));
    jQuery(this).val(jQuery(this).val().replace(">", "＞"));
    jQuery(this).val(jQuery(this).val().replace('"', "”"));
    jQuery(this).val(jQuery(this).val().replace("#", "＃"));
    jQuery(this).val(jQuery(this).val().replace("@", "＠"));
    jQuery(this).val(jQuery(this).val().replace("!", "！"));
    jQuery(this).val(jQuery(this).val().replace("(", "（"));
    jQuery(this).val(jQuery(this).val().replace("*", "＊"));
    jQuery(this).val(jQuery(this).val().replace(")", "）"));
    jQuery(this).val(jQuery(this).val().replace("%", "％"));
  });
}

// 数値制限
function numericInput(input) {
  jQuery("#" + input).keydown(function (e) {
    // Allow: delete, backspace, tab, escape, enter, ., "\"
    if (
      jQuery.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
      // Allow: Ctrl+A, Command+A
      (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
      // Allow: home, end, left, right, down, up
      (e.keyCode >= 35 && e.keyCode <= 40)
    ) {
      return;
    }

    if (
      (e.shiftKey || e.keyCode < 48 || e.keyCode > 57) &&
      (e.keyCode < 96 || e.keyCode > 105)
    ) {
      e.preventDefault();
    }
  });
}

// 文字制限
function validText(value, type) {
  var arr;
  switch (type) {
    case "MAIL":
      arr = new Array("'", "~", "#", "$", "%", "^", "&", "*", ";", "|", ">");
      break;
    case "URL":
      arr = new Array("'", ";", "|", ">", "<");
      break;
    case "NORMAL":
      arr = new Array(
        "'",
        "~",
        "@",
        "#",
        "$",
        "%",
        "^",
        "&",
        "*",
        ";",
        "/",
        "\\",
        "|",
        ">",
        "."
      );
      break;
  }
  for (var j in value) {
    for (var i in arr) {
      value = value.replace(arr[i], "");
    }
  }
  return value;
}

// 不要なスペース（空白）削除
function trimCustom(s) {
  while (s.substring(0, 1) == " " || s.substring(0, 1) == "\n") {
    s = s.substring(1, s.length);
  }
  while (
    s.substring(s.length - 1, s.length) == " " ||
    s.substring(s.length - 1, s.length) == "\n"
  ) {
    s = s.substring(0, s.length - 1);
  }
  return s;
}

// E-Mailアドレス文字制限
function keydownEmail(email) {
  jQuery(email).keydown(function (ev) {
    ev = ev || window.event;
    kc = ev.keyCode || ev.which;
    if ((ev.ctrlKey || ev.metaKey) && kc) {
      if (kc == 99 || kc == 67 || kc == 88 || kc == 86) {
        return false;
      }
    }
  });
}

// チェックボックス配列の状態設定
function setCheckboxState(valueOff, inputNameOff, idShowOff) {
  var arrVal = valueOff;
  var j = 0;
  while (j < jQuery('input[name="' + inputNameOff + '"]').length) {
    jQuery('input[name="' + inputNameOff + '"]')
      .eq(j)
      .prop("checked", false);
    for (var i = 0; i < valueOff.length; i++) {
      if (
        jQuery('input[name="' + inputNameOff + '"]')
          .eq(j)
          .val() == valueOff[i]
      ) {
        jQuery('input[name="' + inputNameOff + '"]')
          .eq(j)
          .prop("checked", true);
        arrVal.splice(i, 1);
        break;
      }
    }
    j++;
  }
  if (idShowOff != "") {
    jQuery(idShowOff).val(arrVal.join());
  }
}

// AutoResize Textarea
function resizeTextarea() {
  jQuery("#comment")
    .each(function () {
      this.setAttribute(
        "style",
        "height:" + this.scrollHeight + "px;overflow-y:hidden;"
      );
    })
    .on("keyup", function () {
      this.style.height = "auto";
      this.style.height = this.scrollHeight + "px";
    });
}

// 希望掲載形式より、データ表示形式変更
function affectInfo(infotype) {
  // 簡易リスト形式
  if (infotype == 2) {
    jQuery("#essentials3").css("visibility", "hidden");
    jQuery("#essentials4").css("visibility", "hidden");
  }
  jQuery("#essentials3a").css("visibility", "hidden");
  jQuery("#essentials4a").css("visibility", "hidden");
  jQuery("#essentials10a").css("visibility", "hidden");
  jQuery("#essentials11a").css("visibility", "hidden");
  jQuery("#essentials12a").css("visibility", "hidden");
  jQuery("#essentials13a").css("visibility", "hidden");
}

function replaceAll(str, find, replace) {
  return str.replace(new RegExp(find, "g"), replace);
}

/* reset data when click upload img */
function resetUploadImg(event){
	const { target = {} } = event || {};
	target.value = "";
};
