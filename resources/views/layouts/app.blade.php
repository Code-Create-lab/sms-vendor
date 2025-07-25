<!doctype html>

<html class="no-js" lang="en">

<head>

    <title>Digital Agency</title>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="author" content="Lorem">

    <meta name="viewport" content="width=device-width,initial-scale=1.0" />

    <meta name="description" content="">

    <!-- favicon icon -->

    <link rel="shortcut icon" href="images/favicon.png">

    <link rel="apple-touch-icon" href="images/apple-touch-icon-57x57.png">

    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">

    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

    <!-- google fonts preconnect -->

    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- style sheets and font icons  -->

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendors.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/icon.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/responsive.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('demos/scattered-portfolio/scattered-portfolio.css') }}" />


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js"></script>
     @livewireStyles
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"
    integrity="sha512-BdHyGtczsUoFcEma+MfXc71KJLv/cd+sUsUaYYf2mXpfG/PtBjNXsPo78+rxWjscxUYN2Qr2+DbeGGiJx81ifg=="
    crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<body data-mobile-nav-style="full-screen-menu" class="background-position-center-top custom-cursor"
    data-mobile-nav-bg-color="#232323" class="background-position-center-top background-repeat custom-cursor"
    style="background-image: url(images/vertical-line-bg-small-medium-gray.svg)">

    <!-- start cursor -->

    <div class="cursor-page-inner">

        <div class="circle-cursor circle-cursor-inner"></div>

        <div class="circle-cursor circle-cursor-outer"></div>

    </div>
    {{-- @cookieConsent --}}



    <!-- end cursor -->

    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
     {{-- @include('cookie-consent::index') --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    @livewireScripts

    <!-- start sticky elements -->

    <div class="sticky-wrap z-index-1 d-none d-xl-inline-block" data-animation-delay="100" data-shadow-animation="true">

        <div class="elements-social social-icon-style-10">

            <ul class="fs-14">

                <li class="me-30px"><a class="facebook" href="https://www.facebook.com/" target="_blank">

                        <i class="fa-brands fa-facebook-f me-10px"></i>

                        <span class="fw-600">Facebook</span>

                    </a>

                </li>

                <li class="me-30px">

                    <a class="dribbble" href="http://www.dribbble.com" target="_blank">

                        <i class="fa-brands fa-dribbble me-10px"></i>

                        <span class="fw-600">Dribbble</span>

                    </a>

                </li>

                <li class="me-30px">

                    <a class="twitter" href="https://www.twitter.com" target="_blank">

                        <i class="fa-brands fa-twitter me-10px"></i>

                        <span class="fw-600">Twitter</span>

                    </a>

                </li>

                <li>

                    <a class="instagram" href="https://www.instagram.com" target="_blank">

                        <i class="fa-brands fa-instagram me-10px"></i>

                        <span class="fw-600">Instagram</span>

                    </a>

                </li>

            </ul>

        </div>

    </div>

    <!-- end sticky elements -->

    <!-- start scroll progress -->

    <div class="scroll-progress d-none d-xxl-block">

        <a href="#" class="scroll-top" aria-label="scroll">

            <span class="scroll-text">Scroll</span><span class="scroll-line"><span class="scroll-point"></span></span>

        </a>

    </div>

    <!-- end scroll progress -->

    <!-- javascript libraries -->

    <!-- <script data-cfasync="false">
        ! function() {
            "use strict";

            function e(e) {
                try {
                    if ("undefined" == typeof console) return;
                    "error" in console ? console.error(e) : console.log(e)
                } catch (e) {}
            }

            function t(e) {
                return d.innerHTML = '<a href="' + e.replace(/"/g, "&quot;") + '"></a>', d.childNodes[0].getAttribute(
                    "href") || ""
            }

            function r(e, t) {
                var r = e.substr(t, 2);
                return parseInt(r, 16)
            }

            function n(n, c) {
                for (var o = "", a = r(n, c), i = c + 2; i < n.length; i += 2) {
                    var l = r(n, i) ^ a;
                    o += String.fromCharCode(l)
                }
                try {
                    o = decodeURIComponent(escape(o))
                } catch (u) {
                    e(u)
                }
                return t(o)
            }

            function c(t) {
                for (var r = t.querySelectorAll("a"), c = 0; c < r.length; c++) try {
                    var o = r[c],
                        a = o.href.indexOf(l);
                    a > -1 && (o.href = "mailto:" + n(o.href, a + l.length))
                } catch (i) {
                    e(i)
                }
            }

            function o(t) {
                for (var r = t.querySelectorAll(u), c = 0; c < r.length; c++) try {
                    var o = r[c],
                        a = o.parentNode,
                        i = o.getAttribute(f);
                    if (i) {
                        var l = n(i, 0),
                            d = document.createTextNode(l);
                        a.replaceChild(d, o)
                    }
                } catch (h) {
                    e(h)
                }
            }

            function a(t) {
                for (var r = t.querySelectorAll("template"), n = 0; n < r.length; n++) try {
                    i(r[n].content)
                } catch (c) {
                    e(c)
                }
            }

            function i(t) {
                try {
                    c(t), o(t), a(t)
                } catch (r) {
                    e(r)
                }
            }
            var l = "/cdn-cgi/l/email-protection#",
                u = ".__cf_email__",
                f = "data-cfemail",
                d = document.createElement("div");
            i(document),
                function() {
                    var e = document.currentScript || document.scripts[document.scripts.length - 1];
                    e.parentNode.removeChild(e)
                }()
        }();
    </script> -->
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/vendors.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

    <script data-cfasync="false" src="{{ asset('js/email-decode.min.js') }}"></script>

    {{-- <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXbrQhbrrdjSTVaPzJeILiZP_asMgUIrw&callback=initMap"></script> --}}

    <script>
        window.addEventListener("load", function() {
            window.cookieconsent.initialise({
                palette: {
                    popup: {
                        background: "#000"
                    },
                    button: {
                        background: "#f1d600"
                    }
                },
                theme: "classic",
                content: {
                    message: "This website uses cookies to ensure you get the best experience.",
                    dismiss: "Got it!",
                    link: "Learn more",
                    href: "/privacy-policy"
                }
            })
        });
    </script>


</body>


</html>
