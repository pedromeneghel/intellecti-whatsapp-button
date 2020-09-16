jQuery(document).ready(function () {
    /* default values start */
    var url = window.location.href;
    var defaults = {
        OnlineMsg: "Online",
        OfflineMsg: "Offilne",
        SendMsg: "Hi, I have some questions about this page: " + url + "",
        effectIn: "fadeInUp",
        effectOut: "fadeOutRight",
    };
    /* default values end */

    /* whatsapp goLink start */
    var goLink = "";
    jQuery(".wsc-item").click(function () {
        if (!jQuery(this).hasClass("disabled")) {
            var phone = jQuery(this).attr("data-number");
            var SendMsg =
                jQuery(this).attr("data-text") == null
                    ? defaults.SendMsg
                    : jQuery(this).attr("data-text");
            if (
                /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
                    navigator.userAgent
                )
            ) {
                goLink =
                    "https://api.whatsapp.com/send?phone=" +
                    phone +
                    "&text=" +
                    SendMsg;
            } else {
                goLink =
                    "https://web.whatsapp.com/send?phone=" +
                    phone +
                    "&text=" +
                    SendMsg;
            }
            window.open(goLink, "_blank").focus();
        }
    });

    jQuery("#send").click(function () {
        var phone = jQuery(this).parent().parent().parent().attr("data-number");
        var SendMsg = jQuery(this).parent().parent().find(":input").val();
        if (
            /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
                navigator.userAgent
            )
        ) {
            goLink =
                "https://api.whatsapp.com/send?phone=" +
                phone +
                "&text=" +
                SendMsg;
        } else {
            goLink =
                "https://web.whatsapp.com/send?phone=" +
                phone +
                "&text=" +
                SendMsg;
        }
        window.open(goLink, "_blank").focus();
    });
    /* whatsapp goLink end */

    /* Available times start */
    var today = moment().format("dddd");
    var now = moment();
    jQuery(".wsc-item").each(function () {
        var data_time = jQuery(this).attr("data-time");
        if (data_time != null) {
            data_json = JSON.parse(data_time);
            if (match_times(data_json) == true) {
                jQuery(this).find(".wsc-stat").text("Online");
            } else {
                jQuery(this)
                    .find(".wsc-stat")
                    .text(defaults.OfflineMsg)
                    .addClass("bg-warning");
                jQuery(this).addClass("disabled");
            }
        } else {
            jQuery(this)
                .find(".wsc-stat")
                .text(defaults.OfflineMsg)
                .addClass("bg-warning");
            jQuery(this).addClass("disabled");
        }
    });

    function match_times(data) {
        for (var i in data) {
            if (today == moment().day(i).format("dddd")) {
                var time_start = moment(
                        jQuery.trim(data[i].split("-")[0]),
                        "HH:mm"
                    ),
                    time_end = moment(
                        jQuery.trim(data[i].split("-")[1]),
                        "HH:mm"
                    );
                if (now.isAfter(time_start) && now.isBefore(time_end)) {
                    return true;
                }
            }
        }
    }
    /* Available times end */

    /* Whelp animations Start */
    jQuery(".wsc-circle").click(function (e) {
        e.preventDefault();
        var test = jQuery(this).next("#wsc-box");

        if (test.hasClass("show")) {
            testAnim(defaults.effectOut, "", test);
        } else {
            test.addClass("show");
            testAnim(defaults.effectIn, "goster", test);
        }
    });
    jQuery(".wsc-close").click(function () {
        var test = jQuery(this).parent("#wsc-box");
        testAnim(defaults.effectOut, "", test);
    });

    function testAnim(x, durum, temp) {
        jQuery(temp)
            .addClass(x + " animated")
            .one(
                "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",
                function () {
                    if (durum == "goster") {
                        jQuery(this).removeClass(x + " animated");
                    } else {
                        jQuery(this).removeClass(x + " animated show");
                    }
                }
            );
        if (temp.find(".wsc-chat").length && durum == "goster") {
            temp.find(".wsc-chat").find(":input").focus();
        }
    }
    /* Whelp animations End */
});
