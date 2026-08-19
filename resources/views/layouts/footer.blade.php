@php
    /*
     |--------------------------------------------------------------------------
     | Site footer  (namespace: .amf — "Ad Magister footer")
     |--------------------------------------------------------------------------
     | Global footer, included on every page from layouts/app.blade.php. Styling
     | lives in public/css/custom.css (loaded on every page) — NOT in site.css,
     | which only ships on the homepage. Motion here is CSS keyframes + a tiny
     | self-contained IntersectionObserver, so it works without the homepage
     | Motion bundle.
     |
     | Layout mirrors the "footer-elementor-inner" pattern: a big "Let's
     | collaborate" CTA on top, then link columns, then a bottom bar.
     */
    $amfAddress = 'Office No. 305, 3rd Floor, Vashisht Commercial Complex, '
                . 'Opp. Pillar No. 52, MG Road, Sikandarpur, Gurugram 122002, Haryana';
    $amfPhone   = '+91 9999238814';
    $amfPhoneTel = '+919999238814';
    $amfEmail   = 'info@admagister.com';

    // "Quick Links" mirrored from bulksmsdelhincr.com. These point at that
    // domain, not at routes in this app, so they stay absolute and open in a
    // new tab — same targets as the source footer.
    $amfQuickLinks = [
        ['label' => 'Bulk SMS Noida',     'url' => 'https://bulksmsdelhincr.com/bulk-sms-service-in-noida.php'],
        ['label' => 'Bulk SMS Gurugram',  'url' => 'https://bulksmsdelhincr.com/bulk-sms-service-in-gurgaon.php'],
        ['label' => 'Bulk SMS Mumbai',    'url' => 'https://bulksmsdelhincr.com/bulk-sms-mumbai.php'],
        ['label' => 'Bulk SMS Lucknow',   'url' => 'https://bulksmsdelhincr.com/bulk-sms-lucknow.php'],
        ['label' => 'Bulk SMS Bangalore', 'url' => 'https://bulksmsdelhincr.com/bulk-sms-service-in-bangalore.php'],
        ['label' => 'Bulk SMS Faridabad', 'url' => 'https://bulksmsdelhincr.com/bulk-sms-faridabad.php'],
    ];
@endphp

<footer class="amf" role="contentinfo">

    {{-- Decorative background: two drifting glows + a hairline grid + a giant
         watermark wordmark. All aria-hidden — texture only, never content. --}}
    <div class="amf-bg" aria-hidden="true">
        <span class="amf-bg__glow amf-bg__glow--1"></span>
        <span class="amf-bg__glow amf-bg__glow--2"></span>
        <span class="amf-bg__grid"></span>
        <span class="amf-bg__mark">Ad Magister</span>
    </div>

    <div class="amf-inner">

        {{-- ==================== COLLABORATE CTA ==================== --}}
        {{-- NB: this is a <div>, not a <section>, on purpose — the theme's
             scroll layout script (skrollr / main.js) hoists every top-level
             <section> into main.da > .page-layout, which would rip this block
             out of the footer. A <div> is left alone. --}}
        <div class="amf-collab" role="region" aria-labelledby="amf-collab-title">

            <div class="amf-collab__intro amf-reveal">
                <span class="amf-eyebrow">Let&rsquo;s collaborate</span>
                <h2 id="amf-collab-title" class="amf-collab__title">
                    Pitch us <em>your idea.</em>
                </h2>
                <p class="amf-collab__lede">
                    Discuss a new project or just say hello &mdash; tell us what you need to
                    send and to how many, and we&rsquo;ll come back with the right channel mix.
                </p>

                <a class="amf-call" href="tel:{{ $amfPhoneTel }}">
                    <span class="amf-call__label">Call for project</span>
                    <span class="amf-call__num">{{ $amfPhone }}</span>
                </a>
            </div>

            {{-- No backend contact route exists (the /contact form is a disabled
                 Livewire component), so this composes a real mail draft instead
                 of POSTing into the void. --}}
            <form class="amf-form amf-reveal" data-amf-form
                  action="mailto:{{ $amfEmail }}" method="post" enctype="text/plain">
                <div class="amf-field amf-field--half">
                    <label for="amf-name">Name</label>
                    <input type="text" id="amf-name" name="name" placeholder="Your name" required>
                </div>
                <div class="amf-field amf-field--half">
                    <label for="amf-email">Email</label>
                    <input type="email" id="amf-email" name="email" placeholder="you@company.com" required>
                </div>
                <div class="amf-field">
                    <label for="amf-subject">Subject</label>
                    <input type="text" id="amf-subject" name="subject" placeholder="What&rsquo;s this about?">
                </div>
                <div class="amf-field">
                    <label for="amf-message">Message</label>
                    <textarea id="amf-message" name="message" rows="3"
                              placeholder="Channels, volumes, timelines&hellip;" required></textarea>
                </div>
                <button type="submit" class="amf-submit">
                    Send message
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M5 12h14M13 6l6 6-6 6" />
                    </svg>
                </button>
                <p class="amf-form__hint" data-amf-hint aria-live="polite"></p>
            </form>
        </div>

        {{-- ==================== LINK COLUMNS ==================== --}}
        <div class="amf-cols">

            {{-- Brand + social --}}
            <div class="amf-col amf-col--brand amf-reveal">
                <a href="{{ route('home') }}" class="amf-brand">Ad&nbsp;Magister</a>
                <p class="amf-brand__tag">
                    Omni-channel business messaging &mdash; SMS, RCS, Voice and WhatsApp
                    campaigns on DLT-registered routes, from one platform.
                </p>
                <div class="amf-social">
                    <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                        <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M14 9h3V6h-3c-1.7 0-3 1.3-3 3v2H8v3h3v6h3v-6h2.5l.5-3H14V9c0-.6.4-1 1-1z"/></svg>
                    </a>
                    <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
                    </a>
                    <a href="https://www.linkedin.com/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                        <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M6.5 8A1.5 1.5 0 1 0 6.5 5a1.5 1.5 0 0 0 0 3zM5 9.5h3V19H5zM10 9.5h2.9v1.3h.04c.4-.75 1.4-1.55 2.86-1.55 3.06 0 3.6 2 3.6 4.6V19h-3v-4.2c0-1 0-2.3-1.4-2.3s-1.6 1.1-1.6 2.2V19h-3z"/></svg>
                    </a>
                    <a href="https://wa.me/{{ ltrim($amfPhoneTel, '+') }}" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
                        <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.6 15l-1.3 4.9 5-1.3A10 10 0 1 0 12 2zm0 2a8 8 0 0 1 0 16 8 8 0 0 1-4-1.1l-.3-.2-2.9.8.8-2.8-.2-.3A8 8 0 0 1 12 4zm4.4 9.6c-.2-.1-1.4-.7-1.6-.8s-.4-.1-.5.1-.6.8-.8.9-.3.2-.5.05a6.5 6.5 0 0 1-1.9-1.2 7.2 7.2 0 0 1-1.3-1.7c-.1-.2 0-.4.1-.5l.4-.4.2-.4c.05-.1 0-.3 0-.4l-.7-1.7c-.2-.5-.4-.4-.5-.4h-.5a.9.9 0 0 0-.7.3 2.8 2.8 0 0 0-.9 2.1 4.9 4.9 0 0 0 1 2.6 11 11 0 0 0 4.2 3.7c2.5 1 2.5.7 3 .6a2.5 2.5 0 0 0 1.6-1.2 2 2 0 0 0 .1-1.2c-.05-.1-.2-.15-.4-.25z"/></svg>
                    </a>
                </div>
            </div>

            {{-- Contact --}}
            <div class="amf-col amf-reveal">
                <h3 class="amf-col__title">Get in touch</h3>
                <ul class="amf-contact">
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        <span>{{ $amfAddress }}</span>
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z"/></svg>
                        <a href="tel:{{ $amfPhoneTel }}">{{ $amfPhone }}</a>
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1z"/><path d="M3.4 6.3 12 12.5l8.6-6.2"/></svg>
                        <a href="mailto:{{ $amfEmail }}">{{ $amfEmail }}</a>
                    </li>
                </ul>
            </div>

            {{-- Channels --}}
            <div class="amf-col amf-reveal">
                <h3 class="amf-col__title">Channels</h3>
                <ul class="amf-links">
                    <li><a href="{{ route('channel') }}">Bulk SMS</a></li>
                    <li><a href="{{ route('channel') }}">RCS Business Messaging</a></li>
                    <li><a href="{{ route('channel') }}">Voice &amp; IVR</a></li>
                    <li><a href="{{ route('channel') }}">WhatsApp Business API</a></li>
                    <li><a href="{{ route('channel') }}">Digital marketing</a></li>
                </ul>
            </div>

            {{-- Company --}}
            <div class="amf-col amf-reveal">
                <h3 class="amf-col__title">Company</h3>
                <ul class="amf-links">
                    <li><a href="{{ route('about') }}">About us</a></li>
                    <li><a href="{{ route('industry-solution') }}">Industry solutions</a></li>
                    <li><a href="{{ route('election-campaign') }}">Election campaigns</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                    <li><a href="{{ route('dlt-registration') }}">DLT registration</a></li>
                </ul>
            </div>

            {{-- Quick links (city bulk-SMS pages on bulksmsdelhincr.com) --}}
            <div class="amf-col amf-reveal">
                <h3 class="amf-col__title">Quick Links</h3>
                <ul class="amf-links">
                    @foreach ($amfQuickLinks as $link)
                        <li>
                            <a href="{{ $link['url'] }}" target="_blank" rel="noopener noreferrer">
                                {{ $link['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>

        {{-- ==================== BOTTOM BAR ==================== --}}
        <div class="amf-bottom">
            <div class="amf-bottom__brand">
                <span class="amf-logochip">
                    <img src="{{ asset('images/logo.png') }}" alt="Ad Magister" loading="lazy" decoding="async">
                </span>
                <span>&copy; {{ date('Y') }} Ad Magister. All rights reserved.</span>
            </div>
            <ul class="amf-legal">
                <li><a href="#">Terms &amp; Conditions</a></li>
                <li><a href="#">Privacy</a></li>
                <li><a href="#">Legal notices</a></li>
                <li><a href="#">Sitemap</a></li>
                <li><a href="#">FAQs</a></li>
            </ul>
        </div>

    </div>

    {{-- Cookie consent (unchanged behaviour) --}}
    <div class="cookie-popup" id="cookiePopup">
        <div class="cookie-content">
            <p>
                By clicking &lsquo;Accept&rsquo;, you agree to the storing of cookies on your device to enhance site navigation, analyze site usage, and assist in our marketing efforts. View our Privacy Policy for more information.
            </p>
            <div class="cookie-buttons d-flex justify-content-between">
                <button id="declineCookie" class="cookie-decline">Deny</button>
                <button id="acceptCookie" class="cookie-accept">Accept</button>
            </div>
        </div>
    </div>

    <script>
        (function () {
            /* ---- reveal-on-scroll (self-contained; site.js is homepage-only) ---- */
            var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            var items = document.querySelectorAll('.amf .amf-reveal');

            if (reduce || !('IntersectionObserver' in window)) {
                items.forEach(function (el) { el.classList.add('is-in'); });
            } else {
                var io = new IntersectionObserver(function (entries) {
                    entries.forEach(function (e) {
                        if (e.isIntersecting) {
                            e.target.classList.add('is-in');
                            io.unobserve(e.target);
                        }
                    });
                }, { threshold: 0.12, rootMargin: '0px 0px -6% 0px' });
                items.forEach(function (el) { io.observe(el); });
            }

            /* ---- CTA form → compose a real mail draft (no backend needed) ---- */
            var form = document.querySelector('[data-amf-form]');
            if (form) {
                var hint = form.querySelector('[data-amf-hint]');
                form.addEventListener('submit', function (e) {
                    e.preventDefault();
                    var get = function (n) { var f = form.querySelector('[name="' + n + '"]'); return f ? f.value.trim() : ''; };
                    var name = get('name'), email = get('email'), subject = get('subject'), message = get('message');

                    if (!name || !email || !message) {
                        if (hint) hint.textContent = 'Please add your name, email and a message.';
                        return;
                    }

                    var to = '{{ $amfEmail }}';
                    var subj = subject || ('New enquiry from ' + name);
                    var body = 'Name: ' + name + '\nEmail: ' + email + '\n\n' + message;
                    if (hint) hint.textContent = 'Opening your email app…';
                    window.location.href = 'mailto:' + to +
                        '?subject=' + encodeURIComponent(subj) +
                        '&body=' + encodeURIComponent(body);
                });
            }

            /* ---- cookie consent ---- */
            document.addEventListener('DOMContentLoaded', function () {
                var box = document.getElementById('cookiePopup');
                if (!box) return;
                if (!localStorage.getItem('cookieConsent')) box.classList.add('show');
                var accept = document.getElementById('acceptCookie');
                var decline = document.getElementById('declineCookie');
                if (accept) accept.addEventListener('click', function () {
                    localStorage.setItem('cookieConsent', 'accepted');
                    box.classList.remove('show');
                });
                if (decline) decline.addEventListener('click', function () {
                    localStorage.setItem('cookieConsent', 'declined');
                    box.classList.remove('show');
                });
            });
        })();
    </script>

</footer>
