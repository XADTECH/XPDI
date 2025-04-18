<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f4f4f4;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #f4f4f4; padding: 20px;">
        <tr>
            <td align="center">
                <!-- Main Container -->
                <table width="600px" cellpadding="0" cellspacing="0" border="0" style="background-color: #ffffff; border-radius: 8px; overflow: hidden;">
                    <!-- Header -->
                    <tr>
                        <td align="center" style="background-color: #007bff; color: #ffffff; padding: 20px;">
                            <h1 style="margin: 0; font-size: 24px;">Payment Confirmation</h1>
                        </td>
                    </tr>
                    <!-- Body -->
                    <tr>
                        <td style="padding: 20px; color: #333333;">
                            <p style="font-size: 16px; margin-bottom: 20px;">Dear <strong>{{ $payment['first_name'] }} {{ $payment['last_name'] }}</strong>,</p>
                            <p style="font-size: 16px; margin-bottom: 20px;">
                                We’re thrilled to inform you that your payment of
                                <strong>${{ number_format($payment['total_price'], 2) }}</strong>
                                has been successfully processed.
                            </p>
                            <h3 style="margin-bottom: 10px; color: #007bff;">Purchased Courses:</h3>
                            <ul style="list-style: none; padding: 0;">
                                @foreach ($payment['course_name'] as $index => $courseName)
                                    <li style="margin-bottom: 15px; border-bottom: 1px solid #f4f4f4; padding-bottom: 10px; display:flex; align-items:center; justify-content:flex-start; gap: 15px">
                                        <img src="{{ $payment['course_image'][$index] }}" alt="{{ $courseName }}" style="width: 80px; width: 80px; border-radius: 4px; margin-bottom: 10px;">
                                        <p style="margin: 0; font-size: 14px;">{{ $courseName }}</p>
                                    </li>
                                @endforeach
                            </ul>
                            <p style="font-size: 16px; margin-top: 20px;">Thank you for choosing us!</p>
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td align="center" style="background-color: #f4f4f4; padding: 20px; font-size: 12px; color: #888888;">
                            <p style="margin: 0;">© {{ date('Y') }} Your Company. All rights reserved.</p>
                            <p style="margin: 0;">123 Admin Street, Data City</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
