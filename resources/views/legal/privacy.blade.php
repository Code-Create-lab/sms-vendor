@extends('layouts.app')
@section('title', 'Privacy Policy')
@section('description', 'How Ad Magister collects, uses, stores and protects personal data from website visitors, enquiries and the messaging traffic we process for our clients.')
@section('content')

    @php
        /*
         | New page: the previous site had no privacy policy. Written against the
         | Digital Personal Data Protection Act, 2023 and the IT Act, 2000, and
         | describes only what this site actually does (contact form fields,
         | cookie banner, messaging traffic processed for clients). Have it
         | reviewed by counsel before relying on it — in particular the retention
         | periods and the grievance contact, which should name a person.
         */
        $sections = [
            [
                'id' => 'who-we-are',
                'title' => 'Who we are',
                'blocks' => [
                    'Ad Magister Pvt. Ltd. ("Ad Magister", "we", "us") provides business messaging services, including Bulk SMS, RCS Business Messaging, Voice & IVR, WhatsApp Business API and digital marketing. Our office is at Office No. 101, 1st Floor, Bhavishya India Tower, Gaur City 2, Noida, Ghaziabad, Uttar Pradesh 201009, India.',
                    'This policy explains what personal data we collect through this website and our services, why we collect it, and the choices you have.',
                ],
            ],
            [
                'id' => 'what-we-collect',
                'title' => 'Information we collect',
                'blocks' => [
                    'When you contact us through the website, we collect what you enter in the form:',
                    ['list' => [
                        'Your name, email address and phone number.',
                        'The products you are interested in, and any message you write.',
                        'Your consent to receive notifications by SMS, RCS and other messages.',
                    ]],
                    'When you become a customer, we also collect the business and KYC details needed to open your account and complete DLT registration, such as company name, GST number, authorised signatory details, sender IDs and message templates.',
                    'When you browse the site, we and our analytics tools may collect technical information such as IP address, browser type, pages visited and the time of your visit, through cookies and similar technologies.',
                ],
            ],
            [
                'id' => 'how-we-use',
                'title' => 'How we use it',
                'blocks' => [
                    ['list' => [
                        'To respond to your enquiry and send you a quote.',
                        'To set up and run your account, including DLT entity, header and template registration with operators.',
                        'To deliver the messages you ask us to send and give you delivery reports.',
                        'To bill you and keep the records required by tax and telecom regulations.',
                        'To send you service updates and, where you have consented, information about our offers.',
                        'To keep our platform secure, prevent misuse and comply with TRAI regulations and other applicable laws.',
                    ]],
                    'We do not sell your personal data.',
                ],
            ],
            [
                'id' => 'client-data',
                'title' => 'Data we process for our clients',
                'blocks' => [
                    'When a business uses our platform, it uploads recipient phone numbers and message content. We process that data only on the client\'s instructions and only to deliver their messages and report on delivery. The client decides who to contact and is responsible for having consent or another lawful basis to do so.',
                    'If you received a message from a business that uses Ad Magister and want to stop receiving it, contact that business directly, or register your preferences on the National Customer Preference Register (NCPR) by calling or texting 1909.',
                ],
            ],
            [
                'id' => 'sharing',
                'title' => 'Who we share it with',
                'blocks' => [
                    'We share personal data only where it is needed to provide our services or required by law:',
                    ['list' => [
                        'Telecom operators and their DLT platforms, to register your entity, headers and templates and to deliver messages.',
                        'Channel providers such as Meta (for WhatsApp) and Google (for RCS), when you use those channels.',
                        'Service providers who host our systems, process payments or send email for us, under confidentiality obligations.',
                        'Government or regulatory authorities, when the law requires us to.',
                    ]],
                ],
            ],
            [
                'id' => 'cookies',
                'title' => 'Cookies',
                'blocks' => [
                    'We use cookies to keep the site working, remember your choices and understand how the site is used. When you first visit, a banner asks you to accept or deny non-essential cookies. You can also clear or block cookies in your browser settings at any time, although some parts of the site may not work as intended.',
                ],
            ],
            [
                'id' => 'retention',
                'title' => 'How long we keep it',
                'blocks' => [
                    'We keep enquiry details for as long as needed to respond and follow up, and customer account, billing and delivery records for as long as tax, telecom and other laws require. After that, we delete or anonymise the data.',
                ],
            ],
            [
                'id' => 'security',
                'title' => 'How we protect it',
                'blocks' => [
                    'We use reasonable technical and organisational safeguards, including access controls, encrypted connections and restricted access for staff, to protect personal data against loss, misuse and unauthorised access. No system is completely secure, so please tell us immediately if you suspect any misuse of your account.',
                ],
            ],
            [
                'id' => 'your-rights',
                'title' => 'Your rights',
                'blocks' => [
                    'Subject to applicable law, including the Digital Personal Data Protection Act, 2023, you can:',
                    ['list' => [
                        'Ask what personal data we hold about you and how we use it.',
                        'Ask us to correct, complete or update it.',
                        'Ask us to erase it, where we no longer need it or you withdraw consent.',
                        'Withdraw consent to marketing messages at any time.',
                        'Nominate another person to exercise these rights on your behalf.',
                        'Raise a grievance with us, and then with the Data Protection Board of India if it is not resolved.',
                    ]],
                    'To exercise any of these rights, email info@admagister.com. We may need to verify your identity before acting on your request.',
                ],
            ],
            [
                'id' => 'grievance',
                'title' => 'Grievance officer',
                'blocks' => [
                    'If you have a concern about how we handle your personal data, write to our Grievance Officer at info@admagister.com, or by post to Ad Magister Pvt. Ltd., Office No. 101, 1st Floor, Bhavishya India Tower, Gaur City 2, Noida, Ghaziabad, Uttar Pradesh 201009. We will acknowledge your complaint and aim to resolve it within the time required by law.',
                ],
            ],
            [
                'id' => 'changes',
                'title' => 'Changes to this policy',
                'blocks' => [
                    'We may update this policy from time to time. The "Last updated" date at the top shows when it last changed. Significant changes will be highlighted on this page.',
                ],
            ],
        ];
    @endphp

    @include('legal._page', [
        'eyebrow'  => 'Legal',
        'title'    => 'Privacy Policy',
        'lede'     => 'What personal data we collect, why we collect it, and how you stay in control of it.',
        'updated'  => '3 October 2026',
        'sections' => $sections,
    ])

@endsection
