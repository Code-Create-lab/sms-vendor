@extends('layouts.app')

@push('styles')
    {{-- Inter is loaded in the layout head — the nav overlay needs it too. --}}
    @vite(['resources/css/home.css', 'resources/js/home.js'])

    <script>
        // Hide reveal targets only while JS is alive to animate them back in.
        // The watchdog un-hides everything if home.js never boots, so a failed
        // bundle degrades to a plain static page instead of a blank one.
        (function () {
            var el = document.documentElement;
            el.classList.add('da-js');
            setTimeout(function () {
                if (!el.hasAttribute('data-da-ready')) {
                    el.classList.remove('da-js');
                }
            }, 2500);
        })();
    </script>
@endpush

@section('content')

{{--
    ------------------------------------------------------------------
    TODO — replace with figures the business can actually stand behind.
    These are placeholders, not verified metrics:
      * 99.9% uptime target
      * 24x7 support
      * 100% DLT-compliant routes
    "5 channels" is the only number derived from the product itself.
    ------------------------------------------------------------------
--}}

<main class="da" data-da-root>

    {{-- ============================ HERO ============================ --}}
    <section class="da-hero">
        <div class="da-shell">

            <div class="da-hero-copy">
                <span class="da-eyebrow" data-da-hero>Omni-channel business messaging</span>

                <h1 data-da-hero>
                    Reach every customer on the channel they <em>already use</em>.
                </h1>

                <p class="da-lede" data-da-hero>
                    Ad Magister delivers SMS, RCS, Voice and WhatsApp campaigns from one
                    platform &mdash; with DLT-registered routes, real-time delivery reports
                    and an API your developers can ship against in an afternoon.
                </p>

                <ul class="da-chips" data-da-hero>
                    <li class="da-chip">Bulk SMS</li>
                    <li class="da-chip">RCS Business Messaging</li>
                    <li class="da-chip">Voice &amp; IVR</li>
                    <li class="da-chip">WhatsApp Business API</li>
                </ul>

                <div class="da-btn-row" data-da-hero>
                    <a href="{{ route('contact') }}" class="da-btn da-btn--primary">
                        Talk to sales
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14M13 6l6 6-6 6" />
                        </svg>
                    </a>
                    <a href="{{ route('channel') }}" class="da-btn da-btn--ghost">Explore channels</a>
                </div>
            </div>

            <div class="da-hero-media" data-da-hero>
                <div class="da-hero-media__inner" data-da-media>
                    {{--
                        preload="none" + play-on-view: the source file is ~86 MB, so
                        letting it autoplay would blow the mobile data budget before
                        anything else on the page loads. See the note in home.js.
                    --}}
                    <video muted loop playsinline preload="none" aria-hidden="true" data-da-video>
                        <source src="{{ asset('video/homeVideoLatest.mp4') }}" type="video/mp4">
                    </video>
                </div>

                <p class="da-hero-media__badge">
                    <span aria-hidden="true"></span>
                    Live delivery across India
                </p>
            </div>

        </div>
    </section>

    {{-- ============================ STATS ============================ --}}
    <section class="da-section da-section--tight">
        <div class="da-shell">
            <div class="da-stats" data-da-reveal="stats">
                <div class="da-stat">
                    <span class="da-stat__num" data-da-count="5">5</span>
                    <span class="da-stat__label">Channels under one contract</span>
                </div>
                <div class="da-stat">
                    <span class="da-stat__num" data-da-count="99.9" data-da-decimals="1" data-da-suffix="%">99.9%</span>
                    <span class="da-stat__label">Platform uptime target</span>
                </div>
                <div class="da-stat">
                    <span class="da-stat__num" data-da-count="24" data-da-suffix="&times;7">24&times;7</span>
                    <span class="da-stat__label">Campaign &amp; technical support</span>
                </div>
                <div class="da-stat">
                    <span class="da-stat__num" data-da-count="100" data-da-suffix="%">100%</span>
                    <span class="da-stat__label">DLT-compliant routing</span>
                </div>
            </div>
        </div>
    </section>

    {{-- =========================== CHANNELS =========================== --}}
    <section class="da-section da-section--alt" id="channels">
        <div class="da-shell">

            <header class="da-head" data-da-reveal="chan-head">
                <span class="da-eyebrow">Channels</span>
                <h2 class="da-h2">One platform. Every way your customer wants to hear from you.</h2>
                <p class="da-lede">
                    Start on the channel that fits the message, then add the rest without
                    re-integrating. Same dashboard, same API, one invoice.
                </p>
            </header>

            <div class="da-grid">

                <article class="da-card" data-da-reveal="chan" data-da-lift>
                    <div class="da-card__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 11.5a8.38 8.38 0 0 1-9 8.3 8.5 8.5 0 0 1-3.8-.9L3 21l1.9-5.1A8.38 8.38 0 0 1 4 11.5a8.5 8.5 0 0 1 8.5-8.5 8.38 8.38 0 0 1 8.5 8.5z" />
                        </svg>
                    </div>
                    <h3 class="da-h3">Bulk SMS</h3>
                    <p>
                        Transactional, OTP and promotional traffic on DLT-registered
                        headers, with per-message delivery receipts.
                    </p>
                    <a href="{{ route('channel') }}" class="da-link da-card__stretch">
                        See SMS routing
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14M13 6l6 6-6 6" />
                        </svg>
                    </a>
                </article>

                <article class="da-card" data-da-reveal="chan" data-da-lift>
                    <div class="da-card__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 3l1.9 4.6L18.5 9.5l-4.6 1.9L12 16l-1.9-4.6L5.5 9.5l4.6-1.9z" />
                            <path d="M18 15l.8 2.2 2.2.8-2.2.8L18 21l-.8-2.2-2.2-.8 2.2-.8z" />
                        </svg>
                    </div>
                    <h3 class="da-h3">RCS Business Messaging</h3>
                    <p>
                        Verified sender, branded cards, carousels and quick-reply buttons
                        &mdash; delivered inside the native Messages app.
                    </p>
                    <a href="{{ route('channel') }}" class="da-link da-card__stretch">
                        See RCS formats
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14M13 6l6 6-6 6" />
                        </svg>
                    </a>
                </article>

                <article class="da-card" data-da-reveal="chan" data-da-lift>
                    <div class="da-card__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z" />
                        </svg>
                    </div>
                    <h3 class="da-h3">Voice &amp; IVR</h3>
                    <p>
                        Outbound voice broadcasts, missed-call numbers and IVR trees for
                        reach beyond the smartphone base.
                    </p>
                    <a href="{{ route('channel') }}" class="da-link da-card__stretch">
                        See voice options
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14M13 6l6 6-6 6" />
                        </svg>
                    </a>
                </article>

                <article class="da-card" data-da-reveal="chan2" data-da-lift>
                    <div class="da-card__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 20l1.4-4.1A8 8 0 1 1 8.6 19z" />
                            <path d="M8.5 10.5c.6 2 2 3.4 4 4l1.2-1.2 2.3 1v1.4c-2.9.5-6.7-3.3-6.2-6.2h1.4l1 2.3z" />
                        </svg>
                    </div>
                    <h3 class="da-h3">WhatsApp Business API</h3>
                    <p>
                        Template notifications, two-way conversations and catalogue
                        journeys on an official Business API account.
                    </p>
                    <a href="{{ route('channel') }}" class="da-link da-card__stretch">
                        See WhatsApp setup
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14M13 6l6 6-6 6" />
                        </svg>
                    </a>
                </article>

                <article class="da-card" data-da-reveal="chan2" data-da-lift>
                    <div class="da-card__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 11v2a1 1 0 0 0 1 1h2l4.6 3.7a1 1 0 0 0 1.6-.8V6.1a1 1 0 0 0-1.6-.8L6 9H4a1 1 0 0 0-1 1z" />
                            <path d="M17 8.5a5 5 0 0 1 0 7M20 6a9 9 0 0 1 0 12" />
                        </svg>
                    </div>
                    <h3 class="da-h3">Digital marketing</h3>
                    <p>
                        Creative, targeting and performance reporting run by the same team
                        that owns your delivery routes.
                    </p>
                    <a href="{{ route('channel') }}" class="da-link da-card__stretch">
                        See what we run
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14M13 6l6 6-6 6" />
                        </svg>
                    </a>
                </article>

            </div>
        </div>
    </section>

    {{-- =========================== INDUSTRIES ========================== --}}
    <section class="da-section" id="industries">
        <div class="da-shell">

            <header class="da-head" data-da-reveal="ind-head">
                <span class="da-eyebrow">Industries</span>
                <h2 class="da-h2">Built around how your sector actually communicates.</h2>
                <p class="da-lede">
                    Compliance rules, message templates and peak-hour throughput differ
                    by industry. We set the account up for yours.
                </p>
            </header>

            <ul class="da-inds" data-da-reveal="ind">
                <li>
                    <a href="{{ route('industry-solution') }}" class="da-ind">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                             stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M3 21h18M4 10h16M5 10V7.5L12 4l7 3.5V10M7 10v8M12 10v8M17 10v8" />
                        </svg>
                        Banking &amp; insurance
                    </a>
                </li>
                <li>
                    <a href="{{ route('industry-solution') }}" class="da-ind">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                             stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M6 6h15l-1.5 8.5H7.5zM6 6L5 3H2M9 20a1 1 0 1 0 0-2 1 1 0 0 0 0 2zM18 20a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                        </svg>
                        E-commerce &amp; retail
                    </a>
                </li>
                <li>
                    <a href="{{ route('industry-solution') }}" class="da-ind">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                             stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M20.8 5.6a5 5 0 0 0-7.1 0L12 7.3l-1.7-1.7a5 5 0 1 0-7.1 7.1l8.8 8.8 8.8-8.8a5 5 0 0 0 0-7.1z" />
                        </svg>
                        Healthcare
                    </a>
                </li>
                <li>
                    <a href="{{ route('industry-solution') }}" class="da-ind">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                             stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M22 9L12 4 2 9l10 5 10-5zM6 11.5V17c0 1.7 2.7 3 6 3s6-1.3 6-3v-5.5" />
                        </svg>
                        Education
                    </a>
                </li>
                <li>
                    <a href="{{ route('industry-solution') }}" class="da-ind">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                             stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M4 21V6a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v15M15 21V11h3a2 2 0 0 1 2 2v8M3 21h18M8 8h3M8 12h3M8 16h3" />
                        </svg>
                        Real estate
                    </a>
                </li>
                <li>
                    <a href="{{ route('election-campaign') }}" class="da-ind">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                             stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M9 12l2 2 4-4M3 17l9 4 9-4M3 12.5V17M21 12.5V17M12 3L3 7l9 4 9-4z" />
                        </svg>
                        Political &amp; election
                    </a>
                </li>
            </ul>
        </div>
    </section>

    {{-- =========================== PLATFORM ============================ --}}
    <section class="da-section da-section--alt">
        <div class="da-shell">
            <div class="da-split">

                <header class="da-head" style="margin-bottom:0" data-da-reveal="plat-head">
                    <span class="da-eyebrow">Why teams switch</span>
                    <h2 class="da-h2">The unglamorous parts, handled properly.</h2>
                    <p class="da-lede">
                        Most messaging problems are not creative problems. They are routing,
                        compliance and reporting problems &mdash; so that is where we put the work.
                    </p>
                    <div class="da-btn-row">
                        <a href="{{ route('about') }}" class="da-btn da-btn--ghost">About Ad Magister</a>
                    </div>
                </header>

                <ul class="da-feats" data-da-reveal="plat">
                    <li class="da-feat">
                        <span class="da-feat__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                                <path d="M9 12l2 2 4-4" />
                            </svg>
                        </span>
                        <div>
                            <h3>DLT &amp; TRAI compliance, done for you</h3>
                            <p>
                                Header and template registration, scrubbing and consent records
                                handled at onboarding, so campaigns do not stall at the operator.
                            </p>
                        </div>
                    </li>

                    <li class="da-feat">
                        <span class="da-feat__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path d="M13 2L4.5 13H11l-1 9 8.5-11H12z" />
                            </svg>
                        </span>
                        <div>
                            <h3>Throughput that holds at peak</h3>
                            <p>
                                Multiple operator connects with automatic failover, so OTP and
                                alert traffic keeps moving during festival and result-day spikes.
                            </p>
                        </div>
                    </li>

                    <li class="da-feat">
                        <span class="da-feat__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 18l6-6-6-6M8 6l-6 6 6 6" />
                            </svg>
                        </span>
                        <div>
                            <h3>A REST API worth integrating against</h3>
                            <p>
                                One endpoint per channel, predictable JSON, webhooks for delivery
                                and inbound replies. Sandbox keys on request.
                            </p>
                        </div>
                    </li>

                    <li class="da-feat">
                        <span class="da-feat__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 3v18h18M7 15l4-4 3 3 5-6" />
                            </svg>
                        </span>
                        <div>
                            <h3>Reporting you can hand to finance</h3>
                            <p>
                                Per-campaign delivery, failure reasons and spend exported to CSV
                                &mdash; not a dashboard screenshot.
                            </p>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </section>

    {{-- ============================== CTA ============================== --}}
    <section class="da-section">
        <div class="da-shell">
            <div class="da-cta" data-da-reveal="cta">
                <span class="da-eyebrow">Get started</span>
                <h2>Tell us what you need to send, and to how many.</h2>
                <p class="da-lede">
                    We will come back with the right channel mix, indicative pricing and the
                    compliance steps for your sector.
                </p>
                <div class="da-btn-row">
                    <a href="{{ route('contact') }}" class="da-btn da-btn--onDark">
                        Talk to sales
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14M13 6l6 6-6 6" />
                        </svg>
                    </a>
                    <a href="mailto:info@admagister.com" class="da-btn da-btn--outlineDark">
                        info@admagister.com
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

@endsection
