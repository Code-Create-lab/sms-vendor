@extends('layouts.app')
@section('content')

    @php
        // Industry cards. Icons come from Bootstrap Icons (loaded via css/icon.min.css),
        // not emoji, so they inherit colour and scale with the type system.
        $industries = [
            [
                'icon'      => 'bi-bank',
                'name'      => 'Banking & Financial Services',
                'summary'   => 'Time-critical alerts that have to land on the first attempt, on operator-direct routes.',
                'uses'      => ['OTP & 2FA', 'Transaction alerts', 'EMI reminders', 'KYC follow-ups'],
                'channels'  => 'SMS · RCS · Voice',
            ],
            [
                'icon'      => 'bi-bag-check',
                'name'      => 'Retail & E-commerce',
                'summary'   => 'Rich cards and carousels that turn an order update into a second purchase.',
                'uses'      => ['Order tracking', 'Abandoned cart', 'Offer carousels', 'Feedback requests'],
                'channels'  => 'RCS · SMS · WhatsApp',
            ],
            [
                'icon'      => 'bi-heart-pulse',
                'name'      => 'Healthcare',
                'summary'   => 'Reminders that cut no-shows, sent without exposing patient data in the message body.',
                'uses'      => ['Appointment reminders', 'Report ready', 'Refill alerts', 'Camp invites'],
                'channels'  => 'SMS · Voice · RCS',
            ],
            [
                'icon'      => 'bi-buildings',
                'name'      => 'Real Estate',
                'summary'   => 'Project launches and site-visit invites with images, maps and a one-tap call back.',
                'uses'      => ['Launch announcements', 'Site-visit invites', 'Payment milestones', 'Broker updates'],
                'channels'  => 'RCS · SMS · Voice',
            ],
            [
                'icon'      => 'bi-mortarboard',
                'name'      => 'Education',
                'summary'   => 'Admission cycles and fee calendars run on schedules, so the messaging does too.',
                'uses'      => ['Admission alerts', 'Fee reminders', 'Result notifications', 'Attendance updates'],
                'channels'  => 'SMS · Voice · RCS',
            ],
            [
                'icon'      => 'bi-airplane',
                'name'      => 'Travel & Hospitality',
                'summary'   => 'Booking confirmations, boarding details and itinerary changes as they happen.',
                'uses'      => ['Booking confirmations', 'Check-in reminders', 'Itinerary changes', 'Loyalty offers'],
                'channels'  => 'RCS · SMS · WhatsApp',
            ],
            [
                'icon'      => 'bi-shield-check',
                'name'      => 'Public Sector',
                'summary'   => 'High-volume citizen outreach with audit trails and per-campaign delivery reporting.',
                'uses'      => ['Citizen advisories', 'Scheme awareness', 'Survey outreach', 'Emergency alerts'],
                'channels'  => 'SMS · Voice · RCS',
            ],
            [
                'icon'      => 'bi-truck',
                'name'      => 'Logistics & Delivery',
                'summary'   => 'Delivery windows, rider details and doorstep OTPs delivered at dispatch speed.',
                'uses'      => ['Dispatch alerts', 'Live ETA', 'Doorstep OTP', 'Failed-delivery retry'],
                'channels'  => 'SMS · RCS · Voice',
            ],
        ];

        $steps = [
            [
                'no'    => '01',
                'title' => 'Map the journey',
                'body'  => 'We list every message your customer already receives, then mark which ones are transactional, promotional or service.',
            ],
            [
                'no'    => '02',
                'title' => 'Register & approve',
                'body'  => 'Sender IDs, DLT entity and template registration handled end to end, so nothing is blocked at the operator.',
            ],
            [
                'no'    => '03',
                'title' => 'Integrate',
                'body'  => 'REST APIs, SMPP or a panel upload — connect to your CRM, ERP or order system in the way that fits your stack.',
            ],
            [
                'no'    => '04',
                'title' => 'Measure & tune',
                'body'  => 'Delivery reports per operator and per template, reviewed with you so routes and send-times keep improving.',
            ],
        ];
    @endphp

    <!-- start hero -->
    <section class="ind-hero ipad-top-space-margin position-relative overflow-hidden">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-10 text-center">
                    <span class="ind-eyebrow">Solutions by industry</span>
                    <h1 class="ind-hero__title">
                        Messaging built around <span class="ind-hero__accent">how your industry works</span>
                    </h1>
                    <p class="ind-hero__lede">
                        RCS, Bulk SMS, Voice and WhatsApp delivered on operator-direct routes — configured for the
                        alerts, approvals and campaigns your sector actually sends.
                    </p>
                    <div class="ind-hero__actions">
                        <a href="{{ route('contact') }}" class="ind-btn ind-btn--primary">Talk to sales</a>
                        <a href="#industries" class="ind-btn ind-btn--ghost">Browse industries</a>
                    </div>
                </div>
            </div>

            <ul class="ind-trust" aria-label="Why teams choose us">
                <li class="ind-trust__item">
                    <i class="bi bi-broadcast-pin ind-trust__icon" aria-hidden="true"></i>
                    <span>Operator-direct routes</span>
                </li>
                <li class="ind-trust__item">
                    <i class="bi bi-file-earmark-check ind-trust__icon" aria-hidden="true"></i>
                    <span>DLT-registered templates</span>
                </li>
                <li class="ind-trust__item">
                    <i class="bi bi-graph-up-arrow ind-trust__icon" aria-hidden="true"></i>
                    <span>Per-operator delivery reports</span>
                </li>
                <li class="ind-trust__item">
                    <i class="bi bi-headset ind-trust__icon" aria-hidden="true"></i>
                    <span>Named support contact</span>
                </li>
            </ul>
        </div>
    </section>
    <!-- end hero -->

    <!-- start industries -->
    <section id="industries" class="ind-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="ind-section__title">Pick your sector</h2>
                    <p class="ind-section__sub">
                        Each setup starts from the messages you already send — we match the channel to the intent
                        instead of pushing every campaign down the same pipe.
                    </p>
                </div>
            </div>

            <div class="ind-grid">
                @foreach ($industries as $industry)
                    <article class="ind-card">
                        <span class="ind-card__icon" aria-hidden="true">
                            <i class="bi {{ $industry['icon'] }}"></i>
                        </span>
                        <h3 class="ind-card__title">{{ $industry['name'] }}</h3>
                        <p class="ind-card__summary">{{ $industry['summary'] }}</p>

                        <ul class="ind-card__uses">
                            @foreach ($industry['uses'] as $use)
                                <li>{{ $use }}</li>
                            @endforeach
                        </ul>

                        <div class="ind-card__foot">
                            <span class="ind-card__channels">{{ $industry['channels'] }}</span>
                            <a href="{{ route('contact') }}" class="ind-card__link">
                                Discuss this setup
                                <i class="bi bi-arrow-right" aria-hidden="true"></i>
                                <span class="visually-hidden">for {{ $industry['name'] }}</span>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end industries -->

    <!-- start process -->
    <section class="ind-section ind-section--muted">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="ind-section__title">How a rollout runs</h2>
                    <p class="ind-section__sub">
                        Same four steps whether you send ten thousand OTPs a day or one campaign a quarter.
                    </p>
                </div>
            </div>

            <ol class="ind-steps">
                @foreach ($steps as $step)
                    <li class="ind-step">
                        <span class="ind-step__no" aria-hidden="true">{{ $step['no'] }}</span>
                        <h3 class="ind-step__title">{{ $step['title'] }}</h3>
                        <p class="ind-step__body">{{ $step['body'] }}</p>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>
    <!-- end process -->

    <!-- start compliance -->
    <section class="ind-section">
        <div class="container">
            <div class="ind-compliance">
                <div class="ind-compliance__copy">
                    <h2 class="ind-section__title">Compliance is part of the setup, not an afterthought</h2>
                    <p class="ind-section__sub">
                        Entity and template registration, consent capture, opt-out handling and scrubbing against
                        DND preferences are configured before your first campaign goes out.
                    </p>
                </div>
                <ul class="ind-compliance__list">
                    <li><i class="bi bi-check2-circle" aria-hidden="true"></i> DLT entity &amp; template registration</li>
                    <li><i class="bi bi-check2-circle" aria-hidden="true"></i> Consent capture and audit trail</li>
                    <li><i class="bi bi-check2-circle" aria-hidden="true"></i> Opt-out handling on every promotional send</li>
                    <li><i class="bi bi-check2-circle" aria-hidden="true"></i> Separate transactional and promotional routes</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end compliance -->

    <!-- start cta -->
    <section class="ind-cta-wrap">
        <div class="container">
            <div class="ind-cta">
                <div>
                    <h2 class="ind-cta__title">Tell us what you send today</h2>
                    <p class="ind-cta__sub">
                        Share a sample of your current alerts and campaigns — we will come back with the channel mix,
                        registration steps and routing plan for your sector.
                    </p>
                </div>
                <a href="{{ route('contact') }}" class="ind-btn ind-btn--primary ind-btn--lg">Talk to sales</a>
            </div>
        </div>
    </section>
    <!-- end cta -->

@endsection
