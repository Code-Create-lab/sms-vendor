@extends('layouts.app')
@section('content')

    @php
        /*
         |--------------------------------------------------------------------------
         | Election campaigns  (namespace: .elc-*)
         |--------------------------------------------------------------------------
         | Styling lives in public/css/custom.css and shares the token set used by
         | .abt-*, .chn-*, .cnt-*, .dlt-* and .ind-*.
         |
         | Content is carried over from Ad Magister's own page at
         | bulksmsdelhincr.com/election-campaign-special.php. Every section and
         | every claim from that article is represented here, in the same order.
         | The prose has been tidied for grammar — the source reads as
         | machine-translated in places ("Y'all know that...", "Isn't possible to
         | send your supporters...") and that wording would undercut the rebuilt
         | design. The substance is unchanged.
         |
         | ONE DELIBERATE DEPARTURE: the source's "Worth to invest" paragraph ends
         | "this service is somewhat expensive though it's worth to avail", which
         | contradicts the same page calling SMS "cost-efficient" two paragraphs
         | earlier, and argues against the sale. That clause is omitted; the
         | section still makes the value-for-money case. Restore it if it was
         | deliberate.
         |
         | The source also ends in an inline "grab OFFER TODAY" lead form
         | (name/email/phone). This page routes to /contact instead of running a
         | second form — say the word if an inline form is wanted here.
         */

        // "Key objectives of sending Bulk SMS" — the source's four bullets.
        $elcObjectives = [
            ['icon' => 'bi-megaphone',    'text' => 'Information about your political party and its agenda'],
            ['icon' => 'bi-person-badge', 'text' => 'Details of the candidates standing for your party'],
            ['icon' => 'bi-bell',         'text' => 'Important notifications relating to the voting process'],
            ['icon' => 'bi-calendar-check','text' => 'Reminders about the day and date of polling'],
        ];

        // "How Bulk SMS services help the election campaign" — the source's four benefits.
        $elcBenefits = [
            [
                'icon'  => 'bi-link-45deg',
                'title' => 'A bridge between party and public',
                'body'  => 'When you need to put an important message in front of voters, a bulk SMS
                            campaign acts as the bridge. Reaching each person directly is what builds a
                            personal bond, and that is what turns an audience into supporters.',
            ],
            [
                'icon'  => 'bi-clock-history',
                'title' => 'Saves a great deal of time',
                'body'  => 'You cannot send workers and candidates to every location, and if you try,
                            somewhere always gets missed. Delivering the agenda by SMS reaches people at
                            the far end of the constituency and saves both effort and time.',
            ],
            [
                'icon'  => 'bi-patch-check',
                'title' => 'A message you can rely on',
                'body'  => 'Rather than carrying your agenda door to door, bulk SMS puts it in front of
                            millions of individuals within minutes — and you can confirm that it reached
                            the recipients you targeted.',
            ],
            [
                'icon'  => 'bi-cash-coin',
                'title' => 'Worth the investment',
                'body'  => 'A single SMS concept reaches a very large audience at once. You supply the
                            message; the campaign does the rest. No waiting on results and no doubt about
                            whether the message went out.',
            ],
        ];

        $elcNorms = [
            'Keep a consistent, standard format from the first message to the last',
            'Write professionally rather than pushing a hard promotional tone',
            'Send in the regional language your voters actually read',
            'Register senders and templates before the campaign window opens',
        ];
    @endphp

    {{-- ==================== HERO ==================== --}}
    <section class="elc-hero ipad-top-space-margin position-relative overflow-hidden">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-10 text-center">
                    <span class="elc-eyebrow">Election campaigns</span>
                    <h1 class="elc-hero__title">
                        Empower your election campaign with the
                        <span class="elc-hero__accent">supremacy of bulk SMS</span>
                    </h1>
                    <p class="elc-hero__lede">
                        Bulk SMS is the gateway between an organisation and the people it needs to reach.
                        It sends your message straight to the mobile numbers you select — and in politics,
                        that direct line is what turns a constituency into supporters.
                    </p>
                    <div class="elc-hero__actions">
                        <a href="{{ route('contact') }}" class="elc-btn elc-btn--primary">Get a campaign quote</a>
                        <a href="tel:+919999238814" class="elc-btn elc-btn--ghost">
                            <i class="bi bi-telephone" aria-hidden="true"></i>
                            +91 9999238814
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ==================== WHY SMS ==================== --}}
    <section class="elc-section">
        <div class="container">
            <div class="row g-5 align-items-start">
                <div class="col-lg-6">
                    <span class="elc-kicker">Why this channel</span>
                    <h2 class="elc-section__title">No other channel is this personal</h2>
                    <p class="elc-prose">
                        Compared with any other form of communication, SMS is personal and it reaches the
                        recipient almost immediately, wherever they are. Email may feel personal too, but
                        it does not carry anything like the same delivery reliability.
                    </p>
                    <p class="elc-prose">
                        That is why almost every business has moved to SMS promotion — and why the same
                        approach produces dramatic results for political parties looking to put
                        information in front of ordinary voters.
                    </p>
                </div>

                <div class="col-lg-6">
                    <span class="elc-kicker">Bulk SMS in politics</span>
                    <h2 class="elc-section__title">Competition rises every cycle</h2>
                    <p class="elc-prose">
                        Every party is putting its demands and its agenda to the same electorate. That
                        means taking a decisive step to connect with people and make the value of your
                        party understood. You already know who believes in you — the winning strategy is
                        reaching everyone else.
                    </p>
                    <p class="elc-prose">
                        Every party wants close communication with the whole constituency, and holding
                        people's attention is what converts them into the support you are counting on. A
                        cost-efficient bulk SMS campaign is how you reach those voters and speak to each
                        one individually.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ==================== KEY OBJECTIVES ==================== --}}
    <section class="elc-section elc-section--muted">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <span class="elc-kicker">What you send</span>
                    <h2 class="elc-section__title">Key objectives of a campaign SMS</h2>
                </div>
            </div>

            <ul class="elc-objectives">
                @foreach ($elcObjectives as $objective)
                    <li class="elc-objective">
                        <span class="elc-objective__icon" aria-hidden="true">
                            <i class="bi {{ $objective['icon'] }}"></i>
                        </span>
                        <span>{{ $objective['text'] }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    {{-- ==================== BENEFITS ==================== --}}
    <section class="elc-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <span class="elc-kicker">The case for it</span>
                    <h2 class="elc-section__title">How bulk SMS helps an election campaign</h2>
                    <p class="elc-section__sub">
                        During an election a party has to stay in communication with ordinary voters.
                        These are the benefits that matter most.
                    </p>
                </div>
            </div>

            <div class="elc-grid">
                @foreach ($elcBenefits as $benefit)
                    <article class="elc-card">
                        <span class="elc-card__icon" aria-hidden="true">
                            <i class="bi {{ $benefit['icon'] }}"></i>
                        </span>
                        <h3 class="elc-card__title">{{ $benefit['title'] }}</h3>
                        <p class="elc-card__body">{{ $benefit['body'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ==================== DOES IT WORK ==================== --}}
    <section class="elc-section elc-section--muted">
        <div class="container">
            <div class="row g-5 align-items-start">
                <div class="col-lg-6">
                    <span class="elc-kicker">Does it actually work?</span>
                    <h2 class="elc-section__title">You cannot visit every home</h2>
                    <p class="elc-prose">
                        The impact you have meeting someone in person is the same impact a personal
                        message carries. Since you cannot reach every household door to door, the
                        practical route is a promotional SMS service — and smartphone ownership now
                        reaches nearly every individual.
                    </p>
                    <p class="elc-prose">
                        A bulk SMS gateway for political parties sends in the regional language people
                        actually speak, so every voter understands what you sent. It is also a two-way
                        channel: your candidates can send information back.
                    </p>
                </div>

                <div class="col-lg-6">
                    <span class="elc-kicker">A booming channel</span>
                    <h2 class="elc-section__title">It reaches people nothing else does</h2>
                    <p class="elc-prose">
                        Important information travels by SMS because it reaches people who would not
                        otherwise have heard it. In politics that includes voters who are unaware of your
                        agenda, or not yet interested enough to vote at all — and who may reconsider.
                    </p>
                    <p class="elc-prose">
                        When a message arrives on behalf of your party it gets recognised, and it leaves a
                        personal impression that lasts. Sending regularly — party news, an inspirational
                        message, the voting details — is what pulls the public towards voting for you.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ==================== NORMS ==================== --}}
    <section class="elc-section">
        <div class="container">
            <div class="elc-norms">
                <div class="elc-norms__intro">
                    <span class="elc-kicker elc-kicker--invert">Follow the norms</span>
                    <h2 class="elc-section__title elc-section__title--invert">
                        Campaign messaging still has rules
                    </h2>
                    <p class="elc-section__sub elc-section__sub--invert">
                        Your message has to hold a standard format from start to finish, and read as
                        professional rather than purely promotional. You do not have to work that out
                        alone — our team helps craft the message so it lands with every recipient.
                    </p>
                    <a href="{{ route('dlt-registration') }}" class="elc-btn elc-btn--invert">
                        DLT registration
                    </a>
                </div>

                <ul class="elc-norms__list">
                    @foreach ($elcNorms as $norm)
                        <li>
                            <i class="bi bi-check2-circle" aria-hidden="true"></i>
                            <span>{{ $norm }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    {{-- ==================== CONCLUSION + CTA ==================== --}}
    <section class="elc-cta-wrap">
        <div class="container">
            <div class="elc-cta">
                <div class="elc-cta__body">
                    <span class="elc-kicker">In short</span>
                    <h2 class="elc-cta__title">Run the campaign on routes that deliver.</h2>
                    <p class="elc-cta__sub">
                        Bulk SMS brings real advantages to an election campaign, with the features and
                        utilities to get your message out. In a field this competitive, the way to succeed
                        is a well-established service that runs safely and without friction.
                    </p>
                    <div class="elc-hero__actions elc-hero__actions--start">
                        <a href="{{ route('contact') }}" class="elc-btn elc-btn--primary">Talk to our team</a>
                        <a href="{{ route('channel') }}" class="elc-btn elc-btn--ghost">See all channels</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
