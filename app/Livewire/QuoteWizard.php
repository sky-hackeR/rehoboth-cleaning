<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Service;
use App\Models\Location;
use App\Models\Quote;

class QuoteWizard extends Component
{
    public $step = 1;
    public $service_id, $location_id, $square_footage, $customer_name, $email, $phone_number;

    public function render()
    {
        return view('components.quote-wizard', [
            'services' => Service::all(),
            'locations' => Location::all()
        ]);
    }

    public function nextStep() { $this->step++; }

    public function submit()
    {
        $quote = Quote::create([
            'service_id' => $this->service_id,
            'location_id' => $this->location_id,
            'square_footage' => $this->square_footage,
            'customer_name' => $this->customer_name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'source' => 'web',
        ]);

        $quote->calculateAndSend();
        return redirect()->to('/quote-success');
    }
}