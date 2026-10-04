<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Contact Form Submission</title>
</head>

<body style="margin: 0; padding: 0; font-family: 'Segoe UI', sans-serif; background-color: #f4f4f4;">
    <table width="100%" cellpadding="0" cellspacing="0" style="padding: 40px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0"
                    style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
                    <tr>
                        <td style="padding: 30px; background-color: #0066cc; color: #ffffff;">
                            <h2 style="margin: 0; font-size: 24px;">📬 New Contact Message</h2>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 30px;">
                            <p style="margin-top: 0;">You've received a new message from the {{ ($source ?? '') === 'footer' ? '"Pitch us your idea" form' : 'contact page form' }}.
                                Reply to this email to answer {{ $name }} directly.</p>

                            <table width="100%" style="margin-top: 20px;">
                                <tr>
                                    <td style="font-weight: bold; padding: 10px 0; width: 100px;">Name:</td>
                                    <td style="padding: 10px 0;">{{ $name }}</td>
                                </tr>
                                <tr style="background-color: #f9f9f9;">
                                    <td style="font-weight: bold; padding: 10px 0;">Email:</td>
                                    <td style="padding: 10px 0;">{{ $email }}</td>
                                </tr>
                                @if ($phone !== '')
                                <tr>
                                    <td style="font-weight: bold; padding: 10px 0;">Phone:</td>
                                    <td style="padding: 10px 0; white-space: pre-line;">{{ $phone }}</td>
                                </tr>
                                @endif
                                @if (($products = implode(', ', json_decode($service, true) ?: [])) !== '')
                                <tr>
                                    <td style="font-weight: bold; padding: 10px 0;">Products:</td>
                                    <td style="padding: 10px 0; white-space: pre-line;">{{ $products }}</td>
                                </tr>
                                @endif
                                @if (($subjectLine ?? '') !== '')
                                <tr>
                                    <td style="font-weight: bold; padding: 10px 0;">Subject:</td>
                                    <td style="padding: 10px 0;">{{ $subjectLine }}</td>
                                </tr>
                                @endif
                                <tr style="background-color: #f9f9f9;">
                                    <td style="font-weight: bold; padding: 10px 0; vertical-align: top;">Message:</td>
                                    <td style="padding: 10px 0; white-space: pre-line;">{{ $messageText !== '' ? $messageText : '—' }}</td>
                                </tr>
                            </table>

                            <p style="margin-top: 30px; font-size: 14px; color: #666;">Please respond to this message at
                                your earliest convenience.</p>
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="padding: 20px; background-color: #f0f0f0; text-align: center; font-size: 13px; color: #888;">
                            &copy; {{ now()->year }} Ad Magister Pvt. Ltd.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
