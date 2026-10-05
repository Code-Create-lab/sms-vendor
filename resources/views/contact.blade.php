@extends('layouts.app')
@section('title', 'Contact Us')
@section('description', 'Talk to Ad Magister about bulk SMS, RCS, Voice or WhatsApp campaigns. Call +91 9718055559 or email info@admagister.com. Office in Bhavishya India Tower, Gaur City 2, Ghaziabad, Uttar Pradesh.')
@section('og_image', 'og/contact.jpg')
@section('content')

    @php
        /*
         |--------------------------------------------------------------------------
         | Contact  (namespace: .cnt-*)
         |--------------------------------------------------------------------------
         | Styling lives in public/css/custom.css alongside the .abt-* / .ind-*
         | blocks and shares their token set, so Contact reads as the same product.
         |
         | $cntOffice and the map now carry the real Noida office, phone and
         | email, matching layouts/footer.blade.php.
         |
         | All three $cntEnquiries route to info@admagister.com for now (the
         | theme shipped digital.com filler here). Give a row its own address
         | once a dedicated inbox exists; nothing else on the page changes.
         */

        $cntEnquiries = [
            ['label' => 'Have questions?',      'email' => 'info@admagister.com', 'icon' => 'bi-question-circle'],
            ['label' => 'Join our team?',       'email' => 'info@admagister.com', 'icon' => 'bi-person-plus'],
            ['label' => 'Business inquiries?',  'email' => 'info@admagister.com', 'icon' => 'bi-briefcase'],
        ];

        $cntOffice = [
            'name'    => 'Ad Magister &mdash; Noida',
            'address' => ['Office No. 101, 1st Floor,', 'Bhavishya India Tower, Gaur City 2,', 'Ghaziabad, Uttar Pradesh – 201009, India.'],
            'phone'   => '+91 9718055559',
            'phoneTel'=> '+919718055559',
            'email'   => 'info@admagister.com',
        ];

        /* The previous revision pointed the "Show on google maps" link at a
           Melbourne place id and embedded a Delhi-wide view — both theme
           leftovers. Both now derive from one query string, so the pin, the
           embed and the printed address cannot drift apart. */
        $cntMapQuery = urlencode('Bhavishya India Tower, Gaur City 2, Ghaziabad, Uttar Pradesh 201009');
        $cntMapsLink = 'https://maps.google.com/maps?q=' . $cntMapQuery;
        $cntMapEmbed = 'https://www.google.com/maps?q=' . $cntMapQuery . '&output=embed';
    @endphp

    {{-- ==================== HERO ==================== --}}
    <section class="cnt-hero ipad-top-space-margin position-relative overflow-hidden">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-10 text-center">
                    <span class="cnt-eyebrow">Contact</span>
                    <h1 class="cnt-hero__title">Let&rsquo;s get <span class="cnt-hero__accent">in touch</span></h1>
                </div>
            </div>

            <div class="cnt-enquiries">
                @foreach ($cntEnquiries as $enquiry)
                    <div class="cnt-enquiry">
                        <span class="cnt-enquiry__icon" aria-hidden="true">
                            <i class="bi {{ $enquiry['icon'] }}"></i>
                        </span>
                        <span class="cnt-enquiry__label">{{ $enquiry['label'] }}</span>
                        <a class="cnt-enquiry__email" href="mailto:{{ $enquiry['email'] }}">{{ $enquiry['email'] }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ==================== FORM ==================== --}}
    <section class="cnt-section">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5">
                    <div class="cnt-sticky">
                        <span class="cnt-kicker">Start a project</span>
                        <h2 class="cnt-section__title">
                            Let us help you get <span class="cnt-section__accent">your project started.</span>
                        </h2>
                    </div>
                </div>

                {{-- Livewire component: fields, validation and submit are untouched. --}}
                <div class="col-lg-7">
                    <div class="cnt-form">
                        @livewire('contact-form')
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ==================== OFFICE + MAP ==================== --}}
    <section class="cnt-section cnt-section--muted">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <span class="cnt-kicker">Where to find us</span>
                    <h2 class="cnt-section__title">Visit the office</h2>
                </div>
            </div>

            <div class="cnt-location">
                <address class="cnt-office">
                    <span class="cnt-office__name">{!! $cntOffice['name'] !!}</span>

                    <span class="cnt-office__line">
                        <i class="bi bi-geo-alt" aria-hidden="true"></i>
                        <span>{!! implode('<br>', array_map('e', $cntOffice['address'])) !!}</span>
                    </span>

                    {{-- Was a Cloudflare-obfuscated address that decoded to the theme
                         placeholder info@yourdomain.com. --}}
                    <span class="cnt-office__line">
                        <i class="bi bi-envelope" aria-hidden="true"></i>
                        <a href="mailto:{{ $cntOffice['email'] }}">{{ $cntOffice['email'] }}</a>
                    </span>

                    <span class="cnt-office__line">
                        <i class="bi bi-telephone" aria-hidden="true"></i>
                        <a href="tel:{{ $cntOffice['phoneTel'] }}">{{ $cntOffice['phone'] }}</a>
                    </span>

                    <a href="{{ $cntMapsLink }}" target="_blank" rel="noopener noreferrer" class="cnt-btn cnt-btn--ghost">
                        <i class="bi bi-map" aria-hidden="true"></i>
                        Show on google maps
                    </a>
                </address>

                <div class="cnt-map">
                    <iframe src="{{ $cntMapEmbed }}" title="Office location on Google Maps" width="100%"
                        height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>

@endsection
