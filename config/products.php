<?php

/*
|--------------------------------------------------------------------------
| Product pages  (rendered by resources/views/product.blade.php)
|--------------------------------------------------------------------------
| One entry per /products/{slug} page. The header "Products" dropdown and the
| related-product links on industry pages read this list too, so adding a
| product here is the only step needed to publish it.
|
| Copy provenance: Bulk SMS, WhatsApp, Voice & IVR and Digital marketing are
| rewritten from Ad Magister's previous site (bulksmsdelhincr.com — the
| transactional/promotional/OTP SMS, whatsapp-api, voice-sms, ivr,
| missed-call-alert and digital-marketing pages). Its FAQ blocks were lorem
| on most pages, so FAQs here are new. Old marketing numbers ("100%
| delivery", "75% cost reduction") were dropped on purpose — do not restore
| a figure unless the business confirms it. RCS had no old page; its copy
| follows the /channel page.
*/

return [

    'bulk-sms' => [
        'icon'     => 'bi-chat-dots',
        'color'    => '#2563eb',
        'name'     => 'Bulk SMS',
        'title'    => 'Bulk SMS Service — Transactional, Promotional & OTP',
        'meta'     => 'Service, transactional, promotional and OTP SMS on DLT-registered headers, with an HTTP API, real-time delivery reports and DND reach for eligible service messages.',
        'eyebrow'  => 'Bulk SMS',
        'headline' => 'Bulk SMS that reaches',
        'accent'   => 'every phone in India',
        'lede'     => 'Transactional alerts, OTPs and promotional campaigns on DLT-registered headers — sent from our panel or your own app through the API, with a delivery report for every message.',
        'about'    => [
            'SMS still reaches every handset on every network, with no app, data connection or sign-up needed. It is the channel to use when a message has to arrive and be read within minutes.',
            'Banks send balance and debit alerts, railways send PNR status, schools tell parents about exams and meetings, and stores announce their sales, all on SMS. We set up the right route for each kind of message, so an OTP is never stuck behind a promotional blast.',
        ],
        'types_title' => 'SMS types we send',
        'types'    => [
            [
                'icon'  => 'bi-bell',
                'name'  => 'Service & transactional SMS',
                'text'  => 'Account alerts, order updates and reminders for people who already have a relationship with you. Each template is registered under the right DLT category, service or transactional, and eligible messages can reach numbers on the DND register.',
                'items' => ['Not limited to promotional hours', 'DND reach where rules allow', 'Registered brand header', 'Template based'],
            ],
            [
                'icon'  => 'bi-megaphone',
                'name'  => 'Promotional SMS',
                'text'  => 'Offers, launches and sale announcements to your opted-in audience. We help write copy short enough to read at a glance.',
                'items' => ['Sent 9 am – 9 pm', 'No set-up cost', '160 characters per SMS unit', 'Real-time delivery report'],
            ],
            [
                'icon'  => 'bi-shield-lock',
                'name'  => 'OTP SMS',
                'text'  => 'One-time passwords for sign-up, login and payments, sent on a priority route so the code arrives before the user gives up.',
                'items' => ['Priority route', 'Confirms the user has the phone', 'Helps reduce fake sign-ups', 'Reaches DND numbers'],
            ],
            [
                'icon'  => 'bi-code-slash',
                'name'  => 'Bulk SMS API',
                'text'  => 'Send any of the above from your website, app, CRM or ERP. Plug our gateway in and every send gets a delivery receipt back.',
                'items' => ['HTTP / REST API', 'XML and SMPP', 'Delivery callbacks', 'Sample code on request'],
            ],
        ],
        'benefits' => [
            ['icon' => 'bi-lightning-charge', 'title' => 'Quick delivery',       'text' => 'Urgent information reaches the customer in seconds, not hours.'],
            ['icon' => 'bi-clock-history',    'title' => 'Outside promo hours',  'text' => 'Service, transactional and OTP traffic is not limited to the 9 am – 9 pm promotional window.'],
            ['icon' => 'bi-person-check',     'title' => 'DND reach',            'text' => 'Eligible service messages can reach customers who have opted out of promotions.'],
            ['icon' => 'bi-files',            'title' => 'Template based',       'text' => 'Register as many templates as you need, and fill in the variables when you send.'],
            ['icon' => 'bi-people',           'title' => 'Group sends',          'text' => 'Upload a list or pick a segment and reach all of them in one click.'],
            ['icon' => 'bi-bar-chart-line',   'title' => 'Delivery reports',     'text' => 'Every message gets a delivery status from the operator.'],
        ],
        'faqs' => [
            ['q' => 'What is the difference between service and transactional SMS?', 'a' => 'Both are informative messages to people who already have a relationship with you, such as OTPs, account alerts and booking confirmations. TRAI defines which messages fall into each category, and that category decides the template, the route and the consent needed. We help you classify every template correctly before it is registered.'],
            ['q' => 'What is a DND-registered number?', 'a' => 'A number registered with the National Customer Preference Register (NCPR) to stop receiving commercial calls and messages.'],
            ['q' => 'Will my messages reach DND numbers?', 'a' => 'Service, transactional and OTP messages that meet TRAI\'s conditions can reach DND numbers. Promotional messages follow the customer\'s preferences, which is a TRAI rule rather than a route limitation.'],
            ['q' => 'When can promotional SMS be sent?', 'a' => 'Between 9 am and 9 pm. Messages submitted outside that window are held and sent when it opens.'],
            ['q' => 'Can I choose my sender ID?', 'a' => 'Yes. Your header is usually based on your company or brand name. Its format and length depend on the message category and current DLT rules, and it has to be registered before use. We check it and handle the registration for you.'],
        ],
    ],

    'rcs' => [
        'icon'     => 'bi-chat-square-text',
        'color'    => '#1677ff',
        'name'     => 'RCS Business Messaging',
        'title'    => 'RCS Business Messaging — Rich, Verified SMS',
        'meta'     => 'Verified sender, branded cards, carousels and quick-reply buttons inside the native Messages app, with optional SMS fallback.',
        'eyebrow'  => 'RCS Business Messaging',
        'headline' => 'The SMS inbox,',
        'accent'   => 'upgraded',
        'lede'     => 'Your verified brand name and logo, plus images, carousels and buttons, all inside the Messages app your customers already open every day. No app to install.',
        'about'    => [
            'RCS (Rich Communication Services) is the successor to SMS on Android. A message arrives in the same inbox, but it shows a verified sender, rich media and tappable actions instead of plain text.',
            'Once your brand passes verification, customers can see who the message is from before they open it, which builds trust and cuts down on spoofing. If a handset cannot receive RCS, the message can fall back to SMS where fallback is set up for your campaign. What is available depends on the operator, the handset and the provider configuration.',
        ],
        'types_title' => 'What you can send',
        'types'    => [
            [
                'icon'  => 'bi-patch-check',
                'name'  => 'Verified sender',
                'text'  => 'Your brand name, logo and colour on every message, once brand verification is approved.',
                'items' => ['Brand name & logo', 'Verified badge', 'Brand colour', 'Business info page'],
            ],
            [
                'icon'  => 'bi-card-image',
                'name'  => 'Rich cards & carousels',
                'text'  => 'Product images, offers and catalogues that customers can swipe through, without leaving the inbox.',
                'items' => ['Images & video', 'Swipeable carousels', 'Titles & descriptions', 'Up to 4 buttons per card'],
            ],
            [
                'icon'  => 'bi-hand-index',
                'name'  => 'Suggested replies & actions',
                'text'  => 'One-tap buttons to call, open a link, view a map, add a calendar event or reply.',
                'items' => ['Dial & open-URL', 'Location & maps', 'Calendar events', 'Quick replies'],
            ],
            [
                'icon'  => 'bi-arrow-repeat',
                'name'  => 'SMS fallback',
                'text'  => 'With fallback enabled, handsets without RCS get an SMS version instead, so one campaign can cover your whole list.',
                'items' => ['Configurable fallback', 'One campaign, one report', 'DLT template for fallback', 'No duplicate sends'],
            ],
        ],
        'benefits' => [
            ['icon' => 'bi-shield-check',     'title' => 'Trusted sender',   'text' => 'Verification makes your messages harder to spoof and easier to trust.'],
            ['icon' => 'bi-eye',              'title' => 'Read receipts',    'text' => 'See which messages were delivered and which were actually read.'],
            ['icon' => 'bi-images',           'title' => 'Visual campaigns', 'text' => 'Show the product instead of describing it in 160 characters.'],
            ['icon' => 'bi-chat-left-dots',   'title' => 'Two-way',          'text' => 'Customers reply or tap a button, and the conversation carries on in the same thread.'],
            ['icon' => 'bi-phone',            'title' => 'No app needed',    'text' => 'Works in the default Messages app on supported Android phones.'],
            ['icon' => 'bi-graph-up-arrow',   'title' => 'Click tracking',   'text' => 'Button taps and link clicks are reported per campaign.'],
        ],
        'faqs' => [
            ['q' => 'Which phones receive RCS?', 'a' => 'Android handsets with RCS turned on in Google Messages, on supported operators. Other handsets can receive the SMS fallback, if it is enabled for the campaign.'],
            ['q' => 'Do I need DLT registration for RCS?', 'a' => 'Your RCS agent is verified separately, but the SMS fallback still uses a DLT-registered header and template. We set up both.'],
            ['q' => 'How long does brand verification take?', 'a' => 'It depends on the operator review. We prepare the logo, description and contact details to reduce the chance of the submission being sent back.'],
        ],
    ],

    'whatsapp' => [
        'icon'     => 'bi-whatsapp',
        'color'    => '#25d366',
        'name'     => 'WhatsApp Business API',
        'title'    => 'WhatsApp Business API — Official Access',
        'meta'     => 'Official WhatsApp Business API: verified profile, approved templates, two-way conversations, rich media and catalogues.',
        'eyebrow'  => 'WhatsApp Business API',
        'headline' => 'Talk to customers',
        'accent'   => 'where they already chat',
        'lede'     => 'Send notifications, run conversations and take orders on WhatsApp through an official Business API account, with templates approved before you send.',
        'about'    => [
            'WhatsApp is one of the most widely used messaging apps in India, so it is where many customers expect a quick reply. The Business API is the official way to message them at scale, with a verified business profile, pre-approved templates and real two-way threads instead of one-way broadcasts.',
            'Rich messages carry images, documents, locations and buttons, so a delivery update can include the invoice and a booking reminder can include the map. We set up the account, get your templates approved and connect it to your systems.',
        ],
        'types_title' => 'What you can do',
        'types'    => [
            [
                'icon'  => 'bi-bell',
                'name'  => 'Notifications',
                'text'  => 'Order, payment, booking and account updates sent from approved templates.',
                'items' => ['Approved templates', 'Personalised variables', 'Documents & images', 'Delivery & read status'],
            ],
            [
                'icon'  => 'bi-chat-dots',
                'name'  => 'Two-way conversations',
                'text'  => 'Customers reply in the same thread. Automate the common questions and pass the rest to your team.',
                'items' => ['Chatbot flows', 'Agent handover', 'Shared team inbox', 'Quick-reply buttons'],
            ],
            [
                'icon'  => 'bi-bag',
                'name'  => 'Catalogue & commerce',
                'text'  => 'Show products, take orders and share payment links without leaving the chat.',
                'items' => ['Product catalogue', 'List & reply buttons', 'Payment links', 'Order updates'],
            ],
            [
                'icon'  => 'bi-patch-check',
                'name'  => 'Verified profile',
                'text'  => 'Business name, logo, address and website on a profile customers can trust, plus help preparing an application for Meta\'s verified badge. Approval is at Meta\'s discretion.',
                'items' => ['Business profile', 'Display name approval', 'Verification application help', 'Official API access'],
            ],
        ],
        'benefits' => [
            ['icon' => 'bi-people',          'title' => 'Huge reach',        'text' => 'Reach customers on the app they open most often.'],
            ['icon' => 'bi-images',          'title' => 'Rich media',        'text' => 'Images, video, PDFs, locations and contacts in one message.'],
            ['icon' => 'bi-headset',         'title' => 'Better support',    'text' => 'Resolve queries in chat instead of on hold.'],
            ['icon' => 'bi-cash-coin',       'title' => 'Lower cost',        'text' => 'Automated replies take routine questions off your call centre.'],
            ['icon' => 'bi-gear',            'title' => 'Integrations',      'text' => 'Connect your CRM, helpdesk or e-commerce store through the API.'],
            ['icon' => 'bi-shield-lock',     'title' => 'Opt-in based',      'text' => 'Customers choose to hear from you, which keeps engagement high.'],
        ],
        'faqs' => [
            ['q' => 'What is the difference between the WhatsApp Business app and the API?', 'a' => 'The app is for one phone and manual replies. The API is for businesses that message at volume, automate replies, connect their systems or need several agents on one number.'],
            ['q' => 'Do I need approved templates?', 'a' => 'Yes, for any message you start. Replies sent within 24 hours of a customer\'s message can be free-form. We draft templates and submit them for approval.'],
            ['q' => 'Can I keep my existing number?', 'a' => 'Usually, yes. The number has to be removed from the regular WhatsApp app first. We take you through the migration.'],
        ],
    ],

    'voice-ivr' => [
        'icon'     => 'bi-telephone',
        'color'    => '#6366f1',
        'name'     => 'Voice & IVR',
        'title'    => 'Voice SMS, IVR & Missed Call Services',
        'meta'     => 'Bulk voice SMS broadcasts, custom IVR systems and missed-call numbers for alerts, support, lead capture, polls and feedback.',
        'eyebrow'  => 'Voice & IVR',
        'headline' => 'Reach people',
        'accent'   => 'text cannot',
        'lede'     => 'Recorded voice broadcasts, IVR menus and missed-call numbers that reach every phone, including feature phones, rural audiences and anyone who prefers to listen rather than read.',
        'about'    => [
            'A recorded voice message is quick to set up and affordable to send at scale. You can speak to your audience in their own language, which makes voice useful in rural and semi-urban India and for people who find reading difficult.',
            'Voice also works in both directions. An IVR answers routine calls and routes the rest to the right agent, and a missed-call number lets people opt in, vote or give feedback without paying for the call or filling in a form.',
        ],
        'types_title' => 'Voice services',
        'types'    => [
            [
                'icon'  => 'bi-broadcast',
                'name'  => 'Voice SMS (OBD)',
                'text'  => 'Record a message once and deliver it to thousands of numbers as an automated call, at a time you schedule.',
                'items' => ['Regional-language audio', 'Scheduled campaigns', 'Keypress responses', 'Per-call reports'],
            ],
            [
                'icon'  => 'bi-diagram-3',
                'name'  => 'IVR system',
                'text'  => 'Custom call menus for sales and support. They answer common questions, collect details and route callers to the right agent, in any language.',
                'items' => ['Multi-level menus', 'Call routing', 'Response capture', 'Any language'],
            ],
            [
                'icon'  => 'bi-telephone-inbound',
                'name'  => 'Missed call service',
                'text'  => 'A number that people give a missed call to. The call costs them nothing, and your system logs the number and replies with an SMS automatically.',
                'items' => ['Free for the caller', 'Auto SMS confirmation', 'Confirms the caller\'s number', 'Polls & voting'],
            ],
        ],
        'benefits' => [
            ['icon' => 'bi-translate',        'title' => 'Any language',      'text' => 'Speak to every region in its own language.'],
            ['icon' => 'bi-geo-alt',          'title' => 'Rural reach',       'text' => 'Reaches people without smartphones or internet.'],
            ['icon' => 'bi-heart',            'title' => 'Personal touch',    'text' => 'A human voice adds a personal touch to your message.'],
            ['icon' => 'bi-calendar-check',   'title' => 'Scheduling',        'text' => 'Set the date and time, and the campaign runs itself.'],
            ['icon' => 'bi-clock',            'title' => '24×7 availability', 'text' => 'The IVR answers callers even when your team is offline.'],
            ['icon' => 'bi-funnel',           'title' => 'Cleaner leads',     'text' => 'A missed call confirms the number is active and reachable, which cuts down on mistyped numbers.'],
        ],
        'faqs' => [
            ['q' => 'What is voice SMS?', 'a' => 'A pre-recorded audio message delivered as an automated phone call. The recipient answers and hears your message, and can optionally press a key to respond.'],
            ['q' => 'What can a missed-call number be used for?', 'a' => 'Opt-ins, confirming a caller\'s number, polls and voting, feedback collection and call-back requests. The caller is not charged.'],
            ['q' => 'Can the IVR be in Hindi or other languages?', 'a' => 'Yes. Menus and prompts can be recorded in any language, or in several, with a language-selection step.'],
        ],
    ],

    'digital-marketing' => [
        'icon'     => 'bi-megaphone',
        'color'    => '#ff6a00',
        'name'     => 'Digital marketing',
        'title'    => 'Digital Marketing — SEO, Social Media & Paid Ads',
        'meta'     => 'SEO, social media marketing and Google Ads campaigns run by the same team that runs your messaging routes.',
        'eyebrow'  => 'Digital marketing',
        'headline' => 'Bring in the audience,',
        'accent'   => 'then keep them',
        'lede'     => 'SEO, social media and paid campaigns that bring in new customers, run by the same team that sends your SMS, RCS and WhatsApp, so nothing is lost between vendors.',
        'about'    => [
            'Messaging works best when the offer and the audience are right. Our digital marketing team finds new customers through search, social and paid ads, then hands them to the channels that keep them coming back.',
            'Packages suit businesses of every size and are priced to match. We focus on what the campaign has to achieve, whether that is brand awareness, leads or online sales, rather than vanity metrics.',
        ],
        'types_title' => 'Services',
        'types'    => [
            [
                'icon'  => 'bi-search',
                'name'  => 'Search engine optimisation',
                'text'  => 'A full audit of your site\'s structure, content and code, followed by the on-page and off-page work that moves it up the rankings.',
                'items' => ['Keyword research', 'Meta data optimisation', 'Quality backlinks', 'Content writing'],
            ],
            [
                'icon'  => 'bi-share',
                'name'  => 'Social media marketing',
                'text'  => 'Content and campaigns across Facebook, Instagram, LinkedIn, X and Pinterest that build awareness and bring traffic to your site.',
                'items' => ['Content calendar', 'Page management', 'Social ads', 'Audience engagement'],
            ],
            [
                'icon'  => 'bi-cursor',
                'name'  => 'Paid campaigns (Google Ads)',
                'text'  => 'Search, display and remarketing campaigns, combined with organic work so every rupee is aimed at buyers.',
                'items' => ['Search & display ads', 'Remarketing', 'Conversion tracking', 'Monthly reporting'],
            ],
        ],
        'benefits' => [
            ['icon' => 'bi-bullseye',        'title' => 'Targeted',          'text' => 'Reach the people most likely to buy.'],
            ['icon' => 'bi-award',           'title' => 'Brand awareness',   'text' => 'Show up where your customers are searching and scrolling.'],
            ['icon' => 'bi-graph-up',        'title' => 'Measurable',        'text' => 'Every campaign is reported against leads and sales.'],
            ['icon' => 'bi-arrow-left-right','title' => 'Joined-up',         'text' => 'Leads flow straight into your SMS, RCS and WhatsApp journeys.'],
            ['icon' => 'bi-wallet2',         'title' => 'Affordable',        'text' => 'Packages for businesses of every size.'],
            ['icon' => 'bi-person-badge',    'title' => 'One team',          'text' => 'One point of contact for both marketing and messaging.'],
        ],
        'faqs' => [
            ['q' => 'How long does SEO take to show results?', 'a' => 'Technical fixes can help within weeks, but ranking for competitive keywords usually takes a few months of steady work.'],
            ['q' => 'Do you manage the ad budget too?', 'a' => 'We plan and run the campaigns. The ad spend is billed to your own ad account, so you keep full visibility.'],
        ],
    ],

];
