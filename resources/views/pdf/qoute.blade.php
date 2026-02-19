<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; color: #333; }
        .header { border-bottom: 2px solid #0a2540; padding-bottom: 20px; }
        .logo { color: #0a2540; font-size: 24px; font-weight: bold; }
        .details { margin-top: 30px; width: 100%; border-collapse: collapse; }
        .details th { text-align: left; background: #f4f4f4; padding: 10px; }
        .details td { padding: 10px; border-bottom: 1px solid #eee; }
        .total-box { margin-top: 50px; text-align: right; font-size: 20px; color: #28a745; }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">REHOBOTH CLEANING</div>
        <div>Janitorial Services Canada</div>
    </div>

    <h3>Service Estimate #{{ $quote->id }}</h3>
    <p><strong>Prepared for:</strong> {{ $quote->customer_name }}</p>
    <p><strong>Date:</strong> {{ date('F d, Y') }}</p>

    <table class="details">
        <thead>
            <tr>
                <th>Service Description</th>
                <th>Facility Size</th>
                <th>Rate</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $quote->service->name }}</td>
                <td>{{ number_format($quote->square_footage) }} sq. ft.</td>
                <td>${{ number_format($quote->service->base_price, 2) }}/sqft</td>
            </tr>
        </tbody>
    </table>

    <div class="total-box">
        <strong>Estimated Monthly Total: ${{ number_format($quote->total_estimate, 2) }} CAD</strong>
        <p style="font-size: 12px; color: #777;">*Prices subject to site walkthrough. Taxes not included.</p>
    </div>

    <div style="margin-top: 100px; font-size: 10px;">
        Serving: {{ $quote->location->city ?? 'All Canada' }} | RehobothCleaning.ca
    </div>
</body>
</html>