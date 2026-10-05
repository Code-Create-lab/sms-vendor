@extends('layouts.app')
@section('title', 'DLT Registration for Bulk SMS')
@section('description', 'TRAI makes DLT registration mandatory for commercial SMS in India. We register your entity, headers and templates end to end and map them to your account.')
@section('og_image', 'og/dlt-registration.jpg')
@section('content')

    @php
        /*
         |--------------------------------------------------------------------------
         | DLT registration  (namespace: .dlt-*)
         |--------------------------------------------------------------------------
         | Content carried over from Ad Magister's existing page at
         | bulksmsdelhincr.com/dlt-registration.php. Styling lives in
         | public/css/custom.css and shares the token set used by .abt-*, .cnt-*
         | and .ind-*, so this reads as the same product.
         |
         | Style target (ui-ux-pro-max): "Accessible & Ethical" — high contrast,
         | 16px+ body, semantic markup. It is a regulatory notice, so legibility
         | beats decoration here.
         |
         | VERIFY BEFORE LAUNCH:
         |  - $dltTelemarketer number is reproduced from the live page.
         |  - support@admagister.com / 9718055559 also come from that page. The
         |    footer previously carried a placeholder number and has since been
         |    corrected to 9718055559, so the two now agree; the sales/support
         |    split of admagister.com addresses is still worth confirming.
         |  - The source page cited a 5 Feb 2020 registration deadline. It was
         |    removed after the content audit. No fees or turnaround times are
         |    stated anywhere on this page because the source did not publish
         |    any — do not invent them.
         |  - Header length/format and message categories are deliberately not
         |    spelled out: they change through TRAI amendments, so the copy
         |    points readers to a confirmation step instead.
         */

        $dltTelemarketer = [
            'name' => 'Ad Magister',
            'number' => '1702157977773440956',
        ];

        $dltRegisterUrl = 'https://smartping.live/';
        $dltSupportEmail = 'support@admagister.com';
        $dltSupportPhone = '+91 97180 55559';
        $dltSupportPhoneTel = '+919718055559';

        // The core registrations most senders need on the DLT platform.
        $dltStages = [
            [
                'no' => '01',
                'icon' => 'bi-building',
                'title' => 'Entity registration',
                'body' => 'Your business is registered as an entity on the DLT platform and issued an
                           Entity ID. This is the record every later approval is attached to.',
            ],
            [
                'no' => '02',
                'icon' => 'bi-tag',
                'title' => 'Header / Sender ID',
                'body' => 'The sender ID your messages arrive from is registered against your entity.
                           Its format depends on the message category and current DLT rules, so we
                           confirm what applies before submitting it.',
            ],
            [
                'no' => '03',
                'icon' => 'bi-file-earmark-text',
                'title' => 'Content templates',
                'body' => 'Each message format is registered as a template with its variable fields,
                           under the right category: promotional, service or transactional. Traffic that
                           does not match an approved template is rejected at the operator.',
            ],
            [
                'no' => '04',
                'icon' => 'bi-patch-check',
                'title' => 'Consent & account mapping',
                'body' => 'Promotional traffic also has to respect customer consent and preferences.
                           Once your registrations are approved, we link them to your sending account so
                           every message carries the right Entity ID, header and template ID.',
            ],
        ];

        $dltFacts = [
            [
                'icon' => 'bi-shield-lock',
                'title' => 'Why DLT exists',
                'body' => 'TRAI introduced the Distributed Ledger Technology platform to curb unsolicited
                           commercial communication and fraudulent messaging, by putting every sender,
                           header and message template on a verifiable record.',
            ],
            [
                'icon' => 'bi-journal-text',
                'title' => 'The regulation',
                'body' => 'The requirement comes from TRAI&rsquo;s Telecom Commercial Communications
                           Customer Preference Regulations, 2018 (TCCCPR 2018), as updated by later
                           amendments and directions. Requirements can change, so confirm the current
                           TRAI and operator rules before a campaign goes live.',
            ],
            [
                'icon' => 'bi-exclamation-triangle',
                'title' => 'What happens without it',
                'body' => 'Unregistered senders cannot deliver commercial traffic on Indian operators.
                           Messages sent from an unregistered entity, header or template are blocked
                           before they reach the subscriber.',
            ],
        ];
    @endphp

    {{-- ==================== HERO ==================== --}}
    <section class="dlt-hero ipad-top-space-margin position-relative overflow-hidden">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-10 text-center">
                    <span class="dlt-eyebrow">Compliance</span>
                    <h1 class="dlt-hero__title">
                        DLT registration is mandatory
                        <span class="dlt-hero__accent">under TRAI regulations</span>
                    </h1>
                    <p class="dlt-hero__lede">
                        Every business sending commercial SMS in India must be registered on the DLT
                        platform &mdash; as an entity, with approved headers and approved content
                        templates. We handle that registration end to end, then map it to your account.
                    </p>
                    <div class="dlt-hero__actions">
                        <a href="{{ $dltRegisterUrl }}" target="_blank" rel="noopener noreferrer"
                           class="dlt-btn dlt-btn--primary">
                            Register now
                            <i class="bi bi-box-arrow-up-right" aria-hidden="true"></i>
                            <span class="visually-hidden">(opens in a new tab)</span>
                        </a>
                        <a href="{{ route('contact') }}" class="dlt-btn dlt-btn--ghost">Get a quote</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ==================== CLIENT NOTICE (the letter) ==================== --}}
    {{-- Adapted from the live page. Its stale "register before 5th Feb 2020"
         deadline was replaced with current-process wording. --}}
    <section class="dlt-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-10">
                    <article class="dlt-letter">
                        <span class="dlt-kicker">Notice to clients</span>
                        <p class="dlt-letter__salutation">Dear Valuable Client,</p>

                        <p class="dlt-letter__para">
                            Thank you for being our valued client and using our SMS services. This note
                            explains registration on the DLT platform.
                        </p>

                        <p class="dlt-letter__para">
                            To curb Unsolicited Commercial Communication (UCC) and protect mobile
                            subscribers&rsquo; privacy, the Telecom Regulatory Authority of India (TRAI)
                            issued the Telecom Commercial Communications Customer Preference Regulations,
                            2018 (TCCCPR 2018), which have since been updated through amendments and
                            directions. The regulations require commercial senders to be registered on a
                            Distributed Ledger Technology (DLT) platform.
                        </p>

                        <p class="dlt-letter__para">
                            If you have not yet registered as an entity, please complete that registration
                            before sending commercial traffic. Once it is done, share your registered email
                            ID with your sales manager, who will link your entity, headers and templates to
                            your sending account.
                        </p>

                        <dl class="dlt-credentials__list">
                            <div class="dlt-credential">
                                <dt>Our telemarketer registration number is</dt>
                                {{-- tabular-nums so the 19-digit id stays readable --}}
                                <dd class="dlt-credential__id">{{ $dltTelemarketer['number'] }}</dd>
                            </div>
                            <div class="dlt-credential">
                                <dt>Telemarketer name</dt>
                                <dd>{{ $dltTelemarketer['name'] }}</dd>
                            </div>
                        </dl>

                        <p class="dlt-letter__para dlt-letter__para--last">
                            If you have any questions, email us at
                            <a href="mailto:{{ $dltSupportEmail }}">{{ $dltSupportEmail }}</a>
                            or call <a href="tel:{{ $dltSupportPhoneTel }}">{{ $dltSupportPhone }}</a>.
                        </p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    {{-- ==================== WHAT DLT IS ==================== --}}
    <section class="dlt-section dlt-section--muted">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <span class="dlt-kicker">Background</span>
                    <h2 class="dlt-section__title">What DLT is, and why it applies to you</h2>
                </div>
            </div>

            <div class="dlt-grid">
                @foreach ($dltFacts as $fact)
                    <article class="dlt-card">
                        <span class="dlt-card__icon" aria-hidden="true">
                            <i class="bi {{ $fact['icon'] }}"></i>
                        </span>
                        <h3 class="dlt-card__title">{{ $fact['title'] }}</h3>
                        <p class="dlt-card__body">{!! $fact['body'] !!}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ==================== REGISTRATION STAGES ==================== --}}
    <section class="dlt-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <span class="dlt-kicker">What gets registered</span>
                    <h2 class="dlt-section__title">The core registrations before you send</h2>
                    <p class="dlt-section__sub">
                        Registration is not a single form. These are the main steps most senders go
                        through. It is not a complete legal checklist: exact requirements depend on your
                        message category and the operator, and can change, so we confirm the current
                        TRAI and operator rules with you before launch.
                    </p>
                </div>
            </div>

            <ol class="dlt-stages">
                @foreach ($dltStages as $stage)
                    <li class="dlt-stage">
                        <span class="dlt-stage__no" aria-hidden="true">{{ $stage['no'] }}</span>
                        <span class="dlt-stage__icon" aria-hidden="true">
                            <i class="bi {{ $stage['icon'] }}"></i>
                        </span>
                        <h3 class="dlt-stage__title">{{ $stage['title'] }}</h3>
                        <p class="dlt-stage__body">{{ $stage['body'] }}</p>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    {{-- ==================== NEXT STEP ==================== --}}
    <section class="dlt-section dlt-section--muted">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <span class="dlt-kicker">Next step</span>
                    <h2 class="dlt-section__title">Already registered as an entity?</h2>
                    <p class="dlt-section__sub">
                        Send the email ID you registered with to your sales manager. We pass it to the
                        operator for approval and link the approved entity to your sending account.
                    </p>
                    <div class="dlt-hero__actions dlt-hero__actions--start">
                        <a href="{{ route('contact') }}" class="dlt-btn dlt-btn--primary">Talk to your sales manager</a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="dlt-support">
                        <span class="dlt-support__label">Registration support</span>
                        <a class="dlt-support__line" href="mailto:{{ $dltSupportEmail }}">
                            <i class="bi bi-envelope" aria-hidden="true"></i>
                            <span>{{ $dltSupportEmail }}</span>
                        </a>
                        <a class="dlt-support__line" href="tel:{{ $dltSupportPhoneTel }}">
                            <i class="bi bi-telephone" aria-hidden="true"></i>
                            <span>{{ $dltSupportPhone }}</span>
                        </a>
                        <a href="{{ $dltRegisterUrl }}" target="_blank" rel="noopener noreferrer"
                           class="dlt-btn dlt-btn--ghost">
                            Open the DLT portal
                            <i class="bi bi-box-arrow-up-right" aria-hidden="true"></i>
                            <span class="visually-hidden">(opens in a new tab)</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
