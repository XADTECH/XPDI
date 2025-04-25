<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>XPDI Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.19/build/css/intlTelInput.css" rel="stylesheet" />
</head>

<body>

    <div class="top-bar py-2">
        <div class="container d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div class="d-flex align-items-center gap-4">
                <span><i class="bi bi-telephone"></i> +971 54 701 4800</span>
                <span><i class="bi bi-envelope-at"></i> info@xpdi.com</span>
            </div>
            <span class="text-dark fw-semibold">
                <a href="{{ url('/login') }}" style="text-decoration: none; color: inherit;">LOGIN</a> /
                <a href="{{ url('/register') }}" style="text-decoration: none; color: inherit;">REGISTER</a>
            </span>

        </div>
    </div>
