<header>

    <!-- start navigation -->

    @php
        // Every entry resolves to a real route. The previous menu pointed six
        // links at "#" and two at #bulk-sms-article / #voice-sms-article, which
        // are not IDs that exist in any view.
        // Channels is a plain link (every channel lives on the one /channel
        // page), so only the groups that lead to several pages stay here.
        $megaMenu = [
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

                        <li class="nav-item">
                            <a href="{{ route('channel') }}" class="hdr-link"
                               @if (request()->routeIs('channel')) aria-current="page" @endif>Channels</a>
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
    <!-- 🔹 Navigation drawer -->
    {{--
        A side drawer rather than a full-screen takeover: on wide screens the old
        overlay stretched seven rows across ~800px of empty white. The groups reuse
        $megaMenu so the drawer and the desktop dropdowns can never list different
        pages.
    --}}
    <div class="mnav" id="fullscreenMenu" role="dialog" aria-modal="true" aria-label="Site navigation">

        <div class="mnav__scrim" data-menu-dismiss></div>

        <div class="mnav__panel">

            <div class="mnav__head">
                <a href="{{ route('home') }}" class="mnav__brand">
                    <img src="{{ asset('images/logo.png') }}" alt="Ad Magister — home">
                </a>
                <button class="mnav__close" id="menuClose" type="button" aria-label="Close menu">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" aria-hidden="true">
                        <path d="M6 6l12 12M18 6L6 18" />
                    </svg>
                </button>
            </div>

            <nav class="mnav__body" aria-label="Main">
                <ul class="mnav__list">
                    <li>
                        <a class="mnav__link" href="{{ route('home') }}"
                           @if (request()->routeIs('home')) aria-current="page" @endif>
                            Home
                        </a>
                    </li>

                    <li>
                        <a class="mnav__link" href="{{ route('channel') }}"
                           @if (request()->routeIs('channel')) aria-current="page" @endif>
                            Channels
                        </a>
                    </li>

                    @foreach ($megaMenu as $group)
                        @php
                            $routeCounts = array_count_values(array_column($group['items'], 'route'));
                            $groupActive = request()->routeIs($group['match']);
                        @endphp
                        <li>
                            {{-- Native <details>: keyboard and screen-reader support with no JS.
                                 The group holding the current page starts open. --}}
                            <details class="mnav__group" @if ($groupActive) open @endif>
                                <summary class="mnav__link @if ($groupActive) is-active @endif">
                                    {{ $group['label'] }}
                                    <svg class="mnav__caret" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                         aria-hidden="true">
                                        <path d="M6 9l6 6 6-6" />
                                    </svg>
                                </summary>
                                <ul class="mnav__sub">
                                    @foreach ($group['items'] as $item)
                                        <li>
                                            <a href="{{ route($item['route']) }}"
                                               @if ($routeCounts[$item['route']] === 1 && request()->routeIs($item['route'])) aria-current="page" @endif>{{ $item['label'] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </details>
                        </li>
                    @endforeach
                </ul>
            </nav>

            <div class="mnav__foot">
                <a href="{{ route('contact') }}" class="mnav__cta">
                    Talk to sales
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M5 12h14M13 6l6 6-6 6" />
                    </svg>
                </a>

                <div class="mnav__contact">
                    <a href="tel:+919999238814">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                             stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z" />
                        </svg>
                        +91 99992 38814
                    </a>
                    <a href="mailto:info@admagister.com">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                             stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1z" />
                            <path d="M3.4 6.3 12 12.5l8.6-6.2" />
                        </svg>
                        info@admagister.com
                    </a>
                </div>

                <p class="mnav__addr">Ad Magister Pvt. Ltd. &middot; Noida 201301</p>
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

            const FOCUSABLE = 'a[href], button:not([disabled]), summary, input, select, textarea, [tabindex]:not([tabindex="-1"])';
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
                const first = menuClose || fullscreenMenu.querySelector(FOCUSABLE);
                if (first) first.focus({ preventScroll: true });
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
            fullscreenMenu.querySelectorAll("a[href], [data-menu-dismiss]").forEach(function (el) {
                el.addEventListener("click", closeMenu);
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
