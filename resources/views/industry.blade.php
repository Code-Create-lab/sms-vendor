@extends('layouts.app')
@section('title', $industry['name'] . ' Messaging Solutions')
@section('description', $industry['lede'])
@section('og_image', 'og/industry-solution.jpg')
@section('content')

    {{--
        One template for every /solutions/{slug} page. Content lives in
        config/industries.php; shares the .chn-* and .pdp-* styling with
        product.blade.php.
    --}}

    @php
        $products = collect($industry['products'])
            ->map(fn ($s) => ['slug' => $s] + config("products.$s"));
    @endphp

    {{-- ==================== HERO ==================== --}}
    <section class="chn-hero ipad-top-space-margin position-relative overflow-hidden">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-10 text-center">
                    <nav class="pdp-crumbs" aria-label="Breadcrumb">
                        <a href="{{ route('home') }}">Home</a>
                        <span aria-hidden="true">/</span>
                        <a href="{{ route('industry-solution') }}">Industries</a>
                        <span aria-hidden="true">/</span>
                        <span aria-current="page">{{ $industry['name'] }}</span>
                    </nav>
                    <span class="pdp-hero-icon" aria-hidden="true"><i class="bi {{ $industry['icon'] }}"></i></span>
                    <h1 class="chn-hero__title">
                        Messaging for
                        <span class="chn-hero__accent">{{ $industry['name'] }}</span>
                    </h1>
                    <p class="chn-hero__lede">{{ $industry['lede'] }}</p>
                    <div class="chn-hero__actions">
                        <a href="{{ route('contact') }}" class="chn-btn chn-btn--primary">Talk to sales</a>
                        <a href="#pdp-uses" class="chn-btn chn-btn--ghost">See use cases</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ==================== OVERVIEW ==================== --}}
    <section class="chn-section" aria-labelledby="pdp-about-title">
        <div class="container">
            <div class="chn-detail">
                <div class="chn-detail__intro">
                    <span class="chn-tag">{{ $industry['channels'] }}</span>
                    <h2 id="pdp-about-title" class="chn-detail__title">{{ $industry['summary'] }}</h2>
                    @foreach ($industry['intro'] as $para)
                        <p class="chn-detail__body">{{ $para }}</p>
                    @endforeach
                </div>

                <ul class="chn-points">
                    <li class="chn-point">
                        <i class="bi bi-check-circle-fill" aria-hidden="true"></i>
                        <span>Separate transactional and promotional routes, so alerts are never stuck behind campaigns</span>
                    </li>
                    <li class="chn-point">
                        <i class="bi bi-check-circle-fill" aria-hidden="true"></i>
                        <span>DLT entity, header and template registration handled for you</span>
                    </li>
                    <li class="chn-point">
                        <i class="bi bi-check-circle-fill" aria-hidden="true"></i>
                        <span>API, SMPP or panel upload, connected to the systems you already use</span>
                    </li>
                    <li class="chn-point">
                        <i class="bi bi-check-circle-fill" aria-hidden="true"></i>
                        <span>Per-message delivery reports and a named support contact</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    {{-- ==================== USE CASES ==================== --}}
    <section id="pdp-uses" class="chn-section chn-section--muted" aria-labelledby="pdp-uses-title">
        <div class="container">
            <span class="chn-kicker">Use cases</span>
            <h2 id="pdp-uses-title" class="chn-section__title">What {{ $industry['short'] }} teams send</h2>

            <ul class="pdp-benefits">
                @foreach ($industry['scenarios'] as $scenario)
                    <li class="pdp-benefit">
                        <span class="pdp-benefit__icon" aria-hidden="true"><i class="bi {{ $scenario['icon'] }}"></i></span>
                        <div>
                            <h3 class="pdp-benefit__title">{{ $scenario['title'] }}</h3>
                            <p class="pdp-benefit__text">{{ $scenario['text'] }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    {{-- ==================== CHANNELS USED ==================== --}}
    <section class="chn-section" aria-labelledby="pdp-channels-title">
        <div class="container">
            <span class="chn-kicker">Channels</span>
            <h2 id="pdp-channels-title" class="chn-section__title">The channels behind it</h2>

            <div class="pdp-grid pdp-grid--{{ min($products->count(), 4) }}">
                @foreach ($products as $p)
                    <article class="pdp-card">
                        <span class="pdp-card__icon" aria-hidden="true"><i class="bi {{ $p['icon'] }}"></i></span>
                        <h3 class="pdp-card__title">{{ $p['name'] }}</h3>
                        <p class="pdp-card__text">{{ $p['lede'] }}</p>
                        <a href="{{ route('product', $p['slug']) }}" class="chn-inline-link pdp-card__more">
                            Explore {{ $p['name'] }}
                            <i class="bi bi-arrow-right" aria-hidden="true"></i>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ==================== OTHER INDUSTRIES ==================== --}}
    @include('partials.pdp-related', [
        'kicker' => 'More industries',
        'title'  => 'Other industries we serve',
        'items'  => collect(config('industries'))->except($slug)
                        ->map(fn ($i, $s) => ['href' => route('industry', $s), 'icon' => $i['icon'], 'label' => $i['short']])
                        ->push(['href' => route('election-campaign'), 'icon' => 'bi-flag', 'label' => 'Election Campaign']),
    ])

    {{-- ==================== CTA ==================== --}}
    <section class="chn-cta-wrap">
        <div class="container">
            <div class="chn-cta">
                <div>
                    <h2 class="chn-cta__title">Plan your {{ $industry['short'] }} messaging</h2>
                    <p class="chn-cta__sub">
                        Share the messages your customers receive today. We'll map them to the right channels
                        and handle the registrations.
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
