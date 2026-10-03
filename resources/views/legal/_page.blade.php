{{--
    Shared body for the legal / utility pages (terms, privacy, legal notices,
    FAQs, sitemap). Styling: .lgl-* in public/css/custom.css; the hero reuses
    the .chn-* shell so these read as part of the same site.

    Expects:
      $eyebrow, $title, $lede, $updated (nullable)
      $sections = [['id' => , 'title' => , 'blocks' => [...]], ...]
    Each block is one of:
      'plain string'                  → paragraph
      ['list'  => ['...', ...]]       → bullet list
      ['alist' => ['...', ...]]       → lettered list (a, b, c)
      ['faq'   => [['q'=>, 'a'=>]]]   → accordion
      ['links' => [['href'=>, 'label'=>, 'icon'=>?]]] → link grid
      ['note'  => '...']              → highlighted callout
--}}
<section class="chn-hero ipad-top-space-margin position-relative overflow-hidden">
    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10 text-center">
                <nav class="pdp-crumbs" aria-label="Breadcrumb">
                    <a href="{{ route('home') }}">Home</a>
                    <span aria-hidden="true">/</span>
                    <span aria-current="page">{{ $title }}</span>
                </nav>
                <span class="chn-eyebrow">{{ $eyebrow }}</span>
                <h1 class="chn-hero__title">{{ $title }}</h1>
                <p class="chn-hero__lede">{{ $lede }}</p>
                @if (!empty($updated))
                    <p class="lgl-updated">Last updated: {{ $updated }}</p>
                @endif
            </div>
        </div>
    </div>
</section>

<section class="chn-section lgl-wrap">
    <div class="container">
        <div class="lgl-layout {{ count($sections) < 3 ? 'lgl-layout--single' : '' }}">

            @if (count($sections) >= 3)
                <nav class="lgl-toc" aria-label="On this page">
                    <p class="lgl-toc__title">On this page</p>
                    <ol>
                        @foreach ($sections as $section)
                            <li><a href="#{{ $section['id'] }}">{{ $section['title'] }}</a></li>
                        @endforeach
                    </ol>
                </nav>
            @endif

            <article class="lgl-body">
                @foreach ($sections as $section)
                    <div class="lgl-section" id="{{ $section['id'] }}">
                        <h2 class="lgl-section__title">{{ $section['title'] }}</h2>

                        @foreach ($section['blocks'] as $block)
                            @if (is_string($block))
                                <p>{{ $block }}</p>
                            @elseif (isset($block['list']))
                                <ul class="lgl-list">
                                    @foreach ($block['list'] as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            @elseif (isset($block['alist']))
                                <ol class="lgl-list lgl-list--alpha" type="a">
                                    @foreach ($block['alist'] as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ol>
                            @elseif (isset($block['note']))
                                <p class="lgl-note"><i class="bi bi-info-circle" aria-hidden="true"></i> {{ $block['note'] }}</p>
                            @elseif (isset($block['faq']))
                                <div class="pdp-faq__list">
                                    @foreach ($block['faq'] as $faq)
                                        <details class="pdp-faq__item">
                                            <summary>
                                                {{ $faq['q'] }}
                                                <i class="bi bi-plus-lg" aria-hidden="true"></i>
                                            </summary>
                                            <p>{{ $faq['a'] }}</p>
                                        </details>
                                    @endforeach
                                </div>
                            @elseif (isset($block['links']))
                                <ul class="lgl-links">
                                    @foreach ($block['links'] as $link)
                                        <li>
                                            <a href="{{ $link['href'] }}">
                                                @isset($link['icon'])
                                                    <i class="bi {{ $link['icon'] }}" aria-hidden="true"></i>
                                                @endisset
                                                {{ $link['label'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        @endforeach
                    </div>
                @endforeach

                <div class="lgl-contact">
                    <p>
                        Questions about this page? Email
                        <a href="mailto:info@admagister.com">info@admagister.com</a>
                        or call <a href="tel:+919718055559">+91 9718055559</a>.
                    </p>
                </div>
            </article>

        </div>
    </div>
</section>
