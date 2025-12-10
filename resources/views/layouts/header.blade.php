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
            <!-- 🔹 Toggle Button -->
            <div class="menu-toggle" id="menuToggle">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>

            <!-- 🔹 Fullscreen Menu -->
            <div class="fullscreen-menu" id="fullscreenMenu">
                <div class="menu-content">
                    <!-- Left column -->
                    <div class="menu-left">
                        <img src="{{ asset('images/services.png') }}" alt="Menu Image">
                    </div>
                    <!-- Right column -->
                    <div class="menu-right">
                        <div class="rughtMainMenu rughtMainMenu sr-chip-container" style=" margin: 0 auto; width: 100%;text-align: center;">
                            <div class="d-flex justify-content-between mb-5" style="gap: 15px;width: 100%;">
                                <ul class="header-menu toggleMenu">
                                    <li><a class="header-chip-btn" href="{{route('home')}}#bulk-sms-article">Product</a></li>

                                    <li><a class="header-chip-btn" href="{{route('home')}}#voice-sms-article">Solution</a></li>

                                    <!-- Support with dropdown submenu -->
                                    <li>
                                        <a class="header-chip-btn" href="{{route('home')}}#voice-sms-article">Support</a>


                                    </li>

                                    <li><a class="header-chip-btn" href="{{ route('contact') }}">Contact</a></li>
                                </ul>


                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </nav>

    <!-- end navigation -->
    <script>
        const menuToggle = document.getElementById("menuToggle");
        const fullscreenMenu = document.getElementById("fullscreenMenu");

        menuToggle.addEventListener("click", () => {
            fullscreenMenu.classList.toggle("show");
            document.body.classList.toggle("no-scroll");

            // 🔹 toggle the animated hamburger -> cross
            menuToggle.classList.toggle("active");
        });

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
