{{-- @component('mail::message')
@slot('header')

@endslot
<table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom: 30px;">
    <tr>
        <td align="center">
            <h1 style="color: #0a2540; font-family: 'Helvetica', Arial, sans-serif; font-size: 26px; font-weight: 800; margin: 0; letter-spacing: -0.5px; text-transform: uppercase;">
                {{ config('welcome.header.brand.company_name') }}
            </h1>
            <div style="width: 40px; height: 2px; background-color: #28a745; margin: 10px auto;"></div>
            <p style="text-transform: uppercase; letter-spacing: 3px; font-size: 10px; color: #28a745; font-weight: 700; margin: 0; font-family: 'Helvetica', Arial, sans-serif;">
                {{ config('welcome.header.brand.company_tagline') }}
            </p>
        </td>
    </tr>
</table>

# Hello {{ $quote->customer_name }},

Thank you for choosing **{{ config('welcome.header.brand.company_name') }}**. We have generated an instant estimate for your facility in **{{ $quote->location->city ?? 'Canada' }}**.

<div style="background-color: #f8f9fa; padding: 20px; border-radius: 10px; border-left: 4px solid #3AC0FF; margin: 20px 0;">
<h3 style="margin-top: 0; color: #0a2540;">Estimate Summary</h3>
<table style="width: 100%; border-collapse: collapse;">
<tr>
<td style="padding: 5px 0; color: #555;"><strong>Service:</strong></td>
<td style="text-align: right;">{{ $quote->service->name }}</td>
</tr>
<tr>
<td style="padding: 5px 0; color: #555;"><strong>Facility Size:</strong></td>
<td style="text-align: right;">{{ number_format($quote->sq_ft) }} sq. ft.</td>
</tr>
<tr style="font-size: 18px; color: #28a745;">
<td style="padding: 10px 0;"><strong>Monthly Total:</strong></td>
<td style="text-align: right;"><strong>${{ number_format($quote->estimated_price, 2) }} CAD</strong></td>
</tr>
</table>
</div>

A formal PDF breakdown has been attached to this email for your records. Our regional manager will contact you shortly to schedule a site walkthrough.

@component('mail::button', ['url' => config('app.url'), 'color' => 'primary'])
Visit Our Website
@endcomponent

<p style="font-size: 11px; color: #777; line-height: 1.4;">
*Please note: Prices are subject to a physical site inspection. All prices are in CAD and exclude applicable taxes.*
</p>

Thanks,<br>
**The {{ config('welcome.header.brand.company_name') }} Team**
@endcomponent --}}


@component('mail::message')
@slot('header')
@endslot

<table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom: 30px;">
    <tr>
        <td align="center">
            <h1 style="color: #0a2540; font-family: 'Helvetica', Arial, sans-serif; font-size: 26px; font-weight: 800; margin: 0; letter-spacing: -0.5px; text-transform: uppercase;">
                {{ config('welcome.header.brand.company_name') }}
            </h1>
            <div style="width: 40px; height: 2px; background-color: #28a745; margin: 10px auto;"></div>
            <p style="text-transform: uppercase; letter-spacing: 3px; font-size: 10px; color: #28a745; font-weight: 700; margin: 0; font-family: 'Helvetica', Arial, sans-serif;">
                {{ config('welcome.header.brand.company_tagline') }}
            </p>
        </td>
    </tr>
</table>

# Hello {{ $quote->customer_name }},

Thank you for choosing **{{ config('welcome.header.brand.company_name') }}**. We have finalized an instant service estimate for your facility in **{{ $quote->location->city ?? 'Canada' }}**.

<div style="background-color: #ffffff; padding: 25px; border: 1px solid #e1e4e8; border-radius: 4px; margin: 25px 0; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td style="padding-bottom: 15px; border-bottom: 1px solid #f0f2f5;">
            <span style="font-size: 12px; color: #6b7c93; text-transform: uppercase; font-weight: bold; letter-spacing: 1px;">Service Detail</span><br>
            <strong style="color: #0a2540; font-size: 16px;">{{ $quote->service->name }}</strong>
        </td>
    </tr>
    <tr>
        <td style="padding: 15px 0; border-bottom: 1px solid #f0f2f5;">
            <span style="font-size: 12px; color: #6b7c93; text-transform: uppercase; font-weight: bold; letter-spacing: 1px;">Facility Coverage</span><br>
            <strong style="color: #0a2540; font-size: 16px;">{{ number_format($quote->sq_ft) }} sq. ft.</strong>
        </td>
    </tr>
    <tr>
        <td style="padding-top: 15px;">
            <span style="font-size: 12px; color: #28a745; text-transform: uppercase; font-weight: bold; letter-spacing: 1px;">Estimated Monthly Total</span><br>
            <span style="color: #28a745; font-size: 24px; font-weight: 800;">${{ number_format($quote->estimated_price, 2) }} <small style="font-size: 14px;">CAD</small></span>
        </td>
    </tr>
</table>
</div>

A comprehensive breakdown has been attached to this email as a PDF. One of our regional supervisors will reach out to you within 24 hours to coordinate a site walkthrough and verify final details.

@component('mail::button', ['url' => config('app.url'), 'color' => 'success'])
Visit Corporate Website
@endcomponent

---

<p style="font-size: 11px; color: #999; line-height: 1.6; text-align: center;">
    <strong>Confidentiality Notice:</strong> This estimate is based on the parameters provided. All pricing is subject to physical site inspection. <br>
    © {{ date('Y') }} {{ config('welcome.header.brand.company_name') }}. All rights reserved.
</p>

@endcomponent