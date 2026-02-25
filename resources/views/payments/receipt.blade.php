<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }
        .container {
            width: 100%;
        }
        h2 {
            text-align: center;
        }
        p {
            margin: 8px 0;
        }
        .box {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">

<h2>Payment Receipt</h2>

<div class="box">
    <p><strong>Student:</strong>
        {{ $payment->student->first_name }}
        {{ $payment->student->last_name }}
    </p>

    <p><strong>Month:</strong> {{ $payment->month }}</p>
    <p><strong>Year:</strong> {{ $payment->year }}</p>
    <p><strong>Amount:</strong> {{ $payment->amount }} MAD</p>
    <p><strong>Date:</strong>
        {{ \Carbon\Carbon::parse($payment->payment_date)->format('d/m/Y') }}
    </p>
    <p><strong>Late:</strong> {{ $payment->late }}</p>
</div>

<p style="margin-top:50px;">Signature</p>

</div>

</body>
</html>