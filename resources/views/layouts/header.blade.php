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

                        <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Home</a></li>

                        <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>

                        <li class="nav-item"><a href="{{ route('channel') }}" class="nav-link">Channel</a></li>

                        <li class="nav-item"><a href="{{ route('industry-solution') }}" class="nav-link">Industries
                                Solution</a>
                        </li>



                        {{-- <li class="nav-item"><a href="{{route('election-campaign')}}" class="nav-link ">Election-Campaign</a> --}}
                        </li>



                        {{-- <li class="nav-item"><a href="{{route('election-campaign')}}" class="nav-link ">DLT Registration</a> --}}
                        </li>

                        <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>

                        <li class="nav-item"><a href="demo-scattered-portfolio-contact.html"
                                class="nav-link">Payment</a></li>

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
                            <div class="d-flex justify-content-between mb-5" style="gap: 15px;">
                                <ul>
                                    <li><a class="header-chip-btn "  href="{{route('home')}}#bulk-sms-article">Bulk Sms</a></li>
                                    <li><a class="header-chip-btn " href="{{route('home')}}#voice-sms-article">Voice SMS</a></li>
                                    
                                </ul>
                                <ul>
                                    <li><a class="header-chip-btn " href="{{route('home')}}#otp-sms-article">OTP SMS</a></li>
                                    <li><a class="header-chip-btn " href="{{route('home')}}#transactional-sms-article">WhatsApp API</a></li>
                                </ul>
                                <ul>
                                    
                                    <li><a class="header-chip-btn " href="{{route('home')}}#missed-call-article">Missed Call</a></li>
                                    <li><a class="header-chip-btn " href="{{route('home')}}#digital-marketing-article">Digital Marketing</a></li>
                                </ul>
                                <ul>
                                    <li><a class="header-chip-btn " href="{{route('home')}}#web-development-article">Web Development</a></li>
                                    <li><a class="header-chip-btn " href="{{route('home')}}#web-development-article">RCS</a></li>
                                </ul>
                            </div>
                            <p>UGF- 6, Antariksh Bhawan, KG Marg, New Delhi-110001</p>
                            <p>info@spj-group.com | +91 - 9055290552</p>
                            <div class="d-flex gap-4 socialMediaIcon ">
                                <a class="smIcons facebook " href="https://www.facebook.com/" target="_blank">Fb.</a>
                                <a class="smIcons twitter" href="https://www.twitter.com" target="_blank">Tw.</a>
                                <a class="smIcons linkedin" href="http://www.linkedin.com" target="_blank">In.</a>
                                <a class="smIcons instagram" href="http://www.instagram.com" target="_blank">Ig.</a>
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
