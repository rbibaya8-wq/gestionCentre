<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            background: #f4f8ff;
            margin: 0;
            padding: 0;
        }

        .receipt-container {
            width: 100%;
            padding: 30px;
        }

        .receipt-box {
            background: #ffffff;
            border: 2px solid #1e3a8a;
            border-radius: 8px;
            padding: 25px;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #1e3a8a;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            color: #1e3a8a;
            font-size: 26px;
            letter-spacing: 1px;
        }

        .sub-title {
            color: #2563eb;
            font-size: 14px;
            margin-top: 5px;
        }

        .info-row {
            margin: 10px 0;
            padding: 8px;
            background: #eff6ff;
            border-left: 5px solid #2563eb;
        }

        .label {
            font-weight: bold;
            color: #1e3a8a;
        }

        .amount-box {
            margin-top: 20px;
            padding: 15px;
            background: #dbeafe;
            border: 2px dashed #1d4ed8;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            color: #1e40af;
        }

        .footer {
            margin-top: 60px;
            display: flex;
            justify-content: space-between;
        }

        .signature {
            border-top: 1px solid #1e3a8a;
            width: 200px;
            text-align: center;
            padding-top: 5px;
            color: #1e3a8a;
        }

        .badge {
            position: absolute;
            top: 30px;
            right: 30px;
            background: #2563eb;
            color: white;
            padding: 6px 12px;
            font-size: 12px;
            border-radius: 20px;
        }
    </style>
</head>
<body>

<div class="receipt-container">

    <div class="receipt-box">

        <div class="badge">
            RECURRING PAYMENT
        </div>

        <div class="header">
            <h2>Payment Receipt</h2>
            <div class="sub-title">Official Recurring Payment Confirmation</div>
        </div>

        <div class="info-row">
            <span class="label">Student :</span>
            {{ $payment->student->first_name }}
            {{ $payment->student->last_name }}
        </div>

        <div class="info-row">
            <span class="label">Month :</span> {{ $payment->month }}
        </div>

        <div class="info-row">
            <span class="label">Year :</span> {{ $payment->year }}
        </div>

        <div class="info-row">
            <span class="label">Payment Date :</span>
            {{ \Carbon\Carbon::parse($payment->payment_date)->format('d/m/Y') }}
        </div>

        <div class="info-row">
            <span class="label">Late Payment :</span> {{ $payment->late }}
        </div>

        <div class="amount-box">
            Amount Paid : {{ number_format($payment->amount, 2) }} MAD
        </div>

        <div class="footer">
            <div>
                Date Generated : {{ now()->format('d/m/Y') }}
            </div>

            <div class="signature">
                Authorized Signature
            </div>
        </div>

    </div>

</div>

</body>
</html>