<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Yeni İletişim Formu Mesajı</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            color: #333333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            background-color: #ffffff;
            margin: 0 auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border-top: 4px solid #1B3252;
        }
        h2 {
            color: #1B3252;
            margin-top: 0;
            border-bottom: 1px solid #eef1f5;
            padding-bottom: 15px;
        }
        .field {
            margin-bottom: 20px;
        }
        .label {
            font-weight: bold;
            color: #666666;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
        }
        .value {
            font-size: 16px;
            color: #111111;
            line-height: 1.5;
            background-color: #f9fbfd;
            padding: 10px 15px;
            border-radius: 4px;
            border-left: 3px solid #D4621A;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #999999;
            text-align: center;
            border-top: 1px solid #eef1f5;
            padding-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Yeni İletişim Formu Mesajı</h2>
        
        <div class="field">
            <div class="label">Ad Soyad</div>
            <div class="value">{{ $data['name'] }}</div>
        </div>

        @if(!empty($data['company']))
        <div class="field">
            <div class="label">Firma / Kurum</div>
            <div class="value">{{ $data['company'] }}</div>
        </div>
        @endif

        <div class="field">
            <div class="label">E-posta</div>
            <div class="value"><a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a></div>
        </div>

        @if(!empty($data['phone']))
        <div class="field">
            <div class="label">Telefon</div>
            <div class="value"><a href="tel:{{ $data['phone'] }}">{{ $data['phone'] }}</a></div>
        </div>
        @endif

        @if(!empty($data['subject']))
        <div class="field">
            <div class="label">Konu</div>
            <div class="value">{{ $data['subject'] }}</div>
        </div>
        @endif

        <div class="field">
            <div class="label">Mesaj</div>
            <div class="value" style="white-space: pre-line;">{{ $data['message'] }}</div>
        </div>

        <div class="footer">
            Bu e-posta Setisan Elektromekanik web sitesi iletişim formundan gönderilmiştir.
        </div>
    </div>
</body>
</html>
