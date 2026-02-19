<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WhatsAppSession;
use App\Models\Quote;
use App\Models\Service;
use Twilio\TwiML\MessagingResponse;

class WhatsAppController extends Controller
{
    public function handle(Request $request)
    {
        $from = $request->input('From');
        $body = trim($request->input('Body'));
        $response = new MessagingResponse();

        // Find or create session for this phone number
        $session = WhatsAppSession::firstOrCreate(['phone_number' => $from]);
        $data = $session->collected_data ?? [];

        switch ($session->current_step) {
            case null:
            case 'start':
                $msg = "Welcome to Rehoboth Cleaning Services! 🇨🇦\nWhich service do you need?\n1. Office Cleaning\n2. Medical Cleaning\n3. Post-Construction";
                $session->update(['current_step' => 'awaiting_service']);
                break;

            case 'awaiting_service':
                // Mapping simple numbers to service IDs
                $serviceMap = ['1' => 1, '2' => 2, '3' => 7];
                $data['service_id'] = $serviceMap[$body] ?? 1;
                $session->update(['collected_data' => $data, 'current_step' => 'awaiting_sqft']);
                $msg = "Great! Approximately how many square feet is your facility?";
                break;

            case 'awaiting_sqft':
                $data['sqft'] = (int)$body;
                $session->update(['collected_data' => $data, 'current_step' => 'awaiting_email']);
                $msg = "Excellent. Lastly, what is your email address to send the formal PDF quote?";
                break;

            case 'awaiting_email':
                $data['email'] = $body;
                
                // Create the final Quote
                $service = Service::find($data['service_id']);
                $estimate = ($data['sqft'] * $service->base_price) + 50; // Base fee

                Quote::create([
                    'customer_name' => 'WhatsApp Lead',
                    'email' => $data['email'],
                    'phone_number' => $from,
                    'service_id' => $service->id,
                    'square_footage' => $data['sqft'],
                    'total_estimate' => $estimate,
                    'source' => 'whatsapp'
                ]);

                $msg = "Thank you! Your estimate of $" . number_format($estimate, 2) . " has been sent to " . $body . ". A Rehoboth manager will follow up shortly.";
                $session->delete(); // Clear session
                break;
        }

        $response->message($msg);
        return response($response)->header('Content-Type', 'text/xml');
    }
}