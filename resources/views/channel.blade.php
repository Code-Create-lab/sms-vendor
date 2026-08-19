@extends('layouts.app')
@section('content')

    @php
        /*
         |--------------------------------------------------------------------------
         | Channels  (namespace: .chn-*)
         |--------------------------------------------------------------------------
         | Styling lives in public/css/custom.css and shares the token set used by
         | .abt-*, .cnt-*, .dlt-* and .ind-*.
         |
         | Copy provenance — the previous revision of this page had usable text for
         | only two of the five channels:
         |   - RCS was literally marked "( Pending Content )";
         |   - WhatsApp and Digital marketing carried the same web-agency filler
         |     ("We are excited for our work... 12 years of experience... web
         |     solutions services") that was removed from the About page;
         |   - Bulk SMS described "Bulk Email services", which is the wrong product
         |     for that heading — treated as a copy-paste slip and rewritten for SMS;
         |   - Voice was genuine and is carried over close to the original wording.
         | Everything else is built from the channel copy the homepage already
         | publishes, so the two pages agree. No pricing, volumes or SLAs are
         | stated here because the site publishes none — do not invent them.
         */

        $chnChannels = [
            [
                'id'      => 'bulk-sms',
                'no'      => '01',
                'icon'    => 'bi-chat-dots',
                'name'    => 'Bulk SMS',
                'tag'     => 'Widest reach',
                'summary' => 'Transactional, OTP and promotional traffic on DLT-registered headers,
                              with per-message delivery receipts.',
                'body'    => 'SMS still reaches every handset on every network without an app, a data
                              connection or an opt-in to a platform. It is the channel we fall back to
                              when a message simply has to arrive.',
                'points'  => [
                    'Separate transactional and promotional routes, so an OTP is never queued behind a campaign',
                    'DLT entity, header and template registration handled for you',
                    'Per-message delivery receipts with operator-level failure reasons',
                    'REST API, SMPP or panel upload — whichever fits your stack',
                ],
            ],
            [
                'id'      => 'rcs',
                'no'      => '02',
                'icon'    => 'bi-chat-square-text',
                'name'    => 'RCS Business Messaging',
                'tag'     => 'Richest format',
                'summary' => 'Verified sender, branded cards, carousels and quick-reply buttons —
                              delivered inside the native Messages app.',
                'body'    => 'RCS upgrades the SMS inbox rather than replacing it. Your brand name and
                              logo are verified by the operator, so the customer can see who is writing
                              before they open anything.',
                'points'  => [
                    'Verified sender profile with brand name, logo and colour',
                    'Rich cards, image carousels and quick-reply buttons',
                    'Read receipts and typing indicators for two-way flows',
                    'Automatic SMS fallback when the handset does not support RCS',
                ],
            ],
            [
                'id'      => 'voice',
                'no'      => '03',
                'icon'    => 'bi-telephone',
                'name'    => 'Voice &amp; IVR',
                'tag'     => 'Beyond the smartphone',
                'summary' => 'Outbound voice broadcasts, missed-call numbers and IVR trees for reach
                              beyond the smartphone base.',
                // Carried over from the previous revision, lightly tidied.
                'body'    => 'Voice earns a higher response rate than standard mail while staying as fast
                              and economical as messaging, and it opens a second line of communication
                              into parts of your audience that text does not reach.',
                'points'  => [
                    'Outbound dialling (OBD) for announcements and reminders',
                    'Missed-call numbers for opt-ins, verification and call-backs',
                    'IVR trees that route callers without an agent',
                    'Reaches feature phones and low-literacy audiences',
                ],
            ],
            [
                'id'      => 'whatsapp',
                'no'      => '04',
                'icon'    => 'bi-whatsapp',
                'name'    => 'WhatsApp Business API',
                'tag'     => 'Two-way conversations',
                'summary' => 'Template notifications, two-way conversations and catalogue journeys on an
                              official Business API account.',
                'body'    => 'The Business API is the sanctioned route for messaging customers at scale on
                              WhatsApp — a verified business profile, approved templates and a real
                              conversation thread rather than a broadcast.',
                'points'  => [
                    'Verified business profile and green-tick application support',
                    'Approved message templates for notifications and reminders',
                    'Two-way threads that can hand off to your agents',
                    'Catalogue and product journeys inside the chat',
                ],
            ],
            [
                'id'      => 'digital-marketing',
                'no'      => '05',
                'icon'    => 'bi-megaphone',
                'name'    => 'Digital marketing',
                'tag'     => 'Demand, not just delivery',
                'summary' => 'Creative, targeting and performance reporting run by the same team that owns
                              your delivery routes.',
                'body'    => 'The messaging only works if the offer and the audience are right. The same
                              team that runs your routes also runs the campaigns feeding them, so nothing
                              is lost in a handover between vendors.',
                'points'  => [
                    'Campaign creative built for the channel it ships on',
                    'Audience segmentation from your own customer data',
                    'Landing pages and forms wired to the same reporting',
                    'Performance reviewed against delivery data, not just clicks',
                ],
            ],
        ];

        // "Which channel when" — one row per channel, kept in the same order.
        $chnCompare = [
            ['channel' => 'Bulk SMS',   'best' => 'Alerts that must arrive',        'format' => 'Text, 160 chars',        'reach' => 'Every handset'],
            ['channel' => 'RCS',        'best' => 'Branded, visual campaigns',      'format' => 'Cards, carousels, chips','reach' => 'RCS-capable Android'],
            ['channel' => 'Voice',      'best' => 'Non-smartphone audiences',       'format' => 'Audio, IVR menus',       'reach' => 'Every phone'],
            ['channel' => 'WhatsApp',   'best' => 'Conversations and support',      'format' => 'Templates, rich media',  'reach' => 'WhatsApp users'],
            ['channel' => 'Digital',    'best' => 'Finding new audiences',          'format' => 'Ads, pages, creative',   'reach' => 'Paid and organic'],
        ];
    @endphp

    {{-- ==================== HERO ==================== --}}
    <section class="chn-hero ipad-top-space-margin position-relative overflow-hidden">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-10 text-center">
                    <span class="chn-eyebrow">Channels</span>
                    <h1 class="chn-hero__title">
                        Five channels,
                        <span class="chn-hero__accent">one integration</span>
                    </h1>
                    <p class="chn-hero__lede">
                        Start on the channel that fits the message, then add the rest without
                        re-integrating. The same API, console and delivery reporting drive all of them.
                    </p>
                    <div class="chn-hero__actions">
                        <a href="{{ route('contact') }}" class="chn-btn chn-btn--primary">Talk to sales</a>
                        <a href="#chn-compare" class="chn-btn chn-btn--ghost">Compare channels</a>
                    </div>
                </div>
            </div>

            {{-- Jump nav: five long sections follow, so give them a shortcut. --}}
            <nav class="chn-jump" aria-label="Jump to a channel">
                @foreach ($chnChannels as $channel)
                    <a class="chn-jump__link" href="#{{ $channel['id'] }}">
                        <i class="bi {{ $channel['icon'] }}" aria-hidden="true"></i>
                        <span>{!! $channel['name'] !!}</span>
                    </a>
                @endforeach
            </nav>
        </div>
    </section>

    {{-- ==================== CHANNEL DETAIL ==================== --}}
    @foreach ($chnChannels as $channel)
        <section id="{{ $channel['id'] }}"
                 class="chn-section {{ $loop->odd ? '' : 'chn-section--muted' }}"
                 aria-labelledby="{{ $channel['id'] }}-title">
            <div class="container">
                <div class="chn-detail {{ $loop->even ? 'chn-detail--flip' : '' }}">

                    <div class="chn-detail__intro">
                        <div class="chn-detail__head">
                            <span class="chn-detail__no" aria-hidden="true">{{ $channel['no'] }}</span>
                            <span class="chn-detail__icon" aria-hidden="true">
                                <i class="bi {{ $channel['icon'] }}"></i>
                            </span>
                        </div>
                        <span class="chn-tag">{{ $channel['tag'] }}</span>
                        <h2 id="{{ $channel['id'] }}-title" class="chn-detail__title">{!! $channel['name'] !!}</h2>
                        <p class="chn-detail__summary">{{ $channel['summary'] }}</p>
                        <p class="chn-detail__body">{{ $channel['body'] }}</p>
                        <a href="{{ route('contact') }}" class="chn-inline-link">
                            Discuss {!! $channel['name'] !!}
                            <i class="bi bi-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>

                    <ul class="chn-points">
                        @foreach ($channel['points'] as $point)
                            <li class="chn-point">
                                <i class="bi bi-check-circle-fill" aria-hidden="true"></i>
                                <span>{{ $point }}</span>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </section>
    @endforeach

    {{-- ==================== COMPARISON ==================== --}}
    <section id="chn-compare" class="chn-section chn-section--muted">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <span class="chn-kicker">Side by side</span>
                    <h2 class="chn-section__title">Which channel, when</h2>
                    <p class="chn-section__sub">
                        Most accounts run two or three of these together — an alert channel, a campaign
                        channel and something for conversations.
                    </p>
                </div>
            </div>

            {{-- Wide table scrolls inside its own container rather than the page. --}}
            <div class="chn-table-wrap" tabindex="0" role="region" aria-label="Channel comparison table">
                <table class="chn-table">
                    <thead>
                        <tr>
                            <th scope="col">Channel</th>
                            <th scope="col">Best for</th>
                            <th scope="col">Format</th>
                            <th scope="col">Reach</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chnCompare as $row)
                            <tr>
                                <th scope="row">{{ $row['channel'] }}</th>
                                <td>{{ $row['best'] }}</td>
                                <td>{{ $row['format'] }}</td>
                                <td>{{ $row['reach'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    {{-- ==================== CTA ==================== --}}
    <section class="chn-cta-wrap">
        <div class="container">
            <div class="chn-cta">
                <div>
                    <h2 class="chn-cta__title">Not sure which channel you need?</h2>
                    <p class="chn-cta__sub">
                        Tell us what you need to send and to how many, and we will come back with the
                        right channel mix and the registrations it needs.
                    </p>
                </div>
                <div class="chn-cta__actions">
                    <a href="{{ route('contact') }}" class="chn-btn chn-btn--primary">Talk to sales</a>
                    <a href="{{ route('dlt-registration') }}" class="chn-btn chn-btn--ghost">DLT registration</a>
                </div>
            </div>
        </div>
    </section>

@endsection
