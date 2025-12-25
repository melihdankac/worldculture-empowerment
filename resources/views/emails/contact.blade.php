<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>New Contact Form Submission</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #f5f7fa;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            background: #ffffff;
            max-width: 600px;
            margin: 40px auto;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .header {
            background-color: #2c3e50;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            color: #ecf0f1;
            font-size: 22px;
            margin: 0;
        }

        .content {
            padding: 30px;
        }

        .content h2 {
            font-size: 18px;
            margin-bottom: 15px;
            color: #2c3e50;
        }

        .info {
            margin-bottom: 20px;
        }

        .info p {
            margin: 8px 0;
            font-size: 15px;
        }

        .label {
            font-weight: bold;
            color: #34495e;
        }

        .message-box {
            background-color: #f0f3f6;
            border-left: 4px solid #2c3e50;
            padding: 15px;
            border-radius: 6px;
            font-size: 15px;
            line-height: 1.6;
            color: #555;
        }

        .footer {
            background-color: #ecf0f1;
            color: #7f8c8d;
            text-align: center;
            font-size: 13px;
            padding: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>📩 New Contact Form Submission</h1>
        </div>

        <div class="content">
            <h2>Contact Details</h2>
            <div class="info">
                <p><span class="label">Name:</span> {{ $name }}</p>
                <p><span class="label">Email:</span> {{ $email }}</p>
                <p><span class="label">Phone:</span> {{ $phone }}</p>
                <p><span class="label">Subject:</span> {{ $subject }}</p>
            </div>

            <h2>Message</h2>
            <div class="message-box">
                {{ $contentMessage }}
            </div>
        </div>

        <div class="footer">
            © {{ date('Y') }} Your Website. All rights reserved.
        </div>
    </div>
</body>

</html>
