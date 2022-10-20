jQuery(document).ready(function ($) {
    //$('#sidebar').css('height', $('.containers').height());
    $("#sidebar").css("min-height", $(".containers").height());

    //SCROLL TO TOPPAGE
    $("#btn_top_page").click(function (event) {
        $("html,body").animate({ scrollTop: 0 }, 1400);
        return false;
    });

    window.onscroll = function () {
        scrollFunction();
    };
    function scrollFunction() {
        if (
            document.body.scrollTop > 1000 ||
            document.documentElement.scrollTop > 1000
        ) {
            $("#btn_top_page").show();
        } else {
            $("#btn_top_page").hide();
        }
    }

    //Button SBM[Sorimachi Brand Master]のご案内 and ご入金・お申し込み
    $("#btn-last-page").click(function () {
        //SAAG

        part = $("#btn-last-page a").attr("href");
        position = $(part).offset().top;
        $("html,body").animate({ scrollTop: position }, 1400);
        return false;
    });
    $("#btn-last-page1").click(function () {
        //SOSP AND SOUP
        part = $("#btn-last-page1 a").attr("href");
        position = $(part).offset().top;
        $("html,body").animate({ scrollTop: position }, 1400);
        return false;
    });

    $("#btn-last-page2").click(function () {
        //SOSP AND SOUP
        part = $("#btn-last-page2 a").attr("href");
        position = $(part).offset().top;
        $("html,body").animate({ scrollTop: position }, 1400);
        return false;
    });

    //Active menu
    $(".menu").each(function () {
        if (this.href == window.location.href) {
            $(this).addClass("active");
        }
    });

    var menubar = document.getElementById("btn-menu");
    var nav = document.getElementById("myTopnav");
    if (menubar) {
        menubar.addEventListener("click", function () {
            this.classList.toggle("change");
            nav.classList.toggle("responsive");
        });
    }

    var menu = document.getElementById("myTopnav");
    window.addEventListener("resize", function () {
        var w = window.width;
        if (w >= 801 && menu.style.visibility === "hidden") {
            menu.removeAttribute("style");
        }
    });
});
