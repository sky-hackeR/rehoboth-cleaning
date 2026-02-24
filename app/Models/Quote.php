<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Mail;
use App\Mail\QuoteGenerated;

class Quote extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'customer_name',
        'email',
        'phone',
        'service_id',
        'location_id',
        'sq_ft',
        'estimated_price',
        'status',
        'source'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function getNumberAttribute(): string
    {
        return 'REH-' . date('Y') . '-' . str_pad($this->id, 5, '0', STR_PAD_LEFT);
    }

    public function calculateEstimate(): void
    {
        if (!$this->service) {
            return;
        }

        $baseFee = 50;

        $this->estimated_price =
            ($this->sq_ft * $this->service->base_price) + $baseFee;

        $this->save();
    }

    public function calculateAndSend(): void
    {
        $this->calculateEstimate();

        Mail::to($this->email)
            ->send(new QuoteGenerated($this));


        // Mail::to(config('mail.from.address'))
        //     ->send(new QuoteGenerated($this));

        $this->update(['status' => 'sent']);
    }
}