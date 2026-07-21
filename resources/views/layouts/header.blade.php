<header>

    <!-- start navigation -->

    <nav class="navbar navbar-expand-lg header-light bg-transparent disable-fixed">

        <div class="container-fluid">

            <div class="">

                <a class="navbar-brand" href="{{ route('home') }}">

                    {{-- <h3 class="default-logo">LOGO</h3> --}}
                    {{-- <img src="{{asset('images/logo.png')}}"
                            data-at2x="images/demo-scattered-portfolio-logo-black@2x.png" alt="" class="default-logo"> --}}

                    {{-- <img src="images/demo-scattered-portfolio-logo-black.png"
                            data-at2x="images/demo-scattered-portfolio-logo-black@2x.png" alt="" class="alt-logo">

                        <img src="images/demo-scattered-portfolio-logo-black.png"
                            data-at2x="images/demo-scattered-portfolio-logo-black@2x.png" alt="" class="mobile-logo">  --}}

                </a>

            </div>

            <div class="col-auto menu-order position-static">

                <button class="navbar-toggler float-start" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">

                    <span class="navbar-toggler-line"></span>

                    <span class="navbar-toggler-line"></span>

                    <span class="navbar-toggler-line"></span>

                    <span class="navbar-toggler-line"></span>

                </button>

                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">

                    <ul class="navbar-nav">

                        <li class="nav-item"><a href="#" class="nav-link">Products</a></li>

                        <li class="nav-item"><a href="#" class="nav-link">Solutions</a></li>

                            <li class="has-submenu">
                                <a href="#" class="nav-link">Channels ▾</a>

                                <ul class="submenu">
                                    <li><a href="#">RCS RCS Business Messaging</a></li>
                                    <li><a href="#">Bulk SMS</a></li>
                                    <li><a href="#">Voice SMS</a></li>
                                    <li><a href="#">WhatsApp Business API</a></li>
                                    <li><a href="#">Digital-Marketing</a></li>
                                </ul>
                            </li>


                        <li class="nav-item"><a href="#" class="nav-link">Resources</a></li>
                            <li class="has-submenu">
                                <a href="#" class="nav-link">Company ▾</a>

                                <ul class="submenu">
                                    <li><a href="/">Home</a></li>
                                    <li><a href="{{ route('about') }}">About Us</a></li>
                                </ul>
                            </li>


                        </li>

                    </ul>

                </div>

            </div>


            <!-- 🔹 Toggle Button -->
            <button class="menu-toggle" id="menuToggle" type="button"
                    aria-controls="fullscreenMenu" aria-expanded="false" aria-label="Open menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>

            <!-- 🔹 Navigation overlay -->
            <div class="fullscreen-menu" id="fullscreenMenu" role="dialog" aria-modal="true"
                 aria-label="Site navigation">
                <div class="menu-content">

                    <!-- Left column: brand visual -->
                    <div class="menu-left">
                        <img src="{{ asset('images/services.png') }}" alt="" aria-hidden="true">
                        <div class="nav-visual">
                            <strong>Every channel your customer already uses.</strong>
                            <span>SMS &middot; RCS &middot; Voice &middot; WhatsApp Business API</span>
                        </div>
                    </div>

                    <!-- Right column: navigation -->
                    <div class="menu-right">
                        <button class="nav-close" id="menuClose" type="button" aria-label="Close menu">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" aria-hidden="true">
                                <path d="M6 6l12 12M18 6L6 18" />
                            </svg>
                        </button>

                        <p class="nav-eyebrow">Menu</p>

                        @php
                            $navItems = [
                                ['route' => 'home',              'label' => 'Home'],
                                ['route' => 'channel',           'label' => 'Channels'],
                                ['route' => 'industry-solution', 'label' => 'Industries'],
                                ['route' => 'election-campaign', 'label' => 'Election campaigns'],
                                ['route' => 'about',             'label' => 'About us'],
                                ['route' => 'contact',           'label' => 'Contact'],
                            ];
                        @endphp

                        <ul class="nav-list">
                            @foreach ($navItems as $i => $item)
                                <li>
                                    <a class="nav-link" href="{{ route($item['route']) }}"
                                       @if (request()->routeIs($item['route'])) aria-current="page" @endif>
                                        <span class="nav-link__idx">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                        <span class="nav-link__label">{{ $item['label'] }}</span>
                                        <svg class="nav-link__arrow" viewBox="0 0 24 24" fill="none"
                                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" aria-hidden="true">
                                            <path d="M5 12h14M13 6l6 6-6 6" />
                                        </svg>
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <div class="nav-foot">
                            <a href="mailto:info@admagister.com">info@admagister.com</a>
                            <p>Ad Magister Pvt. Ltd. &middot; Gurugram 122002</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </nav>

    <!-- end navigation -->
    <script>
        (function () {
            const menuToggle = document.getElementById("menuToggle");
            const menuClose = document.getElementById("menuClose");
            const fullscreenMenu = document.getElementById("fullscreenMenu");

            if (!menuToggle || !fullscreenMenu) return;

            const FOCUSABLE = 'a[href], button:not([disabled]), input, select, textarea, [tabindex]:not([tabindex="-1"])';
            let lastFocused = null;

            function isOpen() {
                return fullscreenMenu.classList.contains("show");
            }

            function openMenu() {
                lastFocused = document.activeElement;
                fullscreenMenu.classList.add("show");
                document.body.classList.add("no-scroll");
                menuToggle.classList.add("active");
                menuToggle.setAttribute("aria-expanded", "true");
                menuToggle.setAttribute("aria-label", "Close menu");

                // Move focus into the panel so the keyboard doesn't stay
                // stranded on the page behind it.
                const first = fullscreenMenu.querySelector(FOCUSABLE);
                if (first) first.focus();
            }

            function closeMenu() {
                fullscreenMenu.classList.remove("show");
                document.body.classList.remove("no-scroll");
                menuToggle.classList.remove("active");
                menuToggle.setAttribute("aria-expanded", "false");
                menuToggle.setAttribute("aria-label", "Open menu");

                if (lastFocused) lastFocused.focus();
            }

            menuToggle.addEventListener("click", function () {
                isOpen() ? closeMenu() : openMenu();
            });

            if (menuClose) menuClose.addEventListener("click", closeMenu);

            // Close on navigation so returning via the back button doesn't
            // land on a page with the overlay still up.
            fullscreenMenu.querySelectorAll(".nav-link").forEach(function (link) {
                link.addEventListener("click", closeMenu);
            });

            document.addEventListener("keydown", function (e) {
                if (!isOpen()) return;

                if (e.key === "Escape") {
                    closeMenu();
                    return;
                }

                // Keep Tab cycling inside the dialog while it is open.
                if (e.key !== "Tab") return;

                const items = Array.from(fullscreenMenu.querySelectorAll(FOCUSABLE))
                    .filter(function (el) { return el.offsetParent !== null; });
                if (!items.length) return;

                const first = items[0];
                const last = items[items.length - 1];

                if (e.shiftKey && document.activeElement === first) {
                    e.preventDefault();
                    last.focus();
                } else if (!e.shiftKey && document.activeElement === last) {
                    e.preventDefault();
                    first.focus();
                }
            });
        })();

            document.addEventListener('DOMContentLoaded', function() {
                const headerOffset = 70; // set to height of your fixed header (0 if none)

                // helper: scroll to element with optional offset
                function smoothScrollToElement(el) {
                    if (!el) return;
                    if (headerOffset === 0) {
                        el.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                        return;
                    }
                    const top = el.getBoundingClientRect().top + window.pageYOffset - headerOffset;
                    window.scrollTo({
                        top,
                        behavior: 'smooth'
                    });
                }

                // handle clicks on in-page anchors
                document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                    anchor.addEventListener('click', function(e) {
                        const hash = this.getAttribute('href');
                        if (!hash || hash === '#') return;

                        const target = document.querySelector(hash);
                        if (!target) return;

                        e.preventDefault();

                        // Scroll smoothly
                        smoothScrollToElement(target);

                        // Update URL hash so back button / link copying works
                        // Use pushState so it doesn't jump
                        if (history.pushState) {
                            history.pushState(null, '', hash);
                        } else {
                            // fallback
                            location.hash = hash;
                        }
                    });
                });

                // If page loads with a hash, scroll to it (after any layout)
                if (location.hash) {
                    // slight delay ensures layout (images etc.) didn't change position afterwards
                    setTimeout(() => {
                        const el = document.querySelector(location.hash);
                        if (el) smoothScrollToElement(el);
                    }, 50);
                }
            });


    </script>

</header>
