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

                    {{-- @dd($name. $email, $message) --}}
                    <tr>
                        <td style="padding: 30px;">
                            <p style="margin-top: 0;">You've received a new message from the contact form. Here are the
                                details:</p>

                            <table width="100%" style="margin-top: 20px;">
                                <tr>
                                    <td style="font-weight: bold; padding: 10px 0; width: 100px;">Name:</td>
                                    <td style="padding: 10px 0;">{{ $name }}</td>
                                </tr>
                                <tr style="background-color: #f9f9f9;">
                                    <td style="font-weight: bold; padding: 10px 0;">Email:</td>
                                    <td style="padding: 10px 0;">{{ $email }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold; padding: 10px 0;">Message:</td>
                                    {{-- @dd($message_form) --}}
                                    <td style="padding: 10px 0; white-space: pre-line;">{{ $message_form }}</td>
                                </tr>
                            </table>

                            <p style="margin-top: 30px; font-size: 14px; color: #666;">Please respond to this message at
                                your earliest convenience.</p>
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="padding: 20px; background-color: #f0f0f0; text-align: center; font-size: 13px; color: #888;">
                            &copy; {{ now()->year }} Your Company Name. All rights reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
