@extends('layouts.app')
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
         |  - support@admagister.com / 9999238814 also come from that page and
         |    differ from the info@admagister.com / +91 98765 43210 pair in
         |    layouts/footer.blade.php. One of the two sets is stale.
         |  - The source page cited a 5 Feb 2020 registration deadline. That date
         |    is long past, so it is presented as background below rather than as
         |    a live deadline. No fees or turnaround times are stated anywhere on
         |    this page because the source did not publish any — do not invent them.
         */

        $dltTelemarketer = [
            'name' => 'Ad Magister',
            'number' => '1702157977773440956',
        ];

        $dltRegisterUrl = 'https://smartping.live/';
        $dltSupportEmail = 'support@admagister.com';
        $dltSupportPhone = '9999238814';

        // The four registration objects every sender needs on the DLT platform.
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
                'body' => 'The six-character sender ID your messages arrive from is registered against
                           your entity, separately for transactional and promotional traffic.',
            ],
            [
                'no' => '03',
                'icon' => 'bi-file-earmark-text',
                'title' => 'Content templates',
                'body' => 'Each message format is registered as a template with its variable fields.
                           Traffic that does not match an approved template is rejected at the operator.',
            ],
            [
                'no' => '04',
                'icon' => 'bi-patch-check',
                'title' => 'Operator approval',
                'body' => 'Once the entity, header and templates are approved, we map them to your
                           account so your campaigns run on registered routes.',
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
                           Customer Preference Regulations, 2018 (TCCCPR 2018), notified in July 2018 and
                           enforced by the operators from early 2020 onward.',
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
    {{-- Reproduced from the live page. The "5th Feb 2020" deadline below is the
         original wording and is now long past — update or remove that sentence
         before launch rather than leaving a stale date addressed to clients. --}}
    <section class="dlt-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-10">
                    <article class="dlt-letter">
                        <span class="dlt-kicker">Notice to clients</span>
                        <p class="dlt-letter__salutation">Dear Valuable Client,</p>

                        <p class="dlt-letter__para">
                            We thank you for being our valued client and using our SMS services. We are
                            writing this Mail to give you some information about the registration on DLT
                            platform.
                        </p>

                        <p class="dlt-letter__para">
                            Telecom Regulatory Authority of India (TRAI) in its continuous endeavour to
                            create a clean and transparent system in the Indian telecom industry has
                            released a new regulation in July 2018 to curb Unsolicited Commercial
                            Communication (UCC) and enhance mobile subscriber privacy, TCCCPR 18 Telecom
                            Commercial Communications Customer Preference Regulation 2018. The Regulation
                            is intended to eliminate spam and fraud which has been a concern for many
                            years. The regulation has mandated the use of Blockchain technology also known
                            as Distributed Ledger Technology (DLT) to implement the solution.
                        </p>

                        <p class="dlt-letter__para">
                            We would request to please register as entity before 5th Feb 2020 to avoid any
                            impact on traffic. After completion of the registration process you need to
                            provide registered Email-ID to your respective sales manager. So that he will
                            get the approval from operator to complete the registration process.
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
                            Incase you have any queries please feel free to mail us on
                            <a href="mailto:{{ $dltSupportEmail }}">{{ $dltSupportEmail }}</a>
                            OR Call: <a href="tel:{{ $dltSupportPhone }}">{{ $dltSupportPhone }}</a>
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
                    <h2 class="dlt-section__title">Four things have to be approved</h2>
                    <p class="dlt-section__sub">
                        Registration is not a single form. These four objects are approved in order, and
                        a campaign only delivers once all four line up.
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
                        <a class="dlt-support__line" href="tel:{{ $dltSupportPhone }}">
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
