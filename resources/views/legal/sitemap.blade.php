@extends('layouts.app')
@section('title', 'Sitemap')
@section('description', 'Every page on the Ad Magister website: products, industry solutions, company and legal pages.')
@section('content')

    @php
        // Built from the same config the menus use, so a new product or
        // industry page appears here automatically.
        $sections = [
            [
                'id' => 'main',
                'title' => 'Main pages',
                'blocks' => [['links' => [
                    ['href' => route('home'),              'icon' => 'bi-house',        'label' => 'Home'],
                    ['href' => route('channel'),           'icon' => 'bi-grid',         'label' => 'All channels'],
                    ['href' => route('industry-solution'), 'icon' => 'bi-buildings',    'label' => 'Industry solutions'],
                    ['href' => route('election-campaign'), 'icon' => 'bi-flag',         'label' => 'Election campaign'],
                ]]],
            ],
            [
                'id' => 'products',
                'title' => 'Products',
                'blocks' => [['links' => collect(config('products'))
                    ->map(fn ($p, $slug) => ['href' => route('product', $slug), 'icon' => $p['icon'], 'label' => $p['name']])
                    ->values()->all()]],
            ],
            [
                'id' => 'industries',
                'title' => 'Industries',
                'blocks' => [['links' => collect(config('industries'))
                    ->map(fn ($i, $slug) => ['href' => route('industry', $slug), 'icon' => $i['icon'], 'label' => $i['name']])
                    ->values()->all()]],
            ],
            [
                'id' => 'company',
                'title' => 'Company',
                'blocks' => [['links' => [
                    ['href' => route('about'),            'icon' => 'bi-info-circle', 'label' => 'About us'],
                    ['href' => route('dlt-registration'), 'icon' => 'bi-patch-check', 'label' => 'DLT registration'],
                    ['href' => route('contact'),          'icon' => 'bi-people',      'label' => 'Contact'],
                ]]],
            ],
            [
                'id' => 'legal',
                'title' => 'Legal & help',
                'blocks' => [['links' => [
                    ['href' => route('terms'),         'icon' => 'bi-file-text',    'label' => 'Terms & Conditions'],
                    ['href' => route('privacy'),       'icon' => 'bi-shield-lock',  'label' => 'Privacy Policy'],
                    ['href' => route('legal-notices'), 'icon' => 'bi-bank',         'label' => 'Legal notices'],
                    ['href' => route('faqs'),          'icon' => 'bi-question-circle', 'label' => 'FAQs'],
                ]]],
            ],
        ];
    @endphp

    @include('legal._page', [
        'eyebrow'  => 'Sitemap',
        'title'    => 'Sitemap',
        'lede'     => 'Every page on this website in one place.',
        'updated'  => null,
        'sections' => $sections,
    ])

@endsection
