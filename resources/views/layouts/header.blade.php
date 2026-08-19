<header>

    <!-- start navigation -->

    @php
        // Every entry resolves to a real route. The previous menu pointed six
        // links at "#" and two at #bulk-sms-article / #voice-sms-article, which
        // are not IDs that exist in any view.
        $megaMenu = [
            [
                'label' => 'Channels',
                'match' => ['channel'],
                'items' => [
                    ['route' => 'channel', 'label' => 'RCS Business Messaging'],
                    ['route' => 'channel', 'label' => 'Bulk SMS'],
                    ['route' => 'channel', 'label' => 'Voice & IVR'],
                    ['route' => 'channel', 'label' => 'WhatsApp Business API'],
                    ['route' => 'channel', 'label' => 'Digital marketing'],
                ],
            ],
            [
                'label' => 'Solutions',
                'match' => ['industry-solution', 'election-campaign', 'dlt-registration'],
                'items' => [
                    ['route' => 'industry-solution', 'label' => 'Industry solutions'],
                    ['route' => 'election-campaign', 'label' => 'Election campaigns'],
                    ['route' => 'dlt-registration', 'label' => 'DLT registration'],
                ],
            ],
            [
                'label' => 'Company',
                'match' => ['about', 'contact'],
                'items' => [
                    ['route' => 'about',   'label' => 'About us'],
                    ['route' => 'contact', 'label' => 'Contact'],
                ],
            ],
        ];
    @endphp

    <nav class="navbar navbar-expand-lg header-light disable-fixed hdr">

        <div class="container-fluid hdr-inner">

            <a class="navbar-brand hdr-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Ad Magister — home" class="hdr-logo">
            </a>

            <div class="col-auto menu-order position-static">

                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">

                    <ul class="navbar-nav hdr-nav">

                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="hdr-link"
                               @if (request()->routeIs('home')) aria-current="page" @endif>Home</a>
                        </li>

                        @foreach ($megaMenu as $mi => $group)
                            @php $groupId = 'hdrMenu' . $mi; @endphp
                            <li class="nav-item has-submenu">
                                <button type="button" class="hdr-link hdr-trigger"
                                        aria-expanded="false" aria-controls="{{ $groupId }}"
                                        @if (request()->routeIs($group['match'])) aria-current="page" @endif>
                                    {{ $group['label'] }}
                                    <svg class="hdr-caret" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                         stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"
                                         aria-hidden="true">
                                        <path d="M6 9l6 6 6-6" />
                                    </svg>
                                </button>

                                @php
                                    // Several Channels entries are sections of one page. Only claim
                                    // aria-current when an item is the sole owner of its route,
                                    // otherwise five links all announce themselves as "current page".
                                    $routeCounts = array_count_values(array_column($group['items'], 'route'));
                                @endphp

                                <ul class="submenu" id="{{ $groupId }}">
                                    @foreach ($group['items'] as $item)
                                        <li>
                                            <a href="{{ route($item['route']) }}"
                                               @if ($routeCounts[$item['route']] === 1 && request()->routeIs($item['route'])) aria-current="page" @endif>{{ $item['label'] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach

                    </ul>

                </div>

            </div>

            <div class="hdr-actions">
                <a href="{{ route('contact') }}" class="hdr-cta">Talk to sales</a>

                <!-- 🔹 Toggle Button -->
                <button class="menu-toggle" id="menuToggle" type="button"
                        aria-controls="fullscreenMenu" aria-expanded="false" aria-label="Open menu">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </button>
            </div>

        </div>

    </nav>

    {{--
        The overlay lives OUTSIDE <nav> deliberately. .hdr uses backdrop-filter,
        which makes it a containing block for position:fixed descendants — nest
        this back inside and the overlay gets clipped to the header bar.
    --}}
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
                                ['route' => 'dlt-registration',  'label' => 'DLT registration'],
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

        /* ---- header dropdowns ------------------------------------------
           The old menu opened on :hover only, which meant no keyboard access
           and a first tap on touch that opened nothing. */
        (function () {
            const triggers = Array.from(document.querySelectorAll('.hdr-trigger'));
            if (!triggers.length) return;

            function closeAll(except) {
                triggers.forEach(function (t) {
                    if (t !== except) t.setAttribute('aria-expanded', 'false');
                });
            }

            triggers.forEach(function (trigger) {
                trigger.addEventListener('click', function (e) {
                    e.preventDefault();
                    const open = trigger.getAttribute('aria-expanded') === 'true';
                    closeAll(trigger);
                    trigger.setAttribute('aria-expanded', open ? 'false' : 'true');
                });
            });

            document.addEventListener('click', function (e) {
                if (!e.target.closest('.has-submenu')) closeAll(null);
            });

            document.addEventListener('keydown', function (e) {
                if (e.key !== 'Escape') return;

                const open = triggers.find(function (t) {
                    return t.getAttribute('aria-expanded') === 'true';
                });

                if (open) {
                    open.setAttribute('aria-expanded', 'false');
                    open.focus();
                }
            });

            // Closing on blur-out keeps the panel from lingering once focus
            // has tabbed past the last item in it.
            document.addEventListener('focusin', function (e) {
                if (!e.target.closest('.has-submenu')) closeAll(null);
            });
        })();

        /* ---- sticky header shadow -------------------------------------- */
        (function () {
            const header = document.querySelector('.hdr');
            if (!header) return;

            // A zero-height sentinel above the header is cheaper than a scroll
            // listener: the observer only fires when the state actually flips.
            const sentinel = document.createElement('div');
            sentinel.setAttribute('aria-hidden', 'true');
            sentinel.style.cssText = 'position:absolute;top:0;left:0;height:1px;width:1px;pointer-events:none;';
            header.parentNode.insertBefore(sentinel, header);

            new IntersectionObserver(function (entries) {
                header.classList.toggle('is-stuck', !entries[0].isIntersecting);
            }).observe(sentinel);
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
