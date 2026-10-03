@extends('layouts.app')
@section('title', 'Terms & Conditions')
@section('description', 'Terms and conditions for customers availing Ad Magister SMS services, including acceptable use, cost policy and refund policy.')
@section('content')

    @php
        /*
         | Verbatim copy of Ad Magister's own previous Terms page
         | (bulksmsdelhincr.com/terms.php), at the business's request — wording,
         | spelling and structure are kept exactly as published there, including
         | "CUSROMER", "ervice Taxes" and the repeated item in section 3. Fix
         | those here only if the business asks for it.
         */
        $sections = [
            [
                'id' => 'introduction',
                'title' => 'TERMS & CONDITIONS FOR CUSROMER AVAILING SMS SERVICES',
                'blocks' => [
                    'The Terms and Conditions specify the actions permitted by Provider Company to its users of our services, including SMS and other services, which may be introduced in the future. The Company reserves right to modify the policy at any time. All subscribers of Our Services, directly or indirectly are required to engage in acceptable use only as per this policy as modified from time to time!',
                ],
            ],
            [
                'id' => 'illegal-use',
                'title' => '1. Illegal Use',
                'blocks' => [
                    'The Services of the Provider Company may be used only for lawful purposes. Transmission, distribution or storage of any material in violation of any applicable law or regulation is prohibited. This includes, without limitation, material protected by copyright, trademark, trade secret or other intellectual property right used without proper authorization, and material that is obscene, defamatory, constitutes an illegal threat, and violates export control laws or anti national. The provider company will not be held LIABLE for use of any Stolen Property by its users.',
                ],
            ],
            [
                'id' => 'subscriber-conduct',
                'title' => '2. Subscriber Conduct',
                'blocks' => [
                    'Subscriber shall use Company services for lawful purposes only. Subscriber shall not post or transmit using Company services any material, which violates or infringes in any way upon the rights of others, which is unlawful, threatening, abusive, defamatory, invasive of privacy or publicity rights, vulgar, obscene, profane or otherwise objectionable, which encourages conduct that would constitute a criminal offence, give the right to civil liability or otherwise violate any law, or which, without the Company express prior approval, contains advertising or any solicitation with respect to products or services. Any conduct by a Subscriber that in the Company discretion restricts or inhibits any other Subscriber from using or enjoying Company services will not be permitted. Subscriber shall not use Company services to advertise or perform any commercial solicitation, including, but not limited to, the solicitation of users to become subscribers of other on-line information services competitive with the Company services.',
                    'Subscriber shall not upload, post or otherwise make available using Company services any material protected by copyright, trademark or other proprietary right without the express permission of the owner of the copyright, trademark or other proprietary right and the burden of determining that any material is not protected by copyright rests with the subscriber. Subscriber shall be solely liable for any damage resulting from any infringement of copyrights, proprietary rights, or any other harm resulting from such a submission.',
                ],
            ],
            [
                'id' => 'security',
                'title' => '3. System and Network Security',
                'blocks' => [
                    'Violations of system or network security are prohibited, and may result in criminal and Civil Liability. The Company will investigate incidents involving such violations and may involve/will cooperate with law enforcement agencies if a criminal violation is suspected. Examples of system or network security violations include, without limitation, the following:',
                    ['alist' => [
                        'Unauthorized access to or use of data, systems or networks, including any attempt to probe, scan or test the vulnerability of a system or network or to breach security or authentication measures without express authorization of the owner of the system or network.',
                        'Unauthorized monitoring of data or traffic on any network or system without express authorization of the owner of the system or network.',
                        'Unauthorized monitoring of data or traffic on any network or system without express authorization of the owner of the system or network.',
                        'Interference with service to any user, host or network including, without limitation, mail bombing, flooding, deliberate attempts to overload a system and broadcast attacks.',
                        'Forgery of any identification or obscuring of host names, usernames, IP addresses, or any message header information in any data.',
                        'Harassing or threatening transmissions.',
                        'Probing for means of gaining unauthorized access to computers or networks.',
                        'Introducing or causing to be introducing any computer contaminant or computer viruses into system or network.',
                        'Introducing or causing to introduce any pornography material, SMS, and so on.',
                    ]],
                ],
            ],
            [
                'id' => 'indemnification',
                'title' => '4. Indemnification',
                'blocks' => [
                    'Subscribers agree to defend, indemnify and hold harmless the Company, its affiliates and their respective directors, officers, employees and agents from and against all claims and expenses, including attorney\'s fees, arising out of the use of Company Services by the subscriber or anybody else than the Subscriber, if any.',
                ],
            ],
            [
                'id' => 'sms',
                'title' => '5. SMS',
                'blocks' => [
                    'It is a condition of use of Company services that subscriber does not post or transmit any unlawful, threatening, abusive, libelous, defamatory, obscene, vulgar, pornographic, profane or indecent information of any kind, including without limitation any transmissions constituting or encouraging conduct that would constitute a criminal offence, give rise to civil liability or otherwise violate any local, state, national or international law; post or transmit any information, software or any other material, which violates or infringes upon the rights of others, including material, which is invasion of privacy or publicity rights or, which is protected by copyright, trademark or other proprietary right, or derivative works with respect thereto, without first obtaining permission from the owner or right holder; post or transmit any information, software or other material, which contains a virus or other harmful component; post, transmit or in any way exploit any information, software or other material for commercial purposes, or, which contains advertising.',
                    'User cannot use any sender Id to send SMS other than his own name, company or firm\'s name owned or managed by him/her. Using sender Id other than owned by him will cause the termination of account and all credits will be set to zero. A formal complaint will also be lodged (FIR) with the law and order agency.',
                    'Sending unsolicited SMS messages, including, without limitation, commercial advertising and informational announcements, is explicitly prohibited.',
                    'Company has no control on the contents of the SMS sent and Company shall not be held responsible/liable directly or indirectly neither for the content of the SMS sent nor for any delay in delivery or non-delivery or for any errors routed by Company through its SMSC.',
                    'Company shall not be responsible in any manner due to errors caused on account of internet delays, disconnection, time outs, routing problems, and so on.',
                    'User shall use the facilities provided by Company for delivery of MT SMS that terminates within India only. User also acknowledges that it will not use the capability of sending international SMS through Company SMSC.',
                    'User will not send unsolicited SMS (also referred to as ‘spamming’) to subscribers. All SMS sent by the user using Company SMSC must conform to IT Act 2000 and other relevant laws of India. Any violation will be the sole responsibility of user.',
                    'User has complete control of the Sender-ID (Alphanumeric or Numeric) of the MT SMS sent through Company SMS and will not misuse this facility. In case it is found that user is misusing this facility by sending a message on someone’s name without his/her approval, it shall be treated as a breach of this agreement and the connection will be disconnected forthwith. It shall be the sole responsibility of user and Company will in no way responsible for any such message and the subsequent fallout.',
                    'Company shall strive to deliver SMS immediately upon receipt from the user. However, Company shall not be responsible for any delay, non receipt of SMS or any other interruption in providing SMSC facility, which may occur due to technical reasons or snags in the system, breakdown of SMSC or any other equipment, server breakdown, maintenance shutdown, breakdown of communication services and such interruption are beyond the control of Company. However, Company acknowledges that it will put in its best endeavours to achieve the best success rate in delivery of the SMS messages so routed through its SMSC',
                ],
            ],
            [
                'id' => 'cost-policy',
                'title' => '6. Cost policy',
                'blocks' => [
                    'In consideration of Company forwarding the SMS through its SMSC, User shall pay the agreed amount per SMS + taxes sent anywhere within India.',
                    'Company shall be entitled to charge for all the SMS routed by its SMSC, irrespective of any delay, incomplete message and or non-receipt of the message by the irrespective mobile phone to whom such SMS has been forwarded. Company will notify any change in tariff to User.',
                    'Company shall raise bills at the time of buying the credits by the user. The number of Empty SMS submitted by the user shall be counted for settlement.',
                    'ervice Taxes would be as applicable, currently @18%.',
                    'User agrees to pay the bill amount immediately when sent by Company. Such payments shall be in Indian Rupees (INR).',
                    'The bill generated by Company shall be the conclusive proof of the SMS sent by SMSC of Company and the same shall be honoured by the user. However, in case of any anomaly found by the user, he will present its statistics and both parties will resolve the anomaly.',
                    'Company shall not be responsible in any manner whatsoever to a user or any other third party for delayed, incomplete and non-delivery of SMS due to technical reasons.',
                    'No unsolicited/objectionable message should be sent by the user.',
                    'Bulk SMS will be sent by the user to national customer only.',
                    'In case TRAI / Operator(s) levies ANY Extra Charges above 1 Paisa per SMS e.g. interconnection Charges, the User will have to bear all such charges for the Balance SMS Credits in their account. The Provider Company reserves the Right to suspend User Account 7 days after giving a Notification by E-Mail or SMS to the Client in case the client does not deposit the Differential Amount to the Provider. A copy of all such Policies will be provided to the customer before charging anything extra.',
                    'Nature of content, intention behind sending bulk SMS, and the use of and primary applications to be specified by the user.',
                    'The Bulk SMS rates are subject to change.',
                    'In case of change/revision of IUC for inter operator termination charges; these bulk SMS charges will be revised.',
                    'Last one Year report available on panel.',
                ],
            ],
            [
                'id' => 'refund-policy',
                'title' => '7. Refund Policy',
                'blocks' => [
                    'Before starting any relationship with us. We advise you to test our services. We do not offer any refund of money at any stage or at any condition once the transaction has done, unless Company agreed.',
                    'In case, Company agreed to refund money it will take 60 to 90 days but not more than that from the date of a request received by Company through an e-mail (registered with the Company) or by regular post. All charges like monthly fee (pro-rata basis), SMS charges, a 30% processing charges will be deducted from the refundable amount.',
                ],
            ],
            [
                'id' => 'enforcement',
                'title' => '8. Enforcement of Terms and Conditions for Company subscribers',
                'blocks' => [
                    'Indirect or attempted violations of the policy and actual or attempted violations by a third party on behalf of a Company subscriber or a subscriber\'s end user shall be considered a violation of the policy by such a customer or end user. Any user found violating the above Terms and Conditions is liable for action under the prevailing laws including termination of services without any prior notice.',
                    'We also want to advise you that if, you do not agree with any of the conditions mentioned above kindly do not register with us, once the payment is received or, even if One SMS credit is consumed, the provider company will not be liable for a refund of the amount.',
                ],
            ],
        ];
    @endphp

    @include('legal._page', [
        'eyebrow'  => 'Legal',
        'title'    => 'Terms & Conditions',
        'lede'     => 'Terms & conditions for customers availing SMS services.',
        'updated'  => null,
        'sections' => $sections,
    ])

@endsection
