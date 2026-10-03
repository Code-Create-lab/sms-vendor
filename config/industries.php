<?php

/*
|--------------------------------------------------------------------------
| Industry pages  (rendered by resources/views/industry.blade.php)
|--------------------------------------------------------------------------
| One entry per /solutions/{slug} page. The /industry-solution overview grid
| and the header "Solutions" dropdown both read this list, so the card, the
| menu item and the page can never disagree.
|
| 'summary', 'uses' and 'channels' are the card copy the overview page has
| always shown. 'products' keys into config/products.php. The previous site
| had no industry pages, so the long-form copy is new — no client names,
| volumes or results are claimed; add them only once the business confirms.
*/

return [

    'banking-financial-services' => [
        'icon'     => 'bi-bank',
        'color'    => '#4f46e5',
        'name'     => 'Banking & Financial Services',
        'short'    => 'Banking & Finance',
        'summary'  => 'Time-critical alerts that have to land on the first attempt, on operator-direct routes.',
        'uses'     => ['OTP & 2FA', 'Transaction alerts', 'EMI reminders', 'KYC follow-ups'],
        'channels' => 'SMS · RCS · Voice',
        'products' => ['bulk-sms', 'rcs', 'voice-ivr'],
        'lede'     => 'OTPs, debit alerts and payment reminders that customers rely on, delivered on priority routes and backed by a delivery record for every message.',
        'intro'    => [
            'In banking, a late OTP means a failed payment and a late debit alert means a fraud report. Your messaging has to be fast, reliable and easy to audit.',
            'We run your OTPs and alerts on dedicated transactional routes, separate from promotional traffic, and keep a per-message delivery log your compliance team can check.',
        ],
        'scenarios' => [
            ['icon' => 'bi-shield-lock',    'title' => 'OTP & two-factor login', 'text' => 'Login, payment and device-binding codes on a priority route that reaches DND numbers.'],
            ['icon' => 'bi-credit-card',    'title' => 'Transaction alerts',      'text' => 'Instant debit, credit and balance alerts, so customers spot fraud quickly.'],
            ['icon' => 'bi-calendar-event', 'title' => 'EMI & due-date reminders','text' => 'Scheduled SMS and voice reminders before each due date, which cut defaults.'],
            ['icon' => 'bi-person-vcard',   'title' => 'KYC & onboarding',        'text' => 'Document requests and status updates that keep applications moving.'],
            ['icon' => 'bi-exclamation-triangle', 'title' => 'Fraud & security alerts', 'text' => 'Warnings about new devices, password changes or unusual activity.'],
            ['icon' => 'bi-ui-checks',      'title' => 'Feedback & surveys',      'text' => 'Quick satisfaction surveys after a branch visit or a support call.'],
        ],
    ],

    'retail-e-commerce' => [
        'icon'     => 'bi-bag-check',
        'color'    => '#db2777',
        'name'     => 'Retail & E-commerce',
        'short'    => 'Retail & E-commerce',
        'summary'  => 'Rich cards and carousels that turn an order update into a second purchase.',
        'uses'     => ['Order tracking', 'Abandoned cart', 'Offer carousels', 'Feedback requests'],
        'channels' => 'RCS · SMS · WhatsApp',
        'products' => ['rcs', 'bulk-sms', 'whatsapp', 'digital-marketing'],
        'lede'     => 'From order confirmation to doorstep delivery and the next sale, every message is a chance to sell again.',
        'intro'    => [
            'Shoppers expect updates at every step and ignore anything that looks like spam. The brands that win send the right message on the right channel: an SMS for the OTP, WhatsApp for the invoice and RCS for the offer carousel.',
            'We connect to your store or OMS, so order events trigger messages automatically, and promotions go out to the segments most likely to buy.',
        ],
        'scenarios' => [
            ['icon' => 'bi-box-seam',      'title' => 'Order & shipping updates', 'text' => 'Confirmation, dispatch, out-for-delivery and delivered, sent automatically from your store.'],
            ['icon' => 'bi-cart-x',        'title' => 'Abandoned cart recovery',  'text' => 'A timely reminder with the product image and a one-tap link back to checkout.'],
            ['icon' => 'bi-images',        'title' => 'Offer carousels',          'text' => 'Swipeable RCS product cards for sales, launches and festive offers.'],
            ['icon' => 'bi-receipt',       'title' => 'Invoices & returns',       'text' => 'PDF invoices, return pickups and refund status on WhatsApp.'],
            ['icon' => 'bi-star',          'title' => 'Reviews & feedback',       'text' => 'Ask for a rating once the order has been delivered.'],
            ['icon' => 'bi-gift',          'title' => 'Loyalty & win-back',       'text' => 'Points balances, birthday offers and come-back discounts.'],
        ],
    ],

    'healthcare' => [
        'icon'     => 'bi-heart-pulse',
        'color'    => '#e11d48',
        'name'     => 'Healthcare',
        'short'    => 'Healthcare',
        'summary'  => 'Reminders that cut no-shows, sent without exposing patient data in the message body.',
        'uses'     => ['Appointment reminders', 'Report ready', 'Refill alerts', 'Camp invites'],
        'channels' => 'SMS · Voice · RCS',
        'products' => ['bulk-sms', 'voice-ivr', 'rcs', 'whatsapp'],
        'lede'     => 'Appointment reminders, report notifications and health-camp invitations that patients act on, with sensitive details kept out of the message.',
        'intro'    => [
            'Missed appointments cost clinics money and delay patient care. A well-timed reminder in the patient\'s own language, by SMS or voice, cuts no-shows sharply.',
            'Our templates tell the patient something is ready without putting diagnoses or results in the message body, and link to a secure portal for the details.',
        ],
        'scenarios' => [
            ['icon' => 'bi-calendar-check',  'title' => 'Appointment reminders', 'text' => 'Reminders the day before and on the day, with a reschedule option.'],
            ['icon' => 'bi-file-medical',    'title' => 'Report ready',          'text' => 'Notify patients that their lab report is ready, without sharing the result.'],
            ['icon' => 'bi-capsule',         'title' => 'Refill & dose alerts',  'text' => 'Medicine refill and follow-up reminders for chronic care.'],
            ['icon' => 'bi-megaphone',       'title' => 'Health-camp invites',   'text' => 'Voice and SMS invitations to free check-up camps, in regional languages.'],
            ['icon' => 'bi-telephone',       'title' => 'IVR appointment desk',  'text' => 'Patients book or confirm a slot by phone menu, 24×7.'],
            ['icon' => 'bi-chat-heart',      'title' => 'Post-visit feedback',   'text' => 'Short surveys after a consultation to improve the patient experience.'],
        ],
    ],

    'real-estate' => [
        'icon'     => 'bi-buildings',
        'color'    => '#d97706',
        'name'     => 'Real Estate',
        'short'    => 'Real Estate',
        'summary'  => 'Project launches and site-visit invites with images, maps and a one-tap call back.',
        'uses'     => ['Launch announcements', 'Site-visit invites', 'Payment milestones', 'Broker updates'],
        'channels' => 'RCS · SMS · Voice',
        'products' => ['rcs', 'bulk-sms', 'voice-ivr', 'digital-marketing'],
        'lede'     => 'Launch a project with pictures, not paragraphs, then follow each buyer from site visit to final payment.',
        'intro'    => [
            'Property is bought on visuals and trust. RCS cards show the elevation, floor plan and location map in the inbox, with buttons to call the sales team or book a visit.',
            'After the booking, scheduled reminders cover every payment milestone and possession update, so buyers stay informed without your team having to chase them.',
        ],
        'scenarios' => [
            ['icon' => 'bi-rocket-takeoff', 'title' => 'Project launches',   'text' => 'Rich cards with images, price band and a call-back button.'],
            ['icon' => 'bi-geo-alt',        'title' => 'Site-visit invites', 'text' => 'A visit slot with a map link, and a reminder on the day.'],
            ['icon' => 'bi-telephone-inbound','title' => 'Missed-call leads','text' => 'A missed-call number on hoardings and ads captures verified leads.'],
            ['icon' => 'bi-cash-stack',     'title' => 'Payment milestones', 'text' => 'Demand letters and due-date reminders for each construction stage.'],
            ['icon' => 'bi-people',         'title' => 'Broker updates',     'text' => 'Inventory, pricing and scheme updates sent to your channel partners.'],
            ['icon' => 'bi-key',            'title' => 'Possession updates', 'text' => 'Construction progress and handover schedules for buyers.'],
        ],
    ],

    'education' => [
        'icon'     => 'bi-mortarboard',
        'color'    => '#7c3aed',
        'name'     => 'Education',
        'short'    => 'Education',
        'summary'  => 'Admission cycles and fee calendars run on schedules, so the messaging does too.',
        'uses'     => ['Admission alerts', 'Fee reminders', 'Result notifications', 'Attendance updates'],
        'channels' => 'SMS · Voice · RCS',
        'products' => ['bulk-sms', 'voice-ivr', 'whatsapp', 'digital-marketing'],
        'lede'     => 'Keep parents and students informed about admissions, fees, exams, results and attendance, automatically and on schedule.',
        'intro'    => [
            'Schools, colleges and coaching institutes run on a calendar, with admission windows, fee deadlines, exam dates and results. Each one needs reliable messages to students and parents.',
            'We schedule them in advance and connect to your ERP for attendance and results. Voice calls in the local language reach parents who don\'t read SMS.',
        ],
        'scenarios' => [
            ['icon' => 'bi-door-open',     'title' => 'Admission alerts',     'text' => 'Application windows, entrance tests and counselling dates.'],
            ['icon' => 'bi-wallet2',       'title' => 'Fee reminders',        'text' => 'Due-date reminders with a payment link, and receipts once paid.'],
            ['icon' => 'bi-journal-check', 'title' => 'Exams & results',      'text' => 'Timetables, hall-ticket notices and result notifications.'],
            ['icon' => 'bi-person-check',  'title' => 'Attendance updates',   'text' => 'Same-day absence alerts to parents, straight from your ERP.'],
            ['icon' => 'bi-people',        'title' => 'Parent–teacher meetings','text' => 'Invites and reminders by SMS and voice.'],
            ['icon' => 'bi-cloud-lightning-rain','title' => 'Emergency notices','text' => 'Closures and schedule changes, sent to everyone in minutes.'],
        ],
    ],

    'travel-hospitality' => [
        'icon'     => 'bi-airplane',
        'color'    => '#0891b2',
        'name'     => 'Travel & Hospitality',
        'short'    => 'Travel & Hospitality',
        'summary'  => 'Booking confirmations, boarding details and itinerary changes as they happen.',
        'uses'     => ['Booking confirmations', 'Check-in reminders', 'Itinerary changes', 'Loyalty offers'],
        'channels' => 'RCS · SMS · WhatsApp',
        'products' => ['rcs', 'bulk-sms', 'whatsapp'],
        'lede'     => 'Booking confirmations, check-in reminders and itinerary changes sent the moment they happen, wherever your traveller is.',
        'intro'    => [
            'Travellers are on the move, often on patchy data. SMS gets the critical details through on any network, and WhatsApp and RCS carry the tickets, vouchers and maps.',
            'Connect your booking engine or PMS and every confirmation, change and reminder is sent automatically, with loyalty offers timed for the next trip.',
        ],
        'scenarios' => [
            ['icon' => 'bi-check2-circle',  'title' => 'Booking confirmations', 'text' => 'PNR, voucher and payment details right after booking.'],
            ['icon' => 'bi-alarm',          'title' => 'Check-in reminders',    'text' => 'Web check-in and hotel arrival reminders, with directions.'],
            ['icon' => 'bi-arrow-repeat',   'title' => 'Itinerary changes',     'text' => 'Delays, gate changes and rescheduling alerts as they happen.'],
            ['icon' => 'bi-ticket-perforated','title' => 'E-tickets & vouchers','text' => 'Documents on WhatsApp that travellers can open offline.'],
            ['icon' => 'bi-star',           'title' => 'Guest feedback',        'text' => 'Review requests after check-out.'],
            ['icon' => 'bi-gift',           'title' => 'Loyalty offers',        'text' => 'Points updates and seasonal offers for repeat guests.'],
        ],
    ],

    'public-sector' => [
        'icon'     => 'bi-shield-check',
        'color'    => '#16a34a',
        'name'     => 'Public Sector',
        'short'    => 'Public Sector',
        'summary'  => 'High-volume citizen outreach with audit trails and per-campaign delivery reporting.',
        'uses'     => ['Citizen advisories', 'Scheme awareness', 'Survey outreach', 'Emergency alerts'],
        'channels' => 'SMS · Voice · RCS',
        'products' => ['bulk-sms', 'voice-ivr', 'rcs'],
        'lede'     => 'Reach every citizen, on every phone and in every language, with delivery records that stand up to audit.',
        'intro'    => [
            'Government outreach has to cover everyone, including people on feature phones, in remote districts and those who cannot read. SMS and voice in regional languages together close that gap.',
            'Every campaign comes with per-message delivery reports, so departments can show who was reached and when.',
        ],
        'scenarios' => [
            ['icon' => 'bi-info-circle',     'title' => 'Citizen advisories', 'text' => 'Health, weather and civic advisories, district-wide in minutes.'],
            ['icon' => 'bi-clipboard-check', 'title' => 'Scheme awareness',   'text' => 'Eligibility and enrolment drives in regional languages.'],
            ['icon' => 'bi-telephone-inbound','title' => 'Missed-call registration','text' => 'Citizens register interest with a free missed call.'],
            ['icon' => 'bi-bar-chart',       'title' => 'Surveys & feedback', 'text' => 'IVR and SMS surveys with keypress or reply responses.'],
            ['icon' => 'bi-exclamation-octagon','title' => 'Emergency alerts', 'text' => 'Urgent SMS and voice broadcasts during disasters.'],
            ['icon' => 'bi-journal-text',    'title' => 'Audit-ready reports','text' => 'Delivery logs for each campaign, ready for review.'],
        ],
    ],

    'logistics-delivery' => [
        'icon'     => 'bi-truck',
        'color'    => '#f97316',
        'name'     => 'Logistics & Delivery',
        'short'    => 'Logistics & Delivery',
        'summary'  => 'Delivery windows, rider details and doorstep OTPs delivered at dispatch speed.',
        'uses'     => ['Dispatch alerts', 'Live ETA', 'Doorstep OTP', 'Failed-delivery retry'],
        'channels' => 'SMS · RCS · Voice',
        'products' => ['bulk-sms', 'rcs', 'voice-ivr', 'whatsapp'],
        'lede'     => 'Dispatch alerts, rider details and doorstep OTPs sent as fast as your fleet moves, so fewer deliveries fail.',
        'intro'    => [
            'Every failed delivery attempt costs fuel and time. Telling the customer when to expect the rider, who is coming and what code to share brings that number down.',
            'We connect to your TMS or dispatch app, so each status change triggers the right message, and OTPs go out on a priority route that arrives before the rider reaches the door.',
        ],
        'scenarios' => [
            ['icon' => 'bi-box-arrow-right', 'title' => 'Dispatch alerts',     'text' => 'Shipment picked up, in transit and out for delivery.'],
            ['icon' => 'bi-geo',             'title' => 'Live ETA & rider details','text' => 'Rider name, number and a tracking link.'],
            ['icon' => 'bi-shield-lock',     'title' => 'Doorstep OTP',        'text' => 'Proof-of-delivery codes on a priority transactional route.'],
            ['icon' => 'bi-arrow-counterclockwise','title' => 'Failed-delivery retry','text' => 'Let customers pick a new slot by SMS, WhatsApp or IVR.'],
            ['icon' => 'bi-cash',            'title' => 'COD reminders',       'text' => 'Remind customers to keep the exact amount ready, or pay online.'],
            ['icon' => 'bi-star',            'title' => 'Delivery feedback',   'text' => 'Rate the delivery experience right after drop-off.'],
        ],
    ],

];
