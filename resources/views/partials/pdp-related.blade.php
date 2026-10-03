{{-- Row of icon links to sibling pages. Expects $kicker, $title and
     $items = [['href' => , 'icon' => , 'label' => ], ...]. --}}
<section class="chn-section" aria-labelledby="pdp-related-title">
    <div class="container">
        <span class="chn-kicker">{{ $kicker }}</span>
        <h2 id="pdp-related-title" class="chn-section__title">{{ $title }}</h2>

        <ul class="pdp-related">
            @foreach ($items as $item)
                <li>
                    <a class="pdp-related__link" href="{{ $item['href'] }}">
                        <span class="pdp-card__icon" aria-hidden="true"><i class="bi {{ $item['icon'] }}"></i></span>
                        <span class="pdp-related__label">{{ $item['label'] }}</span>
                        <i class="bi bi-arrow-right pdp-related__arrow" aria-hidden="true"></i>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</section>
