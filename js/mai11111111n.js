function getQueryStringByName(t) {
    var e = location.search.match(new RegExp("[?&]" + t + "=([^&]+)", "i"));
    return null == e || e.length < 1 ? "": e[1]
}
function getTKValueByName(t) {
    var e = getQueryStringByName("tk");
    try {
        e = BASE64.decoder(e);
        for (var

        i = "",
        r = 0,
        c = e.length; r < c; ++r) i += String.fromCharCode(e[r]);
        e = i
    } catch(t) {
        e = ""
    }
    var p = e.match(new RegExp("[?&]" + t + "=([^&]+)", "i"));
    return null == p || p.length < 1 ? "": p[1]
}
function setCookie(t, e, i) {
    i || (i = 30);
    var r = new Date;
    r.setTime(r.getTime

    () + 24 * i * 60 * 60 * 1e3),
    document.cookie = t + "=" + escape(e) + ";path=/;expires=" + r.toGMTString()
}
function getCookie(t) {
    var e, i = new RegExp("(^| )" + t + "=([^;]*)(;|$)");
    return (e = document.cookie.match(i)) ? e[2] : null
}
function delCookie(t) {
    var e = new

    Date;
    e.setTime(e.getTime() - 1);
    var i = getCookie(t);
    null != i && (document.cookie = t + "=" + i + ";expires=" + e.toGMTString())
}
function generateUid() {
    var t = (10 * Math.random()).toString().replace(".", "") + (new Date).getMilliseconds();
    return "u" + t
}
function

initUserInfo() {
    var t = getTKValueByName("cl");
    t && null != t || (t = getQueryStringByName("channel")),
    t && setCookie("channel", t);
    var e = getTKValueByName("price");
    e && null != e || (e = getQueryStringByName("productId")),
    e && setCookie

    ("productId", e),
    getCookie("uid") || setCookie("uid", generateUid())
}
function getChannel() {
    var t = getCookie("channel");
    return t && null != t || (t = 0),
    t
}
function getProductId() {
    return getCookie("productId")
}
function getUid() {
    var t = getCookie

    ("uid");
    return t || (t = generateUid(), setCookie("uid", t)),
    t
}
function setVIP() {
    var t = getCookie("vip") || 0;
    t++,
    setCookie("vip", t),
    setCookie("viptime", (new Date).getTime())
}
function getVIP() {
    return getCookie("vip") || 0
}
function getVIPTime() {
    var

    t = parseInt(getCookie("viptime"));
    if (isNaN(t)) return "N/A";
    var e = new Date;
    return e.setTime(t),
    e.format("yyyy/MM/dd")
}
function setSVIP() {
    var t = getCookie("svip") || 0;
    t++,
    setCookie("svip", t),
    setCookie("sviptime", (new Date).getTime())
}
function

getSVIP() {
    return getCookie("svip") || 0
}
function getSVIPTime() {
    var t = parseInt(getCookie("sviptime"));
    if (isNaN(t)) return "N/A";
    var e = new Date;
    return e.setTime(t),
    e.format("yyyy/MM/dd")
}
function setHVIP() {
    var t = getCookie("hvip") || 0;
    t +

    +,
    setCookie("hvip", t),
    setCookie("hviptime", (new Date).getTime())
}
function getHVIP() {
    return getCookie("hvip") || 0
}
function getHVIPTime() {
    var t = parseInt(getCookie("hviptime"));
    if (isNaN(t)) return "N/A";
    var e = new Date;
    return e.setTime

    (t),
    e.format("yyyy/MM/dd")
}
function hideVipalert() {
    $("#vipalert").hide(),
    location.href = "daog.html"
}
function viptoken() {
    var t = getQueryStringByName("token"),
    e = getQueryStringByName("type");
    if (t && e && t == getUid() && !(1 == e && getVIP() > 0 ||

    2 == e && getSVIP() > 0 || 3 == e && getHVIP() > 0)) if (1 == e) {
        var i = "��ϲ����ΪVIP��Ա",
        r = "<div>�������ѻ�ã�<ul><li>������ѡ����Ůֱ����Ƶ��Ů��д��</li></ul><p><small>����վ���ݽ������ͣ����漰�Ƿ����ݣ����½�</small></p></div>";
        $("#vipalert .weui-

dialog__title").text(i),
        $("#vipalert .weui-dialog__bd").html(r),
        $("#vipalert").show(),
        setVIP()
    } else if (2 == e) {
        var i = "��ϲ����ΪSVIP��Ա",
        r = "<div>�������ѻ�ã�<ul><li>������ѡ����Ůֱ����Ƶ��Ů��д��</li></ul><p><small>����վ���ݽ�������

�����漰�Ƿ����ݣ����½�</small></p></div>";
        $("#vipalert .weui-dialog__title").text(i),
        $("#vipalert .weui-dialog__bd").html(r),
        $("#vipalert").show(),
        setSVIP()
    } else if (3 == e) {
        var i = "��ϲ����Ϊ�ƽ�VIP��Ա",
        r = "<div>�������ѻ�ã�<ul><li>�ƽ�

VIPȨ��</li></ul><p><small>����վ���ݽ������ͣ����漰�Ƿ����ݣ����½�</small></p></div>";
        $("#vipalert .weui-dialog__title").text(i),
        $("#vipalert .weui-dialog__bd").html(r),
        $("#vipalert").show(),
        setHVIP()
    }
}
function initPlayPage() {
    function

    t() {
        var t = 0;
        $("#player").on("timeupdate",
        function(e) {
            var i = this.currentTime;
            if (Math.abs(i - t) > 2) {
                this.pause();
                var r = confirm("����Ϊ�ƽ��Ա�����ɿ��ٲ���");
                1 == r && (location.href = "cz.html")
            }
            t = i
        })
    }
    function e() {
        var t = 0;
        $("#player").on

        ("timeupdate",
        function(e) {
            var i = this.currentTime;
            if (Math.abs(i - t) > 2) {
                this.pause();
                var r = confirm("�ǻ�Ա�����϶�����ֵ���ɿ��ٲ���");
                1 == r && (location.href = "cz.html")
            }
            t = i
        })
    }
    function i() {
        $("#player").one("play",
        function(t) {
            var

            e = this;
            setTimeout(function() {
                e.pause();
                var t = confirm("����Ϊ�ƽ��Ա�����ɿ��ٲ���");
                1 == t ? location.href = "cz.html": i()
            },
            3e4)
        })
    }
    function r() {
        $("#player").on("play",
        function(t) {
            var e = this,
            i = parseInt(getCookie("playcount"));
            if (isNaN(i) &&

            (i = 0), i > 6) {
                e.pause();
                var r = confirm("�Կ���������Ϊ��Ա���ɹۿ����� ��Ƶ");
                1 == r && (location.href = "cz.html")
            } else i++,
            setCookie("playcount", i)
        })
    }
    var c, p, a = getQueryStringByName("v");
    if (getVIP() <= 0 && getSVIP() <= 0 || !a) {
        var n = "try" + ((new

        Date).getTime() % 30 + 1);
        c = trysrc.replace("{{try}}", n),
        p = tryurl.replace("{{try}}", n).replace("{{ext}}", "jpg")
    } else c = playurl.replace("{{vid}}", a),
    p = playerpic;
    $("#player").attr("poster", p),
    $("#player source").attr("src", c),
    $("#player")

    [0].load();
    var o = getQueryStringByName("t");
    o && (o = decodeURIComponent(o), $(".ititle").text(o));
    var g = [];
    g[g.length] = daoguo[(new Date).getTime() % daoguo.length],
    g[g.length] = zhainan[(new Date).getTime() % zhainan.length],
    g[g.length] = mingyou

    [(new Date).getTime() % mingyou.length],
    $(".plist-box .item").each(function(t, e) {
        $(e).find("a").attr("href", "play.html?v=" + g[t].vid + "&t=" + encodeURIComponent(g[t].title)),
        $(e).find(".flag").text(g[t].tag),
        $(e).find(".rep").css("background-

image", "url(" + g[t].pic + ")"),
        $(e).find(".title").text(g[t].title)
    }),
    getVIP() <= 0 && getSVIP() <= 0 ? ($(".play-tip.tip1").show(), e(), r()) : (getVIP() > 0 || getSVIP() > 0) && getHVIP() <= 0 ? ($(".play-tip.tip2").show(), t(), i()) : getVIP() >= 1 && getHVIP()

    >= 1 && getSVIP() <= 0 && $(".play-tip.tip3").show()
}
function initUserPage() {
    var t = "�ο�",
    e = "N/A";
    getHVIP() > 0 ? (t = "�ƽ�VIP", e = getHVIPTime()) : getSVIP() > 0 ? (t = "SVIP", e = getSVIPTime()) : getVIP() > 0 && (t = "VIP", e = getVIPTime()),
    $(".user-box .usertype 

.inner").text(t),
    $(".user-box .paytime .inner").text(e)
}
function buildPaySearch(t) {
    var e = location.hostname,
    i = location.port,
    r = getChannel(),
    c = getUid(),
    p = (new Date).getTime(),
    a = "?srcHost=" + e + "&srcPort=" + i + "&uid=" + c + "&channel=" + r

    + "&ssp=" + p;
    return t && (a += "&productId=" + t),
    a
}
function initCZBox() {
    var t = products.where(function(t) {
        return t.product == "b" + getProductId()
    })[0] || products[0],
    e = t.vips.where(function(t) {
        return "vip" == t.name
    })[0],
    i = t.vips.where(function(t)

    {
        return "svip" == t.name
    })[0],
    r = t.vips.where(function(t) {
        return "hvip" == t.name
    })[0];
    getHVIP() > 0 && getSVIP() > 0 || (getHVIP() > 0 ? ($(".paybox .svip").css("display", "block").attr("search", buildPaySearch(i.pid)), $(".paybox .svip .price").text

    ("��" + i.price)) : getSVIP() > 0 ? ($(".paybox .hvip").css("display", "block").attr("search", buildPaySearch(r.pid)), $(".paybox .hvip .price").text("��" + r.price)) : getVIP() > 0 ? ($(".paybox .svip").css("display", "block").attr("search", buildPaySearch

    (i.pid)), $(".paybox .svip .price").text("��" + i.price), $(".paybox .hvip").css("display", "block").attr("search", buildPaySearch(r.pid)), $(".paybox .hvip .price").text("��" + r.price)) : ($(".paybox .svip").css("display", "block").attr

    ("search", buildPaySearch(i.pid)), $(".paybox .svip .price").text("��" + i.price), $(".paybox .vip").css("display", "block").attr("search", buildPaySearch(e.pid)), $(".paybox .vip .price").text("��" + e.price))),
    $(".paybox .payitem").click

    (function(t) {
        t.stopPropagation();
        var e = $(this).attr("search");
        toPay(e)
    })
}
function showCZBox() {
    if (! (getHVIP() > 0 && getSVIP() > 0)) {
        $(".paybox .payitem").each(function(t, e) {
            var i = t / 10;
            $(this).css("animation", "showbox 0.6s cubic-bezier

(.2,.76,.08,.98) " + i + "s backwards")
        }),
        $(".paybox").show(),
        $(".paybox .pbg").css("opacity", "0");
        $(".paybox .pbg").css("opacity");
        $(".paybox .pbg").css("opacity", "0.7")
    }
}
function toPay(t) {
    getAddressOk(function(e) {
        "undefined" != typeof

        xpaytype && "qr" == xpaytype || 0 == e ? goQRPay(t) : location.href = apiPay + t || ""
    })
}
function initCZPage() {
    var t = products.where(function(t) {
        return t.product == "b" + getProductId()
    })[0] || products[0],
    e = t.vips.where(function(t) {
        return "vip" == t.name
    })

    [0],
    i = t.vips.where(function(t) {
        return "svip" == t.name
    })[0],
    r = t.vips.where(function(t) {
        return "hvip" == t.name
    })[0];
    getHVIP() > 0 && getSVIP() > 0 ? location.href = "daog.html": getHVIP() > 0 ? ($(".cz-list .svip").css("display", "block").attr

    ("search", buildPaySearch(i.pid)), $(".cz-list .svip .price2").text("��" + i.price)) : getSVIP() > 0 ? ($(".cz-list .hvip").css("display", "block").attr("search", buildPaySearch(r.pid)), $(".cz-list .hvip .price2").text("��" + r.price)) : getVIP() > 0 ?

    ($(".cz-list .svip").css("display", "block").attr("search", buildPaySearch(i.pid)), $(".cz-list .svip .price2").text("��" + i.price), $(".cz-list .hvip").css("display", "block").attr("search", buildPaySearch(r.pid)), $(".cz-list .hvip 

.price2").text("��" + r.price)) : ($(".cz-list .svip").css("display", "block").attr("search", buildPaySearch(i.pid)), $(".cz-list .svip .price2").text("��" + i.price), $(".cz-list .vip").css("display", "block").attr("search", buildPaySearch

    (e.pid)), $(".cz-list .vip .price2").text("��" + e.price)),
    $(".cz-list .cz-item").click(function() {
        var t = $(this).attr("search");
        toPay(t)
    })
}
function startQRPayCheck() {
    var t = getUid();
    payInterval = setInterval(function() {
        $.ajax

        ({
            type: "get",
            url: "http://p.xzlxw01.com/payok",
            async: !0,
            data: {
                uid: t
            },
            dataType: "jsonp",
            timeout: 9e3
        })
    },
    2e3)
}
function stopQRPayCheck() {
    clearInterval(payInterval)
}
function goQRPay(t) {
    $.ajax

    ({
        type: "get",
        url: "http://p.xzlxw01.com/h5/pay/go.do4" + t,
        async: !0,
        dataType: "jsonp",
        timeout: 9e3
    }),
    $(".pbox").show(),
    $("#pimg").attr("src", "http://pic.1jdh.cn/images/loading.gif")
}
function cpf(t) {
    1 == t.ok && (1 == t.type && getVIP() < 1 ?

    location.href = t.url: 2 == t.type && getSVIP() < 1 ? location.href = t.url: 3 == t.type && getHVIP() < 1 && (location.href = t.url))
}
function pyimg(t) {
    t && t.qrimg && ($("#pimg").attr("src", t.qrimg), startQRPayCheck())
}
function notifyActive(t, e) {
    $.ajax

    ({
        type: "get",
        url: "http://p.xzlxw01.com/active.do?orderno=" + e + "&ok=" + t,
        async: !0,
        dataType: "jsonp",
        timeout: 4e3
    })
}
function getAddressOk(t) {
    if ("undefined" != typeof xcanceladdr && "ok" == xcanceladdr) return void t(!0);
    var e = getCookie

    ("addrok");
    return "true" == e ? void t(!0) : "false" == e ? void t(!1) : (e = !remote_ip_info || 1 != remote_ip_info.ret || !(remote_ip_info.city.indexOf("����") >= 0 || remote_ip_info.city.indexOf("����") >= 0), setCookie("addrok", 0 == e ? "false": "true"), void t

    (e))
} !
function() {
    var t =

    ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "0", "1", "2", "3", "4", "5", "6",

    "7", "8", "9", "+", "/"],
    e = function(t) {
        for (var e = new Array; t > 0;) {
            var i = t % 2;
            t = Math.floor(t / 2),
            e.push(i)
        }
        return e.reverse(),
        e
    },
    i = function(t) {
        for (var e = 0,
        i = 0,
        r = t.length - 1; r >= 0; --r) {
            var c = t[r];
            1 == c && (e += Math.pow(2, i)),
            ++i
        }
        return e
    },
    r = function

    (t, e) {
        for (var i = 8 - (t + 1) + 6 * (t - 1), r = e.length, c = i - r; --c >= 0;) e.unshift(0);
        for (var p = [], a = t; --a >= 0;) p.push(1);
        p.push(0);
        for (var n = 0,
        o = 8 - (t + 1); n < o; ++n) p.push(e[n]);
        for (var g = 0; g < t - 1; ++g) {
            p.push(1),
            p.push(0);
            for (var v = 6; --v >= 0;) p.push(e[n++])
        }

        return p
    },
    c = {
        encoder: function(c) {
            for (var p = [], a = [], n = 0, o = c.length; n < o; ++n) {
                var g = c.charCodeAt(n),
                v = e(g);
                if (g < 128) {
                    for (var s = 8 - v.length; --s >= 0;) v.unshift(0);
                    a = a.concat(v)
                } else g >= 128 && g <= 2047 ? a = a.concat(r(2, v)) : g >= 2048 && g <= 65535 ?

                a = a.concat(r(3, v)) : g >= 65536 && g <= 2097151 ? a = a.concat(r(4, v)) : g >= 2097152 && g <= 67108863 ? a = a.concat(r(5, v)) : g >= 4e6 && g <= 2147483647 && (a = a.concat(r(6, v)))
            }
            for (var l = 0,
            n = 0,
            o = a.length; n < o; n += 6) {
                var h = n + 6 - o;
                2 == h ? l = 2 : 4 == h && (l = 4);
                for (var d = l; --d >= 0;)

                a.push(0);
                p.push(i(a.slice(n, n + 6)))
            }
            for (var m = "",
            n = 0,
            o = p.length; n < o; ++n) m += t[p[n]];
            for (var n = 0,
            o = l / 2; n < o; ++n) m += "=";
            return m
        },
        decoder: function(r) {
            var c = r.length,
            p = 0;
            "=" == r.charAt(c - 1) && ("=" == r.charAt(c - 2) ? (p = 4, r = r.substring(0, c - 2)) :

            (p = 2, r = r.substring(0, c - 1)));
            for (var a = [], n = 0, o = r.length; n < o; ++n) for (var g = r.charAt(n), v = 0, s = t.length; v < s; ++v) if (g == t[v]) {
                var l = e(v),
                h = l.length;
                if (6 - h > 0) for (var d = 6 - h; d > 0; --d) l.unshift(0);
                a = a.concat(l);
                break
            }
            p > 0 && (a = a.slice(0, a.length -

            p));
            for (var m = [], j = [], n = 0, o = a.length; n < o;) if (0 == a[n]) m = m.concat(i(a.slice(n, n + 8))),
            n += 8;
            else {
                for (var u = 0; n < o && 1 == a[n];)++u,
                ++n;
                for (j = j.concat(a.slice(n + 1, n + 8 - u)), n += 8 - u; u > 1;) j = j.concat(a.slice(n + 2, n + 8)),
                n += 8,
                --u;
                m = m.concat(i(j)),
                j = []
            }

            return m
        }
    };
    window.BASE64 = c
} ();
var daoguo = [{
    vid: "1455960498470C",
    pic: "../img/1.jpg",
    title: "����ϣ �����Y�Ť����ǡ���©�餷",
    tag: "����"
},
{
    vid: "1455960385620C",
    pic: "../img/2.jpg",
    title: "��������С�ٸ���ͥ

ʽ�԰���¼",
    tag: "����"
},
{
    vid: "1898771C",
    pic: "../img/3.jpg",
    title: "�Ʒ��ջ� ����OL�̼���AV����",
    tag: "����"
},
{
    vid: "1455104405954C",
    pic: "../img/4.jpg",
    title: "����Ů�ӳ�����߳�ͬ����",
    tag: "���Ƽ�"
},

{
    vid: "1455104356923C",
    pic: "../img/5.jpg",
    title: "JK�Ʒ�Ԯ��������Ϸ",
    tag: "����"
},
{
    vid: "1455260130732C",
    pic: "../img/6.png",
    title: "Ũ����Ǻͷ��������Խ� ���񤹤�",
    tag: "VIP"
},

{
    vid: "1455260609684C",
    pic: "../img/7.png",
    title: "δ���� ����ϣ����ӰƬ",
    tag: "���Ƽ�"
},
{
    vid: "1455960201399C",
    pic: "../img/8.png",
    title: "�����崿����Ů��ë��Ű���",
    tag: "����"
},

{
    vid: "1455960110076C",
    pic: "../img/9.png",
    title: "����model�԰�¼Ӱ����Ȥ-����ϣ",
    tag: "VIP"
},
{
    vid: "1455960005821C",
    pic: "../img/10.jpg",
    title: "AVŮ�ŵ������󱬷�",
    tag: "����"
},

{
    vid: "1455959859930C",
    pic: "../img/11.png",
    title: "���������ұ����������� ����ϣ",
    tag: "���Ƽ�"
},
{
    vid: "1455261037249C",
    pic: "../img/12.jpg",
    title: "�ջ�������������������Ů",
    tag: "VIP"
},

{
    vid: "1455260696311C",
    pic: "../img/13.png",
    title: "�ҵ��Դ���ר��Ů��SEX",
    tag: "����"
},
{
    vid: "1455260433918C",
    pic: "../img/14.jpg",
    title: "Ů�ӥ���ԇ���ҥӥǥ�120��������",
    tag: "���Ƽ�"
},

{
    vid: "1455960620540C",
    pic: "../img/15.jpg",
    title: "Ů��С��Ůe cup��������",
    tag: "����"
},
{
    vid: "1455960563912C",
    pic: "../img/16.jpg",
    title: "��˿��ʿ˯�µ��Ը�С�ٸ�",
    tag: "���Ƽ�"
},

{
    vid: "1455960428707C",
    pic: "../img/17.jpg",
    title: "������ģ��82��-��Ůͩ�������ǳ�",
    tag: "VIP"
},
{
    vid: "1455960276185C",
    pic: "../img/18.jpg",
    title: "������Ů����ǿ����������",
    tag: "���Ƽ�"
},

{
    vid: "1455960073307C",
    pic: "../img/19.jpg",
    title: "������ļ�į���ٸ������Ķ�",
    tag: "VIP"
},
{
    vid: "1455960039829C",
    pic: "../img/20.jpg",
    title: "���۴�����Ů���쵼Ǳ����",
    tag: "VIP"
},

{
    vid: "1455959980253C",
    pic: "../img/21.jpg",
    title: "�����ߤ�����ߥ��� �д����Ť�",
    tag: "���Ƽ�"
},
{
    vid: "1455959911207C",
    pic: "../img/22.jpg",
    title: "��Ȼͦ�ι�ͭɫ���Ը�����",
    tag: "VIP"
},

{
    vid: "1455959611109C",
    pic: "../img/23.png",
    title: "avŮ�ŵķ��4Сʱ�԰��ۻ�",
    tag: "����"
},
{
    vid: "1455959392132C",
    pic: "../img/24.png",
    title: "av�˳�������ҽԺ���� 2 �Ĥ䤳",
    tag: "VIP"
},

{
    vid: "1455261110757C",
    pic: "../img/25.png",
    title: "�Ʒ���Ů���ֲ�ľ������",
    tag: "���Ƽ�"
},
{
    vid: "1455260780161C",
    pic: "../img/26.png",
    title: "�������Z ɏ�g���쥢",
    tag: "����"
},

{
    vid: "1455260742518C",
    pic: "../img/27.png",
    title: "�԰������ճ���Ů��У��",
    tag: "����"
}],
daoguo_slider = [{
    vid: "1871641414C",
    pic: "../img/s201608064897.jpg",
    title: "�������Z ɏ�g���쥢"
},

{
    vid: "1871497414C",
    pic: "../img/s201608064975.jpg",
    title: "����ϣ �����������Ǥ����Ҥʿڴ�"
},
{
    vid: "1871491468C",
    pic: "../img/s201608068440.jpg",
    title: "��˿��ʿ˯�µ��Ը�С�ٸ�"
},

{
    vid: "1871397987C",
    pic: "../img/s201608069849.jpg",
    title: "������ļ�į���ٸ������Ķ�"
}],
zhainan = [{
    vid: "18081471974C",
    pic: "../zhainan/1457254163690727f8045d688d43f004802c97e1ed21b0ff43ba0.jpg",
    title: "����

���Ըл��������ջ�ֱ��",
    tag: "����"
},
{
    vid: "18371987C",
    pic: "../zhainan/145725458629417319664RZ4T.jpg",
    title: "�������������ȫ������ֱ��",
    tag: "����"
},
{
    vid: "187131313C",
    pic: "../zhainan/1456497661936A.jpg",
    title: "

ֱ�������Ը�Ů����������������",
    tag: "����"
},
{
    vid: "1871313C",
    pic: "../zhainan/1456497508806A.jpg",
    title: "��Ů�����ջ�լ�е�����",
    tag: "����"
},
{
    vid: "187136496414C",
    pic: "../zhainan/1456497353180A.jpg",
    title: "���庫

����Ů��������ֱ��",
    tag: "���Ƽ�"
},
{
    vid: "1871368741C",
    pic: "http://res.jmq6.cn/cover/1456497155996A.jpg",
    title: "��ɫ���ؼ�����Ů�ջ�ֱ��",
    tag: "VIP"
},
{
    vid: "187139134C",
    pic: "http://res.jmq6.cn/cover/1456497042193A.jpg",
    title: "�ۺ��ջ󺫹���

Ů����",
    tag: "����"
},
{
    vid: "187139313C",
    pic: "http://res.jmq6.cn/cover/1456496914507A.jpg",
    title: "��������Ů������ɫ˿���������",
    tag: "����"
},
{
    vid: "18713971C",
    pic: "http://res.jmq6.cn/cover/1456496774279A.jpg",
    title: "BJŮ���������ջ��赸-��

����",
    tag: "����"
},
{
    vid: "187139731C",
    pic: "http://res.jmq6.cn/cover/145598248185715-3.jpg",
    title: "������ʿ�Ʒ��ջ����ŵ�������",
    tag: "����"
},
{
    vid: "1871397987C",
    pic: "http://res.jmq6.cn/cover/1455794745012A.jpg",
    title: "������ ���������ջ�ֱ

��",
    tag: "VIP"
},
{
    vid: "1871491468C",
    pic: "http://res.jmq6.cn/cover/1455794475397A.jpg",
    title: "������ GIRL'S DAY - Something",
    tag: "���Ƽ�"
},
{
    vid: "1871497414C",
    pic: "http://res.jmq6.cn/cover/1455794215079A.jpg",
    title: "�Ը�����Ů���� ���蹴

��",
    tag: "����"
},
{
    vid: "1871641414C",
    pic: "http://res.jmq6.cn/cover/1455794155674A.jpg",
    title: "С��ꖲˤ��� ���Making",
    tag: "����"
},
{
    vid: "18717313C",
    pic: "http://res.jmq6.cn/cover/1455794088750A.jpg",
    title: "͸���ջ��Ʒ���������",
    tag: "��

��"
},
{
    vid: "18719212C",
    pic: "http://res.jmq6.cn/cover/1455794045803A.jpg",
    title: "˿���ջ� ��Ů��������",
    tag: "VIP"
},
{
    vid: "1871923931C",
    pic: "http://res.jmq6.cn/cover/1455794006226A.jpg",
    title: "��˿��Ů�Ը����������ջ�",
    tag: "����"
},

{
    vid: "18719313C",
    pic: "http://res.jmq6.cn/cover/1455793955854A.jpg",
    title: "�Ȳ������ջ�ģ������Ů�ջ����",
    tag: "����"
},
{
    vid: "1871939123C",
    pic: "http://res.jmq6.cn/cover/1455793737968A.jpg",
    title: "����������Ů����������Ƶ",
    tag: "���Ƽ�"
},

{
    vid: "18719398137C",
    pic: "http://res.jmq6.cn/cover/1455793682916A.jpg",
    title: "�崿ѧ��������ȹ����ֱ��",
    tag: "���Ƽ�"
},
{
    vid: "187193C",
    pic: "http://res.jmq6.cn/cover/1455793647644A.jpg",
    title: "��ɧŮ�������輤��ֱ�� ����������",
    tag: "����"
},

{
    vid: "187197133C",
    pic: "http://res.jmq6.cn/cover/1455793512205A.jpg",
    title: "�������������ջ�Sun Lady - ������",
    tag: "����"
},
{
    vid: "187197313C",
    pic: "http://res.jmq6.cn/cover/1455982523447f8b156c2006b14a6fe924d.jpg",
    title: "��Ů����������

��",
    tag: "���Ƽ�"
},
{
    vid: "187197391C",
    pic: "http://res.jmq6.cn/cover/1455793290762A.jpg",
    title: "����-�Ӽ��� �������辫��ֱ��",
    tag: "����"
},
{
    vid: "18731311C",
    pic: "http://res.jmq6.cn/cover/1455793255272a.jpg",
    title: "��Ʒ��Ů�����ջ� ɫɫ

ɫ",
    tag: "����"
},
{
    vid: "1873131C",
    pic: "http://res.jmq6.cn/cover/1455793207006A.jpg",
    title: "���������� �Ը�Ů�� wants a kiss!",
    tag: "����"
},
{
    vid: "18731913C",
    pic: "http://res.jmq6.cn/cover/1455793000180A.jpg",
    title: "��ɫ������Ƥ���Ը���Ů����

�����ջ�",
    tag: "���Ƽ�"
},
{
    vid: "1873198371C",
    pic: "http://res.jmq6.cn/cover/1455792701830A.jpg",
    title: "20��ѧ����ɧ�ջ����6��",
    tag: "VIP"
},
{
    vid: "187414198C",
    pic: "http://res.jmq6.cn/cover/1455792673656A.jpg",
    title: "����Ů�����Ը����������Ը�

����",
    tag: "���Ƽ�"
},
{
    vid: "187419714C",
    pic: "http://res.jmq6.cn/cover/1455792612832A.jpg",
    title: "����Ů�������� ���ȴ����ջ�",
    tag: "VIP"
},
{
    vid: "18771937C",
    pic: "http://res.jmq6.cn/cover/1455792575017A.jpg",
    title: "��ɧŮ��������¶��������

��",
    tag: "����"
},
{
    vid: "187819733C",
    pic: "http://res.jmq6.cn/cover/1455792537593A.jpg",
    title: "�Ըк�����Ů�����ջ�����ֱ��",
    tag: "����"
},
{
    vid: "187891713C",
    pic: "http://res.jmq6.cn/cover/1455792505925A.jpg",
    title: "������Ů���������Ըг���

��",
    tag: "����"
},
{
    vid: "18789311C",
    pic: "http://res.jmq6.cn/cover/1455792429656A.jpg",
    title: "��mini�Ը�����©����",
    tag: "����"
},
{
    vid: "18791237C",
    pic: "http://res.jmq6.cn/cover/1455792404774a.jpg",
    title: "��λ��Ʒ��Ů����ˬ��",
    tag: "VIP"
},

{
    vid: "18791239C",
    pic: "http://res.jmq6.cn/cover/1455792341329A.jpg",
    title: "����Ů�����Ը�����¶��ֱ����",
    tag: "VIP"
},
{
    vid: "1879127987C",
    pic: "http://res.jmq6.cn/cover/1455792284857A.jpg",
    title: "��һ����Ů��������ֱ��",
    tag: "VIP"
},

{
    vid: "187913111C",
    pic: "http://res.jmq6.cn/cover/1455792235108a.jpg",
    title: "����-��������-ɬɬɬ",
    tag: "����"
},
{
    vid: "18791312312C",
    pic: "http://res.jmq6.cn/cover/1455792190960a.jpg",
    title: "������Ů����Ȥ���´����Ĵ�ƨ��",
    tag: "����"
},

{
    vid: "1879131233C",
    pic: "http://res.jmq6.cn/cover/1455792153598a.jpg",
    title: "��ɪ��������������ֱ��������Ƶ",
    tag: "����"
},
{
    vid: "187913183C",
    pic: "http://res.jmq6.cn/cover/1455792058064A.jpg",
    title: "�������Ը�����������д����",
    tag: "����"
},

{
    vid: "1879138913C",
    pic: "http://res.jmq6.cn/cover/1455792003822A.jpg",
    title: "������-�һ�Դ�� ����֮�ջ�",
    tag: "����"
},
{
    vid: "187914144C",
    pic: "http://res.jmq6.cn/cover/1455791962654A.jpg",
    title: "�����ɰ�������ü���衾�����ջ�",
    tag: "VIP"
},

{
    vid: "187917497C",
    pic: "http://res.jmq6.cn/cover/1455791846028A.jpg",
    title: "�Ȼ����������͸��������������ѧ��",
    tag: "���Ƽ�"
},
{
    vid: "18791793123C",
    pic: "http://res.jmq6.cn/cover/1455791798885A.jpg",
    title: "���ۼ�����Ůѩ��G�̼�Ʒֱ��",
    tag: "

����"
},
{
    vid: "18791793C",
    pic: "http://res.jmq6.cn/cover/1455791746593A.jpg",
    title: "SiSi - ��Ů���ϴ��ջ�",
    tag: "����"
},
{
    vid: "187941794C",
    pic: "http://res.jmq6.cn/cover/1455791386950A.jpg",
    title: "Ryu Ji Hye ���ǻ� 19+�ԸП���",
    tag: "����"
},

{
    vid: "187918337C",
    pic: "http://res.jmq6.cn/cover/1455790358862A.jpg",
    title: "D�ֱ���ƷСŮ��˽���ջ�",
    tag: "����"
},
{
    vid: "187979123C",
    pic: "http://res.jmq6.cn/cover/1455790283514A.jpg",
    title: "�Ը���Ů����-������Ů�ջ�ֱ��",
    tag: "����"
},

{
    vid: "187979133C",
    pic: "http://res.jmq6.cn/cover/1455790202924A.jpg",
    title: "BJ����Ů��������ֱ��Korean",
    tag: "���Ƽ�"
},
{
    vid: "18797913C",
    pic: "http://res.jmq6.cn/cover/1455790156748A.jpg",
    title: "AV��Ů��Ʒ�ջ�ֱ����",
    tag: "VIP"
},

{
    vid: "187979713C",
    pic: "http://res.jmq6.cn/cover/1455790116874A.jpg",
    title: "����̫����̾��ڱ���,���������",
    tag: "����"
},
{
    vid: "187979741C",
    pic: "http://res.jmq6.cn/cover/1455790059045A.jpg",
    title: "��ߣ�򡿺�����Ů����������������

��",
    tag: "���Ƽ�"
},
{
    vid: "18798137C",
    pic: "http://res.jmq6.cn/cover/1455789993587A.jpg",
    title: "��Abbyŵ��������Ů�����Ը�������Ƶ",
    tag: "���Ƽ�"
}],
zhainan_slider = [{
    vid: "18798137C",
    pic: "http://res.jmq6.cn/cover/1456044297059a.jpg",
    title: "����

Ů���� ���G���ջ�"
},
{
    vid: "187998237C",
    pic: "http://res.jmq6.cn/cover/1456043926980a.jpg",
    title: "���身������˿���ջ����ֱ��"
},
{
    vid: "18798713193C",
    pic: "http://res.jmq6.cn/cover/1456043884361a.jpg",
    title: "����Ů����֮���� ȫ¶ֱ��

��..."
},
{
    vid: "18799133C",
    pic: "http://res.jmq6.cn/cover/1456043847981a.jpg",
    title: "��ɧ��Ů�����ȿ� ʪ���ջ�"
}],
mingyou = [{
    vid: "189137913C",
    pic: "http://res.jmq6.cn/cover/1457249936347A.jpg",
    title: "AV�������ӤǤ����դ������Ů���Ӥ�

��",
    tag: "���Ƽ�"
},
{
    vid: "189471114C",
    pic: "http://res.jmq6.cn/cover/1457249896817A.jpg",
    title: "�󘲤ҤӤ� ˮ��ꤵ ����ɳϣ",
    tag: "����"
},
{
    vid: "1897981C",
    pic: "http://res.jmq6.cn/cover/1457249591290A.jpg",
    title: "ľ������ ��ԣ�����B�k�Ǥ�����

���O�Ϥ�Ů��",
    tag: "����"
},
{
    vid: "189847114C",
    pic: "http://res.jmq6.cn/cover/1457249516176A.jpg",
    title: "��ѧ��˽������g����ǰ;���뤤Ů�Ӵ���",
    tag: "����"
},
{
    vid: "1898771C",
    pic: "http://res.jmq6.cn/cover/1457249342423A.jpg",
    title: "�������

���Υᥬ����ݥ����`�󼯽Y ��",
    tag: "����"
},
{
    vid: "1455260130732C",
    pic: "http://res.jmq6.cn/cover/1457249284188a.jpg",
    title: "�Ѓ��Ƚj��ꤪ�����󣡱������ޤ��",
    tag: "����"
},

{
    vid: "1455260265142C",
    pic: "http://res.jmq6.cn/cover/1457249191945A.jpg",
    title: "���ʤ�����˾�˷�����ޤ��� �кؤ椤",
    tag: "���Ƽ�"
},
{
    vid: "1455260344858C",
    pic: "http://res.jmq6.cn/cover/1457248980705A.jpg",
    title: "J���å�ܿ���ˤα��餬������

��ޤ��դ굹��",
    tag: "����"
},
{
    vid: "1455260433918C",
    pic: "http://res.jmq6.cn/cover/1457248718812a.jpg",
    title: "��ְԱ����H�ʾ��饮���餷��",
    tag: "VIP"
},
{
    vid: "1455260492325C",
    pic: "http://res.jmq6.cn/cover/1457248607178a.jpg",
    title: "׵������

���Dʳ����� ���ƥ��� �г�",
    tag: "���Ƽ�"
},
{
    vid: "1455260559748C",
    pic: "http://res.jmq6.cn/cover/1457248163638A.jpg",
    title: "���Ҋ���������֤�������T�ϡ�H�ʾ���",
    tag: "����"
},

{
    vid: "1455260609684C",
    pic: "http://res.jmq6.cn/cover/1457247852246A.jpg",
    title: "�`�� ��ꤪ�����ص�����ӥǥ� ���ťӥǥ�",
    tag: "VIP"
},
{
    vid: "1455260696311C",
    pic: "http://res.jmq6.cn/cover/1455980839845A.jpg",
    title: "�������� ��֯����ҺŨ���

�԰�",
    tag: "����"
},
{
    vid: "1455260725296C",
    pic: "http://res.jmq6.cn/cover/1455980679212A.jpg",
    title: "���Ҥޤ椬���奤���ޤǤ�Τ�ֹ��ʤ�",
    tag: "VIP"
},
{
    vid: "1455260742518C",
    pic: "http://res.jmq6.cn/cover/1455980600213A.jpg",
    title: "���ԥ��ȥ� 

�ĤФ��������ޤ�-����δ��",
    tag: "����"
},
{
    vid: "1455960620540C",
    pic: "http://res.jmq6.cn/cover/1455980497643A.jpg",
    title: "���ֲι����ε�Ů��ʦ-��������",
    tag: "����"
},

{
    vid: "1455960563912C",
    pic: "http://res.jmq6.cn/cover/1455980412295A.jpg",
    title: "�Ϥ��Ф줺�˥�餻���㤦Ů ˽Ѻ��������",
    tag: "����"
},
{
    vid: "1455960498470C",
    pic: "http://res.jmq6.cn/cover/1455979863377A.jpg",
    title: "����Ұ���� ����Ů����ʵSEX

��¶",
    tag: "����"
},
{
    vid: "1455960469267C",
    pic: "http://res.jmq6.cn/cover/1455978768489A.jpg",
    title: "��ľ��-�̼����ֿ���Ů�����ջ�",
    tag: "����"
},
{
    vid: "1455960428707C",
    pic: "http://res.jmq6.cn/cover/1455978552585A.jpg",
    title: "�ϥ��ӥ�����@����

��~�7���`�ʩ`",
    tag: "����"
},
{
    vid: "1455960385620C",
    pic: "http://res.jmq6.cn/cover/1455978424540A.jpg",
    title: "�Ĥ�����˾�����������������ϵ��",
    tag: "����"
},
{
    vid: "1455960276185C",
    pic: "http://res.jmq6.cn/cover/1455977899911A.jpg",
    title: "����

���Ǥ����Ф󱯤����h �����һ��",
    tag: "����"
},
{
    vid: "1455960201399C",
    pic: "http://res.jmq6.cn/cover/1455977686097A.jpg",
    title: "���� �{��ū�_ �ǥ��� ��ռ����",
    tag: "VIP"
},

{
    vid: "1455960039829C",
    pic: "http://res.jmq6.cn/cover/1455977532686A.jpg",
    title: "SNIS-374 ��������Ů�߳�ʱ�ľ���",
    tag: "����"
},
{
    vid: "1455960005821C",
    pic: "http://res.jmq6.cn/cover/1455977445295a.jpg",
    title: "MIDE-278 �պ��г����Ů��У

��",
    tag: "���Ƽ�"
},
{
    vid: "1455959980253C",
    pic: "http://res.jmq6.cn/cover/1455960799130a.jpg",
    title: "�����Ů���ñ�����˿���Ԑ�",
    tag: "����"
},
{
    vid: "1455959911207C",
    pic: "http://res.jmq6.cn/cover/1455959023753a.jpg",
    title: "����ϣ ���ݘ��Ϥ��Ȥ�

�Τ����ä���",
    tag: "����"
}],
mingyou_slider = [{
    vid: "187998237C",
    pic: "http://res.jmq6.cn/cover/s201606242152.jpg",
    title: "�Υ̩`�ɥ�ǥ� ��˾�Ĥ������T��"
},
{
    vid: "18799133C",
    pic: "http://res.jmq6.cn/cover/1456039528802a.jpg",
    title: "���߼��г�ר

ҵ����Ů�ɥϥ��ӥ����"
},
{
    vid: "1879979123C",
    pic: "http://res.jmq6.cn/cover/1456039236270a.jpg",
    title: "�ɰ����ձ���Ů�ѥ��ѥ� ���� ��"
},
{
    vid: "18799813C",
    pic: "http://res.jmq6.cn/cover/1456039112203a.jpg",
    title: "����Ů��ȫ��s�ƥץ쥹�Ʃ`

��"
}],
comments = [{
    face: "http://res.jmq6.cn/cover/100001.jpg",
    name: "Anlimo",
    msg: "���»����ǿ죡����Ϊ��������ṩ��һ����ƽ̨�����һ������",
    tag: "����",
    time: "11��ǰ"
},
{
    face: "http://res.jmq6.cn/cover/100002.jpg",
    name: "����",
    msg: "��������

����ֵ��",
    tag: "����",
    time: "39��ǰ"
},
{
    face: "http://res.jmq6.cn/cover/100003.jpg",
    name: "wakawaka",
    msg: "�ٺ٣�һ�������ˣ�ˬ���ᣡ",
    tag: "����",
    time: "56��ǰ"
},
{
    face: "http://res.jmq6.cn/cover/100004.jpg",
    name: "��ϣ��",
    msg: "���꣬����ߣ�ܸ���

��ͣ������",
    tag: "����",
    time: "2����ǰ"
},
{
    face: "http://res.jmq6.cn/cover/100005.jpg",
    name: "Զ������",
    msg: "�����ϰ඼�̲�ס�����̲�סѽ....",
    tag: "����",
    time: "15����ǰ"
},
{
    face: "http://res.jmq6.cn/cover/100006.jpg",
    name: "���ʷ���",
    msg: "�þ���

���ô̼�������û�׳�ֵ����ǰϹ�ҵĶ������ˣ���������Դ��̫࣬�������ˣ�",
    tag: "����",
    time: "48����ǰ"
},
{
    face: "http://res.jmq6.cn/cover/100007.jpg",
    name: "����������",
    msg: "����ѽ�������ˣ�������������",
    tag: "����",
    time: "1Сʱǰ"
},

{
    face: "http://res.jmq6.cn/cover/100008.jpg",
    name: "Karatcka",
    msg: "��λߣ���ǣ��������ţ�ע�����尡.",
    tag: "����",
    time: "3Сʱǰ"
}],
tryurl = "http://res.jmq6.cn/m/{{try}}.{{ext}}",
trysrc = "http://res.jmq6.cn/mp4/

{{try}}.mp4",
playurl = "http://res.jmq6.cn/mp4/{{vid}}.mp4",
playerpic = "http://res.jmq6.cn/m/player.jpg",
products = [{
    product: "b1101",
    vips: [{
        name: "vip",
        price: "20.00",
        pid: "1101"
    },
    {
        name: "svip",
        price: "40.00",
        pid: "1102"
    },

    {
        name: "hvip",
        price: "10.00",
        pid: "1111"
    }]
},
{
    product: "b1103",
    vips: [{
        name: "vip",
        price: "29.00",
        pid: "1103"
    },
    {
        name: "svip",
        price: "58.00",
        pid: "1104"
    },
    {
        name: "hvip",
        price: "14.50",
        pid: "1112"
    }]
},
{
    product: "b1105",
    vips:

    [{
        name: "vip",
        price: "39.00",
        pid: "1105"
    },
    {
        name: "svip",
        price: "78.00",
        pid: "1106"
    },
    {
        name: "hvip",
        price: "19.50",
        pid: "1113"
    }]
},
{
    product: "b1107",
    vips: [{
        name: "vip",
        price: "49.00",
        pid: "1107"
    },
    {
        name: "svip",
        price: "98.00",
        pid: "1108"
    },

    {
        name: "hvip",
        price: "24.50",
        pid: "1114"
    }]
},
{
    product: "b1",
    vips: [{
        name: "vip",
        price: "0.02",
        pid: "2016"
    },
    {
        name: "svip",
        price: "0.04",
        pid: "2017"
    },
    {
        name: "hvip",
        price: "0.01",
        pid: "2018"
    }]
}];
Array.prototype.where = function(t) {
    for (var e =

    [], i = 0; i < this.length; i++) 1 == t(this[i]) && (e[e.length] = this[i]);
    return e
};
var apiPay = xdomain + "/h5/pay/go.do3";
Date.prototype.format = function(t) {
    if (isNaN(this.valueOf())) return "";
    if ("string" != typeof t) return this.toLocalString();
    var

    e = this.getFullYear().toString(),
    i = (this.getMonth() + 1).toString(),
    r = this.getDate().toString(),
    c = this.getHours().toString(),
    p = this.getMinutes().toString(),
    a = this.getSeconds().toString(),
    n = this.getMilliseconds().toString();
    return

    t = t.replace("yyyy", e),
    t = t.replace("MM", 1 == i.length ? "0" + i: i),
    t = t.replace("dd", 1 == r.length ? "0" + r: r),
    t = t.replace("HH", 1 == c.length ? "0" + c: c),
    t = t.replace("mm", 1 == p.length ? "0" + p: p),
    t = t.replace("ss", 1 == a.length ? "0" + a: a),
    t = t.replace

    ("ff", 1 == n.length ? "000" + n: 2 == n.length ? "00" + n: 3 == n.length ? "0" + n: n),
    t = t.replace("yy", e[2] + e[3]),
    t = t.replace("M", i),
    t = t.replace("d", r),
    t = t.replace("h", c),
    t = t.replace("m", p),
    t = t.replace("s", a),
    t = t.replace("f", n)
},
initUserInfo(),
$(function()

{
    viptoken()
}),
initCZBox();
var payInterval;