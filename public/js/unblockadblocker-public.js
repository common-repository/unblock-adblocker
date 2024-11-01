! function() {
    "use strict";
    new function() {
        var e = this,
            n = window,
            t = document;
        e.css_class = {}, e.plugin = {}, e.debug = !1, e.data = null, e.checking = !0, e.a = "//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", e.g = !1, e.key = "uaau_dissmissed", e.interval_fn, e.addListener = function(e, n, t) {
            n.addEventListener ? n.addEventListener(e, t, !1) : n.attachEvent("on" + e, t)
        }, e.init = function() {
            "true" != n.sessionStorage.getItem(e.key) && (e.addListener("load", n, e.run), e.addListener("load", n, e.maintain))
        }, e.run = function() {
            var n = t.createElement("script");
            e.debug ? n.onerror = e.loadError : n.onerror = e.uaadb_get_data, n.onload = function() {
                void 0 === window.adsbygoogle.length && (e.g = window.adsbygoogle.loaded)
            }, n.src = e.a, t.head.appendChild(n)
        }, e.loadError = function(e) {
            throw console.log("error"), new URIError("The script " + e.target.src + " didn't load correctly.")
        }, e.maintain = function() {
            "true" != n.sessionStorage.getItem(e.key) && (e.interval_fn = setInterval((function() {
                e.isBlanketFound() || e.g || (null === e.data ? e.uaadb_get_data() : e.uaau_app_fnsm())
            }), 4e3))
        }, e.isBlanketFound = function() {
            return null !== e.data && null !== document.getElementById(e.plugin.blanket.id)
        }, e.build_ui = function() {
            e.initCss(), e.createHtmlElements(), e.initEvents(), e.setMoualContent(), e.setMoualStyle(), e.buildMoual(), e.uaau_app_fnsm(), e.setTimer()
        }, e.uaadb_get_data = function() {
            e.uaadb_get_data_fetch();
        }, e.uaadb_get_data_fetch = function() {
            var n = new FormData();
            n.append("action", "get_uaau_settings"), n.append("nonce", uaau_app.nonces.get_plugin_data);
            var t = {
                    action: "get_uaau_settings",
                    nonce: uaau_app.nonces.get_plugin_data
                },
                a = new URLSearchParams(t);
            null === e.data && fetch(uaau_app.this_url, {
                method: "POST",
                credentials: "same-origin",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                    "Cache-Control": "no-cache"
                },
                body: a
            }).then((function(e) {
              
                return e.json()
            })).then((function(n) {
               
                e.data = n, e.build_ui()
               
            })).catch((function(e) {
                console.log("Error:", e)
            }))
        }, e.initCss = function() {
            e.css_class.wrapper = "uaau_app-wrapper", e.css_class.container = "uaau_app-container", e.css_class.blanket = "uaau_app-blanket", e.css_class.scroll = "uaau_app-disable-scroll", e.css_class.show = "uaau_app-show", e.css_class.timer = "uaau_app-timer"
        }, e.createHtmlElements = function() {
            e.plugin.blanket = t.createElement("div"), e.plugin.wrapper = t.createElement("div"), e.plugin.container = t.createElement("div"), e.plugin.content = t.createElement("div"), "temp" == e.data.type && (e.plugin.timer = t.createElement("div"), e.plugin.timer.classList = e.css_class.timer, e.plugin.timer.innerHTML = "This message will autoclose in ", e.plugin.timer_counter = t.createElement("span"), e.plugin.timer_counter.innerHTML = parseInt(e.data.delay) / 1e3, e.plugin.timer.appendChild(e.plugin.timer_counter)), "dismissible" == e.data.type && (e.plugin.close_button = t.createElement("button"), e.plugin.close_button.innerHTML = "✖", e.plugin.close_button.classList = ""), e.plugin.styles = t.createElement("style"), e.plugin.styles.type = "text/css", void 0 !== e.data["title-color"] && (e.plugin.styles.innerHTML = "#" + e.css_class.blanket + " h1, h2, h3, h4, h5, h6 { color: " + e.data["title-color"] + ";}"), void 0 !== e.data["text-color"] && (e.plugin.styles.innerHTML = "#" + e.css_class.blanket + " * { color: " + e.data["text-color"] + ";}")
        }, e.timer_count_down = function() {
            var n = parseInt(e.data.delay) / 1e3,
                t = setInterval((function() {
                    --n < 0 && (clearInterval(t), e.close()), e.plugin.timer_counter.innerHTML = n
                }), 1e3)
        }, e.setMoualStyle = function() {
            e.plugin.blanket.id = e.css_class.blanket, e.plugin.blanket.style.backgroundColor = e.data["overlay-color"], e.plugin.container.style.background = e.data["bg-color"]
        }, e.setMoualContent = function() {
            console.log(e.data);
            e.plugin.content.innerHTML = e.data.content
        }, e.buildMoual = function() {
            e.plugin.container.appendChild(e.plugin.content), e.plugin.wrapper.appendChild(e.plugin.container), e.plugin.blanket.appendChild(e.plugin.wrapper), "dismissible" == e.data.type && e.plugin.container.appendChild(e.plugin.close_button), "temp" == e.data.type && e.plugin.container.appendChild(e.plugin.timer)
        }, e.initEvents = function() {
            "dismissible" == e.data.type && e.addListener("click", e.plugin.close_button, e.close)
        }, e.uaau_app_fnsm = function() {
            e.isBlanketFound() || (t.head.appendChild(e.plugin.styles), t.body.appendChild(e.plugin.blanket), setTimeout((function() {
                -1 == t.body.className.indexOf(e.css_class.show) && (t.body.className += " " + e.css_class.show), "1" != e.data["scrollable-status"] && -1 == t.body.className.indexOf(e.css_class.scroll) && (t.body.className += " " + e.css_class.scroll)
            }), 300))
        }, e.setTimer = function() {
            "temp" == e.data.type && (e.data.delay, e.timer_count_down(), clearInterval(e.interval_fn))
        }, e.close = function() {
            t.body.classList.remove(e.css_class.scroll);
            var n = t.getElementById(e.plugin.blanket.id);
            n.parentNode.removeChild(n), e.doDismiss()
        }, e.doDismiss = function() {
            "session" == e.data.scope && e.populateStorage(), "dismissible" == e.data.type && "page" == e.data.scope && clearInterval(e.interval_fn)
        }, e.populateStorage = function() {
            n.sessionStorage.setItem(e.key, !0), clearInterval(e.interval_fn)
        };
        try {
            e.addListener("DOMContentLoaded", n, e.init)
        } catch (e) {
            console.warn("JS Error in unblockadblocker.js"), console.log(e)
        }
    }
}();