<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    /**
     * Relationship: Quote belongs to a Service
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Relationship: Quote belongs to a Location
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * Calculate estimate based on service base price.
     */
    public function calculateEstimate()
    {
        if (!$this->service) {
            return;
        }

        $baseFee = 50;
        $this->estimated_price = ($this->sq_ft * $this->service->base_price) + $baseFee;
        $this->save();
    }
}
