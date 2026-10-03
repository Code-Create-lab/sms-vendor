@extends('layouts.app')
@section('title', $product['title'])
@section('description', $product['meta'])
@section('og_image', 'og/channel.jpg')
@section('content')

    {{--
        One template for every /products/{slug} page. Content lives in
        config/products.php; layout reuses the .chn-* system from /channel and
        adds a few .pdp-* pieces (card grid, FAQ, related links) shared with
        industry.blade.php. Styling in public/css/custom.css.
    --}}

    {{-- ==================== HERO ==================== --}}
    <section class="chn-hero ipad-top-space-margin position-relative overflow-hidden">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-10 text-center">
                    <nav class="pdp-crumbs" aria-label="Breadcrumb">
                        <a href="{{ route('home') }}">Home</a>
                        <span aria-hidden="true">/</span>
                        <a href="{{ route('channel') }}">Products</a>
                        <span aria-hidden="true">/</span>
                        <span aria-current="page">{{ $product['name'] }}</span>
                    </nav>
                    <span class="pdp-hero-icon" aria-hidden="true"><i class="bi {{ $product['icon'] }}"></i></span>
                    <h1 class="chn-hero__title">
                        {{ $product['headline'] }}
                        <span class="chn-hero__accent">{{ $product['accent'] }}</span>
                    </h1>
                    <p class="chn-hero__lede">{{ $product['lede'] }}</p>
                    <div class="chn-hero__actions">
                        <a href="{{ route('contact') }}" class="chn-btn chn-btn--primary">Get a quote</a>
                        <a href="#pdp-types" class="chn-btn chn-btn--ghost">{{ $product['types_title'] }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ==================== ABOUT ==================== --}}
    <section class="chn-section" aria-labelledby="pdp-about-title">
        <div class="container">
            <div class="chn-detail">
                <div class="chn-detail__intro">
                    <span class="chn-tag">About</span>
                    <h2 id="pdp-about-title" class="chn-detail__title">{{ $product['name'] }}</h2>
                    @foreach ($product['about'] as $para)
                        <p class="chn-detail__body">{{ $para }}</p>
                    @endforeach
                    <a href="{{ route('contact') }}" class="chn-inline-link">
                        Talk to us about {{ $product['name'] }}
                        <i class="bi bi-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>

                <ul class="chn-points">
                    @foreach (array_slice($product['benefits'], 0, 4) as $benefit)
                        <li class="chn-point">
                            <i class="bi bi-check-circle-fill" aria-hidden="true"></i>
                            <span><strong>{{ $benefit['title'] }}.</strong> {{ $benefit['text'] }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    {{-- ==================== TYPES / SERVICES ==================== --}}
    <section id="pdp-types" class="chn-section chn-section--muted" aria-labelledby="pdp-types-title">
        <div class="container">
            <span class="chn-kicker">{{ $product['name'] }}</span>
            <h2 id="pdp-types-title" class="chn-section__title">{{ $product['types_title'] }}</h2>

            <div class="pdp-grid pdp-grid--{{ count($product['types']) }}">
                @foreach ($product['types'] as $type)
                    <article class="pdp-card">
                        <span class="pdp-card__icon" aria-hidden="true"><i class="bi {{ $type['icon'] }}"></i></span>
                        <h3 class="pdp-card__title">{{ $type['name'] }}</h3>
                        <p class="pdp-card__text">{{ $type['text'] }}</p>
                        <ul class="pdp-card__list">
                            @foreach ($type['items'] as $item)
                                <li><i class="bi bi-check2" aria-hidden="true"></i>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ==================== BENEFITS ==================== --}}
    <section class="chn-section" aria-labelledby="pdp-benefits-title">
        <div class="container">
            <span class="chn-kicker">Why it works</span>
            <h2 id="pdp-benefits-title" class="chn-section__title">Benefits of {{ $product['name'] }}</h2>

            <ul class="pdp-benefits">
                @foreach ($product['benefits'] as $benefit)
                    <li class="pdp-benefit">
                        <span class="pdp-benefit__icon" aria-hidden="true"><i class="bi {{ $benefit['icon'] }}"></i></span>
                        <div>
                            <h3 class="pdp-benefit__title">{{ $benefit['title'] }}</h3>
                            <p class="pdp-benefit__text">{{ $benefit['text'] }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    {{-- ==================== FAQ ==================== --}}
    @if (!empty($product['faqs']))
        @include('partials.pdp-faq', ['faqs' => $product['faqs']])
    @endif

    {{-- ==================== OTHER PRODUCTS ==================== --}}
    @include('partials.pdp-related', [
        'kicker' => 'More channels',
        'title'  => 'Pair it with',
        'items'  => collect(config('products'))->except($slug)
                        ->map(fn ($p, $s) => ['href' => route('product', $s), 'icon' => $p['icon'], 'label' => $p['name']]),
    ])

    {{-- ==================== CTA ==================== --}}
    <section class="chn-cta-wrap">
        <div class="container">
            <div class="chn-cta">
                <div>
                    <h2 class="chn-cta__title">Ready to start with {{ $product['name'] }}?</h2>
                    <p class="chn-cta__sub">
                        Tell us what you need to send and to how many people. We'll come back with a plan,
                        pricing and the registrations it needs.
                    </p>
                </div>
                <div class="chn-cta__actions">
                    <a href="{{ route('contact') }}" class="chn-btn chn-btn--primary">Get a quote</a>
                    <a href="{{ route('dlt-registration') }}" class="chn-btn chn-btn--ghost">DLT registration</a>
                </div>
            </div>
        </div>
    </section>

@endsection
