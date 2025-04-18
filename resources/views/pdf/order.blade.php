<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 20px;
            max-width: 800px;
            margin: auto;
            border: 1px solid #ddd;
        }
        .header {
            text-align: center;
            padding: 20px 0;
        }
        .header img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .course-title {
            font-size: 20px;
            font-weight: bold;
            margin: 10px 0;
        }
        .details {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .details .user, .details .instructor {
            width: 48%;
            text-align: center;
        }
        .details img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }
        .content {
            margin-top: 30px;
        }
        .content .price {
            font-size: 20px;
            font-weight: bold;
            color: #28a745;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header with Course Image -->
        <div class="header">
            <img src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path($data->course->course_image))) }}">
            <div class="course-title">{{ $data->course->course_title }}</div>
        </div>

        <!-- User and Instructor Details -->
        <div class="details" style="display: flex; align-items:center; justify-content:space-between">
            <div class="user">
                <img src="{{ public_path($data->user->photo) }}" alt="User Photo">
                <p><strong>{{ $data->user->name }}</strong></p>
                <p>{{ $data->user->address }}</p>
            </div>
            <div class="instructor">
                <img src="{{ public_path($data->instructor->photo) }}" alt="Instructor Photo">
                <p><strong>{{ $data->instructor->name }}</strong></p>
                <p>{{ $data->instructor->address }}</p>
            </div>
        </div>

        <!-- Course Details -->
        <div class="content">
            <p><strong>Course Name:</strong> {{ $data->course->course_name }}</p>
            <p class="price">Price: ${{ number_format($data->price, 2) }}</p>
            <p><strong>Course Description:</strong></p>
            <p>{!! ($data->course->description) !!}</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Generated on {{ now()->format('d M, Y') }}</p>
            <p>&copy; {{ date('Y') }} Learning Management System</p>
        </div>
    </div>
</body>
</html>
