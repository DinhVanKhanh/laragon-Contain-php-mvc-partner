jQuery(".fancybox").fancybox();
jQuery(".fancybox3").fancybox({ width: 850, height: 800 });
jQuery(".fancyboxIdPass").fancybox({ width: 700, height: 350 });
jQuery(".fancyboxBccMail").fancybox({ width: 700 });
jQuery(".btnConfirmDate").fancybox({
  width: 250,
  height: 400,
  afterShow: function () {
    jQuery(".fancybox-overlay").on("click", function (e) {
      if (e.target !== this) {
        return;
      }
      javascript: jQuery.fancybox.close();
    });
  },
});
jQuery(".btnConfirmDelUser").fancybox({
  modal: true,
  minHeight: 50,
  height: 120,
  width: 300,
  showCloseButton: true,
});

jQuery(".btnFancyDelClose").fancybox({
  modal: true,
  showCloseButton: true,
  closeBtn:
    '<a id = "btnCloseFc" class="btn btnClose closeLink" title="Close" href="javascript:;" onclick="fancyClose();">いいえ</a>',
  minHeight: 50,
  height: 120,
  width: 300,
  afterShow: function () {
    jQuery(".fancybox-skin").append(
      '<a title="Close" style="display:none;" class="fancybox-item fancybox-close" href="javascript:jQuery.fancybox.close();"></a>'
    );
  },
});
function fancyClose() {
  jQuery(".fancybox-close")[0].click();
}

// --------------------------------------------------
// 一覧　管理者専用
// --------------------------------------------------
// 一覧表示
function loadList(numPage) {
  //refresh position when F5

  jQuery("#HTMLEdit").html("");
  jQuery("#inputDialog").html("");
  jQuery("#tableContent").html("");
  jQuery("#scLoading").show();
  jQuery("p.boxTitle").hide();
  jQuery.ajax({
    type: "POST",
    dataType: "json",
    url: ajaxObject.urlform,
    data: {
      action: "loadList",
      numPage: numPage,
    },
    success: function (data) {
      var searchable =
        numPage == SAAG ? [0, 1, 5, 6, 7, 8, 9] : [0, 1, 5, 6, 7, 8];
      var page = numPage == SAAG ? "SAAG" : numPage == SOSP ? "SOSP" : "SOUP";
      if (data.success) {
        jQuery("#HTMLEdit").html(data.HTML);
        jQuery("#inputDialog").html(data.input);
        jQuery("#tableContent").html(data.listdata);

        var table = jQuery("#tblResult").DataTable({
          paging: false,
          aoColumnDefs: [
            { bSortable: false, aTargets: [1, 3] },
            { bSearchable: false, aTargets: searchable },
          ],
        });
        table.draw();
        jQuery("#scLoading").hide();
        jQuery("p.boxTitle").show();
        jQuery("p.boxTitle").text(page + "一覧");

        // ENTERキー
        jQuery("#tblResult_filter input").bind("keyup", function (e) {
          if (e.keyCode == 13) {
            table.search(this.value).draw();
          }
        });

        //「絞り込み」ボタン
        jQuery(".btnSearch").click(function () {
          if (jQuery("#tblResult_filter input").val() == "") {
            jQuery("#tblResult_filter input").focus();
          } else {
            jQuery("#tblResult_filter input").attr(
              "data-placeholdertext",
              function () {
                table.search(this.value).draw();
              }
            );
          }
        });

        //「解除」ボタン
        jQuery(".btnReset").click(function () {
          jQuery(this).prev().val("");
          table.search("").draw();
        });

        formLoad(numPage, "sbm");

        //「キャンセル」ボタン
        jQuery('input[name="submit_close"]').click(function () {
          fancyClose();
        });

        switch (numPage) {
          case SAAG:
            bindInputCode("member_name");

            //「登録」ボタン
            jQuery('input[name="submit_a"]').click(function () {
              if (submitClient(numPage, "sbm") != false) {
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
                  OfficeArea = jQuery(
                    'input[name="OfficeAreaAll"]:checked'
                  ).val();
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

                // データ設定
                var params = new Object();
                params.old_saag_id = jQuery("#old_saag_id").val();
                params.old_customer_code = jQuery("#old_customer_code").val();
                params.old_info_type = jQuery("#old_info_type").val();
                params.old_campaign1 = jQuery("#old_campaign").val();
                params.old_member_name = jQuery("#old_member_name").val();
                params.old_qualifications = jQuery("#old_qualifications").val();
                params.old_products = jQuery("#old_products").val();
                params.old_areas = jQuery("#old_areas").val();

                params.saag_id = jQuery("#Id").text();
                params.info_type = jQuery("#InfoType1").is(":checked")
                  ? "1"
                  : "2";
                params.campaign1 = jQuery("#campaign").is(":checked")
                  ? "1"
                  : "0";
                params.member_name = jQuery("#member_name").val();
                params.OfficeQua = OfficeQua;
                params.OfficeQuaOther = jQuery(
                  "#OfficeQualificationOther"
                ).val();
                params.OfficePro = OfficePro;
                params.OfficeProductOther = jQuery("#OfficeProductOther").val();
                params.OfficeArea = OfficeArea;
                params.old_pref_code = jQuery("#old_pref_code").val();

                generalConfirm(params);
                saveForm(SAAG, params);
              }
            });
            break;

          case SOSP:
            //「登録」ボタン
            jQuery('input[name="submit_a"]').click(function () {
              if (submitClient(numPage, "sbm") != false) {
                // データ設定
                var params = new Object();
                params.old_sosp_id = jQuery("#old_sosp_id").val();
                params.old_sbm_flag = jQuery("#old_sbm_flag").val();
                params.old_Email_open = jQuery("#old_Email_open").val();
                params.old_demospace = jQuery("#old_demospace").val();
                params.old_visit_guide = jQuery("#old_visit_guide").val();

                params.sosp_id = jQuery("#Id").text();
                params.sbm_flag = jQuery("#sbm_flag").is(":checked") ? 1 : 0;
                params.Email_open = jQuery("#Email_open").is(":checked")
                  ? 1
                  : 0;
                params.demospace = jQuery("#demospace1").is(":checked") ? 1 : 2;
                params.visit_guide = jQuery("#visit_guide1").is(":checked")
                  ? 1
                  : 2;

                generalConfirm(params);
                saveForm(SOSP, params);
              }
            });
            break;

          case SOUP:
            //「登録」ボタン
            jQuery('input[name="submit_a"]').click(function () {
              if (submitClient(numPage, "sbm") != false) {
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

                // データ設定
                var params = new Object();
                params.old_soup_id = jQuery("#old_soup_id").val();
                params.old_sbm_flag = jQuery("#old_sbm_flag").val();
                params.old_school_flag = jQuery("#old_school_flag").val();
                params.old_Email_open = jQuery("#old_Email_open").val();
                params.old_soi_products = jQuery("#old_products").val();
                params.old_areas = jQuery("#old_areas").val();

                params.soup_id = jQuery("#Id").text();
                params.sbm_flag = jQuery("#sbm_flag").is(":checked") ? 1 : 0;
                params.school_flag = jQuery("#school_flag").is(":checked")
                  ? 1
                  : 0;
                params.Email_open = jQuery("#Email_open").is(":checked")
                  ? 1
                  : 0;
                params.soi_products = products;
                params.areas = areas;

                generalConfirm(params);
                saveForm(SOUP, params);
              }
            });
            break;
        }
      }
    },
    error: function (xhr, textStatus, errorThrown) {
      jQuery(".error_inline0").html("サーバーへの接続に失敗しました。");
    },
  });
}
//Dinh Van Khanh
// step 1
checkID = () => {
  let message = "";
  let oldID = $("#oldID").text().replaceAll("-", "");
  let newID = $("#newID").val().replaceAll("-", "");
  let numPage = $("#subCheckIDStep1").val();

  //check input
  let error = (obj) => {
    $.each(obj, function (key, value) {
      message += value + "<br>";
      $("#notificate1").hide();
      $("#notificate-error").html(message);
    });
    return obj;
  };

  let partern = /^\s*$/;
  let patern1 = /^[a-zA-Z\-0-9]+$/;

  var err = {};
  if (!patern1.test(newID)) {
    err.newID = "「新しいパートナー会員ID 」 の形式が正しくありません";
  }

  // if (partern.test(newID)) {
  //     err.newID = '「新しいパートナー会員ID :」: 入力して下さい';
  // }
  // check error
  if ($.isEmptyObject(error(err)) !== true) {
    return;
  }

  jQuery.ajax({
    type: "POST",
    dataType: "json",
    url: ajaxObject.urlform,
    data: {
      action: "checkID",
      numPage: numPage,
      oldID: oldID,
      newID: newID,
    },
    beforeSend: function () {
      $("#scLoading").show();
    },
    success: function (data) {
      if (typeof data === "string") {
        alert(data);
      }
      if (data.error != "") {
        $("#notificate1").hide();
        $("#notificate-error").html(data.error);

        // jQuery.fancybox.close();
        // loadList(data.page);
      } else {
        //show and hide notification
        $("#notificate-error").html("");

        $(".showNewID").html(newID);
        $(".showNewID").show();
        $("#newID").hide();

        //insert - in newID
        var regrexNewID = /(\d{4})(\d{6})(\d{2})/g; // match the group
        var replaceNewID = data.data.user_cd.replace(regrexNewID, "$1-$2-$3"); //vd: 100000002107 => 1000-0000-2107
        $("#serialNewID")
          .html("[顧客コード]" + replaceNewID)
          .show();

        $("#notificate1").hide();
        $("#notificate2").show();
        $("#notificate3").hide();

        $("#subCheckIDStep1").hide();
        $("#subCheckIDStep2").show();
        $("#subCheckIDStep3").hide();

        //init step 1. if step1 successed => 2, step2 successed => 3
        $("#valSubCheckID").val(1);
        $("#valOldID").val(oldID);
        $("#valNewID").val(newID);
      }
    },
    complete: function () {
      $("#scLoading").hide();
    },
    error: function (xhr, textStatus, errorThrown) {
      jQuery(".error_inline0").html("サーバーへの接続に失敗しました。");
    },
  });
};

// step 2
updateDatabaseFromID = () => {
  //init check step 1
  if ($("#valSubCheckID").val() != 1) return;

  //use value hidden avoid being attacked
  let oldID = $("#valOldID").val();
  let newID = $("#valNewID").val();
  let numPage = $("#subCheckIDStep1").val();

  jQuery.ajax({
    type: "POST",
    dataType: "json",
    url: ajaxObject.urlform,
    data: {
      action: "updateDatabaseFromID",
      numPage: numPage,
      oldID: oldID,
      newID: newID,
    },

    success: function (data) {
      if (typeof data === "string") {
        alert(data);
      }
      if (data.error.length != 0) {
        $("#notificate1").show();
        $("#notificate1").html(data.error);
        // jQuery.fancybox.close();
        // loadList(data.page);
      } else {
        //update ID in Opendialog
        $("#Id").html(
          `<div><span>${newID}</span><button type='button' class="radius btnCheckID" onclick='dialogEditID("${newID}","${numPage}");' id='${newID}' value='${newID}'>パートナー会員IDを変更する　※要注意</button></div>`
        );

        //show and hide notification
        $("#notificate1").hide();
        $("#notificate2").hide();
        $("#notificate3").show();
        $("#subCheckIDStep1").hide();
        $("#subCheckIDStep2").hide();
        $("#subCheckIDStep3").show();

        //init step 3
        $("#valSubCheckID").val(3);

        //insert func reload data
        $('input[name="submit_close"], .fancybox-item.fancybox-close').attr(
          "onClick",
          `loadList(${numPage})`
        );

        // $('input[name="submit_close"], .fancybox-item.fancybox-close').click(
        //   function () {
        //     loadList(numPage);
        //   }
        // );
      }
    },

    error: function (xhr, textStatus, errorThrown) {
      jQuery(".error_inline0").html("サーバーへの接続に失敗しました。");
    },
  });
};

let timeout = (numPage) => {
  setTimeout(function () {
    loadList(numPage);
  }, 1000);
};

// step 3
reloadData = () => {
  let numPage = $("#subCheckIDStep1").val();

  if ($("#valSubCheckID").val() != 3) return;
  $("#dialogOpen").dialog("close");
};
dialogClose = () => {
  $("#dialogOpen").dialog("close");
};
//init dialog when click button
function dialogEditID(id, numPage) {
  //init check step 1 => 2 => 3
  $("#valSubCheckID").val(0);

  //show and hide notification
  $("#notificate-error").html("");
  $(".showNewID").hide();
  $("#newID").show();
  $("#serialNewID").html("").hide();

  $("#notificate1").show();
  $("#notificate2").hide();
  $("#notificate3").hide();

  $("#subCheckIDStep1").show();
  $("#subCheckIDStep2").hide();
  $("#subCheckIDStep3").hide();

  $("#dialogOpen").dialog({
    modal: true,
    width: 700,
    height: 400,
    modal: true,
    resizable: false,
    dialogClass: "no-close",
    // buttons: [
    //     {
    //         text: "OK",
    //         click: function () {
    //             $(this).dialog("close");
    //         }
    //     }
    // ]
  });

  //disable button close avoid error close because use fancybox and dialog jquery
  // $(".dialog-close").addClass('fancybox-close');

  $(".ui-dialog-titlebar").hide();
  $("#oldID").text(id);
  $("#newID").val("");
  $("#subCheckIDStep1").attr("value", numPage);
}
//Dinh Van Khanh

//「削除」ボタン
function deleteData(id, numPage) {
  var title =
    numPage == SAAG
      ? "SAAG会員 [ SAAG-ID : "
      : numPage == SOSP
      ? "SOSP会員 [ SOSP-ID : "
      : "SOUP会員 [ SOUP-ID : ";
  title = title + id + " ] の情報を削除しますか？";
  jQuery(".message").html(title);
  jQuery(".btnCenter").html(
    '<button name="btnDel_b" id="del_b" class="btnDel btnDel_a">はい</button>\
                              <a title="Close" id="btnCloseFc" class="btn btnClose closeLink" style="padding:5px !important">いいえ</a>'
  );

  // はい
  jQuery("#del_b").click(function () {
    jQuery.ajax({
      type: "POST",
      dataType: "json",
      url: ajaxObject.urlform,
      data: {
        action: "deleteData",
        numPage: numPage,
        id: id,
      },
      success: function (data) {
        if (typeof data === "string") {
          alert(data);
        }
        if (data.success) {
          jQuery.fancybox.close();
          loadList(data.page);
        }
      },
      error: function (xhr, textStatus, errorThrown) {
        jQuery(".error_inline0").html("サーバーへの接続に失敗しました。");
      },
    });
  });

  // いいえ
  jQuery("#btnCloseFc").click(function () {
    fancyClose();
  });
}

// --------------------------------------------------
// 管理者メニュー
// --------------------------------------------------
//「テキストー括ダウンロード」ボタン
function exportSaagToCSV() {}

//「画像⼀括ダウンロード」ボタン

//「掲載基準⽇を更新する」ボタン

// --------------------------------------------------
// メール送信先設定表示
// --------------------------------------------------
// 一覧表示
function loadMailBcc() {
  jQuery.ajax({
    type: "POST",
    dataType: "json",
    url: ajaxObject.urlform,
    data: { action: "loadMailBcc" },
    success: function (data) {
      if (data.success) {
        jQuery(".mailBcc").html(data.listmail);
        jQuery(".list_button button").removeClass("active");
        // jQuery('button[name="btnManagerMail"]').addClass('active');
        jQuery('button[name="btnManagerIdPass"]').addClass("active");
      }
    },
    error: function (xhr, textStatus, errorThrown) {
      jQuery(".error_inline13").html("サーバーへの接続に失敗しました。");
    },
  });
}

// メール送信先更新
function openDialogEditMailBcc(bccId) {
  jQuery("#FromMail").val("");
  jQuery(".error_inline1mail").html("");
  jQuery("#mail_admin").prop("checked", false);
  jQuery("#mail_saag").prop("checked", false);
  jQuery("#mail_sosp").prop("checked", false);
  jQuery("#mail_soup").prop("checked", false);

  jQuery.ajax({
    type: "POST",
    dataType: "json",
    url: ajaxObject.urlform,
    timeout: 5000,
    data: {
      action: "loadDialogEditMailBcc",
      bccId: bccId,
    },
    success: function (data) {
      if (data.success) {
        jQuery("#mail_id").val(data.id);
        jQuery("#old_bcc").val(data.Bcc);
        jQuery("#Bcc").val(data.Bcc);
        jQuery("#FromMail").val(data.FromEmail);
        jQuery("#FromName").val(data.FromName);
        jQuery("#Host").val(data.Host);
        jQuery("#Port").val(data.Port);

        var page =
          data.pro_id == SAAG
            ? "saag"
            : data.pro_id == SOSP
            ? "sosp"
            : data.pro_id == SOUP
            ? "soup"
            : "admin";
        jQuery("#mail_" + page).prop("checked", true);

        // ユーザー名
        if (data.Username != "") {
          jQuery("#Username").val(data.Username);
          jQuery("#Password").val(data.Password);
          jQuery("#checkSmtp").prop("checked", true);
          jQuery("#Username").removeAttr("disabled").removeClass("disable");
          jQuery("#Password").removeAttr("disabled").removeClass("disable");
        } else {
          jQuery("#checkSmtp").prop("checked", false);
          jQuery("#Username")
            .attr({ disabled: "true" })
            .addClass("disable")
            .val("");
          jQuery("#Password")
            .attr({ disabled: "true" })
            .addClass("disable")
            .val("");
        }

        // 暗号化方式
        var encrypt = data.EncriptionType;
        var tagEncrypt = encrypt == 1 ? "SSL" : encrypt == 2 ? "TLS" : "None";
        jQuery("#ra" + tagEncrypt).prop("checked", true);
      }
    },
    error: function (xhr, textStatus, errorThrown) {
      jQuery(".error_inline1mail").html("サーバーへの接続に失敗しました。");
    },
  });
}

//「テスト用の送信」ボタン
jQuery('input[name="btnTestMail"]').click(function () {
  var params = new Object();
  params.FromMail = jQuery("#FromMail").val();
  params.FromName = jQuery("#FromName").val();
  params.MailTest = jQuery("#MailTest").val();
  params.EncriptionType = jQuery(
    "input[type='radio'][name='EncriptionType']:checked"
  ).val();
  params.Host = jQuery("#Host").val().trim();
  params.Port = jQuery("#Port").val();
  params.Username = jQuery("#Username").val().trim();
  params.Password = jQuery("#Password").val().trim();
  params.isEditMail = jQuery("#isEditMail").val();
  params.EmailId = jQuery("#EmailId").val();
  params.checkSmtp = jQuery("#checkSmtp").val();
  testSendMail(params);
});

//「テスト用の送信」ボタン処理
function testSendMail(params) {
  jQuery(".error_inline0").html("");
  jQuery("#scLoading").show();

  jQuery.ajax({
    type: "POST",
    dataType: "text",
    url: ajaxObject.urlform,
    timeout: 5000,
    data: {
      action: "testSendMail",
      IDEmail: jQuery("#mail_id").val(),
      FromMail: params.FromMail,
      FromName: params.FromName,
      MailTest: params.MailTest,
      EncriptionType: params.EncriptionType,
      Host: params.Host,
      Port: params.Port,
      Username: params.Username,
      Password: params.Password,
    },
    success: function (data) {
      if (data != "") {
        jQuery(".error_inline0").html(
          "テストメールの送信に失敗しました。" +
            "<br/>エラー内容：" +
            data.errMsg
        );
      } else {
        jQuery(".error_inline0").html("テストメールの送信に成功しました。");
      }
      jQuery("#scLoading").hide();
    },
    error: function (xhr, textStatus, errorThrown) {
      jQuery(".error_inline0").html(xhr.responseText);
      jQuery("#scLoading").hide();
    },
  });
}

//「登録」ボタン
jQuery('input[name="btnEditApp"]').click(function () {
  var FromMail = document.getElementById("FromMail");
  var Username = document.getElementById("Username");
  jQuery(".error_inline1mail").html("");
  var filter =
    /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  // 差出人
  if (jQuery("#FromMail").val() == "") {
    jQuery(".error_inline1mail").html(
      "差出人(from)のメールアドレスを入力してください。"
    );
    jQuery("#FromMail").focus();
    return false;
  }
  // 差出名
  else if (jQuery("#FromName").val() == "") {
    jQuery(".error_inline1mail").html("差出名(from)の名前を入力してください。");
    jQuery("#FromName").focus();
    return false;
  }
  // SMTPサーバー
  else if (jQuery("#Host").val() == "") {
    jQuery(".error_inline1mail").html("SMTPサーバーを入力してください。");
    jQuery("#Host").focus();
    return false;
  }
  // TLS
  else if (jQuery("#raTLS").is(":checked") && jQuery("#Port").val() == "") {
    jQuery(".error_inline1mail").html("SMTPポートを指定してください。");
    jQuery("#Port").focus();
    return false;
  }
  // SSL
  else if (jQuery("#raSSL").is(":checked") && jQuery("#Port").val() == "") {
    jQuery(".error_inline1mail").html("SMTPポートを指定してください。");
    jQuery("#Port").focus();
    return false;
  }
  // メールアドレス形式
  else if (jQuery("#FromMail").val() && !filter.test(FromMail.value)) {
    jQuery(".error_inline1mail").html(
      "差出人のメールアドレスをご入力ください。\nexample@gmail.com"
    );
    jQuery("#FromMail").focus();
    return false;
  }
  // SMTPサーバーの最大桁数
  else if (jQuery("#Host").val().length > 30) {
    jQuery(".error_inline1mail").html(
      "SMTPサーバーを30文字以内で入力してください。"
    );
    jQuery("#Host").focus();
    return false;
  }
  // 差出名の最大桁数
  else if (jQuery("#FromName").val().length > 100) {
    jQuery(".error_inline1mail").html(
      "差出名を100文字以内で入力してください。"
    );
    jQuery("#FromName").focus();
    return false;
  }
  // SMTPを有効にします
  else if (jQuery("#checkSmtp").prop("checked", true)) {
    // SMTPユーザ名
    if (jQuery("#Username").val() == "") {
      jQuery(".error_inline1mail").html(
        "SMTPユーザーのメールアドレスを入力してください。"
      );
      jQuery("#Username").focus();
      return false;
    }
    // SMTPユーザ名のメールアドレス形式
    // else if (jQuery('#Username').val() && !filter.test(Username.value)) {
    //     jQuery('.error_inline1mail').html('SMTPユーザを入力してください。\nexample@gmail.com');
    //     jQuery('#Username').focus();
    //     return false;
    // }
    // SMTPユーザ名の最大桁数
    else if (jQuery("#Username").val().length > 100) {
      jQuery(".error_inline1mail").html(
        "SMTPユーザ名を100文字以内で入力してください。"
      );
      jQuery("#Username").focus();
      return false;
    }
    // SMTPパスワード
    else if (jQuery("#Password").val() == "") {
      jQuery(".error_inline1mail").html("SMTPパスワードを入力してください。");
      jQuery("#Password").focus();
      return false;
    }
    // SMTPパスワードの最大桁数
    else if (jQuery("#Password").val().length > 24) {
      jQuery(".error_inline1mail").html(
        "SMTPパスワードを24文字以内で入力してください。"
      );
      jQuery("#Password").focus();
      return false;
    }
  }

  // データ設定
  var params = new Object();
  params.id = jQuery("#mail_id").val();
  params.old_bcc = jQuery("#old_bcc").val();
  params.FromMail = jQuery("#FromMail").val();
  params.pro_id = jQuery("input[type='radio'][name='pro_id']:checked").val();
  params.FromName = jQuery("#FromName").val();
  params.Bcc = jQuery("#Bcc").val();
  params.EncriptionType = jQuery(
    "input[type='radio'][name='EncriptionType']:checked"
  ).val();
  params.Host = jQuery("#Host").val().trim();
  params.Port = jQuery("#Port").val();
  params.Username = jQuery("#Username").val().trim();
  params.Password = jQuery("#Password").val().trim();
  addEmail(params);
});

//「登録」ボタン処理
function addEmail(params) {
  jQuery(".error_inline1").html("");
  jQuery.ajax({
    type: "POST",
    dataType: "json",
    url: ajaxObject.urlform,
    data: {
      action: "addEmail",
      id: params.id,
      old_bcc: params.old_bcc,
      FromMail: params.FromMail,
      pro_id: params.pro_id,
      FromName: params.FromName,
      Bcc: params.Bcc,
      EncriptionType: params.EncriptionType,
      Host: params.Host,
      Port: params.Port,
      Username: params.Username,
      Password: params.Password,
      EmailId: params.EmailId,
    },
    success: function (data) {
      if (data.success) {
        jQuery.fancybox.close();
        loadMailBcc();
      } else {
        jQuery("#" + data.tagFocus).focus();
        jQuery(".error_inline1").html(data.error);
      }
    },
    error: function (xhr, textStatus, errorThrown) {
      jQuery(".error_inline1").html("サーバーへの接続に失敗しました。");
    },
  });
}

// 暗号化方式
jQuery("input[type=radio][name=EncriptionType]").change(function () {
  // なし
  if (this.value == "0") {
    jQuery("#Port").prop("disabled", true);
    jQuery("#Port").val("");
    jQuery(".showport").css("visibility", "hidden");
    jQuery("#checkSmtp").prop("checked", false);
  }
  // SSL、TLS
  else {
    jQuery("#Port").prop("disabled", false);
    jQuery(".showport").css("visibility", "visible");
    jQuery("#checkSmtp").prop("checked", true);

    if (this.value == "1") {
      jQuery("#Port").val("465");
    } else if (this.value == "2") {
      jQuery("#Port").val("587");
    }
  }
});

// SMTPを有効にします
jQuery("#checkSmtp").change(function () {
  if (jQuery(this).is(":checked")) {
    jQuery("#Username").removeAttr("disabled").removeClass("disable");
    jQuery("#Password").removeAttr("disabled").removeClass("disable");
  } else {
    jQuery("#Username").attr({ disabled: "true" }).addClass("disable").val("");
    jQuery("#Password").attr({ disabled: "true" }).addClass("disable").val("");
  }
});

// --------------------------------------------------
// 管理者ID/PW管理
// --------------------------------------------------
// 一覧表示
function loadGridIdPass() {
  jQuery.ajax({
    type: "POST",
    dataType: "json",
    url: ajaxObject.urlform,
    timeout: 5000,
    data: { action: "loadGridIdPass" },
    success: function (data) {
      if (data.success) {
        jQuery(".idPass").html(data.grid);
        jQuery(".list_button button").removeClass("active");
        jQuery('button[name="btnManagerIdPass"]').addClass("active");
      }
    },
    error: function (xhr, textStatus, errorThrown) {
      jQuery(".error_idpass").html("サーバーへの接続に失敗しました。");
    },
  });
}

//「追加」ボタン
function openDialogAddIdPass() {
  jQuery("#userid").val("");
  jQuery("#fullname").val("");
  jQuery("#pwd1").val("");
  jQuery("#pwd2").val("");
  jQuery(".error_idpass").html("");

  jQuery("#scLoading").css("display", "none");
  jQuery(".show_pc").css("display", "inline-block");
  jQuery(".show_pc0").css("display", "inline-block");
  jQuery(".show_pc1").css("display", "inline-block");
  jQuery("#admin").prop("checked", true);

  jQuery("#userid").attr("readonly", false).val("");
  jQuery("#username").css("color", "#000");
  jQuery("#username").css(
    "background",
    "rgba(0, 0, 0, 0) -moz-linear-gradient(center top, #fff 30%, #efefef 70%) repeat scroll 0 0"
  );
  jQuery("#isEditUser").val(0);
}

//「修正」ボタン
function openDialogEditIdPass(UserId, isEdit) {
  jQuery("#userid").val("");
  jQuery("#fullname").val("");
  jQuery("#pwd1").val("");
  jQuery("#pwd2").val("");
  jQuery(".error_idpass").html("");

  jQuery(".show_pc").css("display", "inline-block");
  jQuery(".show_pc0").css("display", "inline-block");
  jQuery(".show_pc1").css("display", "inline-block");
  jQuery("#admin").prop("checked", true);

  // 更新
  if (isEdit == true || isEdit == "true") {
    jQuery.ajax({
      type: "POST",
      dataType: "json",
      url: ajaxObject.urlform,
      timeout: 5000,
      data: {
        action: "loadEditIdPass",
        userId: UserId,
      },
      success: function (data) {
        if (data.success) {
          jQuery("#userid").val(data.userid);
          jQuery("#fullname").val(data.fullname);

          jQuery("input[type='radio'][name='pro_id']").prop("checked", false);
          var pro_id =
            data.pro_id == 0
              ? "#admin"
              : data.pro_id == SAAG
              ? "#saag"
              : data.pro_id == SOSP
              ? "#sosp"
              : "#soup";
          jQuery(pro_id).prop("checked", true);
        }
      },
      error: function (xhr, textStatus, errorThrown) {
        jQuery("#userid").val("");
        jQuery("#fullname").val("");
        jQuery("#pwd1").val("");
        jQuery("#pwd2").val("");
        jQuery(".error_idpass").html("サーバーへの接続に失敗しました。");
      },
    });

    jQuery("#userid").attr("readonly", true);
    jQuery("#username").css("color", "#676767");
    jQuery("#username").css("background", "#F2F2F2");
    jQuery(".show_pc").css("display", "none");
    jQuery(".show_pc1").css("display", "none");

    // パスワード
    jQuery("#pwd1").bind("blur change", function (e) {
      jQuery(".show_pc1").css("display", "inline-block");
      jQuery("#pwd1").val();
    });
    // パスワード確認
    jQuery("#pwd2").bind("blur change", function (e) {
      jQuery(".show_pc1").css("display", "inline-block");
      jQuery("#pwd2").val();
    });

    jQuery("#isEditUser").val("1");
    jQuery("#change").val("1");
    jQuery("#userId").val(UserId);
  }
  // 追加
  else {
    jQuery("#userid").attr("readonly", false);
    jQuery("#username").css("color", "#000");
    jQuery("#username").css(
      "background",
      "rgba(0, 0, 0, 0) -moz-linear-gradient(center top, #fff 30%, #efefef 70%) repeat scroll 0 0"
    );

    jQuery(".show_pc").css("display", "inline-block");
    jQuery(".show_pc0").css("display", "inline-block");
    jQuery(".show_pc1").css("display", "inline-block");

    jQuery("#isEditUser").val("0");
    jQuery("#change").val("0");
    jQuery("#userId").val("");
  }
}

//「削除」ボタン処理
function deleteUserInfo(id) {
  jQuery.ajax({
    type: "POST",
    dataType: "json",
    url: ajaxObject.urlform,
    timeout: 5000,
    data: {
      action: "deleteUser",
      userId: id,
    },
    success: function (data) {
      if (data != true) {
        alert(data);
      } else {
        jQuery.fancybox.close();
        loadGridIdPass();
      }
    },
    error: function (xhr, textStatus, errorThrown) {
      jQuery(".error_inline13").html("サーバーへの接続に失敗しました。");
    },
  });
}

//「削除」ボタン
function deleteUser(id) {
  jQuery(".message").html("ユーザーを削除してよろしいでしょうか");
  jQuery(".btnCenter").html(
    '<button name="btnDel" id="deleteUser" class="btnDel btnDel_a" onclick="deleteUserInfo(' +
      id +
      ')">はい</button>\
            <a title="Close" id="btnCloseFc" class="btn btnClose" onclick="jQuery.fancybox.close();" style="padding:5px !important">いいえ</a>'
  );
}

//「登録」ボタン
jQuery('input[name="btnSubmitUser"]').click(function () {
  var mode = jQuery("#isEditUser").val();
  var change = jQuery("#change").val();

  // ユーザーID
  if (jQuery("#userid").val() == "") {
    jQuery(".error_idpass").html("ユーザーIDを入力してください。");
    jQuery("#userid").focus();
    return false;
  }

  // ユーザー名
  if (jQuery("#fullname").val() == "") {
    jQuery(".error_idpass").html("ユーザー名を入力してください。");
    jQuery("#fullname").focus();
    return false;
  }

  // パスワード
  if (mode == 0 && jQuery("#pwd1").val() == "") {
    jQuery(".error_idpass").html("パスワードを入力してください。");
    jQuery("#pwd1").focus();
    return false;
  }

  // 追加・更新チェック
  if (mode == 0 || (mode == 1 && change == 1)) {
    // パスワード
    if (jQuery("#pwd2").val().length > 0 && jQuery("#pwd1").val() == "") {
      jQuery(".error_idpass").html("パスワードを入力してください。");
      jQuery("#pwd1").focus();
      return false;
    }

    // パスワード確認
    if (jQuery("#pwd1").val().length > 0 && jQuery("#pwd2").val() == "") {
      jQuery(".error_idpass").html("パスワード確認を入力してください。");
      jQuery("#pwd2").focus();
      return false;
    }

    // ユーザーIDの最大桁数
    if (jQuery("#userid").val().length > 50) {
      jQuery(".error_idpass").html(
        "ユーザーIDを50文字以内で入力してください。"
      );
      jQuery("#userid").focus();
      return false;
    }

    // ユーザー名の最大桁数
    if (jQuery("#fullname").val().length > 50) {
      jQuery(".error_idpass").html(
        "ユーザー名を50文字以内で入力してください。"
      );
      jQuery("#fullname").focus();
      return false;
    }

    // パスワードの最大桁数
    if (jQuery("#pwd1").val().length > 50) {
      if (mode == 0 || change == 1) {
        jQuery(".error_idpass").html(
          "パスワードを50文字以内で入力してください。"
        );
        jQuery("#pwd1").focus();
        return false;
      }
    }

    // パスワード確認の最大桁数
    if (jQuery("#pwd2").val().length > 50) {
      jQuery(".error_idpass").html(
        "パスワード確認を50文字以内で入力してください。"
      );
      jQuery("#pwd2").focus();
      return false;
    }

    // パスワード一致
    if (
      jQuery("#pwd1").val().length > 0 &&
      jQuery("#pwd1").val() != jQuery("#pwd2").val()
    ) {
      jQuery(".error_idpass").html(
        "パスワード又はパスワード確認欄に誤りがあります。"
      );
      jQuery("#pwd1").focus();
      return false;
    }
  }

  // データ設定
  var params = new Object();
  params.UserId = jQuery("#userid").val();
  params.fullname = jQuery("#fullname").val();
  params.Password = jQuery("#pwd1").val();
  params.Password2 = jQuery("#pwd2").val();
  params.pro_id = jQuery("input[name='pro_id']:checked").val();
  params.isEditUser = jQuery("#isEditUser").val();
  saveUser(params);
});

//「登録」ボタン処理
function saveUser(params) {
  var oldPw1 = jQuery("#hidePw1").val();
  var newPw1 = params.Password;
  var isPwChange = params.isEditUser == 0 || params.Password.length > 0 ? 1 : 0;

  jQuery.ajax({
    type: "POST",
    dataType: "json",
    url: ajaxObject.urlform,
    timeout: 5000,
    data: {
      action: "saveUser",
      id: params.id,
      userid: params.UserId,
      fullname: params.fullname,
      Password: params.Password,
      Password2: params.Password2,
      pro_id: params.pro_id,
      isEditUser: params.isEditUser,
      isPwChange: isPwChange,
    },
    success: function (data) {
      if (data == true) {
        jQuery.fancybox.close();
        loadGridIdPass();
      } else {
        jQuery(".error_idpass").html(data);
      }
    },
    error: function (xhr, textStatus, errorThrown) {
      jQuery(".error_idpass").html("サーバーへの接続に失敗しました。");
    },
  });
}

// ユーザーID
jQuery("#userid").keydown(function (e) {
  if (
    jQuery.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190, 173, 109]) !== -1 ||
    (e.keyCode == 65 && e.ctrlKey === true) ||
    (e.keyCode >= 35 && e.keyCode <= 39) ||
    (e.keyCode >= 96 && e.keyCode <= 105) ||
    (e.keyCode >= 48 && e.keyCode <= 57) ||
    (e.keyCode >= 65 && e.keyCode <= 90)
  ) {
  } else {
    jQuery("#userid").val() == "";
  }
});

// 取込処理
function detailImport(listID, Page) {
  var numPage = Page == "SAAG" ? SAAG : Page == "SOSP" ? SOSP : SOUP;
  var data = "以下の " + Page + "_ID の会員情報が削除されています。<br>";

  for (i = 0; i < listID.length; i++) {
    data += Page + "_ID: " + listID[i] + "<br>";
  }
  data += "この会員の" + Page + "検索情報を削除しますか？<br>";
  data +=
    '<div><button id="delListID">削除する</button>&emsp;&emsp;<button onclick="closeDetailListID()">削除しない</button></div>';
  jQuery(".boxCenter").html(data);

  jQuery("#delListID").click(function () {
    jQuery("section.detailListID").css("display", "none");
    jQuery.ajax({
      type: "POST",
      dataType: "text",
      url: ajaxObject.urlform,
      data: {
        action: "deleteNotMember",
        listID: listID,
        numPage: numPage,
      },
      success: function (data) {
        console.log(data);
      },
      error: function (xhr, textStatus, errorThrown) {
        console.log(errorThrown);
      },
    });
  });
}

function closeDetailListID() {
  jQuery("section.detailListID").css("display", "none");
}

// 取込機能
function importDataCSV(Page) {
  jQuery(".list_button").removeClass("active");
  jQuery("section.detailListID").css("display", "block");
  jQuery(".boxCenter").html(
    Page + 'の取り込みを開始します。<br><button id="startImport">OK</button>'
  );

  jQuery("#startImport").click(function () {
    jQuery("section.detailListID").css("display", "none");
    var ipCSV = jQuery("#ip" + Page + "CSV");
    var numPage = Page == "SAAG" ? SAAG : Page == "SOSP" ? SOSP : SOUP;
    jQuery("#scLoading").show();
    var formData = new FormData();
    formData.append("numPage", numPage);
    formData.append("file", ipCSV[0].files[0]);
    formData.append("action", "importDataCSV");
    jQuery.ajax({
      type: "POST",
      dataType: "json",
      url: ajaxObject.urlform,
      data: formData,
      processData: false,
      contentType: false,
      success: function (data) {
        jQuery("#scLoading").hide();
        if (data.success) {
          var html = data.numAffect + "件のデータの登録が完了しました。<br>";
          if (data.listID == "") {
            html += '<button onclick="closeDetailListID()">OK</button>';
          } else {
            html +=
              '<button id="detailImport">' +
              Page +
              "検索情報を確認する</button>";
          }
          jQuery(".boxCenter").html(html);
          jQuery("#detailImport").click(function () {
            detailImport(data.listID, Page);
          });
        } else {
          jQuery(".boxCenter").html(
            '取込エラーが発生しました。<br>データを確認してください。<br><button onclick="closeDetailListID()">閉じる</button></div>'
          );
        }
        jQuery("section.detailListID").toggle();
      },
      error: function (xhr, textStatus, errorThrown) {
        jQuery("#scLoading").hide();
        jQuery(".error_inline0").html("サーバーへの接続に失敗しました。");
      },
    });
  });
}

jQuery(document).ready(function () {
  openTab(jQuery("#activetab").val());

  // タブ保存
  if (jQuery("#pageload").val() == "admin") {
    jQuery("#tabs").delegate("li", "click", function () {
      var tab = jQuery(this).attr("id");
      openTab(tab);
      jQuery("#activetab").val(tab);
      jQuery("#cookie_page").val(tab);
      document.cookie = "tabActive=" + tab;
    });
  }

  // タブ押下
  jQuery(".tab li").click(function () {
    jQuery(".tab li").removeClass("active");
    jQuery(this).addClass("active");
    jQuery(".area").css({ display: "none" });
    jQuery("#" + jQuery(this).attr("id") + "-box").css({ display: "block" });
  });
});
