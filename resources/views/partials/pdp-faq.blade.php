{{-- FAQ block for product and industry pages. Native <details> gives keyboard
     and screen-reader support with no JS. Expects $faqs = [['q' => , 'a' => ], ...]. --}}
<section class="chn-section chn-section--muted" aria-labelledby="pdp-faq-title">
    <div class="container">
        <div class="pdp-faq">
            <div>
                <span class="chn-kicker">Questions</span>
                <h2 id="pdp-faq-title" class="chn-section__title">Frequently asked</h2>
                <p class="chn-section__sub">
                    Can't find your answer? Call <a href="tel:+919718055559">+91 97180 55559</a>
                    or <a href="{{ route('contact') }}">send us a message</a>.
                </p>
            </div>

            <div class="pdp-faq__list">
                @foreach ($faqs as $faq)
                    <details class="pdp-faq__item" @if ($loop->first) open @endif>
                        <summary>
                            {{ $faq['q'] }}
                            <i class="bi bi-plus-lg" aria-hidden="true"></i>
                        </summary>
                        <p>{{ $faq['a'] }}</p>
                    </details>
                @endforeach
            </div>
        </div>
    </div>
</section>
