<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Promotional Email</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333333;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
        }
        .header {
            background-color: #007bff;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }
        .header img {
            max-width: 100%;
            height: auto;
            margin: 0 auto;
        }
        .header h1 {
            margin: 10px 0;
            font-size: 24px;
            font-weight: bold;
        }
        .content {
            padding: 20px;
        }
        .content h2 {
            color: #007bff;
            font-size: 20px;
            margin-bottom: 10px;
        }
        .content p {
            line-height: 1.6;
            margin: 10px 0;
        }
        .content a {
            color: #007bff;
            text-decoration: none;
        }
        .footer {
            background-color: #f4f4f4;
            text-align: center;
            padding: 10px;
            font-size: 12px;
            color: #888888;
        }
        .footer a {
            color: #007bff;
            text-decoration: none;
        }
        @media only screen and (max-width: 600px) {
            .email-container {
                width: 100%;
            }
            .header, .content, .footer {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header Section -->
        <div class="header">
            <img src="https://techydevs.com/demos/themes/html/aduca-demo/aduca/images/logo.png" alt="Your Logo" style="max-width: 200px;">
            <h1>New Course Alert!</h1>
        </div>

        <!-- Content Section -->
        <div class="content">
            <h2>Explore Our Latest Course</h2>
            <div>
                {!! $mail_data->description !!}
            </div>
            <p>
                <a href="http://127.0.0.1:8000/course-details/laravel-11---build-a-complete-learning-management-system-lms" target="_blank">
                    Click here to learn more &rarr;
                </a>
            </p>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <p>&copy; {{ date('Y') }} Your Company Name. All rights reserved.</p>
            <p>
                <a href="#">Privacy Policy</a> | <a href="#">Unsubscribe</a>
            </p>
        </div>
    </div>
</body>
</html>
