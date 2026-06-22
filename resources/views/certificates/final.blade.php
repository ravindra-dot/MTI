<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Certificate - {{ Str::ucfirst($name) }}</title>
    <style>
        @page {
            size: 297mm 210mm;
            margin: 0mm;
        }

        html, body {
            margin: 0;
            padding: 0;
            width: 297mm;
            height: 210mm;
            font-family: 'DejaVu Sans', sans-serif;
            background-color: #ffffff;
            -webkit-print-color-adjust: exact;
        }

        .certificate-container {
            position: relative;
            width: 297mm;
            height: 210mm;
            max-width: 297mm;
            max-height: 210mm;
            box-sizing: border-box;
            overflow: hidden;

            background-image: url("{{ public_path('assets/images/Participant-certificate.png') }}");
            background-size: 100% 100%;
            background-position: top left;
            background-repeat: no-repeat;
        }

        .name-overlay {
            position: absolute;
            top: 115mm;
            left: 0;
            width: 100%;
            text-align: center;
        }

        .participant-name {
            font-size: 34px;
            font-weight: bold;
            color: #0b1a30;
            letter-spacing: 1px;
            display: inline-block;
        }


        .date-overlay {
            position: absolute;
            bottom: 18mm;
            right: 85mm;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
            color: #0b1a30;
        }
    </style>
</head>
<body>

<div class="certificate-container">

    <div class="name-overlay">
        <span class="participant-name">{{ Str::ucfirst($name) }}</span>
    </div>

    <div class="date-overlay">
        {{ $date }}
    </div>

</div>

</body>
</html>