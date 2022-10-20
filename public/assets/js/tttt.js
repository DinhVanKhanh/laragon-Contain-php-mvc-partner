function OpenWinForm(url) {
    window.open(url,'info','scrollbars=yes,resizable=yes,toolbar=no,location=no,status=no,menubar=no,width=900,height=800');
}

function PageJump(formName) {
    document.forms[formName].submit();
}

function OpenWinInfo(url) {
    var win = window.open(url,'info','scrollbars=yes,resizable=yes,toolbar=no,location=no,status=no,menubar=no,width=600,height=720');
}

function ClearEx(obj) {
    if (obj.value == obj.defaultValue) {
        obj.value = "";
        obj.style.color = "#000000";
    }
}

function ShowEx(obj) {
    if (obj.value == "") {
        obj.value = obj.defaultValue;
        obj.style.color = "#B0B0B0";
    }
}

function CheckBCSeminarKwSearch() {
    var flag = 0;
    var x = document.BCSeminarKwSearch.searchword.value;

    if (x == "" || x == "【例】　経理　大阪府") {
        flag = 1;
    }
    else if (x.match("　")) {
        flag = 2;
    }

    switch (flag) {
        case 1:
            window.alert('検索するキーワードが入力されていません。');
            return false;
        case 2:
            window.alert('文字列にスペースが含まれている場合には、\n検索結果が正しく表示されません。\nお手数ですが再度１単語だけを入力して\n検索を実行してみてください。');
            return false;
    }
    return true;
}
