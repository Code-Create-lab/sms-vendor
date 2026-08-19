@extends('layouts.app')
@section('content')

    @php
        /*
         |--------------------------------------------------------------------------
         | About Ad Magister  (namespace: .abt-*)
         |--------------------------------------------------------------------------
         | Styling lives in public/css/custom.css, which ships on every page. The
         | .abt-* tokens are aliased to the same navy/blue palette as the header
         | (--hdr-*) and the industry page (--ind-*) so the site reads as one
         | product rather than a stack of templates.
         |
         | Copy rule: every number on this page is one the site already publishes
         | on the homepage (uptime target, support window, DLT coverage, channel
         | count). Do NOT add client counts, volumes or certifications here unless
         | Ad Magister can evidence them — see $abtStats below.
         */

        // Hero credibility strip. Sourced from the homepage claims.
        $abtStats = [
            ['value' => '4',      'label' => 'Channels on one platform', 'note' => 'SMS · RCS · Voice · WhatsApp'],
            ['value' => '99.9%',  'label' => 'Platform uptime target',   'note' => 'Monitored round the clock'],
            ['value' => '100%',   'label' => 'DLT-registered routes',    'note' => 'Entity, sender ID & templates'],
            ['value' => '24×7',   'label' => 'Support coverage',         'note' => 'Named contact, not a queue'],
        ];

        // What we actually sell, in the order a buyer evaluates it.
        $abtPillars = [
            [
                'title' => 'Routes we own the answer for',
                'body'  => 'Operator-direct connectivity rather than resold aggregator hops, so when a
                            message is late there is a delivery receipt that explains why — not a shrug.',
            ],
            [
                'title' => 'Compliance handled end to end',
                'body'  => 'DLT entity registration, sender IDs, header and template approvals are run by
                            us. Campaigns do not sit blocked at the operator while paperwork catches up.',
            ],
            [
                'title' => 'One platform, four channels',
                'body'  => 'The same API, console and reporting drive Bulk SMS, RCS, Voice and WhatsApp,
                            so switching channel is a parameter change, not a new integration.',
            ],
        ];

        $abtValues = [
            [
                'icon'  => 'bi-broadcast-pin',
                'title' => 'Delivery over volume',
                'body'  => 'We would rather send fewer messages that land than bill for a blast that
                            quietly failed. Route quality is reviewed per operator, every month.',
            ],
            [
                'icon'  => 'bi-file-earmark-check',
                'title' => 'Compliance is not optional',
                'body'  => 'TRAI and DLT rules shape what we build. We will tell you when a campaign
                            needs a different consent basis, even when that slows the launch down.',
            ],
            [
                'icon'  => 'bi-graph-up-arrow',
                'title' => 'Numbers you can audit',
                'body'  => 'Per-message receipts, failure reasons and spend export to CSV. Nothing about
                            your delivery performance is locked inside our dashboard.',
            ],
            [
                'icon'  => 'bi-people',
                'title' => 'A person, not a portal',
                'body'  => 'Every account gets a named contact who knows your templates and your peak
                            windows. Escalation is a phone call, not a ticket in a backlog.',
            ],
        ];

        // Channel cards deep-link into the existing channel page.
        $abtChannels = [
            ['icon' => 'bi-chat-dots',      'name' => 'Bulk SMS', 'body' => 'Transactional and promotional SMS on DLT-registered headers.'],
            ['icon' => 'bi-chat-square-text','name' => 'RCS',      'body' => 'Verified sender, rich cards and carousels inside native Messages.'],
            ['icon' => 'bi-telephone',      'name' => 'Voice',    'body' => 'IVR, OBD and missed-call flows for reach beyond the smartphone.'],
            ['icon' => 'bi-whatsapp',       'name' => 'WhatsApp', 'body' => 'Template messaging and two-way conversations on the Business API.'],
        ];

        $abtWorkflow = [
            ['no' => '01', 'title' => 'We audit what you already send',   'body' => 'Every existing message is sorted into transactional, service or promotional — that classification decides the route and the consent basis.'],
            ['no' => '02', 'title' => 'We register before we integrate',  'body' => 'Entity, sender IDs and templates go through DLT approval first, so the first live send is not the first time you meet a rejection.'],
            ['no' => '03', 'title' => 'We connect to your stack',         'body' => 'REST API, SMPP or panel upload. Your CRM, ERP or order system keeps its own workflow; we fit around it.'],
            ['no' => '04', 'title' => 'We review the delivery data',      'body' => 'Per-operator and per-template reports are read with you, and routes or send-windows are retuned on what they show.'],
        ];

        $abtCompliance = [
            'DLT entity, header and template registration managed on your behalf',
            'Operator-direct routes with per-message delivery receipts',
            'Consent and opt-out handling built into every campaign flow',
            'Delivery, failure-reason and spend data exportable to CSV at any time',
        ];

        // Kept in sync with layouts/footer.blade.php.
        $abtAddress = 'Office No. 305, 3rd Floor, Vashisht Commercial Complex, Opp. Pillar No. 52, '
                    . 'MG Road, Sikandarpur, Gurugram 122002, Haryana';
        $abtPhone   = '+91 98765 43210';
        $abtPhoneTel = '+919876543210';
        $abtEmail   = 'info@admagister.com';
    @endphp

    {{-- ==================== HERO ==================== --}}
    <section class="abt-hero ipad-top-space-margin position-relative overflow-hidden">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-10 text-center">
                    <span class="abt-eyebrow">About Ad Magister</span>
                    <h1 class="abt-hero__title">
                        We keep business messages
                        <span class="abt-hero__accent">arriving, not just sending</span>
                    </h1>
                    <p class="abt-hero__lede">
                        Ad Magister is an omni-channel business messaging company based in Gurugram. We run
                        SMS, RCS, Voice and WhatsApp campaigns for Indian enterprises on DLT-registered,
                        operator-direct routes — and we stay accountable for what happens after you press send.
                    </p>
                    <div class="abt-hero__actions">
                        <a href="{{ route('contact') }}" class="abt-btn abt-btn--primary">Talk to our team</a>
                        <a href="#abt-approach" class="abt-btn abt-btn--ghost">How we work</a>
                    </div>
                </div>
            </div>

            <dl class="abt-stats" aria-label="Ad Magister at a glance">
                @foreach ($abtStats as $stat)
                    <div class="abt-stat">
                        <dt class="abt-stat__value">{{ $stat['value'] }}</dt>
                        <dd class="abt-stat__label">
                            {{ $stat['label'] }}
                            <span class="abt-stat__note">{{ $stat['note'] }}</span>
                        </dd>
                    </div>
                @endforeach
            </dl>
        </div>
    </section>

    {{-- ==================== WHO WE ARE ==================== --}}
    <section class="abt-section">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5">
                    <div class="abt-sticky">
                        <span class="abt-kicker">Who we are</span>
                        <h2 class="abt-section__title">
                            A messaging partner that owns your delivery routes
                        </h2>
                        <p class="abt-section__sub">
                            Most messaging problems are not creative problems. They are routing, registration
                            and reporting problems. That is the part of the job we took on.
                        </p>
                        <a href="{{ route('channel') }}" class="abt-inline-link">
                            Explore our channels
                            <i class="bi bi-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-7">
                    <ul class="abt-pillars">
                        @foreach ($abtPillars as $pillar)
                            <li class="abt-pillar">
                                <h3 class="abt-pillar__title">{{ $pillar['title'] }}</h3>
                                <p class="abt-pillar__body">{{ $pillar['body'] }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- ==================== VALUES ==================== --}}
    <section class="abt-section abt-section--muted">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <span class="abt-kicker">What we stand for</span>
                    <h2 class="abt-section__title">Four commitments we are happy to be held to</h2>
                    <p class="abt-section__sub">
                        These are the rules we apply internally before a campaign goes live — and the ones
                        you should hold any messaging vendor to.
                    </p>
                </div>
            </div>

            <div class="abt-grid">
                @foreach ($abtValues as $value)
                    <article class="abt-card">
                        <span class="abt-card__icon" aria-hidden="true">
                            <i class="bi {{ $value['icon'] }}"></i>
                        </span>
                        <h3 class="abt-card__title">{{ $value['title'] }}</h3>
                        <p class="abt-card__body">{{ $value['body'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ==================== CHANNELS ==================== --}}
    <section class="abt-section">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <span class="abt-kicker">What we run</span>
                    <h2 class="abt-section__title">Four channels, one integration</h2>
                    <p class="abt-section__sub">
                        We match the channel to the intent instead of pushing every campaign down the same
                        pipe. All four share the same API, console and delivery reporting.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('channel') }}" class="abt-btn abt-btn--ghost">See all channels</a>
                </div>
            </div>

            <div class="abt-channels">
                @foreach ($abtChannels as $channel)
                    <a class="abt-channel" href="{{ route('channel') }}">
                        <span class="abt-channel__icon" aria-hidden="true">
                            <i class="bi {{ $channel['icon'] }}"></i>
                        </span>
                        <span class="abt-channel__name">{{ $channel['name'] }}</span>
                        <span class="abt-channel__body">{{ $channel['body'] }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ==================== HOW WE WORK ==================== --}}
    <section id="abt-approach" class="abt-section abt-section--muted">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <span class="abt-kicker">Our approach</span>
                    <h2 class="abt-section__title">How an engagement actually runs</h2>
                    <p class="abt-section__sub">
                        No discovery theatre. Four steps between first call and a campaign you can measure.
                    </p>
                </div>
            </div>

            <ol class="abt-timeline">
                @foreach ($abtWorkflow as $step)
                    <li class="abt-timeline__item">
                        <span class="abt-timeline__no" aria-hidden="true">{{ $step['no'] }}</span>
                        <div class="abt-timeline__content">
                            <h3 class="abt-timeline__title">{{ $step['title'] }}</h3>
                            <p class="abt-timeline__body">{{ $step['body'] }}</p>
                        </div>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    {{-- ==================== COMPLIANCE ==================== --}}
    <section class="abt-section">
        <div class="container">
            <div class="abt-trust">
                <div class="abt-trust__intro">
                    <span class="abt-kicker abt-kicker--invert">Compliance &amp; transparency</span>
                    <h2 class="abt-section__title abt-section__title--invert">
                        Built for regulated Indian messaging
                    </h2>
                    <p class="abt-section__sub abt-section__sub--invert">
                        TRAI and DLT rules are not a checkbox at the end of the project. They decide the
                        route, the header and the consent basis before a single message is queued.
                    </p>
                    <a href="{{ route('contact') }}" class="abt-btn abt-btn--invert">Request a compliance walkthrough</a>
                </div>

                <ul class="abt-trust__list">
                    @foreach ($abtCompliance as $item)
                        <li>
                            <i class="bi bi-shield-check" aria-hidden="true"></i>
                            <span>{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    {{-- ==================== CTA + OFFICE ==================== --}}
    <section class="abt-cta-wrap">
        <div class="container">
            <div class="abt-cta">
                <div class="abt-cta__body">
                    <h2 class="abt-cta__title">Tell us what you need to send, and to how many.</h2>
                    <p class="abt-cta__sub">
                        We will come back with the right channel mix, the registrations it needs and what it
                        costs — before you commit to anything.
                    </p>
                    <div class="abt-hero__actions abt-hero__actions--start">
                        <a href="{{ route('contact') }}" class="abt-btn abt-btn--primary">Contact sales</a>
                        <a href="tel:{{ $abtPhoneTel }}" class="abt-btn abt-btn--ghost">{{ $abtPhone }}</a>
                    </div>
                </div>

                <address class="abt-office">
                    <span class="abt-office__label">Head office</span>
                    <span class="abt-office__line">
                        <i class="bi bi-geo-alt" aria-hidden="true"></i>
                        <span>{{ $abtAddress }}</span>
                    </span>
                    <span class="abt-office__line">
                        <i class="bi bi-envelope" aria-hidden="true"></i>
                        <a href="mailto:{{ $abtEmail }}">{{ $abtEmail }}</a>
                    </span>
                </address>
            </div>
        </div>
    </section>

@endsection
