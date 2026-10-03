@extends('layouts.app')
@section('title', 'Legal Notices')
@section('description', 'Company information, intellectual property, trademarks, regulatory compliance and disclaimers for the Ad Magister website.')
@section('content')

    @php
        /*
         | New page: the previous site had no legal notices. Registration numbers
         | (CIN, GSTIN) are deliberately not shown because none are confirmed —
         | add them to the 'company' section once the business supplies them.
         */
        $sections = [
            [
                'id' => 'company',
                'title' => 'Company information',
                'blocks' => [
                    'This website is operated by Ad Magister Pvt. Ltd.',
                    ['list' => [
                        'Registered office: 307, A-43, Sector-63, Noida-201301, Uttar Pradesh, India',
                        'Email: info@admagister.com',
                        'Phone: +91 9718055559',
                    ]],
                ],
            ],
            [
                'id' => 'intellectual-property',
                'title' => 'Intellectual property',
                'blocks' => [
                    'All content on this website, including text, graphics, logos, icons, images and software, belongs to Ad Magister or its licensors and is protected by Indian and international copyright and trademark laws.',
                    'You may view and print pages for your own reference. You may not copy, reproduce, republish, modify or distribute any part of this website for commercial purposes without our prior written permission.',
                ],
            ],
            [
                'id' => 'trademarks',
                'title' => 'Third-party trademarks',
                'blocks' => [
                    'WhatsApp is a trademark of Meta Platforms, Inc. Google, Android and RCS-related marks are trademarks of Google LLC. Names of telecom operators and other products mentioned on this site are trademarks of their respective owners. Their use here is only to describe the services we offer, and does not imply endorsement.',
                ],
            ],
            [
                'id' => 'compliance',
                'title' => 'Regulatory compliance',
                'blocks' => [
                    'Commercial messaging in India is regulated by the Telecom Regulatory Authority of India (TRAI) under the Telecom Commercial Communications Customer Preference Regulations (TCCCPR). All SMS sent through our platform must use a DLT-registered entity, header and template. Promotional messages can only be sent between 9 am and 9 pm, and are not delivered to numbers registered on the NCPR (DND).',
                    'Customers are responsible for the content they send and for having the consent of the people they message. See our Terms & Conditions for full details.',
                ],
            ],
            [
                'id' => 'disclaimer',
                'title' => 'Disclaimer',
                'blocks' => [
                    'The information on this website is provided for general information only. We try to keep it accurate and up to date, but we make no warranty about its completeness or accuracy, and features, pricing and availability may change without notice.',
                    'Delivery of messages depends on telecom operators and networks outside our control. Nothing on this website is a guarantee of delivery rates or delivery times unless agreed in writing.',
                ],
            ],
            [
                'id' => 'external-links',
                'title' => 'External links',
                'blocks' => [
                    'This website may link to third-party websites. We do not control those websites and are not responsible for their content, policies or practices.',
                ],
            ],
            [
                'id' => 'liability',
                'title' => 'Limitation of liability',
                'blocks' => [
                    'To the fullest extent permitted by law, Ad Magister is not liable for any indirect, incidental or consequential loss arising from the use of, or inability to use, this website or the information on it.',
                ],
            ],
            [
                'id' => 'governing-law',
                'title' => 'Governing law',
                'blocks' => [
                    'These notices and any dispute arising from the use of this website are governed by the laws of India.',
                ],
            ],
        ];
    @endphp

    @include('legal._page', [
        'eyebrow'  => 'Legal',
        'title'    => 'Legal Notices',
        'lede'     => 'Company details, intellectual property, compliance and disclaimers for this website.',
        'updated'  => '3 October 2026',
        'sections' => $sections,
    ])

@endsection
