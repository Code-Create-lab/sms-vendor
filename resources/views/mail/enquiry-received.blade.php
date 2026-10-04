<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Thanks for contacting Ad Magister</title>
</head>

<body style="margin: 0; padding: 0; font-family: 'Segoe UI', sans-serif; background-color: #f4f4f4;">
    <table width="100%" cellpadding="0" cellspacing="0" style="padding: 40px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0"
                    style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
                    <tr>
                        <td style="padding: 30px; background-color: #264a9f; color: #ffffff;">
                            <h2 style="margin: 0; font-size: 24px;">Thank you, {{ $name }}!</h2>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 30px; color: #1e293b; line-height: 1.6;">
                            <p style="margin-top: 0;">We have received your message and a member of our team will get
                                back to you shortly.</p>

                            @if ($messageText !== '')
                                <p style="margin-bottom: 6px; font-weight: bold;">Your message</p>
                                <p style="margin-top: 0; padding: 14px 16px; background-color: #f8fafc; border-left: 3px solid #264a9f; white-space: pre-line;">{{ $messageText }}</p>
                            @endif

                            <p>Need us sooner? Call <a href="tel:+919718055559" style="color: #195dff;">+91 9718055559</a>
                                or reply to this email.</p>

                            <p style="margin-bottom: 0;">Team Ad Magister</p>
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="padding: 20px; background-color: #f0f0f0; text-align: center; font-size: 13px; color: #888;">
                            &copy; {{ now()->year }} Ad Magister Pvt. Ltd. &middot; Office No. 101, 1st Floor, Bhavishya
                            India Tower, Gaur City 2, Noida, Ghaziabad, Uttar Pradesh 201009
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
