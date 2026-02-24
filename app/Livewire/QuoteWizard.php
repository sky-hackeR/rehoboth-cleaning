<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Service;
use App\Models\Location;
use App\Models\Quote;

class QuoteWizard extends Component
{
    public $step = 1;
    public $service_id, $location_id, $sq_ft;
    public $customer_name, $email, $phone;

    public function render()
    {
        return view('livewire.quote-wizard', [
            'services' => Service::all(),
            'locations' => Location::all(),
            'selectedServiceName' => Service::find($this->service_id)?->name ?? 'Not Selected',
            'selectedLocationName' => Location::find($this->location_id)?->city ?? 'Not Selected',
        ]);
    }

    protected function rules()
    {
        if ($this->step == 1) {
            return [
                'service_id'  => 'required|exists:services,id',
                'location_id' => 'required|exists:locations,id',
                'sq_ft'       => 'required|numeric|min:10|max:1000000',
            ];
        }

        if ($this->step == 2) {
            return [
                'customer_name' => 'required|string|min:3|max:255',
                'email'         => 'required|email',
                'phone'         => 'required|string|min:10',
            ];
        }

        return [];
    }

    protected $messages = [
        'sq_ft.min' => 'Please enter a valid facility size (minimum 10 sq. ft.).',
        'sq_ft.max' => 'For facilities over 1,000,000 sq. ft., please contact us for custom pricing.',
    ];

    public function nextStep()
    {
        $this->validate();
        $this->step++;
    }

    public function previousStep()
    {
        $this->step--;
    }

    public function submit()
    {
        try {
            $quote = Quote::create([
                'service_id'    => $this->service_id,
                'location_id'   => $this->location_id,
                'sq_ft'         => $this->sq_ft,
                'customer_name' => $this->customer_name,
                'email'         => $this->email,
                'phone'         => $this->phone,
                'source'        => 'web',
            ]);

            $quote->calculateAndSend();

            return redirect()->route('quote.success');
        } catch (\Exception $e) {
            session()->flash('error', 'Error: ' . $e->getMessage());
        }
    }
}