<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt #<?= $order['id'] ?> — Musanze Market</title>
    <link rel="stylesheet" href="/musanze-market/assets/css/style.css">
    <style>
        .receipt-box {
            max-width: 500px;
            margin: 40px auto;
            background: white;
            padding: 40px;
            border: 2px solid #ddd;
            border-radius: 8px;
        }
        .receipt-header {
            text-align: center;
            border-bottom: 2px dashed #ddd;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
        .receipt-header h1 {
            color: #2e7d32;
            font-size: 22px;
        }
        .receipt-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #f0f0f0;
            font-size: 15px;
        }
        .receipt-row span:first-child {
            color: #757575;
        }
        .receipt-row span:last-child {
            font-weight: bold;
        }
        .receipt-total {
            display: flex;
            justify-content: space-between;
            padding: 16px 0;
            font-size: 20px;
            font-weight: bold;
            color: #2e7d32;
            border-top: 2px dashed #ddd;
            margin-top: 10px;
        }
        .receipt-footer {
            text-align: center;
            margin-top: 24px;
            color: #757575;
            font-size: 13px;
        }
        .print-btn {
            text-align: center;
            margin-top: 24px;
        }
    </style>
</head>
<body style="background:#f5f5f5;">

<div class="receipt-box">

    <!-- Receipt Header -->
    <div class="receipt-header">
        <h1>🥔 Musanze Market</h1>
        <p>Order Receipt</p>
        <p style="font-size:13px; c