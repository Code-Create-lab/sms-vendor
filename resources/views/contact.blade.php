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
         | DATA IS UNCHANGED from the previous template revision — the three
         | enquiry addresses, the office block and both Google Maps URLs are
         | carried over verbatim. NOTE: several of these are still theme
         | placeholders (help@/careers@digital.com, a London address, the
         | 1-800 number) and they contradict the real Gurugram details in
         | layouts/footer.blade.php. Swap $cntEnquiries and $cntOffice below when
         | the real values are confirmed — nothing else needs to change.
         */

        $cntEnquiries = [
            ['label' => 'Have questions?',      'email' => 'help@digital.com',    'icon' => 'bi-question-circle'],
            ['label' => 'Join our team?',       'email' => 'careers@digital.com', 'icon' => 'bi-person-plus'],
            ['label' => 'Business inquiries?',  'email' => 'careers@digital.com', 'icon' => 'bi-briefcase'],
        ];

        $cntOffice = [
            'name'    => 'digital - London',
            'address' => '401 Broadway, 24th floor, Orchard view, London, UK',
            'phone'   => '1-800-222-000',
            'phoneTel'=> '1800222000',
        ];

        // Kept as-is from the previous revision.
        $cntMapsLink = 'https://maps.google.com/maps?ll=-37.805688,144.962312&z=17&t=m&hl=en-US&gl=IN&mapclient=embed&cid=13153204942596594449';
        $cntMapEmbed = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d448194.82162352453!2d77.09323125!3d28.6440836!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd5b347eb62d%3A0x37205b715389640!2sDelhi!5e0!3m2!1sen!2sin!4v1752521986168!5m2!1sen!2sin';
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
                    <span class="cnt-office__name">{{ $cntOffice['name'] }}</span>

                    <span class="cnt-office__line">
                        <i class="bi bi-geo-alt" aria-hidden="true"></i>
                        <span>{{ $cntOffice['address'] }}</span>
                    </span>

                    {{-- Address is Cloudflare-obfuscated in the source and decoded at
                         runtime by js/email-decode.min.js — markup kept verbatim. --}}
                    <span class="cnt-office__line">
                        <i class="bi bi-envelope" aria-hidden="true"></i>
                        <a href="/cdn-cgi/l/email-protection#abc2c5cdc4ebd2c4ded9cfc4c6cac2c585c8c4c6"><span
                                class="__cf_email__"
                                data-cfemail="4c25222a230c3523393e2823212d2522622f2321">[email&#160;protected]</span></a>
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
