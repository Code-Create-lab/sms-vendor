@extends('layouts.app')
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
         | STILL PLACEHOLDERS: the three $cntEnquiries addresses
         | (help@digital.com, careers@digital.com twice — note the duplicate is
         | in the source too) are theme filler on the digital.com domain. Swap
         | them when the real routing addresses are confirmed; nothing else on
         | the page needs to change.
         */

        $cntEnquiries = [
            ['label' => 'Have questions?',      'email' => 'help@digital.com',    'icon' => 'bi-question-circle'],
            ['label' => 'Join our team?',       'email' => 'careers@digital.com', 'icon' => 'bi-person-plus'],
            ['label' => 'Business inquiries?',  'email' => 'careers@digital.com', 'icon' => 'bi-briefcase'],
        ];

        $cntOffice = [
            'name'    => 'Ad Magister &mdash; Noida',
            'address' => '307, A-43, Sector-63, Noida-201301',
            'phone'   => '+91 9999238814',
            'phoneTel'=> '+919999238814',
            'email'   => 'info@admagister.com',
        ];

        /* The previous revision pointed the "Show on google maps" link at a
           Melbourne place id and embedded a Delhi-wide view — both theme
           leftovers. Both now derive from one query string, so the pin, the
           embed and the printed address cannot drift apart. */
        $cntMapQuery = urlencode('A-43, Sector 63, Noida, Uttar Pradesh 201301');
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
                        <span>{{ $cntOffice['address'] }}</span>
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
