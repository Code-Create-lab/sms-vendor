@extends('layouts.app')
@section('title', 'FAQs')
@section('description', 'Answers to common questions about Ad Magister bulk SMS, DLT registration, RCS, WhatsApp Business API, Voice & IVR, billing and support.')
@section('content')

    @php
        /*
         | General questions live here; each product's questions come straight
         | from config/products.php, so editing an FAQ there updates both the
         | product page and this page.
         */
        $sections = [
            [
                'id' => 'getting-started',
                'title' => 'Getting started',
                'blocks' => [['faq' => [
                    ['q' => 'How do I start sending messages with Ad Magister?', 'a' => 'Contact us with what you want to send and roughly how many messages. We set up your account, complete DLT registration, and give you panel and API access. Most customers can send their first message as soon as their headers and templates are approved.'],
                    ['q' => 'Can I test the service before buying?', 'a' => 'Yes. We recommend testing before you commit. Ask our sales team for a demo or test credits.'],
                    ['q' => 'Do you offer an API?', 'a' => 'Yes. You can send SMS and other messages from your website, app, CRM or ERP over HTTP/REST, XML or SMPP, and receive delivery reports back.'],
                    ['q' => 'Is there a minimum order?', 'a' => 'Plans depend on volume and channel. Contact us for current pricing and offers.'],
                ]]],
            ],
            [
                'id' => 'dlt',
                'title' => 'DLT registration',
                'blocks' => [['faq' => [
                    ['q' => 'What is DLT registration?', 'a' => 'Under TRAI regulations, every business that sends commercial SMS in India must register its entity, sender IDs (headers) and message templates on an operator\'s Distributed Ledger Technology (DLT) platform. Unregistered messages are blocked.'],
                    ['q' => 'Can you handle DLT registration for me?', 'a' => 'Yes. We help register your entity, headers and templates end to end, so nothing is blocked at the operator.'],
                    ['q' => 'What documents do I need?', 'a' => 'Typically your company PAN, GST certificate or other business proof, and a letter of authorisation. We\'ll send you the exact list for your business type.'],
                ]]],
            ],
            [
                'id' => 'billing',
                'title' => 'Billing & refunds',
                'blocks' => [['faq' => [
                    ['q' => 'How am I billed?', 'a' => 'You buy credits in advance and are billed at the time of purchase, in Indian Rupees, plus GST at the prevailing rate.'],
                    ['q' => 'Am I charged for messages that were not delivered?', 'a' => 'Charges apply to every message submitted to the operator, whether or not it is delivered. See our Terms & Conditions for details.'],
                    ['q' => 'Can I get a refund?', 'a' => 'Refunds are not offered once a transaction is complete, unless the Company agrees. Agreed refunds are processed within 60–90 days, after deductions. The full policy is in our Terms & Conditions.'],
                ]]],
            ],
        ];

        foreach (config('products') as $slug => $product) {
            if (empty($product['faqs'])) continue;
            $sections[] = [
                'id'     => $slug,
                'title'  => $product['name'],
                'blocks' => [['faq' => $product['faqs']]],
            ];
        }

        $sections[] = [
            'id' => 'support',
            'title' => 'Support',
            'blocks' => [['faq' => [
                ['q' => 'How do I reach support?', 'a' => 'Call +91 9718055559 or email info@admagister.com. Existing customers also have a named support contact.'],
                ['q' => 'Where can I see delivery reports?', 'a' => 'Every message has a status in your panel, and reports for the last one year are available there. API users also receive delivery callbacks.'],
            ]]],
        ];
    @endphp

    @include('legal._page', [
        'eyebrow'  => 'Help',
        'title'    => 'Frequently Asked Questions',
        'lede'     => 'Quick answers about our channels, DLT registration, billing and support.',
        'updated'  => null,
        'sections' => $sections,
    ])

@endsection
