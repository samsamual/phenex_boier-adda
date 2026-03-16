<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from ebook.bdwheelchaircricket.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Sep 2025 05:29:45 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <title>eBook &#8211; Best Online Book Shop</title>
    <meta name='robots' content='max-image-preview:large' />
    <style>
    img:is([sizes="auto"i], [sizes^="auto,"i]) {
        contain-intrinsic-size: 3000px 1500px
    }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="alternate" type="application/rss+xml" title="eBook &raquo; Feed" href="feed/index.html" />
    <link rel="alternate" type="application/rss+xml" title="eBook &raquo; Comments Feed"
        href="comments/feed/index.html" />
    <script>
    window._wpemojiSettings = {
        "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/16.0.1\/72x72\/",
        "ext": ".png",
        "svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/16.0.1\/svg\/",
        "svgExt": ".svg",
        "source": {
            // "concatemoji": "https:\/\/ebook.bdwheelchaircricket.com\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.8.2"
        }
    };
    /*! This file is auto-generated */
    ! function(s, n) {
        var o, i, e;

        function c(e) {
            try {
                var t = {
                    supportTests: e,
                    timestamp: (new Date).valueOf()
                };
                sessionStorage.setItem(o, JSON.stringify(t))
            } catch (e) {}
        }

        function p(e, t, n) {
            e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(t, 0, 0);
            var t = new Uint32Array(e.getImageData(0, 0, e.canvas.width, e.canvas.height).data),
                a = (e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(n, 0, 0), new Uint32Array(e
                    .getImageData(0, 0, e.canvas.width, e.canvas.height).data));
            return t.every(function(e, t) {
                return e === a[t]
            })
        }

        function u(e, t) {
            e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(t, 0, 0);
            for (var n = e.getImageData(16, 16, 1, 1), a = 0; a < n.data.length; a++)
                if (0 !== n.data[a]) return !1;
            return !0
        }

        function f(e, t, n, a) {
            switch (t) {
                case "flag":
                    return n(e, "\ud83c\udff3\ufe0f\u200d\u26a7\ufe0f", "\ud83c\udff3\ufe0f\u200b\u26a7\ufe0f") ? !1 : !
                        n(e, "\ud83c\udde8\ud83c\uddf6", "\ud83c\udde8\u200b\ud83c\uddf6") && !n(e,
                            "\ud83c\udff4\udb40\udc67\udb40\udc62\udb40\udc65\udb40\udc6e\udb40\udc67\udb40\udc7f",
                            "\ud83c\udff4\u200b\udb40\udc67\u200b\udb40\udc62\u200b\udb40\udc65\u200b\udb40\udc6e\u200b\udb40\udc67\u200b\udb40\udc7f"
                        );
                case "emoji":
                    return !a(e, "\ud83e\udedf")
            }
            return !1
        }

        function g(e, t, n, a) {
            var r = "undefined" != typeof WorkerGlobalScope && self instanceof WorkerGlobalScope ? new OffscreenCanvas(
                    300, 150) : s.createElement("canvas"),
                o = r.getContext("2d", {
                    willReadFrequently: !0
                }),
                i = (o.textBaseline = "top", o.font = "600 32px Arial", {});
            return e.forEach(function(e) {
                i[e] = t(o, e, n, a)
            }), i
        }

        function t(e) {
            var t = s.createElement("script");
            t.src = e, t.defer = !0, s.head.appendChild(t)
        }
        "undefined" != typeof Promise && (o = "wpEmojiSettingsSupports", i = ["flag", "emoji"], n.supports = {
            everything: !0,
            everythingExceptFlag: !0
        }, e = new Promise(function(e) {
            s.addEventListener("DOMContentLoaded", e, {
                once: !0
            })
        }), new Promise(function(t) {
            var n = function() {
                try {
                    var e = JSON.parse(sessionStorage.getItem(o));
                    if ("object" == typeof e && "number" == typeof e.timestamp && (new Date).valueOf() <
                        e.timestamp + 604800 && "object" == typeof e.supportTests) return e.supportTests
                } catch (e) {}
                return null
            }();
            if (!n) {
                if ("undefined" != typeof Worker && "undefined" != typeof OffscreenCanvas && "undefined" !=
                    typeof URL && URL.createObjectURL && "undefined" != typeof Blob) try {
                    var e = "postMessage(" + g.toString() + "(" + [JSON.stringify(i), f.toString(), p
                            .toString(), u.toString()
                        ].join(",") + "));",
                        a = new Blob([e], {
                            type: "text/javascript"
                        }),
                        r = new Worker(URL.createObjectURL(a), {
                            name: "wpTestEmojiSupports"
                        });
                    return void(r.onmessage = function(e) {
                        c(n = e.data), r.terminate(), t(n)
                    })
                } catch (e) {}
                c(n = g(i, f, p, u))
            }
            t(n)
        }).then(function(e) {
            for (var t in e) n.supports[t] = e[t], n.supports.everything = n.supports.everything && n
                .supports[t], "flag" !== t && (n.supports.everythingExceptFlag = n.supports
                    .everythingExceptFlag && n.supports[t]);
            n.supports.everythingExceptFlag = n.supports.everythingExceptFlag && !n.supports.flag, n
                .DOMReady = !1, n.readyCallback = function() {
                    n.DOMReady = !0
                }
        }).then(function() {
            return e
        }).then(function() {
            var e;
            n.supports.everything || (n.readyCallback(), (e = n.source || {}).concatemoji ? t(e
                .concatemoji) : e.wpemoji && e.twemoji && (t(e.twemoji), t(e.wpemoji)))
        }))
    }((window, document), window._wpemojiSettings);
    </script>
    <link rel='stylesheet' id='astra-theme-css-css'
        href='wp-content/themes/astra/assets/css/minified/main.mine060.css?ver=4.11.9' media='all' />
    <style id='astra-theme-css-inline-css'>
    :root {
        --ast-post-nav-space: 0;
        --ast-container-default-xlg-padding: 2.5em;
        --ast-container-default-lg-padding: 2.5em;
        --ast-container-default-slg-padding: 2em;
        --ast-container-default-md-padding: 2.5em;
        --ast-container-default-sm-padding: 2.5em;
        --ast-container-default-xs-padding: 2.4em;
        --ast-container-default-xxs-padding: 1.8em;
        --ast-code-block-background: #ECEFF3;
        --ast-comment-inputs-background: #F9FAFB;
        --ast-normal-container-width: 1200px;
        --ast-narrow-container-width: 750px;
        --ast-blog-title-font-weight: 600;
        --ast-blog-meta-weight: 600;
        --ast-global-color-primary: var(--ast-global-color-4);
        --ast-global-color-secondary: var(--ast-global-color-5);
        --ast-global-color-alternate-background: var(--ast-global-color-6);
        --ast-global-color-subtle-background: var(--ast-global-color-7);
        --ast-bg-style-guide: #F8FAFC;
        --ast-shadow-style-guide: 0px 0px 4px 0 #00000057;
        --ast-global-dark-bg-style: #fff;
        --ast-global-dark-lfs: #fbfbfb;
        --ast-widget-bg-color: #fafafa;
        --ast-wc-container-head-bg-color: #fbfbfb;
        --ast-title-layout-bg: #eeeeee;
        --ast-search-border-color: #e7e7e7;
        --ast-lifter-hover-bg: #e6e6e6;
        --ast-gallery-block-color: #000;
        --srfm-color-input-label: var(--ast-global-color-2);
    }

    html {
        font-size: 100%;
    }

    a {
        color: var(--ast-global-color-0);
    }

    a:hover,
    a:focus {
        color: var(--ast-global-color-1);
    }

    body,
    button,
    input,
    select,
    textarea,
    .ast-button,
    .ast-custom-button {
        font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen-Sans, Ubuntu, Cantarell, Helvetica Neue, sans-serif;
        font-weight: 400;
        font-size: 16px;
        font-size: 1rem;
        line-height: var(--ast-body-line-height, 1.65);
    }

    blockquote {
        color: var(--ast-global-color-3);
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .entry-content :where(h1, h2, h3, h4, h5, h6),
    .site-title,
    .site-title a {
        font-weight: 600;
    }

    .ast-site-identity .site-title a {
        color: var(--ast-global-color-2);
    }

    .site-title {
        font-size: 26px;
        font-size: 1.625rem;
        display: block;
    }

    .site-header .site-description {
        font-size: 15px;
        font-size: 0.9375rem;
        display: none;
    }

    .entry-title {
        font-size: 20px;
        font-size: 1.25rem;
    }

    .ast-blog-single-element.ast-taxonomy-container a {
        font-size: 14px;
        font-size: 0.875rem;
    }

    .ast-blog-meta-container {
        font-size: 13px;
        font-size: 0.8125rem;
    }

    .archive .ast-article-post .ast-article-inner,
    .blog .ast-article-post .ast-article-inner,
    .archive .ast-article-post .ast-article-inner:hover,
    .blog .ast-article-post .ast-article-inner:hover {
        border-top-left-radius: 6px;
        border-top-right-radius: 6px;
        border-bottom-right-radius: 6px;
        border-bottom-left-radius: 6px;
        overflow: hidden;
    }

    h1,
    .entry-content :where(h1) {
        font-size: 36px;
        font-size: 2.25rem;
        font-weight: 600;
        line-height: 1.4em;
    }

    h2,
    .entry-content :where(h2) {
        font-size: 30px;
        font-size: 1.875rem;
        font-weight: 600;
        line-height: 1.3em;
    }

    h3,
    .entry-content :where(h3) {
        font-size: 24px;
        font-size: 1.5rem;
        font-weight: 600;
        line-height: 1.3em;
    }

    h4,
    .entry-content :where(h4) {
        font-size: 20px;
        font-size: 1.25rem;
        line-height: 1.2em;
        font-weight: 600;
    }

    h5,
    .entry-content :where(h5) {
        font-size: 18px;
        font-size: 1.125rem;
        line-height: 1.2em;
        font-weight: 600;
    }

    h6,
    .entry-content :where(h6) {
        font-size: 16px;
        font-size: 1rem;
        line-height: 1.25em;
        font-weight: 600;
    }

    ::selection {
        background-color: var(--ast-global-color-0);
        color: #ffffff;
    }

    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .entry-title a,
    .entry-content :where(h1, h2, h3, h4, h5, h6) {
        color: var(--ast-global-color-3);
    }

    .tagcloud a:hover,
    .tagcloud a:focus,
    .tagcloud a.current-item {
        color: #ffffff;
        border-color: var(--ast-global-color-0);
        background-color: var(--ast-global-color-0);
    }

    input:focus,
    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="url"]:focus,
    input[type="password"]:focus,
    input[type="reset"]:focus,
    input[type="search"]:focus,
    textarea:focus {
        border-color: var(--ast-global-color-0);
    }

    input[type="radio"]:checked,
    input[type=reset],
    input[type="checkbox"]:checked,
    input[type="checkbox"]:hover:checked,
    input[type="checkbox"]:focus:checked,
    input[type=range]::-webkit-slider-thumb {
        border-color: var(--ast-global-color-0);
        background-color: var(--ast-global-color-0);
        box-shadow: none;
    }

    .site-footer a:hover+.post-count,
    .site-footer a:focus+.post-count {
        background: var(--ast-global-color-0);
        border-color: var(--ast-global-color-0);
    }

    .single .nav-links .nav-previous,
    .single .nav-links .nav-next {
        color: var(--ast-global-color-0);
    }

    .entry-meta,
    .entry-meta * {
        line-height: 1.45;
        color: var(--ast-global-color-0);
        font-weight: 600;
    }

    .entry-meta a:not(.ast-button):hover,
    .entry-meta a:not(.ast-button):hover *,
    .entry-meta a:not(.ast-button):focus,
    .entry-meta a:not(.ast-button):focus *,
    .page-links>.page-link,
    .page-links .page-link:hover,
    .post-navigation a:hover {
        color: var(--ast-global-color-1);
    }

    #cat option,
    .secondary .calendar_wrap thead a,
    .secondary .calendar_wrap thead a:visited {
        color: var(--ast-global-color-0);
    }

    .secondary .calendar_wrap #today,
    .ast-progress-val span {
        background: var(--ast-global-color-0);
    }

    .secondary a:hover+.post-count,
    .secondary a:focus+.post-count {
        background: var(--ast-global-color-0);
        border-color: var(--ast-global-color-0);
    }

    .calendar_wrap #today>a {
        color: #ffffff;
    }

    .page-links .page-link,
    .single .post-navigation a {
        color: var(--ast-global-color-3);
    }

    .ast-search-menu-icon .search-form button.search-submit {
        padding: 0 4px;
    }

    .ast-search-menu-icon form.search-form {
        padding-right: 0;
    }

    .ast-search-menu-icon.slide-search input.search-field {
        width: 0;
    }

    .ast-header-search .ast-search-menu-icon.ast-dropdown-active .search-form,
    .ast-header-search .ast-search-menu-icon.ast-dropdown-active .search-field:focus {
        transition: all 0.2s;
    }

    .search-form input.search-field:focus {
        outline: none;
    }

    .ast-search-menu-icon .search-form button.search-submit:focus,
    .ast-theme-transparent-header .ast-header-search .ast-dropdown-active .ast-icon,
    .ast-theme-transparent-header .ast-inline-search .search-field:focus .ast-icon {
        color: var(--ast-global-color-1);
    }

    .ast-header-search .slide-search .search-form {
        border: 2px solid var(--ast-global-color-0);
    }

    .ast-header-search .slide-search .search-field {
        background-color: (--ast-global-dark-bg-style);
    }

    .ast-archive-title {
        color: var(--ast-global-color-2);
    }

    .widget-title {
        font-size: 22px;
        font-size: 1.375rem;
        color: var(--ast-global-color-2);
    }

    .ast-search-menu-icon.slide-search a:focus-visible:focus-visible,
    .astra-search-icon:focus-visible,
    #close:focus-visible,
    a:focus-visible,
    .ast-menu-toggle:focus-visible,
    .site .skip-link:focus-visible,
    .wp-block-loginout input:focus-visible,
    .wp-block-search.wp-block-search__button-inside .wp-block-search__inside-wrapper,
    .ast-header-navigation-arrow:focus-visible,
    .woocommerce .wc-proceed-to-checkout>.checkout-button:focus-visible,
    .woocommerce .woocommerce-MyAccount-navigation ul li a:focus-visible,
    .ast-orders-table__row .ast-orders-table__cell:focus-visible,
    .woocommerce .woocommerce-order-details .order-again>.button:focus-visible,
    .woocommerce .woocommerce-message a.button.wc-forward:focus-visible,
    .woocommerce #minus_qty:focus-visible,
    .woocommerce #plus_qty:focus-visible,
    a#ast-apply-coupon:focus-visible,
    .woocommerce .woocommerce-info a:focus-visible,
    .woocommerce .astra-shop-summary-wrap a:focus-visible,
    .woocommerce a.wc-forward:focus-visible,
    #ast-apply-coupon:focus-visible,
    .woocommerce-js .woocommerce-mini-cart-item a.remove:focus-visible,
    #close:focus-visible,
    .button.search-submit:focus-visible,
    #search_submit:focus,
    .normal-search:focus-visible,
    .ast-header-account-wrap:focus-visible,
    .woocommerce .ast-on-card-button.ast-quick-view-trigger:focus,
    .astra-cart-drawer-close:focus,
    .ast-single-variation:focus,
    .ast-woocommerce-product-gallery__image:focus,
    .ast-button:focus,
    .woocommerce-product-gallery--with-images [data-controls="prev"]:focus-visible,
    .woocommerce-product-gallery--with-images [data-controls="next"]:focus-visible {
        outline-style: dotted;
        outline-color: inherit;
        outline-width: thin;
    }

    input:focus,
    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="url"]:focus,
    input[type="password"]:focus,
    input[type="reset"]:focus,
    input[type="search"]:focus,
    input[type="number"]:focus,
    textarea:focus,
    .wp-block-search__input:focus,
    [data-section="section-header-mobile-trigger"] .ast-button-wrap .ast-mobile-menu-trigger-minimal:focus,
    .ast-mobile-popup-drawer.active .menu-toggle-close:focus,
    .woocommerce-ordering select.orderby:focus,
    #ast-scroll-top:focus,
    #coupon_code:focus,
    .woocommerce-page #comment:focus,
    .woocommerce #reviews #respond input#submit:focus,
    .woocommerce a.add_to_cart_button:focus,
    .woocommerce .button.single_add_to_cart_button:focus,
    .woocommerce .woocommerce-cart-form button:focus,
    .woocommerce .woocommerce-cart-form__cart-item .quantity .qty:focus,
    .woocommerce .woocommerce-billing-fields .woocommerce-billing-fields__field-wrapper .woocommerce-input-wrapper>.input-text:focus,
    .woocommerce #order_comments:focus,
    .woocommerce #place_order:focus,
    .woocommerce .woocommerce-address-fields .woocommerce-address-fields__field-wrapper .woocommerce-input-wrapper>.input-text:focus,
    .woocommerce .woocommerce-MyAccount-content form button:focus,
    .woocommerce .woocommerce-MyAccount-content .woocommerce-EditAccountForm .woocommerce-form-row .woocommerce-Input.input-text:focus,
    .woocommerce .ast-woocommerce-container .woocommerce-pagination ul.page-numbers li a:focus,
    body #content .woocommerce form .form-row .select2-container--default .select2-selection--single:focus,
    #ast-coupon-code:focus,
    .woocommerce.woocommerce-js .quantity input[type=number]:focus,
    .woocommerce-js .woocommerce-mini-cart-item .quantity input[type=number]:focus,
    .woocommerce p#ast-coupon-trigger:focus {
        border-style: dotted;
        border-color: inherit;
        border-width: thin;
    }

    input {
        outline: none;
    }

    .woocommerce-js input[type=text]:focus,
    .woocommerce-js input[type=email]:focus,
    .woocommerce-js textarea:focus,
    input[type=number]:focus,
    .comments-area textarea#comment:focus,
    .comments-area textarea#comment:active,
    .comments-area .ast-comment-formwrap input[type="text"]:focus,
    .comments-area .ast-comment-formwrap input[type="text"]:active {
        outline-style: unset;
        outline-color: inherit;
        outline-width: thin;
    }

    .ast-logo-title-inline .site-logo-img {
        padding-right: 1em;
    }

    body .ast-oembed-container * {
        position: absolute;
        top: 0;
        width: 100%;
        height: 100%;
        left: 0;
    }

    body .wp-block-embed-pocket-casts .ast-oembed-container * {
        position: unset;
    }

    .ast-single-post-featured-section+article {
        margin-top: 2em;
    }

    .site-content .ast-single-post-featured-section img {
        width: 100%;
        overflow: hidden;
        object-fit: cover;
    }

    .ast-separate-container .site-content .ast-single-post-featured-section+article {
        margin-top: -80px;
        z-index: 9;
        position: relative;
        border-radius: 4px;
    }

    @media (min-width: 922px) {
        .ast-no-sidebar .site-content .ast-article-image-container--wide {
            margin-left: -120px;
            margin-right: -120px;
            max-width: unset;
            width: unset;
        }

        .ast-left-sidebar .site-content .ast-article-image-container--wide,
        .ast-right-sidebar .site-content .ast-article-image-container--wide {
            margin-left: -10px;
            margin-right: -10px;
        }

        .site-content .ast-article-image-container--full {
            margin-left: calc(-50vw + 50%);
            margin-right: calc(-50vw + 50%);
            max-width: 100vw;
            width: 100vw;
        }

        .ast-left-sidebar .site-content .ast-article-image-container--full,
        .ast-right-sidebar .site-content .ast-article-image-container--full {
            margin-left: -10px;
            margin-right: -10px;
            max-width: inherit;
            width: auto;
        }
    }

    .site>.ast-single-related-posts-container {
        margin-top: 0;
    }

    @media (min-width: 922px) {
        .ast-desktop .ast-container--narrow {
            max-width: var(--ast-narrow-container-width);
            margin: 0 auto;
        }
    }

    .ast-page-builder-template .hentry {
        margin: 0;
    }

    .ast-page-builder-template .site-content>.ast-container {
        max-width: 100%;
        padding: 0;
    }

    .ast-page-builder-template .site .site-content #primary {
        padding: 0;
        margin: 0;
    }

    .ast-page-builder-template .no-results {
        text-align: center;
        margin: 4em auto;
    }

    .ast-page-builder-template .ast-pagination {
        padding: 2em;
    }

    .ast-page-builder-template .entry-header.ast-no-title.ast-no-thumbnail {
        margin-top: 0;
    }

    .ast-page-builder-template .entry-header.ast-header-without-markup {
        margin-top: 0;
        margin-bottom: 0;
    }

    .ast-page-builder-template .entry-header.ast-no-title.ast-no-meta {
        margin-bottom: 0;
    }

    .ast-page-builder-template.single .post-navigation {
        padding-bottom: 2em;
    }

    .ast-page-builder-template.single-post .site-content>.ast-container {
        max-width: 100%;
    }

    .ast-page-builder-template .entry-header {
        margin-top: 2em;
        margin-left: auto;
        margin-right: auto;
    }

    .ast-page-builder-template .ast-archive-description {
        margin: 2em auto 0;
        padding-left: 20px;
        padding-right: 20px;
    }

    .ast-page-builder-template .ast-row {
        margin-left: 0;
        margin-right: 0;
    }

    .single.ast-page-builder-template .entry-header+.entry-content,
    .single.ast-page-builder-template .ast-single-entry-banner+.site-content article .entry-content {
        margin-bottom: 2em;
    }

    @media(min-width: 921px) {

        .ast-page-builder-template.archive.ast-right-sidebar .ast-row article,
        .ast-page-builder-template.archive.ast-left-sidebar .ast-row article {
            padding-left: 0;
            padding-right: 0;
        }
    }

    input[type="text"],
    input[type="number"],
    input[type="email"],
    input[type="url"],
    input[type="password"],
    input[type="search"],
    input[type=reset],
    input[type=tel],
    input[type=date],
    select,
    textarea {
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 24px;
        width: 100%;
        padding: 12px 16px;
        border-radius: 4px;
        box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.05);
        color: var(--ast-form-input-text, #475569);
    }

    input[type="text"],
    input[type="number"],
    input[type="email"],
    input[type="url"],
    input[type="password"],
    input[type="search"],
    input[type=reset],
    input[type=tel],
    input[type=date],
    select {
        height: 40px;
    }

    input[type="date"] {
        border-width: 1px;
        border-style: solid;
        border-color: var(--ast-border-color);
        background: var(--ast-global-color-secondary, --ast-global-color-5);
    }

    input[type="text"]:focus,
    input[type="number"]:focus,
    input[type="email"]:focus,
    input[type="url"]:focus,
    input[type="password"]:focus,
    input[type="search"]:focus,
    input[type=reset]:focus,
    input[type="tel"]:focus,
    input[type="date"]:focus,
    select:focus,
    textarea:focus {
        border-color: #046BD2;
        box-shadow: none;
        outline: none;
        color: var(--ast-form-input-focus-text, #475569);
    }

    label,
    legend {
        color: #111827;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        line-height: 20px;
    }

    select {
        padding: 6px 10px;
    }

    fieldset {
        padding: 30px;
        border-radius: 4px;
    }

    button,
    .ast-button,
    .button,
    input[type="button"],
    input[type="reset"],
    input[type="submit"],
    a:where(.wp-block-button__link) {
        border-radius: 4px;
        box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.05);
    }

    :root {
        --ast-comment-inputs-background: #FFF;
    }

    ::placeholder {
        color: var(--ast-form-field-color, #9CA3AF);
    }

    ::-ms-input-placeholder {
        color: var(--ast-form-field-color, #9CA3AF);
    }

    @media (max-width:921.9px) {
        #ast-desktop-header {
            display: none;
        }
    }

    @media (min-width:922px) {
        #ast-mobile-header {
            display: none;
        }
    }

    .wp-block-buttons.aligncenter {
        justify-content: center;
    }

    @media (max-width:921px) {

        .ast-theme-transparent-header #primary,
        .ast-theme-transparent-header #secondary {
            padding: 0;
        }
    }

    @media (max-width:921px) {
        .ast-plain-container.ast-no-sidebar #primary {
            padding: 0;
        }
    }

    .ast-plain-container.ast-no-sidebar #primary {
        margin-top: 0;
        margin-bottom: 0;
    }

    .wp-block-button.is-style-outline .wp-block-button__link {
        border-color: var(--ast-global-color-0);
    }

    div.wp-block-button.is-style-outline>.wp-block-button__link:not(.has-text-color),
    div.wp-block-button.wp-block-button__link.is-style-outline:not(.has-text-color) {
        color: var(--ast-global-color-0);
    }

    .wp-block-button.is-style-outline .wp-block-button__link:hover,
    .wp-block-buttons .wp-block-button.is-style-outline .wp-block-button__link:focus,
    .wp-block-buttons .wp-block-button.is-style-outline>.wp-block-button__link:not(.has-text-color):hover,
    .wp-block-buttons .wp-block-button.wp-block-button__link.is-style-outline:not(.has-text-color):hover {
        color: #ffffff;
        background-color: var(--ast-global-color-1);
        border-color: var(--ast-global-color-1);
    }

    .post-page-numbers.current .page-link,
    .ast-pagination .page-numbers.current {
        color: #ffffff;
        border-color: var(--ast-global-color-0);
        background-color: var(--ast-global-color-0);
    }

    .wp-block-buttons .wp-block-button.is-style-outline .wp-block-button__link.wp-element-button,
    .ast-outline-button,
    .wp-block-uagb-buttons-child .uagb-buttons-repeater.ast-outline-button {
        border-color: var(--ast-global-color-0);
        border-top-width: 2px;
        border-right-width: 2px;
        border-bottom-width: 2px;
        border-left-width: 2px;
        font-family: inherit;
        font-weight: 500;
        font-size: 16px;
        font-size: 1rem;
        line-height: 1em;
        padding-top: 13px;
        padding-right: 30px;
        padding-bottom: 13px;
        padding-left: 30px;
    }

    .wp-block-buttons .wp-block-button.is-style-outline>.wp-block-button__link:not(.has-text-color),
    .wp-block-buttons .wp-block-button.wp-block-button__link.is-style-outline:not(.has-text-color),
    .ast-outline-button {
        color: var(--ast-global-color-0);
    }

    .wp-block-button.is-style-outline .wp-block-button__link:hover,
    .wp-block-buttons .wp-block-button.is-style-outline .wp-block-button__link:focus,
    .wp-block-buttons .wp-block-button.is-style-outline>.wp-block-button__link:not(.has-text-color):hover,
    .wp-block-buttons .wp-block-button.wp-block-button__link.is-style-outline:not(.has-text-color):hover,
    .ast-outline-button:hover,
    .ast-outline-button:focus,
    .wp-block-uagb-buttons-child .uagb-buttons-repeater.ast-outline-button:hover,
    .wp-block-uagb-buttons-child .uagb-buttons-repeater.ast-outline-button:focus {
        color: #ffffff;
        background-color: var(--ast-global-color-1);
        border-color: var(--ast-global-color-1);
    }

    .wp-block-button .wp-block-button__link.wp-element-button.is-style-outline:not(.has-background),
    .wp-block-button.is-style-outline>.wp-block-button__link.wp-element-button:not(.has-background),
    .ast-outline-button {
        background-color: transparent;
    }

    .uagb-buttons-repeater.ast-outline-button {
        border-radius: 9999px;
    }

    @media (max-width:921px) {

        .wp-block-buttons .wp-block-button.is-style-outline .wp-block-button__link.wp-element-button,
        .ast-outline-button,
        .wp-block-uagb-buttons-child .uagb-buttons-repeater.ast-outline-button {
            padding-top: 12px;
            padding-right: 28px;
            padding-bottom: 12px;
            padding-left: 28px;
        }
    }

    @media (max-width:544px) {

        .wp-block-buttons .wp-block-button.is-style-outline .wp-block-button__link.wp-element-button,
        .ast-outline-button,
        .wp-block-uagb-buttons-child .uagb-buttons-repeater.ast-outline-button {
            padding-top: 10px;
            padding-right: 24px;
            padding-bottom: 10px;
            padding-left: 24px;
        }
    }

    .entry-content[data-ast-blocks-layout]>figure {
        margin-bottom: 1em;
    }

    h1.widget-title {
        font-weight: 600;
    }

    h2.widget-title {
        font-weight: 600;
    }

    h3.widget-title {
        font-weight: 600;
    }

    .review-rating {
        display: flex;
        align-items: center;
        order: 2;
    }

    #page {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .ast-404-layout-1 h1.page-title {
        color: var(--ast-global-color-2);
    }

    .single .post-navigation a {
        line-height: 1em;
        height: inherit;
    }

    .error-404 .page-sub-title {
        font-size: 1.5rem;
        font-weight: inherit;
    }

    .search .site-content .content-area .search-form {
        margin-bottom: 0;
    }

    #page .site-content {
        flex-grow: 1;
    }

    .widget {
        margin-bottom: 1.25em;
    }

    #secondary li {
        line-height: 1.5em;
    }

    #secondary .wp-block-group h2 {
        margin-bottom: 0.7em;
    }

    #secondary h2 {
        font-size: 1.7rem;
    }

    .ast-separate-container .ast-article-post,
    .ast-separate-container .ast-article-single,
    .ast-separate-container .comment-respond {
        padding: 3em;
    }

    .ast-separate-container .ast-article-single .ast-article-single {
        padding: 0;
    }

    .ast-article-single .wp-block-post-template-is-layout-grid {
        padding-left: 0;
    }

    .ast-separate-container .comments-title,
    .ast-narrow-container .comments-title {
        padding: 1.5em 2em;
    }

    .ast-page-builder-template .comment-form-textarea,
    .ast-comment-formwrap .ast-grid-common-col {
        padding: 0;
    }

    .ast-comment-formwrap {
        padding: 0;
        display: inline-flex;
        column-gap: 20px;
        width: 100%;
        margin-left: 0;
        margin-right: 0;
    }

    .comments-area textarea#comment:focus,
    .comments-area textarea#comment:active,
    .comments-area .ast-comment-formwrap input[type="text"]:focus,
    .comments-area .ast-comment-formwrap input[type="text"]:active {
        box-shadow: none;
        outline: none;
    }

    .archive.ast-page-builder-template .entry-header {
        margin-top: 2em;
    }

    .ast-page-builder-template .ast-comment-formwrap {
        width: 100%;
    }

    .entry-title {
        margin-bottom: 0.6em;
    }

    .ast-archive-description p {
        font-size: inherit;
        font-weight: inherit;
        line-height: inherit;
    }

    .ast-separate-container .ast-comment-list li.depth-1,
    .hentry {
        margin-bottom: 1.5em;
    }

    .site-content section.ast-archive-description {
        margin-bottom: 2em;
    }

    @media (min-width:921px) {

        .ast-left-sidebar.ast-page-builder-template #secondary,
        .archive.ast-right-sidebar.ast-page-builder-template .site-main {
            padding-left: 20px;
            padding-right: 20px;
        }
    }

    @media (max-width:544px) {
        .ast-comment-formwrap.ast-row {
            column-gap: 10px;
            display: inline-block;
        }

        #ast-commentform .ast-grid-common-col {
            position: relative;
            width: 100%;
        }
    }

    @media (min-width:1201px) {

        .ast-separate-container .ast-article-post,
        .ast-separate-container .ast-article-single,
        .ast-separate-container .ast-author-box,
        .ast-separate-container .ast-404-layout-1,
        .ast-separate-container .no-results {
            padding: 3em;
        }
    }

    @media (max-width:921px) {

        .ast-separate-container #primary,
        .ast-separate-container #secondary {
            padding: 1.5em 0;
        }

        #primary,
        #secondary {
            padding: 1.5em 0;
            margin: 0;
        }

        .ast-left-sidebar #content>.ast-container {
            display: flex;
            flex-direction: column-reverse;
            width: 100%;
        }
    }

    @media (min-width:922px) {

        .ast-separate-container.ast-right-sidebar #primary,
        .ast-separate-container.ast-left-sidebar #primary {
            border: 0;
        }

        .search-no-results.ast-separate-container #primary {
            margin-bottom: 4em;
        }
    }

    .wp-block-button .wp-block-button__link {
        color: #ffffff;
    }

    .wp-block-button .wp-block-button__link:hover,
    .wp-block-button .wp-block-button__link:focus {
        color: #ffffff;
        background-color: var(--ast-global-color-1);
        border-color: var(--ast-global-color-1);
    }

    .elementor-widget-heading h1.elementor-heading-title {
        line-height: 1.4em;
    }

    .elementor-widget-heading h2.elementor-heading-title {
        line-height: 1.3em;
    }

    .elementor-widget-heading h3.elementor-heading-title {
        line-height: 1.3em;
    }

    .elementor-widget-heading h4.elementor-heading-title {
        line-height: 1.2em;
    }

    .elementor-widget-heading h5.elementor-heading-title {
        line-height: 1.2em;
    }

    .elementor-widget-heading h6.elementor-heading-title {
        line-height: 1.25em;
    }

    .wp-block-button .wp-block-button__link,
    .wp-block-search .wp-block-search__button,
    body .wp-block-file .wp-block-file__button {
        border-color: var(--ast-global-color-0);
        background-color: var(--ast-global-color-0);
        color: #ffffff;
        font-family: inherit;
        font-weight: 500;
        line-height: 1em;
        font-size: 16px;
        font-size: 1rem;
        padding-top: 15px;
        padding-right: 30px;
        padding-bottom: 15px;
        padding-left: 30px;
    }

    @media (max-width:921px) {

        .wp-block-button .wp-block-button__link,
        .wp-block-search .wp-block-search__button,
        body .wp-block-file .wp-block-file__button {
            padding-top: 14px;
            padding-right: 28px;
            padding-bottom: 14px;
            padding-left: 28px;
        }
    }

    @media (max-width:544px) {

        .wp-block-button .wp-block-button__link,
        .wp-block-search .wp-block-search__button,
        body .wp-block-file .wp-block-file__button {
            padding-top: 12px;
            padding-right: 24px;
            padding-bottom: 12px;
            padding-left: 24px;
        }
    }

    .menu-toggle,
    button,
    .ast-button,
    .ast-custom-button,
    .button,
    input#submit,
    input[type="button"],
    input[type="submit"],
    input[type="reset"],
    #comments .submit,
    .search .search-submit,
    form[CLASS*="wp-block-search__"].wp-block-search .wp-block-search__inside-wrapper .wp-block-search__button,
    body .wp-block-file .wp-block-file__button,
    .search .search-submit,
    .woocommerce-js a.button,
    .woocommerce button.button,
    .woocommerce .woocommerce-message a.button,
    .woocommerce #respond input#submit.alt,
    .woocommerce input.button.alt,
    .woocommerce input.button,
    .woocommerce input.button:disabled,
    .woocommerce input.button:disabled[disabled],
    .woocommerce input.button:disabled:hover,
    .woocommerce input.button:disabled[disabled]:hover,
    .woocommerce #respond input#submit,
    .woocommerce button.button.alt.disabled,
    .wc-block-grid__products .wc-block-grid__product .wp-block-button__link,
    .wc-block-grid__product-onsale,
    [CLASS*="wc-block"] button,
    .woocommerce-js .astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__buttons .button:not(.checkout):not(.ast-continue-shopping),
    .woocommerce-js .astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__buttons a.checkout,
    .woocommerce button.button.alt.disabled.wc-variation-selection-needed,
    [CLASS*="wc-block"] .wc-block-components-button {
        border-style: solid;
        border-top-width: 0;
        border-right-width: 0;
        border-left-width: 0;
        border-bottom-width: 0;
        color: #ffffff;
        border-color: var(--ast-global-color-0);
        background-color: var(--ast-global-color-0);
        padding-top: 15px;
        padding-right: 30px;
        padding-bottom: 15px;
        padding-left: 30px;
        font-family: inherit;
        font-weight: 500;
        font-size: 16px;
        font-size: 1rem;
        line-height: 1em;
    }

    button:focus,
    .menu-toggle:hover,
    button:hover,
    .ast-button:hover,
    .ast-custom-button:hover .button:hover,
    .ast-custom-button:hover,
    input[type=reset]:hover,
    input[type=reset]:focus,
    input#submit:hover,
    input#submit:focus,
    input[type="button"]:hover,
    input[type="button"]:focus,
    input[type="submit"]:hover,
    input[type="submit"]:focus,
    form[CLASS*="wp-block-search__"].wp-block-search .wp-block-search__inside-wrapper .wp-block-search__button:hover,
    form[CLASS*="wp-block-search__"].wp-block-search .wp-block-search__inside-wrapper .wp-block-search__button:focus,
    body .wp-block-file .wp-block-file__button:hover,
    body .wp-block-file .wp-block-file__button:focus,
    .woocommerce-js a.button:hover,
    .woocommerce button.button:hover,
    .woocommerce .woocommerce-message a.button:hover,
    .woocommerce #respond input#submit:hover,
    .woocommerce #respond input#submit.alt:hover,
    .woocommerce input.button.alt:hover,
    .woocommerce input.button:hover,
    .woocommerce button.button.alt.disabled:hover,
    .wc-block-grid__products .wc-block-grid__product .wp-block-button__link:hover,
    [CLASS*="wc-block"] button:hover,
    .woocommerce-js .astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__buttons .button:not(.checkout):not(.ast-continue-shopping):hover,
    .woocommerce-js .astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__buttons a.checkout:hover,
    .woocommerce button.button.alt.disabled.wc-variation-selection-needed:hover,
    [CLASS*="wc-block"] .wc-block-components-button:hover,
    [CLASS*="wc-block"] .wc-block-components-button:focus {
        color: #ffffff;
        background-color: var(--ast-global-color-1);
        border-color: var(--ast-global-color-1);
    }

    form[CLASS*="wp-block-search__"].wp-block-search .wp-block-search__inside-wrapper .wp-block-search__button.has-icon {
        padding-top: calc(15px - 3px);
        padding-right: calc(30px - 3px);
        padding-bottom: calc(15px - 3px);
        padding-left: calc(30px - 3px);
    }

    @media (max-width:921px) {

        .menu-toggle,
        button,
        .ast-button,
        .ast-custom-button,
        .button,
        input#submit,
        input[type="button"],
        input[type="submit"],
        input[type="reset"],
        #comments .submit,
        .search .search-submit,
        form[CLASS*="wp-block-search__"].wp-block-search .wp-block-search__inside-wrapper .wp-block-search__button,
        body .wp-block-file .wp-block-file__button,
        .search .search-submit,
        .woocommerce-js a.button,
        .woocommerce button.button,
        .woocommerce .woocommerce-message a.button,
        .woocommerce #respond input#submit.alt,
        .woocommerce input.button.alt,
        .woocommerce input.button,
        .woocommerce input.button:disabled,
        .woocommerce input.button:disabled[disabled],
        .woocommerce input.button:disabled:hover,
        .woocommerce input.button:disabled[disabled]:hover,
        .woocommerce #respond input#submit,
        .woocommerce button.button.alt.disabled,
        .wc-block-grid__products .wc-block-grid__product .wp-block-button__link,
        .wc-block-grid__product-onsale,
        [CLASS*="wc-block"] button,
        .woocommerce-js .astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__buttons .button:not(.checkout):not(.ast-continue-shopping),
        .woocommerce-js .astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__buttons a.checkout,
        .woocommerce button.button.alt.disabled.wc-variation-selection-needed,
        [CLASS*="wc-block"] .wc-block-components-button {
            padding-top: 14px;
            padding-right: 28px;
            padding-bottom: 14px;
            padding-left: 28px;
        }
    }

    @media (max-width:544px) {

        .menu-toggle,
        button,
        .ast-button,
        .ast-custom-button,
        .button,
        input#submit,
        input[type="button"],
        input[type="submit"],
        input[type="reset"],
        #comments .submit,
        .search .search-submit,
        form[CLASS*="wp-block-search__"].wp-block-search .wp-block-search__inside-wrapper .wp-block-search__button,
        body .wp-block-file .wp-block-file__button,
        .search .search-submit,
        .woocommerce-js a.button,
        .woocommerce button.button,
        .woocommerce .woocommerce-message a.button,
        .woocommerce #respond input#submit.alt,
        .woocommerce input.button.alt,
        .woocommerce input.button,
        .woocommerce input.button:disabled,
        .woocommerce input.button:disabled[disabled],
        .woocommerce input.button:disabled:hover,
        .woocommerce input.button:disabled[disabled]:hover,
        .woocommerce #respond input#submit,
        .woocommerce button.button.alt.disabled,
        .wc-block-grid__products .wc-block-grid__product .wp-block-button__link,
        .wc-block-grid__product-onsale,
        [CLASS*="wc-block"] button,
        .woocommerce-js .astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__buttons .button:not(.checkout):not(.ast-continue-shopping),
        .woocommerce-js .astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__buttons a.checkout,
        .woocommerce button.button.alt.disabled.wc-variation-selection-needed,
        [CLASS*="wc-block"] .wc-block-components-button {
            padding-top: 12px;
            padding-right: 24px;
            padding-bottom: 12px;
            padding-left: 24px;
        }
    }

    @media (max-width:921px) {
        .ast-mobile-header-stack .main-header-bar .ast-search-menu-icon {
            display: inline-block;
        }

        .ast-header-break-point.ast-header-custom-item-outside .ast-mobile-header-stack .main-header-bar .ast-search-icon {
            margin: 0;
        }

        .ast-comment-avatar-wrap img {
            max-width: 2.5em;
        }

        .ast-comment-meta {
            padding: 0 1.8888em 1.3333em;
        }
    }

    @media (min-width:544px) {
        .ast-container {
            max-width: 100%;
        }
    }

    @media (max-width:544px) {

        .ast-separate-container .ast-article-post,
        .ast-separate-container .ast-article-single,
        .ast-separate-container .comments-title,
        .ast-separate-container .ast-archive-description {
            padding: 1.5em 1em;
        }

        .ast-separate-container #content .ast-container {
            padding-left: 0.54em;
            padding-right: 0.54em;
        }

        .ast-separate-container .ast-comment-list .bypostauthor {
            padding: .5em;
        }

        .ast-search-menu-icon.ast-dropdown-active .search-field {
            width: 170px;
        }
    }

    #ast-mobile-header .ast-site-header-cart-li a {
        pointer-events: none;
    }

    .ast-separate-container {
        background-color: var(--ast-global-color-5);
    }

    @media (max-width:921px) {
        .site-title {
            display: block;
        }

        .site-header .site-description {
            display: none;
        }

        h1,
        .entry-content :where(h1) {
            font-size: 30px;
            font-size: 1.875rem;
        }

        h2,
        .entry-content :where(h2) {
            font-size: 25px;
            font-size: 1.5625rem;
        }

        h3,
        .entry-content :where(h3) {
            font-size: 20px;
            font-size: 1.25rem;
        }
    }

    @media (max-width:544px) {
        .site-title {
            display: block;
        }

        .site-header .site-description {
            display: none;
        }

        h1,
        .entry-content :where(h1) {
            font-size: 30px;
            font-size: 1.875rem;
        }

        h2,
        .entry-content :where(h2) {
            font-size: 25px;
            font-size: 1.5625rem;
        }

        h3,
        .entry-content :where(h3) {
            font-size: 20px;
            font-size: 1.25rem;
        }
    }

    @media (max-width:921px) {
        html {
            font-size: 91.2%;
        }
    }

    @media (max-width:544px) {
        html {
            font-size: 91.2%;
        }
    }

    @media (min-width:922px) {
        .ast-container {
            max-width: 1240px;
        }
    }

    @media (min-width:922px) {
        .site-content .ast-container {
            display: flex;
        }
    }

    @media (max-width:921px) {
        .site-content .ast-container {
            flex-direction: column;
        }
    }

    .entry-content :where(h1, h2, h3, h4, h5, h6) {
        clear: none;
    }

    @media (min-width:922px) {

        .main-header-menu .sub-menu .menu-item.ast-left-align-sub-menu:hover>.sub-menu,
        .main-header-menu .sub-menu .menu-item.ast-left-align-sub-menu.focus>.sub-menu {
            margin-left: -0px;
        }
    }

    .entry-content li>p {
        margin-bottom: 0;
    }

    .site .comments-area {
        padding-bottom: 2em;
        margin-top: 2em;
    }

    .wp-block-file {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .wp-block-pullquote {
        border: none;
    }

    .wp-block-pullquote blockquote::before {
        content: "\201D";
        font-family: "Helvetica", sans-serif;
        display: flex;
        transform: rotate(180deg);
        font-size: 6rem;
        font-style: normal;
        line-height: 1;
        font-weight: bold;
        align-items: center;
        justify-content: center;
    }

    .has-text-align-right>blockquote::before {
        justify-content: flex-start;
    }

    .has-text-align-left>blockquote::before {
        justify-content: flex-end;
    }

    figure.wp-block-pullquote.is-style-solid-color blockquote {
        max-width: 100%;
        text-align: inherit;
    }

    :root {
        --wp--custom--ast-default-block-top-padding: 3em;
        --wp--custom--ast-default-block-right-padding: 3em;
        --wp--custom--ast-default-block-bottom-padding: 3em;
        --wp--custom--ast-default-block-left-padding: 3em;
        --wp--custom--ast-container-width: 1200px;
        --wp--custom--ast-content-width-size: 1200px;
        --wp--custom--ast-wide-width-size: calc(1200px + var(--wp--custom--ast-default-block-left-padding) + var(--wp--custom--ast-default-block-right-padding));
    }

    .ast-narrow-container {
        --wp--custom--ast-content-width-size: 750px;
        --wp--custom--ast-wide-width-size: 750px;
    }

    @media(max-width: 921px) {
        :root {
            --wp--custom--ast-default-block-top-padding: 3em;
            --wp--custom--ast-default-block-right-padding: 2em;
            --wp--custom--ast-default-block-bottom-padding: 3em;
            --wp--custom--ast-default-block-left-padding: 2em;
        }
    }

    @media(max-width: 544px) {
        :root {
            --wp--custom--ast-default-block-top-padding: 3em;
            --wp--custom--ast-default-block-right-padding: 1.5em;
            --wp--custom--ast-default-block-bottom-padding: 3em;
            --wp--custom--ast-default-block-left-padding: 1.5em;
        }
    }

    .entry-content>.wp-block-group,
    .entry-content>.wp-block-cover,
    .entry-content>.wp-block-columns {
        padding-top: var(--wp--custom--ast-default-block-top-padding);
        padding-right: var(--wp--custom--ast-default-block-right-padding);
        padding-bottom: var(--wp--custom--ast-default-block-bottom-padding);
        padding-left: var(--wp--custom--ast-default-block-left-padding);
    }

    .ast-plain-container.ast-no-sidebar .entry-content>.alignfull,
    .ast-page-builder-template .ast-no-sidebar .entry-content>.alignfull {
        margin-left: calc(-50vw + 50%);
        margin-right: calc(-50vw + 50%);
        max-width: 100vw;
        width: 100vw;
    }

    .ast-plain-container.ast-no-sidebar .entry-content .alignfull .alignfull,
    .ast-page-builder-template.ast-no-sidebar .entry-content .alignfull .alignfull,
    .ast-plain-container.ast-no-sidebar .entry-content .alignfull .alignwide,
    .ast-page-builder-template.ast-no-sidebar .entry-content .alignfull .alignwide,
    .ast-plain-container.ast-no-sidebar .entry-content .alignwide .alignfull,
    .ast-page-builder-template.ast-no-sidebar .entry-content .alignwide .alignfull,
    .ast-plain-container.ast-no-sidebar .entry-content .alignwide .alignwide,
    .ast-page-builder-template.ast-no-sidebar .entry-content .alignwide .alignwide,
    .ast-plain-container.ast-no-sidebar .entry-content .wp-block-column .alignfull,
    .ast-page-builder-template.ast-no-sidebar .entry-content .wp-block-column .alignfull,
    .ast-plain-container.ast-no-sidebar .entry-content .wp-block-column .alignwide,
    .ast-page-builder-template.ast-no-sidebar .entry-content .wp-block-column .alignwide {
        margin-left: auto;
        margin-right: auto;
        width: 100%;
    }

    [data-ast-blocks-layout] .wp-block-separator:not(.is-style-dots) {
        height: 0;
    }

    [data-ast-blocks-layout] .wp-block-separator {
        margin: 20px auto;
    }

    [data-ast-blocks-layout] .wp-block-separator:not(.is-style-wide):not(.is-style-dots) {
        max-width: 100px;
    }

    [data-ast-blocks-layout] .wp-block-separator.has-background {
        padding: 0;
    }

    .entry-content[data-ast-blocks-layout]>* {
        max-width: var(--wp--custom--ast-content-width-size);
        margin-left: auto;
        margin-right: auto;
    }

    .entry-content[data-ast-blocks-layout]>.alignwide {
        max-width: var(--wp--custom--ast-wide-width-size);
    }

    .entry-content[data-ast-blocks-layout] .alignfull {
        max-width: none;
    }

    .entry-content .wp-block-columns {
        margin-bottom: 0;
    }

    blockquote {
        margin: 1.5em;
        border-color: rgba(0, 0, 0, 0.05);
    }

    .wp-block-quote:not(.has-text-align-right):not(.has-text-align-center) {
        border-left: 5px solid rgba(0, 0, 0, 0.05);
    }

    .has-text-align-right>blockquote,
    blockquote.has-text-align-right {
        border-right: 5px solid rgba(0, 0, 0, 0.05);
    }

    .has-text-align-left>blockquote,
    blockquote.has-text-align-left {
        border-left: 5px solid rgba(0, 0, 0, 0.05);
    }

    .wp-block-site-tagline,
    .wp-block-latest-posts .read-more {
        margin-top: 15px;
    }

    .wp-block-loginout p label {
        display: block;
    }

    .wp-block-loginout p:not(.login-remember):not(.login-submit) input {
        width: 100%;
    }

    .wp-block-loginout input:focus {
        border-color: transparent;
    }

    .wp-block-loginout input:focus {
        outline: thin dotted;
    }

    .entry-content .wp-block-media-text .wp-block-media-text__content {
        padding: 0 0 0 8%;
    }

    .entry-content .wp-block-media-text.has-media-on-the-right .wp-block-media-text__content {
        padding: 0 8% 0 0;
    }

    .entry-content .wp-block-media-text.has-background .wp-block-media-text__content {
        padding: 8%;
    }

    .entry-content .wp-block-cover:not([class*="background-color"]):not(.has-text-color.has-link-color) .wp-block-cover__inner-container,
    .entry-content .wp-block-cover:not([class*="background-color"]) .wp-block-cover-image-text,
    .entry-content .wp-block-cover:not([class*="background-color"]) .wp-block-cover-text,
    .entry-content .wp-block-cover-image:not([class*="background-color"]) .wp-block-cover__inner-container,
    .entry-content .wp-block-cover-image:not([class*="background-color"]) .wp-block-cover-image-text,
    .entry-content .wp-block-cover-image:not([class*="background-color"]) .wp-block-cover-text {
        color: var(--ast-global-color-primary, var(--ast-global-color-5));
    }

    .wp-block-loginout .login-remember input {
        width: 1.1rem;
        height: 1.1rem;
        margin: 0 5px 4px 0;
        vertical-align: middle;
    }

    .wp-block-latest-posts>li>*:first-child,
    .wp-block-latest-posts:not(.is-grid)>li:first-child {
        margin-top: 0;
    }

    .entry-content>.wp-block-buttons,
    .entry-content>.wp-block-uagb-buttons {
        margin-bottom: 1.5em;
    }

    .wp-block-search__inside-wrapper .wp-block-search__input {
        padding: 0 10px;
        color: var(--ast-global-color-3);
        background: var(--ast-global-color-primary, var(--ast-global-color-5));
        border-color: var(--ast-border-color);
    }

    .wp-block-latest-posts .read-more {
        margin-bottom: 1.5em;
    }

    .wp-block-search__no-button .wp-block-search__inside-wrapper .wp-block-search__input {
        padding-top: 5px;
        padding-bottom: 5px;
    }

    .wp-block-latest-posts .wp-block-latest-posts__post-date,
    .wp-block-latest-posts .wp-block-latest-posts__post-author {
        font-size: 1rem;
    }

    .wp-block-latest-posts>li>*,
    .wp-block-latest-posts:not(.is-grid)>li {
        margin-top: 12px;
        margin-bottom: 12px;
    }

    .ast-page-builder-template .entry-content[data-ast-blocks-layout]>*,
    .ast-page-builder-template .entry-content[data-ast-blocks-layout]>.alignfull:not(.wp-block-group):not(.uagb-is-root-container)>* {
        max-width: none;
    }

    .ast-page-builder-template .entry-content[data-ast-blocks-layout]>.alignwide:not(.uagb-is-root-container)>* {
        max-width: var(--wp--custom--ast-wide-width-size);
    }

    .ast-page-builder-template .entry-content[data-ast-blocks-layout]>.inherit-container-width>*,
    .ast-page-builder-template .entry-content[data-ast-blocks-layout]>*:not(.wp-block-group):not(.uagb-is-root-container)>*,
    .entry-content[data-ast-blocks-layout]>.wp-block-cover .wp-block-cover__inner-container {
        max-width: none;
        margin-left: auto;
        margin-right: auto;
    }

    .entry-content[data-ast-blocks-layout] .wp-block-cover:not(.alignleft):not(.alignright) {
        width: auto;
    }

    @media(max-width: 1200px) {

        .ast-separate-container .entry-content>.alignfull,
        .ast-separate-container .entry-content[data-ast-blocks-layout]>.alignwide,
        .ast-plain-container .entry-content[data-ast-blocks-layout]>.alignwide,
        .ast-plain-container .entry-content .alignfull {
            margin-left: calc(-1 * min(var(--ast-container-default-xlg-padding), 20px));
            margin-right: calc(-1 * min(var(--ast-container-default-xlg-padding), 20px));
        }
    }

    @media(min-width: 1201px) {
        .ast-separate-container .entry-content>.alignfull {
            margin-left: calc(-1 * var(--ast-container-default-xlg-padding));
            margin-right: calc(-1 * var(--ast-container-default-xlg-padding));
        }

        .ast-separate-container .entry-content[data-ast-blocks-layout]>.alignwide,
        .ast-plain-container .entry-content[data-ast-blocks-layout]>.alignwide {
            margin-left: auto;
            margin-right: auto;
        }
    }

    @media(min-width: 921px) {

        .ast-separate-container .entry-content .wp-block-group.alignwide:not(.inherit-container-width)> :where(:not(.alignleft):not(.alignright)),
        .ast-plain-container .entry-content .wp-block-group.alignwide:not(.inherit-container-width)> :where(:not(.alignleft):not(.alignright)) {
            max-width: calc(var(--wp--custom--ast-content-width-size) + 80px);
        }

        .ast-plain-container.ast-right-sidebar .entry-content[data-ast-blocks-layout] .alignfull,
        .ast-plain-container.ast-left-sidebar .entry-content[data-ast-blocks-layout] .alignfull {
            margin-left: -60px;
            margin-right: -60px;
        }
    }

    @media(min-width: 544px) {
        .entry-content>.alignleft {
            margin-right: 20px;
        }

        .entry-content>.alignright {
            margin-left: 20px;
        }
    }

    @media (max-width:544px) {
        .wp-block-columns .wp-block-column:not(:last-child) {
            margin-bottom: 20px;
        }

        .wp-block-latest-posts {
            margin: 0;
        }
    }

    @media(max-width: 600px) {

        .entry-content .wp-block-media-text .wp-block-media-text__content,
        .entry-content .wp-block-media-text.has-media-on-the-right .wp-block-media-text__content {
            padding: 8% 0 0;
        }

        .entry-content .wp-block-media-text.has-background .wp-block-media-text__content {
            padding: 8%;
        }
    }

    .ast-page-builder-template .entry-header {
        padding-left: 0;
    }

    .ast-narrow-container .site-content .wp-block-uagb-image--align-full .wp-block-uagb-image__figure {
        max-width: 100%;
        margin-left: auto;
        margin-right: auto;
    }

    .entry-content ul,
    .entry-content ol {
        padding: revert;
        margin: revert;
        padding-left: 20px;
    }

    :root .has-ast-global-color-0-color {
        color: var(--ast-global-color-0);
    }

    :root .has-ast-global-color-0-background-color {
        background-color: var(--ast-global-color-0);
    }

    :root .wp-block-button .has-ast-global-color-0-color {
        color: var(--ast-global-color-0);
    }

    :root .wp-block-button .has-ast-global-color-0-background-color {
        background-color: var(--ast-global-color-0);
    }

    :root .has-ast-global-color-1-color {
        color: var(--ast-global-color-1);
    }

    :root .has-ast-global-color-1-background-color {
        background-color: var(--ast-global-color-1);
    }

    :root .wp-block-button .has-ast-global-color-1-color {
        color: var(--ast-global-color-1);
    }

    :root .wp-block-button .has-ast-global-color-1-background-color {
        background-color: var(--ast-global-color-1);
    }

    :root .has-ast-global-color-2-color {
        color: var(--ast-global-color-2);
    }

    :root .has-ast-global-color-2-background-color {
        background-color: var(--ast-global-color-2);
    }

    :root .wp-block-button .has-ast-global-color-2-color {
        color: var(--ast-global-color-2);
    }

    :root .wp-block-button .has-ast-global-color-2-background-color {
        background-color: var(--ast-global-color-2);
    }

    :root .has-ast-global-color-3-color {
        color: var(--ast-global-color-3);
    }

    :root .has-ast-global-color-3-background-color {
        background-color: var(--ast-global-color-3);
    }

    :root .wp-block-button .has-ast-global-color-3-color {
        color: var(--ast-global-color-3);
    }

    :root .wp-block-button .has-ast-global-color-3-background-color {
        background-color: var(--ast-global-color-3);
    }

    :root .has-ast-global-color-4-color {
        color: var(--ast-global-color-4);
    }

    :root .has-ast-global-color-4-background-color {
        background-color: var(--ast-global-color-4);
    }

    :root .wp-block-button .has-ast-global-color-4-color {
        color: var(--ast-global-color-4);
    }

    :root .wp-block-button .has-ast-global-color-4-background-color {
        background-color: var(--ast-global-color-4);
    }

    :root .has-ast-global-color-5-color {
        color: var(--ast-global-color-5);
    }

    :root .has-ast-global-color-5-background-color {
        background-color: var(--ast-global-color-5);
    }

    :root .wp-block-button .has-ast-global-color-5-color {
        color: var(--ast-global-color-5);
    }

    :root .wp-block-button .has-ast-global-color-5-background-color {
        background-color: var(--ast-global-color-5);
    }

    :root .has-ast-global-color-6-color {
        color: var(--ast-global-color-6);
    }

    :root .has-ast-global-color-6-background-color {
        background-color: var(--ast-global-color-6);
    }

    :root .wp-block-button .has-ast-global-color-6-color {
        color: var(--ast-global-color-6);
    }

    :root .wp-block-button .has-ast-global-color-6-background-color {
        background-color: var(--ast-global-color-6);
    }

    :root .has-ast-global-color-7-color {
        color: var(--ast-global-color-7);
    }

    :root .has-ast-global-color-7-background-color {
        background-color: var(--ast-global-color-7);
    }

    :root .wp-block-button .has-ast-global-color-7-color {
        color: var(--ast-global-color-7);
    }

    :root .wp-block-button .has-ast-global-color-7-background-color {
        background-color: var(--ast-global-color-7);
    }

    :root .has-ast-global-color-8-color {
        color: var(--ast-global-color-8);
    }

    :root .has-ast-global-color-8-background-color {
        background-color: var(--ast-global-color-8);
    }

    :root .wp-block-button .has-ast-global-color-8-color {
        color: var(--ast-global-color-8);
    }

    :root .wp-block-button .has-ast-global-color-8-background-color {
        background-color: var(--ast-global-color-8);
    }

    :root {
        --ast-global-color-0: #046bd2;
        --ast-global-color-1: #045cb4;
        --ast-global-color-2: #1e293b;
        --ast-global-color-3: #334155;
        --ast-global-color-4: #FFFFFF;
        --ast-global-color-5: #F0F5FA;
        --ast-global-color-6: #111111;
        --ast-global-color-7: #D1D5DB;
        --ast-global-color-8: #111111;
    }

    :root {
        --ast-border-color: var(--ast-global-color-7);
    }

    .ast-single-entry-banner {
        -js-display: flex;
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
        position: relative;
        background: var(--ast-title-layout-bg);
    }

    .ast-single-entry-banner[data-banner-layout="layout-1"] {
        max-width: 1200px;
        background: inherit;
        padding: 20px 0;
    }

    .ast-single-entry-banner[data-banner-width-type="custom"] {
        margin: 0 auto;
        width: 100%;
    }

    .ast-single-entry-banner+.site-content .entry-header {
        margin-bottom: 0;
    }

    .site .ast-author-avatar {
        --ast-author-avatar-size: ;
    }

    a.ast-underline-text {
        text-decoration: underline;
    }

    .ast-container>.ast-terms-link {
        position: relative;
        display: block;
    }

    a.ast-button.ast-badge-tax {
        padding: 4px 8px;
        border-radius: 3px;
        font-size: inherit;
    }

    header.entry-header .entry-title {
        font-weight: 600;
        font-size: 32px;
        font-size: 2rem;
    }

    header.entry-header>*:not(:last-child) {
        margin-bottom: 10px;
    }

    header.entry-header .post-thumb-img-content {
        text-align: center;
    }

    header.entry-header .post-thumb img,
    .ast-single-post-featured-section.post-thumb img {
        aspect-ratio: 16/9;
        width: 100%;
        height: 100%;
    }

    .ast-archive-entry-banner {
        -js-display: flex;
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
        position: relative;
        background: var(--ast-title-layout-bg);
    }

    .ast-archive-entry-banner[data-banner-width-type="custom"] {
        margin: 0 auto;
        width: 100%;
    }

    .ast-archive-entry-banner[data-banner-layout="layout-1"] {
        background: inherit;
        padding: 20px 0;
        text-align: left;
    }

    body.archive .ast-archive-description {
        max-width: 1200px;
        width: 100%;
        text-align: left;
        padding-top: 3em;
        padding-right: 3em;
        padding-bottom: 3em;
        padding-left: 3em;
    }

    body.archive .ast-archive-description .ast-archive-title,
    body.archive .ast-archive-description .ast-archive-title * {
        font-weight: 600;
        font-size: 32px;
        font-size: 2rem;
    }

    body.archive .ast-archive-description>*:not(:last-child) {
        margin-bottom: 10px;
    }

    @media (max-width:921px) {
        body.archive .ast-archive-description {
            text-align: left;
        }
    }

    @media (max-width:544px) {
        body.archive .ast-archive-description {
            text-align: left;
        }
    }

    .ast-breadcrumbs .trail-browse,
    .ast-breadcrumbs .trail-items,
    .ast-breadcrumbs .trail-items li {
        display: inline-block;
        margin: 0;
        padding: 0;
        border: none;
        background: inherit;
        text-indent: 0;
        text-decoration: none;
    }

    .ast-breadcrumbs .trail-browse {
        font-size: inherit;
        font-style: inherit;
        font-weight: inherit;
        color: inherit;
    }

    .ast-breadcrumbs .trail-items {
        list-style: none;
    }

    .trail-items li::after {
        padding: 0 0.3em;
        content: "\00bb";
    }

    .trail-items li:last-of-type::after {
        display: none;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .entry-content :where(h1, h2, h3, h4, h5, h6) {
        color: var(--ast-global-color-2);
    }

    .entry-title a {
        color: var(--ast-global-color-2);
    }

    @media (max-width:921px) {

        .ast-builder-grid-row-container.ast-builder-grid-row-tablet-3-firstrow .ast-builder-grid-row>*:first-child,
        .ast-builder-grid-row-container.ast-builder-grid-row-tablet-3-lastrow .ast-builder-grid-row>*:last-child {
            grid-column: 1 / -1;
        }
    }

    @media (max-width:544px) {

        .ast-builder-grid-row-container.ast-builder-grid-row-mobile-3-firstrow .ast-builder-grid-row>*:first-child,
        .ast-builder-grid-row-container.ast-builder-grid-row-mobile-3-lastrow .ast-builder-grid-row>*:last-child {
            grid-column: 1 / -1;
        }
    }

    .ast-builder-layout-element[data-section="title_tagline"] {
        display: flex;
    }

    @media (max-width:921px) {
        .ast-header-break-point .ast-builder-layout-element[data-section="title_tagline"] {
            display: flex;
        }
    }

    @media (max-width:544px) {
        .ast-header-break-point .ast-builder-layout-element[data-section="title_tagline"] {
            display: flex;
        }
    }

    .ast-builder-menu-1 {
        font-family: inherit;
        font-weight: inherit;
    }

    .ast-builder-menu-1 .menu-item>.menu-link {
        color: var(--ast-global-color-3);
    }

    .ast-builder-menu-1 .menu-item>.ast-menu-toggle {
        color: var(--ast-global-color-3);
    }

    .ast-builder-menu-1 .menu-item:hover>.menu-link,
    .ast-builder-menu-1 .inline-on-mobile .menu-item:hover>.ast-menu-toggle {
        color: var(--ast-global-color-1);
    }

    .ast-builder-menu-1 .menu-item:hover>.ast-menu-toggle {
        color: var(--ast-global-color-1);
    }

    .ast-builder-menu-1 .menu-item.current-menu-item>.menu-link,
    .ast-builder-menu-1 .inline-on-mobile .menu-item.current-menu-item>.ast-menu-toggle,
    .ast-builder-menu-1 .current-menu-ancestor>.menu-link {
        color: var(--ast-global-color-1);
    }

    .ast-builder-menu-1 .menu-item.current-menu-item>.ast-menu-toggle {
        color: var(--ast-global-color-1);
    }

    .ast-builder-menu-1 .sub-menu,
    .ast-builder-menu-1 .inline-on-mobile .sub-menu {
        border-top-width: 2px;
        border-bottom-width: 0px;
        border-right-width: 0px;
        border-left-width: 0px;
        border-color: var(--ast-global-color-0);
        border-style: solid;
    }

    .ast-builder-menu-1 .sub-menu .sub-menu {
        top: -2px;
    }

    .ast-builder-menu-1 .main-header-menu>.menu-item>.sub-menu,
    .ast-builder-menu-1 .main-header-menu>.menu-item>.astra-full-megamenu-wrapper {
        margin-top: 0px;
    }

    .ast-desktop .ast-builder-menu-1 .main-header-menu>.menu-item>.sub-menu:before,
    .ast-desktop .ast-builder-menu-1 .main-header-menu>.menu-item>.astra-full-megamenu-wrapper:before {
        height: calc(0px + 2px + 5px);
    }

    .ast-desktop .ast-builder-menu-1 .menu-item .sub-menu .menu-link {
        border-style: none;
    }

    @media (max-width:921px) {
        .ast-header-break-point .ast-builder-menu-1 .menu-item.menu-item-has-children>.ast-menu-toggle {
            top: 0;
        }

        .ast-builder-menu-1 .inline-on-mobile .menu-item.menu-item-has-children>.ast-menu-toggle {
            right: -15px;
        }

        .ast-builder-menu-1 .menu-item-has-children>.menu-link:after {
            content: unset;
        }

        .ast-builder-menu-1 .main-header-menu>.menu-item>.sub-menu,
        .ast-builder-menu-1 .main-header-menu>.menu-item>.astra-full-megamenu-wrapper {
            margin-top: 0;
        }
    }

    @media (max-width:544px) {
        .ast-header-break-point .ast-builder-menu-1 .menu-item.menu-item-has-children>.ast-menu-toggle {
            top: 0;
        }

        .ast-builder-menu-1 .main-header-menu>.menu-item>.sub-menu,
        .ast-builder-menu-1 .main-header-menu>.menu-item>.astra-full-megamenu-wrapper {
            margin-top: 0;
        }
    }

    .ast-builder-menu-1 {
        display: flex;
    }

    @media (max-width:921px) {
        .ast-header-break-point .ast-builder-menu-1 {
            display: flex;
        }
    }

    @media (max-width:544px) {
        .ast-header-break-point .ast-builder-menu-1 {
            display: flex;
        }
    }

    .site-below-footer-wrap {
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .site-below-footer-wrap[data-section="section-below-footer-builder"] {
        background-color: var(--ast-global-color-4);
        min-height: 60px;
        border-style: solid;
        border-width: 0px;
        border-top-width: 1px;
        border-top-color: var(--ast-global-color-subtle-background, --ast-global-color-7);
    }

    .site-below-footer-wrap[data-section="section-below-footer-builder"] .ast-builder-grid-row {
        max-width: 1200px;
        min-height: 60px;
        margin-left: auto;
        margin-right: auto;
    }

    .site-below-footer-wrap[data-section="section-below-footer-builder"] .ast-builder-grid-row,
    .site-below-footer-wrap[data-section="section-below-footer-builder"] .site-footer-section {
        align-items: center;
    }

    .site-below-footer-wrap[data-section="section-below-footer-builder"].ast-footer-row-inline .site-footer-section {
        display: flex;
        margin-bottom: 0;
    }

    .ast-builder-grid-row-full .ast-builder-grid-row {
        grid-template-columns: 1fr;
    }

    @media (max-width:921px) {
        .site-below-footer-wrap[data-section="section-below-footer-builder"].ast-footer-row-tablet-inline .site-footer-section {
            display: flex;
            margin-bottom: 0;
        }

        .site-below-footer-wrap[data-section="section-below-footer-builder"].ast-footer-row-tablet-stack .site-footer-section {
            display: block;
            margin-bottom: 10px;
        }

        .ast-builder-grid-row-container.ast-builder-grid-row-tablet-full .ast-builder-grid-row {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width:544px) {
        .site-below-footer-wrap[data-section="section-below-footer-builder"].ast-footer-row-mobile-inline .site-footer-section {
            display: flex;
            margin-bottom: 0;
        }

        .site-below-footer-wrap[data-section="section-below-footer-builder"].ast-footer-row-mobile-stack .site-footer-section {
            display: block;
            margin-bottom: 10px;
        }

        .ast-builder-grid-row-container.ast-builder-grid-row-mobile-full .ast-builder-grid-row {
            grid-template-columns: 1fr;
        }
    }

    .site-below-footer-wrap[data-section="section-below-footer-builder"] {
        display: grid;
    }

    @media (max-width:921px) {
        .ast-header-break-point .site-below-footer-wrap[data-section="section-below-footer-builder"] {
            display: grid;
        }
    }

    @media (max-width:544px) {
        .ast-header-break-point .site-below-footer-wrap[data-section="section-below-footer-builder"] {
            display: grid;
        }
    }

    .ast-footer-copyright {
        text-align: center;
    }

    .ast-footer-copyright {
        color: var(--ast-global-color-3);
    }

    @media (max-width:921px) {
        .ast-footer-copyright {
            text-align: center;
        }
    }

    @media (max-width:544px) {
        .ast-footer-copyright {
            text-align: center;
        }
    }

    .ast-footer-copyright {
        font-size: 16px;
        font-size: 1rem;
    }

    .ast-footer-copyright.ast-builder-layout-element {
        display: flex;
    }

    @media (max-width:921px) {
        .ast-header-break-point .ast-footer-copyright.ast-builder-layout-element {
            display: flex;
        }
    }

    @media (max-width:544px) {
        .ast-header-break-point .ast-footer-copyright.ast-builder-layout-element {
            display: flex;
        }
    }

    .footer-widget-area.widget-area.site-footer-focus-item {
        width: auto;
    }

    .ast-footer-row-inline .footer-widget-area.widget-area.site-footer-focus-item {
        width: 100%;
    }

    .elementor-widget-heading .elementor-heading-title {
        margin: 0;
    }

    .elementor-page .ast-menu-toggle {
        color: unset !important;
        background: unset !important;
    }

    .elementor-post.elementor-grid-item.hentry {
        margin-bottom: 0;
    }

    .woocommerce div.product .elementor-element.elementor-products-grid .related.products ul.products li.product,
    .elementor-element .elementor-wc-products .woocommerce[class*='columns-'] ul.products li.product {
        width: auto;
        margin: 0;
        float: none;
    }

    .elementor-toc__list-wrapper {
        margin: 0;
    }

    body .elementor hr {
        background-color: #ccc;
        margin: 0;
    }

    .ast-left-sidebar .elementor-section.elementor-section-stretched,
    .ast-right-sidebar .elementor-section.elementor-section-stretched {
        max-width: 100%;
        left: 0 !important;
    }

    .elementor-posts-container [CLASS*="ast-width-"] {
        width: 100%;
    }

    .elementor-template-full-width .ast-container {
        display: block;
    }

    .elementor-screen-only,
    .screen-reader-text,
    .screen-reader-text span,
    .ui-helper-hidden-accessible {
        top: 0 !important;
    }

    @media (max-width:544px) {
        .elementor-element .elementor-wc-products .woocommerce[class*="columns-"] ul.products li.product {
            width: auto;
            margin: 0;
        }

        .elementor-element .woocommerce .woocommerce-result-count {
            float: none;
        }
    }

    .ast-header-break-point .main-header-bar {
        border-bottom-width: 1px;
    }

    @media (min-width:922px) {
        .main-header-bar {
            border-bottom-width: 1px;
        }
    }

    .main-header-menu .menu-item,
    #astra-footer-menu .menu-item,
    .main-header-bar .ast-masthead-custom-menu-items {
        -js-display: flex;
        display: flex;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -moz-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -moz-box-orient: vertical;
        -moz-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
    }

    .main-header-menu>.menu-item>.menu-link,
    #astra-footer-menu>.menu-item>.menu-link {
        height: 100%;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -js-display: flex;
        display: flex;
    }

    .ast-header-break-point .main-navigation ul .menu-item .menu-link .icon-arrow:first-of-type svg {
        top: .2em;
        margin-top: 0px;
        margin-left: 0px;
        width: .65em;
        transform: translate(0, -2px) rotateZ(270deg);
    }

    .ast-mobile-popup-content .ast-submenu-expanded>.ast-menu-toggle {
        transform: rotateX(180deg);
        overflow-y: auto;
    }

    @media (min-width:922px) {
        .ast-builder-menu .main-navigation>ul>li:last-child a {
            margin-right: 0;
        }
    }

    .ast-separate-container .ast-article-inner {
        background-color: var(--ast-global-color-4);
    }

    @media (max-width:921px) {
        .ast-separate-container .ast-article-inner {
            background-color: var(--ast-global-color-4);
        }
    }

    @media (max-width:544px) {
        .ast-separate-container .ast-article-inner {
            background-color: var(--ast-global-color-4);
        }
    }

    .ast-separate-container .ast-article-single:not(.ast-related-post),
    .woocommerce.ast-separate-container .ast-woocommerce-container,
    .ast-separate-container .error-404,
    .ast-separate-container .no-results,
    .single.ast-separate-container .site-main .ast-author-meta,
    .ast-separate-container .related-posts-title-wrapper,
    .ast-separate-container .comments-count-wrapper,
    .ast-box-layout.ast-plain-container .site-content,
    .ast-padded-layout.ast-plain-container .site-content,
    .ast-separate-container .ast-archive-description,
    .ast-separate-container .comments-area {
        background-color: var(--ast-global-color-4);
    }

    @media (max-width:921px) {

        .ast-separate-container .ast-article-single:not(.ast-related-post),
        .woocommerce.ast-separate-container .ast-woocommerce-container,
        .ast-separate-container .error-404,
        .ast-separate-container .no-results,
        .single.ast-separate-container .site-main .ast-author-meta,
        .ast-separate-container .related-posts-title-wrapper,
        .ast-separate-container .comments-count-wrapper,
        .ast-box-layout.ast-plain-container .site-content,
        .ast-padded-layout.ast-plain-container .site-content,
        .ast-separate-container .ast-archive-description {
            background-color: var(--ast-global-color-4);
        }
    }

    @media (max-width:544px) {

        .ast-separate-container .ast-article-single:not(.ast-related-post),
        .woocommerce.ast-separate-container .ast-woocommerce-container,
        .ast-separate-container .error-404,
        .ast-separate-container .no-results,
        .single.ast-separate-container .site-main .ast-author-meta,
        .ast-separate-container .related-posts-title-wrapper,
        .ast-separate-container .comments-count-wrapper,
        .ast-box-layout.ast-plain-container .site-content,
        .ast-padded-layout.ast-plain-container .site-content,
        .ast-separate-container .ast-archive-description {
            background-color: var(--ast-global-color-4);
        }
    }

    .ast-separate-container.ast-two-container #secondary .widget {
        background-color: var(--ast-global-color-4);
    }

    @media (max-width:921px) {
        .ast-separate-container.ast-two-container #secondary .widget {
            background-color: var(--ast-global-color-4);
        }
    }

    @media (max-width:544px) {
        .ast-separate-container.ast-two-container #secondary .widget {
            background-color: var(--ast-global-color-4);
        }
    }

    .ast-plain-container,
    .ast-page-builder-template {
        background-color: var(--ast-global-color-4);
    }

    @media (max-width:921px) {

        .ast-plain-container,
        .ast-page-builder-template {
            background-color: var(--ast-global-color-4);
        }
    }

    @media (max-width:544px) {

        .ast-plain-container,
        .ast-page-builder-template {
            background-color: var(--ast-global-color-4);
        }
    }

    #ast-scroll-top {
        display: none;
        position: fixed;
        text-align: center;
        cursor: pointer;
        z-index: 99;
        width: 2.1em;
        height: 2.1em;
        line-height: 2.1;
        color: #ffffff;
        border-radius: 2px;
        content: "";
        outline: inherit;
    }

    @media (min-width: 769px) {
        #ast-scroll-top {
            content: "769";
        }
    }

    #ast-scroll-top .ast-icon.icon-arrow svg {
        margin-left: 0px;
        vertical-align: middle;
        transform: translate(0, -20%) rotate(180deg);
        width: 1.6em;
    }

    .ast-scroll-to-top-right {
        right: 30px;
        bottom: 30px;
    }

    .ast-scroll-to-top-left {
        left: 30px;
        bottom: 30px;
    }

    #ast-scroll-top {
        background-color: var(--ast-global-color-0);
        font-size: 15px;
    }

    @media (max-width:921px) {
        #ast-scroll-top .ast-icon.icon-arrow svg {
            width: 1em;
        }
    }

    .ast-mobile-header-content>*,
    .ast-desktop-header-content>* {
        padding: 10px 0;
        height: auto;
    }

    .ast-mobile-header-content>*:first-child,
    .ast-desktop-header-content>*:first-child {
        padding-top: 10px;
    }

    .ast-mobile-header-content>.ast-builder-menu,
    .ast-desktop-header-content>.ast-builder-menu {
        padding-top: 0;
    }

    .ast-mobile-header-content>*:last-child,
    .ast-desktop-header-content>*:last-child {
        padding-bottom: 0;
    }

    .ast-mobile-header-content .ast-search-menu-icon.ast-inline-search label,
    .ast-desktop-header-content .ast-search-menu-icon.ast-inline-search label {
        width: 100%;
    }

    .ast-desktop-header-content .main-header-bar-navigation .ast-submenu-expanded>.ast-menu-toggle::before {
        transform: rotateX(180deg);
    }

    #ast-desktop-header .ast-desktop-header-content,
    .ast-mobile-header-content .ast-search-icon,
    .ast-desktop-header-content .ast-search-icon,
    .ast-mobile-header-wrap .ast-mobile-header-content,
    .ast-main-header-nav-open.ast-popup-nav-open .ast-mobile-header-wrap .ast-mobile-header-content,
    .ast-main-header-nav-open.ast-popup-nav-open .ast-desktop-header-content {
        display: none;
    }

    .ast-main-header-nav-open.ast-header-break-point #ast-desktop-header .ast-desktop-header-content,
    .ast-main-header-nav-open.ast-header-break-point .ast-mobile-header-wrap .ast-mobile-header-content {
        display: block;
    }

    .ast-desktop .ast-desktop-header-content .astra-menu-animation-slide-up>.menu-item>.sub-menu,
    .ast-desktop .ast-desktop-header-content .astra-menu-animation-slide-up>.menu-item .menu-item>.sub-menu,
    .ast-desktop .ast-desktop-header-content .astra-menu-animation-slide-down>.menu-item>.sub-menu,
    .ast-desktop .ast-desktop-header-content .astra-menu-animation-slide-down>.menu-item .menu-item>.sub-menu,
    .ast-desktop .ast-desktop-header-content .astra-menu-animation-fade>.menu-item>.sub-menu,
    .ast-desktop .ast-desktop-header-content .astra-menu-animation-fade>.menu-item .menu-item>.sub-menu {
        opacity: 1;
        visibility: visible;
    }

    .ast-hfb-header.ast-default-menu-enable.ast-header-break-point .ast-mobile-header-wrap .ast-mobile-header-content .main-header-bar-navigation {
        width: unset;
        margin: unset;
    }

    .ast-mobile-header-content.content-align-flex-end .main-header-bar-navigation .menu-item-has-children>.ast-menu-toggle,
    .ast-desktop-header-content.content-align-flex-end .main-header-bar-navigation .menu-item-has-children>.ast-menu-toggle {
        left: calc(20px - 0.907em);
        right: auto;
    }

    .ast-mobile-header-content .ast-search-menu-icon,
    .ast-mobile-header-content .ast-search-menu-icon.slide-search,
    .ast-desktop-header-content .ast-search-menu-icon,
    .ast-desktop-header-content .ast-search-menu-icon.slide-search {
        width: 100%;
        position: relative;
        display: block;
        right: auto;
        transform: none;
    }

    .ast-mobile-header-content .ast-search-menu-icon.slide-search .search-form,
    .ast-mobile-header-content .ast-search-menu-icon .search-form,
    .ast-desktop-header-content .ast-search-menu-icon.slide-search .search-form,
    .ast-desktop-header-content .ast-search-menu-icon .search-form {
        right: 0;
        visibility: visible;
        opacity: 1;
        position: relative;
        top: auto;
        transform: none;
        padding: 0;
        display: block;
        overflow: hidden;
    }

    .ast-mobile-header-content .ast-search-menu-icon.ast-inline-search .search-field,
    .ast-mobile-header-content .ast-search-menu-icon .search-field,
    .ast-desktop-header-content .ast-search-menu-icon.ast-inline-search .search-field,
    .ast-desktop-header-content .ast-search-menu-icon .search-field {
        width: 100%;
        padding-right: 5.5em;
    }

    .ast-mobile-header-content .ast-search-menu-icon .search-submit,
    .ast-desktop-header-content .ast-search-menu-icon .search-submit {
        display: block;
        position: absolute;
        height: 100%;
        top: 0;
        right: 0;
        padding: 0 1em;
        border-radius: 0;
    }

    .ast-hfb-header.ast-default-menu-enable.ast-header-break-point .ast-mobile-header-wrap .ast-mobile-header-content .main-header-bar-navigation ul .sub-menu .menu-link {
        padding-left: 30px;
    }

    .ast-hfb-header.ast-default-menu-enable.ast-header-break-point .ast-mobile-header-wrap .ast-mobile-header-content .main-header-bar-navigation .sub-menu .menu-item .menu-item .menu-link {
        padding-left: 40px;
    }

    .ast-mobile-popup-drawer.active .ast-mobile-popup-inner {
        background-color: #ffffff;
        ;
    }

    .ast-mobile-header-wrap .ast-mobile-header-content,
    .ast-desktop-header-content {
        background-color: #ffffff;
        ;
    }

    .ast-mobile-popup-content>*,
    .ast-mobile-header-content>*,
    .ast-desktop-popup-content>*,
    .ast-desktop-header-content>* {
        padding-top: 0px;
        padding-bottom: 0px;
    }

    .content-align-flex-start .ast-builder-layout-element {
        justify-content: flex-start;
    }

    .content-align-flex-start .main-header-menu {
        text-align: left;
    }

    .ast-desktop-header-content,
    .ast-mobile-header-content {
        position: absolute;
        width: 100%;
    }

    .ast-mobile-popup-drawer.active .menu-toggle-close {
        color: #3a3a3a;
    }

    .ast-mobile-header-wrap .ast-primary-header-bar,
    .ast-primary-header-bar .site-primary-header-wrap {
        min-height: 80px;
    }

    .ast-desktop .ast-primary-header-bar .main-header-menu>.menu-item {
        line-height: 80px;
    }

    .ast-header-break-point #masthead .ast-mobile-header-wrap .ast-primary-header-bar,
    .ast-header-break-point #masthead .ast-mobile-header-wrap .ast-below-header-bar,
    .ast-header-break-point #masthead .ast-mobile-header-wrap .ast-above-header-bar {
        padding-left: 20px;
        padding-right: 20px;
    }

    .ast-header-break-point .ast-primary-header-bar {
        border-bottom-width: 1px;
        border-bottom-color: var(--ast-global-color-subtle-background, --ast-global-color-7);
        border-bottom-style: solid;
    }

    @media (min-width:922px) {
        .ast-primary-header-bar {
            border-bottom-width: 1px;
            border-bottom-color: var(--ast-global-color-subtle-background, --ast-global-color-7);
            border-bottom-style: solid;
        }
    }

    .ast-primary-header-bar {
        background-color: var(--ast-global-color-primary, --ast-global-color-4);
    }

    .ast-primary-header-bar {
        display: block;
    }

    @media (max-width:921px) {
        .ast-header-break-point .ast-primary-header-bar {
            display: grid;
        }
    }

    @media (max-width:544px) {
        .ast-header-break-point .ast-primary-header-bar {
            display: grid;
        }
    }

    [data-section="section-header-mobile-trigger"] .ast-button-wrap .ast-mobile-menu-trigger-minimal {
        color: var(--ast-global-color-0);
        border: none;
        background: transparent;
    }

    [data-section="section-header-mobile-trigger"] .ast-button-wrap .mobile-menu-toggle-icon .ast-mobile-svg {
        width: 20px;
        height: 20px;
        fill: var(--ast-global-color-0);
    }

    [data-section="section-header-mobile-trigger"] .ast-button-wrap .mobile-menu-wrap .mobile-menu {
        color: var(--ast-global-color-0);
    }

    .ast-builder-menu-mobile .main-navigation .main-header-menu .menu-item>.menu-link {
        color: var(--ast-global-color-3);
    }

    .ast-builder-menu-mobile .main-navigation .main-header-menu .menu-item>.ast-menu-toggle {
        color: var(--ast-global-color-3);
    }

    .ast-builder-menu-mobile .main-navigation .main-header-menu .menu-item:hover>.menu-link,
    .ast-builder-menu-mobile .main-navigation .inline-on-mobile .menu-item:hover>.ast-menu-toggle {
        color: var(--ast-global-color-1);
    }

    .ast-builder-menu-mobile .menu-item:hover>.menu-link,
    .ast-builder-menu-mobile .main-navigation .inline-on-mobile .menu-item:hover>.ast-menu-toggle {
        color: var(--ast-global-color-1);
    }

    .ast-builder-menu-mobile .main-navigation .menu-item:hover>.ast-menu-toggle {
        color: var(--ast-global-color-1);
    }

    .ast-builder-menu-mobile .main-navigation .menu-item.current-menu-item>.menu-link,
    .ast-builder-menu-mobile .main-navigation .inline-on-mobile .menu-item.current-menu-item>.ast-menu-toggle,
    .ast-builder-menu-mobile .main-navigation .menu-item.current-menu-ancestor>.menu-link,
    .ast-builder-menu-mobile .main-navigation .menu-item.current-menu-ancestor>.ast-menu-toggle {
        color: var(--ast-global-color-1);
    }

    .ast-builder-menu-mobile .main-navigation .menu-item.current-menu-item>.ast-menu-toggle {
        color: var(--ast-global-color-1);
    }

    .ast-builder-menu-mobile .main-navigation .menu-item.menu-item-has-children>.ast-menu-toggle {
        top: 0;
    }

    .ast-builder-menu-mobile .main-navigation .menu-item-has-children>.menu-link:after {
        content: unset;
    }

    .ast-hfb-header .ast-builder-menu-mobile .main-header-menu,
    .ast-hfb-header .ast-builder-menu-mobile .main-navigation .menu-item .menu-link,
    .ast-hfb-header .ast-builder-menu-mobile .main-navigation .menu-item .sub-menu .menu-link {
        border-style: none;
    }

    .ast-builder-menu-mobile .main-navigation .menu-item.menu-item-has-children>.ast-menu-toggle {
        top: 0;
    }

    @media (max-width:921px) {
        .ast-builder-menu-mobile .main-navigation .main-header-menu .menu-item>.menu-link {
            color: var(--ast-global-color-3);
        }

        .ast-builder-menu-mobile .main-navigation .main-header-menu .menu-item>.ast-menu-toggle {
            color: var(--ast-global-color-3);
        }

        .ast-builder-menu-mobile .main-navigation .main-header-menu .menu-item:hover>.menu-link,
        .ast-builder-menu-mobile .main-navigation .inline-on-mobile .menu-item:hover>.ast-menu-toggle {
            color: var(--ast-global-color-1);
            background: var(--ast-global-color-5);
        }

        .ast-builder-menu-mobile .main-navigation .menu-item:hover>.ast-menu-toggle {
            color: var(--ast-global-color-1);
        }

        .ast-builder-menu-mobile .main-navigation .menu-item.current-menu-item>.menu-link,
        .ast-builder-menu-mobile .main-navigation .inline-on-mobile .menu-item.current-menu-item>.ast-menu-toggle,
        .ast-builder-menu-mobile .main-navigation .menu-item.current-menu-ancestor>.menu-link,
        .ast-builder-menu-mobile .main-navigation .menu-item.current-menu-ancestor>.ast-menu-toggle {
            color: var(--ast-global-color-1);
            background: var(--ast-global-color-5);
        }

        .ast-builder-menu-mobile .main-navigation .menu-item.current-menu-item>.ast-menu-toggle {
            color: var(--ast-global-color-1);
        }

        .ast-builder-menu-mobile .main-navigation .menu-item.menu-item-has-children>.ast-menu-toggle {
            top: 0;
        }

        .ast-builder-menu-mobile .main-navigation .menu-item-has-children>.menu-link:after {
            content: unset;
        }

        .ast-builder-menu-mobile .main-navigation .main-header-menu,
        .ast-builder-menu-mobile .main-navigation .main-header-menu .menu-link,
        .ast-builder-menu-mobile .main-navigation .main-header-menu .sub-menu {
            background-color: var(--ast-global-color-4);
        }
    }

    @media (max-width:544px) {
        .ast-builder-menu-mobile .main-navigation .menu-item.menu-item-has-children>.ast-menu-toggle {
            top: 0;
        }
    }

    .ast-builder-menu-mobile .main-navigation {
        display: block;
    }

    @media (max-width:921px) {
        .ast-header-break-point .ast-builder-menu-mobile .main-navigation {
            display: block;
        }
    }

    @media (max-width:544px) {
        .ast-header-break-point .ast-builder-menu-mobile .main-navigation {
            display: block;
        }
    }

    :root {
        --e-global-color-astglobalcolor0: #046bd2;
        --e-global-color-astglobalcolor1: #045cb4;
        --e-global-color-astglobalcolor2: #1e293b;
        --e-global-color-astglobalcolor3: #334155;
        --e-global-color-astglobalcolor4: #FFFFFF;
        --e-global-color-astglobalcolor5: #F0F5FA;
        --e-global-color-astglobalcolor6: #111111;
        --e-global-color-astglobalcolor7: #D1D5DB;
        --e-global-color-astglobalcolor8: #111111;
    }
    </style>
    <link rel='stylesheet' id='hfe-widgets-style-css'
        href='wp-content/plugins/header-footer-elementor/inc/widgets-css/frontend8dff.css?ver=2.4.9' media='all' />
    <link rel='stylesheet' id='premium-addons-css'
        href='wp-content/plugins/premium-addons-for-elementor/assets/frontend/min-css/premium-addons.mine952.css?ver=4.11.30'
        media='all' />
    <style id='wp-emoji-styles-inline-css'>
    img.wp-smiley,
    img.emoji {
        display: inline !important;
        border: none !important;
        box-shadow: none !important;
        height: 1em !important;
        width: 1em !important;
        margin: 0 0.07em !important;
        vertical-align: -0.1em !important;
        background: none !important;
        padding: 0 !important;
    }
    </style>
    <style id='bp-login-form-style-inline-css'>
    .widget_bp_core_login_widget .bp-login-widget-user-avatar {
        float: left
    }

    .widget_bp_core_login_widget .bp-login-widget-user-links {
        margin-left: 70px
    }

    #bp-login-widget-form label {
        display: block;
        font-weight: 600;
        margin: 15px 0 5px;
        width: auto
    }

    #bp-login-widget-form input[type=password],
    #bp-login-widget-form input[type=text] {
        background-color: #fafafa;
        border: 1px solid #d6d6d6;
        border-radius: 0;
        font: inherit;
        font-size: 100%;
        padding: .5em;
        width: 100%
    }

    #bp-login-widget-form .bp-login-widget-register-link,
    #bp-login-widget-form .login-submit {
        display: inline;
        width: -moz-fit-content;
        width: fit-content
    }

    #bp-login-widget-form .bp-login-widget-register-link {
        margin-left: 1em
    }

    #bp-login-widget-form .bp-login-widget-register-link a {
        filter: invert(1)
    }

    #bp-login-widget-form .bp-login-widget-pwd-link {
        font-size: 80%
    }
    </style>
    <style id='bp-primary-nav-style-inline-css'>
    .buddypress_object_nav .bp-navs {
        background: #0000;
        clear: both;
        overflow: hidden
    }

    .buddypress_object_nav .bp-navs ul {
        margin: 0;
        padding: 0
    }

    .buddypress_object_nav .bp-navs ul li {
        list-style: none;
        margin: 0
    }

    .buddypress_object_nav .bp-navs ul li a,
    .buddypress_object_nav .bp-navs ul li span {
        border: 0;
        display: block;
        padding: 5px 10px;
        text-decoration: none
    }

    .buddypress_object_nav .bp-navs ul li .count {
        background: #eaeaea;
        border: 1px solid #ccc;
        border-radius: 50%;
        color: #555;
        display: inline-block;
        font-size: 12px;
        margin-left: 2px;
        padding: 3px 6px;
        text-align: center;
        vertical-align: middle
    }

    .buddypress_object_nav .bp-navs ul li a .count:empty {
        display: none
    }

    .buddypress_object_nav .bp-navs ul li.last select {
        max-width: 185px
    }

    .buddypress_object_nav .bp-navs ul li.current a,
    .buddypress_object_nav .bp-navs ul li.selected a {
        color: #333;
        opacity: 1
    }

    .buddypress_object_nav .bp-navs ul li.current a .count,
    .buddypress_object_nav .bp-navs ul li.selected a .count {
        background-color: #fff
    }

    .buddypress_object_nav .bp-navs ul li.dynamic a .count,
    .buddypress_object_nav .bp-navs ul li.dynamic.current a .count,
    .buddypress_object_nav .bp-navs ul li.dynamic.selected a .count {
        background-color: #5087e5;
        border: 0;
        color: #fafafa
    }

    .buddypress_object_nav .bp-navs ul li.dynamic a:hover .count {
        background-color: #5087e5;
        border: 0;
        color: #fff
    }

    .buddypress_object_nav .main-navs.dir-navs {
        margin-bottom: 20px
    }

    .buddypress_object_nav .bp-navs.group-create-links ul li.current a {
        text-align: center
    }

    .buddypress_object_nav .bp-navs.group-create-links ul li:not(.current),
    .buddypress_object_nav .bp-navs.group-create-links ul li:not(.current) a {
        color: #767676
    }

    .buddypress_object_nav .bp-navs.group-create-links ul li:not(.current) a:focus,
    .buddypress_object_nav .bp-navs.group-create-links ul li:not(.current) a:hover {
        background: none;
        color: #555
    }

    .buddypress_object_nav .bp-navs.group-create-links ul li:not(.current) a[disabled]:focus,
    .buddypress_object_nav .bp-navs.group-create-links ul li:not(.current) a[disabled]:hover {
        color: #767676
    }
    </style>
    <style id='bp-member-style-inline-css'>
    [data-type="bp/member"] input.components-placeholder__input {
        border: 1px solid #757575;
        border-radius: 2px;
        flex: 1 1 auto;
        padding: 6px 8px
    }

    .bp-block-member {
        position: relative
    }

    .bp-block-member .member-content {
        display: flex
    }

    .bp-block-member .user-nicename {
        display: block
    }

    .bp-block-member .user-nicename a {
        border: none;
        color: currentColor;
        text-decoration: none
    }

    .bp-block-member .bp-profile-button {
        width: 100%
    }

    .bp-block-member .bp-profile-button a.button {
        bottom: 10px;
        display: inline-block;
        margin: 18px 0 0;
        position: absolute;
        right: 0
    }

    .bp-block-member.has-cover .item-header-avatar,
    .bp-block-member.has-cover .member-content,
    .bp-block-member.has-cover .member-description {
        z-index: 2
    }

    .bp-block-member.has-cover .member-content,
    .bp-block-member.has-cover .member-description {
        padding-top: 75px
    }

    .bp-block-member.has-cover .bp-member-cover-image {
        background-color: #c5c5c5;
        background-position: top;
        background-repeat: no-repeat;
        background-size: cover;
        border: 0;
        display: block;
        height: 150px;
        left: 0;
        margin: 0;
        padding: 0;
        position: absolute;
        top: 0;
        width: 100%;
        z-index: 1
    }

    .bp-block-member img.avatar {
        height: auto;
        width: auto
    }

    .bp-block-member.avatar-none .item-header-avatar {
        display: none
    }

    .bp-block-member.avatar-none.has-cover {
        min-height: 200px
    }

    .bp-block-member.avatar-full {
        min-height: 150px
    }

    .bp-block-member.avatar-full .item-header-avatar {
        width: 180px
    }

    .bp-block-member.avatar-thumb .member-content {
        align-items: center;
        min-height: 50px
    }

    .bp-block-member.avatar-thumb .item-header-avatar {
        width: 70px
    }

    .bp-block-member.avatar-full.has-cover {
        min-height: 300px
    }

    .bp-block-member.avatar-full.has-cover .item-header-avatar {
        width: 200px
    }

    .bp-block-member.avatar-full.has-cover img.avatar {
        background: #fffc;
        border: 2px solid #fff;
        margin-left: 20px
    }

    .bp-block-member.avatar-thumb.has-cover .item-header-avatar {
        padding-top: 75px
    }

    .entry .entry-content .bp-block-member .user-nicename a {
        border: none;
        color: currentColor;
        text-decoration: none
    }
    </style>
    <style id='bp-members-style-inline-css'>
    [data-type="bp/members"] .components-placeholder.is-appender {
        min-height: 0
    }

    [data-type="bp/members"] .components-placeholder.is-appender .components-placeholder__label:empty {
        display: none
    }

    [data-type="bp/members"] .components-placeholder input.components-placeholder__input {
        border: 1px solid #757575;
        border-radius: 2px;
        flex: 1 1 auto;
        padding: 6px 8px
    }

    [data-type="bp/members"].avatar-none .member-description {
        width: calc(100% - 44px)
    }

    [data-type="bp/members"].avatar-full .member-description {
        width: calc(100% - 224px)
    }

    [data-type="bp/members"].avatar-thumb .member-description {
        width: calc(100% - 114px)
    }

    [data-type="bp/members"] .member-content {
        position: relative
    }

    [data-type="bp/members"] .member-content .is-right {
        position: absolute;
        right: 2px;
        top: 2px
    }

    [data-type="bp/members"] .columns-2 .member-content .member-description,
    [data-type="bp/members"] .columns-3 .member-content .member-description,
    [data-type="bp/members"] .columns-4 .member-content .member-description {
        padding-left: 44px;
        width: calc(100% - 44px)
    }

    [data-type="bp/members"] .columns-3 .is-right {
        right: -10px
    }

    [data-type="bp/members"] .columns-4 .is-right {
        right: -50px
    }

    .bp-block-members.is-grid {
        display: flex;
        flex-wrap: wrap;
        padding: 0
    }

    .bp-block-members.is-grid .member-content {
        margin: 0 1.25em 1.25em 0;
        width: 100%
    }

    @media(min-width:600px) {
        .bp-block-members.columns-2 .member-content {
            width: calc(50% - .625em)
        }

        .bp-block-members.columns-2 .member-content:nth-child(2n) {
            margin-right: 0
        }

        .bp-block-members.columns-3 .member-content {
            width: calc(33.33333% - .83333em)
        }

        .bp-block-members.columns-3 .member-content:nth-child(3n) {
            margin-right: 0
        }

        .bp-block-members.columns-4 .member-content {
            width: calc(25% - .9375em)
        }

        .bp-block-members.columns-4 .member-content:nth-child(4n) {
            margin-right: 0
        }
    }

    .bp-block-members .member-content {
        display: flex;
        flex-direction: column;
        padding-bottom: 1em;
        text-align: center
    }

    .bp-block-members .member-content .item-header-avatar,
    .bp-block-members .member-content .member-description {
        width: 100%
    }

    .bp-block-members .member-content .item-header-avatar {
        margin: 0 auto
    }

    .bp-block-members .member-content .item-header-avatar img.avatar {
        display: inline-block
    }

    @media(min-width:600px) {
        .bp-block-members .member-content {
            flex-direction: row;
            text-align: left
        }

        .bp-block-members .member-content .item-header-avatar,
        .bp-block-members .member-content .member-description {
            width: auto
        }

        .bp-block-members .member-content .item-header-avatar {
            margin: 0
        }
    }

    .bp-block-members .member-content .user-nicename {
        display: block
    }

    .bp-block-members .member-content .user-nicename a {
        border: none;
        color: currentColor;
        text-decoration: none
    }

    .bp-block-members .member-content time {
        color: #767676;
        display: block;
        font-size: 80%
    }

    .bp-block-members.avatar-none .item-header-avatar {
        display: none
    }

    .bp-block-members.avatar-full {
        min-height: 190px
    }

    .bp-block-members.avatar-full .item-header-avatar {
        width: 180px
    }

    .bp-block-members.avatar-thumb .member-content {
        min-height: 80px
    }

    .bp-block-members.avatar-thumb .item-header-avatar {
        width: 70px
    }

    .bp-block-members.columns-2 .member-content,
    .bp-block-members.columns-3 .member-content,
    .bp-block-members.columns-4 .member-content {
        display: block;
        text-align: center
    }

    .bp-block-members.columns-2 .member-content .item-header-avatar,
    .bp-block-members.columns-3 .member-content .item-header-avatar,
    .bp-block-members.columns-4 .member-content .item-header-avatar {
        margin: 0 auto
    }

    .bp-block-members img.avatar {
        height: auto;
        max-width: -moz-fit-content;
        max-width: fit-content;
        width: auto
    }

    .bp-block-members .member-content.has-activity {
        align-items: center
    }

    .bp-block-members .member-content.has-activity .item-header-avatar {
        padding-right: 1em
    }

    .bp-block-members .member-content.has-activity .wp-block-quote {
        margin-bottom: 0;
        text-align: left
    }

    .bp-block-members .member-content.has-activity .wp-block-quote cite a,
    .entry .entry-content .bp-block-members .user-nicename a {
        border: none;
        color: currentColor;
        text-decoration: none
    }
    </style>
    <style id='bp-dynamic-members-style-inline-css'>
    .bp-dynamic-block-container .item-options {
        font-size: .5em;
        margin: 0 0 1em;
        padding: 1em 0
    }

    .bp-dynamic-block-container .item-options a.selected {
        font-weight: 600
    }

    .bp-dynamic-block-container ul.item-list {
        list-style: none;
        margin: 1em 0;
        padding-left: 0
    }

    .bp-dynamic-block-container ul.item-list li {
        margin-bottom: 1em
    }

    .bp-dynamic-block-container ul.item-list li:after,
    .bp-dynamic-block-container ul.item-list li:before {
        content: " ";
        display: table
    }

    .bp-dynamic-block-container ul.item-list li:after {
        clear: both
    }

    .bp-dynamic-block-container ul.item-list li .item-avatar {
        float: left;
        width: 60px
    }

    .bp-dynamic-block-container ul.item-list li .item {
        margin-left: 70px
    }
    </style>
    <style id='bp-online-members-style-inline-css'>
    .widget_bp_core_whos_online_widget .avatar-block,
    [data-type="bp/online-members"] .avatar-block {
        display: flex;
        flex-flow: row wrap
    }

    .widget_bp_core_whos_online_widget .avatar-block img,
    [data-type="bp/online-members"] .avatar-block img {
        margin: .5em
    }
    </style>
    <style id='bp-active-members-style-inline-css'>
    .widget_bp_core_recently_active_widget .avatar-block,
    [data-type="bp/active-members"] .avatar-block {
        display: flex;
        flex-flow: row wrap
    }

    .widget_bp_core_recently_active_widget .avatar-block img,
    [data-type="bp/active-members"] .avatar-block img {
        margin: .5em
    }
    </style>
    <style id='bp-latest-activities-style-inline-css'>
    .bp-latest-activities .components-flex.components-select-control select[multiple] {
        height: auto;
        padding: 0 8px
    }

    .bp-latest-activities .components-flex.components-select-control select[multiple]+.components-input-control__suffix svg {
        display: none
    }

    .bp-latest-activities-block a,
    .entry .entry-content .bp-latest-activities-block a {
        border: none;
        text-decoration: none
    }

    .bp-latest-activities-block .activity-list.item-list blockquote {
        border: none;
        padding: 0
    }

    .bp-latest-activities-block .activity-list.item-list blockquote .activity-item:not(.mini) {
        box-shadow: 1px 0 4px #00000026;
        padding: 0 1em;
        position: relative
    }

    .bp-latest-activities-block .activity-list.item-list blockquote .activity-item:not(.mini):after,
    .bp-latest-activities-block .activity-list.item-list blockquote .activity-item:not(.mini):before {
        border-color: #0000;
        border-style: solid;
        content: "";
        display: block;
        height: 0;
        left: 15px;
        position: absolute;
        width: 0
    }

    .bp-latest-activities-block .activity-list.item-list blockquote .activity-item:not(.mini):before {
        border-top-color: #00000026;
        border-width: 9px;
        bottom: -18px;
        left: 14px
    }

    .bp-latest-activities-block .activity-list.item-list blockquote .activity-item:not(.mini):after {
        border-top-color: #fff;
        border-width: 8px;
        bottom: -16px
    }

    .bp-latest-activities-block .activity-list.item-list blockquote .activity-item.mini .avatar {
        display: inline-block;
        height: 20px;
        margin-right: 2px;
        vertical-align: middle;
        width: 20px
    }

    .bp-latest-activities-block .activity-list.item-list footer {
        align-items: center;
        display: flex
    }

    .bp-latest-activities-block .activity-list.item-list footer img.avatar {
        border: none;
        display: inline-block;
        margin-right: .5em
    }

    .bp-latest-activities-block .activity-list.item-list footer .activity-time-since {
        font-size: 90%
    }

    .bp-latest-activities-block .widget-error {
        border-left: 4px solid #0b80a4;
        box-shadow: 1px 0 4px #00000026
    }

    .bp-latest-activities-block .widget-error p {
        padding: 0 1em
    }
    </style>
    <style id='global-styles-inline-css'>
    :root {
        --wp--preset--aspect-ratio--square: 1;
        --wp--preset--aspect-ratio--4-3: 4/3;
        --wp--preset--aspect-ratio--3-4: 3/4;
        --wp--preset--aspect-ratio--3-2: 3/2;
        --wp--preset--aspect-ratio--2-3: 2/3;
        --wp--preset--aspect-ratio--16-9: 16/9;
        --wp--preset--aspect-ratio--9-16: 9/16;
        --wp--preset--color--black: #000000;
        --wp--preset--color--cyan-bluish-gray: #abb8c3;
        --wp--preset--color--white: #ffffff;
        --wp--preset--color--pale-pink: #f78da7;
        --wp--preset--color--vivid-red: #cf2e2e;
        --wp--preset--color--luminous-vivid-orange: #ff6900;
        --wp--preset--color--luminous-vivid-amber: #fcb900;
        --wp--preset--color--light-green-cyan: #7bdcb5;
        --wp--preset--color--vivid-green-cyan: #00d084;
        --wp--preset--color--pale-cyan-blue: #8ed1fc;
        --wp--preset--color--vivid-cyan-blue: #0693e3;
        --wp--preset--color--vivid-purple: #9b51e0;
        --wp--preset--color--ast-global-color-0: var(--ast-global-color-0);
        --wp--preset--color--ast-global-color-1: var(--ast-global-color-1);
        --wp--preset--color--ast-global-color-2: var(--ast-global-color-2);
        --wp--preset--color--ast-global-color-3: var(--ast-global-color-3);
        --wp--preset--color--ast-global-color-4: var(--ast-global-color-4);
        --wp--preset--color--ast-global-color-5: var(--ast-global-color-5);
        --wp--preset--color--ast-global-color-6: var(--ast-global-color-6);
        --wp--preset--color--ast-global-color-7: var(--ast-global-color-7);
        --wp--preset--color--ast-global-color-8: var(--ast-global-color-8);
        --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
        --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
        --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
        --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
        --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
        --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
        --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
        --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
        --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
        --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
        --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
        --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
        --wp--preset--font-size--small: 13px;
        --wp--preset--font-size--medium: 20px;
        --wp--preset--font-size--large: 36px;
        --wp--preset--font-size--x-large: 42px;
        --wp--preset--spacing--20: 0.44rem;
        --wp--preset--spacing--30: 0.67rem;
        --wp--preset--spacing--40: 1rem;
        --wp--preset--spacing--50: 1.5rem;
        --wp--preset--spacing--60: 2.25rem;
        --wp--preset--spacing--70: 3.38rem;
        --wp--preset--spacing--80: 5.06rem;
        --wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
        --wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
        --wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
        --wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);
        --wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
    }

    :root {
        --wp--style--global--content-size: var(--wp--custom--ast-content-width-size);
        --wp--style--global--wide-size: var(--wp--custom--ast-wide-width-size);
    }

    :where(body) {
        margin: 0;
    }

    .wp-site-blocks>.alignleft {
        float: left;
        margin-right: 2em;
    }

    .wp-site-blocks>.alignright {
        float: right;
        margin-left: 2em;
    }

    .wp-site-blocks>.aligncenter {
        justify-content: center;
        margin-left: auto;
        margin-right: auto;
    }

    :where(.wp-site-blocks)>* {
        margin-block-start: 24px;
        margin-block-end: 0;
    }

    :where(.wp-site-blocks)> :first-child {
        margin-block-start: 0;
    }

    :where(.wp-site-blocks)> :last-child {
        margin-block-end: 0;
    }

    :root {
        --wp--style--block-gap: 24px;
    }

    :root :where(.is-layout-flow)> :first-child {
        margin-block-start: 0;
    }

    :root :where(.is-layout-flow)> :last-child {
        margin-block-end: 0;
    }

    :root :where(.is-layout-flow)>* {
        margin-block-start: 24px;
        margin-block-end: 0;
    }

    :root :where(.is-layout-constrained)> :first-child {
        margin-block-start: 0;
    }

    :root :where(.is-layout-constrained)> :last-child {
        margin-block-end: 0;
    }

    :root :where(.is-layout-constrained)>* {
        margin-block-start: 24px;
        margin-block-end: 0;
    }

    :root :where(.is-layout-flex) {
        gap: 24px;
    }

    :root :where(.is-layout-grid) {
        gap: 24px;
    }

    .is-layout-flow>.alignleft {
        float: left;
        margin-inline-start: 0;
        margin-inline-end: 2em;
    }

    .is-layout-flow>.alignright {
        float: right;
        margin-inline-start: 2em;
        margin-inline-end: 0;
    }

    .is-layout-flow>.aligncenter {
        margin-left: auto !important;
        margin-right: auto !important;
    }

    .is-layout-constrained>.alignleft {
        float: left;
        margin-inline-start: 0;
        margin-inline-end: 2em;
    }

    .is-layout-constrained>.alignright {
        float: right;
        margin-inline-start: 2em;
        margin-inline-end: 0;
    }

    .is-layout-constrained>.aligncenter {
        margin-left: auto !important;
        margin-right: auto !important;
    }

    .is-layout-constrained> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
        max-width: var(--wp--style--global--content-size);
        margin-left: auto !important;
        margin-right: auto !important;
    }

    .is-layout-constrained>.alignwide {
        max-width: var(--wp--style--global--wide-size);
    }

    body .is-layout-flex {
        display: flex;
    }

    .is-layout-flex {
        flex-wrap: wrap;
        align-items: center;
    }

    .is-layout-flex> :is(*, div) {
        margin: 0;
    }

    body .is-layout-grid {
        display: grid;
    }

    .is-layout-grid> :is(*, div) {
        margin: 0;
    }

    body {
        padding-top: 0px;
        padding-right: 0px;
        padding-bottom: 0px;
        padding-left: 0px;
    }

    a:where(:not(.wp-element-button)) {
        text-decoration: none;
    }

    :root :where(.wp-element-button, .wp-block-button__link) {
        background-color: #32373c;
        border-width: 0;
        color: #fff;
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
        padding: calc(0.667em + 2px) calc(1.333em + 2px);
        text-decoration: none;
    }

    .has-black-color {
        color: var(--wp--preset--color--black) !important;
    }

    .has-cyan-bluish-gray-color {
        color: var(--wp--preset--color--cyan-bluish-gray) !important;
    }

    .has-white-color {
        color: var(--wp--preset--color--white) !important;
    }

    .has-pale-pink-color {
        color: var(--wp--preset--color--pale-pink) !important;
    }

    .has-vivid-red-color {
        color: var(--wp--preset--color--vivid-red) !important;
    }

    .has-luminous-vivid-orange-color {
        color: var(--wp--preset--color--luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-amber-color {
        color: var(--wp--preset--color--luminous-vivid-amber) !important;
    }

    .has-light-green-cyan-color {
        color: var(--wp--preset--color--light-green-cyan) !important;
    }

    .has-vivid-green-cyan-color {
        color: var(--wp--preset--color--vivid-green-cyan) !important;
    }

    .has-pale-cyan-blue-color {
        color: var(--wp--preset--color--pale-cyan-blue) !important;
    }

    .has-vivid-cyan-blue-color {
        color: var(--wp--preset--color--vivid-cyan-blue) !important;
    }

    .has-vivid-purple-color {
        color: var(--wp--preset--color--vivid-purple) !important;
    }

    .has-ast-global-color-0-color {
        color: var(--wp--preset--color--ast-global-color-0) !important;
    }

    .has-ast-global-color-1-color {
        color: var(--wp--preset--color--ast-global-color-1) !important;
    }

    .has-ast-global-color-2-color {
        color: var(--wp--preset--color--ast-global-color-2) !important;
    }

    .has-ast-global-color-3-color {
        color: var(--wp--preset--color--ast-global-color-3) !important;
    }

    .has-ast-global-color-4-color {
        color: var(--wp--preset--color--ast-global-color-4) !important;
    }

    .has-ast-global-color-5-color {
        color: var(--wp--preset--color--ast-global-color-5) !important;
    }

    .has-ast-global-color-6-color {
        color: var(--wp--preset--color--ast-global-color-6) !important;
    }

    .has-ast-global-color-7-color {
        color: var(--wp--preset--color--ast-global-color-7) !important;
    }

    .has-ast-global-color-8-color {
        color: var(--wp--preset--color--ast-global-color-8) !important;
    }

    .has-black-background-color {
        background-color: var(--wp--preset--color--black) !important;
    }

    .has-cyan-bluish-gray-background-color {
        background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
    }

    .has-white-background-color {
        background-color: var(--wp--preset--color--white) !important;
    }

    .has-pale-pink-background-color {
        background-color: var(--wp--preset--color--pale-pink) !important;
    }

    .has-vivid-red-background-color {
        background-color: var(--wp--preset--color--vivid-red) !important;
    }

    .has-luminous-vivid-orange-background-color {
        background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-amber-background-color {
        background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
    }

    .has-light-green-cyan-background-color {
        background-color: var(--wp--preset--color--light-green-cyan) !important;
    }

    .has-vivid-green-cyan-background-color {
        background-color: var(--wp--preset--color--vivid-green-cyan) !important;
    }

    .has-pale-cyan-blue-background-color {
        background-color: var(--wp--preset--color--pale-cyan-blue) !important;
    }

    .has-vivid-cyan-blue-background-color {
        background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
    }

    .has-vivid-purple-background-color {
        background-color: var(--wp--preset--color--vivid-purple) !important;
    }

    .has-ast-global-color-0-background-color {
        background-color: var(--wp--preset--color--ast-global-color-0) !important;
    }

    .has-ast-global-color-1-background-color {
        background-color: var(--wp--preset--color--ast-global-color-1) !important;
    }

    .has-ast-global-color-2-background-color {
        background-color: var(--wp--preset--color--ast-global-color-2) !important;
    }

    .has-ast-global-color-3-background-color {
        background-color: var(--wp--preset--color--ast-global-color-3) !important;
    }

    .has-ast-global-color-4-background-color {
        background-color: var(--wp--preset--color--ast-global-color-4) !important;
    }

    .has-ast-global-color-5-background-color {
        background-color: var(--wp--preset--color--ast-global-color-5) !important;
    }

    .has-ast-global-color-6-background-color {
        background-color: var(--wp--preset--color--ast-global-color-6) !important;
    }

    .has-ast-global-color-7-background-color {
        background-color: var(--wp--preset--color--ast-global-color-7) !important;
    }

    .has-ast-global-color-8-background-color {
        background-color: var(--wp--preset--color--ast-global-color-8) !important;
    }

    .has-black-border-color {
        border-color: var(--wp--preset--color--black) !important;
    }

    .has-cyan-bluish-gray-border-color {
        border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
    }

    .has-white-border-color {
        border-color: var(--wp--preset--color--white) !important;
    }

    .has-pale-pink-border-color {
        border-color: var(--wp--preset--color--pale-pink) !important;
    }

    .has-vivid-red-border-color {
        border-color: var(--wp--preset--color--vivid-red) !important;
    }

    .has-luminous-vivid-orange-border-color {
        border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-amber-border-color {
        border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
    }

    .has-light-green-cyan-border-color {
        border-color: var(--wp--preset--color--light-green-cyan) !important;
    }

    .has-vivid-green-cyan-border-color {
        border-color: var(--wp--preset--color--vivid-green-cyan) !important;
    }

    .has-pale-cyan-blue-border-color {
        border-color: var(--wp--preset--color--pale-cyan-blue) !important;
    }

    .has-vivid-cyan-blue-border-color {
        border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
    }

    .has-vivid-purple-border-color {
        border-color: var(--wp--preset--color--vivid-purple) !important;
    }

    .has-ast-global-color-0-border-color {
        border-color: var(--wp--preset--color--ast-global-color-0) !important;
    }

    .has-ast-global-color-1-border-color {
        border-color: var(--wp--preset--color--ast-global-color-1) !important;
    }

    .has-ast-global-color-2-border-color {
        border-color: var(--wp--preset--color--ast-global-color-2) !important;
    }

    .has-ast-global-color-3-border-color {
        border-color: var(--wp--preset--color--ast-global-color-3) !important;
    }

    .has-ast-global-color-4-border-color {
        border-color: var(--wp--preset--color--ast-global-color-4) !important;
    }

    .has-ast-global-color-5-border-color {
        border-color: var(--wp--preset--color--ast-global-color-5) !important;
    }

    .has-ast-global-color-6-border-color {
        border-color: var(--wp--preset--color--ast-global-color-6) !important;
    }

    .has-ast-global-color-7-border-color {
        border-color: var(--wp--preset--color--ast-global-color-7) !important;
    }

    .has-ast-global-color-8-border-color {
        border-color: var(--wp--preset--color--ast-global-color-8) !important;
    }

    .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
        background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
    }

    .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
        background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
    }

    .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
        background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-orange-to-vivid-red-gradient-background {
        background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
    }

    .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
        background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
    }

    .has-cool-to-warm-spectrum-gradient-background {
        background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
    }

    .has-blush-light-purple-gradient-background {
        background: var(--wp--preset--gradient--blush-light-purple) !important;
    }

    .has-blush-bordeaux-gradient-background {
        background: var(--wp--preset--gradient--blush-bordeaux) !important;
    }

    .has-luminous-dusk-gradient-background {
        background: var(--wp--preset--gradient--luminous-dusk) !important;
    }

    .has-pale-ocean-gradient-background {
        background: var(--wp--preset--gradient--pale-ocean) !important;
    }

    .has-electric-grass-gradient-background {
        background: var(--wp--preset--gradient--electric-grass) !important;
    }

    .has-midnight-gradient-background {
        background: var(--wp--preset--gradient--midnight) !important;
    }

    .has-small-font-size {
        font-size: var(--wp--preset--font-size--small) !important;
    }

    .has-medium-font-size {
        font-size: var(--wp--preset--font-size--medium) !important;
    }

    .has-large-font-size {
        font-size: var(--wp--preset--font-size--large) !important;
    }

    .has-x-large-font-size {
        font-size: var(--wp--preset--font-size--x-large) !important;
    }

    :root :where(.wp-block-pullquote) {
        font-size: 1.5em;
        line-height: 1.6;
    }
    </style>
    <link rel='stylesheet' id='user-registration-general-css'
        href='wp-content/plugins/user-registration/assets/css/user-registration474a.css?ver=4.4.0' media='all' />
    <link rel='stylesheet' id='usp_style-css'
        href='wp-content/plugins/user-submitted-posts/resources/usp195d.css?ver=20250329' media='all' />
    <link rel='stylesheet' id='woocommerce-layout-css'
        href='wp-content/themes/astra/assets/css/minified/compatibility/woocommerce/woocommerce-layout-grid.mine060.css?ver=4.11.9'
        media='all' />
    <link rel='stylesheet' id='woocommerce-smallscreen-css'
        href='wp-content/themes/astra/assets/css/minified/compatibility/woocommerce/woocommerce-smallscreen-grid.mine060.css?ver=4.11.9'
        media='only screen and (max-width: 921px)' />
    <link rel='stylesheet' id='woocommerce-general-css'
        href='wp-content/themes/astra/assets/css/minified/compatibility/woocommerce/woocommerce-grid.mine060.css?ver=4.11.9'
        media='all' />
    <style id='woocommerce-general-inline-css'>
    .woocommerce .woocommerce-result-count,
    .woocommerce-page .woocommerce-result-count {
        float: left;
    }

    .woocommerce .woocommerce-ordering {
        float: right;
        margin-bottom: 2.5em;
    }

    #customer_details h3:not(.elementor-widget-woocommerce-checkout-page h3) {
        padding: 20px 0 14px;
        margin: 0 0 20px;
        border-bottom: 1px solid var(--ast-border-color);
    }

    form #order_review_heading:not(.elementor-widget-woocommerce-checkout-page #order_review_heading) {
        border-width: 2px 2px 0 2px;
        border-style: solid;
        margin: 0;
        padding: 1.5em 1.5em 1em;
        border-color: var(--ast-border-color);
    }

    .woocommerce-Address h3,
    .cart-collaterals h2 {
        padding: .7em 1em;
    }

    form #order_review:not(.elementor-widget-woocommerce-checkout-page #order_review) {
        padding: 0 2em;
        border-width: 0 2px 2px;
        border-style: solid;
        border-color: var(--ast-border-color);
    }

    ul#shipping_method li:not(.elementor-widget-woocommerce-cart #shipping_method li) {
        margin: 0;
        padding: 0.25em 0 0.25em 22px;
        text-indent: -22px;
        list-style: none outside;
    }

    .woocommerce span.onsale,
    .wc-block-grid__product .wc-block-grid__product-onsale {
        background-color: var(--ast-global-color-0);
        color: #ffffff;
    }

    .woocommerce-message,
    .woocommerce-info {
        border-top-color: var(--ast-global-color-0);
    }

    .woocommerce-message::before,
    .woocommerce-info::before {
        color: var(--ast-global-color-0);
    }

    .woocommerce ul.products li.product .price,
    .woocommerce div.product p.price,
    .woocommerce div.product span.price,
    .widget_layered_nav_filters ul li.chosen a,
    .woocommerce-page ul.products li.product .ast-woo-product-category,
    .wc-layered-nav-rating a {
        color: var(--ast-global-color-3);
    }

    .woocommerce nav.woocommerce-pagination ul,
    .woocommerce nav.woocommerce-pagination ul li {
        border-color: var(--ast-global-color-0);
    }

    .woocommerce nav.woocommerce-pagination ul li a:focus,
    .woocommerce nav.woocommerce-pagination ul li a:hover,
    .woocommerce nav.woocommerce-pagination ul li span.current {
        background: var(--ast-global-color-0);
        color: #ffffff;
    }

    .woocommerce-MyAccount-navigation-link.is-active a {
        color: var(--ast-global-color-1);
    }

    .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
    .woocommerce .widget_price_filter .ui-slider .ui-slider-handle {
        background-color: var(--ast-global-color-0);
    }

    .woocommerce .star-rating,
    .woocommerce .comment-form-rating .stars a,
    .woocommerce .star-rating::before {
        color: #FDA256;
    }

    .woocommerce div.product .woocommerce-tabs ul.tabs li.active:before,
    .woocommerce div.ast-product-tabs-layout-vertical .woocommerce-tabs ul.tabs li:hover::before {
        background: var(--ast-global-color-0);
    }

    .woocommerce .star-rating {
        width: calc(5.4em + 5px);
        letter-spacing: 2px;
    }

    .entry-content .woocommerce-message,
    .entry-content .woocommerce-error,
    .entry-content .woocommerce-info {
        padding-top: 1em;
        padding-bottom: 1em;
        padding-left: 3.5em;
        padding-right: 2em;
    }

    .woocommerce[class*="rel-up-columns-"] .site-main div.product .related.products ul.products li.product,
    .woocommerce-page .site-main ul.products li.product {
        width: 100%;
    }

    .woocommerce ul.product-categories>li ul li {
        position: relative;
    }

    .woocommerce ul.product-categories>li ul li:before {
        content: "";
        border-width: 1px 1px 0 0;
        border-style: solid;
        display: inline-block;
        width: 6px;
        height: 6px;
        position: absolute;
        top: 50%;
        margin-top: -2px;
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .woocommerce ul.product-categories>li ul li a {
        margin-left: 15px;
    }

    .ast-icon-shopping-cart svg {
        height: .82em;
    }

    .ast-icon-shopping-bag svg {
        height: 1em;
        width: 1em;
    }

    .ast-icon-shopping-basket svg {
        height: 1.15em;
        width: 1.2em;
    }

    .ast-site-header-cart.ast-menu-cart-outline .ast-addon-cart-wrap,
    .ast-site-header-cart.ast-menu-cart-fill .ast-addon-cart-wrap {
        line-height: 1;
    }

    .ast-site-header-cart.ast-menu-cart-fill i.astra-icon {
        font-size: 1.1em;
    }

    li.woocommerce-custom-menu-item .ast-site-header-cart i.astra-icon:after {
        padding-left: 2px;
    }

    .ast-hfb-header .ast-addon-cart-wrap {
        padding: 0.4em;
    }

    .ast-header-break-point.ast-header-custom-item-outside .ast-woo-header-cart-info-wrap {
        display: none;
    }

    .ast-site-header-cart i.astra-icon:after {
        background: var(--ast-global-color-0);
    }

    .ast-separate-container .ast-woocommerce-container {
        padding: 3em;
    }

    @media (min-width:545px) and (max-width:921px) {

        .woocommerce.tablet-columns-3 ul.products li.product,
        .woocommerce-page.tablet-columns-3 ul.products:not(.elementor-grid) {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    @media (min-width:922px) {
        .woocommerce form.checkout_coupon {
            width: 50%;
        }
    }

    @media (max-width:921px) {

        .ast-header-break-point.ast-woocommerce-cart-menu .header-main-layout-1.ast-mobile-header-stack.ast-no-menu-items .ast-site-header-cart,
        .ast-header-break-point.ast-woocommerce-cart-menu .header-main-layout-3.ast-mobile-header-stack.ast-no-menu-items .ast-site-header-cart {
            padding-right: 0;
            padding-left: 0;
        }

        .ast-header-break-point.ast-woocommerce-cart-menu .header-main-layout-1.ast-mobile-header-stack .main-header-bar {
            text-align: center;
        }

        .ast-header-break-point.ast-woocommerce-cart-menu .header-main-layout-1.ast-mobile-header-stack .ast-site-header-cart,
        .ast-header-break-point.ast-woocommerce-cart-menu .header-main-layout-1.ast-mobile-header-stack .ast-mobile-menu-buttons {
            display: inline-block;
        }

        .ast-header-break-point.ast-woocommerce-cart-menu .header-main-layout-2.ast-mobile-header-inline .site-branding {
            flex: auto;
        }

        .ast-header-break-point.ast-woocommerce-cart-menu .header-main-layout-3.ast-mobile-header-stack .site-branding {
            flex: 0 0 100%;
        }

        .ast-header-break-point.ast-woocommerce-cart-menu .header-main-layout-3.ast-mobile-header-stack .main-header-container {
            display: flex;
            justify-content: center;
        }

        .woocommerce-cart .woocommerce-shipping-calculator .button {
            width: 100%;
        }

        .woocommerce div.product div.images,
        .woocommerce div.product div.summary,
        .woocommerce #content div.product div.images,
        .woocommerce #content div.product div.summary,
        .woocommerce-page div.product div.images,
        .woocommerce-page div.product div.summary,
        .woocommerce-page #content div.product div.images,
        .woocommerce-page #content div.product div.summary {
            float: none;
            width: 100%;
        }

        .woocommerce-cart table.cart td.actions .ast-return-to-shop {
            display: block;
            text-align: center;
            margin-top: 1em;
        }

        .ast-container .woocommerce ul.products:not(.elementor-grid),
        .woocommerce-page ul.products:not(.elementor-grid),
        .woocommerce.tablet-columns-3 ul.products:not(.elementor-grid) {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    @media (max-width:544px) {
        .ast-separate-container .ast-woocommerce-container {
            padding: .54em 1em 1.33333em;
        }

        .woocommerce-message,
        .woocommerce-error,
        .woocommerce-info {
            display: flex;
            flex-wrap: wrap;
        }

        .woocommerce-message a.button,
        .woocommerce-error a.button,
        .woocommerce-info a.button {
            order: 1;
            margin-top: .5em;
        }

        .woocommerce .woocommerce-ordering,
        .woocommerce-page .woocommerce-ordering {
            float: none;
            margin-bottom: 2em;
        }

        .woocommerce table.cart td.actions .button,
        .woocommerce #content table.cart td.actions .button,
        .woocommerce-page table.cart td.actions .button,
        .woocommerce-page #content table.cart td.actions .button {
            padding-left: 1em;
            padding-right: 1em;
        }

        .woocommerce #content table.cart .button,
        .woocommerce-page #content table.cart .button {
            width: 100%;
        }

        .woocommerce #content table.cart td.actions .coupon,
        .woocommerce-page #content table.cart td.actions .coupon {
            float: none;
        }

        .woocommerce #content table.cart td.actions .coupon .button,
        .woocommerce-page #content table.cart td.actions .coupon .button {
            flex: 1;
        }

        .woocommerce #content div.product .woocommerce-tabs ul.tabs li a,
        .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li a {
            display: block;
        }

        .ast-container .woocommerce ul.products:not(.elementor-grid),
        .woocommerce-page ul.products:not(.elementor-grid),
        .woocommerce.mobile-columns-2 ul.products:not(.elementor-grid),
        .woocommerce-page.mobile-columns-2 ul.products:not(.elementor-grid) {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .woocommerce.mobile-rel-up-columns-2 ul.products::not(.elementor-grid) {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width:544px) {

        .woocommerce ul.products a.button.loading::after,
        .woocommerce-page ul.products a.button.loading::after {
            display: inline-block;
            margin-left: 5px;
            position: initial;
        }

        .woocommerce.mobile-columns-1 .site-main ul.products li.product:nth-child(n),
        .woocommerce-page.mobile-columns-1 .site-main ul.products li.product:nth-child(n) {
            margin-right: 0;
        }

        .woocommerce #content div.product .woocommerce-tabs ul.tabs li,
        .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li {
            display: block;
            margin-right: 0;
        }
    }

    @media (min-width:922px) {

        .woocommerce #content .ast-woocommerce-container div.product div.images,
        .woocommerce .ast-woocommerce-container div.product div.images,
        .woocommerce-page #content .ast-woocommerce-container div.product div.images,
        .woocommerce-page .ast-woocommerce-container div.product div.images {
            width: 50%;
        }

        .woocommerce #content .ast-woocommerce-container div.product div.summary,
        .woocommerce .ast-woocommerce-container div.product div.summary,
        .woocommerce-page #content .ast-woocommerce-container div.product div.summary,
        .woocommerce-page .ast-woocommerce-container div.product div.summary {
            width: 46%;
        }

        .woocommerce.woocommerce-checkout form #customer_details.col2-set .col-1,
        .woocommerce.woocommerce-checkout form #customer_details.col2-set .col-2,
        .woocommerce-page.woocommerce-checkout form #customer_details.col2-set .col-1,
        .woocommerce-page.woocommerce-checkout form #customer_details.col2-set .col-2 {
            float: none;
            width: auto;
        }
    }

    .widget_product_search button {
        flex: 0 0 auto;
        padding: 10px 20px;
    }

    @media (min-width:922px) {

        .woocommerce.woocommerce-checkout form #customer_details.col2-set,
        .woocommerce-page.woocommerce-checkout form #customer_details.col2-set {
            width: 55%;
            float: left;
            margin-right: 4.347826087%;
        }

        .woocommerce.woocommerce-checkout form #order_review,
        .woocommerce.woocommerce-checkout form #order_review_heading,
        .woocommerce-page.woocommerce-checkout form #order_review,
        .woocommerce-page.woocommerce-checkout form #order_review_heading {
            width: 40%;
            float: right;
            margin-right: 0;
            clear: right;
        }
    }

    select,
    .select2-container .select2-selection--single {
        background-image: url("data:image/svg+xml,%3Csvg class='ast-arrow-svg' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' x='0px' y='0px' width='26px' height='16.043px' fill='%23334155' viewBox='57 35.171 26 16.043' enable-background='new 57 35.171 26 16.043' xml:space='preserve' %3E%3Cpath d='M57.5,38.193l12.5,12.5l12.5-12.5l-2.5-2.5l-10,10l-10-10L57.5,38.193z'%3E%3C/path%3E%3C/svg%3E");
        background-size: .8em;
        background-repeat: no-repeat;
        background-position-x: calc(100% - 10px);
        background-position-y: center;
        -webkit-appearance: none;
        -moz-appearance: none;
        padding-right: 2em;
    }

    .ast-onsale-card {
        position: absolute;
        top: 1.5em;
        left: 1.5em;
        color: var(--ast-global-color-3);
        background-color: var(--ast-global-color-primary, var(--ast-global-color-5));
        width: fit-content;
        border-radius: 20px;
        padding: 0.4em 0.8em;
        font-size: .87em;
        font-weight: 500;
        line-height: normal;
        letter-spacing: normal;
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.15);
        opacity: 1;
        visibility: visible;
        z-index: 4;
    }

    @media(max-width: 420px) {
        .mobile-columns-3 .ast-onsale-card {
            top: 1em;
            left: 1em;
        }
    }


    .ast-on-card-button {
        position: absolute;
        right: 1em;
        visibility: hidden;
        opacity: 0;
        transition: all 0.2s;
        z-index: 5;
        cursor: pointer;
    }

    .ast-on-card-button.ast-onsale-card {
        opacity: 1;
        visibility: visible;
    }

    .ast-on-card-button:hover .ast-card-action-tooltip,
    .ast-on-card-button:focus .ast-card-action-tooltip {
        opacity: 1;
        visibility: visible;
    }

    .ast-on-card-button:hover .ahfb-svg-iconset {
        opacity: 1;
        color: var(--ast-global-color-2);
    }

    .ast-on-card-button .ahfb-svg-iconset {
        border-radius: 50%;
        color: var(--ast-global-color-2);
        background: var(--ast-global-color-primary, var(--ast-global-color-5));
        opacity: 0.7;
        width: 2em;
        height: 2em;
        justify-content: center;
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.15);
    }

    .ast-on-card-button .ahfb-svg-iconset .ast-icon {
        -js-display: inline-flex;
        display: inline-flex;
        align-self: center;
    }

    .ast-on-card-button svg {
        fill: currentColor;
    }

    .ast-select-options-trigger {
        top: 1em;
    }

    .ast-select-options-trigger.loading:after {
        display: block;
        content: " ";
        position: absolute;
        top: 50%;
        right: 50%;
        left: auto;
        width: 16px;
        height: 16px;
        margin-top: -12px;
        margin-right: -8px;
        background-color: var(--ast-global-color-2);
        background-image: none;
        border-radius: 100%;
        -webkit-animation: dotPulse 0.65s 0s infinite cubic-bezier(0.21, 0.53, 0.56, 0.8);
        animation: dotPulse 0.65s 0s infinite cubic-bezier(0.21, 0.53, 0.56, 0.8);
    }

    .ast-select-options-trigger.loading .ast-icon {
        display: none;
    }

    .ast-card-action-tooltip {
        background-color: var(--ast-global-color-2);
        pointer-events: none;
        white-space: nowrap;
        padding: 8px 9px;
        padding: 0.7em 0.9em;
        color: var(--ast-global-color-primary, var(--ast-global-color-5));
        margin-right: 10px;
        border-radius: 3px;
        font-size: 0.8em;
        line-height: 1;
        font-weight: normal;
        position: absolute;
        right: 100%;
        top: auto;
        visibility: hidden;
        opacity: 0;
        transition: all 0.2s;
    }

    .ast-card-action-tooltip:after {
        content: "";
        position: absolute;
        top: 50%;
        margin-top: -5px;
        right: -10px;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 5px;
        border-color: transparent transparent transparent var(--ast-global-color-2);
    }

    .astra-shop-thumbnail-wrap:hover .ast-on-card-button:not(.ast-onsale-card) {
        opacity: 1;
        visibility: visible;
    }

    @media (max-width: 420px) {

        .mobile-columns-3 .ast-select-options-trigger {
            top: 0.5em;
            right: 0.5em;
        }
    }

    .woocommerce ul.products li.product.desktop-align-left,
    .woocommerce-page ul.products li.product.desktop-align-left {
        text-align: left;
    }

    .woocommerce ul.products li.product.desktop-align-left .star-rating,
    .woocommerce ul.products li.product.desktop-align-left .button,
    .woocommerce-page ul.products li.product.desktop-align-left .star-rating,
    .woocommerce-page ul.products li.product.desktop-align-left .button {
        margin-left: 0;
        margin-right: 0;
    }

    @media(max-width: 921px) {

        .woocommerce ul.products li.product.tablet-align-left,
        .woocommerce-page ul.products li.product.tablet-align-left {
            text-align: left;
        }

        .woocommerce ul.products li.product.tablet-align-left .star-rating,
        .woocommerce ul.products li.product.tablet-align-left .button,
        .woocommerce-page ul.products li.product.tablet-align-left .star-rating,
        .woocommerce-page ul.products li.product.tablet-align-left .button {
            margin-left: 0;
            margin-right: 0;
        }
    }

    @media(max-width: 544px) {

        .woocommerce ul.products li.product.mobile-align-left,
        .woocommerce-page ul.products li.product.mobile-align-left {
            text-align: left;
        }

        .woocommerce ul.products li.product.mobile-align-left .star-rating,
        .woocommerce ul.products li.product.mobile-align-left .button,
        .woocommerce-page ul.products li.product.mobile-align-left .star-rating,
        .woocommerce-page ul.products li.product.mobile-align-left .button {
            margin-left: 0;
            margin-right: 0;
        }
    }

    .ast-woo-active-filter-widget .wc-block-active-filters {
        display: flex;
        align-items: self-start;
        justify-content: space-between;
    }

    .ast-woo-active-filter-widget .wc-block-active-filters__clear-all {
        flex: none;
        margin-top: 2px;
    }
    </style>
    <link rel='stylesheet' id='astra-wc-dokan-compatibility-css'
        href='wp-content/themes/astra/assets/css/minified/compatibility/woocommerce/dokan-compatibility.mine060.css?ver=4.11.9'
        media='all' />
    <style id='woocommerce-inline-inline-css'>
    .woocommerce form .form-row .required {
        visibility: visible;
    }
    </style>
    <link rel='stylesheet' id='bdpg-frontend-css'
        href='wp-content/plugins/bangladeshi-payment-gateways/assets/public/css/bdpg-public459e.css?ver=3.0.4'
        media='all' />
    <link rel='stylesheet' id='hfe-style-css'
        href='wp-content/plugins/header-footer-elementor/assets/css/header-footer-elementor8dff.css?ver=2.4.9'
        media='all' />
    <link rel='stylesheet' id='elementor-frontend-css'
        href='wp-content/plugins/elementor/assets/css/frontend.min94b7.css?ver=3.31.3' media='all' />
    <link rel='stylesheet' id='elementor-post-6-css'
        href='wp-content/uploads/elementor/css/post-62859.css?ver=1758601933' media='all' />
    <link rel='stylesheet' id='widget-heading-css'
        href='wp-content/plugins/elementor/assets/css/widget-heading.min94b7.css?ver=3.31.3' media='all' />
    <link rel='stylesheet' id='widget-image-css'
        href='wp-content/plugins/elementor/assets/css/widget-image.min94b7.css?ver=3.31.3' media='all' />
    <link rel='stylesheet' id='widget-spacer-css'
        href='wp-content/plugins/elementor/assets/css/widget-spacer.min94b7.css?ver=3.31.3' media='all' />
    <link rel='stylesheet' id='widget-icon-box-css'
        href='wp-content/plugins/elementor/assets/css/widget-icon-box.min94b7.css?ver=3.31.3' media='all' />
    <link rel='stylesheet' id='pa-glass-css'
        href='wp-content/plugins/premium-addons-for-elementor/assets/frontend/min-css/liquid-glass.mine952.css?ver=4.11.30'
        media='all' />
    <link rel='stylesheet' id='pa-slick-css'
        href='wp-content/plugins/premium-addons-for-elementor/assets/frontend/min-css/slick.mine952.css?ver=4.11.30'
        media='all' />
    <link rel='stylesheet' id='font-awesome-5-all-css'
        href='wp-content/plugins/elementor/assets/lib/font-awesome/css/all.mine952.css?ver=4.11.30' media='all' />
    <link rel='stylesheet' id='widget-icon-list-css'
        href='wp-content/plugins/elementor/assets/css/widget-icon-list.min94b7.css?ver=3.31.3' media='all' />
    <link rel='stylesheet' id='elementor-post-16-css'
        href='wp-content/uploads/elementor/css/post-16b83c.css?ver=1758601938' media='all' />
    <link rel='stylesheet' id='eael-general-css'
        href='wp-content/plugins/essential-addons-for-elementor-lite/assets/front-end/css/view/general.mina086.css?ver=6.3.0'
        media='all' />
    <link rel='stylesheet' id='eael-9-css'
        href='wp-content/uploads/essential-addons-elementor/eael-9339f.css?ver=1755055795' media='all' />
    <link rel='stylesheet' id='elementor-post-9-css'
        href='wp-content/uploads/elementor/css/post-9b83c.css?ver=1758601938' media='all' />
    <link rel='stylesheet' id='brands-styles-css'
        href='wp-content/plugins/woocommerce/assets/css/brands523e.css?ver=10.1.2' media='all' />
    <link rel='stylesheet' id='dashicons-css' href='wp-includes/css/dashicons.min6c2d.css?ver=6.8.2' media='all' />
    <link rel='stylesheet' id='hfe-elementor-icons-css'
        href='wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min705c.css?ver=5.34.0' media='all' />
    <link rel='stylesheet' id='hfe-icons-list-css'
        href='wp-content/plugins/elementor/assets/css/widget-icon-list.min44b4.css?ver=3.24.3' media='all' />
    <link rel='stylesheet' id='hfe-social-icons-css'
        href='wp-content/plugins/elementor/assets/css/widget-social-icons.min2401.css?ver=3.24.0' media='all' />
    <link rel='stylesheet' id='hfe-social-share-icons-brands-css'
        href='wp-content/plugins/elementor/assets/lib/font-awesome/css/brands52d5.css?ver=5.15.3' media='all' />
    <link rel='stylesheet' id='hfe-social-share-icons-fontawesome-css'
        href='wp-content/plugins/elementor/assets/lib/font-awesome/css/fontawesome52d5.css?ver=5.15.3' media='all' />
    <link rel='stylesheet' id='hfe-nav-menu-icons-css'
        href='wp-content/plugins/elementor/assets/lib/font-awesome/css/solid52d5.css?ver=5.15.3' media='all' />
    <link rel='stylesheet' id='ekit-widget-styles-css'
        href='wp-content/plugins/elementskit-lite/widgets/init/assets/css/widget-stylesa7a0.css?ver=3.6.1'
        media='all' />
    <link rel='stylesheet' id='ekit-responsive-css'
        href='wp-content/plugins/elementskit-lite/widgets/init/assets/css/responsivea7a0.css?ver=3.6.1' media='all' />
    <link rel='stylesheet' id='wpr-button-animations-css-css'
        href='wp-content/plugins/royal-elementor-addons/assets/css/lib/animations/button-animations.min75d8.css?ver=1.7.1031'
        media='all' />
    <link rel='stylesheet' id='wpr-text-animations-css-css'
        href='wp-content/plugins/royal-elementor-addons/assets/css/lib/animations/text-animations.min75d8.css?ver=1.7.1031'
        media='all' />
    <link rel='stylesheet' id='wpr-addons-css-css'
        href='wp-content/plugins/royal-elementor-addons/assets/css/frontend.min75d8.css?ver=1.7.1031' media='all' />

    <script data-cfasync="false" src="wp-includes/js/jquery/jquery.minf43b.js?ver=3.7.1" id="jquery-core-js"></script>
    <script data-cfasync="false" src="wp-includes/js/jquery/jquery-migrate.min5589.js?ver=3.4.1" id="jquery-migrate-js">
    </script>
    <script id="jquery-js-after">
    ! function($) {
        "use strict";
        $(document).ready(function() {
            $(this).scrollTop() > 100 && $(".hfe-scroll-to-top-wrap").removeClass("hfe-scroll-to-top-hide"), $(
                window).scroll(function() {
                $(this).scrollTop() < 100 ? $(".hfe-scroll-to-top-wrap").fadeOut(300) : $(
                    ".hfe-scroll-to-top-wrap").fadeIn(300)
            }), $(".hfe-scroll-to-top-wrap").on("click", function() {
                $("html, body").animate({
                    scrollTop: 0
                }, 300);
                return !1
            })
        })
    }(jQuery);
    ! function($) {
        'use strict';
        $(document).ready(function() {
            var bar = $('.hfe-reading-progress-bar');
            if (!bar.length) return;
            $(window).on('scroll', function() {
                var s = $(window).scrollTop(),
                    d = $(document).height() - $(window).height(),
                    p = d ? s / d * 100 : 0;
                bar.css('width', p + '%')
            });
        });
    }(jQuery);
    </script>
    <script src="wp-content/plugins/user-submitted-posts/resources/jquery.chosen195d.js?ver=20250329"
        id="usp_chosen-js"></script>
    <script src="wp-content/plugins/user-submitted-posts/resources/jquery.cookie195d.js?ver=20250329"
        id="usp_cookie-js"></script>
    <script src="wp-content/plugins/user-submitted-posts/resources/jquery.parsley.min195d.js?ver=20250329"
        id="usp_parsley-js"></script>

    <script src="wp-content/plugins/user-submitted-posts/resources/jquery.usp.core195d.js?ver=20250329"
        id="usp_core-js"></script>
    <script src="wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.mina876.js?ver=2.7.0-wc.10.1.2"
        id="jquery-blockui-js" defer data-wp-strategy="defer"></script
    <script src="wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min523e.js?ver=10.1.2"
        id="wc-add-to-cart-js" defer data-wp-strategy="defer"></script>
    <script src="wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min2d4a.js?ver=2.1.4-wc.10.1.2"
        id="js-cookie-js" defer data-wp-strategy="defer"></script>
    <script id="woocommerce-js-extra">
    var woocommerce_params = {
        "ajax_url": "\/wp-admin\/admin-ajax.php",
        "wc_ajax_url": "\/?wc-ajax=%%endpoint%%",
        "i18n_password_show": "Show password",
        "i18n_password_hide": "Hide password"
    };
    </script>
    <script src="wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min523e.js?ver=10.1.2"
        id="woocommerce-js" defer data-wp-strategy="defer"></script>
    <script src="wp-content/plugins/bangladeshi-payment-gateways/assets/public/js/bdpg-public459e.js?ver=3.0.4"
        id="bdpg-frontend-js"></script>
    <script src="wp-content/plugins/woocommerce/assets/js/flexslider/jquery.flexslider.min67dc.js?ver=2.7.2-wc.10.1.2"
        id="flexslider-js" defer data-wp-strategy="defer"></script>
    <link rel="https://api.w.org/" href="wp-json/index.html" />
    <link rel="alternate" title="JSON" type="application/json" href="wp-json/wp/v2/pages/16.json" />
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="xmlrpc0db0.php?rsd" />
    <meta name="generator" content="WordPress 6.8.2" />
    <meta name="generator" content="WooCommerce 10.1.2" />
    <link rel="canonical" href="index.html" />
    <link rel='shortlink' href='index.html' />


    <script type="text/javascript">
    var ajaxurl = 'wp-admin/admin-ajax.html';
    </script>

    <style id="essential-blocks-global-styles">
    :root {
        --eb-global-primary-color: #101828;
        --eb-global-secondary-color: #475467;
        --eb-global-tertiary-color: #98A2B3;
        --eb-global-text-color: #475467;
        --eb-global-heading-color: #1D2939;
        --eb-global-link-color: #444CE7;
        --eb-global-background-color: #F9FAFB;
        --eb-global-button-text-color: #FFFFFF;
        --eb-global-button-background-color: #101828;
        --eb-gradient-primary-color: linear-gradient(90deg, hsla(259, 84%, 78%, 1) 0%, hsla(206, 67%, 75%, 1) 100%);
        --eb-gradient-secondary-color: linear-gradient(90deg, hsla(18, 76%, 85%, 1) 0%, hsla(203, 69%, 84%, 1) 100%);
        --eb-gradient-tertiary-color: linear-gradient(90deg, hsla(248, 21%, 15%, 1) 0%, hsla(250, 14%, 61%, 1) 100%);
        --eb-gradient-background-color: linear-gradient(90deg, rgb(250, 250, 250) 0%, rgb(233, 233, 233) 49%, rgb(244, 243, 243) 100%);

        --eb-tablet-breakpoint: 1024px;
        --eb-mobile-breakpoint: 767px;

    }
    </style> <noscript>
        <style>
        .woocommerce-product-gallery {
            opacity: 1 !important;
        }
        </style>
    </noscript>
    <meta name="generator"
        content="Elementor 3.31.3; features: e_font_icon_svg, additional_custom_breakpoints, e_element_cache; settings: css_print_method-external, google_font-enabled, font_display-swap">
    <style>
    .e-con.e-parent:nth-of-type(n+4):not(.e-lazyloaded):not(.e-no-lazyload),
    .e-con.e-parent:nth-of-type(n+4):not(.e-lazyloaded):not(.e-no-lazyload) * {
        background-image: none !important;
    }

    @media screen and (max-height: 1024px) {

        .e-con.e-parent:nth-of-type(n+3):not(.e-lazyloaded):not(.e-no-lazyload),
        .e-con.e-parent:nth-of-type(n+3):not(.e-lazyloaded):not(.e-no-lazyload) * {
            background-image: none !important;
        }
    }

    @media screen and (max-height: 640px) {

        .e-con.e-parent:nth-of-type(n+2):not(.e-lazyloaded):not(.e-no-lazyload),
        .e-con.e-parent:nth-of-type(n+2):not(.e-lazyloaded):not(.e-no-lazyload) * {
            background-image: none !important;
        }
    }
    </style>
    <style id="wpr_lightbox_styles">
    .lg-backdrop {
        background-color: rgba(0, 0, 0, 0.6) !important;
    }

    .lg-toolbar,
    .lg-dropdown {
        background-color: rgba(0, 0, 0, 0.8) !important;
    }

    .lg-dropdown:after {
        border-bottom-color: rgba(0, 0, 0, 0.8) !important;
    }

    .lg-sub-html {
        background-color: rgba(0, 0, 0, 0.8) !important;
    }

    .lg-thumb-outer,
    .lg-progress-bar {
        background-color: #444444 !important;
    }

    .lg-progress {
        background-color: #a90707 !important;
    }

    .lg-icon {
        color: #efefef !important;
        font-size: 20px !important;
    }

    .lg-icon.lg-toogle-thumb {
        font-size: 24px !important;
    }

    .lg-icon:hover,
    .lg-dropdown-text:hover {
        color: #ffffff !important;
    }

    .lg-sub-html,
    .lg-dropdown-text {
        color: #efefef !important;
        font-size: 14px !important;
    }

    #lg-counter {
        color: #efefef !important;
        font-size: 14px !important;
    }

    .lg-prev,
    .lg-next {
        font-size: 35px !important;
    }

    /* Defaults */
    .lg-icon {
        background-color: transparent !important;
    }

    #lg-counter {
        opacity: 0.9;
    }

    .lg-thumb-outer {
        padding: 0 10px;
    }

    .lg-thumb-item {
        border-radius: 0 !important;
        border: none !important;
        opacity: 0.5;
    }

    .lg-thumb-item.active {
        opacity: 1;
    }
    </style>

<style>
    .quick-view-modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 800px;
        position: relative;
    }

    .close-btn {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close-btn:hover,
    .close-btn:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .product {
        display: flex;
    }

    .product-image {
        flex: 1;
    }

    .product-image img {
        width: 100%;
    }

    .product-details {
        flex: 1;
        padding-left: 20px;
    }

    .cartItemsCount {
    position: relative;
    display: inline-block;
}


/* cart item show  */
.cartCountBadge {
    position: absolute;
    top: -6px;
    right: -8px;
    background-color: red;
    color: white;
    font-size: 11px;
    font-weight: bold;
    border-radius: 50%;
    width: 18px;
    height: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>

</head>


<body itemtype='https://schema.org/WebPage' itemscope='itemscope'
    class="home-page bp-nouveau home wp-singular page-template-default page page-id-16 wp-theme-astra theme-astra user-registration-page woocommerce-no-js ehf-header ehf-template-astra ehf-stylesheet-astra ast-desktop ast-page-builder-template ast-no-sidebar astra-4.11.9 ast-single-post ast-inherit-site-logo-transparent ast-hfb-header elementor-default elementor-kit-6 elementor-page elementor-page-16">

    <a class="skip-link screen-reader-text" href="#content" title="Skip to content">
        Skip to content</a>

    <div class="hfeed site" id="page">
        @include('frontend.layouts.header')

        @yield('content')

        @include('frontend.layouts.footer')
    </div>
    
    <div id="ast-scroll-top" tabindex="0" class="ast-scroll-top-icon ast-scroll-to-top-right" data-on-devices="both">
        <span class="ast-icon icon-arrow"><svg class="ast-arrow-svg" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="26px" height="16.043px"
                viewBox="57 35.171 26 16.043" enable-background="new 57 35.171 26 16.043" xml:space="preserve">
                <path d="M57.5,38.193l12.5,12.5l12.5-12.5l-2.5-2.5l-10,10l-10-10L57.5,38.193z" />
            </svg></span> <span class="screen-reader-text">Scroll to Top</span>
    </div>


    <script>
    const lazyloadRunObserver = () => {
        const lazyloadBackgrounds = document.querySelectorAll(`.e-con.e-parent:not(.e-lazyloaded)`);
        const lazyloadBackgroundObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    let lazyloadBackground = entry.target;
                    if (lazyloadBackground) {
                        lazyloadBackground.classList.add('e-lazyloaded');
                    }
                    lazyloadBackgroundObserver.unobserve(entry.target);
                }
            });
        }, {
            rootMargin: '200px 0px 200px 0px'
        });
        lazyloadBackgrounds.forEach((lazyloadBackground) => {
            lazyloadBackgroundObserver.observe(lazyloadBackground);
        });
    };
    const events = [
        'DOMContentLoaded',
        'elementor/lazyload/observe',
    ];
    events.forEach((event) => {
        document.addEventListener(event, lazyloadRunObserver);
    });
    </script>
    <script>
    (function() {
        var c = document.body.className;
        c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
        document.body.className = c;
    })();
    </script>
    <script type="text/template" id="tmpl-variation-template">
        <div class="woocommerce-variation-description">Data 01</div>
	<div class="woocommerce-variation-price">Data 02</div>
	<div class="woocommerce-variation-availability">Data 03</div>
</script>
    <script type="text/template" id="tmpl-unavailable-variation-template">
        <p role="alert">Sorry, this product is unavailable. Please choose a different combination.</p>
</script>
    <link rel='stylesheet' id='wc-blocks-style-css'
        href='wp-content/plugins/woocommerce/assets/client/blocks/wc-blocksde44.css?ver=wc-10.1.2' media='all' />
    <link rel='stylesheet' id='elementor-icons-css'
        href='wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min2778.css?ver=5.43.0' media='all' />
    <link rel='stylesheet' id='elementor-icons-ekiticons-css'
        href='wp-content/plugins/elementskit-lite/modules/elementskit-icon-pack/assets/css/ekiticonsa7a0.css?ver=3.6.1'
        media='all' />
    <script src="wp-content/plugins/essential-blocks/assets/js/eb-blocks-localized363.js?ver=31d6cfe0d16ae931b73c"
        id="essential-blocks-blocks-localize-js"></script>
    <script id="astra-theme-js-js-extra">
    var astra = {
        "break_point": "921",
        "isRtl": "",
        "is_scroll_to_id": "1",
        "is_scroll_to_top": "1",
        "is_header_footer_builder_active": "1",
        "responsive_cart_click": "flyout",
        "is_dark_palette": ""
    };
    </script>
    <script src="wp-content/themes/astra/assets/js/minified/frontend.mine060.js?ver=4.11.9" id="astra-theme-js-js">
    </script>
    <script src="wp-content/plugins/elementor/assets/js/webpack.runtime.min94b7.js?ver=3.31.3"
        id="elementor-webpack-runtime-js"></script>
    <script src="wp-content/plugins/elementor/assets/js/frontend-modules.min94b7.js?ver=3.31.3"
        id="elementor-frontend-modules-js"></script>
    <script src="wp-includes/js/jquery/ui/core.minb37e.js?ver=1.13.3" id="jquery-ui-core-js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('js')
<script>
    $.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});

$(document).ready(function () {
    function showAlert(icon, title, position = 'top-end', timer = 2000) {
        if (typeof Swal !== 'undefined') {
            Swal.fire({
                toast: true,
                icon: icon,
                title: title,
                position: position,
                timer: timer,
                timerProgressBar: true,
                showConfirmButton: false,
                didOpen: () => {
                    // Hide vertical scroll when toast appears
                    document.body.style.overflowY = 'hidden';
                },
                didClose: () => {
                    // Restore scroll when toast closes
                    document.body.style.overflowY = '';
                }
            });
        } else {
            alert(title);
        }
    }


    // Add to Cart for digital items
    $(document).on("click", ".addToCart", function () {
        let btn = $(this);
        let url = btn.data("url");
        let product_id = btn.data("product");
        let originalText = btn.text();
        btn.text("Adding...").prop("disabled", true);

        $.post(url, { product: product_id, qty: 1 }, function (res) {
            if (res.status) {
                btn.closest(".cart-action-wrapper").html(res.productCartItem);
                $('.quick-view-modal').fadeOut(300);
                $(".cartCount").text(res.cartCount);
                $(".cartCountBadge").text(res.cartItemsCount);
                $(".cartTotalPrice").text(res.cartTotal.toFixed(2) + " tk");
                $(".mobileCartTotalPrice").text('৳' + res.cartTotal.toFixed(2));
                showAlert("success", res.message);
            } else {
                btn.text(originalText).prop("disabled", false);
                showAlert("error", res.message);
            }
        }).fail(() => {
            btn.text(originalText).prop("disabled", false);
            showAlert("error", "Could not add to cart.");
        });
    });

    // Delete Cart Item
    $(document).on("click", ".deleteCartItem", function () {
        let btn = $(this);
        let cartId = btn.data("cart");
        let productId = btn.closest(".cart-action-wrapper").data("product");

        $.post(btn.data("url"), { cart: cartId }, function (res) {
            if (res.status) {
                let wrapper = btn.closest(".cart-action-wrapper");
                wrapper.html(`
                    <input type="hidden" name="product_qty" value="1" class="product_qty">
                    <button class="btn btn-outline-primary w-100 btn-sm addToCart"
                        data-url="${res.add_to_cart_url || '/add-to-cart'}"
                        data-product="${productId}">
                        Buy Now
                    </button>
                `);
                $(".cartCount").text(res.cartCount);
                $(".cartItemsCount").text(res.cartItemsCount);
                $(".cartTotalPrice").text(res.cartTotal.toFixed(2) + " tk");
                $(".mobileCartTotalPrice").text('৳' + res.cartTotal.toFixed(2));
                if ($(".cart-item").length === 0 && $(".cart-page").length) {
                    window.location.href = "/books";
                }
                showAlert("success", res.message);
            }
        }).fail(() => {
            showAlert("error", "Cart item could not be removed.");
        });
    });
});

</script>
<style>
/* Fix toast top-right position */
.swal2-container.swal2-top-end {
    position: fixed !important;
    top: 15px !important;
    right: 15px !important;
    bottom: auto !important;
    left: auto !important;
    z-index: 99999 !important;
    padding: 0 !important;
}

/* Make sure the toast itself does not shift */
.swal2-toast {
    margin: 0 !important;
    box-shadow: 0 2px 10px rgba(0,0,0,0.15);
}

/* Hide vertical scroll when toast is visible */
html.swal2-toast-shown,
body.swal2-toast-shown {
    overflow: hidden !important;
}


</style>


    <script src="wp-content/plugins/elementor/assets/js/frontend.min94b7.js?ver=3.31.3" id="elementor-frontend-js">
    </script>
    <script src="wp-content/plugins/premium-addons-for-elementor/assets/frontend/min-js/isotope.mine952.js?ver=4.11.30"
        id="isotope-js-js"></script>
    <script src="wp-content/plugins/premium-addons-for-elementor/assets/frontend/min-js/slick.mine952.js?ver=4.11.30"
        id="pa-slick-js"></script>
    <script src="wp-includes/js/imagesloaded.minbb93.js?ver=5.0.0" id="imagesloaded-js"></script>

    <script
        src="wp-content/plugins/premium-addons-for-elementor/assets/frontend/min-js/premium-woo-products.mine952.js?ver=4.11.30"
        id="premium-woocommerce-js"></script>
    <script
        src="wp-content/plugins/essential-addons-for-elementor-lite/assets/front-end/js/view/general.mina086.js?ver=6.3.0"
        id="eael-general-js"></script>
    <script src="wp-content/uploads/essential-addons-elementor/eael-9339f.js?ver=1755055795" id="eael-9-js"></script>
    <script src="wp-content/plugins/royal-elementor-addons/assets/js/lib/particles/particles7c45.js?ver=3.0.6"
        id="wpr-particles-js"></script>
    <script src="wp-content/plugins/royal-elementor-addons/assets/js/lib/jarallax/jarallax.minf184.js?ver=1.12.7"
        id="wpr-jarallax-js"></script>
    <script src="wp-content/plugins/royal-elementor-addons/assets/js/lib/parallax/parallax.min5152.js?ver=1.0"
        id="wpr-parallax-hover-js"></script>
    <script src="wp-content/plugins/elementskit-lite/libs/framework/assets/js/frontend-scripta7a0.js?ver=3.6.1"
        id="elementskit-framework-js-frontend-js"></script>
    <script src="wp-content/plugins/elementskit-lite/widgets/init/assets/js/widget-scriptsa7a0.js?ver=3.6.1"
        id="ekit-widget-scripts-js"></script>
    <script src="wp-content/plugins/woocommerce/assets/js/sourcebuster/sourcebuster.min523e.js?ver=10.1.2"
        id="sourcebuster-js-js"></script>

    <script src="wp-content/plugins/woocommerce/assets/js/frontend/order-attribution.min523e.js?ver=10.1.2"
        id="wc-order-attribution-js"></script>
    <script src="wp-content/plugins/header-footer-elementor/inc/js/frontend8dff.js?ver=2.4.9" id="hfe-frontend-js-js">
    </script>
    <script
        src="wp-content/plugins/royal-elementor-addons/assets/js/lib/perfect-scrollbar/perfect-scrollbar.min70b1.js?ver=0.4.9"
        id="wpr-perfect-scroll-js-js"></script>
    <script src="wp-includes/js/underscore.min3ab8.js?ver=1.13.7" id="underscore-js"></script>
    <script id="wp-util-js-extra">
    var _wpUtilSettings = {
        "ajax": {
            "url": "\/wp-admin\/admin-ajax.php"
        }
    };
    </script>
    <script src="wp-includes/js/wp-util.min6c2d.js?ver=6.8.2" id="wp-util-js"></script>
    <script id="wc-add-to-cart-variation-js-extra">
    var wc_add_to_cart_variation_params = {
        "wc_ajax_url": "\/?wc-ajax=%%endpoint%%",
        "i18n_no_matching_variations_text": "Sorry, no products matched your selection. Please choose a different combination.",
        "i18n_make_a_selection_text": "Please select some product options before adding this product to your cart.",
        "i18n_unavailable_text": "Sorry, this product is unavailable. Please choose a different combination.",
        "i18n_reset_alert_text": "Your selection has been reset. Please select some product options before adding this product to your cart."
    };
    </script>
    <script src="wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart-variation.min523e.js?ver=10.1.2"
        id="wc-add-to-cart-variation-js" defer data-wp-strategy="defer"></script>
    <script src="wp-content/plugins/elementskit-lite/widgets/init/assets/js/animate-circle.mina7a0.js?ver=3.6.1"
        id="animate-circle-js"></script>

    <script src="wp-content/plugins/elementskit-lite/widgets/init/assets/js/elementora7a0.js?ver=3.6.1"
        id="elementskit-elementor-js"></script>
    <script data-cfasync="false"
        src="wp-content/plugins/royal-elementor-addons/assets/js/frontend.min75d8.js?ver=1.7.1031"
        id="wpr-addons-js-js"></script>
    <script src="wp-content/plugins/royal-elementor-addons/assets/js/modal-popups.min75d8.js?ver=1.7.1031"
        id="wpr-modal-popups-js-js"></script>
    <script>
    /(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window
        .addEventListener("hashchange", function() {
            var t, e = location.hash.substring(1);
            /^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (/^(?:a|select|input|button|textarea)$/i
                .test(t.tagName) || (t.tabIndex = -1), t.focus())
        }, !1);
    </script>
</body>

</html>