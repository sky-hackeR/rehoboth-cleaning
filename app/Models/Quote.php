<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    //

    protected $fillable = [
        'customer_name',
        'email',
        'phone_number',
        'service_id',
        'location_id', // Links to the specific branch
        'square_footage',
        'total_estimate',
        'status',      // pending, sent, closed, lost
        'source'       // web or whatsapp
    ];

    /**
     * Get the service requested in this quote.
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Get the location/branch responsible for this quote.
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }


    public function calculateAndSend()
    {
        // Example: $0.15 per sqft + $50 base fee
        $rate = $this->service_id == 1 ? 0.12 : 0.18;
        $this->total_estimate = ($this->sqft * $rate) + 50;
        $this->save();

        // Trigger Email (We'll build the Mailable next)
        \Mail::to($this->email)->send(new \App\Mail\QuoteGenerated($this));
    }
}
